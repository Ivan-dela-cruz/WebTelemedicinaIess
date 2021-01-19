<?php

use App\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Spatie\Permission\Models\Role;
use Spatie\Permission\Models\Permission;

class RolesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // resetea el cache el los roles y permisos
        app()['cache']->forget('spatie.permission.cache');


        /// crea los permisos para el crud del roles
        ///
        Permission::create(['name' => 'crear rol', 'state' => 1, 'modulo' => 'Roles', 'description' => 'Permite crear un rol']);
        Permission::create(['name' => 'leer rol', 'state' => 1, 'modulo' => 'Roles', 'description' => 'Permite ver un rol']);
        Permission::create(['name' => 'modificar rol', 'state' => 1, 'modulo' => 'Roles', 'description' => 'Permite modificar un rol']);
        Permission::create(['name' => 'eliminar rol', 'state' => 1, 'modulo' => 'Roles', 'description' => 'Permite eliminar un rol']);

        /// crea los permisos para el crud del usuario
        ///
        Permission::create(['name' => 'crear user', 'state' => 1, 'modulo' => 'Usuarios', 'description' => 'Permite crear un usuario']);
        Permission::create(['name' => 'leer user', 'state' => 1, 'modulo' => 'Usuarios', 'description' => 'Permite ver un usuario']);
        Permission::create(['name' => 'modificar user', 'state' => 1, 'modulo' => 'Usuarios', 'description' => 'Permite modificar un usuario']);
        Permission::create(['name' => 'eliminar user', 'state' => 1, 'modulo' => 'Usuarios', 'description' => 'Permite eliminar un usuario']);

        /// crea los permisos para el crud de las fichas medicas

        Permission::create(['name' => 'crear ficha', 'state' => 1, 'modulo' => 'Fichas médicas', 'description' => 'Permite crear una ficha médica']);
        Permission::create(['name' => 'leer ficha', 'state' => 1, 'modulo' => 'Fichas médicas', 'description' => 'Permite ver una ficha médica']);
        Permission::create(['name' => 'modificar ficha', 'state' => 1, 'modulo' => 'Fichas médicas', 'description' => 'Permite modificar una ficha médica']);
        Permission::create(['name' => 'eliminar ficha', 'state' => 1, 'modulo' => 'Fichas médicas', 'description' => 'Permite eliminar una ficha médica']);


        /// crea los permisos para el crud de los pacientes

        Permission::create(['name' => 'crear paciente', 'state' => 1, 'modulo' => 'Pacientes', 'description' => 'Permite crear un paciente']);
        Permission::create(['name' => 'leer paciente', 'state' => 1, 'modulo' => 'Pacientes', 'description' => 'Permite ver un paciente']);
        Permission::create(['name' => 'modificar paciente', 'state' => 1, 'modulo' => 'Pacientes', 'description' => 'Permite modificar un paciente']);
        Permission::create(['name' => 'eliminar paciente', 'state' => 1, 'modulo' => 'Pacientes', 'description' => 'Permite eliminar un paciente']);

        /// crea los permisos para el crud de las consultas medicas
        Permission::create(['name' => 'crear consulta', 'state' => 1, 'modulo' => 'Consultas médicas', 'description' => 'Permite crear una consulta médica']);
        Permission::create(['name' => 'leer consulta', 'state' => 1, 'modulo' => 'Consultas médicas', 'description' => 'Permite ver una consulta médica']);
        Permission::create(['name' => 'modificar consulta', 'state' => 1, 'modulo' => 'Consultas médicas', 'description' => 'Permite modificar una consulta médica']);
        Permission::create(['name' => 'eliminar consulta', 'state' => 1, 'modulo' => 'Consultas médicas', 'description' => 'Permite eliminar una consulta médica']);

        //permisos para los recibos de cobro
        Permission::create(['name' => 'crear recibo', 'state' => 1, 'modulo' => 'Recibos de cobro', 'description' => 'Permite crear un recibo de cobro']);
        Permission::create(['name' => 'leer recibo', 'state' => 1, 'modulo' => 'Recibos de cobro', 'description' => 'Permite ver un recibo de cobro']);
        Permission::create(['name' => 'modificar recibo', 'state' => 1, 'modulo' => 'Recibos de cobro', 'description' => 'Permite modificar un recibo de cobro']);
        Permission::create(['name' => 'eliminar recibo', 'state' => 1, 'modulo' => 'Recibos de cobro', 'description' => 'Permite eliminar un recibo de cobro']);

        //permisos para las reservas de citas

        Permission::create(['name' => 'crear cita', 'state' => 1, 'modulo' => 'Citas médicas', 'description' => 'Permite crear un cita']);
        Permission::create(['name' => 'leer cita', 'state' => 1, 'modulo' => 'Citas médicas', 'description' => 'Permite ver un cita']);
        Permission::create(['name' => 'modificar cita', 'state' => 1, 'modulo' => 'Citas médicas', 'description' => 'Permite modificar un cita']);
        Permission::create(['name' => 'eliminar cita', 'state' => 1, 'modulo' => 'Citas médicas', 'description' => 'Permite eliminar un cita']);


        /// cramos los roles para que son admin, propietario, secretaria, medico
        $role = Role::create(['name' => 'Administrador', 'status' => 'activo']);

        //asignacion de los permisos al rol admin
        $role->givePermissionTo(Permission::all());

        $role = Role::create(['name' => 'Doctor', 'status' => 'activo']);
        $role = Role::create(['name' => 'Paciente', 'status' => 'activo']);


        ///crearmos el usario por defecto
        $user_password = Hash::make('root1234');
        $user = User::create([
                'ci' => '1750474049',
                'type_document'=>'cedula',
                'name' => 'admin',
                'email' => 'admin@gmail.com',
                'password' => $user_password,
                'last_name' => 'sn',
                'address' => 'sn',
                'phone' => '1234567890',
                'url_image' => '#',
                'status' => 'activo'
            ]

        );

        $user->assignRole('Administrador');
    }
}
