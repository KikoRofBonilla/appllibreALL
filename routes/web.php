<?php

use App\Livewire\Auth\ForgotPassword;
use App\Livewire\Auth\Login;
use App\Livewire\Auth\Register;
use App\Livewire\Auth\ResetPassword;
use App\Livewire\Pages\BookShow;
use App\Livewire\Pages\Catalog;
use App\Livewire\Pages\Categories;
use App\Livewire\Pages\Home;
use App\Livewire\Pages\Profile;
use App\Livewire\Pages\WishlistPage;
use App\Livewire\Pages\Admin\Books;
use App\Livewire\Pages\Admin\Categories as AdminCategories;
use App\Livewire\Pages\Admin\Users;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

Route::livewire('/', Home::class)->name('home');
Route::livewire('/catalog', Catalog::class)->name('catalog');
Route::livewire('/categories', Categories::class)->name('categories');
Route::livewire('/books/{book}', BookShow::class)->name('books.show');

Route::middleware('guest')->group(function () {
    Route::livewire('/login', Login::class)->name('login');
    Route::livewire('/register', Register::class)->name('register');
    Route::livewire('/forgot-password', ForgotPassword::class)->name('password.request');
    Route::livewire('/reset-password/{token}', ResetPassword::class)->name('password.reset');
});

Route::middleware('auth')->group(function () {
    Route::livewire('/wishlist', WishlistPage::class)->name('wishlist');
    Route::livewire('/profile', Profile::class)->name('profile');

    Route::post('/logout', function () {
        Auth::logout();
        request()->session()->invalidate();
        request()->session()->regenerateToken();

        return redirect()->route('home');
    })->name('logout');

    Route::middleware('admin')->prefix('admin')->name('admin.')->group(function () {
        Route::livewire('/books', Books::class)->name('books');
        Route::livewire('/categories', AdminCategories::class)->name('categories');
        Route::livewire('/users', Users::class)->name('users');
    });
});
