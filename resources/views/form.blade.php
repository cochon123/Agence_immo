<div class="w-75 p-3 align-self-center">
    <form action="" method="post" enctype="multipart/form-data">
        @csrf

        @php
        $champs_nombre = ['nb_pieces','prix','nb_chambres','nb_étages','code_postal','surface'];

        $champs_string = ['titre','adresse','ville'];
    @endphp

    <div class="form-check form-switch">
        <input class="form-check-input" name="chauffage" type="checkbox" role="switch" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">chauffage</label>
    </div>

    <div class="form-check form-switch">
        <input class="form-check-input" type="checkbox" name="vendu" role="switch" id="flexSwitchCheckDefault">
        <label class="form-check-label" for="flexSwitchCheckDefault">vendu</label>
    </div>

    @foreach ($champs_string as $champ)

    <div class="mb-3">
        <label for="{{$champ}}" class="form-label">{{$champ}} du bien</label>
        <input type="text" class="form-control" name="{{$champ}}" value='lala'>
    </div>
    @error('{{$champ}}')
        {{$message}}
    @enderror

    @endforeach

    <div class="mb-3">
        <label for="description" class="form-label">description du bien</label>
        <Textarea name='description' class="form-control" >{{ old('content',$bien->description) }}
        </Textarea>
      </div>
      @error('content')
          {{$message}}
      @enderror

    @foreach ($champs_nombre as $champ)

      <div class="mb-3">
          <label for="{{$champ}}" class="form-label">{{$champ}} du bien</label>
          <input type="number" class="form-control" name="{{ $champ }}" value='42'>
      </div>
      @error('{{$champ}}')
          {{$message}}
      @enderror

    @endforeach




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

        <button type="submit" class="btn btn-primary">
            @if ($bien->id)
                Modifier
            @else
                créer
            @endif
        </button>
    </form>
</div>