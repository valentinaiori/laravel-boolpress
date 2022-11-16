@extends('layouts.dashboard')

@section('content')

<h1>{{ $post->title }}</h1>
<p>{{ $post->content }}</p>

<div class="row mb-5">
    <div class="col-12">
        <a href="{{route('admin.posts.create')}}">NUOVO</a>
    </div>
</div>

@endsection


