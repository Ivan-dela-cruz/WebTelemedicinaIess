<?php

namespace App\Http\Controllers\admin;

use App\Files;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreFilePost;
use App\Http\Requests\UpdateFilesPut;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;
use Intervention\Image\Facades\Image;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\File;

class FileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $files = Files::join('patients', 'patients.id', '=', 'files.id_patient')
            ->select('patients.name as name_p', 'patients.last_name as last_name_p', 'patients.id as id_patient',
                'files.id', 'files.description', 'files.created_at', 'files.name', 'files.url_file', 'files.type'
            )
            ->where('files.id_patient', $id)
            ->orderBy('files.created_at','ASC')
            ->get();

        return response()->json(['scucess' => true, 'files' => $files], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreFilePost $request)
    {
        $validate = $request->validated();
        try {

            DB::beginTransaction();
            $files = new Files();
            $files->id_patient = $request->id_patient;
            $files->name = $request->name;
            $files->description = $request->description;
            $files->url_file = $this->uploadPdf($request);
            $files->type = $this->getExtension($request);
            $files->save();
            DB::commit();
            return response()->json($files, 200);
        } catch (\Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
        }
    }

    public function getExtension(Request $request)
    {
        if ($request->get('url_file')) {
            $file = $request->get('url_file');
            $extension = explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];
            return $extension;
        }
        return "empty";
    }

    public function uploadPdf(Request $request)
    {
        $url_path = "storage/pdf/";
        if ($request->get('url_file')) {
            $file = $request->get('url_file');
            $name = time() . '.' . explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];
            $extension = explode('/', explode(':', substr($file, 0, strpos($file, ';')))[1])[1];

            if ($extension != "pdf") {
                $url_path = "storage/photo/";
                Image::make($request->get('url_file'))->save(public_path($url_path) . $name);
            } else {
                $data = substr($file, strpos($file, ',') + 1);
                $base = base64_decode($data);
                Storage::disk('pdf')->put($name, $base);
            }
            return $url_path . $name;
        } else {
            return "#";
        }
    }


    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateFilesPut $request)
    {
        $validate = $request->validated();

        try {
            DB::beginTransaction();
            $files = Files::find($request->id);
            $files->id_patient = $request->id_patient;
            $files->name = $request->name;
            $files->description = $request->description;

            if($request->get('url_file')==$files->url_file){
               
            }else{
                $this->destroyFile($files->url_file);
                $files->url_file = $this->uploadPdf($request);
                $files->type = $this->getExtension($request);
            }
           
            $files->save();
            DB::commit();
            return response()->json($files, 200);
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        try {
            $files = Files::find($id);
            $this->destroyFile($files->url_file);
            $files->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 422);
        }


    }
    public function downloadFile( $id){
        $file = Files::find($id);
        $url_file = $file->url_file;

        $type = $file->type;
        $name ="";

        if($type=="pdf"){
            $name = Str::after($url_file, 'storage/pdf/');
        }
        else
        {
            $name = Str::after($url_file, 'storage/photo/');
        }


        return response()->download($url_file, $name);
       
    }

     public function destroyFile($path_file)
    {
        if (File::exists(public_path($path_file))) {

            File::delete(public_path($path_file));

        }
    }
}
