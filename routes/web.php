<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ToolController;
use App\Http\Controllers\BmiController;
use App\Http\Controllers\PasswordController;
use App\Http\Controllers\CodiceFiscaleController;
use App\Http\Controllers\ConversioneController;
use App\Http\Controllers\HashController;
use App\Http\Controllers\GpsController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/tool/password', [ToolController::class, 'password']);
Route::post('/tool/password', [PasswordController::class, 'generate']);

Route::get('/tool/bmi', [BmiController::class, 'show']);
Route::post('/tool/bmi', [BmiController::class, 'calculate']);

Route::get('/tool/color', [ToolController::class, 'color']);
Route::post('/tool/color', [ToolController::class, 'convertColor']);

Route::get('/tool/qrcode', [ToolController::class, 'qrcode']);
Route::post('/tool/qrcode', [ToolController::class, 'generateQr']);

// Tool: Calcolatore Codice Fiscale
Route::get('/tool/codicefiscale', [CodiceFiscaleController::class, 'show']);
Route::post('/tool/codicefiscale', [CodiceFiscaleController::class, 'calculate']);

// Tool: Convertitore Unità di Misura
Route::get('/tool/conversione', [ConversioneController::class, 'show']);
Route::post('/tool/conversione', [ConversioneController::class, 'convert']);

// Tool: Hash Generator
Route::get('/tool/hash', [HashController::class, 'show']);
Route::post('/tool/hash', [HashController::class, 'generate']);

// Tool: Generatore Coordinate GPS
Route::get('/tool/gps', [GpsController::class, 'show']);
Route::post('/tool/gps', [GpsController::class, 'generate']);
