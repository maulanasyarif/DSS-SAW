<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TahunajaranController;
use App\Http\Controllers\KelasController;
use App\Http\Controllers\JurusanController;
use App\Http\Controllers\SiswaController;
use App\Http\Controllers\KriteriaController;
use App\Http\Controllers\PenilaianController;
use App\Http\Controllers\Penilaian_siswaController;
use App\Http\Controllers\HasilController;
use App\Http\Controllers\IndexController;
use App\Http\Controllers\LandingController;
use App\Http\Controllers\PengajuanController;
use App\Http\Controllers\Auth\Login\SiswaLoginController;
use App\Http\Controllers\Home\SiswaHomeController;

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
    return view('landing2');
});


Auth::routes(['register' => false]);

Route::prefix('siswa')
->as('siswa.')
->group(function() {
    Route::get('home', [App\Http\Controllers\Home\SiswaHomeController::class, 'index'])->name('home');
    Route::get('cetak', [App\Http\Controllers\Home\SiswaHomeController::class, 'cetakPdf'])->name('cetak');
    Route::post('savePangajuan/store', [App\Http\Controllers\Home\SiswaHomeController::class, 'store'])->name('pdf.store');
    
    Route::namespace('Auth\Login')
    ->group(function() {
        Route::get('login', [App\Http\Controllers\Auth\Login\SiswaLoginController::class, 'showLoginForm'])->name('login');
        Route::post('login', [App\Http\Controllers\Auth\Login\SiswaLoginController::class, 'login'])->name('login');
        Route::post('logout', [App\Http\Controllers\Auth\Login\SiswaLoginController::class, 'logout'])->name('logout');
    });
});


Route::middleware(['verified'])->group( function (){
    Route::get('dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('dashboard');
    Route::get('cetak', [App\Http\Controllers\HomeController::class, 'cetakPdf'])->name('cetak');
    Route::delete('delete', [App\Http\Controllers\HomeController::class, 'deleteHasil'])->name('deleteHasil');
    
    
    Route::get('admin/siswa/', [SiswaController::class, 'index']);
    Route::get('admin/siswa/tambahsiswa', [SiswaController::class, 'create']);
    Route::post('admin/siswa/tambahsiswa/store', [SiswaController::class, 'store']);
    Route::get('admin/siswa/detailsiswa/{siswa:id}', [SiswaController::class, 'show']);
    Route::get('admin/siswa/editsiswa/edit/{siswa:id}', [SiswaController::class, 'edit']);
    Route::patch('admin/siswa/editsiswa/edit/{siswa:id}', [SiswaController::class, 'update']);
    Route::delete('admin/siswa/deletesiswa/{siswa:id}', [SiswaController::class, 'destroy']);
    Route::get('admin/siswa/import', [SiswaController::class, 'import']);
    Route::post('admin/siswa/import_excel', [SiswaController::class, 'import_excel']);
    
    Route::get('admin/pengajuan/', [PengajuanController::class, 'index'])->name('index.pengajuan');
    Route::get('admin/jenispengajuan/', [PengajuanController::class, 'indexJenisPengajuan'])->name('index.jenisPengajuan');
    Route::get('admin/jenispengajuan/tambahJenisPengajuan', [PengajuanController::class, 'createJenisPengajuan'])->name('create.jenisPengajuan');
    Route::post('admin/jenispengajuan/tambahJenisPengajuan/store', [PengajuanController::class, 'storeJenisPengajuan'])->name('store.jenisPengajuan');
    Route::get('admin/pengajuan/editJenisPengajuan/edit/{JenisPengajuan:id}', [PengajuanController::class, 'editJenisPengajuan'])->name('edit.jenisPengajuan');
    Route::patch('admin/pengajuan/editJenisPengajuan/edit/{JenisPengajuan:id}', [PengajuanController::class, 'updateJenisPengajuan'])->name('update.jenisPengajuan');
    Route::delete('admin/deleteJenisPengajuan/{JenisPengajuan:id}', [PengajuanController::class, 'destroyJenisPengajuan'])->name('delete.jenisPengajuan');
    Route::post('admin/pengajuan/approvePengajuan', [PengajuanController::class, 'approvesiswa'])->name('approve.pengajuan');
    Route::delete('admin/pengajuan/delete', [PengajuanController::class, 'destroy'])->name('delete.pengajuan');
    Route::get('admin/pengajuan/approve', [PengajuanController::class, 'indexApprove'])->name('index.approve');
    Route::delete('admin/delete', [PengajuanController::class, 'deleteApprove'])->name('delete.approve');

    
    Route::get('admin/kriteria/', [KriteriaController::class, 'index']);
    Route::get('admin/kriteria/tambahkriteria', [KriteriaController::class, 'create']);
    Route::post('admin/kriteria/tambahkriteria/store', [KriteriaController::class, 'store']);
    Route::get('admin/kriteria/editkriteria/edit/{kriteria:id}', [KriteriaController::class, 'edit']);
    Route::patch('admin/kriteria/editkriteria/edit/{kriteria:id}', [KriteriaController::class, 'update']);
    Route::delete('admin/kriteria/deletekriteria/{kriteria:id}', [KriteriaController::class, 'destroy']);
    
    
    Route::get('admin/penilaian/', [PenilaianController::class, 'index']);
    Route::get('admin/penilaian/tambahpenilaian', [PenilaianController::class, 'create']);
    Route::post('admin/penilaian/tambahpenilaian/store', [PenilaianController::class, 'store']);
    Route::get('admin/penilaian/editpenilaian/edit/{penilaian:id}', [PenilaianController::class, 'edit']);
    Route::patch('admin/penilaian/editpenilaian/edit/{penilaian:id}', [PenilaianController::class, 'update']);
    Route::delete('admin/penilaian/deletepenilaian/{penilaian:id}', [PenilaianController::class, 'destroy']);
    
    
    Route::get('admin/nilai/', [Penilaian_siswaController::class, 'index']);
    Route::get('admin/nilai/tambahnilai', [Penilaian_siswaController::class, 'create']);
    Route::post('admin/nilai/tambahnilai/store', [Penilaian_siswaController::class, 'store']);
    Route::get('admin/nilai/editnilai/edit/{penilaian_siswa:id}', [Penilaian_siswaController::class, 'edit']);
    Route::patch('admin/nilai/editnilai/edit/{penilaian_siswa:id}', [Penilaian_siswaController::class, 'update']);
    Route::delete('admin/nilai/deletenilai/{approve_penilaian:siswa_id}', [Penilaian_siswaController::class, 'destroy']);
    
    
    Route::get('admin/hasil/', [HasilController::class, 'indexHasil']);
    Route::post('admin/hasil/saveData', [HasilController::class, 'saveData']);
    
});