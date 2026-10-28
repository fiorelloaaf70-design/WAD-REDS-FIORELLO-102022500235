<?php

use App\Http\Controllers\PenghuniController;

Route::resource('penghuni', PenghuniController::class);

Route::get('/', function () {
    return view('welcome');
});
