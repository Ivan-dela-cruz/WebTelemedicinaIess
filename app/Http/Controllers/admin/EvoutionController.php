<?php

namespace App\Http\Controllers\admin;

use App\Allergy;
use App\Doctor;
use App\Evolution;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreEvolutionPost;
use App\Http\Requests\UpdateEvolutionPut;
use App\Diagnostic;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Symfony\Component\HttpKernel\DataCollector\AjaxDataCollector;

class EvoutionController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($id)
    {
        $evolutions = Evolution::join('patients','patients.id','=','evolutions.id_patient')
            ->join('doctors','doctors.id','=','evolutions.id_doctor')
            ->join('diagnostics','diagnostics.id','=','evolutions.id_diagnostic')
            ->select('patients.name as name_p','patients.last_name as last_name_p','patients.id as id_patient',
                'doctors.name as name_d','doctors.last_name as last_name_d','doctors.id as id_doctor',
                'evolutions.id','evolutions.description','evolutions.created_at',
                'diagnostics.name as name_dg','diagnostics.id as id_diagnostic', 'diagnostics.code')
            ->where('evolutions.id_patient',$id)
            ->get();

        return response()->json(['scucess' => true, 'evolutions' => $evolutions], 200);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $diagnostics = Diagnostic::where('status', 'activo')->get(['id', 'name','code']);

        $doctors = Doctor::where('status', 'activo')->get(['id', 'name', 'last_name']);

        return response()->json([
            'diagnostics' => $diagnostics,
            'doctors' => $doctors
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreEvolutionPost $request)
    {
        $validate = $request->validated();
        try {

            DB::beginTransaction();
            $evolution = new Evolution();
            $evolution->id_patient = $request->id_patient;
            $evolution->id_doctor = $request->id_doctor;
            $evolution->id_diagnostic = $request->id_diagnostic;
            $evolution->description = $request->description;
            $evolution->save();
            DB::commit();
            return response()->json($evolution, 200);
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
    public function update(UpdateEvolutionPut $request)
    {
        $validate = $request->validated();
        try {

            DB::beginTransaction();
            $evolution = Evolution::find($request->id);
            $evolution->id_patient = $request->id_patient;
            $evolution->id_doctor = $request->id_doctor;
            $evolution->id_diagnostic = $request->id_diagnostic;
            $evolution->description = $request->description;
            $evolution->save();
            DB::commit();
            return response()->json($evolution, 200);
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
            $evolution = Evolution::find($id);
            $evolution->delete();
            return response()->json(['success' => true], 200);
        } catch (\Exception $e) {
            return response()->json(['success' => false], 422);
        }


    }
}
