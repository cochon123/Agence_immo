@extends('base')

@section('content')
    <h1>Se Connecter</h1>
    <form action="{{ route('login') }}" method = "POST">
        @csrf

        <div class="mb-3">
          <label for="email" class="form-label">email</label>
          <input type="email" class="form-control" name="email" value='{{ old( 'email') }}'>
        </div>
        @error('email')
            {{$message}}
        @enderror

        <div class="mb-3">
          <label for="password" class="form-label">Mot de passe</label>
          <input type="password" class="form-control" name="password">
        </div>
        @error('password')
            {{$message}}
        @enderror

        <button type="submit" class="btn btn-primary">se Connecter</button>
    </form>

@endsection