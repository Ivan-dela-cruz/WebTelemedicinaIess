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

