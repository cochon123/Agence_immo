@extends('base')

@section('title', 'Mon blog')

@section('content')
    <h1>Agence immobilière</h1></br>

    <div class="d-flex flex-nowrap">
        <form method="POST" action="{{ route ('biens')}}">
            <input type='number' name='surface_min' placeholder="Surface minimum">
            <input type='number' name='nb_pieces_min' placeholder="Nombre de pièces minimum">
            <input type='number' name='budget_max' placeholder="Budget maximum">
            <input type="text" name='mot_clef' placeholder="utiliser un mot clef">
            <input type='submit' value='rechercher'>
        </form>
    </div>
    <br>

    <div class="container">
    <div class="grid-container d-flex flex-nowrap" style="grid-container {grid-template-columns: auto auto auto auto; display:grid;}">
    @foreach ($biens as $bien)

        <div class="card grid-item" style="width: 18rem;">
            <img src=
                @if($bien->photos()->first() !== null) 
                    {{$bien->photos()->first()->photourl()}}
                @endif
                 class="card-img-top" alt="...">
            <div class="card-body" >
            <h5 class="card-title">{{ $bien->titre }}</h5><br>
            {{$bien -> prix}} - {{ $bien -> ville}} ( {{$bien -> code_postal}} )
            <p class="card-text" class="col-sm-30 text-truncate">
                <div class="col-sm-30 text-truncate">{{$bien -> description}}</div>
            </p>
            <a href={{ $bien->slug.'-' }}  class="btn btn-primary">En savoir plus</a>
            </div>
        </div>

    @endforeach
    </div>
    </div>
    
    {{ $biens -> links()}}
@endsection