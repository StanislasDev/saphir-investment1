<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\InvestmentController;
use App\Http\Controllers\Admin\ProjectController;

// Route::get('/', function () {
//     // Exemple : assigner un rôle à un utilisateur pour les tests
//     // auth()->user()->assignRole('admin');
//     return view('welcome');
// });
Route::get('/', [HomeController::class, 'index']);

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

// Routes dashboard pour l'administrateur
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('admin/users', [AdminController::class, 'users'])->name('admin.users');
    Route::get('admin/users/{id}', [AdminController::class, 'showUser'])->name('admin.user.show');
    Route::delete('admin/users/delete/{id}', [AdminController::class, 'deleteUser'])->name('admin.user.delete');
});

// Routes pour la gestion des projets
Route::middleware(['auth', 'role:admin'])->group(function () {
    Route::get('admin/projects', [ProjectController::class, 'index'])->name('admin.projects.index');
    Route::get('admin/projects/create', [ProjectController::class, 'create'])->name('admin.projects.create');
    Route::post('admin/projects', [ProjectController::class, 'store'])->name('admin.projects.store');
    Route::get('/admin/projects/{project}/edit', [ProjectController::class, 'edit'])->name('admin.projects.edit');
    Route::put('/admin/projects/{project}', [ProjectController::class, 'update'])->name('admin.projects.update');
    Route::delete('admin/projects/{id}', [ProjectController::class, 'destroy'])->name('admin.projects.destroy');
});

// Routes pour les investissements
// Côté admin
Route::middleware(['auth', 'role:admin'])->group(function() {
    Route::get('/admin/investments', [InvestmentController::class, 'adminIndex'])->name('admin.investments.index');
    Route::post('/admin/investment/{id}/update', [InvestmentController::class, 'updateStatus'])->name('admin.investment.update');
});

// Côté utilisateur
Route::middleware(['auth'])->group(function() {
    // Afficher la page d'investissement
    Route::get('/invest/{id}', [InvestmentController::class, 'show'])->name('invest.show');
    // Investir sur un projet
    Route::post('/invest', [InvestmentController::class, 'store'])->name('invest.store');
    // Afficher les investissements de l'utilisateur
    Route::get('/investments', [InvestmentController::class, 'index'])->name('user.investments');
});

// Routes de profil accessibles à tous les utilisateurs authentifiés
Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

// Routes d'authentification fournies par Breeze
require __DIR__ . '/auth.php';