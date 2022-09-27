<?php
use Illuminate\Support\Facades\Route;

Route::prefix('admin')->group(function () {
    Route::get('/users', function () {
        echo 'Hello from the calculator package!';
    });
});
