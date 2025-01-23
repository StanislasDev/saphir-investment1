<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Saphir Investment - Accueil</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.19/dist/tailwind.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #1a1a2e;
            /* Couleur de fond sombre */
            min-height:100vh;
            /* Assure que le corps prend toute la hateur e l'écran */
            display:flex;
            flex-direction: column;
        }
        main{
            flex: 1;
            /* Permet au contenu principal de prendre tout l'espace dispo */
        }
    </style>
</head>

<body class="flex flex-col items-center">

    <main class="w-full">
        <!-- En-tête -->
    <header class="w-full text-center p-4">
        <h1 class="text-white text-2xl font-bold mb-5">Saphir Investment</h1>
        <div class="relative sm:flex sm:justify-center sm:items-center bg-dots-darker bg-center bg-gray-100 dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
            @if (Route::has('login'))
                <div class="sm:fixed p-6 text-right">
                    @auth
                        @if (Auth::user()->hasRole('admin')) <!-- Vérifiez si l'utilisateur a le rôle d'admin -->
                            <a
                                href="{{ url('/dashboard') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Dashboard
                            </a>
                        @endif
                    @else
                        <a
                            href="{{ route('login') }}"
                            class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                        >
                            Log in
                        </a>
        
                        @if (Route::has('register'))
                            <a
                                href="{{ route('register') }}"
                                class="rounded-md px-3 py-2 text-black ring-1 ring-transparent transition hover:text-black/70 focus:outline-none focus-visible:ring-[#FF2D20]"
                            >
                                Register
                            </a>
                        @endif
                    @endauth
                </div>
            @endif
        </div>
    </header>

    <!-- Portefeuille -->
    <section class="w-full max-w-md mx-auto bg-gray-800 rounded-lg p-6 my-4">
        <h2 class="text-white text-xl mb-2">Portefeuille actuel</h2>
        <p class="text-green-400 text-3xl">0.00 CFA</p>
        <p class="text-gray-300 mb-4">Portefeuille Recharge</p>
        <div class="flex space-x-4">
            <button class="flex-1 bg-blue-600 text-white rounded-lg py-2 hover:bg-blue-500 transition">Recharge</button>
            <button
                class="flex-1 bg-purple-600 text-white rounded-lg py-2 hover:bg-purple-500 transition">Retrait</button>
        </div>
    </section>

    <!-- Recommandations -->
    <section class="w-full max-w-md mx-auto">
        <div class="flex justify-between">
            <h2 class="text-white text-xl mb-2">Recommandé</h2> 
            <a class="text-purple-600" href="">Voir</a>
        </div>
        <div class="grid grid-cols-2 gap-4">
            <!-- Exemple d'une carte recommandée -->
            <div class="bg-gray-700 rounded-lg p-4">
                <h3 class="text-white">B - 5</h3>
                <p class="text-gray-300">548.000 CFA</p>
            </div>
            <div class="bg-gray-700 rounded-lg p-4">
                <h3 class="text-white">B - 3</h3>
                <p class="text-gray-300">324.000 CFA</p>
            </div>
            <div class="bg-gray-700 rounded-lg p-4">
                <h3 class="text-white">B - 1</h3>
                <p class="text-gray-300">210.000 CFA</p>
            </div>
            <div class="bg-gray-700 rounded-lg p-4">
                <h3 class="text-white">B - 2</h3>
                <p class="text-gray-300">120.000 CFA</p>
            </div>
        </div>
    </section>

    <!-- Publicité -->
    <section class="w-full max-w-md mx-auto mt-4">
        <div class="bg-blue-800 rounded-lg p-4 text-center">
            <p class="text-white">Visitez l'espace d'investissement!</p>
        </div>
    </section>
    </main>
    
    <!-- Navigation de bas de la page -->
</main>

<!-- Navigation en bas de page -->
<nav class="w-full max-w-md mx-auto rounded-lg fixed bottom-0 bg-gray-800 p-4">
    <div class="flex justify-around">
        <a href="" class="text-white hover:text-blue-400 transition {{ request()->is('/') ? 'font-bold text-green-800' : '' }}">Accueil</a>
        <a href="" class="text-white hover:text-blue-400 transition {{ request()->is('produits') ? 'font-bold text-green-800' : '' }}">Produits</a>
        <a href="" class="text-white hover:text-blue-400 transition {{ request()->is('portefeuille') ? 'font-bold text-green-800' : '' }}">Portefeuille</a>
        <a href="" class="text-white hover:text-blue-400 transition {{ request()->is('compte') ? 'font-bold text-green-800' : '' }}">Compte</a>
    </div>
</nav>

</body>                        
</html>
