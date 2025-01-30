<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestorController;

Route::get('/', function () {
    // Exemple : assigner un rôle à un utilisateur pour les tests
    // auth()->user()->assignRole('admin');
    return view('welcome');
});

// Redirection après authentification
Route::get('/dashboard', function () {
    $user = auth()->user();

    // Rediriger l'admin vers son tableau de bord
    if ($user->hasRole('admin')) {
        return redirect()->route('admin.dashboard');
    }

    // Les utilisateurs sans rôle (investisseurs) vont vers un tableau de bord général
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

// Routes pour l'administrateur
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('/users/{id}', [AdminController::class, 'showUser'])->name('admin.user.show');
});

// Routes de profil accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'authentification fournies par Breeze
require __DIR__.'/auth.php';