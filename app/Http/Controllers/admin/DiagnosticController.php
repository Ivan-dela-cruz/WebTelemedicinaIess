<?php

namespace App\Http\Controllers\admin;

use App\Diagnostic;
use App\Patients;
use App\DiagnosticsPatient;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDiagnosticPost;
use App\Http\Requests\UpdateDiagnosticPut;
use App\Http\Requests\StoreDiagnosticPatientPost;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class DiagnosticController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index($layout = 'sidebar', $theme = 'dark', $pageName = 'dashboard')
    {
        $activeMenu = $this->activeMenu($layout, $pageName);
        $diagnostics = Diagnostic::orderBy('name', 'ASC')->get();

        return view('admin/diagnostics/index', [
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'diagnostics' => $diagnostics
        ]);
    }

    public function ApiDiagnostics()
    {
        $diagnostics = Diagnostic::where('status', 'activo')->orderBy('name', 'ASC')->get();

        return response()->json([
            'success' => true,
            'diagnostics' => $diagnostics
        ], 200);
    }

    public function getDiagnostig()
    {
        return view('admin.diagnostics.index');
    }

    public function getDiagnosticSelect()
    {
        $diagnostics = Diagnostic::where('status', 'activo')->get(['id', 'name']);

        return response()->json([
            'diagnostics' => $diagnostics,
            'success' => true

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
        return view('admin.diagnostics.create',[
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
    public function store(StoreDiagnosticPost $request)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $diagnostic = new Diagnostic();
            $diagnostic->code = $request->code;
            $diagnostic->name = $request->name;
            $diagnostic->description = $request->description;
            $diagnostic->status = $status;
            $diagnostic->save();
            DB::commit();
            return redirect()->route('get-diagnostics');
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
        $diagnostic = Diagnostic::find($id);
       
        return view('admin.diagnostics.edit',[
            'top_menu' => $this->topMenu(),
            'side_menu' => $this->sideMenu(),
            'simple_menu' => $this->simpleMenu(),
            'first_page_name' => $activeMenu['first_page_name'],
            'second_page_name' => $activeMenu['second_page_name'],
            'third_page_name' => $activeMenu['third_page_name'],
            'page_name' => $pageName,
            'theme' => $theme,
            'layout' => $layout,
            'diagnostic'=>$diagnostic
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDiagnosticPut $request, $id)
    {
        try {
            $status = "activo";
            if($request->status != "on"){
                $status = "inactivo";
            }
            $validate = $request->validated();
            DB::beginTransaction();
            $diagnostic = Diagnostic::find($id);
            $diagnostic->code = $request->code;
            $diagnostic->name = $request->name;
            $diagnostic->description = $request->description;
            $diagnostic->status = $status;
            $diagnostic->save();
            DB::commit();
            return redirect()->route('get-diagnostics');
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

            $diagnostic = Diagnostic::find($id);

            if ($diagnostic->status == 'activo') {
                $diagnostic->status = 'inactivo';
            } else {
                $diagnostic->status = 'activo';
            }
            $diagnostic->save();
            return response()->json($diagnostic, 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }

    /*
     * Método para añadir un diagnóstico al paciente,
     * recibe como parámetro los valores del formulario de diagnósticos del paciente,
     * esta datos son válidados por el archivo de validación  UpdateQuestionPut,
     * este archivo contine las reglas de vaidación para los tipos de datos.
     * Aprobada la validación de los datos se busca mediante los ids se busca
     * el diagnóstico seleccionado y el pacienta a que se le asignara el díagnóstico
     * Si no existe ningún error retorna un estado de 200 caso contrario un 422
     */
    public function addDiagnostigPatient(StoreDiagnosticPatientPost $request)
    {
        try {
            $diagnostic = Diagnostic::find($request->diagnostic_id);
            $patient = Patients::find($request->patient_id);
            $diag_patients = new DiagnosticsPatient();
            $diag_patients->diagnostic_id = $request->diagnostic_id;
            $diag_patients->patient_id = $request->patient_id;
            $diag_patients->description = $request->description;
            $diag_patients->save();
            return response()->json([
                'patient' => $patient->id,
                'success' => true
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }
    }


    public function updateDiagnostigPatient(StoreDiagnosticPatientPost $request)
    {
        try {
            $diagnostic = Diagnostic::find($request->diagnostic_id);

            $patient = Patients::find($request->patient_id);

            $diag_patients = DiagnosticsPatient::find($request->id);

            $diag_patients->diagnostic_id = $request->diagnostic_id;
            $diag_patients->patient_id = $request->patient_id;
            $diag_patients->description = $request->description;

            $diag_patients->save();


            return response()->json([
                'patient' => $patient->id,
                'success' => true
            ], 200);
        } catch (Exception $e) {
            return response()->json(['error' => $e], 422);
        }


    }


    public function destryDiagnostigPatien(Request $request, $id)
    {
        $diagnostic = DiagnosticsPatient::find($id);
        $diagnostic->delete();

        return response()->json([
            'success' => true
        ], 200);

    }


    public function getDiagnostigPatients($id)
    {


        $diagnostics = DB::table('diagnostics_patients')
            ->join('patients', 'diagnostics_patients.patient_id', '=', 'patients.id')
            ->join('diagnostics', 'diagnostics_patients.diagnostic_id', '=', 'diagnostics.id')
            ->where('diagnostics_patients.patient_id', $id)
            ->select('diagnostics_patients.diagnostic_id', 'diagnostics_patients.id', 'diagnostics_patients.updated_at', 'diagnostics.name', 'diagnostics.code', 'diagnostics_patients.description')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'diagnostics' => $diagnostics
        ], 200);
    }

    /*
     * El método de getDiagnostigPatientsReport recibe como parametro el id del paciente,
     * y retorna los un archivo pdf, se busca el paciente para despues obtener el id,
     * finalmente de ejecuta un QuerySet de las tres entidades, diagnostics_patients que
     * contiene las diagnosticos de cada paciente, patients que almacena los datos de los pacientes
     * y diagnostics donde estam guardadodos los diagnosticos.
     * Una vez obtenido los datos procemos a crear un Objeto PDF, le asignamos las view en BLADE,
     * y la coleccion de los datos del paciente y los diagnosticos.
     */
    public function getDiagnostigPatientsReport($id)
    {
        $patient = Patients::find($id);
        $diagnostics = DB::table('diagnostics_patients')
            ->join('patients', 'diagnostics_patients.patient_id', '=', 'patients.id')
            ->join('diagnostics', 'diagnostics_patients.diagnostic_id', '=', 'diagnostics.id')
            ->where('diagnostics_patients.patient_id', $id)
            ->select('diagnostics_patients.diagnostic_id', 'diagnostics_patients.id', 'diagnostics_patients.updated_at', 'diagnostics_patients.created_at', 'diagnostics_patients.description',
                'diagnostics.name', 'diagnostics.code', 'diagnostics.description as desc'
            )
            ->orderBy('diagnostics_patients.created_at', 'DESC')
            ->get();
        $pdf = PDF::loadView('pdf.report_diagnostic', compact('diagnostics', 'patient'));
        //$pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'reporte-diagnosticos - ' . $patient->name . '  ' . $patient->last_name . '  ' . time() . '.pdf';
        return $pdf->download($nombrePdf);
    }

}
