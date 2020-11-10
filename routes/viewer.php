<?php

Route::get('/home', function () {
    $users[] = Auth::user();
    $users[] = Auth::guard()->user();
    $users[] = Auth::guard('viewer')->user();

    //dd($users);

    return view('viewer.home');
})->name('home');

