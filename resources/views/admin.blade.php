@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Menu</div>
                <div class="container">
                    <div class="col-4" style="padding: 10px 0px 10px 0px;">
                        <div class="card text-white bg-primary o-hidden h-100">
                            <div class="card-body">
                            <div class="card-body-icon">
                                <i class="fas fa-fw fa-comments"></i>
                            </div>
                            <div class="mr-5">Noticias</div>
                            </div>
                            <a class="card-footer text-white clearfix small z-1" href="{{ route('posts.index') }}">
                            <span class="float-left">Criar Notícias</span>
                            <span class="float-right">
                                <i class="fas fa-angle-right"></i>
                            </span>
                            </a>
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>
@endsection
