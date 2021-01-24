<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\{
    AuthController,
    PageController,
    Controller
};
use App\Http\Controllers\admin\{
    RoleController,
    UserController,
    PatientController,
    AllergiesController,
    SpecialtyController,
    ConceptController,
    ReferencesController,
    DiagnosticController,
    MedicalProcedureController,
    TypeVoucherController,
    PanelController
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

Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [PageController::class, 'loadPage'])->name('dashboard');
    // Route::get('/events', ShowEvents::class)->name('events');
    Route::get('logout', [AuthController::class, 'logout'])->name('logout');
    Route::get('page/{layout}/{theme}/{pageName}', [PageController::class, 'loadPage'])->name('page');

    //RUTAS PARA EL PANEL DE CONTROL
    Route::get('admin', [PanelController::class,'index'])->name('admin');

    ///RUTAS PARA GESTIONAR LOS ROLES Y PERMISOS
    Route::get('roles', [RoleController::class,'getRoles'])->name('roles');
    Route::get('permissions/{id}', [RoleController::class,'getPermissions'])->name('permissions');
    Route::get('get-roles', [RoleController::class,'index'])->name('get-roles');
    Route::get('create-roles', [RoleController::class,'create'])->name('create-role');
    Route::post('store-role', [RoleController::class,'store'])->name('store-role');
    Route::get('edit-role/{id}', [RoleController::class,'edit'])->name('edit-role');
    Route::put('update-role/{id}', [RoleController::class,'update'])->name('update-role');
    //Route::delete('delete-role/{id}', 'vadmin\RoleController@deleteRole')->name('delete-role');
    //Route::put('deactivate-role', 'App\Http\Controllers\admin\RoleController@deactivateRole')->name('deactivate-role');

    ///RUTAS PARA GESTIONAR LOS USUARIOS
    Route::get('get-users', [UserController::class,'index'])->name('get-users');
    Route::get('create-user', [UserController::class,'create'])->name('create-user');
    Route::post('store-user', [UserController::class,'store'])->name('store-user');
    //Route::get('api-get-users', 'App\Http\Controllers\admin\UsersController@userListAPI')->name('api-get-users');
    //Route::post('api-store-user', 'admin\UserController@store')->name('api-store-user');
    Route::get('edit-user/{id}', [UserController::class,'edit'])->name('edit-user');
    Route::put('put-user/{id}', [UserController::class,'update'])->name('put-user');
    //Route::delete('delete-user/{id}', 'App\Http\Controllers\admin\UserController@destroy')->name('delete-user');
    //Route::get('get-filter-users', 'App\Http\Controllers\admin\UserController@filterUser')->name('get-filter-users');
    //Route::patch('change-status-user/{id}', 'App\Http\Controllers\admin\UserController@changeStatus')->name('change-status-user');

    ///RUTAS PARA LOS PACIENTES
    //Route::get('get-patientsget', 'App\Http\Controllers\admin\PatientController@getPatients')->name('get-patientsget');
    //Route::get('patients', 'App\Http\Controllers\admin\PatientController@PatientsList')->name('patients');
    Route::get('get-patients', [PatientController::class,'index'])->name('get-patients');
    Route::get('create-patients', [PatientController::class,'create'])->name('create-patients');
    Route::post('store-patients', [PatientController::class,'store'])->name('store-patients');
    Route::get('edit-patients/{id}', [PatientController::class,'edit'])->name('edit-patients');
    Route::put('put-patients/{id}', [PatientController::class,'update'])->name('put-patients');
    //Route::patch('change-status-patient/{id}', 'App\Http\Controllers\admin\PatientController@changeStatus')->name('change-status-patient');
    //Route::get('show-patient/{id}', 'App\Http\Controllers\admin\PatientController@show')->name('show-patient');

    //CONJUNTO DE RUTAS DE CONFIGURACIONES
    //RUTAS PARA LAS ALERGIAS
    Route::get('get-allergies', [AllergiesController::class,'index'])->name('allergiesindex');
    Route::get('create-allergies', [AllergiesController::class,'create'])->name('create-allergy');
    Route::post('store-allergie', [AllergiesController::class,'store'])->name('store-allergy');
    Route::get('edit-allergie/{id}', [AllergiesController::class,'edit'])->name('edit-allergy');
    Route::put('put-allergie/{id}', [AllergiesController::class,'update'])->name('put-allergy');
    //Route::patch('change-status-allergy/{id}', 'App\Http\Controllers\admin\AllergiesController@changeStatus')->name('change-status-allergy');
    //Route::get('select-allergies', 'App\Http\Controllers\admin\AllergiesController@getAllergiesSelect')->name('api-select-allergies');
    ///RUTAS PARA LAS ESPECIALIDADES
    //Route::get('get-specialties', 'App\Http\Controllers\admin\SpecialtyController@getSpecialties')->name('get-specialties');
    //Route::get('app-specialties', 'App\Http\Controllers\admin\SpecialtyController@ApiSpecialties')->name('app-specialties')->middleware('jwtAuth');;
    //Route::get('specialties', 'App\Http\Controllers\admin\SpecialtyController@getDataSelect')->name('specialties');
    Route::get('get-specialties', [SpecialtyController::class,'index'])->name('get-specialties');
    Route::get('create-specialty', [SpecialtyController::class,'create'])->name('create-specialties');
    Route::post('store-specialty', [SpecialtyController::class,'store'])->name('store-specialty');
    Route::get('edit-specialty/{id}', [SpecialtyController::class,'edit'])->name('edit-specialties');
    Route::put('put-specialty/{id}', [SpecialtyController::class,'update'])->name('put-specialty');
    //Route::patch('change-status-specialty/{id}', 'App\Http\Controllers\admin\SpecialtyController@changeStatus')->name('change-status-specialty');
    //RUTAS PARA CONCEPTOS
    //Route::get('get-concepts', 'App\Http\Controllers\admin\ConceptController@getConcepts')->name('get-concepts');
    //Route::get('concepts', 'App\Http\Controllers\admin\ConceptController@ApiConcepts')->name('concepts');
    Route::get('get-concepts', [ConceptController::class,'index'])->name('get-concepts');
    Route::get('create-concept', [ConceptController::class,'create'])->name('create-concept');
    Route::post('store-concept', [ConceptController::class,'store'])->name('store-concept');
    Route::get('edit-concept/{id}', [ConceptController::class,'edit'])->name('edit-concept');
    Route::put('put-concept/{id}', [ConceptController::class,'update'])->name('put-concept');
    //Route::patch('change-status-concept/{id}', 'App\Http\Controllers\admin\ConceptController@changeStatus')->name('change-status-concept');
    //RUTAS PARA REFERENCIAS
    //Route::get('get-references', 'App\Http\Controllersadmin\ReferencesController@getReferences')->name('get-references');
    //Route::get('references', 'App\Http\Controllersadmin\ReferencesController@ApiReferences')->name('references');
    Route::get('get-references', [ReferencesController::class,'index'])->name('get-references');
    Route::get('create-reference', [ReferencesController::class,'create'])->name('create-reference');
    Route::post('store-reference', [ReferencesController::class,'store'])->name('store-reference');
    Route::get('edit-reference/{id}', [ReferencesController::class,'edit'])->name('edit-reference');
    Route::put('put-reference/{id}', [ReferencesController::class,'update'])->name('put-reference');
    //Route::patch('change-status-reference/{id}', 'App\Http\Controllers\admin\ReferencesController@changeStatus')->name('change-status-reference');
    //RUTAS PARA DIAGNOSTICOS
    //Route::get('get-diagnostics', 'App\Http\Controllers\admin\DiagnosticController@getDiagnostig')->name('get-diagnostics');
    //Route::get('diagnostics', 'App\Http\Controllers\admin\DiagnosticController@ApiDiagnostics')->name('diagnostics');
    Route::get('get-diagnostics', [DiagnosticController::class,'index'])->name('get-diagnostics');
    Route::get('create-diagnostic', [DiagnosticController::class,'create'])->name('create-diagnostic');
    Route::post('store-diagnostic', [DiagnosticController::class,'store'])->name('store-diagnostic');
    Route::get('edit-diagnostic/{id}', [DiagnosticController::class,'edit'])->name('edit-diagnostic');
    Route::put('put-diagnostic/{id}', [DiagnosticController::class,'update'])->name('put-diagnostic');
    //Route::patch('change-status-diagnostic/{id}', 'admin\DiagnosticController@changeStatus')->name('api-change-status-diagnostic');
    //Route::post('add-diagnostic-patient', 'admin\DiagnosticController@addDiagnostigPatient')->name('api-add-diagnostic-patient');
    //Route::put('update-diagnostic-patient', 'admin\DiagnosticController@updateDiagnostigPatient')->name('api-add-diagnostic-update');
    //Route::delete('delete-diagnostic-patient/{id}', 'admin\DiagnosticController@destryDiagnostigPatien')->name('api-delete-diagnostic-patient');
    //Route::get('get-patient-diagnostics/{id}', 'admin\DiagnosticController@getDiagnostigPatients')->name('api-get-patient-diagnostics');
    //Route::get('select-diagnostics', 'admin\DiagnosticController@getDiagnosticSelect')->name('api-select-diagnostics');
    //RUTAS PARA PROCEDIMIENTOS MEDICOS
    //Route::get('get-medical-procedures', 'admin\MedicalProcedureController@getMedicalProcedure')->name('get-medical-procedures');
    //Route::get('medical-procedures', 'admin\MedicalProcedureController@ApiMedicalProcedures')->name('medical-procedures');
    Route::get('get-medical-procedures', [MedicalProcedureController::class,'index'])->name('get-medical-procedures');
    Route::get('create-medical-procedure', [MedicalProcedureController::class,'create'])->name('create-medical-procedure');
    Route::post('store-medical-procedure', [MedicalProcedureController::class,'store'])->name('store-medical-procedure');
    Route::get('edit-medical-procedure/{id}', [MedicalProcedureController::class,'edit'])->name('edit-medical-procedure');
    Route::put('put-medical-procedure/{id}', [MedicalProcedureController::class,'update'])->name('put-medical-procedure');
    //Route::patch('change-status-medical-procedure/{id}', 'admin\MedicalProcedureController@changeStatus')->name('api-change-status-medical-procedure');
    //Route::get('references-concepts', 'admin\MedicalProcedureController@ReferenceAndConcept')->name('api-references-concepts');
    //Route::get('get-select-procedures', 'admin\MedicalProcedureController@getTreatementProceadures')->name('api-get-select-procedures');
    //URL PARA EL TYPO DE DOCUMENTOS
    //Route::get('documents-type','admin\TypeVoucherController@getDocuments')->name('documents-type');
    //Route::get('type-documents', 'admin\TypeVoucherController@create')->name('type-documents');
    Route::get('get-type-documents', [TypeVoucherController::class,'index'])->name('get-type-documents');
    Route::get('create-type-document', [TypeVoucherController::class,'create'])->name('create-type-document');
    Route::post('store-type-document', [TypeVoucherController::class,'store'])->name('store-type-document');
    Route::get('edit-type-document/{id}', [TypeVoucherController::class,'edit'])->name('edit-type-document');
    Route::put('put-type-document/{id}', [TypeVoucherController::class,'update'])->name('put-type-document');
    //Route::patch('change-status-type-document/{id}', 'admin\TypeVoucherController@changeStatus')->name('change-status-type-document');
 
});
// Registrando um serviço de exemplo
// App::bind('LogExemplo', function($app) {
//     return "Log Registrado";
// });

// $exemplo = App::make('LogExemplo');

// dd($exemplo);

//Route::get('/', 'WebsController@init');

