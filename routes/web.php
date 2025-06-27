<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

Route::get('/', function () {
    if (Auth::check()) {
        return redirect('/admin'); // Untuk user yang sudah login
    }
    return redirect('/admin/login'); // Untuk user belum login
});
