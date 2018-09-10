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

//fungsi
Route::resource('admin/fungsi', 'FungsiController');
Route::get('/admin/tbfungsi', 'FungsiController@getData');
Route::get('/admin/fungsi/{id}/hapus', 'FungsiController@hapus');

//hargabangunan
Route::resource('admin/hargabangunan', 'HargaBangunanController');
Route::get('/admin/tbhargabangunan', 'HargaBangunanController@getData');
Route::get('/admin/hargabangunan/{id}/hapus', 'HargaBangunanController@hapus');

//jenisimb
Route::resource('admin/jenisimb', 'JenisImbController');
Route::get('/admin/tbjenisimb', 'JenisImbController@getData');
Route::get('/admin/jenisimb/{id}/hapus', 'JenisImbController@hapus');

//klasifikasi bangunan
Route::resource('admin/klasifikasibangunan', 'KlasifikasiBangunanController');
Route::get('/admin/tbklasifikasibangunan', 'KlasifikasiBangunanController@getData');
Route::get('/admin/klasifikasibangunan/{id}/hapus', 'KlasifikasiBangunanController@hapus');

//klasifikasi Parameter
Route::resource('admin/klasifikasiparameter', 'KlasifikasiParameterController');
Route::get('/admin/tbklasifikasiparameter', 'KlasifikasiParameterController@getData');
Route::get('/admin/klasifikasiparameter/{id}/hapus', 'KlasifikasiParameterController@hapus');

//Parameter Detail
Route::resource('admin/klasifikasiparameterdetail', 'KlasifikasiParameterDetailController');
Route::get('/admin/tbklasifikasiparameterdetail', 'KlasifikasiParameterDetailController@getData');
Route::get('/admin/klasifikasiparameterdetail/{id}/hapus', 'KlasifikasiParameterDetailController@hapus');

//Persyaratan Teknis
Route::resource('admin/persyaratanteknis', 'PersyaratanTeknisController');
Route::get('/admin/tbpersyaratanteknis', 'PersyaratanTeknisController@getData');
Route::get('/admin/persyaratanteknis/{id}/hapus', 'PersyaratanTeknisController@hapus');

//Status Pengajuan
Route::resource('admin/statuspengajuan', 'StatusPengajuanController');
Route::get('/admin/tbstatuspengajuan', 'StatusPengajuanController@getData');
Route::get('/admin/statuspengajuan/{id}/hapus', 'StatusPengajuanController@hapus');

//Status Surveyor
Route::resource('admin/surveyor', 'SurveyorController');
Route::get('/admin/tbsurveyor', 'SurveyorController@getData');
Route::get('/admin/surveyor/{id}/hapus', 'SurveyorController@hapus');


//Pengajuan
Route::resource('admin/pengajuan', 'PengajuanController');
Route::get('/admin/tbpengajuan', 'PengajuanController@getData');
Route::get('/admin/pengajuan/{id}/hapus', 'PengajuanController@hapus');
Route::get('/admin/pengajuan/{id}/surveyor', 'PengajuanController@surveyor');
Route::put('/admin/pengajuan/{id}/updatesurveyor', 'PengajuanController@updatesurveyor');
Route::get('/admin/pengajuan/{id}/persyaratan', 'PengajuanController@persyaratan');
Route::put('/admin/pengajuan/{id}/updatepersyaratan', 'PengajuanController@updatepersyaratan');
Route::get('/admin/pengajuan/{id}/parameter', 'PengajuanController@parameter');
Route::put('/admin/pengajuan/{id}/updateparameter', 'PengajuanController@updateparameter');
Route::get('/admin/pengajuan/{id}/prasarana', 'PengajuanController@prasarana');
Route::put('/admin/pengajuan/{id}/updateprasarana', 'PengajuanController@updateprasarana');
Route::get('/admin/pengajuan/{id}/perhitungan', 'PengajuanController@perhitungan');
Route::put('/admin/pengajuan/{id}/updateperhitungan', 'PengajuanController@updateperhitungan');

//alur
Route::get('/alur', 'HomeDepanController@alur');




