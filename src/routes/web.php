<?php
use Illuminate\Support\Facades\Route;
use Kankosal\User\Http\Controllers\UserController;

Route::resource('users', UserController::class);
