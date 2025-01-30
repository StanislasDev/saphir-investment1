@extends('layouts.nav')

@section('title', 'Information sur l\'utilisateur ' . $user->name)


@section('content')
<p>ID : {{ $user->id }}</p>
<p>Nom : {{ $user->name }}</p>
<p>Email : {{ $user->email }}</p>
<p>Date d'inscription : {{ $user->created_at }}</p>
<p>Rôles : {{ $user->roles->isEmpty() ? 'Investisseur' : implode(', ', $user->roles->pluck('name')->toArray()) }}</p>
@endsection