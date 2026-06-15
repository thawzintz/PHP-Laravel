<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

use App\Http\Controllers\GuestbookController;

Route::get('/guestbook', [GuestbookController::class, 'index']);
Route::post('/guestbook/save', [GuestbookController::class, 'store']);
Route::delete('/guestbook/{id}', [GuestbookController::class, 'destroy']);

Route::get('/guestbook/{id}/edit', [GuestbookController::class, 'edit']);

Route::put('/guestbook/{id}', [GuestbookController::class, 'update']);