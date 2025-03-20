@extends('layouts.nav')

@section('title', 'Tableau de bord Admin:investments.show')

@section('content')
    <div class="container">
        <h2 class="text-white text-2xl mb-4">Gestion des investissements</h2>

        @foreach ($investments as $investment)
            <div class="bg-gray-700 p-4 rounded-lg mb-4">
                <p class="text-white">Utilisateur : {{ $investment->user->name }}</p>
                <p class="text-gray-300">Projet : {{ $investment->project->name }}</p>
                <p class="text-green-400">Montant : {{ number_format($investment->amount, 0, ',', '.') }} CFA</p>
                <p class="text-yellow-400">Statut : {{ $investment->status }}</p>

                <form method="POST" action="{{ route('admin.investment.update', $investment->id) }}">
                    @csrf
                    <select name="status" class="rounded-lg p-2">
                        <option value="pending" {{ $investment->status === 'pending' ? 'selected' : '' }}>En attente
                        </option>
                        <option value="active" {{ $investment->status === 'active' ? 'selected' : '' }}>Actif</option>
                        <option value="refunded" {{ $investment->status === 'refunded' ? 'selected' : '' }}>Remboursé
                        </option>
                    </select>
                    <button type="submit" class="bg-green-500 text-white p-2 rounded-lg">Mettre à jour</button>
                </form>
            </div>
        @endforeach

    </div>
@endsection
