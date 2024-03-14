@extends('base')

@section('content')
<h1 class="display-3 text-center"> {{ $article->title }} </h1>
<div class="d-flex justify-content-center align-content-center mb-2">
<span class="badge rounded-pill bg-primary">{{ $article->category->label }}</span>
</div>
<div class = "articles row justify-content-center">
        <div class="card" style="width: 60rem; height: 35rem">
            <div class="card-body">
                <h6 class="card-subtitle mb-2 text-body-secondary">{{ $article->subtitle }}</h6>
                <p class="card-text">{!! $article->content !!}</p>
                <a href="{{ route('articles') }}" class="btn btn-primary">Revenir aux articles</a>
            </div>
        </div>
</div>

@endsection
