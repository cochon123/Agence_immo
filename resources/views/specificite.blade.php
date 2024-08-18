@extends('base')
@section('title', 'spécificité')

@section('content')
<div class="container mt-5">
    <div class="d-flex justify-content-between align-items-center mb-3">
        <h1>Les spécificités</h1>
        <a href="{{ route('specificite.create') }}"><button class="btn btn-primary">Ajouter une spécificité</button></a>
    </div>
    <table class="table table-striped table-borderless">
        <thead>
            <tr>
                <th class="text-start">Nom</th>
                <th class="text-end">Option</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($specificite as $item)
                <tr class="flex-nowrap">
                    <td class="text-start">{{ $item->titre }}</td>
                    <td class="text-end">
                        <div class="d-flex">
                            <a href="{{ route('specificite.edit', [$item->id]) }}">
                                <button class="btn btn-warning btn-sm me-2">Éditer</button>
                            </a>
                            <form method="POST" action="{{ route('specificite.destroy', [$item->id]) }}">
                                @csrf
                                @method('DELETE')
                                <input type="submit" class="btn btn-danger btn-sm" value="Supprimer">
                            </form>
                        </div>
                    </td>
                </tr>
            @endforeach  
        </tbody>
    </table>
</div>
@endsection