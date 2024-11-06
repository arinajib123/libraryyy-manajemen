<?php

use App\Http\Controllers\AuthController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\BookController;

Route::get('/', function () {
    return Auth::check() ? redirect()->route('books.index') : redirect()->route('auth.login');
});

// Routes untuk registrasi
Route::get('/register', [AuthController::class, 'showRegisterForm'])->name('auth.showFormRegister');
Route::post('/register', [AuthController::class, 'register'])->name('auth.register');

// Routes untuk login
Route::get('/login', [AuthController::class, 'showLoginForm'])->name('auth.login');
Route::post('/login', [AuthController::class, 'login'])->name('auth.login.post');

// Routes untuk logout
Route::post('/logout', [AuthController::class, 'logout'])->name('auth.logout');

// Middleware untuk mengamankan routes buku
Route::middleware('auth')->group(function () {
    Route::get('/books', [BookController::class, 'index'])->name('books.index'); // Menampilkan daftar buku
    Route::get('/books/create', [BookController::class, 'create'])->name('books.create'); // Menampilkan form tambah buku
    Route::post('/books', [BookController::class, 'store'])->name('books.store'); // Menyimpan buku baru
    Route::get('/books/{book}/edit', [BookController::class, 'edit'])->name('books.edit'); // Menampilkan form edit buku
    Route::put('/books/{book}', [BookController::class, 'update'])->name('books.update'); // Mengupdate data buku
    Route::delete('/books/{book}', [BookController::class, 'destroy'])->name('books.destroy'); // Menghapus buku
});
