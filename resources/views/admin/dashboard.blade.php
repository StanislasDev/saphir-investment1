@extends('layouts.nav')

@section('title', 'Tableau de bord Admin')


@section('content')
    {{-- <!-- Bouton pour ouvrir la modal -->
    <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">
        Ouvrir la modal
    </button>

    <!-- Modal -->
    <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Titre de la Modal</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <div class="container">
                        <h1 class="mb-4">Créer un nouveau projet</h1>
                    
                        @if ($errors->any())
                            <div class="alert alert-danger">
                                <ul>
                                    @foreach ($errors->all() as $error)
                                        <li>{{ $error }}</li>
                                    @endforeach
                                </ul>
                            </div>
                        @endif
                    
                        <form action="{{ route('admin.projects.store') }}" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label for="title" class="form-label">Titre</label>
                                <input type="text" class="form-control" id="title" name="title" value="{{ old('title') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="description" class="form-label">Description</label>
                                <textarea class="form-control" id="description" name="description">{{ old('description') }}</textarea>
                            </div>
                            <div class="mb-3">
                                <label for="goal_amount" class="form-label">Montant recherché</label>
                                <input type="number" step="0.01" class="form-control" id="goal_amount" name="goal_amount" value="{{ old('goal_amount') }}" required>
                            </div>
                            <div class="mb-3">
                                <label for="start_date" class="form-label">Date de début</label>
                                <input type="date" class="form-control" id="start_date" name="start_date" value="{{ old('start_date') }}">
                            </div>
                            <div class="mb-3">
                                <label for="end_date" class="form-label">Date de fin</label>
                                <input type="date" class="form-control" id="end_date" name="end_date" value="{{ old('end_date') }}">
                            </div>
                            <button type="submit" class="btn btn-success">Créer le projet</button>
                        </form>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fermer</button>
                    <button type="submit" class="btn btn-primary">Créer le projet</button>
                </div>
            </div>
        </div>
    </div> --}}
    <div class="mt-3 mb-3 row g-4">
        <div class="col-6 col-lg-3">
            <div class="shadow-sm app-card app-card-stat h-100">
                <div class="p-3 app-card-body p-lg-4">
                    <h4 class="mb-1 stats-type">Total Sales</h4>
                    <div class="stats-figure">$12,628</div>
                    <div class="stats-meta text-success">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-up" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 15a.5.5 0 0 0 .5-.5V2.707l3.146 3.147a.5.5 0 0 0 .708-.708l-4-4a.5.5 0 0 0-.708 0l-4 4a.5.5 0 1 0 .708.708L7.5 2.707V14.5a.5.5 0 0 0 .5.5z"/>
</svg> 20%</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        
        <div class="col-6 col-lg-3">
            <div class="shadow-sm app-card app-card-stat h-100">
                <div class="p-3 app-card-body p-lg-4">
                    <h4 class="mb-1 stats-type">Expenses</h4>
                    <div class="stats-figure">$2,250</div>
                    <div class="stats-meta text-success">
                        <svg width="1em" height="1em" viewBox="0 0 16 16" class="bi bi-arrow-down" fill="currentColor" xmlns="http://www.w3.org/2000/svg">
<path fill-rule="evenodd" d="M8 1a.5.5 0 0 1 .5.5v11.793l3.146-3.147a.5.5 0 0 1 .708.708l-4 4a.5.5 0 0 1-.708 0l-4-4a.5.5 0 0 1 .708-.708L7.5 13.293V1.5A.5.5 0 0 1 8 1z"/>
</svg> 5% </div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="#"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="col-6 col-lg-3">
            <div class="shadow-sm app-card app-card-stat h-100">
                <div class="p-3 app-card-body p-lg-4">
                    <h4 class="mb-1 stats-type">Nombre de projects</h4>
                    <div class="stats-figure">{{ $projectsCount }}</div>
                    <div class="stats-meta">
                        Open</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('admin.projects.index') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
        <div class="col-6 col-lg-3">
            <div class="shadow-sm app-card app-card-stat h-100">
                <div class="p-3 app-card-body p-lg-4">
                    <h4 class="mb-1 stats-type">Nombre d'utilisateurs</h4>
                    <div class="stats-figure">{{ $userCount }}</div>
                    <div class="stats-meta">New</div>
                </div><!--//app-card-body-->
                <a class="app-card-link-mask" href="{{ route('admin.users') }}"></a>
            </div><!--//app-card-->
        </div><!--//col-->
    </div><!--//row-->
@endsection
