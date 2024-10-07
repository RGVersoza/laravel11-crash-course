<?php


use App\Http\Controllers\NoteController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;

Route::redirect('/', '/note')->name('dashboard');



Route::middleware(['auth', 'verified'])->group(
    function () {

        // route::get('/note', [NoteController::class, 'index'])->name('note.index');
        // route::get('/note/create', [NoteController::class, 'create'])->name('note.create');
        // route::post('/note', [NoteController::class, 'store'])->name('note.store');
        // route::get('/note/{id}', [NoteController::class, 'show'])->name('note.show');
        // route::get('/note/{id}/edit', [NoteController::class, 'edit'])->name('note.edit');
        // route::put('/note/{id}', [NoteController::class, 'update'])->name('note.update');
        // route::delete('/note/{id}', [NoteController::class, 'destroy'])->name('note.destroy');

        Route::resource('note', NoteController::class);
    }
);



Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';
