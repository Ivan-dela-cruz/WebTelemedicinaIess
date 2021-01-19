<?php

namespace App\Http\Controllers\admin;

use App\Appointment;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\MedicalTreatment;
use App\Patients;
use App\Payment;
use App\Specialty;
use App\User;
use App\Recipes;
use App\VoucherPayment;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Barryvdh\DomPDF\Facade as PDF;


class PanelController extends Controller
{
    public function index()
    {
        $now = Carbon::now();
        $month = $now->month;
        $day = $now->day;

        $doctors_count = Doctor::where('status', 'activo')->count();
        $patients_count = Patients::where('status', 'activo')->count();
        $specialties_count = Specialty::where('status', 'activo')->count();
        $users_count = User::where('status', 'activo')->count();
        $treatments_count = MedicalTreatment::where('status', 'pendiente')->count();
        $appointments_count = Appointment::where('status', 'Atendido')->count();
        $appointments_count_an = Appointment::where('status', 'Anulado')->count();
        $appointments_count_no = Appointment::where('status', 'No asiste')->count();
        $recipes_count = Recipes::where('status', 'activo')->count();
        $patients_count_month = Patients::whereMonth('created_at', $month)->where('status', 'activo')->count();
        $treatments_count_month = MedicalTreatment::whereMonth('created_at', $month)->count();
        $payments_count_month = Payment::where('status', 'cancelado')->count();
        $payments_sum_month = VoucherPayment::where('status', 'pagado')->whereMonth('created_at', $month)->sum('total');

        $appointments_count_an = $appointments_count_an + $appointments_count_no;
        $appointments_count_day = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.id_specialty',
                'appointments.color',
                'appointments.reason',
                'appointments.created_at',
                'appointments.updated_at',
                'appointments.status',
                'appointments.date',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'doctors.last_name as last_name_d',
                'doctors.name as name_d'
            )
            ->orderBy('appointments.created_at', 'ASC')
            ->where('appointments.status', 'Confirmado')
            ->whereDay('appointments.date', $day)
            ->get();
        $appointments_month = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.id_specialty',
                'appointments.color',
                'appointments.reason',
                'appointments.created_at',
                'appointments.updated_at',
                'appointments.status',
                'appointments.date',
                'appointments.start',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.url_image',
                'patients.ci',
                'patients.last_name as last_name_p',
                'doctors.last_name as last_name_d',
                'doctors.name as name_d'
            )
            ->orderBy('appointments.created_at', 'ASC')
            ->where('appointments.status', 'Pendiente')
            ->whereMonth('appointments.date', $month)
            ->get();


        return view('admin.init.panel',
            compact('doctors_count', 'specialties_count', 'users_count',
                'treatments_count', 'appointments_count', 'patients_count',
                'appointments_count_an', 'patients_count_month', 'treatments_count_month',
                'appointments_count_day', 'appointments_month', 'payments_count_month',
                'payments_sum_month','recipes_count'
            ));

    }

    public function confirmApp(Request $request)
    {
        try {
            $appointment = Appointment::find($request->id);
            $appointment->status = $request->status;
            $appointment->save();

            return response()->json([
                'success' => true,
                'app' => $appointment
            ], 200);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false
            ], 422);

        }

    }

    public function getTableAppointments()
    {

        $now = Carbon::now();
        $month = $now->month;
        $appointments_month = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.id_specialty',
                'appointments.color',
                'appointments.reason',
                'appointments.created_at',
                'appointments.updated_at',
                'appointments.status',
                'appointments.date',
                'appointments.start',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.url_image',
                'patients.ci',
                'patients.last_name as last_name_p',
                'doctors.last_name as last_name_d',
                'doctors.name as name_d'
            )
            ->orderBy('appointments.created_at', 'ASC')
            ->where('appointments.status', 'Pendiente')
            ->whereMonth('appointments.date', $month)
            ->get();
        return view('admin.init.tableAppointments', compact('appointments_month'))->render();

    }

    public function report(Request $request){
        $request_month = $request->month;
        $request_date = $request->date;

        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $day = $now->day;
        $date =  $now->format('Y-m-d');
        if($request->date != $date){
            $date = $request->date;
        }
       

        if(!$request_month && !$request_date){
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
                ->orderBy('payments.updated_at', 'DESC')
                ->whereDate('payments.created_at',$date)
                ->get();
               return view('admin.reports.index',compact('request_month','request_date','payments','date'));

        }
       

        if($request_month=='0'){
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
                ->orderBy('payments.updated_at', 'DESC')
                ->whereYear('payments.created_at',$year)
                ->get();
                return view('admin.reports.index',compact('request_month','request_date','payments','date'));
        }
        if($request_month>0){
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
                ->orderBy('payments.updated_at', 'DESC')
                ->whereMonth('payments.created_at',$request_month)
                ->get();
                return view('admin.reports.index',compact('request_month','request_date','payments','date'));
        }
        if($request_month=='a' && $request_date){
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
                ->orderBy('payments.updated_at', 'DESC')
                ->whereDate('payments.created_at',$request_date)
                ->get();
                return view('admin.reports.index',compact('request_month','request_date','payments','date'));
        }
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
                ->orderBy('payments.updated_at', 'DESC')
                ->get();
                return view('admin.reports.index',compact('request_month','request_date','payments','date'));

        
        
    }

    public function reportPdf(Request $request){
        $request_month = $request->month;
        $request_date = $request->date;

        $now = Carbon::now();
        $year = $now->year;
        $month = $now->month;
        $day = $now->day;
        $date =  $now->format('Y-m-d');
        if($request->date != $date){
            $date = $request->date;
        }
       

        if(!$request_month && !$request_date){
           
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
            ->orderBy('payments.updated_at', 'DESC')
            ->whereDate('payments.created_at',$date)
            ->get();
        $pdf = PDF::loadView('pdf.report_payments_all', compact('payments'));
         return $pdf->download("reporte".time().".pdf");

        }
       

        if($request_month=='0'){
             
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
            ->orderBy('payments.updated_at', 'DESC')
            ->whereYear('payments.created_at',$year)
            ->get();
            $pdf = PDF::loadView('pdf.report_payments_all', compact('payments'));
            return $pdf->download("reporte".time().".pdf");
        }
        if($request_month>0){
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
                ->orderBy('payments.updated_at', 'DESC')
                ->whereMonth('payments.created_at',$request_month)
                ->get();
                $pdf = PDF::loadView('pdf.report_payments_all', compact('payments'));
                return $pdf->download("reporte".time().".pdf");
        }
        if($request_month=='a' && $request_date){
        
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
                ->orderBy('payments.updated_at', 'DESC')
                ->whereDate('payments.created_at',$request_date)
                ->get();
                $pdf = PDF::loadView('pdf.report_payments_all', compact('payments'));
                return $pdf->download("reporte".time().".pdf");
        }
         
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
                ->orderBy('payments.updated_at', 'DESC')
                ->get();
                $pdf = PDF::loadView('pdf.report_payments_all', compact('payments'));
                return $pdf->download("reporte".time().".pdf");

    }

}
/*
 * CONSULTA POR GUPOS
        $appointments_chart = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')

            ->select(
                'appointments.id',
                'appointments.id_specialty',
                'appointments.color',
                'appointments.created_at',
                'appointments.status',
                'specialties.name as name',
                DB::raw('count(appointments.id_specialty) as citas')
            )
            ->groupBy('appointments.id_specialty')
            ->orderBy('appointments.created_at', 'ASC')
            ->where('appointments.status', 'Atendido')
            ->get();
*/
