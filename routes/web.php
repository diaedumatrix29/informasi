<?php

use Illuminate\Support\Facades\Route;

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

// Auth Controller
Route::get('/register', 'RegisterController@index')->name('register');
Route::get('/login', 'LoginController@index')->name('login');

// Landing Page
Route::get('/', 'LandingController@index')->name('landingPage');

Route::group(['middleware' => 'auth'], function () {
    Route::auth();
// Admin Dashboard
Route::get('/admin/dashboard', 'AdminDashboardController@index')->name('admin.dashboard');


// Kota Admin
Route::get('/dashboard/kota', 'KotaController@index')->name('kota.dashboard');
Route::delete('/kota/delete/{id}', 'KotaController@destroy')->name('kota.destroy');
Route::get('/kota/edit/{name}', 'KotaController@edit')->name('kota.edit');
Route::get('kota/input-data-kota', 'KotaController@create')->name('kota.input');
Route::post('/input-data-kota-form', 'KotaController@store')->name('kota.form');
Route::put('/update-data-kota-form', 'KotaController@update')->name('kota.update');

// Kota User
Route::get('/kota/{name}', 'KotaController@show')->name('kota.detail');

// Mata Pelajaran
Route::get('/dashboard/mapel', 'MataPelajaranController@index')->name('mapel.dashboard');
Route::delete('/mapel/delete/{id}', 'MataPelajaranController@destroy')->name('mapel.destroy');
Route::get('/mapel/edit/{name}', 'MataPelajaranController@edit')->name('mapel.edit');
Route::get('/mapel/input-data-mapel', 'MataPelajaranController@create')->name('mapel.input');
Route::post('/input-data-mapel-form', 'MataPelajaranController@store')->name('mapel.form');
Route::get('/update-data-mapel-form', 'MataPelajaranController@update')->name('tingkatan.update');

Route::put('/update-data-promosi-home-page-form', 'PromosiHomePageController@update')->name('promosi-home-page.update');

// FAQ update
Route::get('/update-data-faq-form', 'FAQController@update')->name('faq.update');

// Testimoni teks update
Route::put('/update-data-testimoni-teks-form', 'TestimoniTeksController@update')->name('testimoni-teks.update');

// Office update
Route::get('/update-data-office-form', 'OfficeController@update')->name('office.update');

// Reservasi Update
Route::get('/update-data-reservasi-form', 'ReservasiController@update')->name('reservasi.update');

// Deskripsi Update
Route::get('/update-data-deskripsi-form', 'DeskripsiController@update')->name('deskripsi.update');

// Kecamatan edit
Route::get('/kecamatan/edit/{name}', 'KecamatanController@edit')->name('kecamatan.edit');

Route::put('/update-data-kecamatan-form', 'KecamatanController@update')->name('kecamatan.update');

Route::put('/update-data-asal-sekolah-siswa-form', 'AsalSekolahSiswaController@update')->name('asal-sekolah-siswa.update');

// Mata Pelajaran User
Route::get('/mata-pelajaran/{name}', 'MataPelajaranController@show')->name('mapel.detail');

// Tingkatan Admin


    Route::get('/dashboard/kelas', 'TingkatanController@index')->name('tingkatan.dashboard');
    Route::delete('/kelas/delete/{id}', 'TingkatanController@destroy')->name('tingkatan.destroy');
    Route::get('/kelas/edit/{name}', 'TingkatanController@edit')->name('tingkatan.edit');
    Route::post('/input-data-kelas-form', 'TingkatanController@store')->name('tingkatan.input');
    Route::get('/kelas/input-data-kelas', 'TingkatanController@create')->name('tingkatan.form');
    Route::put('/update-data-kelas-form', 'TingkatanController@update')->name('tingkatan.update');





// Tingkatan User
Route::get('/kelas/{name}', 'TingkatanController@show')->name('tingkatan.detail');

// Program Unggulan
Route::get('dashboard/program-unggulan', 'ProgramUnggulanController@index')->name('program.unggulan.dashboard');
Route::delete('/program-unggulan/delete/{id}', 'ProgramUnggulanController@destroy')->name('program.unggulan.destroy');
Route::get('/program-unggulan/edit/{name}', 'ProgramUnggulanController@edit')->name('program.unggulan.edit');

Route::get('/program-unggulan/input-data-program-unggulan', 'ProgramUnggulanController@create')->name('program.unggulan.input');
Route::post('/input-data-program-unggulan-form', 'ProgramUnggulanController@store')->name('program.unggulan.form');
Route::get('/update-data-program-unggulan-form', 'ProgramUnggulanController@update')->name('program.unggulan.update');

// Program Unggulan
Route::get('/{name}', 'ProgramUnggulanController@show')->name('program.unggulan.detail');

// Reservasi Admin
Route::get('dashboard/reservasi', 'ReservasiController@index')->name('reservasi.dashboard');
Route::delete('/reservasi/delete/{id}', 'ReservasiController@destroy')->name('reservasi.destroy');
Route::get('/reservasi/edit/{name}', 'ReservasiController@edit')->name('reservasi.edit');

Route::get('/reservasi/input-data-reservasi', 'ReservasiController@create')->name('reservasi.input');
Route::post('/input-data-reservasi-form', 'ReservasiController@store')->name('reservasi.form');
Route::get('/update-data-mapel-form', 'MataPelajaranController@update')->name('reservasi.update');

// FAQ
Route::get('dashboard/FAQ', 'FAQController@index')->name('faq.dashboard');
Route::delete('FAQ/delete/{id}', 'FAQController@destroy')->name('faq.destroy');
Route::get('FAQ/edit/{name}', 'FAQController@edit')->name('faq.edit');
Route::get('FAQ/input-data-faq', 'FAQController@create')->name('faq.input');
Route::post('/input-data-faq-form', 'FAQController@store')->name('faq.form');

// Office
Route::get('dashboard/office', 'OfficeController@index')->name('office.dashboard');
Route::get('office/input-data-office', 'OfficeController@store')->name('office.input');
Route::post('/input-data-office-form', 'OfficeController@create')->name('office.form');
Route::delete('office/delete/{id}', 'OfficeController@destroy')->name('office.destroy');

Route::get('office/edit/{name}', 'OfficeController@edit')->name('office.edit');

// Testimoni teks
Route::get('dashboard/testimoni-teks', 'TestimoniTeksController@index')->name('testimoni-teks.dashboard');
Route::get('testimoni-teks/input-data-testimoni-teks', 'TestimoniTeksController@create')->name('testimoni-teks.input');
Route::post('/input-data-testimoni-teks-form', 'TestimoniTeksController@store')->name('testimoni-teks.form');
Route::delete('testimoni-teks/delete/{id}', 'TestimoniTeksController@destroy')->name('testimoni-teks.destroy');
Route::get('testimoni-teks/edit/{name}', 'TestimoniTeksController@edit')->name('testimoni-teks.edit');

// Kecamatan
Route::get('dashboard/kecamatan/', 'KecamatanController@index')->name('kecamatan.dashboard');
Route::get('/kecamatan/input-data-kecamatan', 'KecamatanController@create')->name('kecamatan.input');
Route::post('/input-data-kecamatan-form', 'KecamatanController@store')->name('kecamatan.form');
Route::get('kecamatan/input-data-kecamatan', 'KecamatanController@create')->name('kecamatan.input');
Route::delete('kecamatan/delete/{id}', 'KecamatanController@destroy')->name('kecamatan.destroy');

// Kecamatan user
Route::get('/kota/{nama_kota}/{name}', 'KecamatanController@show')->name('kecamatan.detail');

// Promosi landing page
Route::get('dashboard/promosi-home-page/', 'PromosiHomePageController@index')->name('kecamatan.dashboard');

// Deskripsi
Route::get('dashboard/deskripsi/', 'DeskripsiController@index')->name('deskripsi.dashboard');
Route::get('/deskripsi/input-data-deskripsi', 'DeskripsiController@create')->name('deskripsi.input');
Route::post('/input-data-deskripsi-form', 'DeskripsiController@store')->name('deskripsi.form');
Route::delete('deskripsi/delete/{id}', 'DeskripsiController@destroy')->name('deskripsi.destroy');
Route::get('deskripsi/edit/{id}', 'DeskripsiController@edit')->name('deskripsi.edit');

// Asal Sekolah Siswa
Route::get('/dashboard/asal-sekolah-siswa', 'AsalSekolahSiswaController@index')->name('asal-sekolah-siswa.dashboard');
Route::get('/asal-sekolah-siswa/input-data-asal-sekolah-siswa', 'AsalSekolahSiswaController@create')->name('asal-sekolah-siswa.input');
Route::post('/input-data-asal-sekolah-siswa-form', 'AsalSekolahSiswaController@store')->name('asal-sekolah-siswa.form');
Route::delete('asal-sekolah-siswa/delete/{id}', 'AsalSekolahSiswaController@destroy')->name('asal-sekolah-siswa.destroy');
Route::get('asal-sekolah-siswa/edit/{name}', 'AsalSekolahSiswaController@edit')->name('asal-sekolah-siswa.edit');

// Diskon
Route::get('/dashboard/diskon', 'DiskonController@index')->name('diskon.dashboard');
Route::get('/diskon/input-data-diskon', 'DiskonController@create')->name('diskon.input');
Route::post('/input-data-diskon-form', 'DiskonController@store')->name('diskon.form');
Route::delete('diskon/delete/{id}', 'DiskonController@destroy')->name('diskon.destroy');
Route::get('diskon/edit/{id}', 'DiskonController@edit')->name('diskon.edit');

Route::put('/update-data-diskon-form', 'DiskonController@update')->name('diskon.update');

// Promosi Home Page
Route::get('/dashboard/promosi-home-page', 'PromosiHomePageController@index')->name('promosi-home-page.dashboard');
Route::get('/promosi-home-page/input-data-promosi-home-page', 'PromosiHomePageController@create')->name('promosi-home-page.input');
Route::post('/input-data-promosi-home-page-form', 'PromosiHomePageController@store')->name('promosi-home-page.form');
Route::delete('promosi-home-page/delete/{id}', 'PromosiHomePageController@destroy')->name('promosi-home-page.destroy');
Route::get('promosi-home-page/edit/{name}', 'PromosiHomePageController@edit')->name('promosi-home-page.edit');


Auth::routes();
});
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
