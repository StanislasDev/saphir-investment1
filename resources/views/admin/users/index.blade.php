@extends('layouts.nav')

@section('title', 'Liste des utilisateurs')

@section('content')
    <div class="container mx-auto px-4">
        <h1 class="text-xl font-bold mb-4">Liste des Utilisateurs</h1>
        <table class="min-w-full bg-white border border-gray-200">
            <thead>
                <tr class="bg-gray-100 text-gray-600 uppercase text-sm">
                    <th class="py-2 px-4 border-b">ID</th>
                    <th class="py-2 px-4 border-b">Nom</th>
                    <th class="py-2 px-4 border-b">Email</th>
                    <th class="py-2 px-4 border-b">Rôle</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr class="hover:bg-gray-100">
                        <td class="py-2 px-4 border-b">{{ $user->id }}</td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('admin.user.show', $user->id) }}" class="hover:underline hover:text-blue-500">{{ $user->name }}</a></td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('admin.user.show', $user->id) }}" class="hover:underline hover:text-blue-500">{{ $user->email }}</a></td>
                        <td class="py-2 px-4 border-b"><a href="{{ route('admin.user.show', $user->id) }}" class="hover:underline hover:text-blue-500">{{ $user->roles->isEmpty() ? 'Investisseur' : implode(', ', $user->roles->pluck('name')->toArray()) }}</a></td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <!-- Liens de pagination -->
        <div class="mt-4">
            {{ $users->links() }} <!-- Génère les liens de pagination -->
        </div>
    </div>

    <a href="{{ route('admin.dashboard') }}"
        class="inline-block mb-4 bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600">
        Retour
    </a>
@endsection
