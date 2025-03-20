@extends('layouts.user-template')

@section('title', 'Investir')

@section('content')
<div class="flex flex-col items-center justify-center w-full p-4 text-center min-h-screen">

    <h2 class="text-white text-2xl mb-6">Investir sur le projet : <b>{{ $project->title }}</b></h2>

    <!-- Affichage du solde utilisateur -->
    <p class="text-green-400 mb-4">💰 Solde actuel : 5000<b>{{-- number_format($userBalance, 0, ',', '.') --}} CFA</b></p>

    <!-- Progression du financement -->
    <div class="w-full max-w-md mb-6">
        <div class="w-full bg-gray-700 rounded-full h-3">
            <div class="bg-green-500 h-3 rounded-full" style="width: {{-- $project->investment_progress --}}%;"></div>
        </div>
        <p class="text-gray-300 mt-2">{{-- $project->investment_progress --}}% financé</p>
    </div>

    <form method="POST" action="{{ route('invest.store') }}" class="bg-gray-800 p-6 rounded-lg">
        @csrf
        <input type="hidden" name="project_id" value="{{ $project->id }}">

        <label class="text-white mb-2">Montant à investir (en CFA)</label>
        <input type="number" name="amount" class="w-full p-2 mb-4 rounded-lg bg-gray-500" placeholder="Ex : 50000" required>

        <button type="submit" class="w-full bg-green-500 p-2 rounded-lg text-white hover:bg-green-600">
            Investir maintenant
        </button>
    </form>
</div>
@endsection