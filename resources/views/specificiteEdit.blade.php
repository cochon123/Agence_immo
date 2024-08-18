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
        <h1 class="mb-4">Entrez le nouveau nom</h1>
        <form class="form-inline" method="POST" action={{route('specificite.update', [$specificite->id])}}>
            @csrf
            @method('PUT')
            <input type="text" name='titre' class="form-control me-2" value="{{$specificite->titre}}">
            <button type="submit" class="btn btn-primary">Modifier</button>
        </form>
    </div>
@endsection

