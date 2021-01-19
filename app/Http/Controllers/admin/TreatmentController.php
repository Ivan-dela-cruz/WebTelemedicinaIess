<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\MedicalTreatment;
use App\TramentDetail;
use Exception;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\DB;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;
use App\Patients;
use Carbon\Carbon;

use App\Doctor;
use App\Specialty;

class TreatmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    public function getTreatments()
    {
        return view('admin.treatments.index');
    }

    public function getTreatmentsAll()
    {
        $treatments = DB::table('medical_treatments')
            ->join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.patient_id',
                'medical_treatments.doctor_id',
                'medical_treatments.specailty_id',
                'medical_treatments.id',
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'treatments' => $treatments
        ], 200);
    }

    public function getTreatmentsPatients($id)
    {
        $treatments = DB::table('medical_treatments')
            ->join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.patient_id',
                'medical_treatments.doctor_id',
                'medical_treatments.specailty_id',
                'medical_treatments.id',
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                 'doctors.url_image',
                  'specialties.url_image as url_image_s',
                  'specialties.color',
                'specialties.name as name_s')
            ->where('medical_treatments.patient_id', $id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'treatments' => $treatments
        ], 200);
    }


  public function getTreatmentsPatientsUser(Request $request)
    {

         $user = User::find(Auth::user()->id);
        $patient = Patients::where("ci", $user->ci)->first();
        $treatments = DB::table('medical_treatments')
            ->join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.patient_id',
                'medical_treatments.doctor_id',
                'medical_treatments.specailty_id',
                'medical_treatments.id',
                'medical_treatments.reason',
                'medical_treatments.url_file',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                 'doctors.url_image',
                  'specialties.url_image as url_image_s',
                  'specialties.color',
                'specialties.name as name_s')
            ->where('medical_treatments.patient_id', $patient->id )
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'treatments' => $treatments
        ], 200);
    }





    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $doctors = Doctor::where('status','activo')->get(['id','name','last_name']);
        $specialties = Specialty::where('status','activo')->get(['id','name','color']);
        $patients = Patients::where('status','activo')->get(['id','name','last_name']);

        if($id!=0){

            $treatment = MedicalTreatment::join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.patient_id',
                'medical_treatments.doctor_id',
                'medical_treatments.specailty_id',
                'medical_treatments.id',
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('medical_treatments.id',$id)
            ->where('medical_treatments.status','pendiente')
            ->first();

            if($treatment !=null){
                $detail = TramentDetail::where('treatment_id',$treatment->id)->get();
                return response()->json([
                    'doctors'=>$doctors,
                    'specialties'=>$specialties,
                    'patients'=>$patients,
                    'treatment'=>$treatment,
                    'detail'=>$detail
                ],200);

            }
             return response()->json([
                    'doctors'=>$doctors,
                    'specialties'=>$specialties,
                    'patients'=>$patients,
                    'treatment'=>null,
                    'detail'=>null
                ],200);

        }
        return response()->json([
            'doctors'=>$doctors,
            'specialties'=>$specialties,
            'patients'=>$patients,
            'treatment'=>null,
            'detail'=>null
         ],200);
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /*
     * Método para crear los tratamientos médicos,
     * recibe como parámetro los valores del formulario del tratamientos médicos
     * y un array de objetos que contien el datalle del tratamiento médico,
     * estos datos son válidados por el archivo de validación  StoreMedicalTreatmentPost,
     * este archivo contine las reglas de vaidación para los tipos de datos.
     * Una vez validados se crea el tratamiento  par posteriormente ir agregaando y
     * relacionado el el deatlle del tratamiento.
     * Para evitar errores o a nivel de bsae de datos se inica con una transaccion a la base
     * de datos si no existe errores se hace un commit a la de los cambios realizados,
     * caso contarrio se realiza un rollback de los los cambios realizados.
     * Si no existe ningún error retorna un estado de 200 caso contrario un 422
     */
    public function store(Request $request)
    {
        try {
            DB::beginTransaction();
            $treatment = new MedicalTreatment();
            $treatment->reason = $request->reason;
            $treatment->description = $request->description;
            $treatment->patient_id = $request->id_patient;
            $treatment->doctor_id = $request->id_doctor;
            $treatment->specailty_id = $request->id_specialty;
            $treatment->price_total = 0;
            $treatment->save();
            $detalles = $request->detail;
            $total_price = 0;
            foreach ($detalles as $ep => $det) {
                $detail = new TramentDetail();
                $detail->treatment_id = $treatment->id;
                $detail->procedure_id = $det['procedure_id'];
                $detail->description = $det['description'];
                $detail->quantity = $det['quantity'];
                $detail->price = $det['price'];
                $detail->price_unit = $det['price_unit'];
                $detail->save();
                $total_price = $total_price + $detail->price;
            }
            $treatment->price_total = $total_price;
            $treatment->url_file = "storage/treatments/tratamiento-" . $treatment->id . '.pdf';
            $treatment->save();
            $this->savePdfTreatment( $treatment->id);

            DB::commit();
            return response()->json([
                'success' => true,
                'treatment' => $treatment
            ], 200);
        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'errors' => $e,
            ], 422);
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
        $treatment = DB::table('medical_treatments')
            ->join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.patient_id',
                'medical_treatments.doctor_id',
                'medical_treatments.specailty_id',
                'medical_treatments.id',
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.address',
                'patients.city',
                'patients.phone',
                'patients.phone_2 as phone2',
                'patients.email',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('medical_treatments.id', $id)
            ->first();
        $details = TramentDetail::where('treatment_id', $id)->get();
        return response()->json([
            'success' => true,
            'treatment' => $treatment,
            'details' => $details
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $detail = TramentDetail::where("treatment_id",$id)->get();
        return response()->json([
                'success'=>true,
                'detail'=>$detail
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request)
    {

      try {
            DB::beginTransaction();
            $treatment =  MedicalTreatment::find($request->id);
            if($treatment->status=="pendiente"){

                $treatment->reason = $request->reason;
                $treatment->description = $request->description;
                $treatment->patient_id = $request->id_patient;
                $treatment->doctor_id = $request->id_doctor;
                $treatment->specailty_id = $request->id_specialty;
                $treatment->price_total = 0;
                $treatment->save();


                $detail_last = TramentDetail::where('treatment_id',$request->id)->get();
                foreach ($detail_last as $det) {
                     $deta =  TramentDetail::find($det->id);
                     $deta->delete();
                }



                $detalles = $request->detail;
                $total_price = 0;
                foreach ($detalles as $ep => $det) {
                    $detail = new TramentDetail();
                    $detail->treatment_id = $treatment->id;
                    $detail->procedure_id = $det['procedure_id'];
                    $detail->description = $det['description'];
                    $detail->quantity = $det['quantity'];
                    $detail->price = $det['price'];
                    $detail->price_unit = $det['price_unit'];
                    $detail->save();
                    $total_price = $total_price + $detail->price;
                }
                $treatment->price_total = $total_price;
                $treatment->save();

                $this->destroyFile($treatment->file);
                $this->savePdfTreatment($treatment->id);


                 DB::commit();

                return response()->json([
                    'success' => true,
                    'treatment' => $treatment
                ], 200);

            }else{
                 return response()->json([
                        'errors' => $e,
                        ], 422);
            }


        } catch (Exception $e) {
            DB::rollback();
            return response()->json([
                'errors' => $e,
            ], 422);
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
        $treatment = MedicalTreatment::find($id);
        $treatment_cp = $treatment;

        $treatment->delete();
        return response()->json([
            'success'=>true,
            'treatment'=>$treatment_cp
        ]);
    }

    public function decline($id)
    {
        $treatment = MedicalTreatment::find($id);
        $treatment->status="anulado";
        $treatment->save();
        return response()->json([
            'success'=>true,
            'treatment'=>$treatment
        ]);
    }

    public function downloadPdfTreatment($id)
    {
        $treatment = DB::table('medical_treatments')
            ->join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.patient_id',
                'medical_treatments.doctor_id',
                'medical_treatments.specailty_id',
                'medical_treatments.id',
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.address',
                'patients.city',
                'patients.ci',
                'patients.phone',
                'patients.phone_2 as phone2',
                'patients.email',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('medical_treatments.id', $id)
            ->first();
        $details = TramentDetail::where('treatment_id', $id)->get();
       // return view('pdf.pdf', compact('treatment', 'details'));
        $pdf = PDF::loadView('pdf.pdf', compact('treatment', 'details'));
        // return view('pdf.ordenesPdf');
        //$pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'tratamiento-' . $treatment->id . '.pdf';

        return $pdf->download($nombrePdf);
        //return view('pdf.treatmentPdf', compact('treatment', 'details'));
    }

    public function savePdfTreatment($id)
    {
        $treatment = DB::table('medical_treatments')
            ->join('patients', 'medical_treatments.patient_id', '=', 'patients.id')
            ->join('doctors', 'medical_treatments.doctor_id', '=', 'doctors.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'medical_treatments.patient_id',
                'medical_treatments.doctor_id',
                'medical_treatments.specailty_id',
                'medical_treatments.id',
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.address',
                'patients.city',
                'patients.ci',
                'patients.phone',
                'patients.phone_2 as phone2',
                'patients.email',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('medical_treatments.id', $id)
            ->first();
        $details = TramentDetail::where('treatment_id', $id)->get();
        $pdf = PDF::loadView('pdf.pdf', compact('treatment', 'details'));
        $nombrePdf = 'tratamiento-' . $treatment->id . '.pdf';
        $path = public_path('storage/treatments/');
        $pdf->save($path . '/' . $nombrePdf);
        //return $pdf->download($nombrePdf);
      
    }

     public function destroyFile($path_file)
    {
        if (File::exists(public_path($path_file))) {

            File::delete(public_path($path_file));

        }
    }

    
}
