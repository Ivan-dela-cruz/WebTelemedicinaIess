<?php

namespace App\Http\Controllers\admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\MedicalTreatment;
use App\Patients;
use App\Payment;
use App\TypeVoucher;
use App\VoucherPayment;
use App\TramentDetail;
use Carbon\Carbon;
use Illuminate\Http\Request;
use phpDocumentor\Reflection\Type;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;

use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;
use App\User;


class PymentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create($id)
    {
        $documents = TypeVoucher::where('status', 'activo')->orderBy('document', 'ASC')->get(['id', 'document', 'start', 'end', 'serie', 'sequence']);
        $date = Carbon::now(env("APP_TIMEZONE"))->format('Y-m-d h:i:s');
        $treatment = MedicalTreatment::join('patients', 'patients.id', '=', 'medical_treatments.patient_id')
            ->join('doctors', 'doctors.id', '=', 'medical_treatments.doctor_id')
            ->join('specialties', 'specialties.id', '=', 'medical_treatments.specailty_id')
            ->select(
                'medical_treatments.id', 'medical_treatments.reason', 'medical_treatments.description', 'medical_treatments.price_total', 'medical_treatments.created_at',
                'medical_treatments.status', 'medical_treatments.status_pay', 'medical_treatments.num_pay', 'medical_treatments.patient_id as id_patient',
                'medical_treatments.doctor_id as id_doctor', 'medical_treatments.specailty_id as id_specialty',
                'patients.name as name_p', 'patients.last_name as last_name_p', 'patients.ci', 'patients.address',
                'doctors.name as name_d', 'doctors.last_name as last_name_d',
                'specialties.name as name_s'
            )
            ->where('medical_treatments.id', $id)
            ->first();
        $payment = Payment::where('id_treatment', $id)->where('status', 'pendiente')->first();
        if ($payment == null) {

            return response()->json([
                'success' => true,
                'treatment' => $treatment,
                'documents' => $documents,
                'date' => $date,
                'payment' => $payment,
                'detail_payment' => null
            ]);
        } else {
            $detail_payment = VoucherPayment::where('id_payment', $payment->id)->get();
            return response()->json([
                'success' => true,
                'treatment' => $treatment,
                'documents' => $documents,
                'date' => $date,
                'payment' => $payment,
                'detail_payment' => $detail_payment
            ]);

        }


    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        try {

            DB::beginTransaction();
            $treatment = MedicalTreatment::find($request->id_treatment);

            $now = Carbon::now(env("APP_TIMEZONE"))->format('Y-m-d h:i:s');

            $document = TypeVoucher::find($request->id_type);

            $payment = new Payment();

            $payment->id_type = $request->id_type;
            $payment->id_patient = $request->id_patient;
            $payment->id_doctor = $request->id_doctor;
            $payment->id_treatment = $request->id_treatment;
            $payment->serie = $request->serie;
            $payment->sequence_char = $this->getCharSecuence($document->sequence + 1);
            $payment->sequence_int = $document->sequence + 1;
            $payment->type_pay = $request->type_pay;
            $payment->date_pay = $now;
            $payment->dues = $request->dues;
            $payment->received = $request->received;
            $payment->turned = $request->turned;
            $payment->total = $treatment->price_total;
            $payment->discount = $request->discount;

            $payment->interval = $request->interval;

            $payment->save();


            $document->sequence = $document->sequence + 1;
            $document->save();


            $num = $request->num_det;


            $detalles = $request->detail;
            $total_payment_now = 0;

            if (count($detalles) > 0) {

                foreach ($detalles as $ep => $det) {
                    $voucher_detail = new  VoucherPayment();
                    $voucher_detail->id_patient = $treatment->patient_id;
                    $voucher_detail->id_payment = $payment->id;
                    $voucher_detail->number_dues = $det['number_dues'];
                    $voucher_detail->description = $det['description'];
                    $voucher_detail->total = $det['total'];
                    $voucher_detail->date_pay = $det['date_pay'];
                    $voucher_detail->ischeck = $det['ischeck'];
                    $voucher_detail->save();
                    if ($det['ischeck'] == true) {
                        $voucher_detail->status = "pagado";
                        $total_payment_now = $total_payment_now + 1;
                    } else {
                        $voucher_detail->status = "pendiente";
                    }
                    $voucher_detail->save();

                }
            }
            if ($total_payment_now == $payment->dues) {
                $treatment->status = "cancelado";
                $treatment->num_pay = $payment->dues;
                $treatment->save();
                
            } else {
                $treatment->status = "proceso";
                $treatment->num_pay = $payment->dues;
                $treatment->save();
                
            }

            $this->savePdfPayment($payment->id);
            $payment->url_file = 'storage/payments/comprobante-tratamiento-' . $payment->id . '.pdf';
            $payment->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'payment' => $payment
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
        $details = TramentDetail::where('treatment_id', $id)->get();
        return response()->json([
            'details' => $details,
            'success' => true
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function detail($id)
    {
        $detail = VoucherPayment::where("id_payment",$id)->get();

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
            $treatment = MedicalTreatment::find($request->id_treatment);

            $payment = Payment::find($request->id);


            $payment->received = $request->received;
            $payment->turned = $request->turned;
            $payment->total = $treatment->price_total;
            $payment->discount = $request->discount;

            $payment->save();

            $num = $request->num_det;


            $detalles = $request->detail;
            $total_payment_now = 0;

            if (count($detalles) > 0) {

                foreach ($detalles as $ep => $det) {
                    $voucher_detail = VoucherPayment::find($det['id']);

                    $voucher_detail->ischeck = $det['ischeck'];
                    if ($det['ischeck'] == true) {
                        if ($voucher_detail->status == "expirado" || $voucher_detail->status == "pendiente") {
                            $voucher_detail->status = "pagado";
                        }

                    } else {
                        $voucher_detail->status = "pendiente";
                    }
                    $voucher_detail->save();
                    if ($voucher_detail->status == "pagado") {
                        $total_payment_now = $total_payment_now + 1;
                    }
                }
            }

            if ($total_payment_now == $payment->dues) {
                $treatment->status = "cancelado";
                $treatment->save();


            }
            $this->destroyFile($payment->url_file);
            $this->savePdfPayment($payment->id);
            $payment->url_file = 'storage/payments/comprobante-tratamiento-' . $payment->id . '.pdf';
            $payment->save();
            DB::commit();
            return response()->json([
                'success' => true,
                'payment' => $payment
            ], 200);
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
    public function destroy($id)
    {
        //
    }

    public function getNumberSequence($id)
    {
        $document = TypeVoucher::find($id);

        return response()->json([
            'document' => $document
        ], 200);
    }

    public function getCharSecuence($number)
    {
        if ($number < 10) {
            return '000000000' . $number;

        }
        if ($number < 100) {
            return '00000000' . $number;

        }
        if ($number < 1000) {
            return '0000000' . $number;

        }
        if ($number < 1000) {
            return '000000' . $number;

        }
        if ($number < 1000) {
            return '00000' . $number;

        }
        if ($number < 10000) {
            return '0000' . $number;

        }
        if ($number < 100000) {
            return '000' . $number;

        }
        if ($number < 1000000) {
            return '00' . $number;

        }
        if ($number < 10000000) {
            return '0' . $number;

        }
        if ($number < 100000000) {
            return $number;
        }

    }


    public function getPaymentPatients($id)
    {
        $payments = DB::table('payments')
            ->join('patients', 'payments.id_patient', '=', 'patients.id')
            ->join('doctors', 'payments.id_doctor', '=', 'doctors.id')
            ->join('type_vouchers', 'payments.id_type', '=', 'type_vouchers.id')
            ->join('medical_treatments', 'payments.id_treatment', '=', 'medical_treatments.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'payments.id_patient',
                'payments.id_doctor',
                'payments.id_treatment',
                'payments.id',
                'type_vouchers.document',
                'payments.updated_at',
                'payments.dues',


                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('payments.id_patient', $id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'payments' => $payments
        ], 200);
    }

    /*
     * El método de getDiagnostigPatientsReport recibe como parametro el id del paciente,
     * y retorna los un archivo pdf, se busca el paciente para despues obtener el id,
     * finalmente de ejecuta un QuerySet de las cinco entidades, payments, patients,doctors,type_vouchers,
     * medical_treatments, specialties.
     * Una vez obtenido los datos procemos a crear un Objeto PDF, le asignamos las view en BLADE,
     * y la coleccion de los datos del paciente y los pagos.
     */
    public function getPaymentPatientsReport($id)
    {
        $patient = Patients::find($id);
        $payments = DB::table('payments')
            ->join('patients', 'payments.id_patient', '=', 'patients.id')
            ->join('doctors', 'payments.id_doctor', '=', 'doctors.id')
            ->join('type_vouchers', 'payments.id_type', '=', 'type_vouchers.id')
            ->join('medical_treatments', 'payments.id_treatment', '=', 'medical_treatments.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'payments.id',
                'type_vouchers.document',
                'payments.updated_at',
                'payments.created_at',
                'payments.dues',
                'payments.type_pay',
                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.price_total',
                'patients.ci',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('payments.id_patient', $id)
            ->orderBy('updated_at', 'DESC')
            ->get();
        $pdf = PDF::loadView('pdf.report_payments', compact('payments', 'patient'));
        //$pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'reporte-pagos - ' . $patient->name . '  ' . $patient->last_name . '  ' . time() . '.pdf';
        return $pdf->download($nombrePdf);
    }


    public function downloadPdfPayment($id)
    {
        $payment = DB::table('payments')
            ->join('patients', 'payments.id_patient', '=', 'patients.id')
            ->join('doctors', 'payments.id_doctor', '=', 'doctors.id')
            ->join('type_vouchers', 'payments.id_type', '=', 'type_vouchers.id')
            ->join('medical_treatments', 'payments.id_treatment', '=', 'medical_treatments.id')
            ->join('specialties', 'specialties.id', '=', 'medical_treatments.specailty_id')
            ->select(
                'payments.id_patient',
                'payments.id_doctor',
                'payments.id_treatment',
                'payments.id',
                'type_vouchers.document',

               
                'payments.date_pay',

                'payments.type_pay',
                'payments.sequence_char',
                'payments.serie',
                'payments.dues',

                'payments.created_at',
                'payments.interval',

                'medical_treatments.status',
                 'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'medical_treatments.reason',
                'medical_treatments.description',
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
            ->where('payments.id', $id)
            ->first();

        
        $details = VoucherPayment::where('id_payment', $id)->get();

        // return view('pdf.pdf', compact('treatment', 'details'));
        $pdf = PDF::loadView('pdf.payment', compact('payment', 'details'));
        // return view('pdf.ordenesPdf');
        //$pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'comprobante-tratamiento-' . $payment->id . '.pdf';

        return $pdf->download($nombrePdf);
        //return view('pdf.treatmentPdf', compact('treatment', 'details'));
    }


    public function getPaymentPatientsUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $patient = Patients::where("ci", $user->ci)->first();

        $payments = DB::table('payments')
            ->join('patients', 'payments.id_patient', '=', 'patients.id')
            ->join('doctors', 'payments.id_doctor', '=', 'doctors.id')
            ->join('type_vouchers', 'payments.id_type', '=', 'type_vouchers.id')
            ->join('medical_treatments', 'payments.id_treatment', '=', 'medical_treatments.id')
            ->join('specialties', 'medical_treatments.specailty_id', '=', 'specialties.id')
            ->select(
                'payments.id_patient',
                'payments.id_doctor',
                'payments.id_treatment',
                'payments.id',
                'type_vouchers.document',
                'payments.updated_at',
                'payments.dues',
                'payments.url_file',


                'medical_treatments.reason',
                'medical_treatments.description',
                'medical_treatments.status',
                'medical_treatments.status_pay',
                'medical_treatments.price_total',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d',
                'specialties.name as name_s')
            ->where('payments.id_patient', $patient->id)
            ->orderBy('updated_at', 'DESC')
            ->get();

        return response()->json([
            'success' => true,
            'payments' => $payments
        ], 200);
    }

      public function savePdfPayment($id)
    {
        $payment = DB::table('payments')
            ->join('patients', 'payments.id_patient', '=', 'patients.id')
            ->join('doctors', 'payments.id_doctor', '=', 'doctors.id')
            ->join('type_vouchers', 'payments.id_type', '=', 'type_vouchers.id')
            ->join('medical_treatments', 'payments.id_treatment', '=', 'medical_treatments.id')
            ->join('specialties', 'specialties.id', '=', 'medical_treatments.specailty_id')
            ->select(
                'payments.id_patient',
                'payments.id_doctor',
                'payments.id_treatment',
                'payments.id',
                'type_vouchers.document',

                
                'payments.date_pay',

                'payments.type_pay',
                'payments.sequence_char',
                'payments.serie',
                'payments.dues',

                'payments.created_at',
                'payments.interval',

                'medical_treatments.status',
                'medical_treatments.updated_at',
                'medical_treatments.price_total',
                'medical_treatments.reason',
                'medical_treatments.description',
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
            ->where('payments.id', $id)
            ->first();
        $details = VoucherPayment::where('id_payment', $id)->get();

        // return view('pdf.pdf', compact('treatment', 'details'));
        $pdf = PDF::loadView('pdf.payment', compact('payment', 'details'));
        // return view('pdf.ordenesPdf');
        //$pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'comprobante-tratamiento-' . $payment->id . '.pdf';
        $path = public_path('storage/payments/');
        $pdf->save($path . '/' . $nombrePdf);
        //return $pdf->download($nombrePdf);
        //return view('pdf.treatmentPdf', compact('treatment', 'details'));
    }

      public function destroyFile($path_file)
    {
        if (File::exists(public_path($path_file))) {

            File::delete(public_path($path_file));

        }
    }

}
