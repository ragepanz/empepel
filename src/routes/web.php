<?php

use Illuminate\Support\Facades\Route;
use Livewire\Livewire;
use App\Http\Controllers\InvoiceController;
use App\Providers\Filament\ClientPanelProvider;

/*
|--------------------------------------------------------------------------
| Public Route
|--------------------------------------------------------------------------
*/
Route::get('/', function () {
    return view('welcome');
})->name('welcome');

/*
|--------------------------------------------------------------------------
| Smart Login Redirect
|--------------------------------------------------------------------------
*/
Route::get('/login', function () {
    if (auth()->check()) {
        return auth()->user()->hasRole('super_admin') 
            ? redirect('/admin') 
            : redirect('/client');
    }
    return redirect('/admin/login');
})->name('login');

/*
|--------------------------------------------------------------------------
| Invoice Routes (Accessible by Admin and Customer)
|--------------------------------------------------------------------------
*/
Route::middleware(['auth'])->group(function () {
    Route::get('/invoice/{order}/download', [InvoiceController::class, 'download'])
        ->name('invoice.download');
    Route::get('/invoice/{order}/preview', [InvoiceController::class, 'preview'])
        ->name('invoice.preview');

    // Compatibility route for existing links
    Route::get('/client/invoice/{order}', [InvoiceController::class, 'download']);
});

/*
|--------------------------------------------------------------------------
| Filament Panel Registration
|--------------------------------------------------------------------------
*/


/*
|--------------------------------------------------------------------------
| Fallback Route
|--------------------------------------------------------------------------
*/
Route::fallback(function () {
    return redirect()->route('welcome');
});