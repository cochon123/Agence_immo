@extends('base')
@section('title', 'créer un article')

@section('content')

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Présentation du Bien Immobilier</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
    <style>
        .title {
            font-size: 2.5rem;
            font-weight: bold;
        }
        .price {
            font-size: 3rem;
            color: blue;
            font-weight: bold;
        }
        .table-custom {
            margin-top: 20px;
        }
    </style>
</head>
<body>
    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6">
                <div id="carouselExample" class="carousel slide">
                    <div class="carousel-inner">
                        @foreach ($bien->photos()->get() as $photo)
                            <div class="carousel-item active">
                                <img src={{$photo->photourl()}} width="780px" height="450px" class="d-block w-100" alt="...">
                            </div>
                        @endforeach
                    </div>
                    <button class="carousel-control-prev" type="button" data-bs-target="#carouselExample" data-bs-slide="prev">
                      <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Previous</span>
                    </button>
                    <button class="carousel-control-next" type="button" data-bs-target="#carouselExample" data-bs-slide="next">
                      <span class="carousel-control-next-icon" aria-hidden="true"></span>
                      <span class="visually-hidden">Next</span>
                    </button>
                  </div>
            </div>
            <div class="col-md-6">
                <h1 class="title text-warning">{{$bien->titre}}</h1>
                <p><strong>Nombre de pièces :</strong> {{$bien->nb_pieces}}</p>
                <p><strong>Surface :</strong> {{$bien->surface}} m²</p>
                <p class="price">{{$bien->prix}} $</p>
                <table class="table table-bordered table-custom">
                    <tbody>
                        <tr>
                            <td><strong>Nombre de chambres</strong></td>
                            <td>{{$bien->nb_chambres}}</td>
                        </tr>
                        <tr>
                            <td><strong>Nombre d'étages</strong></td>
                            <td>{{$bien->nb_étages}}</td>
                        </tr>
                        <tr>
                            <td><strong>Chauffage</strong></td>
                            <td>
                                @if ($bien->chauffage == 0)
                                    Non
                                @else
                                    Oui
                                @endif
                            </td>
                        </tr>
                        <tr>
                            <td><strong>Adresse</strong></td>
                            <td>{{$bien->adresse}}</td>
                        </tr>
                        <tr>
                            <td><strong>Ville</strong></td>
                            <td>{{$bien->ville}}</td>
                        </tr>
                        <tr>
                            <td><strong>Code Postal</strong></td>
                            <td>{{$bien->code_postal}}</td>
                        </tr>
                    </tbody>
                </table>
                    <br>
                    <h3><strong>Description</strong></h3><br>
                    {{$bien->description}}
            </div>
            <div class="col-md-6 mt-5">
                <h2 class="text-warning">Contactez-nous</h2>
                <form>
                    <div class="form-group">
                        <label for="nom">Nom</label>
                        <input type="text" class="form-control" id="nom" placeholder="Votre nom">
                    </div>
                    <div class="form-group">
                        <label for="prenom">Prénom</label>
                        <input type="text" class="form-control" id="prenom" placeholder="Votre prénom">
                    </div>
                    <div class="form-group">
                        <label for="tel">Téléphone</label>
                        <input type="tel" class="form-control" id="tel" placeholder="Votre téléphone">
                    </div>
                    <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" id="email" placeholder="Votre email">
                    </div>
                    <div class="form-group">
                        <label for="message">Message</label>
                        <textarea class="form-control" id="message" rows="3" placeholder="Votre message"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary">Nous contacter</button>
                </form>
            </div>

            <div class="col-md-6 mt-5">
                <h2 class="mb-4 text-warning">spécificités</h2>
                <table class="table table-bordered">
                    <tbody>
                        @foreach ($bien->specificites()->get() as $item)
                            <tr>
                                <td>{{$item->titre}}</td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection

