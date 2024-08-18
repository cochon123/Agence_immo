@extends('base')
@section('title', 'new spécificité')

@section('content')

    <style>
        .centered-form {
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }
        .form-inline {
            display: flex;
            align-items: center;
        }
    </style>

    <div class="container centered-form">
        <h1 class="mb-4">Entrez le nom de la nouvelle spécificité</h1>
        <form class="form-inline" method="POST" action={{route('specificite.store')}}>
            @csrf
            <input type="text" name='titre' class="form-control me-2" value="">
            <input type="submit" class="btn btn-primary" value="créer">
        </form>
    </div>
@endsection