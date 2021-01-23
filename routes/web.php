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
    //Route::delete('delete-role/{id}', 'vadmin\RoleController@deleteRole')->name('delete-role');
    //Route::put('deactivate-role', 'App\Http\Controllers\admin\RoleController@deactivateRole')->name('deactivate-role');

    ///RUTAS PARA GESTIONAR LOS USUARIOS
    Route::get('get-users', 'App\Http\Controllers\admin\UserController@index')->name('get-users');
    Route::get('create-user', 'App\Http\Controllers\admin\UserController@create')->name('create-user');
    Route::post('store-user', 'App\Http\Controllers\admin\UserController@store')->name('store-user');
    //Route::get('api-get-users', 'App\Http\Controllers\admin\UsersController@userListAPI')->name('api-get-users');
    //Route::post('api-store-user', 'admin\UserController@store')->name('api-store-user');
    Route::get('edit-user/{id}', 'App\Http\Controllers\admin\UserController@edit')->name('edit-user');
    Route::put('put-user/{id}', 'App\Http\Controllers\admin\UserController@update')->name('put-user');
    //Route::delete('delete-user/{id}', 'App\Http\Controllers\admin\UserController@destroy')->name('delete-user');
    //Route::get('get-filter-users', 'App\Http\Controllers\admin\UserController@filterUser')->name('get-filter-users');
    //Route::patch('change-status-user/{id}', 'App\Http\Controllers\admin\UserController@changeStatus')->name('change-status-user');

    ///RUTAS PARA LOS PACIENTES
    //Route::get('get-patientsget', 'App\Http\Controllers\admin\PatientController@getPatients')->name('get-patientsget');
    //Route::get('patients', 'App\Http\Controllers\admin\PatientController@PatientsList')->name('patients');
    Route::get('get-patients', 'App\Http\Controllers\admin\PatientController@index')->name('get-patients');
    Route::get('create-patients', 'App\Http\Controllers\admin\PatientController@create')->name('create-patients');
    Route::post('store-patients', 'App\Http\Controllers\admin\PatientController@store')->name('store-patients');
    Route::get('edit-patients/{id}', 'App\Http\Controllers\admin\PatientController@edit')->name('edit-patients');
    Route::put('put-patients/{id}', 'App\Http\Controllers\admin\PatientController@update')->name('put-patients');
    //Route::patch('change-status-patient/{id}', 'App\Http\Controllers\admin\PatientController@changeStatus')->name('change-status-patient');
    //Route::get('show-patient/{id}', 'App\Http\Controllers\admin\PatientController@show')->name('show-patient');

    //CONJUNTO DE RUTAS DE CONFIGURACIONES
    //RUTAS PARA LAS ALERGIAS
    Route::get('get-allergies', 'App\Http\Controllers\admin\AllergiesController@index')->name('allergiesindex');
    Route::get('create-allergies', 'App\Http\Controllers\admin\AllergiesController@create')->name('create-allergy');
    Route::post('store-allergie', 'App\Http\Controllers\admin\AllergiesController@store')->name('store-allergy');
    Route::get('edit-allergie/{id}', 'App\Http\Controllers\admin\AllergiesController@edit')->name('edit-allergy');
    Route::put('put-allergie/{id}', 'App\Http\Controllers\admin\AllergiesController@update')->name('put-allergy');
    //Route::patch('change-status-allergy/{id}', 'App\Http\Controllers\admin\AllergiesController@changeStatus')->name('change-status-allergy');
    //Route::get('select-allergies', 'App\Http\Controllers\admin\AllergiesController@getAllergiesSelect')->name('api-select-allergies');
    ///RUTAS PARA LAS ESPECIALIDADES
    //Route::get('get-specialties', 'App\Http\Controllers\admin\SpecialtyController@getSpecialties')->name('get-specialties');
    //Route::get('app-specialties', 'App\Http\Controllers\admin\SpecialtyController@ApiSpecialties')->name('app-specialties')->middleware('jwtAuth');;
    //Route::get('specialties', 'App\Http\Controllers\admin\SpecialtyController@getDataSelect')->name('specialties');
    Route::get('get-specialties', 'App\Http\Controllers\admin\SpecialtyController@index')->name('get-specialties');
    Route::get('create-specialty', 'App\Http\Controllers\admin\SpecialtyController@create')->name('create-specialties');
    Route::post('store-specialty', 'App\Http\Controllers\admin\SpecialtyController@store')->name('store-specialty');
    Route::get('edit-specialty/{id}', 'App\Http\Controllers\admin\SpecialtyController@edit')->name('edit-specialties');
    Route::put('put-specialty/{id}', 'App\Http\Controllers\admin\SpecialtyController@update')->name('put-specialty');
    //Route::patch('change-status-specialty/{id}', 'App\Http\Controllers\admin\SpecialtyController@changeStatus')->name('change-status-specialty');
    //RUTAS PARA CONCEPTOS
    //Route::get('get-concepts', 'App\Http\Controllers\admin\ConceptController@getConcepts')->name('get-concepts');
    //Route::get('concepts', 'App\Http\Controllers\admin\ConceptController@ApiConcepts')->name('concepts');
    Route::get('get-concepts', 'App\Http\Controllers\admin\ConceptController@index')->name('get-concepts');
    Route::get('create-concept', 'App\Http\Controllers\admin\ConceptController@create')->name('create-concept');
    Route::post('store-concept', 'App\Http\Controllers\admin\ConceptController@store')->name('store-concept');
    Route::get('edit-concept/{id}', 'App\Http\Controllers\admin\ConceptController@edit')->name('edit-concept');
    Route::put('put-concept/{id}', 'App\Http\Controllers\admin\ConceptController@update')->name('put-concept');
    //Route::patch('change-status-concept/{id}', 'App\Http\Controllers\admin\ConceptController@changeStatus')->name('change-status-concept');
    //RUTAS PARA REFERENCIAS
    //Route::get('get-references', 'App\Http\Controllersadmin\ReferencesController@getReferences')->name('get-references');
    //Route::get('references', 'App\Http\Controllersadmin\ReferencesController@ApiReferences')->name('references');
    Route::get('get-references', 'App\Http\Controllers\admin\ReferencesController@index')->name('get-references');
    Route::get('create-reference', 'App\Http\Controllers\admin\ReferencesController@create')->name('create-reference');
    Route::post('store-reference', 'App\Http\Controllers\admin\ReferencesController@store')->name('store-reference');
    Route::get('edit-reference/{id}', 'App\Http\Controllers\admin\ReferencesController@edit')->name('edit-reference');
    Route::put('put-reference/{id}', 'App\Http\Controllers\admin\ReferencesController@update')->name('put-reference');
    //Route::patch('change-status-reference/{id}', 'App\Http\Controllers\admin\ReferencesController@changeStatus')->name('change-status-reference');
    //RUTAS PARA DIAGNOSTICOS
    //Route::get('get-diagnostics', 'App\Http\Controllers\admin\DiagnosticController@getDiagnostig')->name('get-diagnostics');
    //Route::get('diagnostics', 'App\Http\Controllers\admin\DiagnosticController@ApiDiagnostics')->name('diagnostics');
    Route::get('get-diagnostics', 'App\Http\Controllers\admin\DiagnosticController@index')->name('get-diagnostics');
    Route::get('create-diagnostic', 'App\Http\Controllers\admin\DiagnosticController@create')->name('create-diagnostic');
    Route::post('store-diagnostic', 'App\Http\Controllers\admin\DiagnosticController@store')->name('store-diagnostic');
    Route::get('edit-diagnostic/{id}', 'App\Http\Controllers\admin\DiagnosticController@edit')->name('edit-diagnostic');
    Route::put('put-diagnostic/{id}', 'App\Http\Controllers\admin\DiagnosticController@update')->name('put-diagnostic');
    //Route::patch('change-status-diagnostic/{id}', 'admin\DiagnosticController@changeStatus')->name('api-change-status-diagnostic');
    //Route::post('add-diagnostic-patient', 'admin\DiagnosticController@addDiagnostigPatient')->name('api-add-diagnostic-patient');
    //Route::put('update-diagnostic-patient', 'admin\DiagnosticController@updateDiagnostigPatient')->name('api-add-diagnostic-update');
    //Route::delete('delete-diagnostic-patient/{id}', 'admin\DiagnosticController@destryDiagnostigPatien')->name('api-delete-diagnostic-patient');
    //Route::get('get-patient-diagnostics/{id}', 'admin\DiagnosticController@getDiagnostigPatients')->name('api-get-patient-diagnostics');
    //Route::get('select-diagnostics', 'admin\DiagnosticController@getDiagnosticSelect')->name('api-select-diagnostics');
    //RUTAS PARA PROCEDIMIENTOS MEDICOS
    //Route::get('get-medical-procedures', 'admin\MedicalProcedureController@getMedicalProcedure')->name('get-medical-procedures');
    //Route::get('medical-procedures', 'admin\MedicalProcedureController@ApiMedicalProcedures')->name('medical-procedures');
    Route::get('get-medical-procedures', 'App\Http\Controllers\admin\MedicalProcedureController@index')->name('get-medical-procedures');
    Route::get('create-medical-procedure', 'App\Http\Controllers\admin\MedicalProcedureController@create')->name('create-medical-procedure');
    Route::post('store-medical-procedure', 'App\Http\Controllers\admin\MedicalProcedureController@store')->name('store-medical-procedure');
    Route::get('edit-medical-procedure/{id}', 'App\Http\Controllers\admin\MedicalProcedureController@edit')->name('edit-medical-procedure');
    Route::put('put-medical-procedure/{id}', 'App\Http\Controllers\admin\MedicalProcedureController@update')->name('put-medical-procedure');
    //Route::patch('change-status-medical-procedure/{id}', 'admin\MedicalProcedureController@changeStatus')->name('api-change-status-medical-procedure');
    //Route::get('references-concepts', 'admin\MedicalProcedureController@ReferenceAndConcept')->name('api-references-concepts');
    //Route::get('get-select-procedures', 'admin\MedicalProcedureController@getTreatementProceadures')->name('api-get-select-procedures');
    //URL PARA EL TYPO DE DOCUMENTOS
    //Route::get('documents-type','admin\TypeVoucherController@getDocuments')->name('documents-type');
    //Route::get('type-documents', 'admin\TypeVoucherController@create')->name('type-documents');
    Route::get('get-type-documents', 'App\Http\Controllers\admin\TypeVoucherController@index')->name('get-type-documents');
    Route::get('create-type-document', 'App\Http\Controllers\admin\TypeVoucherController@create')->name('create-type-document');
    Route::post('store-type-document', 'App\Http\Controllers\admin\TypeVoucherController@store')->name('store-type-document');
    Route::get('edit-type-document/{id}', 'App\Http\Controllers\admin\TypeVoucherController@edit')->name('edit-type-document');
    Route::put('put-type-document/{id}', 'App\Http\Controllers\admin\TypeVoucherController@update')->name('put-type-document');
    //Route::patch('change-status-type-document/{id}', 'admin\TypeVoucherController@changeStatus')->name('change-status-type-document');


// Registrando um serviço de exemplo
// App::bind('LogExemplo', function($app) {
//     return "Log Registrado";
// });

// $exemplo = App::make('LogExemplo');

// dd($exemplo);

//Route::get('/', 'WebsController@init');

