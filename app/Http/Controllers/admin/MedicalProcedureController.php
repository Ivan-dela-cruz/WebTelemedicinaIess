<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StoreMedicalProcedurePost;
use App\Http\Requests\UpdateMedicalProcedurePut;
use App\MedicalProcedure;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Reference;
use App\Concepto;

class MedicalProcedureController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $medicalprocedures = MedicalProcedure::join('references', 'medical_procedures.id_reference', '=', 'references.id')
            ->join('conceptos', 'medical_procedures.id_concept', '=', 'conceptos.id')
            ->select(
                'medical_procedures.id',
                'medical_procedures.id_reference',
                'medical_procedures.id_concept',
                'medical_procedures.name',
                'medical_procedures.status',
                'medical_procedures.description',
                'medical_procedures.category',
                'medical_procedures.updated_at',
                'medical_procedures.price',
                'references.name as ref_name',
                'conceptos.name as con_name'
            )
            ->orderBy('medical_procedures.id', 'desc')->paginate(20);

        // $medicalprocedures = MedicalProcedure::orderBy('name', 'ASC')->get();

        return view('admin/medicalprocedures/index', [
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'medicalprocedures' => $medicalprocedures
        ]);
    }

    public function getTreatementProceadures()
    {


        $medicalprocedures = MedicalProcedure::join('references', 'medical_procedures.id_reference', '=', 'references.id')
            ->join('conceptos', 'medical_procedures.id_concept', '=', 'conceptos.id')
            ->select(
                'medical_procedures.id',
                'medical_procedures.name',
                'medical_procedures.description',
                'medical_procedures.category',
                'medical_procedures.price',
                'references.name as ref_name',
                'conceptos.name as con_name'
            )
            ->orderBy('medical_procedures.id', 'desc')
            ->where('medical_procedures.status', 'activo')->get();

        // $medicalprocedures = MedicalProcedure::orderBy('name', 'ASC')->get();


        return response()->json([
            'success' => true,
            'medicalprocedures' => $medicalprocedures
        ], 200);
    }

    public function ApiMedicalProcedures()
    {
        $medicalprocedures = MedicalProcedure::where('status', 'activo')->orderBy('name', 'ASC')->get();

        return response()->json([
            'success' => true,
            'medicalprocedures' => $medicalprocedures
        ], 200);
    }

    public function getMedicalProcedure()
    {
        return view('admin.medicalprocedures.index');
    }

    public function ReferenceAndConcept()
    {
        $references = Reference::where('status', 'activo')->get(['id', 'name']);

        $concepts = Concepto::where('status', 'activo')->get(['id', 'name']);

        return response()->json([
            'references' => $references,
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

        $references = Reference::where('status','activo')->pluck('name','id');
        $concepts = Concepto::where('status','activo')->pluck('name','id');
        return view('admin.medicalprocedures.create',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'references' => $references,
            'concepts' => $concepts
        ]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */

    /*
     * Método para crear los procedimientos médicos,
     * recibe como parámetro los valores del formulario del procedimiento médicos
     * esta datos son válidados por el archivo de validación  StoreMedicalProcedurePost,
     * este archivo contine las reglas de vaidación para los tipos de datos.
     * Si no existe ningún error retorna un estado de 200 caso contrario un 422
     */
    public function store(StoreMedicalProcedurePost $request)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $medicalprocedure = new MedicalProcedure();
            $medicalprocedure->category = $request->category;
            $medicalprocedure->name = $request->name;
            $medicalprocedure->description = $request->description;
            $medicalprocedure->price = $request->price;
            $medicalprocedure->id_reference = $request->id_reference;
            $medicalprocedure->id_concept = $request->id_concept;
            $medicalprocedure->status = $status;
            $medicalprocedure->save();
            DB::commit();
            return redirect()->route('get-medical-procedures');
        } catch (Exception $e) {
            DB::rollBack();
            return response()->json(['errors' => $e], 422);
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
    public function edit($id,$layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);

        $references = Reference::where('status','activo')->pluck('name','id');
        $concepts = Concepto::where('status','activo')->pluck('name','id');
        $medicalprocedure = MedicalProcedure::find($id);
        return view('admin.medicalprocedures.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'references'=>$references,
            'concepts'=>$concepts,
            'medicalprocedure'=>$medicalprocedure
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateMedicalProcedurePut $request, $id)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $medicalprocedure = MedicalProcedure::find($id);
            $medicalprocedure->category = $request->category;
            $medicalprocedure->name = $request->name;
            $medicalprocedure->description = $request->description;
            $medicalprocedure->price = $request->price;
            $medicalprocedure->id_reference = $request->id_reference;
            $medicalprocedure->id_concept = $request->id_concept;
            $medicalprocedure->status = $status;
            $medicalprocedure->save();
            DB::commit();
            return redirect()->route('get-medical-procedures');
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
    public function destroy($id)
    {
        //
    }

    public function changeStatus($id)
    {
        try {

            $medicalprocedure = MedicalProcedure::find($id);

            if ($medicalprocedure->status == 'activo') {
                $medicalprocedure->status = 'inactivo';
            } else {
                $medicalprocedure->status = 'activo';
            }
            $medicalprocedure->save();
            return response()->json($medicalprocedure, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }
}
