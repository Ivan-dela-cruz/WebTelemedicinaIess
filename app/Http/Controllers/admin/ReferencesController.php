<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreReferencesPost;
use App\Http\Requests\UpdateReferencesPut;
use App\Reference;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ReferencesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $references = Reference::orderBy('name', 'ASC')->get();

        return view('admin/references/index', [
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'references' => $references
        ]);
    }
    public function getReferences()
    {
        return view('admin.references.index');
    }

    public function ApiReferences()
    {
        $references = Reference::where('status', 'activo')->orderBy('name', 'ASC')->get();

        return response()->json([
            'success' => true,
            'references' => $references
        ], 200);
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        return view('admin.references.create',[
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
    public function store(StoreReferencesPost $request)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $reference = new Reference();
            $reference->name = $request->name;
            $reference->description = $request->description;
            $reference->status = $status;
            $reference->save();
            DB::commit();
            return redirect()->route('get-references');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id,$layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $reference = Reference::find($id);
       
        return view('admin.references.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'reference'=>$reference
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateReferencesPut $request, $id)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $reference = Reference::find($id);
            $reference->name = $request->name;
            $reference->description = $request->description;
            $reference->status = $status;
            $reference->save();
            DB::commit();
            return redirect()->route('get-references');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
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
    public function changeStatus($id)
    {
        try {

            $reference = Reference::find($id);

            if ($reference->status == 'activo') {
                $reference->status = 'inactivo';
            } else {
                $reference->status = 'activo';
            }
            $reference->save();
            return response()->json($reference, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }
}
