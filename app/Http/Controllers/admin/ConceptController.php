<?php

namespace App\Http\Controllers\admin;

use App\Concepto;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreConceptPost;
use App\Http\Requests\UpdateConceptPut;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ConceptController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $concepts = Concepto::orderBy('name', 'ASC')->get();

        return view('admin/concepts/index', [
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'concepts' => $concepts
        ]);
    }

    public function getConcepts()
    {
        return view('admin.concepts.index');
    }
    public function ApiConcepts()
    {
        $concepts = Concepto::where('status', 'activo')->orderBy('name', 'ASC')->get();

        return response()->json([
            'success' => true,
            'concepts' => $concepts
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
        return view('admin.concepts.create',[
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
    public function store(StoreConceptPost $request)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $concept = new Concepto();
            $concept->name = $request->name;
            $concept->description = $request->description;
            $concept->status = $status;
            $concept->save();
            DB::commit();
            return redirect()->route('get-concepts');
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
        $concept = Concepto::find($id);
       
        return view('admin.concepts.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'concept'=>$concept
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateConceptPut $request, $id)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $concept = Concepto::find($id);
            $concept->name = $request->name;
            $concept->description = $request->description;
            $concept->status = $status;
            $concept->save();
            DB::commit();
            return redirect()->route('get-concepts');
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

            $concept = Concepto::find($id);

            if ($concept->status == 'activo') {
                $concept->status = 'inactivo';
            } else {
                $concept->status = 'activo';
            }
            $concept->save();
            return response()->json($concept, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }
}
