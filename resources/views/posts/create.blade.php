@extends('layouts.app')

@section('title', 'Cadastrar Nova Notícia')

@section('content')

<h1>Cadastrar Notícia</h1>

<form action="{{ route('posts.store') }}" method="post" enctype="multipart/form-data">
    @include('posts._partials.form')
</form>

@endsection