<?php

namespace App\Http\Controllers\admin;

use App\Appointment;
use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreAppointmentPost;
use App\Patients;
use App\Specialty;
use App\User;
use Carbon\Carbon;
use http\Env\Response;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Tymon\JWTAuth\JWT;
use Tymon\JWTAuth\Facades\JWTAuth;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $text_search = $request->text_search;
        /* $appointments = Patients::where(function ($query) use ($text_search) {
            $query = $query->orWhere('name', 'like', '%' . $text_search . '%');
            $query = $query->orWhere('last_name', 'like', '%' . $text_search . '%');
            $query = $query->orWhere('email', 'like', '%' . $text_search . '%');
            $query = $query->orWhere('phone', 'like', '%' . $text_search . '%');
            $query = $query->orWhere('ci', 'like', '%' . $text_search . '%');
        })->whit(['apo']);

*/
        $now = Carbon::now()->format('Y-m-d');
        $now_date = Carbon::now();
        $month = $now_date->month;

        $appointments = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.color',
                'appointments.reason',
                'appointments.observation',
                'appointments.date',
                'appointments.start',
                'appointments.status',
                'appointments.end',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'patients.ci',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d'
            )
            ->orderBy('appointments.id', 'desc')
            ->where('appointments.status','Confirmado')
            ->orWhere('appointments.status','Atendido')
            ->get();
            $count_request = Appointment::where('status','Pendiente')
              ->whereMonth('date',$month)
              ->count();
        return response()->json([
            'success'=>true,
            'now'=>$now,
            'appointments' => $appointments,
            'count'=>$count_request
        ], 200);
    }

     public function requestMonthAppointment(Request $request)
    {
        $text_search = $request->text_search;
        $now = Carbon::now()->format('Y-m-d');
        $now_date = Carbon::now();
        $month = $now_date->month;
        $day = $now_date->day;

        $appointments = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.id_patient',
                'appointments.id_doctor',
                'appointments.id_specialty',
                'appointments.color',
                'appointments.reason',
                'appointments.observation',
                'appointments.date',
                'appointments.start',
                'appointments.status',
                'appointments.end',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'patients.ci',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d'
            )
            ->orderBy('appointments.id', 'desc')
            ->whereMonth('appointments.created_at',$month)
            ->where('appointments.status','Pendiente')
            ->get();
            
        return response()->json([
            'success'=>true,
            'now'=>$now,
            'appointments' => $appointments
            
        ], 200);

       
    }

    public function getTimesAvailable(Request $request)
    {
        $id_docto = $request->id_doctor;
        $id_specialty = $request->id_specialty;
        $date = $request->date;
        $times_available = Appointment::whereDate('date', $date)
            ->where('status', 'Confirmado')
            ->where('id_doctor', $id_docto)
            ->where('id_specialty', $id_specialty)
            ->get(['id', 'start', 'end', 'date']);
        return response()->json([
            'success' => true,
            'times' => $times_available,
            'date' => $request->date,
            'id_d' => $request->id_doctor,
            'id_sp' => $request->id_specialty
        ], 200);
    }


    public function getAppointments()
    {
        return view('admin.appointments.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
      
        $now = Carbon::now()->format('Y-m-d');
       
        $appointments = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.id_patient',
                'appointments.id_doctor',
                'appointments.id_specialty',
                'appointments.color',
                'appointments.reason',
                'appointments.observation',
                'appointments.date',
                'appointments.start',
                'appointments.status',
                'appointments.end',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'patients.ci',
                'doctors.name as name_d',
                'doctors.last_name as last_name_d'
            )
            ->orderBy('appointments.id', 'desc')
            ->get();
            
        return response()->json([
            'success'=>true,
            'now'=>$now,
            'appointments' => $appointments
            
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    /*
     * Método para crear una cita médica recibe como parámetro
     * los datos correspondientes al formulario, y estos son evaluados por el
     * método de validación StoreAppointmentPost este archivo contiene las validaciones
     * de los campos que llegan a treves del formulario, pasado la evaluación se inicia
     * una transacción con la base de datos, si no existe ningún error en los datos se
     * ejecuta un commit a la base de datos, caso contrario se realiza un rollback de los
     * cambios dentro de la transacción abierta. Retorna con un estado 422 para errores
     * y 200 para satisfactorio.
    */
    public function store(StoreAppointmentPost $request)
    {
        $validate = $request->validated();
        $appointment = new  Appointment();
        $appointment->reason = $request->reason;
        $appointment->start = $request->start;
        $appointment->end = $request->end;
        $appointment->date = $request->date;
        $appointment->observation = $request->observation;
        $appointment->id_patient = $request->id_patient;
        $appointment->id_doctor = $request->id_doctor;
        $appointment->id_specialty = $request->id_specialty;
        $appointment->color = $request->color;
        $appointment->status = $request->status;
        $appointment->save();
        return response()->json([
            'success' => true,
            'appointment' => $appointment
        ], 200);
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
    public function update(StoreAppointmentPost $request)
    {
        $validate = $request->validated();
        $appointment = Appointment::find($request->id);
        $appointment->reason = $request->reason;
        $appointment->start = $request->start;
        $appointment->end = $request->end;
        $appointment->date = $request->date;
        $appointment->observation = $request->observation;
        $appointment->id_patient = $request->id_patient;
        $appointment->id_doctor = $request->id_doctor;
        $appointment->id_specialty = $request->id_specialty;
        $appointment->color = $request->color;
        $appointment->status = $request->status;
        $appointment->save();
        return response()->json([
            'success' => true,
            'appointment' => $appointment
        ], 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function delete($id)
    {
        $appointment= Appointment::find($id);
        $appointment->delete();
        return response()->json([
            'success'=>true,
        ],200);
    }

    public function requestAppointment(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $patient = Patients::where("ci", $user->ci)->first();
        $specialty = Specialty::find($request->id_specialty);

        $appointment = new  Appointment();
        $appointment->reason = $request->reason;
        $appointment->start = $request->start;
        $appointment->end = $request->end;
        $appointment->date = $request->date;
        $appointment->observation = $request->observation;
        $appointment->id_patient = $patient->id;
        $appointment->id_doctor = $request->id_doctor;
        $appointment->id_specialty = $request->id_specialty;
        $appointment->color = $specialty->color;
        $appointment->status = $request->status;
        $appointment->save();
        return response()->json([
            'success' => true,
            'appointment' => $appointment
        ], 200);
    }

    public function getAppointmentsUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $patient = Patients::where("ci", $user->ci)->first();
        $date = Carbon::now("America/Guayaquil");
        $date = $date->toDateString();


        $appointments = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.color',
                'appointments.reason',
                'appointments.observation',
                'appointments.date',
                'appointments.start',
                'appointments.end',
                'appointments.status',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'patients.ci',
                'doctors.name as name_d',
                'doctors.url_image',
                'doctors.last_name as last_name_d'
            )
            ->whereDate("appointments.date", $date)
            ->where("appointments.id_patient", $patient->id)
            ->where("appointments.status", "Confirmado")
            ->orderBy("start","ASC")
            ->get();


        return response()->json([
            "success" => true,
            "appointments" => $appointments
        ], 200);
    }


    public function getAppointmentsHistoryUser(Request $request)
    {
        $user = User::find(Auth::user()->id);
        $patient = Patients::where("ci", $user->ci)->first();
        $date = Carbon::now("America/Guayaquil");
        $date = $date->toDateString();


        $appointments = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.created_at',
                'appointments.color',
                'appointments.reason',
                'appointments.observation',
                'appointments.date',
                'appointments.start',
                'appointments.end',
                'appointments.status',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'patients.ci',
                'doctors.name as name_d',
                'doctors.url_image',
                'doctors.last_name as last_name_d'
            )
            ->where("appointments.id_patient", $patient->id)
            ->orderBy("created_at","DESC")
            ->get();


        return response()->json([
            "success" => true,
            "appointments" => $appointments
        ], 200);
    }

    public function getAppointmentsFromPatient($id){

        $patient = Patients::find($id);


        $appointments = Appointment::join('patients', 'appointments.id_patient', '=', 'patients.id')
            ->join('doctors', 'appointments.id_doctor', '=', 'doctors.id')
            ->join('specialties', 'appointments.id_specialty', '=', 'specialties.id')
            ->select(
                'appointments.id',
                'appointments.id_patient',
                'appointments.id_doctor',
                'appointments.id_specialty',
                'appointments.color',
                'appointments.reason',
                'appointments.observation',
                'appointments.date',
                'appointments.start',
                'appointments.end',
                'appointments.status',
                'appointments.created_at',
                'specialties.name as specialty',
                'patients.name as name_p',
                'patients.last_name as last_name_p',
                'patients.ci',
                'doctors.name as name_d',
                'doctors.url_image',
                'doctors.last_name as last_name_d'
            )

            ->where("appointments.id_patient", $patient->id)
            ->orderBy("created_at","DESC")
            ->get();


        return response()->json([
            "success" => true,
            "appointments" => $appointments

        ], 200);
    }

     public function changeStatus(Request $request)
    {
       
            $appointment = Appointment::find($request->id);
            $appointment->status = $request->status;
            $appointment->save();

            return response()->json([
                'success' => true,
                'app' => $appointment
            ], 200);
       

    }

    public function appointments_general(){
        return view('admin.appointments.appointments');
    }


}
