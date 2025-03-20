<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Project;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $userCount = User::count();                       // Nombre total d'utilisateurs
        $projectsCount = Project::count();           // Nombre total d'investissements
        return view('admin.dashboard',compact('userCount','projectsCount'));
    }
    
         /* Liste tous les utilisateurs de la plateforme. */
    public function users()
    {
        $users = User::with('roles')->paginate(10); // 10 utilisateurs par page
    return view('admin.users.index', compact('users'));
    }

    public function showUser($id)
    {
        $user = User::findOrFail($id); // Trouve l'utilisateur par ID ou renvoie une erreur 404

        return view('admin.users.show', compact('user'));
    }

    public function deleteUser($id)
    {
        $user = User::findOrFail($id); // Trouve l'utilisateur par ID
        $user->delete();               // Supprime l'utilisateur

        return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès.');
    }
}


// <?php

// namespace App\Http\Controllers;

// use App\Models\User;        // Modèle utilisateur
// use App\Models\Investment;  // Modèle investissement
// use Illuminate\Http\Request;

// class AdminController extends Controller
// {
//     /**
//      * Affiche le tableau de bord de l'administration.
//      */
//     public function dashboard()
//     {
//         $userCount = User::count();                       // Nombre total d'utilisateurs
//         $investmentCount = Investment::count();           // Nombre total d'investissements
//         $totalInvestments = Investment::sum('amount');    // Montant total investi

//         return view('admin.dashboard', compact('userCount', 'investmentCount', 'totalInvestments'));
//     }

//     /**
//      * Liste tous les utilisateurs de la plateforme.
//      */
//     public function users()
//     {
//         $users = User::all(); // Récupère tous les utilisateurs

//         return view('admin.users.index', compact('users'));
//     }

//     /**
//      * Affiche les détails d'un utilisateur spécifique.
//      */
//     public function showUser($id)
//     {
//         $user = User::findOrFail($id); // Trouve l'utilisateur par ID ou renvoie une erreur 404

//         return view('admin.users.show', compact('user'));
//     }

//     /**
//      * Supprime un utilisateur de la plateforme.
//      */
//     public function deleteUser($id)
//     {
//         $user = User::findOrFail($id); // Trouve l'utilisateur par ID
//         $user->delete();               // Supprime l'utilisateur

//         return redirect()->route('admin.users')->with('success', 'Utilisateur supprimé avec succès.');
//     }

//     /**
//      * Liste tous les investissements réalisés sur la plateforme.
//      */
//     public function investments()
//     {
//         $investments = Investment::with('user')->get(); // Récupère tous les investissements avec les données utilisateur associées

//         return view('admin.investments.index', compact('investments'));
//     }
// }
