@extends('layouts.nav')

@section('title', 'Information sur l\'utilisateur ' . $user->name)

@section('content')
<div class="max-w-2xl px-4 py-10 mx-auto bg-gray-500 rounded-lg shadow-md">
    <h1 class="mb-4 text-2xl font-bold">Informations sur l'utilisateur</h1>

    <div class="p-6 mb-4 bg-gray-200 rounded-lg shadow-md">
        <p class="mb-2"><strong>ID :</strong> {{ $user->id }}</p>
        <p class="mb-2"><strong>Nom :</strong> {{ $user->name }}</p>
        <p class="mb-2"><strong>Email :</strong> {{ $user->email }}</p>
        <p class="mb-2"><strong>Date d'inscription :</strong> {{ $user->created_at }}</p>
        <p class="mb-2"><strong>Rôles :</strong> {{ $user->roles->isEmpty() ? 'Investisseur' : implode(', ', $user->roles->pluck('name')->toArray()) }}</p>
    </div>

    <form action="{{ route('admin.user.delete', $user->id) }}" method="POST" onsubmit="return confirm('Êtes-vous sûr de vouloir supprimer cet utilisateur ?');">
        @csrf
        @method('DELETE')
        <button type="submit" class="px-4 py-2 font-bold text-white bg-red-500 rounded w-50 hover:bg-red-700">
            Supprimer l'utilisateur
        </button>
    </form>
</div>
@endsection