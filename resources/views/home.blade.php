@extends('base')

@section('title', 'Mon blog')

@section('content')
    <h1>Agence immobilière</h1></br>
    <div class="d-flex flex-nowrap">
    @foreach ($biens as $bien)

        <div class="card" style="width: 18rem;">
            <img src=
                @if($bien->photos()->first() !== null) 
                    {{$bien->photos()->first()->photourl()}}
                @endif
                 class="card-img-top" alt="...">
            <div class="card-body">
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

@endsection