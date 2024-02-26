<?php

use Illuminate\Support\Facades\Route;

Route::get('/', [App\Http\Controllers\LoginController::class, 'indexLogin'])->name('');
Route::get('/login', [App\Http\Controllers\LoginController::class, 'indexLogin'])->name('login');
Route::get('/registrar', [App\Http\Controllers\LoginController::class, 'registrarUsuario'])->name('registrar');

Route::post('/validar', [App\Http\Controllers\LoginController::class, 'login'])->name('validar');
Route::post('/logout', [App\Http\Controllers\LoginController::class, 'logout'])->name('logout');


Route::group(['middleware' => ['auth']], function () {

    Route::get('/', [App\Http\Controllers\ExcelController::class, 'index'])->name('/index');

    Route::get('/index', [App\Http\Controllers\ExcelController::class, 'index'])->name('/index');

    Route::post('/consultarInformacion', [App\Http\Controllers\ExcelController::class, 'consultarInformacion'])->name('/consultarInformacion');

    Route::post('/actualizarInformacion', [App\Http\Controllers\ExcelController::class, 'actualizarInformacion'])->name('/actualizarInformacion');
});
