<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});
*/
Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('login', 'api\AuthController@login');
Route::post('register', 'api\AuthController@register');
Route::get('logout', 'api\AuthController@logout');
Route::post('save-profile-user', 'api\AuthController@profileUser')->name('save-profile-user')->middleware('jwtAuth');
Route::get('profile','api\AuthController@getProfile')->name('profile')->middleware('jwtAuth');
Route::post('change-password','api\AuthController@ChangePassword')->name('change-password')->middleware('jwtAuth');

//RUTAS PARA LOS ROLES
Route::get('roles', 'admin\RoleController@getApiRoles')->name('roles');

Route::get('api-get-users', 'App\Http\Controllers\admin\UsersController@userListAPI')->name('api-get-users');
Route::post('api-store-user', 'admin\UserController@store')->name('api-store-user');
Route::put('api-put-user/{id}', 'admin\UserController@update')->name('api-put-user');
Route::delete('api-delete-user/{id}', 'admin\UserController@destroy')->name('api-delete-user');
Route::get('api-get-filter-users', 'admin\UserController@filterUser')->name('api-get-filter-users');
//ruta para habilitar y deshabilitar los usuarios
Route::patch('api-change-status-user/{id}', 'admin\UserController@changeStatus')->name('api-change-status-user');

//RUTA PARA EL COMTROLADOR DE PACIENTES
Route::get('patients', 'admin\PatientController@PatientsList')->name('patients');
Route::get('api-get-patients', 'admin\PatientController@index')->name('api-get-patients');
Route::post('api-store-patients', 'admin\PatientController@store')->name('api-store-patients');
Route::put('api-put-patients/{id}', 'admin\PatientController@update')->name('api-put-patients');
Route::patch('api-change-status-patient/{id}', 'admin\PatientController@changeStatus')->name('api-change-status-patient');
Route::get('api-show-patient/{id}', 'admin\PatientController@show')->name('api-show-patient');

//RUTA PARA EL CONTROLADOR DE ESPECIALIDADES
Route::get('app-specialties', 'admin\SpecialtyController@ApiSpecialties')->name('app-specialties')->middleware('jwtAuth');;
Route::get('specialties', 'admin\SpecialtyController@getDataSelect')->name('specialties');
Route::get('api-get-specialties', 'admin\SpecialtyController@index')->name('api-get-specialties');
Route::post('api-store-specialty', 'admin\SpecialtyController@store')->name('api-store-specialty');
Route::put('api-put-specialty/{id}', 'admin\SpecialtyController@update')->name('api-put-specialty');
Route::patch('api-change-status-specialty/{id}', 'admin\SpecialtyController@changeStatus')->name('api-change-status-specialty');


//RUTA PARA EL CONTROLADOR DE DOCTORES
Route::get('api-filter-doctors-specailty', 'admin\DoctorController@SpecialtyDoctor')->name('api-filter-doctors-specailty');
Route::get('api-get-doctors', 'admin\DoctorController@index')->name('api-get-doctors');
Route::post('api-store-doctor', 'admin\DoctorController@store')->name('api-store-doctor');
Route::put('api-put-doctor/{id}', 'admin\DoctorController@update')->name('api-put-doctor');
Route::patch('api-change-status-doctor/{id}', 'admin\DoctorController@changeStatus')->name('api-change-status-doctor');
Route::get('app-doctors', 'admin\DoctorController@getApiDoctors')->name('app-doctors');
//RUTA PARA EL CONTROLADOR DE citas
//Route::get('appointments','admin\AppointmentController@getDataSelect')->name('appointments');
Route::get("app-get-my-appointments-history", 'admin\AppointmentController@getAppointmentsHistoryUser')->name('app-get-my-appointments-history')->middleware("jwtAuth");
Route::get('api-general-appointments', 'admin\AppointmentController@create')->name('api-general-appointments');
Route::get('api-get-appointments', 'admin\AppointmentController@index')->name('api-get-appointments');
Route::get('api-get-appointments-month', 'admin\AppointmentController@requestMonthAppointment')->name('api-get-appointments-month');
Route::post('api-store-appointment', 'admin\AppointmentController@store')->name('api-store-appointment');
Route::put('api-update-appointment', 'admin\AppointmentController@update')->name('api-update-appointment');
Route::put('api-status-appointment', 'admin\AppointmentController@changeStatus')->name('api-status-appointment');
Route::delete('api-delete-appointment/{id}', 'admin\AppointmentController@delete')->name('api-delete-appointment');
//Route::patch('api-change-status-appointment/{id}','admin\AppointmentController@changeStatus')->name('api-change-status-appointment');
Route::post('app-times', 'admin\AppointmentController@getTimesAvailable')->name('app-times');
Route::post("app-store-appointment", "admin\AppointmentController@requestAppointment")->name("app-store-appointment")->middleware('jwtAuth');;
Route::get("app-get-my-appointments", 'admin\AppointmentController@getAppointmentsUser')->name('app-get-my-appointments')->middleware("jwtAuth");
Route::get('api-get-appointments-patient/{id}', 'admin\AppointmentController@getAppointmentsFromPatient')->name('api-get-appointments-patient');

//RUTA PARA EL CONTROLADOR DE alergias
Route::get('allergies', 'admin\AllergiesController@ApiAllergies')->name('allergies');
Route::get('api-get-allergies', 'admin\AllergiesController@index')->name('api-get-allergies');
Route::post('api-store-allergy', 'admin\AllergiesController@store')->name('api-store-allergy');
Route::put('api-put-allergy/{id}', 'admin\AllergiesController@update')->name('api-put-allergy');
Route::patch('api-change-status-allergy/{id}', 'admin\AllergiesController@changeStatus')->name('api-change-status-allergy');
Route::get('api-select-allergies', 'admin\AllergiesController@getAllergiesSelect')->name('api-select-allergies');

//RUTA PARA EL CONTROLADOR DE CONCEPTOS
Route::get('concepts', 'admin\ConceptController@ApiConcepts')->name('concepts');
Route::get('api-get-concepts', 'admin\ConceptController@index')->name('api-get-concepts');
Route::post('api-store-concept', 'admin\ConceptController@store')->name('api-store-concept');
Route::put('api-put-concept/{id}', 'admin\ConceptController@update')->name('api-put-concept');
Route::patch('api-change-status-concept/{id}', 'admin\ConceptController@changeStatus')->name('api-change-status-concept');


//RUTA PARA EL CONTROLADOR DE REFERENCIAS
Route::get('references', 'admin\ReferencesController@ApiReferences')->name('references');
Route::get('api-get-references', 'admin\ReferencesController@index')->name('api-get-references');
Route::post('api-store-reference', 'admin\ReferencesController@store')->name('api-store-reference');
Route::put('api-put-reference/{id}', 'admin\ReferencesController@update')->name('api-put-reference');
Route::patch('api-change-status-reference/{id}', 'admin\ReferencesController@changeStatus')->name('api-change-status-reference');

//RUTA PARA EL CONTROLADOR DE PROCEDIMIENTOS MEDICOS
Route::get('medical-procedures', 'admin\MedicalProcedureController@ApiMedicalProcedures')->name('medical-procedures');
Route::get('api-get-medical-procedures', 'admin\MedicalProcedureController@index')->name('api-get-medical-procedures');
Route::post('api-store-medical-procedure', 'admin\MedicalProcedureController@store')->name('api-store-medical-procedure');
Route::put('api-put-medical-procedure/{id}', 'admin\MedicalProcedureController@update')->name('api-put-medical-procedure');
Route::patch('api-change-status-medical-procedure/{id}', 'admin\MedicalProcedureController@changeStatus')->name('api-change-status-medical-procedure');
Route::get('api-references-concepts', 'admin\MedicalProcedureController@ReferenceAndConcept')->name('api-references-concepts');
Route::get('api-get-select-procedures', 'admin\MedicalProcedureController@getTreatementProceadures')->name('api-get-select-procedures');

//RUTA PARA EL CONTROLADOR DE DIAGNOSTICOS MEDICOS
Route::get('diagnostics', 'admin\DiagnosticController@ApiDiagnostics')->name('diagnostics');
Route::get('api-get-diagnostics', 'admin\DiagnosticController@index')->name('api-get-diagnostics');
Route::post('api-store-diagnostic', 'admin\DiagnosticController@store')->name('api-store-diagnostic');
Route::put('api-put-diagnostic/{id}', 'admin\DiagnosticController@update')->name('api-put-diagnostic');
Route::patch('api-change-status-diagnostic/{id}', 'admin\DiagnosticController@changeStatus')->name('api-change-status-diagnostic');
Route::post('api-add-diagnostic-patient', 'admin\DiagnosticController@addDiagnostigPatient')->name('api-add-diagnostic-patient');
Route::put('api-update-diagnostic-patient', 'admin\DiagnosticController@updateDiagnostigPatient')->name('api-add-diagnostic-update');
Route::delete('api-delete-diagnostic-patient/{id}', 'admin\DiagnosticController@destryDiagnostigPatien')->name('api-delete-diagnostic-patient');
Route::get('api-get-patient-diagnostics/{id}', 'admin\DiagnosticController@getDiagnostigPatients')->name('api-get-patient-diagnostics');
Route::get('api-select-diagnostics', 'admin\DiagnosticController@getDiagnosticSelect')->name('api-select-diagnostics');


//RUTAS PARA LAS FICHAS MEDICAS
Route::get('api-get-backgroud-medical/{id}', 'admin\MedicalRecordController@getBackgroudMedical')->name('api-get-backgroud-medical');
Route::get('api-get-question-medical/{id}', 'admin\MedicalRecordController@getQuestionMedical')->name('api-get-question-medical');
Route::get('api-get-physical-exploration/{id}', 'admin\MedicalRecordController@getExploration')->name('api-get-physical-exploration');
Route::patch('api-put-backgroud-medical/{id}', 'admin\MedicalRecordController@putBackgroudMedical')->name('api-put-backgroud-medical');
Route::patch('api-put-question-medical/{id}', 'admin\MedicalRecordController@putQuestionMedical')->name('api-put-question-medical');
Route::patch('api-put-physical-exploration/{id}', 'admin\MedicalRecordController@putExploration')->name('api-put-physical-exploration');
Route::post('api-store-allergies-patient-many', 'admin\MedicalRecordController@addAllergy')->name('api-store-allergies-patient-many');
Route::put('api-update-allergies-patient-many', 'admin\MedicalRecordController@updateAllergy')->name('api-update-allergies-patient-many');
Route::delete('api-delete-allergies-patient-many/{id}', 'admin\MedicalRecordController@destryAllergy')->name('api-delete-allergies-patient-many');

Route::get('api-get-patient-allergies/{id}', 'admin\MedicalRecordController@getAllergies')->name('api-get-patient-allergies');


//RUTAS PARA LOS TRATAMIENTOS
Route::get('api-create-treatement/{id}', 'admin\TreatmentController@create')->name('api-create-treatement');
Route::put('api-update-treatement', 'admin\TreatmentController@update')->name('api-update-treatement');
Route::post('api-store-treatement', 'admin\TreatmentController@store')->name('api-store-treatement');
Route::get('api-get-treatements-all', 'admin\TreatmentController@getTreatmentsAll')->name('api-get-treatements-all');
Route::get('api-get-treatements-patient/{id}', 'admin\TreatmentController@getTreatmentsPatients')->name('api-get-treatements-patient');
Route::get('api-show-treatment-patient/{id}', 'admin\TreatmentController@show')->name('api-show-treatment-patient');
Route::delete('api-delete-treatement/{id}', 'admin\TreatmentController@delete')->name('api-delete-treatement');
Route::patch('api-decline-treatement/{id}', 'admin\TreatmentController@decline')->name('api-decline-treatement');
Route::get("app-get-my-treatments", 'admin\TreatmentController@getTreatmentsPatientsUser')->name('app-get-my-treatments')->middleware("jwtAuth");
Route::get("app-get-detail-treatment/{id}", 'admin\TreatmentController@detail')->name('app-get-detail-treatment');



//Rutas para las evoluciones
Route::get('api-get-evolutions/{id}', 'admin\EvoutionController@index')->name('api-get-evolutions');
Route::post('api-store-evolution', 'admin\EvoutionController@store')->name('api-store-evolution');
Route::get('api-create-evolution', 'admin\EvoutionController@create')->name('api-create-evolution');
Route::put('api-update-evolution', 'admin\EvoutionController@update')->name('api-update-evolution');
Route::delete('api-delete-evolution/{id}', 'admin\EvoutionController@delete')->name('api-delete-evolution');


//Rutas para las recetas
Route::get('api-get-recipes/{id}', 'admin\RecipesController@index')->name('api-get-recipes');
Route::get('api-create-recipe', 'admin\RecipesController@create')->name('api-create-recipe');
Route::post('api-store-recipe', 'admin\RecipesController@store')->name('api-store-recipe');
Route::put('api-update-recipe', 'admin\RecipesController@update')->name('api-update-recipe');
Route::delete('api-delete-recipe/{id}', 'admin\RecipesController@delete')->name('api-delete-recipe');
Route::patch('api-change-recipe', 'admin\RecipesController@change')->name('api-change-recipe');


//Rutas para los archivos
Route::get('api-get-files/{id}', 'admin\FileController@index')->name('api-get-files');
Route::post('api-store-file', 'admin\FileController@store')->name('api-store-file');
Route::put('api-update-file', 'admin\FileController@update')->name('api-update-file');
Route::delete('api-delete-file/{id}', 'admin\FileController@delete')->name('api-delete-file');

//RUTA PARA EL CONTROLADOR DE TYPOS DE DOCUMENTOS
Route::get('type-documents', 'admin\TypeVoucherController@create')->name('type-documents');
Route::get('api-get-type-documents', 'admin\TypeVoucherController@index')->name('api-get-type-documents');
Route::post('api-store-type-document', 'admin\TypeVoucherController@store')->name('api-store-type-document');
Route::put('api-put-type-document', 'admin\TypeVoucherController@update')->name('api-put-type-document');
Route::patch('api-change-status-type-document/{id}', 'admin\TypeVoucherController@changeStatus')->name('api-change-status-type-document');


///RUTAS PARA LOS PAGOS
Route::get('api-create-payment/{id}','admin\PymentController@create')->name('api-create-payment');
Route::get('api-show-detail-treatment/{id}','admin\PymentController@show')->name('api-show-detail-treatment');
Route::post('api-store-payment','admin\PymentController@store')->name('api-store-payment');
Route::get('api-sequence-payment/{id}','admin\PymentController@getNumberSequence')->name('api-sequence-payment');
Route::put('api-update-payment','admin\PymentController@update')->name('api-update-payment');
Route::get('api-get-payments-patient/{id}', 'admin\PymentController@getPaymentPatients')->name('api-get-payments-patient');
Route::get("app-get-my-payments", 'admin\PymentController@getPaymentPatientsUser')->name('app-get-my-payments')->middleware("jwtAuth");
Route::get("app-get-detail-payment/{id}", 'admin\PymentController@detail')->name('app-get-detail-payment');
