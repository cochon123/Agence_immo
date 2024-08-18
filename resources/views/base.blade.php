<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/css/multi-select-tag.css">
    <script src="https://cdn.jsdelivr.net/gh/habibmhamadi/multi-select-tag@3.1.0/dist/js/multi-select-tag.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <style>
      .btn-delete {
          width: 100%;
          background-color: red;
          color: white;
          border-radius: 0;
          position: absolute;
          bottom: 0;
          left: 0;
      }
      .image-container {
          position: relative;
          display: inline-block;
      }
  </style>
    <title>@yield('title')</title>
</head>
<body>

  <nav class="navbar navbar-expand-lg bg-body-tertiary">
    <div class="container-fluid">
      <a class="navbar-brand" href="/">Navbar</a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav">

          @auth
          <li class="nav-item">
            <a class="nav-link" href="{{route('create')}}">créer un nouvel article</a>
          </li>
          @endauth


          <li class="nav-item">
            <a class="nav-link" href="{{route('home')}}">acceuil</a>
          </li>

          <li class="nav-item">
            <a class="nav-link" href="{{route('biens')}}">Nos biens</a>
          </li>
          @auth
              
            <li class="nav-item">
              <a class="nav-link" href="{{route('specificite.index')}}">specificite</a>
            </li>

          @endauth
        </ul>
        <div class='navbar-nav ms-auto mb-2 mb-lg-0'>
          @auth
              {{ Auth::user()->name }}
              <form class="nav-item" action=" {{route('logout')}} " method="POST">
                @method('delete')
                @csrf
                <button class="nav-link">se déconnecter</buttton>
              </form>
          @endauth
          @guest
              <a href="{{route('login')}}">se connecter</a>
          @endguest
        </div>
      </div>
    </div>
</nav>

<div class="container">
  @if (session('success'))
    <div class="alert alert-success">
      {{ session('success') }}
    </div>
  @endif
  @yield('content')
</div>

<script>
  new MultiSelectTag('specificites')  // id
</script>
</body>
</html>