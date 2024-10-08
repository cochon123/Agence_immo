<div class="w-75 p-3 align-self-center">
    <form {{-- action="4" --}} method="POST" enctype="multipart/form-data">
        @csrf

    <div class="form-check form-switch">
        <input class="form-check-input" name="chauffage" type="checkbox" role="switch" id="flexSwitchCheckDefault" @checked($bien ->chauffage == 1)>
        <label class="form-check-label" for="flexSwitchCheckDefault">chauffage</label>
        @error('chauffage')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="vendu" role="switch" id="flexSwitchCheckDefault" @checked($bien ->vendu == 1)>
        <label class="form-check-label" for="flexSwitchCheckDefault">vendu</label>
        @error('vendu')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <div class="mb-3">
        <label for="titre" class="form-label">titre du bien</label>
        <input type="text" class="form-control" name="titre" value='{{ old( 'titre', $bien ->titre) }}'>
        @error('titre')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="adresse" class="form-label">adresse du bien</label>
        <input type="text" class="form-control" name="adresse" value='{{ old( 'adresse', $bien ->adresse) }}'>
        @error('adresse')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="ville" class="form-label">ville du bien</label>
        <input type="text" class="form-control" name="ville" value='{{ old( 'ville', $bien ->ville) }}'>
        @error('ville')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
    
    <div class="mb-3">
        <label for="description" class="form-label">description du bien</label>
        <Textarea name='description' class="form-control" >{{ old( 'titre', $bien ->description) }}</Textarea>
        @error('description')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
      
      <div class="mb-3">
          <label for="nb_pieces" class="form-label">nombre de pieces du bien</label>
          <input type="number" class="form-control" name="nb_pieces" value='{{ old( 'nb_pieces', $bien ->nb_pieces) }}'>
        @error('nb_pieces')
            <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>
      
      <div class="mb-3">
          <label for="prix" class="form-label">prix du bien</label>
          <input type="number" class="form-control" name="prix" value='{{ old( 'prix', $bien ->prix) }}'>
        @error('prix')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="mb-3">
          <label for="nb_chambres" class="form-label">nombre de chambres du bien</label>
          <input type="number" class="form-control" name="nb_chambres" value='{{ old( 'nb_chambres', $bien ->nb_chambres) }}'>
        @error('nb_chambres')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="mb-3">
          <label for="nb_étages" class="form-label">nombre de étages du bien</label>
          <input type="number" class="form-control" name="nb_étages" value='{{ old( 'nb_étages', $bien ->nb_étages) }}'>
        @error('nb_étages')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="mb-3">
          <label for="code_postal" class="form-label">code postal du bien</label>
          <input type="number" class="form-control" name="code_postal" value='{{ old( 'code_postal', $bien ->code_postal) }}'>
        @error('code_postal')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>
      
      <div class="mb-3">
          <label for="surface" class="form-label">surface du bien</label>
          <input type="number" class="form-control" name="surface" value='{{ old( 'surface', $bien ->surface) }}'>
        @error('surface')
            <span class="text-danger">{{ $message }}</span>
        @enderror
      </div>

    @if (!$bien->id)
        <div class="mb-3">
          <label class="form-label" for="input-file">Select Files:</label>
          @csrf
          <input 
              type="file" 
              name="photos[]" 
              id="input-file"
              multiple 
              class="form-control @error('photos') is-invalid @enderror">
              <input type="hidden" name="id" value="{{$bien->id}}">
          @error('photos')
              <span class="text-danger">{{ $message }}</span>
          @enderror
        </div>
    @endif

    <div class="mb-3">
        <label for="surface" class="form-label">spécificités du bien</label>
        <select id="specificites" name="specificites[]" data-placeholder="Selectionner des spécificités" multiple data-multi-select>
            @foreach ($specificites as $item)
                <option value="{{$item->id}}" @selected($bien->specificites()->pluck('id')->contains($item->id))>{{$item->titre}}</option>
            @endforeach
        </select>
        @error('specificites')
        <span class="text-danger">{{ $message }}</span>
        @enderror
    </div>

    <input type="submit" class="btn btn-primary" value="@if ($bien->id) Modifier @else créer @endif">
</form>


{{--         <div class="mb-3">
          <label for="category" class="form-label">Catégorie</label>
          <select name='category_id' class="form-control" id='category_id'>
            <option value="0">Sélectionner une categorie</option>
            @foreach ($Categories as $category)
                <option @selected(old('category_id', $post->category_id) == $category-> id) value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
          </select>
        </div>
        @error('category_id')
            {{$message}}
        @enderror
        </br>
        @php
            $tagsIds = $post->tags()->pluck('id');
        @endphp
        <div class="mb-3">
            <label for="tag" class="form-label">Catégorie</label>
            <select name='tags[]' class="form-control" id='tag' multiple>
              @foreach ($tags as $tag)
                  <option @selected($tagsIds->contains($tag->id)) value="{{$tag->id}}">{{$tag->name}}</option>
              @endforeach
            </select>
        </div>
        @error('tags')
            {{$message}}
        @enderror
        </br>

        <div class="mb-3">
          <label for="image" class="form-label">Photo de l'article</label>
          <input type="file" class="form-control" name="image" >
        </div>
        @error('image')
            {{$message}}
        @enderror --}}

@foreach ($bien->photos()->get() as $photo)
    <form action="{{ route('delete_photo') }}" method="POST" enctype="multipart/form-data">
        <div class="container mt-5">
            <div class="image-container">
                @csrf
                <img width="400" src="{{$photo->photourl()}}" class="img-fluid" alt="Image">
                <input type="hidden" name="photourl" value="{{$photo->photourl()}}">
                <input type="hidden" name="liens" value="{{$photo->liens}}">
                <input type="submit" class="btn btn-delete" value="Supprimer">
            </div>
        </div>
    </form>
@endforeach

@if ($bien->id)
<form action="{{ route('add_photo') }}" method="POST" enctype="multipart/form-data">

    <div class="mb-3">
    <label class="form-label" for="input-file">Select Files:</label>
    @csrf
    <input 
        type="file" 
        name="photos[]" 
        id="input-file"
        multiple 
        class="form-control @error('photos') is-invalid @enderror">
        <input type="hidden" name="id" value="{{$bien->id}}">
        <input type="submit" class="btn btn-primary" value="Ajouter">
    @error('photos')
        <span class="text-danger">{{ $message }}</span>
    @enderror
</form>
@endif

</div>
</div>