<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>

<body class="flex flex-col items-center min-h-screen text-white bg-gradient-to-b from-gray-900 to-gray-800">

    @yield('content')

    <!-- Navigation en bas de page -->
    <nav class="fixed bottom-0 w-full max-w-md p-4 mx-auto bg-gray-900 rounded-t-lg shadow-lg">
        <div class="flex justify-around">
            <a href="#" class="flex flex-col items-center text-white hover:text-blue-400">
                🏠 <span>Accueil</span>
            </a>
            <a href="#" class="flex flex-col items-center text-white hover:text-blue-400">
                📈 <span>Produits</span>
            </a>
            <a href="#" class="flex flex-col items-center text-white hover:text-blue-400">
                💰 <span>Portefeuille</span>
            </a>
            <a href="#" class="flex flex-col items-center text-white hover:text-blue-400">
                ⚙️ <span>Compte</span>
            </a>
        </div>
    </nav>

</body>

</html>