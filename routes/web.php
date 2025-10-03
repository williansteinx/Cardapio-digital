<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CardapioController;
use App\Models\Prato;

// Página inicial aberta (sem login)
Route::get('/', function () {
    $pratos = Prato::all();
    return view('home', compact('pratos'));
})->name('home');

// Todas as rotas abaixo exigem autenticação
Route::middleware(['auth'])->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    // CRUD de cardápio
    Route::resource('cardapio', CardapioController::class)->parameters([
        'cardapio' => 'prato'
    ]);
});

require __DIR__.'/auth.php';

