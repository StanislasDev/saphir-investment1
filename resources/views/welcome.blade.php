@extends('layouts.user-template')

@section('title', 'Accueil')

@section('content')
    <!-- Header -->
    <header class="w-full p-4 text-center">
        <h1 class="text-2xl font-bold">Saphir Investment</h1>
        <div class="mt-4">
            @if (Route::has('login'))
                <div>
                    @auth
                        @if (Auth::user()->hasRole('admin'))
                            <a href="{{ url('/dashboard') }}"
                                class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500">Dashboard</a>
                        @endif
                    @else
                        <a href="{{ route('login') }}" class="px-4 py-2 bg-blue-600 rounded-lg hover:bg-blue-500">Connexion</a>
                        @if (Route::has('register'))
                            <a href="{{ route('register') }}"
                                class="px-4 py-2 ml-2 bg-green-600 rounded-lg hover:bg-green-500">Inscription</a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <!-- Contenu principal -->
    <main class="flex flex-col w-full max-w-md mx-auto space-y-6">

        <!-- Portefeuille -->
        <section class="p-6 bg-gray-800 rounded-lg shadow-lg">
            <h2 class="mb-2 text-xl font-semibold">Portefeuille actuel</h2>
            <p class="text-3xl font-bold text-green-400">0.00 CFA</p>
            <p class="text-gray-300">Solde disponible</p>
            <div class="flex mt-4 space-x-4">
                <button class="flex-1 py-2 bg-blue-600 rounded-lg hover:bg-blue-500">Recharger</button>
                <button class="flex-1 py-2 bg-red-600 rounded-lg hover:bg-red-500">Retirer</button>
            </div>
        </section>

        <!-- Recommandations -->
        <section>
            <div class="flex items-center justify-between">
                <h2 class="text-xl font-semibold">Investissements recommandés</h2>
                <a href="#" class="text-purple-400 hover:text-purple-300">Voir plus</a>
            </div>
            <div class="grid grid-cols-2 gap-4 mt-3">
                @foreach ($projects as $project)
                    <div class="p-4 text-center bg-gray-700 rounded-lg">
                        <img src="{{ asset('storage/' . $project->image) }}" alt="{{ $project->title }}"
                            class="object-cover w-full h-32 rounded-lg">
                        <h3 class="text-lg font-semibold text-white">{{ $project->title }}</h3>
                        <p class="text-gray-300">{{ number_format($project->goal_amount, 0, ',', '.') }} CFA</p>
                        <hr class="my-2 border-gray-600">
                        <a href="{{ route('invest.show', $project->id) }}"
                            class="bg-blue-500 text-white p-2 rounded-lg w-full block text-center">
                            Investir
                        </a>
                    </div>
                @endforeach
            </div>
        </section>

        <!-- Publicité -->
        <section class="p-4 text-center bg-blue-700 rounded-lg">
            <p>Découvrez les meilleures opportunités d’investissement !</p>
        </section>

    </main>
@endsection
