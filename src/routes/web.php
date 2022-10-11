<?php
use Illuminate\Support\Facades\Route;
use Kankosal\User\Http\Controllers\LoginController;
use Kankosal\User\Http\Controllers\UserController;
use Kankosal\User\Http\Controllers\MyProfileController;

Route::get('/', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'postLogin'])->name('admin.login');

Route::group(['middleware' => 'auth', 'as' => 'admin.'], function () {

	Route::get('my_profile', [MyProfileController::class, 'getMyProfile'])->name('get_my_profile');
	Route::post('my_profile', [MyProfileController::class, 'postMyProfile'])->name('post_my_profile');

	Route::get('change_password', [MyProfileController::class, 'getChangePassword'])->name('get_change_password');
	Route::post('change_password', [MyProfileController::class, 'postChangePassword'])->name('post_change_password');
	Route::get('logout', [MyProfileController::class, 'logout'])->name('logout');

});

Route::resource('users', UserController::class);
