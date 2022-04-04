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

Route::get('/', function () {
    return view('welcome');
})->name('welcome');

Auth::routes();

Route::group(["middleware" => "auth"], function () {
    Route::get('/beranda', 'HomeController@index')->name('beranda');
    Route::resource("pengguna", "Application\UserController");
    Route::get('profile', 'ProfileController@index')->name('profile');
    // Route::put('profile/{id}', 'ProfileController@update')->name('profileUpdate');
});

// Route::group(["midd"])

Route::group(["middleware" => ["role.Administrator", "auth"]], function () {
    Route::resource("rukun_tetangga", "Application\RTController");
    Route::get('/getDataRT/{id}', 'Application\RTController@getDataEdit');
});

Route::group(["middleware" => ["role.RT", "auth"]], function () {
    Route::resource("status_keluarga", "Application\FamilyStatusController");
    Route::get("/getDataKeluarga/{id}", "Application\FamilyStatusController@getDataEdit");

    Route::resource("status_kartu_keluarga", "Application\FamilyCStatusController");
    Route::get("/getDataKK/{id}", "Application\FamilyCStatusController@getDataEdit");

    Route::resource("status_pernikahan", "Application\MaritalStatusController");
    Route::get("/getDataPernikahan/{id}", "Application\MaritalStatusController@getDataEdit");

    Route::post("/pengguna/updatePW/{id}", "Application\UserController@updatePW");
    Route::get("/getDataPengguna/{id}", "Application\UserController@getDataEdit");

    Route::resource("informasi_wilayah", "Application\AreaInformationController");
    Route::resource("data_warga", "Application\DataWargaController");

    Route::get("/cetakDataWarga", "Application\DataWargaController@print")->name("printDataWarga");
    Route::get("/cetakDataWargaDetail/{id}", "Application\DataWargaController@printDetail")->name("printDataWargaDetail");
    Route::get('/cariKepalaKeluarga', 'Application\DataWargaController@cariKepalaKeluarga')->name('cariKepalaKeluarga');
});

Route::group(["middleware" => ["role.User", "auth"]], function () {
    Route::resource("data_diri", "DataDiriController");
    Route::get("/cetakDataDiri", "DataDiriController@print")->name("printDataDiri");
});
