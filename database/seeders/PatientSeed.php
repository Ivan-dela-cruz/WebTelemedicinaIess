<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\User;
use App\Patients;
use App\MedicalRecord;
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
        $user_password = Hash::make('1310600372');
        $user          = User::create([

            'ci'            => '1310600372',
            'type_document' => 'cedula',
            'name'          => 'Isabel',
            'last_name'     => 'Zambrano',
            'address'       => 'San Felipe',
            'phone'         => '0870706852',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'zisabl.1706@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'              => '1310600372',
            'type_document'   => 'cedula',
            'name'            => 'Isabel',
            'last_name'       => 'Zambrano',
            'address'         => 'San Felipe',
            'phone'           => '0870706852',
            'status'          => 'activo',
            'url_image'       => '#',
            'email'           => 'zisabl.1706@gmail.com',

            'birth_date'      => '1981/12/14',
            'gender'          => 'femenino',
            'job'             => 'Cocinera',

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
        $medical_record->code       = "1";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        /*  *******************************  USUARIO Y PACIENTE        */
        $user_password = Hash::make('0550061253');
        $user          = User::create([

            'ci'            => '0550061253',
            'type_document' => 'cedula',
            'name'          => 'Xavier',
            'last_name'     => 'Muso',
            'address'       => 'San Felipe',
            'phone'         => '0980568789',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'alexis_xa1253hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550061253',
            'type_document' => 'cedula',
            'name'          => 'Xavier',
            'last_name'     => 'Muso',
            'address'       => 'San Felipe',
            'phone'         => '0980568789',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'alexis_xa1253hotmail.com',

            'birth_date'      => '1996/02/15',
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
        $medical_record->code       = "2";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0504073537');
        $user          = User::create([

            'ci'            => '0504073537',
            'type_document' => 'cedula',
            'name'          => 'Felipe',
            'last_name'     => 'Chiluisa',
            'address'       => 'San Felipe',
            'phone'         => '0958495039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'chiluisa982@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0504073537',
            'type_document' => 'cedula',
            'name'          => 'Felipe',
            'last_name'     => 'Chiluisa',
            'address'       => 'San Felipe',
            'phone'         => '0958495039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'chiluisa982@gmail.com ',

            'birth_date'      => '1997/09/10',
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
        $medical_record->code       = "3";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();












       
        $user_password = Hash::make('0503110405');
        $user          = User::create([

            'ci'            => '0503110405',
            'type_document' => 'cedula',
            'name'          => 'Ana Carolina',
            'last_name'     => 'Osorio Santo',
            'address'       => 'San Felipe',
            'phone'         => '0948593049',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carolaysosorio64@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503110405',
            'type_document' => 'cedula',
            'name'          => 'Ana Carolina',
            'last_name'     => 'Osorio Santo',
            'address'       => 'San Felipe',
            'phone'         => '0948593049',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carolaysosorio64@gmail.com',

            'birth_date'      => '1993/01/15',
            'gender'          => 'femenino',
            'job'             => 'Enfermera',

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
        $medical_record->code       = "4";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















        $user_password = Hash::make('1713839932');
        $user          = User::create([

            'ci'            => '1713839932',
            'type_document' => 'cedula',
            'name'          => 'Norma Lucia',
            'last_name'     => 'Ortega Cabrera',
            'address'       => 'San Felipe',
            'phone'         => '0968574939',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lucia10_12@outlook.es ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1713839932',
            'type_document' => 'cedula',
            'name'          => 'Norma Lucia',
            'last_name'     => 'Ortega Cabrera',
            'address'       => 'San Felipe',
            'phone'         => '0968574939',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lucia10_12@outlook.es ',

            'birth_date'      => '1975/05/20',
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
        $medical_record->code       = "5";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();













        $user_password = Hash::make('1722660121');
        $user          = User::create([

            'ci'            => '1722660121',
            'type_document' => 'cedula',
            'name'          => 'Paul Israel',
            'last_name'     => 'Guanochanga Viracucha',
            'address'       => 'San Felipe',
            'phone'         => '0958693950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'paulisrael@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1722660121',
            'type_document' => 'cedula',
            'name'          => 'Paul Israel',
            'last_name'     => 'Guanochanga Viracucha',
            'address'       => 'San Felipe',
            'phone'         => '0958693950',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'paulisrael@gmail.com',

            'birth_date'      => '1992/05/12',
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
        $medical_record->code       = "6";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















        $user_password = Hash::make('0501990394');
        $user          = User::create([

            'ci'            => '0501990394',
            'type_document' => 'cedula',
            'name'          => 'Edwin',
            'last_name'     => 'Osorio Santo',
            'address'       => 'San Felipe',
            'phone'         => '0968596037',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'edmaosan1974@hotmail.es ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501990394',
            'type_document' => 'cedula',
            'name'          => 'Edwin',
            'last_name'     => 'Osorio Santo',
            'address'       => 'San Felipe',
            'phone'         => '0968596037',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'edmaosan1974@hotmail.es ',

            'birth_date'      => '1979/05/15',
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
        $medical_record->code       = "7";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();













        $user_password = Hash::make('0501598387');
        $user          = User::create([

            'ci'            => '0501598387',
            'type_document' => 'cedula',
            'name'          => 'Blanca Tarcila',
            'last_name'     => 'Osorio Santo',
            'address'       => 'San Felipe',
            'phone'         => '0958496029',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'blanca tarosorio1@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501598387',
            'type_document' => 'cedula',
            'name'          => 'Blanca Tarcila',
            'last_name'     => 'Osorio Santo',
            'address'       => 'San Felipe',
            'phone'         => '0958496029',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'blanca tarosorio1@hotmail.com',

            'birth_date'      => '1979/10/11',
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
        $medical_record->code       = "8";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















        $user_password = Hash::make('0503113953');
        $user          = User::create([

            'ci'            => '0503113953',
            'type_document' => 'cedula',
            'name'          => 'Fabricio Antonio',
            'last_name'     => 'Velenzuela Chanatasig',
            'address'       => 'San Felipe',
            'phone'         => '0958493893',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabricio.valenzuela94@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503113953',
            'type_document' => 'cedula',
            'name'          => 'Fabricio Antonio',
            'last_name'     => 'Velenzuela Chanatasig',
            'address'       => 'San Felipe',
            'phone'         => '0958493893',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabricio.valenzuela94@gmail.com',

            'birth_date'      => '1994/08/13',
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
        $medical_record->code       = "9";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0503951188');
        $user          = User::create([

            'ci'            => '0503951188',
            'type_document' => 'cedula',
            'name'          => 'Cristina',
            'last_name'     => 'Defaz',
            'address'       => 'San Felipe',
            'phone'         => '0958604938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'damaris1995-2013@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503951188',
            'type_document' => 'cedula',
            'name'          => 'Cristina',
            'last_name'     => 'Defaz',
            'address'       => 'San Felipe',
            'phone'         => '0958604938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'damaris1995-2013@hotmail.com',

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
        $medical_record->code       = "10";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0504586231');
        $user          = User::create([

            'ci'            => '0504586231',
            'type_document' => 'cedula',
            'name'          => 'Bryan Andrés',
            'last_name'     => 'Loor Cevallos',
            'address'       => 'San Felipe',
            'phone'         => '0949593940',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'loorcevallos31@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

           'ci'            => '0504586231',
            'type_document' => 'cedula',
            'name'          => 'Bryan Andrés',
            'last_name'     => 'Loor Cevallos',
            'address'       => 'San Felipe',
            'phone'         => '0949593940',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'loorcevallos31@gmail.com ',

            'birth_date'      => '2001/10/23',
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
        $medical_record->code       = "11";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0501291900');
        $user          = User::create([

            'ci'            => '0501291900',
            'type_document' => 'cedula',
            'name'          => 'Fabiaán Marcelo',
            'last_name'     => 'Tipan Guaman',
            'address'       => 'San Felipe',
            'phone'         => '0948583726',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabianchiluisamoreno@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501291900',
            'type_document' => 'cedula',
            'name'          => 'Fabiaán Marcelo',
            'last_name'     => 'Tipan Guaman',
            'address'       => 'San Felipe',
            'phone'         => '0948583726',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabianchiluisamoreno@gmail.com',

            'birth_date'      => '1986/03/11',
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
        $medical_record->code       = "12";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0504239807');
        $user          = User::create([

            'ci'            => '0504239807',
            'type_document' => 'cedula',
            'name'          => 'Jhonny Marcelo',
            'last_name'     => 'Tipan Guaman',
            'address'       => 'San Felipe',
            'phone'         => '0968794850',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jhonnytipan1994@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0504239807',
            'type_document' => 'cedula',
            'name'          => 'Jhonny Marcelo',
            'last_name'     => 'Tipan Guaman',
            'address'       => 'San Felipe',
            'phone'         => '0968794850',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jhonnytipan1994@gmail.com ',

            'birth_date'      => '1998/04/06',
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
        $medical_record->code       = "13";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
       

    
















        $user_password = Hash::make('0503724635');
        $user          = User::create([

            'ci'            => '0503724635',
            'type_document' => 'cedula',
            'name'          => 'Fernando Raúl',
            'last_name'     => 'Moreano Anchaguano',
            'address'       => 'San Felipe',
            'phone'         => '0958493849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'raul_021996@hotmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503724635',
            'type_document' => 'cedula',
            'name'          => 'Fernando Raúl',
            'last_name'     => 'Moreano Anchaguano',
            'address'       => 'San Felipe',
            'phone'         => '0958493849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'raul_021996@hotmail.com ',

            'birth_date'      => '1992/09/12',
            'gender'          => 'masculino',
            'job'             => 'Licenciado',

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
        $medical_record->code       = "14";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0550040349');
        $user          = User::create([

            'ci'            => '0550040349',
            'type_document' => 'cedula',
            'name'          => 'Fabian',
            'last_name'     => 'Cando',
            'address'       => 'San Felipe',
            'phone'         => '0958694837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'chicauzaerik7@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550040349',
            'type_document' => 'cedula',
            'name'          => 'Fabian',
            'last_name'     => 'Cando',
            'address'       => 'San Felipe',
            'phone'         => '0958694837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'chicauzaerik7@gmail.com ',

            'birth_date'      => '1996/02/12',
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
        $medical_record->code       = "15";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0550127732');
        $user          = User::create([

            'ci'            => '0550127732',
            'type_document' => 'cedula',
            'name'          => 'Jimmy Sebastian',
            'last_name'     => 'Pinto Montesdeoca',
            'address'       => 'San Felipe',
            'phone'         => '0947583965',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'pintojimmy757@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550127732',
            'type_document' => 'cedula',
            'name'          => 'Jimmy Sebastian',
            'last_name'     => 'Pinto Montesdeoca',
            'address'       => 'San Felipe',
            'phone'         => '0947583965',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'pintojimmy757@gmail.com',

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
        $medical_record->code       = "16";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();

















        $user_password = Hash::make('0550575674');
        $user          = User::create([

            'ci'            => '0550575674',
            'type_document' => 'cedula',
            'name'          => 'jeniffer',
            'last_name'     => 'Yanez',
            'address'       => 'San Felipe',
            'phone'         => '0958485938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jeniferyanez1998@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550575674',
            'type_document' => 'cedula',
            'name'          => 'jeniffer',
            'last_name'     => 'Yanez',
            'address'       => 'San Felipe',
            'phone'         => '0958485938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jeniferyanez1998@gmail.com ',

            'birth_date'      => '1996/05/13',
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
        $medical_record->code       = "17";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















        $user_password = Hash::make('0550161162');
        $user          = User::create([

            'ci'            => '0550161162',
            'type_document' => 'cedula',
            'name'          => 'Diana Maribel',
            'last_name'     => 'Pallo Taco',
            'address'       => 'San Felipe',
            'phone'         => '0968784596',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'dianataco81@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550161162',
            'type_document' => 'cedula',
            'name'          => 'Diana Maribel',
            'last_name'     => 'Pallo Taco',
            'address'       => 'San Felipe',
            'phone'         => '0968784596',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'dianataco81@gmail.com ',

            'birth_date'      => '1996/06/12',
            'gender'          => 'femenino',
            'job'             => 'Mesera',

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
        $medical_record->code       = "18";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0550209639');
        $user          = User::create([

            'ci'            => '0550209639',
            'type_document' => 'cedula',
            'name'          => 'Edison',
            'last_name'     => 'Chiluisa',
            'address'       => 'San Felipe',
            'phone'         => '0958699450',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'chiluisae2002@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550209639',
            'type_document' => 'cedula',
            'name'          => 'Edison',
            'last_name'     => 'Chiluisa',
            'address'       => 'San Felipe',
            'phone'         => '0958699450',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'chiluisae2002@gmail.com',

            'birth_date'      => '1999/03/17',
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
        $medical_record->code       = "19";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0550492136');
        $user          = User::create([

            'ci'            => '0550492136',
            'type_document' => 'cedula',
            'name'          => 'Belen',
            'last_name'     => 'Lema',
            'address'       => 'San Felipe',
            'phone'         => '0958694039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lemabel05@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550492136',
            'type_document' => 'cedula',
            'name'          => 'Belen',
            'last_name'     => 'Lema',
            'address'       => 'San Felipe',
            'phone'         => '0958694039',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lemabel05@gmail.com ',

            'birth_date'      => '2000/10/19',
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
        $medical_record->code       = "20";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();






  /*  *******************************  USUARIO Y PACIENTE        */
        $user_password = Hash::make('0550572572');
        $user          = User::create([

            'ci'            => '0550572572',
            'type_document' => 'cedula',
            'name'          => 'Cesar Stalin',
            'last_name'     => 'Guanoluisa Chasi',
            'address'       => 'San Felipe',
            'phone'         => '0937485949',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'stlncj7@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550572572',
            'type_document' => 'cedula',
            'name'          => 'Cesar Stalin',
            'last_name'     => 'Guanoluisa Chasi',
            'address'       => 'San Felipe',
            'phone'         => '0937485949',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'stlncj7@gmail.com ',

            'birth_date'      => '2000/02/03',
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
        $medical_record->code       = "21";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        /*  *******************************  USUARIO Y PACIENTE        */
        $user_password = Hash::make('0550491849');
        $user          = User::create([

            'ci'            => '0550491849',
            'type_document' => 'cedula',
            'name'          => 'Lesly',
            'last_name'     => 'Moreno',
            'address'       => 'San Felipe',
            'phone'         => '0969503855',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'leslimoreno370@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550491849',
            'type_document' => 'cedula',
            'name'          => 'Lesly',
            'last_name'     => 'Moreno',
            'address'       => 'San Felipe',
            'phone'         => '0969503855',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'leslimoreno370@gmail.com',

            'birth_date'      => '2001/01/04',
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
        $medical_record->code       = "22";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0502888506');
        $user          = User::create([

            'ci'            => '0502888506',
            'type_document' => 'cedula',
            'name'          => 'Carolina',
            'last_name'     => 'Jácome',
            'address'       => 'San Felipe',
            'phone'         => '0986584859',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'caroj631@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0502888506',
            'type_document' => 'cedula',
            'name'          => 'Carolina',
            'last_name'     => 'Jácome',
            'address'       => 'San Felipe',
            'phone'         => '0986584859',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'caroj631@gmail.com ',

            'birth_date'      => '1997/10/22',
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
        $medical_record->code       = "23";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();












       
        $user_password = Hash::make('0503665150');
        $user          = User::create([

            'ci'            => '0503665150',
            'type_document' => 'cedula',
            'name'          => 'Johana',
            'last_name'     => 'Parra',
            'address'       => 'San Felipe',
            'phone'         => '0958673947',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'johanachina4@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503665150',
            'type_document' => 'cedula',
            'name'          => 'Johana',
            'last_name'     => 'Parra',
            'address'       => 'San Felipe',
            'phone'         => '0958673947',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'johanachina4@gmail.com ',

            'birth_date'      => '1996/07/09',
            'gender'          => 'femenino',
            'job'             => 'Enfermera',

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
        $medical_record->code       = "24";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















        $user_password = Hash::make('0502931587');
        $user          = User::create([

            'ci'            => '0502931587',
            'type_document' => 'cedula',
            'name'          => 'Fabián Alejandro',
            'last_name'     => 'Chiluisa Mayo',
            'address'       => 'San Felipe',
            'phone'         => '0995684958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabian522@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0502931587',
            'type_document' => 'cedula',
            'name'          => 'Fabián Alejandro',
            'last_name'     => 'Chiluisa Mayo',
            'address'       => 'San Felipe',
            'phone'         => '0995684958',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'fabian522@hotmail.com',

            'birth_date'      => '1975/05/20',
            'gender'          => 'masculino',
            'job'             => 'Maestro',

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
        $medical_record->code       = "25";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();













        $user_password = Hash::make('0503689028');
        $user          = User::create([

            'ci'            => '0503689028',
            'type_document' => 'cedula',
            'name'          => 'Carlos Andres',
            'last_name'     => 'Acuña Espin',
            'address'       => 'San Felipe',
            'phone'         => '0986704493',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carlitos19.k@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503689028',
            'type_document' => 'cedula',
            'name'          => 'Carlos Andres',
            'last_name'     => 'Acuña Espin',
            'address'       => 'San Felipe',
            'phone'         => '0986704493',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'carlitos19.k@gmail.com',

            'birth_date'      => '1998/06/13',
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
        $medical_record->code       = "26";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















        $user_password = Hash::make('0503992760');
        $user          = User::create([

            'ci'            => '0503992760',
            'type_document' => 'cedula',
            'name'          => 'Verónica Alexandra',
            'last_name'     => 'Llumiquinga Chicaiza',
            'address'       => 'San Felipe',
            'phone'         => '0957693300',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'vero9alexa96@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503992760',
            'type_document' => 'cedula',
            'name'          => 'Verónica Alexandra',
            'last_name'     => 'Llumiquinga Chicaiza',
            'address'       => 'San Felipe',
            'phone'         => '0957693300',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'vero9alexa96@gmail.com',

            'birth_date'      => '1999/03/13',
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
        $medical_record->code       = "27";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();













        $user_password = Hash::make('1726666660');
        $user          = User::create([

            'ci'            => '1726666660',
            'type_document' => 'cedula',
            'name'          => 'Jenifer Estefany',
            'last_name'     => 'Maihua Toapanta',
            'address'       => 'San Felipe',
            'phone'         => '0987695748',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jenifer.maihua6660@utc.edu.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1726666660',
            'type_document' => 'cedula',
            'name'          => 'Jenifer Estefany',
            'last_name'     => 'Maihua Toapanta',
            'address'       => 'San Felipe',
            'phone'         => '0987695748',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jenifer.maihua6660@utc.edu.ec',

            'birth_date'      => '2000/03/03',
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
        $medical_record->code       = "28";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















        $user_password = Hash::make('0550107197');
        $user          = User::create([

            'ci'            => '0550107197',
            'type_document' => 'cedula',
            'name'          => 'Mercedes',
            'last_name'     => 'Taipe Paz',
            'address'       => 'San Felipe',
            'phone'         => '0948593305',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jessenia.taipe.paz@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550107197',
            'type_document' => 'cedula',
            'name'          => 'Mercedes',
            'last_name'     => 'Taipe Paz',
            'address'       => 'San Felipe',
            'phone'         => '0948593305',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'jessenia.taipe.paz@gmail.com',

            'birth_date'      => '1995/02/18',
            'gender'          => 'femenino',
            'job'             => 'Profesora',

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
        $medical_record->code       = "29";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('1057544886');
        $user          = User::create([

            'ci'            => '1057544886',
            'type_document' => 'cedula',
            'name'          => 'Laura',
            'last_name'     => 'Maldonado',
            'address'       => 'San Felipe',
            'phone'         => '0958604938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lauravalentinamaldonado1@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1057544886',
            'type_document' => 'cedula',
            'name'          => 'Laura',
            'last_name'     => 'Maldonado',
            'address'       => 'San Felipe',
            'phone'         => '0958604938',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lauravalentinamaldonado1@gmail.com',

            'birth_date'      => '1998/09/11',
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
        $medical_record->code       = "30";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0502503931');
        $user          = User::create([

            'ci'            => '0502503931',
            'type_document' => 'cedula',
            'name'          => 'Gabriela',
            'last_name'     => 'Tibán',
            'address'       => 'San Felipe',
            'phone'         => '0949479572',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'gtiban04@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0502503931',
            'type_document' => 'cedula',
            'name'          => 'Gabriela',
            'last_name'     => 'Tibán',
            'address'       => 'San Felipe',
            'phone'         => '0949479572',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'gtiban04@gmail.com',

            'birth_date'      => '1991/03/19',
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
        $medical_record->code       = "31";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0202191482');
        $user          = User::create([

            'ci'            => '0202191482',
            'type_document' => 'cedula',
            'name'          => 'Oscar Sebastian',
            'last_name'     => 'Alava Remache',
            'address'       => 'San Felipe',
            'phone'         => '0960795939',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'oscarremache48@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0202191482',
            'type_document' => 'cedula',
            'name'          => 'Oscar Sebastian',
            'last_name'     => 'Alava Remache',
            'address'       => 'San Felipe',
            'phone'         => '0960795939',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'oscarremache48@gmail.com',

            'birth_date'      => '2000/10/20',
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
        $medical_record->code       = "32";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0501495105');
        $user          = User::create([

            'ci'            => '0501495105',
            'type_document' => 'cedula',
            'name'          => 'Dolores Eugenia',
            'last_name'     => 'Chiluisa Moreno',
            'address'       => 'San Felipe',
            'phone'         => '0968794850',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lolita.1965@hotmail.es',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0501495105',
            'type_document' => 'cedula',
            'name'          => 'Dolores Eugenia',
            'last_name'     => 'Chiluisa Moreno',
            'address'       => 'San Felipe',
            'phone'         => '0968794850',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'lolita.1965@hotmail.es',

            'birth_date'      => '2000/01/23',
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
        $medical_record->code       = "33";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
       

    
















        $user_password = Hash::make('0502883697');
        $user          = User::create([

            'ci'            => '0502883697',
            'type_document' => 'cedula',
            'name'          => 'Victoria',
            'last_name'     => 'Romero',
            'address'       => 'San Felipe',
            'phone'         => '0958495860',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'vicabiroso@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0502883697',
            'type_document' => 'cedula',
            'name'          => 'Victoria',
            'last_name'     => 'Romero',
            'address'       => 'San Felipe',
            'phone'         => '0958495860',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'vicabiroso@gmail.com',

            'birth_date'      => '1985/09/11',
            'gender'          => 'femenino',
            'job'             => 'Licenciado',

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
        $medical_record->code       = "34";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();














        $user_password = Hash::make('0503724130');
        $user          = User::create([

            'ci'            => '0503724130',
            'type_document' => 'cedula',
            'name'          => 'Cristian',
            'last_name'     => 'Zapata',
            'address'       => 'San Felipe',
            'phone'         => '0947589340',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'cristian08zapata@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0503724130',
            'type_document' => 'cedula',
            'name'          => 'Cristian',
            'last_name'     => 'Zapata',
            'address'       => 'San Felipe',
            'phone'         => '0947589340',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'cristian08zapata@gmail.com',

            'birth_date'      => '1996/02/05',
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
        $medical_record->code       = "35";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('1850181916');
        $user          = User::create([

            'ci'            => '1850181916',
            'type_document' => 'cedula',
            'name'          => 'Sthefany Gisel',
            'last_name'     => 'Cañar Guanoluisa',
            'address'       => 'San Felipe',
            'phone'         => '0955586038',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'gissc2000@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1850181916',
            'type_document' => 'cedula',
            'name'          => 'Sthefany Gisel',
            'last_name'     => 'Cañar Guanoluisa',
            'address'       => 'San Felipe',
            'phone'         => '0955586038',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'gissc2000@gmail.com',

            'birth_date'      => '1999/10/26',
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
        $medical_record->code       = "36";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();

















        $user_password = Hash::make('0550161384');
        $user          = User::create([

            'ci'            => '0550161384',
            'type_document' => 'cedula',
            'name'          => 'Luis Fernando',
            'last_name'     => 'Pallo Taco',
            'address'       => 'San Felipe',
            'phone'         => '0948576839',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'pallofernando138@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550161384',
            'type_document' => 'cedula',
            'name'          => 'Luis Fernando',
            'last_name'     => 'Pallo Taco',
            'address'       => 'San Felipe',
            'phone'         => '0948576839',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'pallofernando138@gmail.com ',

            'birth_date'      => '1996/05/16',
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
        $medical_record->code       = "37";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















        $user_password = Hash::make('1721976056');
        $user          = User::create([

            'ci'            => '1721976056',
            'type_document' => 'cedula',
            'name'          => 'Orlando Wluadimir',
            'last_name'     => 'Vasquez Pilaguano',
            'address'       => 'San Felipe',
            'phone'         => '0997860548',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'orlando.vasquez6056@utc.edu.ec',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1721976056',
            'type_document' => 'cedula',
            'name'          => 'Orlando Wluadimir',
            'last_name'     => 'Vasquez Pilaguano',
            'address'       => 'San Felipe',
            'phone'         => '0997860548',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'orlando.vasquez6056@utc.edu.ec',

            'birth_date'      => '1994/07/19',
            'gender'          => 'masculino',
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
        $medical_record->code       = "38";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















        $user_password = Hash::make('0502365786');
        $user          = User::create([

            'ci'            => '0502365786',
            'type_document' => 'cedula',
            'name'          => 'Martha',
            'last_name'     => 'Mise Cofre',
            'address'       => 'San Felipe',
            'phone'         => '0957684939',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'marthyyo@gmail.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0502365786',
            'type_document' => 'cedula',
            'name'          => 'Martha',
            'last_name'     => 'Mise Cofre',
            'address'       => 'San Felipe',
            'phone'         => '0957684939',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'marthyyo@gmail.com ',

            'birth_date'      => '1987/07/12',
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
        $medical_record->code       = "39";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();




















        $user_password = Hash::make('0550229876');
        $user          = User::create([

            'ci'            => '0550229876',
            'type_document' => 'cedula',
            'name'          => 'Linda Mayuri',
            'last_name'     => 'Toaquiza Iglesias',
            'address'       => 'San Felipe',
            'phone'         => '0958694059',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'maryuritoaquiza@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550229876',
            'type_document' => 'cedula',
            'name'          => 'Linda Mayuri',
            'last_name'     => 'Toaquiza Iglesias',
            'address'       => 'San Felipe',
            'phone'         => '0958694059',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'maryuritoaquiza@gmail.com',

            'birth_date'      => '1997/11/30',
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
        $medical_record->code       = "40";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();















$user_password = Hash::make('1751062868');
        $user          = User::create([

            'ci'            => '1751062868',
            'type_document' => 'cedula',
            'name'          => 'Andrea',
            'last_name'     => 'Osorio',
            'address'       => 'San Felipe',
            'phone'         => '0969703849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'andreosma2000@live.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1751062868',
            'type_document' => 'cedula',
            'name'          => 'Andrea',
            'last_name'     => 'Osorio',
            'address'       => 'San Felipe',
            'phone'         => '0969703849',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'andreosma2000@live.com',

            'birth_date'      => '1996/09/21',
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
        $medical_record->code       = "41";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();
















$user_password = Hash::make('0550071773');
        $user          = User::create([

            'ci'            => '0550071773',
            'type_document' => 'cedula',
            'name'          => 'Patricio',
            'last_name'     => 'Pinto',
            'address'       => 'San Felipe',
            'phone'         => '0905495837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'pintopatricio538@gmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '0550071773',
            'type_document' => 'cedula',
            'name'          => 'Patricio',
            'last_name'     => 'Pinto',
            'address'       => 'San Felipe',
            'phone'         => '0905495837',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'pintopatricio538@gmail.com',

            'birth_date'      => '2000/10/25',
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
        $medical_record->code       = "42";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();



















$user_password = Hash::make('1716288228');
        $user          = User::create([

            'ci'            => '1716288228',
            'type_document' => 'cedula',
            'name'          => 'Paulina',
            'last_name'     => 'Malca',
            'address'       => 'San Felipe',
            'phone'         => '0930498549',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'paulymd12@live.com ',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1716288228',
            'type_document' => 'cedula',
            'name'          => 'Paulina',
            'last_name'     => 'Malca',
            'address'       => 'San Felipe',
            'phone'         => '0930498549',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 'paulymd12@live.com ',

            'birth_date'      => '1983/09/13',
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
        $medical_record->code       = "43";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();

















$user_password = Hash::make('1725920513');
        $user          = User::create([

            'ci'            => '1725920513',
            'type_document' => 'cedula',
            'name'          => 'Estefania Elizabeth',
            'last_name'     => 'Leon Caizaluisa',
            'address'       => 'San Felipe',
            'phone'         => '0930495883',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 's.tefytkf@hotmail.com',

            'password'      => $user_password,
        ]
        );
        $role = Role::findById(3);
        $user->assignRole($role);
        $patient = Patients::create([

            'ci'            => '1725920513',
            'type_document' => 'cedula',
            'name'          => 'Estefania Elizabeth',
            'last_name'     => 'Leon Caizaluisa',
            'address'       => 'San Felipe',
            'phone'         => '0930495883',
            'status'        => 'activo',
            'url_image'     => '#',
            'email'         => 's.tefytkf@hotmail.com',

            'birth_date'      => '1994/05/21',
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
        $medical_record->code       = "44";
        $medical_record->id_patient = $patient->id;
        $medical_record->save();





 


    }
}
