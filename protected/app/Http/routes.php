<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('/clear-cache', function() {
    $exitCode1 = Artisan::call('cache:clear');
    // $exitCode2 = Artisan::call('config:clear');
    $exitCode3 = Artisan::call('view:clear');
    // $exitCode2 = Artisan::call('vendor:publish');
    // return what you want
    return "Clear Success";
});

Route::get('/mail-send', function() {
    $exitCode1 = Artisan::call('custom:command');

    return "Command Success";
});

// Route::get('/', function () {
//     return view('welcome');
// });

Route::get('/', 'HomeDepanController@index');

Route::get('/admin/alreadyexist', function () {
    return view('errors.already');
});

Route::auth();


Route::get('/admin', 'HomeController@index');

Route::post('/admin', 'HomeController@uploadFoto');


//Route User 
    Route::resource('admin/user', 'userController');
    Route::get('admin/tbuser', 'userController@getUser');
    Route::get('admin/user/{id}/hapus', 'userController@hapus');
    Route::get('admin/password/{id}/edit', 'userController@getUbahPass');
    Route::post('admin/ajaxCheckPass/{ajaxCheckPass}', [
                'as' => 'ajaxCheckPass', 'uses' => 'userController@getPassLama'
        ]);
    Route::put('admin/ubahpass/{id}', 'userController@postPass');

    Route::get('admin/ajaxChangePermision/{id}', 'userController@changePermision');

    // --- Tambahan Untuk Combo Nama user ---///
    Route::get('admin/user/{id}/nama', 'userController@getNama');
    Route::get('admin/ajaxDosen/{ajaxDetail}', [
                'as' => 'ajaxDetail', 'uses' => 'userController@getDosen'
        ]);
    Route::get('admin/ajaxPegawai/{ajaxDetail}', [
                'as' => 'ajaxDetail', 'uses' => 'userController@getPegawai'
        ]);
    Route::get('admin/ajaxMahasiswa/{ajaxDetail}', [
                'as' => 'ajaxDetail', 'uses' => 'userController@getMahasiswa'
        ]);
    Route::get('admin/ajaxNama/{ajaxNama}', [
                'as' => 'ajaxNama', 'uses' => 'userController@getNama'
        ]);
    Route::get('admin/importdosen', 'userController@importdosen');



//Slider Routes
Route::resource('admin/slider', 'sliderController');
Route::get('/admin/tbslider', 'sliderController@getData');
Route::post('/admin/slider/{id}/update', 'sliderController@updateslider');
Route::get('/admin/slider/{id}/hapus', 'sliderController@hapus');

//profile Routes
Route::resource('admin/profile', 'profileController');
Route::get('/admin/tbprofile', 'profileController@getData');
Route::post('/admin/ajaximage','profileController@uploadimage');
Route::post('/admin/ajaxdelimage','profileController@deleteImage');
Route::get('/admin/profile/{id}/hapus', 'profileController@hapus');

