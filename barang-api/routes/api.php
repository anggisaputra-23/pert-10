<?php

use App\Http\Controllers\BarangController;
use Illuminate\Support\Facades\Route;

Route::apiResource('barang', BarangController::class);
