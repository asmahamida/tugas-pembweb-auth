
<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MahasiswaController;

Route::get('/', function () {
    return redirect()->route('dashboard');
});

Route::middleware(['auth'])->group(function () {

    Route::get('/dashboard', function () {
        return view('dashboard');
    })->name('dashboard');

    Route::middleware(['role:admin,operator'])->group(function () {
        Route::resource('mahasiswa', MahasiswaController::class)
            ->except(['show', 'destroy']);
    });

    Route::delete('/mahasiswa/{mahasiswa}', [MahasiswaController::class, 'destroy'])
        ->middleware('role:admin')
        ->name('mahasiswa.destroy');
});

require __DIR__.'/auth.php';
