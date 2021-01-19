<?php

namespace App\Http\Controllers\admin;

use App\Allergy;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAllergiesPost;
use App\Http\Requests\UpdateAllergiesPut;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class AllergiesController extends Controller
{


    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $allergies = Allergy::orderBy('name', 'ASC')->paginate(5);
        // dd($pageName);
        return view('admin/allergies/index', [
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'allergies'=>$allergies
        ]);

        

        return view('admin.allergies.index',compact('allergies','layout'));
    }

    public function ApiAllergies()
    {
        $allergies = Allergy::where('status', 'activo')->orderBy('name', 'ASC')->get();

        return response()->json([
            'success' => true,
            'allergies' => $allergies
        ], 200);
    }

    public function getAllergies()
    {
        return view('admin.allergies.index',[
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

    public function getAllergiesSelect()
    {
        $allergies = Allergy::where('status', 'activo')->get(['id', 'name']);

        return response()->json([
            'allergies' => $allergies,
            'success' => true

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
        return view('admin.allergies.create',[
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
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /*
     * Este método permite a los crear una nueva alregía, recibe como parámetro
     * los valores del formulario de alergías, esta datos son válidados por el archivo
     * de validación  StoreAllergiesPost, este archivo contine las reglas de vaidación
     * para los tipos de datos.
     * Si no existe ningún error retorna un estado de 200 caso contrario un 422
     */
    public function store(StoreAllergiesPost $request)
    {
      
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $allergy = new Allergy();
            $allergy->name = $request->name;
            $allergy->description = $request->description;
            $allergy->status = $status;
            $allergy->save();
            DB::commit();
            return redirect()->route('allergiesindex');

        } catch (Exception $e) {

            DB::rollBack();
            return redirect()->route('allergiesindex');
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
    public function edit($id,$layout = 'side-menu', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $allergy = Allergy::find($id);
       
        return view('admin.allergies.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'allergy'=>$allergy
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateAllergiesPut $request, $id)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }

            $validate = $request->validated();
            DB::beginTransaction();
            $allergy = Allergy::find($id);
            $allergy->name = $request->name;
            $allergy->description = $request->description;
            $allergy->status =  $status;
            $allergy->save();
            DB::commit();
            return redirect()->route('allergiesindex');

        } catch (Exception $e) {
            DB::rollBack();
            return redirect()->route('allergiesindex');
        }
    }

    public function changeStatus($id)
    {
        try {

            $allergy = Allergy::find($id);

            if ($allergy->status == 'activo') {
                $allergy->status = 'inactivo';
            } else {
                $allergy->status = 'activo';
            }
            $allergy->save();
            return response()->json($allergy, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

}
