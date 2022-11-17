@extends('layouts.dashboard')

@section('content')

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<div class="row mb-5">

    <div class="col-12">
        <a href="{{route('admin.posts.edit', $post->id)}}">EDITA</a>
    </div>
    <div class="mt-2">
        <form action="{{route('admin.posts.destroy', $post->id)}}" method="post">
          @csrf
          @method('DELETE')
          <input onclick="corfirm('Are you sure?')" type="submit" value="ELIMINA">
      </form>
      </div>
</div>

@endsection


