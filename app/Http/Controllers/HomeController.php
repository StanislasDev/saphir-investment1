<?php

namespace App\Http\Controllers;

use App\Models\Project;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $projects = Project::latest()->take(4)->get(); // Récupérer les 4 derniers projets
        return view('welcome', compact('projects'));
    }
}
