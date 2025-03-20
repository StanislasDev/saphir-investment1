<?php

namespace App\Http\Controllers;

use App\Models\Investment;
use App\Models\Project;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class InvestmentController extends Controller
{
    // Affichage de la page d'investissement
    public function show($id)
    {
        $project = Project::findOrFail($id);
        /* $userBalance = auth()->user()->balance; */ // Solde de l'utilisateur

        return view('investor.invest', compact('project'/*, 'userBalance'*/));
    }

    // Investir sur un projet (côté utilisateur)
    public function store(Request $request)
    {
        $user = auth()->user();
        $amount = $request->amount;
        // Vérifier si le solde est suffisant
        if ($user->balance < $amount) {
            return back()->with('error', 'Solde insuffisant pour investir');
        }
        Investment::create([
            'user_id' => Auth::id(),
            'project_id' => $request->project_id,
            'amount' => $request->amount,
            'status' => 'pending'
        ]);

        // Déduire le solde de l'utilisateur
        $user->update(['balance' => $user->balance - $amount]);

        return redirect()->route('user.investments')->with('success', 'Votre investissement a été effectué avec succès');
    }

    // Affichage des investissements côté utilisateur
    public function index()
    {
        $investments = Investment::where('user_id', Auth::id())->get();

        return view('user.investments', compact('investments'));
    }

    // Affichage côté admin pour gérer les investissements
    public function adminIndex()
    {
        $investments = Investment::with('user', 'project')->get();

        return view('admin.investments.index', compact('investments'));
    }

    // Mise à jour du statut
    public function updateStatus($id, Request $request)
    {
        $investment = Investment::findOrFail($id);
        $investment->update(['status' => $request->status]);

        return redirect()->back()->with('success', 'Statut mis à jour avec succès');
    }
}
