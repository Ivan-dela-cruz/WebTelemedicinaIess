<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    PageController
};

use App\Http\Livewire\{
    ShowEvents
};

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::middleware('loggedin')->group(function() {
    Route::get('login', [AuthController::class, 'loginView'])->name('login-view');
    Route::post('login', [AuthController::class, 'login'])->name('login');
    Route::get('register', [AuthController::class, 'registerView'])->name('register-view');
    Route::post('register', [AuthController::class, 'register'])->name('register');
});


    Route::get('/', [PageController::class, 'loadPage'])->name('dashboard');
    // Route::get('/events', ShowEvents::class)->name('events');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('page/{layout}/{theme}/{pageName}', [PageController::class, 'loadPage'])->name('page');

    //RUTAS PARA EL PANEL DE CONTROL
    Route::get('admin', 'App\Http\Controllers\admin\PanelController@index')->name('admin');

    ///RUTAS PARA GESTIONAR LOS ROLES Y PERMISOS
    Route::get('roles', 'App\Http\Controllers\admin\RoleController@getRoles')->name('roles');
    Route::get('permissions/{id}', 'App\Http\Controllers\admin\RoleController@getPermissions')->name('permissions');
    Route::get('get-roles', 'App\Http\Controllers\admin\RoleController@index')->name('get-roles');
    Route::get('create-roles', 'App\Http\Controllers\admin\RoleController@create')->name('create-role');
    Route::post('store-role', 'App\Http\Controllers\admin\RoleController@store')->name('store-role');
    Route::get('edit-role/{id}', 'App\Http\Controllers\admin\RoleController@edit')->name('edit-role');
    Route::put('update-role/{id}', 'App\Http\Controllers\admin\RoleController@update')->name('update-role');
    Route::delete('delete-role/{id}', 'vadmin\RoleController@deleteRole')->name('delete-role');
    Route::put('deactivate-role', 'App\Http\Controllers\admin\RoleController@deactivateRole')->name('deactivate-role');

    ///RUTAS PARA GESTIONAR LOS USUARIOS
    Route::get('get-users', 'App\Http\Controllers\admin\UserController@index')->name('get-users');
    Route::get('create-user', 'App\Http\Controllers\admin\UserController@create')->name('create-user');
    Route::post('store-user', 'App\Http\Controllers\admin\UserController@store')->name('store-user');
    //Route::get('api-get-users', 'App\Http\Controllers\admin\UsersController@userListAPI')->name('api-get-users');
    //Route::post('api-store-user', 'admin\UserController@store')->name('api-store-user');
    Route::get('edit-user/{id}', 'App\Http\Controllers\admin\UserController@edit')->name('edit-user');
    Route::put('put-user/{id}', 'App\Http\Controllers\admin\UserController@update')->name('put-user');
    Route::delete('delete-user/{id}', 'App\Http\Controllers\admin\UserController@destroy')->name('delete-user');
    Route::get('get-filter-users', 'App\Http\Controllers\admin\UserController@filterUser')->name('get-filter-users');
    Route::patch('change-status-user/{id}', 'App\Http\Controllers\admin\UserController@changeStatus')->name('change-status-user');

    ///RUTAS PARA LOS PACIENTES
    //Route::get('get-patientsget', 'App\Http\Controllers\admin\PatientController@getPatients')->name('get-patientsget');
    //Route::get('patients', 'App\Http\Controllers\admin\PatientController@PatientsList')->name('patients');
    Route::get('get-patients', 'App\Http\Controllers\admin\PatientController@index')->name('get-patients');
    Route::get('create-patients', 'App\Http\Controllers\admin\PatientController@create')->name('create-patients');
    Route::post('store-patients', 'App\Http\Controllers\admin\PatientController@store')->name('store-patients');
    Route::get('edit-patients/{id}', 'App\Http\Controllers\admin\PatientController@edit')->name('edit-patients');
    Route::put('put-patients/{id}', 'App\Http\Controllers\admin\PatientController@update')->name('put-patients');
    Route::patch('change-status-patient/{id}', 'App\Http\Controllers\admin\PatientController@changeStatus')->name('change-status-patient');
    Route::get('show-patient/{id}', 'App\Http\Controllers\admin\PatientController@show')->name('show-patient');

    //RUTAS PARA LAS ALERGIAS
    Route::get('allergies', 'App\Http\Controllers\admin\AllergiesController@index')->name('allergiesindex');
    Route::post('allergies', 'App\Http\Controllers\admin\AllergiesController@store')->name('store-allergy');
    Route::put('allergies/{id}', 'App\Http\Controllers\admin\AllergiesController@update')->name('put-allergy');
    Route::get('allergies/create', 'App\Http\Controllers\admin\AllergiesController@create')->name('create-allergy');
    Route::get('allergies/edit/{id}', 'App\Http\Controllers\admin\AllergiesController@edit')->name('edit-allergy');
    Route::patch('change-status-allergy/{id}', 'App\Http\Controllers\admin\AllergiesController@changeStatus')->name('change-status-allergy');
    Route::get('api-select-allergies', 'App\Http\Controllers\admin\AllergiesController@getAllergiesSelect')->name('api-select-allergies');


// Registrando um serviço de exemplo
// App::bind('LogExemplo', function($app) {
//     return "Log Registrado";
// });

// $exemplo = App::make('LogExemplo');

// dd($exemplo);

//Route::get('/', 'WebsController@init');

