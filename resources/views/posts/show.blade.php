@extends('layouts.app')

@section('title', "Detalhes da notícia: {$post->title}")

@section('content')

<h1>Detalhes da notícia <b>{{ $post->title }}</b></h1>

@php
    $pathImage = url('imgs/posts/default.png');

    if ($post->image)
        $pathImage = url("img/img/{$post->image}");
@endphp
<img src="{{ $pathImage }}" alt="{{ $post->title }}" class="img-circle">

<p>{{ $post->body }}</p>

<form action="{{ route('posts.destroy', $post->id) }}" method="post">
    @csrf
    <input type="hidden" name="_method" value="DELETE">
    <button type="submit" class="btn btn-danger">Deletar a notícia: {{ $post->title }}</button>
</form>

@endsection