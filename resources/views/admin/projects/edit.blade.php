@extends('layouts.nav')

@section('title', 'Tableau de bord Admin:Projects')

@section('content')
<div class="container">
    <h2>Modifier le projet</h2>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    @if ($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('admin.projects.update', $project->id) }}" method="POST" enctype="multipart/form-data">
        @csrf
        @method('PUT')

        <div class="mb-3">
            <label class="form-label">Titre</label>
            <input type="text" class="form-control" name="title" value="{{ $project->title }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Description</label>
            <textarea class="form-control" name="description" required>{{ $project->description }}</textarea>
        </div>

        <div class="mb-3">
            <label class="form-label">Catégorie</label>
            <input type="text" class="form-control" name="category" value="{{ $project->category }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Montant recherché</label>
            <input type="number" step="0.01" class="form-control" name="goal_amount" value="{{ $project->goal_amount }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date de début</label>
            <input type="date" class="form-control" name="start_date" value="{{ $project->start_date->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Date de fin</label>
            <input type="date" class="form-control" name="end_date" value="{{ $project->end_date->format('Y-m-d') }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Taux de retour (%)</label>
            <input type="number" step="0.01" class="form-control" name="return_rate" value="{{ $project->return_rate }}" required>
        </div>

        <div class="mb-3">
            <label class="form-label">Statut</label>
            <select class="form-select" name="status" required>
                <option value="en cours" {{ $project->status == 'en cours' ? 'selected' : '' }}>En cours</option>
                <option value="terminé" {{ $project->status == 'terminé' ? 'selected' : '' }}>Terminé</option>
                <option value="annulé" {{ $project->status == 'annulé' ? 'selected' : '' }}>Annulé</option>
            </select>
        </div>

        <div class="mb-3">
            <label class="form-label">Image du projet</label>
            <input type="file" class="form-control" name="image" accept="image/*">
            @if ($project->image)
                <div class="mt-2">
                    <img src="{{ asset('storage/' . $project->image) }}" alt="Image du projet" style="max-width: 100px;">
                </div>
            @endif
        </div>

        <button type="submit" class="btn btn-success">Mettre à jour</button>
        <a href="{{ route('admin.projects.index') }}" class="btn btn-secondary">Annuler</a>
    </form>
</div>
@endsection
