<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\StorePatientPost;
use App\Http\Requests\UpdatePatientPut;
use App\MedicalRecord;
use App\Patients;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;

use Barryvdh\DomPDF\Facade as PDF;

class PatientController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $text_search = $request->text_search;

        if ($text_search == '' || $text_search == null) {
            $users = Patients::paginate(5);
            return response()->json([
                'users' => $users,

            ], 200);
        } else {
            $users = Patients::where(function ($query) use ($text_search) {
                $query = $query->orWhere('name', 'like', '%' . $text_search . '%');
                $query = $query->orWhere('last_name', 'like', '%' . $text_search . '%');
                $query = $query->orWhere('ci', 'like', '%' . $text_search . '%');
                $query = $query->orWhere('email', 'like', '%' . $text_search . '%');
            })->paginate(5);

            return response()->json([
                'users' => $users,
            ], 200);
        }
    }


    public function getPatients()
    {
        return view('admin.patients.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
///CAMPOS EN LA BASE DE DATOS
    //name, last_name,username,birth_date, gender, address, province, city, phone, url_image, email, password, status
    /*
     * Método para la creación de un nuevo paciente recibe como parámetro
     * un los datos correspondientes al formulario, y estos son evaluados por el
     * método de validación StorePatientPost este archivo contiene las validaciones
     * de los campos que llegan a treves del formulario, pasado la evaluación se inicia
     * una transacción con la base de datos, este metodo interactua con tres entidades
     * patients, users y role_has_model si no existe ningún error en los datos se
     * ejecuta un commit a la base de datos, caso contrario se realiza un rollback de los
     * cambios dentro de la transacción abierta. Retorna con un estado 422 para errores
     * y 200.
    */

    public function store(StorePatientPost $request)
    {
        try {
            $validate = $request->validated();
            DB::beginTransaction();
            $user = new  User;
            $user->ci = $request->ci;
            $user->type_document = $request->type_document;
            $user->name = $request->name;
            $user->last_name = $request->last_name;
            $user->address = $request->address;
            $user->phone = $request->phone;
            $user->email = $request->email;
            $user->status = $request->status;
            $user->password = $this->generatePassword($request->ci);
            $user->url_image = $this->UploadImage($request);
            $user->save();
            //ASINAMOS EL ROL DE PACIENTE CON EL ID 3
            $role = Role::findById(3);
            $user->assignRole($role);
            //LLENAR LOS DATOS CORRESPONDIENTES A LA TABLA PATITIENTS/
            $patient = new Patients();
            $patient->ci = $request->ci;
            $patient->type_document = $request->type_document;
            $patient->name = $request->name;
            $patient->last_name = $request->last_name;
            $patient->birth_date = $request->birth_date;
            $patient->gender = $request->gender;
            $patient->address = $request->address;
            $patient->province = $request->province;
            $patient->city = $request->city;
            $patient->phone = $request->phone;
            $patient->phone_2 = $request->phone_2;
            $patient->email = $request->email;
            $patient->status = $request->status;
            $patient->instruction = $request->instruction;
            $patient->marital_status = $request->marital_status;

            $patient->allergy = $request->allergy;
            $patient->job = $request->job;
            $patient->blood_type = $request->blood_type;
            $patient->observation = $request->observation;
            $patient->history_medical = $request->history_medical;
            //ASIGNAMOS LA MISM RUTA DE LA IMAGEN DEL USUARIO
            $patient->url_image = $user->url_image;
            //RELACIONEAMOS LA CLAVE PRIMARIA DEL OBJETO USER CON LA FOREING KEY DEL OBJETO PATIENT
            $patient->id_user = $user->id;
            $patient->save();

            $medical_record = new MedicalRecord();
            $medical_record->code = "" . $patient->id;
            $medical_record->id_patient = $patient->id;
            $medical_record->save();

            DB::commit();
            return response()->json($user, 200);
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
        $patient = Patients::find($id);

        return response()->json([
            'patient' => $patient
        ], 200);
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
    public function update(UpdatePatientPut $request, $id)
    {
        ///CAMPOS EN LA BASE DE DATOS
        //name, last_name,username,birth_date, gender, address, province, city, phone, url_image, email, password, status
        ///BASE DE DATOS PATIENTS
        //'birth_hostital','instruction','marital_status','affiliate','allergi','id_user','job','boold_type','observation','history_medical'


        $validate = $request->validated();
        ///bUSCAMOS LOS DATOS DEL USUARIO Y MODIFICAMOS  LOS DATOS CORRESPONDINTES A  LA TABLA USERS

        //CONUSLTAMOS LOS DATOS CORRESPONDIENTES A AL USUSARIO EN LA TABLA PACIENTES Y MODIFICAM0S LOS DATOS CORRESPONDIENTES A LA TABLA PATITIENTS/
        $patient = Patients::find($id);
        $user = User::where('id', $patient->id_user)->first();
        $user->ci = $request->ci;
        $user->type_document = $request->type_document;
        $user->name = $request->name;
        $user->last_name = $request->last_name;
        $user->address = $request->address;
        $user->phone = $request->phone;
        $user->email = $request->email;
        $user->status = $request->status;
        if ($request->url_image) {
            if ($user->url_image != $request->url_image) {
                $user->url_image = $this->UploadImage($request);
            }
        }

        $user->save();
        //MODIFICAMOS LOS CAMBIOS PARA LA TABLA PATIENTS/
        $patient->ci = $request->ci;
        $patient->type_document = $request->type_document;
        $patient->name = $request->name;
        $patient->last_name = $request->last_name;
        $patient->birth_date = $request->birth_date;
        $patient->gender = $request->gender;
        $patient->address = $request->address;
        $patient->province = $request->province;
        $patient->city = $request->city;
        $patient->phone = $request->phone;
        $patient->phone_2 = $request->phone_2;
        $patient->email = $request->email;
        $patient->status = $request->status;
        //ASIGNAMOS LA MISMA RUTA PARA LA IMAGEN DEL USUARIO
        $patient->url_image = $user->url_image;
        $patient->instruction = $request->instruction;
        $patient->marital_status = $request->marital_status;
        $patient->allergy = $request->allergy;
        $patient->job = $request->job;
        $patient->blood_type = $request->blood_type;
        $patient->observation = $request->observation;
        $patient->history_medical = $request->history_medical;
        $patient->save();

        ///ejecutamos el commit a la base de datos

        //RETORNAMOS LOS DATOS DE PACIENTE MODIFICADO Y EL ESTADO 200
        return response()->json($patient, 200);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = User::find($id);
        ///REVOCAMOS TODOS LOS PERMISOS PARA DESPUES ASIGNARLE EL NUEVO PERMISO SELECCIONADO
        $roles_name = $user->getRoleNames();
        $user->removeRole($roles_name[0]);
        $user->delete();
    }

    public function generatePassword($password)
    {
        $user_password = Hash::make($password);
        return $user_password;
    }

    public function UploadImage(Request $request)
    {
        $url_file = "img/users/";

        if ($request->url_image && $request->url_image != '#') {
            $image = $request->get('url_image');
            $name = time() . '.' . explode('/', explode(':', substr($image, 0, strpos($image, ';')))[1])[1];
            Image::make($request->get('url_image'))->save(public_path($url_file) . $name);
            return $url_file . $name;
        } else {
            return "#";
        }
    }

    public function changeStatus($id)
    {

        $patient = Patients::find($id);

        if ($patient->status == 'activo') {
            $patient->status = 'inactivo';
        } else {
            $patient->status = 'activo';
        }
        $patient->save();
        $user = User::find($patient->id_user);
        if ($user->status == 'activo') {
            $user->status = 'inactivo';
        } else {
            $user->status = 'activo';
        }
        $user->save();

        return response()->json($patient, 200);
    }

    public function PatientsList()
    {
        $patients = Patients::where('status', 'activo')->orderBy('name', 'ASC')->get(['name', 'last_name', 'id']);

        return response()->json([
            'patients' => $patients
        ], 200);


    }

    /*
     * El método de downloadPatients realiza la extracción de todos los pacientes existentes,
     * y se realiza una extaraccion unicamente de los datos mas relevantes a imprimir.
     * Una vez obtenido los datos procemos a crear un Objeto PDF, le asignamos las view en BLADE,
     * y la coleccion de los datos del paciente y los pagos.
     */
    public function downloadPatients()
    {
        $patients = Patients::orderBy('last_name', 'ASC')
            ->get([
                'ci', 'type_document', 'name', 'last_name',
                'address', 'province', 'city', 'phone',
                'phone_2', 'email', 'status', 'created_at',
                'birth_date', 'gender', 'marital_status'
            ]);
        $pdf = PDF::loadView('pdf.pdfReportPatients', compact('patients'));
        //$pdf->setPaper('A4', 'landscape');
        $nombrePdf = 'Reporte pacientes - Souri -' . time() . '.pdf';
        return $pdf->download($nombrePdf);
    }
}
