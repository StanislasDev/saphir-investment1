@extends('layouts.nav')

@section('title', 'Tableau de bord Admin:Projects')


@section('content')
    <div class="container mt-4">
        <h1>Liste des projets</h1>

        @if (session('success'))
            <div class="alert alert-success">{{ session('success') }}</div>
        @endif

        <!-- Bouton d'ouverture du modal de création -->
        <button type="button" class="my-3 btn btn-primary" data-bs-toggle="modal" data-bs-target="#createProjectModal">
            Créer un nouveau projet
        </button>

        <!-- Tableau des projets -->
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Titre</th>
                    <th>Catégorie</th>
                    <th>Montant recherché</th>
                    <th>Montant collecté</th>
                    <th>Date de début</th>
                    <th>Date de fin</th>
                    <th>Taux de retour</th>
                    <th>Statut</th>
                    <th>Image</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($projects as $project)
                    <tr>
                        <td>{{ $project->id }}</td>
                        <td>{{ $project->title }}</td>
                        <td>{{ $project->category }}</td>
                        <td>{{ $project->goal_amount }}</td>
                        <td>{{ $project->collected_amount }}</td>
                        <td>{{ $project->start_date->format('Y-m-d') }}</td>
                        <td>{{ $project->end_date->format('Y-m-d') }}</td>
                        <td>{{ $project->return_rate }}%</td>
                        <td>{{ ucfirst($project->status) }}</td>
                        <td>
                            <img class="w-8 h-8 rounded-full" src="{{ asset('storage/' . $project->image) }}"
                                alt="Image du projet">
                        </td>

                        <td>
                            <!-- Bouton Modifier : ouvre le modal d'édition du projet -->
                            {{-- <button type="button" class="btn btn-sm btn-warning" data-bs-toggle="modal"
                                data-bs-target="#editProjectModal{{ $project->id }}">
                                Modifier
                            </button> --}}
                            <a href="{{ route('admin.projects.edit', $project->id) }}" class="btn btn-sm btn-warning">
                                Modifier
                            </a>
                            <!-- Formulaire de suppression -->
                            <form action="{{ route('admin.projects.destroy', $project->id) }}" method="POST" style="display:inline-block;">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-sm btn-danger"
                                    onclick="return confirm('Voulez-vous vraiment supprimer ce projet ?')">Supprimer</button>
                            </form>
                        </td>
                    </tr>

                    <!-- Modal d'édition pour ce projet -->
                    <div class="modal fade" id="editProjectModal{{ $project->id }}" tabindex="-1"
                        aria-labelledby="editProjectModalLabel{{ $project->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
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
                                    <div class="modal-header">
                                        <h5 class="modal-title" id="editProjectModalLabel{{ $project->id }}">Modifier le
                                            projet</h5>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                            aria-label="Fermer"></button>
                                    </div>
                                    <div class="modal-body">
                                        <!-- Titre -->
                                        <div class="mb-3">
                                            <label for="title{{ $project->id }}" class="form-label">Titre</label>
                                            <input type="text" class="form-control" id="title{{ $project->id }}"
                                                name="title" value="{{ $project->title }}" required>
                                        </div>
                                        <!-- Description -->
                                        <div class="mb-3">
                                            <label for="description{{ $project->id }}"
                                                class="form-label">Description</label>
                                            <textarea class="form-control" id="description{{ $project->id }}" name="description" required>{{ $project->description }}</textarea>
                                        </div>
                                        <!-- Catégorie -->
                                        <div class="mb-3">
                                            <label for="category{{ $project->id }}" class="form-label">Catégorie</label>
                                            <input type="text" class="form-control" id="category{{ $project->id }}"
                                                name="category" value="{{ $project->category }}" required>
                                        </div>
                                        <!-- Montant recherché -->
                                        <div class="mb-3">
                                            <label for="goal_amount{{ $project->id }}" class="form-label">Montant
                                                recherché</label>
                                            <input type="number" step="0.01" class="form-control"
                                                id="goal_amount{{ $project->id }}" name="goal_amount"
                                                value="{{ $project->goal_amount }}" required>
                                        </div>
                                        <!-- Dates -->
                                        <div class="mb-3">
                                            <label for="start_date{{ $project->id }}" class="form-label">Date de
                                                début</label>
                                            <input type="date" class="form-control" id="start_date{{ $project->id }}"
                                                name="start_date" value="{{ $project->start_date->format('Y-m-d') }}"
                                                required>
                                        </div>
                                        <div class="mb-3">
                                            <label for="end_date{{ $project->id }}" class="form-label">Date de fin</label>
                                            <input type="date" class="form-control" id="end_date{{ $project->id }}"
                                                name="end_date" value="{{ $project->end_date->format('Y-m-d') }}" required>
                                        </div>
                                        <!-- Taux de retour -->
                                        <div class="mb-3">
                                            <label for="return_rate{{ $project->id }}" class="form-label">Taux de retour
                                                (%)
                                            </label>
                                            <input type="number" step="0.01" class="form-control"
                                                id="return_rate{{ $project->id }}" name="return_rate"
                                                value="{{ $project->return_rate }}" required>
                                        </div>
                                        <!-- Statut -->
                                        <div class="mb-3">
                                            <label for="status{{ $project->id }}" class="form-label">Statut</label>
                                            <select class="form-select" id="status{{ $project->id }}" name="status"
                                                required>
                                                <option value="en cours"
                                                    {{ $project->status == 'en cours' ? 'selected' : '' }}>
                                                    En cours
                                                </option>
                                                <option value="terminé"
                                                    {{ $project->status == 'terminé' ? 'selected' : '' }}>
                                                    Terminé
                                                </option>
                                                <option value="annulé"
                                                    {{ $project->status == 'annulé' ? 'selected' : '' }}>
                                                    Annulé
                                                </option>
                                            </select>
                                        </div>
                                        <!-- Image existante -->
                                        <div class="mb-3">
                                            <label for="image{{ $project->id }}" class="form-label">Image du
                                                projet</label>
                                            <input type="file" class="form-control" id="image{{ $project->id }}"
                                                name="image" accept="image/*"
                                                onchange="previewImageUpdate(event, {{ $project->id }})">

                                            @if ($project->image)
                                                <div class="mt-2">
                                                    <img id="imageUpdate{{ $project->id }}"
                                                        src="{{ asset('storage/' . $project->image) }}"
                                                        alt="Image du projet" style="max-width: 100px;">
                                                </div>
                                            @else
                                                <div class="mt-2">
                                                    <img id="imageUpdate{{ $project->id }}" src=""
                                                        alt="Aperçu de l'image" style="max-width: 100px; display: none;">
                                                </div>
                                            @endif
                                        </div>

                                    </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="cursor-pointer btn btn-secondary"
                                    data-bs-dismiss="modal">Annuler</button>
                                <button type="submit" class="cursor-pointer btn btn-success">Mettre à jour</button>
                            </div>
                        </form>
                        </div>
                    </div>
                    <!-- Fin du modal d'édition -->
                @endforeach
            </tbody>
        </table>
    </div>

    <!-- Modal de création -->
    <div class="modal fade" id="createProjectModal" tabindex="-1" aria-labelledby="createProjectModalLabel"
        aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <form action="{{ route('admin.projects.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    <div class="modal-header">
                        <h5 class="modal-title" id="createProjectModalLabel">Créer un nouveau projet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fermer"></button>
                    </div>
                    <div class="modal-body">
                        <!-- Titre -->
                        <div class="mb-3">
                            <label for="title" class="form-label">Titre</label>
                            <input type="text" class="form-control" id="title" name="title" required>
                        </div>
                        <!-- Description -->
                        <div class="mb-3">
                            <label for="description" class="form-label">Description</label>
                            <textarea class="form-control" id="description" name="description" required></textarea>
                        </div>
                        <!-- Catégorie -->
                        <div class="mb-3">
                            <label for="category" class="form-label">Catégorie</label>
                            <input type="text" class="form-control" id="category" name="category" required>
                        </div>
                        <!-- Montant recherché -->
                        <div class="mb-3">
                            <label for="goal_amount" class="form-label">Montant recherché</label>
                            <input type="number" step="0.01" class="form-control" id="goal_amount"
                                name="goal_amount" required>
                        </div>
                        <!-- Dates -->
                        <div class="mb-3">
                            <label for="start_date" class="form-label">Date de début</label>
                            <input type="date" class="form-control" id="start_date" name="start_date" required>
                        </div>
                        <div class="mb-3">
                            <label for="end_date" class="form-label">Date de fin</label>
                            <input type="date" class="form-control" id="end_date" name="end_date" required>
                        </div>
                        <!-- Taux de retour -->
                        <div class="mb-3">
                            <label for="return_rate" class="form-label">Taux de retour (%)</label>
                            <input type="number" step="0.01" class="form-control" id="return_rate"
                                name="return_rate" required>
                        </div>
                        <!-- Le statut sera par défaut "en cours" -->
                    </div>
                    <!-- ... dans le modal de création -->
                    <div class="flex flex-col items-center">
                        <label for="image" class="font-bold">Image du projet :</label>
                        <input type="file" name="image" id="image" accept="image/*"
                            onchange="previewImage(event)" class="p-2 mt-2 border rounded">

                        <div class="mt-4">
                            <img id="imagePreview" src="" alt="Aperçu de l'image"
                                class="hidden object-cover w-48 h-48 rounded-lg shadow-md">
                        </div>
                    </div>

                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
                        <button type="submit" class="btn btn-success">Créer le projet</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Fin du modal de création -->
    <script>
        // Funtion pour afficher l'aperçu lors de la création
        function previewImage(event) {
            let input = event.target;
            let reader = new FileReader();

            reader.onload = function() {
                let imagePreview = document.getElementById('imagePreview');
                imagePreview.src = reader.result;
                imagePreview.classList.remove('hidden'); // Afficher l'image
            };

            reader.readAsDataURL(input.files[0]); // Lire l'image
        }

        // Funtion pour afficher l'aperçu lors de l'édition
        function previewImageUpdate(event, projectId) {
            let input = event.target;
            let reader = new FileReader();

            reader.onload = function() {
                let imagePreview = document.getElementById('imageUpdate' + projectId);
                imagePreview.src = reader.result;
                imagePreview.style.display = 'block'; // Afficher l'image
            };

            reader.readAsDataURL(input.files[0]); // Lire l'image
        }
    </script>
@endsection
