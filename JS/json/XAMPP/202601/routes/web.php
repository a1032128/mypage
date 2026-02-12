
<?php

use App\Http\Controllers\Admin\AdminController;
use Illuminate\Support\Facades\Route;

Route::get('/admin', [AdminController::class, "index"]);
Route::post('/admin/login',[AdminController::class,"login"]);
Route::get('/admin/home',[AdminController::class,"home"]);