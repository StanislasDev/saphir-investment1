@extends('layouts.nav')

@section('title', 'Tableau de bord Admin:Investissements')


@section('content')
    <div class="container">
        <h2 class="text-xl font-bold mb-3">Liste des Investissements</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Utilisateur</th>
                    <th>Projet</th>
                    <th>Montant</th>
                    <th>Date</th>
                    <th>Statut</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($investments as $investment)
                    <tr>
                        <td>{{ $investment->id }}</td>
                        <td>{{ $investment->user->name }}</td>
                        <td>{{ $investment->project->title }}</td>
                        <td>{{ $investment->amount }} FCFA</td>
                        <td>{{ $investment->investment_date }}</td>
                        <td>{{ ucfirst($investment->status) }}</td>
                        <td>
                            <form action="{{ route('investments.update', $investment->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <select name="status" onchange="this.form.submit()">
                                    <option value="actif" {{ $investment->status == 'actif' ? 'selected' : '' }}>Actif</option>
                                    <option value="remboursé" {{ $investment->status == 'remboursé' ? 'selected' : '' }}>Remboursé</option>
                                </select>
                            </form>
                            <form action="{{ route('investments.destroy', $investment->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" onclick="return confirm('Confirmer la suppression ?')" class="btn btn-danger btn-sm">Supprimer</button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
    </div>
@endsection
