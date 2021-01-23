<?php

namespace App\Http\Controllers\admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreSpecialtyPost;
use App\Http\Requests\UpdateSpecialtyPut;
use App\Specialty;
use Exception;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class SpecialtyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    /*
    User::where(function($query) use ($search){
        $query->where('name','LIKE','%$search%')
        ->orWhere('email','LIKE','%search%')
        ;
    })->paginate(10);
    */
    public function index($layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $speacilties = Specialty::orderBy('name', 'ASC')->get();
        return view('admin/specialties/index', [
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'specialties' => $speacilties
        ]);
    }
    public function ApiSpecialties()
    {
        $speacilties = Specialty::where('status','activo')->orderBy('name', 'ASC')->get();

        return response()->json([
            'success'=>true,
            'specialties' => $speacilties
        ], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        return view('admin.specialties.create',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    /*
     * Método para la creación de una nueva especialidad recibe como parámetro
     * los datos correspondientes al formulario, y estos son evaluados por el
     * método de validación StoreSpecialtyPost este archivo contiene las validaciones
     * de los campos que llegan a treves del formulario, pasado la evaluación se inicia
     * una transacción con la base de datos, si no existe ningún error en los datos se
     * ejecuta un commit a la base de datos, caso contrario se realiza un rollback de los
     * cambios dentro de la transacción abierta. Retorna con un estado 422 para errores
     * y 200 para satisfactorio.
    */
    public function store(StoreSpecialtyPost $request)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            $specialty = new Specialty();
            $specialty->name = $request->name;
            $specialty->description = $request->description;
            $specialty->status = $status;
            $specialty->color = $request->color;
            $specialty->url_image = $this->UploadImage($request);
            $specialty->save();
            return redirect()->route('get-specialties');
        } catch (Exception $e) {
            return response()->json(['errors'=>$e], 422);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $speacilty = Specialty::find($id);
       
        return view('admin.specialties.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'speacilty'=>$speacilty
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateSpecialtyPut $request, $id)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            $specialty = Specialty::find($id);
            $specialty->name = $request->name;
            $specialty->description = $request->description;
            $specialty->status = $status;
            $specialty->color = $request->color;
            if($request->url_image){
                if($specialty->url_image != $request->url_image){
                    $specialty->url_image = $this->UploadImage($request);
                }
            }
            $specialty->save();
            return redirect()->route('get-specialties');
        } catch (Exception $e) {
            return response()->json(['errors'=>$e], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
    public function getSpecialties()
    {
        return view('admin.specialties.index');
    }

    public function UploadImage(Request $request)
    {
        $url_file = "img/specialties/";

        if ($request->url_image && $request->url_image != '#') {
            $image = $request->get('url_image');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('url_image'))->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
    }
    public function changeStatus($id)
    {
        try{

            $specialty = Specialty::find($id);

        if ($specialty->status == 'activo') {
            $specialty->status = 'inactivo';
        } else {
            $specialty->status = 'activo';
        }
        $specialty->save();
        return response()->json($specialty, 200);
        }catch(Exception $e){
            return response()->json(['error'=>$e], 422);
        }
    }
    //METODO PAR AOBTENER LAS ESPECIALIDADES PARA LLENAR EL SELECT DE LOS DOCTORES
    public function getDataSelect()
    {
        $specialties = Specialty::where('status','activo')
        ->orderBy('name','ASC')
        ->get(['name','id','color']);
        return response()->json([
            'specialties'=>$specialties
        ],200);
    }


}
