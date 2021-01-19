<?php

namespace App\Http\Controllers\admin;

use App\Doctor;
use App\Http\Controllers\Controller;
use App\Http\Requests\StoreDoctorPost;
use App\Http\Requests\UpdateDoctorPut;
use App\Patients;
use App\Specialty;
use App\User;
use Exception;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Intervention\Image\Facades\Image;

class DoctorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    //METODO PRINCIPAL DE LAS RUTAS, ENCARGADO DE RETORNAR LOS DATOS DE LOS USUARIOS,
    //Y SU RELACION CON LA TABLA DOCTORES RECIBE COMO PARAMETRO UN REQUEST CON EL VALOR DE UN
    //TEXTO PARA BUSCAR EN EL CASO DEL FLITAR LA INFORMACION, EL FILTRO SE LO REALIZA
    //POR NOMBRE, APELLIDO IDENTIFICACION, Y CORREO,
    public function index(Request $request)
    {
        $text_search = $request->text_search;
        if ($text_search == '' || $text_search == null) {
            $users = Doctor::paginate(5);
            return response()->json([
                'users' => $users,
            ], 200);
        } else {
            $users = Doctor::where(function ($query) use ($text_search) {
                $query = $query->orWhere('name', 'like',  '%' . $text_search . '%');
                $query = $query->orWhere('last_name', 'like',  '%' . $text_search . '%');
                $query = $query->orWhere('ci', 'like',  '%' . $text_search . '%');
                $query = $query->orWhere('email', 'like',  '%' . $text_search . '%');
            })->paginate(5);

            return response()->json([
                'users' => $users,
            ], 200);
        }
    }

    public function getApiDoctors(){
        $doctors = Doctor::where('status','activo')
            ->orderBy('name','ASC')
            ->get([
                'name','last_name','id','biography','email','academic_title','url_image'
            ]);

        return response()->json([
            'doctors'=>$doctors,
            'success'=>true
        ],200);
    }

    //METODO QUE RETORNA LA VISTA DA LA VISTA BLADE CORRESPONDIENTE A LOS DOCTORES
    public function getDoctors()
    {
        return view('admin.doctors.doctors');
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
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreDoctorPost $request)
    {
        ///CAMPOS EN LA BASE DE DATOS DE LA TABLA USUARIOS
        //name, last_name,username,birth_date, gender, address, province, city, phone, url_image, email, password, status
        //CAMPOS PARA LA TABLA DOCTORES
        //academic_title,graduation_date, marital_status, biography,id_user,id_specialty
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
            $role = Role::findById(2);
            $user->assignRole($role);
            //LLENAR LOS DATOS CORRESPONDIENTES A LA TABLA PATITIENTS/
            $doctor = new Doctor();
            $doctor->ci = $request->ci;
            $doctor->type_document = $request->type_document;
            $doctor->name = $request->name;
            $doctor->last_name = $request->last_name;
            $doctor->birth_date = $request->birth_date;
            $doctor->gender = $request->gender;
            $doctor->address = $request->address;
            $doctor->province = $request->province;
            $doctor->city = $request->city;
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->status = $request->status;
            $doctor->url_image =  $user->url_image;

            $doctor->academic_title = $request->academic_title;
            $doctor->graduation_date = $request->graduation_date;
            $doctor->marital_status = $request->marital_status;
            $doctor->biography = $request->biography;
            $doctor->id_specialty = $request->id_specialty;
            $doctor->id_user = $user->id;
            $doctor->save();
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
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateDoctorPut $request, $id)
    {
        ///CAMPOS EN LA BASE DE DATOS
        //name, last_name,username,birth_date, gender, address, province, city, phone, url_image, email, password, status
        //CAMPOS PARA LA TABLA DOCTORES
        //academic_title,graduation_date, marital_status, biography,id_user,id_specialty
        try {
            $validate = $request->validated();
            ///bUSCAMOS LOS DATOS DEL USUARIO Y MODIFICAMOS  LOS DATOS CORRESPONDINTES A  LA TABLA USERS
            $doctor = Doctor::find($id);
            $user = User::find($doctor->id_user);
            DB::beginTransaction();
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
            //CONUSLTAMOS LOS DATOS CORRESPONDIENTES A AL USUSARIO EN LA TABLA PACIENTES Y MODIFICAM0S LOS DATOS CORRESPONDIENTES A LA TABLA PATITIENTS/

            $doctor->ci = $request->ci;
            $doctor->type_document = $request->type_document;
            $doctor->name = $request->name;
            $doctor->last_name = $request->last_name;
            $doctor->birth_date = $request->birth_date;
            $doctor->gender = $request->gender;
            $doctor->address = $request->address;
            $doctor->province = $request->province;
            $doctor->city = $request->city;
            $doctor->phone = $request->phone;
            $doctor->email = $request->email;
            $doctor->status = $request->status;
            $doctor->url_image =  $user->url_image;

            $doctor->academic_title = $request->academic_title;
            $doctor->graduation_date = $request->graduation_date;
            $doctor->marital_status = $request->marital_status;
            $doctor->biography = $request->biography;
            $doctor->id_specialty = $request->id_specialty;
            $doctor->id_user = $user->id;
            $doctor->save();
            ///ejecutamos el commit a la base de datos
            DB::commit();
            //RETORNAMOS LOS DATOS DE PACIENTE MODIFICADO Y EL ESTADO 200
            return response()->json($user, 200);
        } catch (Exception $e) {

            //SI HAY ERRORES HACES UN ROLLBACK DE ESTA TRANSACCION
            DB::rollback();
            //RETORNAMOS UN ESTADO 422
            return response()->json([
                'errors' => $e
            ], 422);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
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
    ///METODO PARA GENERAR UNA CONMTRASEÑA POR DEFECTO GENERA LA CONTRASEÑA CON EL NUMERO DE IDENTIFICACION INGRESADO
    ///EN EL FORMULARIO DE REGISTRO
    public function generatePassword($password)
    {
        $user_password = Hash::make($password);
        return $user_password;
    }
    ///METODO PARA SUBIR LAS IMAGENES DEL USUARIO LAS IMAGENES SE GUARDAN EN LA CARPETA PUBLIC/IMG/*
    ///LA IAMEGN ES RECIBIDA EN BASE_64 Y MEDIANTE LA LIBRERIA IMAGE INTERVENTION SE TRANSFORMA Y GUARDA
    //SI EXISTE EN EL REQUEST LA IMAGEN SE REALIZA EL RPOCESO CASO CONTRARIO RE RETURNA EL VALOR '#'
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

    ///METODO PARA CAMBIAR EL ESTADO DEL DOCTOR
    ///ESTE METODO DESHABILITA LA CUENTA DEL USUARIO Y EL DOCTOR

    public function changeStatus($id)
    {

        $doctor = Doctor::find($id);

        if ($doctor->status == 'activo') {
            $doctor->status = 'inactivo';
        } else {
            $doctor->status = 'activo';
        }
        $doctor->save();
        $user = User::find($doctor->id_user);
        if ($user->status == 'activo') {
            $user->status = 'inactivo';
        } else {
            $user->status = 'activo';
        }
        $user->save();

        return response()->json($user, 200);
    }
    public function SpecialtyDoctor()
    {
        $doctors = Doctor::where('status','activo')->get(['id','name','last_name']);
        $specialties = Specialty::where('status','activo')->get(['id','name','color']);
        $patients = Patients::where('status','activo')->get(['id','name','last_name']);
         return response()->json([
            'doctors'=>$doctors,
            'specialties'=>$specialties,
            'patients'=>$patients
         ],200);

    }
}
