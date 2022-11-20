@extends('layouts.dashboard')

@section('content')

    @if ($errors->any())
        <div class="row">
            <div class="col-12 bg-danger">
                Ci sono errori...
            </div>
        </div>
    @endif



<form METHOD="POST" action="{{ route('admin.posts.store')}}">
    @csrf
    <div @error('title') class="is-invalid" @enderror>
        <label for="title">Titolo:</label>
        <input type="text" required minlength="5" maxlength="255" name="title" value="{{old('title', '')}}">
        @error('title')
                <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>


<!--categories -->
<div>
    <label for="category_id">Categoria:</label>
    <select name="category_id">
        <option value="">Nessuna</option>
        @foreach ($categories as $category )
        <option value="{{$category->id}}"
        {{$category->id == old('$category_id', -1) ? 'selected' : ''}}>
        {{$category->name}}</option>
        @endforeach
    </select>
</div>

<!-- /categories -->

<!--tags -->

<div>
    <label>Tags:</label>
    @foreach ($tags as $tag)
        <label>{{$tag->name}}</label>
        <input type="checkbox" name="tags[]" value="{{$tag->id}}">

    @endforeach
</div>

<!--/tags -->


    <div @error('content') class="is-invalid" @enderror>
        <label for="content">Contenuto:</label>
        <textarea name="content" required cols="30" rows="10">{{old('content', '')}}</textarea>
        @error('content')
                <div class="text-danger">{{ $message }}</div>
        @enderror
    </div>
    <div>
        <input type="submit" value="CREA!">
    </div>
</form>
@endsection
