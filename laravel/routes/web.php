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

Route::get('/', function () {
    return view('index');
});
Route::get('/clear-cache',function(){
    Artisan::call('cache:clear');
    //return view('cache');
});
Route::get('/coba',function(){
    echo "halaman coba";
});
Route::get('/sign-in',function(){
    return view('login');
});
Route::get('/login','AuthController@login')->name('login');
Route::post('/postlogin','AuthController@postlogin')->name('postlogin');
Route::get('/logout','AuthController@logout')->name('logout');

Route::group(['middleware' => ['auth:Admin']],function(){
    Route::get('/admin','AdminController@index');
    Route::get('/mapel','AdminController@mapel');
    Route::get('/admin/searchakun','AdminController@searchakun');
    Route::get('/admin/searchmapel','AdminController@searchmapel');
    // CRUD data akun
    Route::get('/akun/tambah','AdminController@tambahakun');
    Route::post('/akun/store','AdminController@storeakun');
    Route::get('/admin/akun/edit/{id}','AdminController@editakun');
    Route::post('/admin/akun/update/{id}','AdminController@updateakun');
    Route::get('/admin/akun/editpassword/{id}','AdminController@editpassword');
    Route::post('/admin/akun/updatepassword/{id}','AdminController@updatepassword');
    Route::get('/admin/akun/hapus/{id}','AdminController@hapus');
    //CRUD data mapel
    Route::get('/mapel/tambah','AdminController@tambahmapel');
    Route::post('/mapel/store','AdminController@storemapel');
    Route::get('/admin/mapel/edit/{id}','AdminController@editmapel');
    Route::post('/admin/mapel/update/{id}','AdminController@updatemapel');
    Route::get('/admin/mapel/hapus/{id}','AdminController@hapusmapel');
});
Route::group(['middleware' => ['auth:Guru']],function(){
    Route::get('/guru','GuruController@guru');
    Route::get('/guru/khusus','GuruController@gurukhusus');
    Route::get('/guru/materi/{id}','GuruController@materi');
    Route::post('/guru/materi/upload','GuruController@upload');
    Route::get('/guru/materi/edit/{id}','GuruController@edit');
    Route::get('/guru/materi/hapus/{id}','GuruController@hapus');
    Route::get('/guru/tugas/{id}','GuruController@tugas');
});
/*Route::group(['middleware' => ['auth:Siswa']],function(){
    Route::get('/siswa','SiswaController@siswa');
    Route::get('/siswa/materi/{id}','SiswaController@materi');
    Route::get('/siswa/tugas/{id}','SiswaController@tugas');
    Route::post('/siswa/tugas/upload','SiswaController@upload');
    Route::get('/siswa/tugas/hapus/{id}','SiswaController@hapus');
});*/

Route::get('/kelas/daftarkelas/mapel/{kelas}','SekolahController@mapel');
Route::get('/kelas/daftarkelas/materi/{id}','SekolahController@materi');