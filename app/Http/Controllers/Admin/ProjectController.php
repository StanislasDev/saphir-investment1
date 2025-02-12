<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Affiche la liste des projets.
     */
    public function index()
    {
        $projects = Project::all();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Enregistre un nouveau projet.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'category'        => 'required|string|max:255',
            'goal_amount'     => 'required|numeric',
            'start_date'      => 'required|date',
            'end_date'        => 'required|date|after_or_equal:start_date',
            'return_rate'     => 'required|numeric',
            // Pour status, on peut imposer une valeur par défaut ou la récupérer depuis le formulaire
            'status'          => 'sometimes|in:en cours,terminé,annulé',
            'image'           => 'image|mimes:jpeg,png,jpg|max:2048' // Validation de l'image
        ]);

         // Définir un statut par défaut si non renseigné
    if (!isset($validated['status'])) {
        $validated['status'] = 'en cours';
    }

     // Traitement de l'image
     if ($request->hasFile('image')) {
        $imagePath = $request->file('image')->store('projects', 'public'); 
        $validated['image'] = $imagePath;
     }

    Project::create($validated);

    return redirect()->route('admin.projects.index')->with('success', 'Projet créé avec succès.');
    }

    /**
     * Met à jour un projet existant.
     */
    public function update(Request $request, $id)
    {
        $project = Project::findOrFail($id);

        $validated = $request->validate([
            'title'           => 'required|string|max:255',
            'description'     => 'required|string',
            'category'        => 'required|string|max:255',
            'goal_amount'     => 'required|numeric',
            'start_date'      => 'required|date',
            'end_date'        => 'required|date|after_or_equal:start_date',
            'return_rate'     => 'required|numeric',
            'status'          => 'required|in:en cours,terminé,annulé',
            'image'           => 'image|mimes:jpeg,png,jpg|max:2048'
        ]);

         // Traitement du fichier image, si un nouveau fichier est uploadé
    if ($request->hasFile('image')) {
        // Optionnel : supprimer l'ancienne image si elle existe
        Storage::disk('public')->delete($project->image);

        $validated['image'] = $request->file('image')->store('projects', 'public');
    }

        $project->update($validated);

        return redirect()->route('admin.projects.index')->with('success', 'Projet mis à jour avec succès.');
    }

    /**
     * Supprime un projet.
     */
    public function destroy($id)
    {
        $project = Project::findOrFail($id);
        $project->delete();

        return redirect()->route('admin.projects.index')->with('success', 'Projet supprimé avec succès.');
    }
}
