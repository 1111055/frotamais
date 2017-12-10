<?php

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
use Illuminate\Mail\Markdown;

Route::get('home/mail', function () {
    $markdown = new Markdown(view(), config('mail.markdown'));

    return $markdown->render('emails.marketing');
});
Route::get('home/mailthanks', function () {
    $markdown = new Markdown(view(), config('mail.markdown'));

    return $markdown->render('emails.thanks');
});

Auth::routes();

// Dashboard
Route::get('/', 'HomeController@index');
Route::get('home', 'HomeController@index')->name('home');

//Errors
Route::get('errors',                  ['as' => 'error.index', 'uses' => 'ErrorController@index']);

//Errors
Route::get('sendemail',                  ['as' => 'sendemail.index', 'uses' => 'sendemailController@index']);

// veiculos

Route::get('vehicles',                  ['as' => 'vehicles.index', 'uses' => 'VehicleController@index']);
Route::get('vehicles/create',           ['as' => 'vehicles.create', 'uses' => 'VehicleController@create']);
Route::get('vehicles/edit/{id}',        ['as' => 'vehicles.edit', 'uses' => 'VehicleController@edit']);
Route::get('vehicles/show/{id}',        ['as' => 'vehicles.show',  'uses' => 'VehicleController@show']);
Route::post('vehicles', 'VehicleController@store');
Route::put('vehicles/update/{id}',        ['as' => 'vehicles.update',  'uses' => 'VehicleController@update']);
Route::delete('vehicles/destroy/{id}',  ['as' => 'vehicles.destroy', 'uses' =>  'VehicleController@destroy']);
Route::get('vehicles/export',                  ['as' => 'vehicles.export', 'uses' => 'VehicleController@export']);
Route::get('vehicles/pdf',                  ['as' => 'vehicles.pdf', 'uses' => 'VehicleController@pdf']);



// utilizadores
Route::get('users',                     ['as' => 'users.index', 'uses' => 'UserController@index']);
Route::get('users/create',              ['as' => 'users.create','uses' => 'UserController@create']);
Route::get('users/edit/{id}',           ['as' => 'users.edit', 'uses'  => 'UserController@edit']);
Route::get('users/show/{id}',           ['as' => 'users.show',  'uses' => 'UserController@show']);
Route::get('users/editar/{id}',         ['as' => 'users.editar',  'uses' => 'UserController@editar']);
Route::post('users', 'UserController@store');
Route::put('users/update/{id}',         ['as' => 'users.update',  'uses' => 'UserController@update']);
Route::delete('users/destroy/{id}',     ['as' => 'users.destroy', 'uses' => 'UserController@destroy']);
Route::get('users/export',              ['as' => 'users.export', 'uses' => 'UserController@export']);
Route::get('users/pdf',                 ['as' => 'users.pdf', 'uses' => 'UserController@pdf']);
Route::post('users/savecompany', 'UserController@savecompany');

// alertas
Route::get('alerts',                   ['as' => 'alerts.index','uses' => 'AlertController@index']);
Route::get('alerts/create',            ['as' => 'alerts.create','uses' => 'AlertController@create']);
Route::get('alerts/show/{id}',         ['as' => 'alerts.show','uses' => 'AlertController@show']);
Route::get('alerts/edit/{id}',          ['as' => 'alerts.edit', 'uses'  => 'AlertController@edit']);
Route::post('alerts', 'AlertController@store');
Route::put('alerts/update/{id}',         ['as' => 'alerts.update',  'uses' => 'AlertController@update']);
Route::delete('alerts/destroy/{id}',     ['as' => 'alerts.destroy', 'uses' => 'AlertController@destroy']);
Route::get('alerts/exportactivos',     ['as' => 'alerts.exportactivos', 'uses' => 'AlertController@exportactivos']);
Route::get('alerts/exportinactivos',     ['as' => 'alerts.exportinactivos', 'uses' => 'AlertController@exportinactivos']);
Route::get('alerts/pdf/{estado}',     ['as' => 'alerts.pdf', 'uses' => 'AlertController@pdf']);



// despesas
Route::get('registers',                   ['as' => 'registers.index','uses' => 'RegisterController@index']);
Route::get('registers/create',            ['as' => 'registers.create','uses' => 'RegisterController@create']);
Route::get('registers/show/{id}',         ['as' => 'registers.show','uses' => 'RegisterController@show']);
Route::get('registers/edit/{id}',          ['as' => 'registers.edit', 'uses'  => 'RegisterController@edit']);
Route::post('registers', 'RegisterController@store');
Route::put('registers/update/{id}',         ['as' => 'registers.update',  'uses' => 'RegisterController@update']);
Route::delete('registers/destroy/{id}',     ['as' => 'registers.destroy', 'uses' => 'RegisterController@destroy']);
Route::get('registers/export',                     ['as' => 'registers.export', 'uses' => 'RegisterController@export']);
Route::get('registers/pdf',                     ['as' => 'registers.pdf', 'uses' => 'RegisterController@pdf']);


// tipos de despesas
Route::get('expense',                   ['as' => 'expense.index','uses' => 'ExpenseTypeController@index']);
Route::get('expense/create',            ['as' => 'expense.create','uses' => 'ExpenseTypeController@create']);
Route::get('expense/show/{id}',         ['as' => 'expense.show','uses' => 'ExpenseTypeController@show']);
Route::get('expense/edit/{id}',          ['as' => 'expense.edit', 'uses'  => 'ExpenseTypeController@edit']);
Route::post('expense', 'ExpenseTypeController@store');
Route::put('expense/update/{id}',         ['as' => 'expense.update',  'uses' => 'ExpenseTypeController@update']);
Route::delete('expense/destroy/{id}',     ['as' => 'expense.destroy', 'uses' => 'ExpenseTypeController@destroy']);

// tipos de despesas
Route::get('tuser',                   ['as' => 'tuser.index','uses' => 'TypeUserController@index']);
Route::get('tuser/create',            ['as' => 'tuser.create','uses' => 'TypeUserController@create']);
Route::get('tuser/show/{id}',         ['as' => 'tuser.show','uses' => 'TypeUserController@show']);
Route::get('tuser/edit/{id}',          ['as' => 'tuser.edit', 'uses'  => 'TypeUserController@edit']);
Route::post('tuser', 'TypeUserController@store');
Route::put('tuser/update/{id}',         ['as' => 'tuser.update',  'uses' => 'TypeUserController@update']);
Route::delete('tuser/destroy/{id}',     ['as' => 'tuser.destroy', 'uses' => 'TypeUserController@destroy']);

// Empresa
Route::get('company',                   ['as' => 'company.index','uses' => 'CompanyController@index']);
Route::get('company/create',            ['as' => 'company.create','uses' => 'CompanyController@create']);
Route::get('company/show/{id}',         ['as' => 'company.show','uses' => 'CompanyController@show']);
Route::get('company/edit/{id}',          ['as' => 'company.edit', 'uses'  => 'CompanyController@edit']);
Route::post('company', 'CompanyController@store');
Route::put('company/update/{id}',         ['as' => 'company.update',  'uses' => 'CompanyController@update']);
Route::delete('company/destroy/{id}',     ['as' => 'company.destroy', 'uses' => 'CompanyController@destroy']);
Route::get('company/export',                     ['as' => 'company.export', 'uses' => 'CompanyController@export']);
Route::get('company/pdf',                     ['as' => 'company.pdf', 'uses' => 'CompanyController@pdf']);



// tipos de despesas
Route::get('config',                   ['as' => 'config.index','uses' => 'ConfigController@index']);


//download files

Route::get('/download', 'DownloadFileController@getDownload');
Route::get('/download/image1', 'DownloadFileController@getPcmovel');
Route::get('/download/image2', 'DownloadFileController@getCars');
