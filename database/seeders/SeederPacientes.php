<?php

use App\MedicalRecord;
use App\Patients;
use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;

class PatientSeed extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        /*  *******************************  USUARIO Y PACIENTE        */
        $user_password = Hash::make('0550048646');
        $user          = User::create([

            'ci'            => '0550048646',
            'type_document' => 'cedula',
            'name'          => 'Evelyn Salomé',
            'last_name'     => 'Chugchilan Barreno',
            'address'       => 'San Felipe',
            'phone'         => '0947585949',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'evelynchugchilan05@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550048646',
            'type_document' => 'cedula',
            'name'          => 'Evelyn Salomé',
            'last_name'     => 'Chugchilan Barreno',
            'address'       => 'San Felipe',
            'phone'         => '0947585949',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'evelynchugchilan05@gmail.com ',

            'birth_date'      => '1997/07/28',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);
        $medical_record             = new MedicalRecord();
        $medical_record->code       = "45";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        /*  *******************************  USUARIO Y PACIENTE        */
        $user_password = Hash::make('0501605554');
        $user          = User::create([

            'ci'            => '0501605554',
            'type_document' => 'cedula',
            'name'          => 'Gabriela Macarena',
            'last_name'     => 'Gallardo Salazar',
            'address'       => 'San Felipe',
            'phone'         => '09394024967',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'gabgallardo23@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501605554',
            'type_document' => 'cedula',
            'name'          => 'Gabriela Macarena',
            'last_name'     => 'Gallardo Salazar',
            'address'       => 'San Felipe',
            'phone'         => '09394024967',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'gabgallardo23@gmail.com ',

            'birth_date'      => '1997/09/09',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "46";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0503754897');
        $user          = User::create([

            'ci'            => '0503754897',
            'type_document' => 'cedula',
            'name'          => 'Yadira Nataly',
            'last_name'     => 'Guanoluisa Chasi',
            'address'       => 'San Felipe',
            'phone'         => '0947593028',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'natalyguanoluisa1@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503754897',
            'type_document' => 'cedula',
            'name'          => 'Yadira Nataly',
            'last_name'     => 'Guanoluisa Chasi',
            'address'       => 'San Felipe',
            'phone'         => '0947593028',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'natalyguanoluisa1@gmail.com ',

            'birth_date'      => '1999/01/18',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "47";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();












       
        $user_password = Hash::make('0503105553');
        $user          = User::create([

            'ci'            => '0503105553',
            'type_document' => 'cedula',
            'name'          => 'Cesar',
            'last_name'     => 'Loor',
            'address'       => 'San Felipe',
            'phone'         => '0957693049',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'loricuamix_2801@outlook.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503105553',
            'type_document' => 'cedula',
            'name'          => 'Cesar',
            'last_name'     => 'Loor',
            'address'       => 'San Felipe',
            'phone'         => '0957693049',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'loricuamix_2801@outlook.com',

            'birth_date'      => '1982/03/23',
            'gender'          => 'masculino',
            'job'             => 'Arquitecto',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "48";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















        $user_password = Hash::make('0550093371');
        $user          = User::create([

            'ci'            => '0550093371',
            'type_document' => 'cedula',
            'name'          => 'Danny',
            'last_name'     => 'Umajinga',
            'address'       => 'San Felipe',
            'phone'         => '0994586038',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'dannyumajinga43@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550093371',
            'type_document' => 'cedula',
            'name'          => 'Danny',
            'last_name'     => 'Umajinga',
            'address'       => 'San Felipe',
            'phone'         => '0994586038',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'dannyumajinga43@gmail.com',

            'birth_date'      => '1998/01/27',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "49";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();













        $user_password = Hash::make('0603795345');
        $user          = User::create([

            'ci'            => '0603795345',
            'type_document' => 'cedula',
            'name'          => 'Deysy Elizabeth',
            'last_name'     => 'Sinchiguano Tierra',
            'address'       => 'San Felipe',
            'phone'         => '0958693027',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'deybilu@hotmail.con',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0603795345',
            'type_document' => 'cedula',
            'name'          => 'Deysy Elizabeth',
            'last_name'     => 'Sinchiguano Tierra',
            'address'       => 'San Felipe',
            'phone'         => '0958693027',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'deybilu@hotmail.con',

            'birth_date'      => '1994/03/18',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "50";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















        $user_password = Hash::make('0550364123');
        $user          = User::create([

            'ci'            => '0550364123',
            'type_document' => 'cedula',
            'name'          => 'Danny',
            'last_name'     => 'Condor',
            'address'       => 'San Felipe',
            'phone'         => '0954596025',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'crisho5566@hotmail.es',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550364123',
            'type_document' => 'cedula',
            'name'          => 'Danny',
            'last_name'     => 'Condor',
            'address'       => 'San Felipe',
            'phone'         => '0954596025',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'crisho5566@hotmail.es',

            'birth_date'      => '2000/05/09',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "51";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();













        $user_password = Hash::make('0501594097');
        $user          = User::create([

            'ci'            => '0501594097',
            'type_document' => 'cedula',
            'name'          => 'Jaime Fabián',
            'last_name'     => 'Basantes Quinatoa',
            'address'       => 'San Felipe',
            'phone'         => '0967586940',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabiancitobasantes@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501594097',
            'type_document' => 'cedula',
            'name'          => 'Jaime Fabián',
            'last_name'     => 'Basantes Quinatoa',
            'address'       => 'San Felipe',
            'phone'         => '0967586940',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabiancitobasantes@hotmail.com',

            'birth_date'      => '1978/04/12',
            'gender'          => 'masculino',
            'job'             => 'Ingeniero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "52";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















        $user_password = Hash::make('0603962556');
        $user          = User::create([

            'ci'            => '0603962556',
            'type_document' => 'cedula',
            'name'          => 'Mishell Estefania',
            'last_name'     => 'Aulla Auquilla',
            'address'       => 'San Felipe',
            'phone'         => '0936473849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mixuaulla@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0603962556',
            'type_document' => 'cedula',
            'name'          => 'Mishell Estefania',
            'last_name'     => 'Aulla Auquilla',
            'address'       => 'San Felipe',
            'phone'         => '0936473849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mixuaulla@gmail.com',

            'birth_date'      => '1998/01/01',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "53";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0502671589');
        $user          = User::create([

            'ci'            => '0502671589',
            'type_document' => 'cedula',
            'name'          => 'Roberto Carlos',
            'last_name'     => 'Cóndor Checa',
            'address'       => 'San Felipe',
            'phone'         => '0958694039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'betocc49@hotmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0502671589',
            'type_document' => 'cedula',
            'name'          => 'Roberto Carlos',
            'last_name'     => 'Cóndor Checa',
            'address'       => 'San Felipe',
            'phone'         => '0958694039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'betocc49@hotmail.com ',

            'birth_date'      => '1985/10/04',
            'gender'          => 'masculino',
            'job'             => 'Profesor',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "54";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0550073266');
        $user          = User::create([

            'ci'            => '0550073266',
            'type_document' => 'cedula',
            'name'          => 'Jeison Fabricio',
            'last_name'     => 'Tipanluisa Tipanluisa',
            'address'       => 'San Felipe',
            'phone'         => '0947584950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabi22tip@hotmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550073266',
            'type_document' => 'cedula',
            'name'          => 'Jeison Fabricio',
            'last_name'     => 'Tipanluisa Tipanluisa',
            'address'       => 'San Felipe',
            'phone'         => '0947584950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabi22tip@hotmail.com ',

            'birth_date'      => '1996/06/12',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "55";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0504610346');
        $user          = User::create([

            'ci'            => '0504610346',
            'type_document' => 'cedula',
            'name'          => 'Kevin Manuel',
            'last_name'     => 'Jami Yugcha',
            'address'       => 'San Felipe',
            'phone'         => '0968794957',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'kevinjami751@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0504610346',
            'type_document' => 'cedula',
            'name'          => 'Kevin Manuel',
            'last_name'     => 'Jami Yugcha',
            'address'       => 'San Felipe',
            'phone'         => '0968794957',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'kevinjami751@gmail.com',

            'birth_date'      => '1997/07/23',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "56";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0504080920');
        $user          = User::create([

            'ci'            => '0504080920',
            'type_document' => 'cedula',
            'name'          => 'Alexander',
            'last_name'     => 'Perez',
            'address'       => 'San Felipe',
            'phone'         => '0947584950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'alexdid9935@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0504080920',
            'type_document' => 'cedula',
            'name'          => 'Alexander',
            'last_name'     => 'Perez',
            'address'       => 'San Felipe',
            'phone'         => '0947584950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'alexdid9935@gmail.com',

            'birth_date'      => '1999/03/13',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "57";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
       

    
















        $user_password = Hash::make('0501606263');
        $user          = User::create([

            'ci'            => '0501606263',
            'type_document' => 'cedula',
            'name'          => 'Laura Marina',
            'last_name'     => 'Borja Parra',
            'address'       => 'San Felipe',
            'phone'         => '0957695887',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lauramar121@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501606263',
            'type_document' => 'cedula',
            'name'          => 'Laura Marina',
            'last_name'     => 'Borja Parra',
            'address'       => 'San Felipe',
            'phone'         => '0957695887',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lauramar121@hotmail.com',

            'birth_date'      => '1975/10/01',
            'gender'          => 'femenino',
            'job'             => 'Licenciada',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "58";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0501706444');
        $user          = User::create([

            'ci'            => '0501706444',
            'type_document' => 'cedula',
            'name'          => 'Jaqueline',
            'last_name'     => 'Pazuña',
            'address'       => 'San Felipe',
            'phone'         => '0957684950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'nildapazu@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501706444',
            'type_document' => 'cedula',
            'name'          => 'Jaqueline',
            'last_name'     => 'Pazuña',
            'address'       => 'San Felipe',
            'phone'         => '0957684950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'nildapazu@gmail.com',

            'birth_date'      => '1975/11/14',
            'gender'          => 'femenino',
            'job'             => 'Psicologa',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "59";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0594564738');
        $user          = User::create([

            'ci'            => '0594564738',
            'type_document' => 'cedula',
            'name'          => 'Mario Andres',
            'last_name'     => 'Alpala',
            'address'       => 'San Felipe',
            'phone'         => '0968794038',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'andresalpala@yahoo.es ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0594564738',
            'type_document' => 'cedula',
            'name'          => 'Mario Andres',
            'last_name'     => 'Alpala',
            'address'       => 'San Felipe',
            'phone'         => '0968794038',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'andresalpala@yahoo.es ',

            'birth_date'      => '1993/03/06',
            'gender'          => 'masculino',
            'job'             => 'Cocinero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "60";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();

















        $user_password = Hash::make('0594375930');
        $user          = User::create([

            'ci'            => '0594375930',
            'type_document' => 'cedula',
            'name'          => 'Mishell',
            'last_name'     => 'Castillo',
            'address'       => 'San Felipe',
            'phone'         => '0938492830',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mishellc184@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0594375930',
            'type_document' => 'cedula',
            'name'          => 'Mishell',
            'last_name'     => 'Castillo',
            'address'       => 'San Felipe',
            'phone'         => '0938492830',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mishellc184@gmail.com',

            'birth_date'      => '1997/03/03',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "61";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















        $user_password = Hash::make('0503174567');
        $user          = User::create([

            'ci'            => '0503174567',
            'type_document' => 'cedula',
            'name'          => 'Steven',
            'last_name'     => 'Chicaiza',
            'address'       => 'San Felipe',
            'phone'         => '0956473849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'steven.chicaiza@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503174567',
            'type_document' => 'cedula',
            'name'          => 'Steven',
            'last_name'     => 'Chicaiza',
            'address'       => 'San Felipe',
            'phone'         => '0956473849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'steven.chicaiza@hotmail.com',

            'birth_date'      => '1996/04/16',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "62";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0504862509');
        $user          = User::create([

            'ci'            => '0504862509',
            'type_document' => 'cedula',
            'name'          => 'Dario',
            'last_name'     => 'Sanchez',
            'address'       => 'San Felipe',
            'phone'         => '0958493029',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'dariosanchez199909@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0504862509',
            'type_document' => 'cedula',
            'name'          => 'Dario',
            'last_name'     => 'Sanchez',
            'address'       => 'San Felipe',
            'phone'         => '0958493029',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'dariosanchez199909@gmail.com',

            'birth_date'      => '1999/10/22',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "63";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('1791768329');
        $user          = User::create([

            'ci'            => '1791768329',
            'type_document' => 'cedula',
            'name'          => 'Sandra Luna',
            'last_name'     => 'Gonzáles',
            'address'       => 'San Felipe',
            'phone'         => '0968704069',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'edaisigye@easynet.net.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1791768329',
            'type_document' => 'cedula',
            'name'          => 'Sandra Luna',
            'last_name'     => 'Gonzáles',
            'address'       => 'San Felipe',
            'phone'         => '0968704069',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'edaisigye@easynet.net.ec',

            'birth_date'      => '1985/04/25',
            'gender'          => 'femenino',
            'job'             => 'Abogada',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "64";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















$user_password = Hash::make('1790701646');
        $user          = User::create([

            'ci'            => '1790701646',
            'type_document' => 'cedula',
            'name'          => 'Simón',
            'last_name'     => 'Peña Vega',
            'address'       => 'San Felipe',
            'phone'         => '0947583958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'peñasimon87@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790701646',
            'type_document' => 'cedula',
            'name'          => 'Simón',
            'last_name'     => 'Peña Vega',
            'address'       => 'San Felipe',
            'phone'         => '0947583958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'peñasimon87@gmail.com',

            'birth_date'      => '1998/01/22',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "65";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















$user_password = Hash::make('1801020782');
        $user          = User::create([

            'ci'            => '1801020782',
            'type_document' => 'cedula',
            'name'          => 'Carlos Guillermo',
            'last_name'     => 'Estupiñán Martínez',
            'address'       => 'San Felipe',
            'phone'         => '0927384958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carlosestupiñañ@cmuebles.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1801020782',
            'type_document' => 'cedula',
            'name'          => 'Carlos Guillermo',
            'last_name'     => 'Estupiñán Martínez',
            'address'       => 'San Felipe',
            'phone'         => '0927384958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carlosestupiñañ@cmuebles.com',

            'birth_date'      => '1992/08/14',
            'gender'          => 'masculino',
            'job'             => 'Ingeniero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "66";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















$user_password = Hash::make('1913281846');
        $user          = User::create([

            'ci'            => '1913281846',
            'type_document' => 'cedula',
            'name'          => 'Xavier',
            'last_name'     => 'Campos',
            'address'       => 'San Felipe',
            'phone'         => '0947582938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'don_camp@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1913281846',
            'type_document' => 'cedula',
            'name'          => 'Xavier',
            'last_name'     => 'Campos',
            'address'       => 'San Felipe',
            'phone'         => '0947582938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'don_camp@hotmail.com',

            'birth_date'      => '1992/12/24',
            'gender'          => 'masculino',
            'job'             => 'Veterinario',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "67";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();

















$user_password = Hash::make('1790038092');
        $user          = User::create([

            'ci'            => '1790038092',
            'type_document' => 'cedula',
            'name'          => 'Marco',
            'last_name'     => 'Villavicencio',
            'address'       => 'San Felipe',
            'phone'         => '0948592030',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'atu@gye.satnet.net',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790038092',
            'type_document' => 'cedula',
            'name'          => 'Marco',
            'last_name'     => 'Villavicencio',
            'address'       => 'San Felipe',
            'phone'         => '0948592030',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'atu@gye.satnet.net',

            'birth_date'      => '1997/05/20',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "68";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();


















$user_password = Hash::make('1909752818');
        $user          = User::create([

            'ci'            => '1909752818',
            'type_document' => 'cedula',
            'name'          => 'Steve',
            'last_name'     => 'Samaniego Rodríguez',
            'address'       => 'San Felipe',
            'phone'         => '0979685748',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ssarcon@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1909752818',
            'type_document' => 'cedula',
            'name'          => 'Steve',
            'last_name'     => 'Samaniego Rodríguez',
            'address'       => 'San Felipe',
            'phone'         => '0979685748',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ssarcon@hotmail.com',

            'birth_date'      => '1991/07/18',
            'gender'          => 'masculino',
            'job'             => 'Veterinario',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "69";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();











$user_password = Hash::make('1792102219');
        $user          = User::create([

            'ci'            => '1792102219',
            'type_document' => 'cedula',
            'name'          => 'Marco',
            'last_name'     => 'Rodríguez Molina',
            'address'       => 'San Felipe',
            'phone'         => '0978695847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ventascarvajal@mepal.com.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1792102219',
            'type_document' => 'cedula',
            'name'          => 'Marco',
            'last_name'     => 'Rodríguez Molina',
            'address'       => 'San Felipe',
            'phone'         => '0978695847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ventascarvajal@mepal.com.ec',

            'birth_date'      => '1996/07/23',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "70";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1992231114');
        $user          = User::create([

            'ci'            => '1992231114',
            'type_document' => 'cedula',
            'name'          => 'Maria',
            'last_name'     => 'De los Ángeles Palacios',
            'address'       => 'San Felipe',
            'phone'         => '0949502039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mariadelosa34@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1992231114',
            'type_document' => 'cedula',
            'name'          => 'Maria',
            'last_name'     => 'De los Ángeles Palacios',
            'address'       => 'San Felipe',
            'phone'         => '0949502039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mariadelosa34@gmail.com',

            'birth_date'      => '1987/02/03',
            'gender'          => 'femenino',
            'job'             => 'Psicologa',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "71";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();






$user_password = Hash::make('1912078318');
        $user          = User::create([

            'ci'            => '1912078318',
            'type_document' => 'cedula',
            'name'          => 'Cesar Carlos',
            'last_name'     => 'Prado Pérez',
            'address'       => 'San Felipe',
            'phone'         => '0958693049',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'cprado@tamasacorp.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1912078318',
            'type_document' => 'cedula',
            'name'          => 'Cesar Carlos',
            'last_name'     => 'Prado Pérez',
            'address'       => 'San Felipe',
            'phone'         => '0958693049',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'cprado@tamasacorp.com',

            'birth_date'      => '1984/03/13',
            'gender'          => 'masculino',
            'job'             => 'Taxista',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "72";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1914949375');
        $user          = User::create([

            'ci'            => '1914949375',
            'type_document' => 'cedula',
            'name'          => 'Cristina',
            'last_name'     => 'Gómez Velastegui',
            'address'       => 'San Felipe',
            'phone'         => '0958673849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'trofeospena@interactive.net.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1914949375',
            'type_document' => 'cedula',
            'name'          => 'Cristina',
            'last_name'     => 'Gómez Velastegui',
            'address'       => 'San Felipe',
            'phone'         => '0958673849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'trofeospena@interactive.net.ec',

            'birth_date'      => '1996/03/05',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "73";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();












$user_password = Hash::make('1913058213');
        $user          = User::create([

            'ci'            => '1913058213',
            'type_document' => 'cedula',
            'name'          => 'Allan',
            'last_name'     => 'Terranova Carrasco',
            'address'       => 'San Felipe',
            'phone'         => '0958673948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'allanterranovatrofeos@hotmail.es',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1913058213',
            'type_document' => 'cedula',
            'name'          => 'Allan',
            'last_name'     => 'Terranova Carrasco',
            'address'       => 'San Felipe',
            'phone'         => '0958673948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'allanterranovatrofeos@hotmail.es',

            'birth_date'      => '1991/02/25',
            'gender'          => 'masculino',
            'job'             => 'Mecanico',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "74";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1306344688');
        $user          = User::create([

            'ci'            => '1306344688',
            'type_document' => 'cedula',
            'name'          => 'David',
            'last_name'     => 'Vera Vera',
            'address'       => 'San Felipe',
            'phone'         => '0958693948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'valesk15@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1306344688',
            'type_document' => 'cedula',
            'name'          => 'David',
            'last_name'     => 'Vera Vera',
            'address'       => 'San Felipe',
            'phone'         => '0958693948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'valesk15@hotmail.com',

            'birth_date'      => '1986/03/14',
            'gender'          => 'masculino',
            'job'             => 'Carpintero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "75";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1991400427');
        $user          = User::create([

            'ci'            => '1991400427',
            'type_document' => 'cedula',
            'name'          => 'Boris',
            'last_name'     => 'Ordoñez',
            'address'       => 'San Felipe',
            'phone'         => '0948572837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'boris@cartimex.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1991400427',
            'type_document' => 'cedula',
            'name'          => 'Boris',
            'last_name'     => 'Ordoñez',
            'address'       => 'San Felipe',
            'phone'         => '0948572837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'boris@cartimex.com',

            'birth_date'      => '1993/09/23',
            'gender'          => 'masculino',
            'job'             => 'Agricultor',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "76";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1992331968');
        $user          = User::create([

            'ci'            => '1992331968',
            'type_document' => 'cedula',
            'name'          => 'Ricardo',
            'last_name'     => 'Gonzáles',
            'address'       => 'San Felipe',
            'phone'         => '0957684958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fbarrera@somoslomaximo.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1992331968',
            'type_document' => 'cedula',
            'name'          => 'Ricardo',
            'last_name'     => 'Gonzáles',
            'address'       => 'San Felipe',
            'phone'         => '0957684958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fbarrera@somoslomaximo.com',

            'birth_date'      => '1984/04/12',
            'gender'          => 'masculino',
            'job'             => 'Agricultor',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "77";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1792262144');
        $user          = User::create([

            'ci'            => '1792262144',
            'type_document' => 'cedula',
            'name'          => 'Pedro',
            'last_name'     => 'Sanchez',
            'address'       => 'San Felipe',
            'phone'         => '0957684758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'sanchezpedro21@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1792262144',
            'type_document' => 'cedula',
            'name'          => 'Pedro',
            'last_name'     => 'Sanchez',
            'address'       => 'San Felipe',
            'phone'         => '0957684758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'sanchezpedro21@gmail.com',

            'birth_date'      => '1976/09/16',
            'gender'          => 'masculino',
            'job'             => 'Veterinario',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "78";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1992262133');
        $user          = User::create([

            'ci'            => '1992262133',
            'type_document' => 'cedula',
            'name'          => 'Juan',
            'last_name'     => 'Saade',
            'address'       => 'San Felipe',
            'phone'         => '0957684758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mar_ita_1616@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1992262133',
            'type_document' => 'cedula',
            'name'          => 'Juan',
            'last_name'     => 'Saade',
            'address'       => 'San Felipe',
            'phone'         => '0957684758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mar_ita_1616@hotmail.com',

            'birth_date'      => '1977/12/05',
            'gender'          => 'masculino',
            'job'             => 'Abogado',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "79";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















$user_password = Hash::make('1990140669');
        $user          = User::create([

            'ci'            => '1990140669',
            'type_document' => 'cedula',
            'name'          => 'Andree',
            'last_name'     => 'Cecibel',
            'address'       => 'San Felipe',
            'phone'         => '0958693848',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'candree@conware.com.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1990140669',
            'type_document' => 'cedula',
            'name'          => 'Andree',
            'last_name'     => 'Cecibel',
            'address'       => 'San Felipe',
            'phone'         => '0958693848',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'candree@conware.com.ec',

            'birth_date'      => '1975/03/17',
            'gender'          => 'masculino',
            'job'             => 'Artesano',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "80";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();





$user_password = Hash::make('1790502015');
        $user          = User::create([

            'ci'            => '1790502015',
            'type_document' => 'cedula',
            'name'          => 'Johana',
            'last_name'     => 'Reinoso',
            'address'       => 'San Felipe',
            'phone'         => '0957683948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'reinosojohana22@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790502015',
            'type_document' => 'cedula',
            'name'          => 'Johana',
            'last_name'     => 'Reinoso',
            'address'       => 'San Felipe',
            'phone'         => '0957683948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'reinosojohana22@gmail.com',

            'birth_date'      => '1977/06/05',
            'gender'          => 'femenino',
            'job'             => 'Abogada',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "81";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1992301686');
        $user          = User::create([

            'ci'            => '1992301686',
            'type_document' => 'cedula',
            'name'          => 'Ivan',
            'last_name'     => 'Lopez Chiriboga',
            'address'       => 'San Felipe',
            'phone'         => '0958493849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ilc@electrofacil.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1992301686',
            'type_document' => 'cedula',
            'name'          => 'Ivan',
            'last_name'     => 'Lopez Chiriboga',
            'address'       => 'San Felipe',
            'phone'         => '0958493849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ilc@electrofacil.com',

            'birth_date'      => '1987/09/03',
            'gender'          => 'masculino',
            'job'             => 'Carpintero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "82";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();









$user_password = Hash::make('1792468394');
        $user          = User::create([

            'ci'            => '1792468394',
            'type_document' => 'cedula',
            'name'          => 'Carlos',
            'last_name'     => 'Paredes Molina',
            'address'       => 'San Felipe',
            'phone'         => '0930491728',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mycorporation@cablemodem.com.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1792468394',
            'type_document' => 'cedula',
            'name'          => 'Carlos',
            'last_name'     => 'Paredes Molina',
            'address'       => 'San Felipe',
            'phone'         => '0930491728',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mycorporation@cablemodem.com.ec',

            'birth_date'      => '1976/04/24',
            'gender'          => 'masculino',
            'job'             => 'Tecnico',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "83";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1992357320');
        $user          = User::create([

            'ci'            => '1992357320',
            'type_document' => 'cedula',
            'name'          => 'Monserrate',
            'last_name'     => 'Cabrera',
            'address'       => 'San Felipe',
            'phone'         => '0948576839',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'monserruca@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1992357320',
            'type_document' => 'cedula',
            'name'          => 'Monserrate',
            'last_name'     => 'Cabrera',
            'address'       => 'San Felipe',
            'phone'         => '0948576839',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'monserruca@hotmail.com',

            'birth_date'      => '1976/04/24',
            'gender'          => 'femenino',
            'job'             => 'Veterinaria',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "84";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1792440813');
        $user          = User::create([

            'ci'            => '1792440813',
            'type_document' => 'cedula',
            'name'          => 'Ernesto Wladimir',
            'last_name'     => 'Noriega Boada',
            'address'       => 'San Felipe',
            'phone'         => '0958673948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'stproyec@gye.satnet.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1792440813',
            'type_document' => 'cedula',
            'name'          => 'Ernesto Wladimir',
            'last_name'     => 'Noriega Boada',
            'address'       => 'San Felipe',
            'phone'         => '0958673948',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'stproyec@gye.satnet.ec',

            'birth_date'      => '1991/04/19',
            'gender'          => 'masculino',
            'job'             => 'Ingeniero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "85";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1937670590');
        $user          = User::create([

            'ci'            => '1937670590',
            'type_document' => 'cedula',
            'name'          => 'Abdala Rolando',
            'last_name'     => 'Crausaz Carrión',
            'address'       => 'San Felipe',
            'phone'         => '0978675659',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'centenario52@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1937670590',
            'type_document' => 'cedula',
            'name'          => 'Abdala Rolando',
            'last_name'     => 'Crausaz Carrión',
            'address'       => 'San Felipe',
            'phone'         => '0978675659',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'centenario52@hotmail.com',

            'birth_date'      => '1986/01/09',
            'gender'          => 'masculino',
            'job'             => 'Estilista',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "86";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1792338539');
        $user          = User::create([

            'ci'            => '1792338539',
            'type_document' => 'cedula',
            'name'          => 'Rossana',
            'last_name'     => 'Figueroa',
            'address'       => 'San Felipe',
            'phone'         => '0980695838',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'servicorporation@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1792338539',
            'type_document' => 'cedula',
            'name'          => 'Rossana',
            'last_name'     => 'Figueroa',
            'address'       => 'San Felipe',
            'phone'         => '0980695838',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'servicorporation@hotmail.com',

            'birth_date'      => '1976/06/16',
            'gender'          => 'femenino',
            'job'             => 'Arquitecto',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "87";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();











$user_password = Hash::make('1900715285');
        $user          = User::create([

            'ci'            => '1900715285',
            'type_document' => 'cedula',
            'name'          => 'Manuel',
            'last_name'     => 'Pino Aguirre',
            'address'       => 'San Felipe',
            'phone'         => '0947583746',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jessipino@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1900715285',
            'type_document' => 'cedula',
            'name'          => 'Manuel',
            'last_name'     => 'Pino Aguirre',
            'address'       => 'San Felipe',
            'phone'         => '0947583746',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jessipino@hotmail.com',

            'birth_date'      => '1981/05/21',
            'gender'          => 'masculino',
            'job'             => 'Pintor',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "88";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1790021058');
        $user          = User::create([

            'ci'            => '1790021058',
            'type_document' => 'cedula',
            'name'          => 'Jose',
            'last_name'     => 'Valdivieso',
            'address'       => 'San Felipe',
            'phone'         => '0989786756',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'valdiviesojosea68@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790021058',
            'type_document' => 'cedula',
            'name'          => 'Jose',
            'last_name'     => 'Valdivieso',
            'address'       => 'San Felipe',
            'phone'         => '0989786756',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'valdiviesojosea68@gmail.com',

            'birth_date'      => '1985/03/27',
            'gender'          => 'masculino',
            'job'             => 'Agricultor',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "89";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0590179085');
        $user          = User::create([

            'ci'            => '0590179085',
            'type_document' => 'cedula',
            'name'          => 'Segundo',
            'last_name'     => 'Cañar',
            'address'       => 'San Felipe',
            'phone'         => '0947582938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'cañarsegundo445@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0590179085',
            'type_document' => 'cedula',
            'name'          => 'Segundo',
            'last_name'     => 'Cañar',
            'address'       => 'San Felipe',
            'phone'         => '0947582938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'cañarsegundo445@gmail.com',

            'birth_date'      => '1984/03/11',
            'gender'          => 'masculino',
            'job'             => 'Arquitecto',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "90";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();









$user_password = Hash::make('1790040275');
        $user          = User::create([

            'ci'            => '1790040275',
            'type_document' => 'cedula',
            'name'          => 'Maria Beatriz',
            'last_name'     => 'Guarin',
            'address'       => 'San Felipe',
            'phone'         => '0938493849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'beatrizguarin333@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790040275',
            'type_document' => 'cedula',
            'name'          => 'Maria Beatriz',
            'last_name'     => 'Guarin',
            'address'       => 'San Felipe',
            'phone'         => '0938493849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'beatrizguarin333@gmail.com',

            'birth_date'      => '1988/03/19',
            'gender'          => 'femenino',
            'job'             => 'Chofer',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "91";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1790245217');
        $user          = User::create([

            'ci'            => '1790245217',
            'type_document' => 'cedula',
            'name'          => 'Carlos',
            'last_name'     => 'Pibaque',
            'address'       => 'San Felipe',
            'phone'         => '0958693847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'intermaco_carlospibaque@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790245217',
            'type_document' => 'cedula',
            'name'          => 'Carlos',
            'last_name'     => 'Pibaque',
            'address'       => 'San Felipe',
            'phone'         => '0958693847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'intermaco_carlospibaque@hotmail.com',

            'birth_date'      => '1978/05/25',
            'gender'          => 'masculino',
            'job'             => 'Taxista',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "92";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();











$user_password = Hash::make('0592595981');
        $user          = User::create([

            'ci'            => '0592595981',
            'type_document' => 'cedula',
            'name'          => 'Eduardo',
            'last_name'     => 'Lazaro',
            'address'       => 'San Felipe',
            'phone'         => '0968596859',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'elbg@eacynet.net.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0592595981',
            'type_document' => 'cedula',
            'name'          => 'Eduardo',
            'last_name'     => 'Lazaro',
            'address'       => 'San Felipe',
            'phone'         => '0968596859',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'elbg@eacynet.net.ec',

            'birth_date'      => '1985/04/16',
            'gender'          => 'masculino',
            'job'             => 'Ingeniero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "93";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0590745978');
        $user          = User::create([

            'ci'            => '0590745978',
            'type_document' => 'cedula',
            'name'          => 'Marco',
            'last_name'     => 'Castillo',
            'address'       => 'San Felipe',
            'phone'         => '0978678964',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'politerma@gye.sanet.net',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0590745978',
            'type_document' => 'cedula',
            'name'          => 'Marco',
            'last_name'     => 'Castillo',
            'address'       => 'San Felipe',
            'phone'         => '0978678964',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'castillomarco789@gmail.com',

            'birth_date'      => '1991/10/25',
            'gender'          => 'masculino',
            'job'             => 'Ingeniero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "94";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0592113693');
        $user          = User::create([

            'ci'            => '0592113693',
            'type_document' => 'cedula',
            'name'          => 'Orly',
            'last_name'     => 'Villon',
            'address'       => 'San Felipe',
            'phone'         => '0978485938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'orlyvill@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0592113693',
            'type_document' => 'cedula',
            'name'          => 'Orly',
            'last_name'     => 'Villon',
            'address'       => 'San Felipe',
            'phone'         => '0978485938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'orlyvill@hotmail.com',

            'birth_date'      => '1992/03/23',
            'gender'          => 'masculino',
            'job'             => 'Carpintero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "95";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0592243600');
        $user          = User::create([

            'ci'            => '0592243600',
            'type_document' => 'cedula',
            'name'          => 'Jacqueline',
            'last_name'     => 'Montalvo Alvarado',
            'address'       => 'San Felipe',
            'phone'         => '0989786756',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'promarcas2007@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0592243600',
            'type_document' => 'cedula',
            'name'          => 'Jacqueline',
            'last_name'     => 'Montalvo Alvarado',
            'address'       => 'San Felipe',
            'phone'         => '0989786756',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'promarcas2007@gmail.com',

            'birth_date'      => '1982/02/12',
            'gender'          => 'femenino',
            'job'             => 'Agricultor',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "96";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0591066578');
        $user          = User::create([

            'ci'            => '0591066578',
            'type_document' => 'cedula',
            'name'          => 'Ricardo',
            'last_name'     => 'Villafuerte',
            'address'       => 'San Felipe',
            'phone'         => '0948573847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'rvillafuertef@msn.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0591066578',
            'type_document' => 'cedula',
            'name'          => 'Ricardo',
            'last_name'     => 'Villafuerte',
            'address'       => 'San Felipe',
            'phone'         => '0948573847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'rvillafuertef@msn.com',

            'birth_date'      => '1992/06/22',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "97";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1790189163');
        $user          = User::create([

            'ci'            => '1790189163',
            'type_document' => 'cedula',
            'name'          => 'Dora',
            'last_name'     => 'Delgado',
            'address'       => 'San Felipe',
            'phone'         => '0958673847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'delgadodora467@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790189163',
            'type_document' => 'cedula',
            'name'          => 'Dora',
            'last_name'     => 'Delgado',
            'address'       => 'San Felipe',
            'phone'         => '0958673847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'delgadodora467@gmail.com',

            'birth_date'      => '1993/02/23',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "98";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0590785430');
        $user          = User::create([

            'ci'            => '0590785430',
            'type_document' => 'cedula',
            'name'          => 'Priscio',
            'last_name'     => 'Dormi',
            'address'       => 'San Felipe',
            'phone'         => '0978695847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ascomsa2004@yahoo.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0590785430',
            'type_document' => 'cedula',
            'name'          => 'Priscio',
            'last_name'     => 'Dormi',
            'address'       => 'San Felipe',
            'phone'         => '0978695847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'ascomsa2004@yahoo.com',

            'birth_date'      => '1975/02/02',
            'gender'          => 'masculino',
            'job'             => 'Arquitecto',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "99";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();











$user_password = Hash::make('0509128019');
        $user          = User::create([

            'ci'            => '0509128019',
            'type_document' => 'cedula',
            'name'          => 'Simón',
            'last_name'     => 'Pilozo Sánchez',
            'address'       => 'San Felipe',
            'phone'         => '0979805867',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'simon.pilozo@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0509128019',
            'type_document' => 'cedula',
            'name'          => 'Simón',
            'last_name'     => 'Pilozo Sánchez',
            'address'       => 'San Felipe',
            'phone'         => '0979805867',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'simon.pilozo@hotmail.com',

            'birth_date'      => '1993/05/19',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "100";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0591326987');
        $user          = User::create([

            'ci'            => '0591326987',
            'type_document' => 'cedula',
            'name'          => 'Jimmy',
            'last_name'     => 'García',
            'address'       => 'San Felipe',
            'phone'         => '0978675486',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jimmy_garcia@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0591326987',
            'type_document' => 'cedula',
            'name'          => 'Jimmy',
            'last_name'     => 'García',
            'address'       => 'San Felipe',
            'phone'         => '0978675486',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jimmy_garcia@hotmail.com',

            'birth_date'      => '1983/02/20',
            'gender'          => 'masculino',
            'job'             => 'Taxista',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "101";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0505889481');
        $user          = User::create([

            'ci'            => '0505889481',
            'type_document' => 'cedula',
            'name'          => 'Olga Grace',
            'last_name'     => 'Pazmiño Barbery',
            'address'       => 'San Felipe',
            'phone'         => '0978567645',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'comercialdonantonio@yahoo.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0505889481',
            'type_document' => 'cedula',
            'name'          => 'Olga Grace',
            'last_name'     => 'Pazmiño Barbery',
            'address'       => 'San Felipe',
            'phone'         => '0978567645',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'comercialdonantonio@yahoo.com',

            'birth_date'      => '1991/03/15',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "102";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0590010110');
        $user          = User::create([

            'ci'            => '0590010110',
            'type_document' => 'cedula',
            'name'          => 'Claudia',
            'last_name'     => 'Mejia',
            'address'       => 'San Felipe',
            'phone'         => '0946572837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'claudiamejia333@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0590010110',
            'type_document' => 'cedula',
            'name'          => 'Claudia',
            'last_name'     => 'Mejia',
            'address'       => 'San Felipe',
            'phone'         => '0946572837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'claudiamejia333@gmail.com',

            'birth_date'      => '1987/05/04',
            'gender'          => 'femenino',
            'job'             => 'Mecanico',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "103";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0591159509');
        $user          = User::create([

            'ci'            => '0591159509',
            'type_document' => 'cedula',
            'name'          => 'Susana',
            'last_name'     => 'Urgiles',
            'address'       => 'San Felipe',
            'phone'         => '0947564758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'urgilessusana234@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0591159509',
            'type_document' => 'cedula',
            'name'          => 'Susana',
            'last_name'     => 'Urgiles',
            'address'       => 'San Felipe',
            'phone'         => '0947564758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'urgilessusana234@gmail.com',

            'birth_date'      => '1975/12/12',
            'gender'          => 'femenino',
            'job'             => 'Doctor',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "104";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();









$user_password = Hash::make('0502397686');
        $user          = User::create([

            'ci'            => '0502397686',
            'type_document' => 'cedula',
            'name'          => 'Maria',
            'last_name'     => 'Espinoza Espinoza',
            'address'       => 'San Felipe',
            'phone'         => '0978674534',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'espinozamaria345@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0502397686',
            'type_document' => 'cedula',
            'name'          => 'Maria',
            'last_name'     => 'Espinoza Espinoza',
            'address'       => 'San Felipe',
            'phone'         => '0978674534',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'espinozamaria345@gmail.com',

            'birth_date'      => '1992/03/13',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "105";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1907054647');
        $user          = User::create([

            'ci'            => '1907054647',
            'type_document' => 'cedula',
            'name'          => 'Angelita',
            'last_name'     => 'Lara Deida',
            'address'       => 'San Felipe',
            'phone'         => '0967584736',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'angelitalara22@yahoo.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1907054647',
            'type_document' => 'cedula',
            'name'          => 'Angelita',
            'last_name'     => 'Lara Deida',
            'address'       => 'San Felipe',
            'phone'         => '0967584736',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'angelitalara22@yahoo.com',

            'birth_date'      => '1993/11/04',
            'gender'          => 'femenino',
            'job'             => 'Mecanico',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "106";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















$user_password = Hash::make('1790298817');
        $user          = User::create([

            'ci'            => '1790298817',
            'type_document' => 'cedula',
            'name'          => 'Hugo',
            'last_name'     => 'Huerta',
            'address'       => 'San Felipe',
            'phone'         => '0957684758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'hugohuerta@cermosa.com.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1790298817',
            'type_document' => 'cedula',
            'name'          => 'Hugo',
            'last_name'     => 'Huerta',
            'address'       => 'San Felipe',
            'phone'         => '0957684758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'hugohuerta@cermosa.com.ec',

            'birth_date'      => '1991/04/05',
            'gender'          => 'masculino',
            'job'             => 'Taxista',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "107";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1703870756');
        $user          = User::create([

            'ci'            => '1703870756',
            'type_document' => 'cedula',
            'name'          => 'Monica',
            'last_name'     => 'De Naranjo',
            'address'       => 'San Felipe',
            'phone'         => '0957684756',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'euroimport@uio.satnet.net',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1703870756',
            'type_document' => 'cedula',
            'name'          => 'Monica',
            'last_name'     => 'De Naranjo',
            'address'       => 'San Felipe',
            'phone'         => '0957684756',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'euroimport@uio.satnet.net',

            'birth_date'      => '1987/07/07',
            'gender'          => 'femenino',
            'job'             => 'Ingeniero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "108";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('1753417185');
        $user          = User::create([

            'ci'            => '1753417185',
            'type_document' => 'cedula',
            'name'          => 'Isidro Joel',
            'last_name'     => 'Chachipanta Lara',
            'address'       => 'San Felipe',
            'phone'         => '0958473627',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'isidro.chachipanta7185@utc.edu.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1753417185',
            'type_document' => 'cedula',
            'name'          => 'Isidro Joel',
            'last_name'     => 'Chachipanta Lara',
            'address'       => 'San Felipe',
            'phone'         => '0958473627',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'isidro.chachipanta7185@utc.edu.ec',

            'birth_date'      => '1996/02/11',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "109";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();













$user_password = Hash::make('1723874572');
        $user          = User::create([

            'ci'            => '1723874572',
            'type_document' => 'cedula',
            'name'          => 'Verónica Margoth',
            'last_name'     => 'Dias Guaman',
            'address'       => 'San Felipe',
            'phone'         => '0968574637',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'veronica24diaz1990@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1723874572',
            'type_document' => 'cedula',
            'name'          => 'Verónica Margoth',
            'last_name'     => 'Dias Guaman',
            'address'       => 'San Felipe',
            'phone'         => '0968574637',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'veronica24diaz1990@gmail.com',

            'birth_date'      => '1993/05/04',
            'gender'          => 'femenino',
            'job'             => 'Maestra',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "110";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0549384728');
        $user          = User::create([

            'ci'            => '0549384728',
            'type_document' => 'cedula',
            'name'          => 'Carlo',
            'last_name'     => 'Huerta',
            'address'       => 'San Felipe',
            'phone'         => '0958673847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carlosivan_2am@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0549384728',
            'type_document' => 'cedula',
            'name'          => 'Carlo',
            'last_name'     => 'Huerta',
            'address'       => 'San Felipe',
            'phone'         => '0958673847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carlosivan_2am@hotmail.com',

            'birth_date'      => '1992/10/13',
            'gender'          => 'masculino',
            'job'             => 'Carpintero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "111";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();











$user_password = Hash::make('1752282481');
        $user          = User::create([

            'ci'            => '1752282481',
            'type_document' => 'cedula',
            'name'          => 'Carla',
            'last_name'     => 'Vásquez',
            'address'       => 'San Felipe',
            'phone'         => '0987675434',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carla.vasquez2481@utc.edu.ec ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1752282481',
            'type_document' => 'cedula',
            'name'          => 'Carla',
            'last_name'     => 'Vásquez',
            'address'       => 'San Felipe',
            'phone'         => '0987675434',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carla.vasquez2481@utc.edu.ec ',

            'birth_date'      => '2001/03/18',
            'gender'          => 'femenino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "112";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('1714088851');
        $user          = User::create([

            'ci'            => '1714088851',
            'type_document' => 'cedula',
            'name'          => 'Cristina Irene',
            'last_name'     => 'Asimbaya Cuerro',
            'address'       => 'San Felipe',
            'phone'         => '0968795768',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'kamilita19vale@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1714088851',
            'type_document' => 'cedula',
            'name'          => 'Cristina Irene',
            'last_name'     => 'Asimbaya Cuerro',
            'address'       => 'San Felipe',
            'phone'         => '0968795768',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'kamilita19vale@gmail.com',

            'birth_date'      => '1981/05/15',
            'gender'          => 'femenino',
            'job'             => 'Abogada',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "113";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();











$user_password = Hash::make('0536472837');
        $user          = User::create([

            'ci'            => '0536472837',
            'type_document' => 'cedula',
            'name'          => 'Saith Omar',
            'last_name'     => 'Vega Cisneros',
            'address'       => 'San Felipe',
            'phone'         => '0947583749',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'Saithvega2010@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0536472837',
            'type_document' => 'cedula',
            'name'          => 'Saith Omar',
            'last_name'     => 'Vega Cisneros',
            'address'       => 'San Felipe',
            'phone'         => '0947583749',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'Saithvega2010@gmail.com ',

            'birth_date'      => '2000/03/22',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "114";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();











$user_password = Hash::make('0569364758');
        $user          = User::create([

            'ci'            => '0569364758',
            'type_document' => 'cedula',
            'name'          => 'Ismael Rufino',
            'last_name'     => 'Gradejada Marin',
            'address'       => 'San Felipe',
            'phone'         => '0958473647',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'tione_210@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0569364758',
            'type_document' => 'cedula',
            'name'          => 'Ismael Rufino',
            'last_name'     => 'Gradejada Marin',
            'address'       => 'San Felipe',
            'phone'         => '0958473647',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'tione_210@hotmail.com',

            'birth_date'      => '1977/06/17',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "115";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0582678853');
        $user          = User::create([

            'ci'            => '0582678853',
            'type_document' => 'cedula',
            'name'          => 'Jonathan',
            'last_name'     => 'López',
            'address'       => 'San Felipe',
            'phone'         => '0958694857',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'Jonathanrazor182@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0582678853',
            'type_document' => 'cedula',
            'name'          => 'Jonathan',
            'last_name'     => 'López',
            'address'       => 'San Felipe',
            'phone'         => '0958694857',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'Jonathanrazor182@gmail.com',

            'birth_date'      => '1985/03/09',
            'gender'          => 'masculino',
            'job'             => 'Carpintero',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "116";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('123456789');
        $user          = User::create([

            'ci'            => '123456789',
            'type_document' => 'cedula',
            'name'          => 'Erik Jaime',
            'last_name'     => 'Pacheco Arana',
            'address'       => 'San Felipe',
            'phone'         => '0958674758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'devrikoficial@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '123456789',
            'type_document' => 'cedula',
            'name'          => 'Erik Jaime',
            'last_name'     => 'Pacheco Arana',
            'address'       => 'San Felipe',
            'phone'         => '0958674758',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'devrikoficial@gmail.com',

            'birth_date'      => '1996/03/19',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "117";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();












$user_password = Hash::make('0575727201');
        $user          = User::create([

            'ci'            => '0575727201',
            'type_document' => 'cedula',
            'name'          => 'Fernando',
            'last_name'     => 'Colchon',
            'address'       => 'San Felipe',
            'phone'         => '0958673847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'f.colchon.nnz@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0575727201',
            'type_document' => 'cedula',
            'name'          => 'Fernando',
            'last_name'     => 'Colchon',
            'address'       => 'San Felipe',
            'phone'         => '0958673847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'f.colchon.nnz@gmail.com',

            'birth_date'      => '1996/03/24',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "118";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0567876756');
        $user          = User::create([

            'ci'            => '0567876756',
            'type_document' => 'cedula',
            'name'          => 'José',
            'last_name'     => 'Mangandid',
            'address'       => 'San Felipe',
            'phone'         => '0978675847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mangandid32@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0567876756',
            'type_document' => 'cedula',
            'name'          => 'José',
            'last_name'     => 'Mangandid',
            'address'       => 'San Felipe',
            'phone'         => '0978675847',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'mangandid32@gmail.com',

            'birth_date'      => '2000/10/21',
            'gender'          => 'masculino',
            'job'             => 'Estudiante',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "119";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










$user_password = Hash::make('0567983465');
        $user          = User::create([

            'ci'            => '0567983465',
            'type_document' => 'cedula',
            'name'          => 'Gabriel',
            'last_name'     => 'Breseda',
            'address'       => 'San Felipe',
            'phone'         => '0978695746',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'bresedagabriel345@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0567983465',
            'type_document' => 'cedula',
            'name'          => 'Gabriel',
            'last_name'     => 'Breseda',
            'address'       => 'San Felipe',
            'phone'         => '0978695746',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'bresedagabriel345@gmail.com',

            'birth_date'      => '1983/10/11',
            'gender'          => 'masculino',
            'job'             => 'Abogado',

            'phone_2'         => '',
            'instruction'     => 'secundaria',
            'province'        => 'Cotopaxi',
            'city'            => 'Latacunga',
            'allergy'         => 'Ninguna',
            'marital_status'  => 'Soltero(a)',
            'blood_type'      => 'ORH +',
            'observation'     => 'Ninguna',
            'history_medical' => 'Ninguna',
            'id_user'         => $user->id,
        ]);

        $medical_record             = new MedicalRecord();
        $medical_record->code       = "120";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();










    }
}