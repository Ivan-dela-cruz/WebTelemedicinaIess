<?php

namespace App\Http\Controllers\admin;

use App\Appointment;
use App\DiagnosticsPatient;
use App\Evolution;
use App\Http\Controllers\Controller;
use App\Recipes;
use Illuminate\Http\Request;
use App\MedicalRecord;
use App\Allergy;
use App\Patients;
use App\AllergiesPatient;
use App\Http\Requests\StoreAllergyPatientPost;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;

class MedicalRecordController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function index()
    {
        //
    }


    public function getMedicalRecord()
    {

        return view('admin.medicalrecords.index');
    }

    public function getBackgroudMedical($id)
    {
        $record = MedicalRecord::where('id_patient', $id)
            ->get([
                'code', 'reason', 'symptoms', 'family_background',
                'personal_background', 'previous_treatment', 'date_last_treatment',
                'surgical_interventions', 'medication', 'id', 'id_patient'
            ]);
        return response()->json([
            'record' => $record,
            'success' => true
        ], 200);
    }

    public function getQuestionMedical($id)
    {
        $record = MedicalRecord::where('id_patient', $id)
            ->get(['anesthesia', 'hemorrhages', 'diabetes', 'hypertension',
                    'contagious', 'cardiovascular', 'respiratory', 'pregnancy',
                    'recent_disease', 'congenital_disorders', 'alcohol', 'smokes', 'annoyance',
                    'bad_smell', 'bleeding', 'teeth', 'bad_habits', 'brush', 'additive',
                    'observation', 'id', 'id_patient']
            );
        return response()->json([
            'record' => $record,
            'success' => true
        ], 200);
    }

    public function getExploration($id)
    {
        $record = MedicalRecord::where('id_patient', $id)
            ->get(['id', 'id_patient', 'pressure', 'pulse', 'temperature', 'heart_frequency',
                    'breathing_frequency', 'physical_exam', 'oral_exam']
            );
        return response()->json([
            'record' => $record,
            'success' => true
        ], 200);
    }


    public function getAllergies($id)
    {
        $allergies = DB::table('allergies_patients')
            ->join('patients', 'allergies_patients.patient_id', '=', 'patients.id')
            ->join('allergies', 'allergies_patients.allergy_id', '=', 'allergies.id')
            ->where('allergies_patients.patient_id', $id)
            ->select('allergies_patients.allergy_id', 'allergies_patients.id', 'allergies_patients.created_at',
                'allergies.name', 'allergies_patients.description')
            ->orderBy('created_at', 'DESC')
            ->get();
        return response()->json([
            'success' => true,
            'allergies' => $allergies
        ], 200);
    }

    public function putBackgroudMedical(Request $request, $id)
    {
        $record = MedicalRecord::find($id);
        $record->reason = $request->reason;
        $record->symptoms = $request->symptoms;
        $record->family_background = $request->family_background;
        $record->personal_background = $request->personal_background;
        $record->previous_treatment = $request->previous_treatment;
        $record->date_last_treatment = $request->date_last_treatment;
        $record->surgical_interventions = $request->surgical_interventions;
        $record->medication = $request->surgical_interventions;
        $record->save();
        return response()->json([
            'record' => $record->id,
            'success' => true
        ], 200);
    }

    /*
     * Método para evaluar los antecedentes médicos del paciente,
     * recibe como parámetro los valores del formulario del cuestionario médico
     * y el id del Historial médico, esta datos son válidados por el archivo
     * de validación  UpdateQuestionPut, este archivo contine las reglas de vaidación
     * para los tipos de datos.
     * Si no existe ningún error retorna un estado de 200 caso contrario un 422
     */
    public function putQuestionMedical(Request $request, $id)
    {
        $record = MedicalRecord::find($id);
        $record->anesthesia = $request->anesthesia;
        $record->hemorrhages = $request->hemorrhages;
        $record->diabetes = $request->diabetes;
        $record->hypertension = $request->hypertension;
        $record->contagious = $request->contagious;
        $record->cardiovascular = $request->cardiovascular;
        $record->respiratory = $request->respiratory;
        $record->pregnancy = $request->pregnancy;
        $record->recent_disease = $request->recent_disease;
        $record->congenital_disorders = $request->congenital_disorders;
        $record->alcohol = $request->alcohol;
        $record->smokes = $request->smokes;
        $record->annoyance = $request->annoyance;
        $record->bad_smell = $request->bad_smell;
        $record->bleeding = $request->bleeding;
        $record->teeth = $request->teeth;
        $record->bad_habits = $request->bad_habits;
        $record->brush = $request->brush;
        $record->additive = $request->additive;
        $record->observation = $request->observation;
        $record->save();
        return response()->json([
            'record' => $record->id,
            'success' => true
        ], 200);
    }

    /*
        * Método para evaluar el estado físico del paciente,
        * recibe como parámetro los valores del formulario de exploración física
        * y el id del Historial médico, esta datos son válidados por el archivo
        * de validación  UpdateExplorationPut, este archivo contine las reglas de vaidación
        * para los tipos de datos.
        * Si no existe ningún error retorna un estado de 200 caso contrario un 422
        */
    public function putExploration(Request $request, $id)
    {
        $record = MedicalRecord::find($id);
        $record->pressure = $request->pressure;
        $record->pulse = $request->pulse;
        $record->temperature = $request->temperature;
        $record->heart_frequency = $request->heart_frequency;
        $record->breathing_frequency = $request->breathing_frequency;
        $record->physical_exam = $request->physical_exam;
        $record->oral_exam = $request->oral_exam;
        $record->save();
        return response()->json([
            'record' => $record->id,
            'success' => true
        ], 200);
    }

    public function addAllergy(StoreAllergyPatientPost $request)
    {
        $allergy = Allergy::find($request->allergy_id);
        $patient = Patients::find($request->patient_id);
        $alergy_patent = new AllergiesPatient();
        $alergy_patent->allergy_id = $request->allergy_id;
        $alergy_patent->patient_id = $request->patient_id;
        $alergy_patent->description = $request->description;
        $alergy_patent->save();
        return response()->json([
            'patient' => $patient->id,
            'success' => true
        ], 200);

    }

    public function updateAllergy(StoreAllergyPatientPost $request)
    {
        $allergy = Allergy::find($request->allergy_id);
        $patient = Patients::find($request->patient_id);
        $alergy_patent = AllergiesPatient::find($request->id);
        $alergy_patent->allergy_id = $request->allergy_id;
        $alergy_patent->patient_id = $request->patient_id;
        $alergy_patent->description = $request->description;
        $alergy_patent->save();
        return response()->json([
            'patient' => $patient->id,
            'success' => true
        ], 200);

    }


    public function destryAllergy(Request $request, $id)
    {
        $allergy = AllergiesPatient::find($id);
        $allergy->delete();

        return response()->json([
            'success' => true
        ], 200);

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
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */

    /*
     * El método de getDiagnostigPatientsReport recibe como parametro el id del paciente,
     * y retorna los un archivo pdf, se busca el paciente para despues obtener el id,
     * finalmente de ejecuta una consulta de eloquent con el id del pciente para obtener
     * tres colecciones de datos $background para los antecedentes,$question para las preguntas,
     * y $exploration para la exploración fisica.
    * Una vez obtenido los datos procemos a crear un Objeto PDF, le asignamos las view en BLADE,
    * y la coleccion de los datos del paciente y los pagos.
    */
    public function show($id)
    {
        $patient = Patients::find($id);
        $background = MedicalRecord::where('id_patient', $id)
            ->first([
                'code', 'reason', 'symptoms', 'family_background',
                'personal_background', 'previous_treatment', 'date_last_treatment',
                'surgical_interventions', 'medication', 'id', 'id_patient'
            ]);

        $question = MedicalRecord::where('id_patient', $id)
            ->first(
                ['anesthesia', 'hemorrhages', 'diabetes', 'hypertension',
                    'contagious', 'cardiovascular', 'respiratory', 'pregnancy',
                    'recent_disease', 'congenital_disorders', 'alcohol', 'smokes', 'annoyance',
                    'bad_smell', 'bleeding', 'teeth', 'bad_habits', 'brush', 'additive',
                    'observation', 'id', 'id_patient']
            );
        $exploration = MedicalRecord::where('id_patient', $id)
            ->first(['id', 'id_patient', 'pressure', 'pulse', 'temperature', 'heart_frequency',
                    'breathing_frequency', 'physical_exam', 'oral_exam']
            );
        $pdf = PDF::loadView('pdf.report_questions', compact('patient', 'background', 'question', 'exploration'));
        // $pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'ficha-medica - ' . $patient->name . '  ' . $patient->last_name . '  ' . time() . '.pdf';
        return $pdf->download($nombrePdf);
    }

    public function downloadMedicalHistory($id)
    {
        $patient = Patients::find($id);
        $background = MedicalRecord::where('id_patient', $id)
            ->first([
                'code', 'reason', 'symptoms', 'family_background',
                'personal_background', 'previous_treatment', 'date_last_treatment',
                'surgical_interventions', 'medication', 'id', 'id_patient'
            ]);

        $question = MedicalRecord::where('id_patient', $id)
            ->first(
                ['anesthesia', 'hemorrhages', 'diabetes', 'hypertension',
                    'contagious', 'cardiovascular', 'respiratory', 'pregnancy',
                    'recent_disease', 'congenital_disorders', 'alcohol', 'smokes', 'annoyance',
                    'bad_smell', 'bleeding', 'teeth', 'bad_habits', 'brush', 'additive',
                    'observation', 'id', 'id_patient']
            );
        $exploration = MedicalRecord::where('id_patient', $id)
            ->first(['id', 'id_patient', 'pressure', 'pulse', 'temperature', 'heart_frequency',
                    'breathing_frequency', 'physical_exam', 'oral_exam']
            );
        $allergies = AllergiesPatient::orderBy('updated_at', 'DESC')->where('patient_id', $id)->get();
        $diagnostics = DiagnosticsPatient::orderBy('updated_at', 'DESC')->where('patient_id', $id)->get();
        $evolutions = Evolution::join('patients', 'patients.id', '=', 'evolutions.id_patient')
            ->join('doctors', 'doctors.id', '=', 'evolutions.id_doctor')
            ->join('diagnostics', 'diagnostics.id', '=', 'evolutions.id_diagnostic')
            ->select(
                'doctors.name as name_d', 'doctors.last_name as last_name_d',
                'evolutions.description', 'evolutions.updated_at',
                'diagnostics.name as name_dg', 'diagnostics.code'
            )
            ->orderBy('evolutions.updated_at', 'DESC')
            ->where('evolutions.id_patient', $id)
            ->get();
        $appointments = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.reason',
                'appointments.observation',
                'appointments.date',
                'appointments.start',
                'appointments.status',
                'specialties.name as specialty',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d'
            )
            ->where("appointments.id_patient", $id)
            ->orderBy("date", "ASC")
            ->get();

        $treatments = DB::table('medical_treatments')
            ->join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.created_at',
                'medical_treatments.price_total',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('medical_treatments.patient_id', $id)
            ->orderBy('created_at', 'DESC')
            ->get();
        $recipes = Recipes::join('patients', 'patients.id', '=', 'recipes.id_patient')
            ->join('doctors', 'doctors.id', '=', 'recipes.id_doctor')
            ->select(
                'recipes.id_patient',
                'doctors.name as name_d', 'doctors.last_name as last_name_d',
                'recipes.created_at', 'recipes.reason',
                'recipes.indications','recipes.medicines'
            )
            ->where('recipes.id_patient', $id)
            ->orderBy('recipes.created_at','DESC')
            ->get();

        $pdf = PDF::loadView('pdf.report_historial', compact(
            'patient', 'background', 'question',
            'exploration', 'allergies', 'diagnostics',
            'evolutions', 'appointments', 'treatments','recipes'
        ));
        // $pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'historial-medico - ' . $patient->name . '  ' . $patient->last_name . '  ' . time() . '.pdf';
        return $pdf->download($nombrePdf);
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
