@extends('base')

@section('title', 'Mon blog')

@section('content')
    <h1>Agence immobilière</h1></br>

    <div class="d-flex flex-nowrap">
        <form method="POST" action="{{ route('select_biens')}}">
            @csrf
            <input type='number' name='surface_min' placeholder="Surface minimum" value= {{old('surface_min')}} >
            <input type='number' name='nb_pieces_min' placeholder="Nombre de pièces minimum" value= {{@old('nb_pieces_min')}} >
            <input type='number' name='budget_max' placeholder="Budget maximum" value= {{old('budget_max')}} >
            <input type="text" name='mot_clef' placeholder="utiliser un mot clef" value= {{old('mot_clef')}}>
            <input type='submit' value='rechercher'>
        </form>
    </div>
    <br>

    <div class="container">
    <div class="grid-container d-flex flex-nowrap" >
    @php $i=0 ; @endphp
    @foreach ($biens as $bien)
        @php $i++ ; @endphp
        @if ($i%4 == 0) <div class="row"> @endif
        <div class="card grid-item" style="width: 18rem;">
            <img src=
                @if($bien->photos()->first() !== null) 
                    {{$bien->photos()->first()->photourl()}}
                @endif
                width="200px" height="200px"
                 class="card-img-top" alt="...">
            <div class="card-body" >
            <h5 class="card-title">{{ $bien->titre }}</h5><br>
            {{$bien -> prix}} - {{ $bien -> ville}} ( {{$bien -> code_postal}} )
            <p class="card-text" class="col-sm-30 text-truncate">
                <div class="col-sm-30 text-truncate">{{$bien -> description}}</div>
            </p>
            <a href={{ $bien->slug.'-' }}  class="btn btn-primary">En savoir plus</a><br>
            @auth
                <a href={{ "admin/edit/".$bien->slug }}  class="btn btn-primary">Editer</a><br>
                <a href={{ "admin/delete/".$bien->slug }}  class="btn btn-danger">Supprimer</a>
            @endauth
            </div>
        </div>
        @if ($i%4 == 0)   </div> @endif
    @endforeach
    </div>
    </div>
    
    {{ $biens -> links()}}
@endsection