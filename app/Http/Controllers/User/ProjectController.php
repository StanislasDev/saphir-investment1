<?php

namespace App\Http\Controllers\User;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ProjectController extends Controller
{
    public function index()
    {
        // Logique pour afficher la liste des projets
        return view('user.projects.index');
    }
}
