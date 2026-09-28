<?php
use App\Http\Controllers\GajiController;
use Illuminate\Support\Facades\Route;

Route::get('/',[GajiController::class,'index']);
Route::post('/cetak',[GajiController::class,'cetak'])->name('cetak');
