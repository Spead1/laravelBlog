@extends('base')

@section('content')
<div style="padding-right:20%; padding-left:20%" class="py-2">
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
<div class = "d-flex row justify-content-end">
<div class="d-flex flex-row-reverse mt-2 gap-1">
    @if ( count($article->comments) > 0)
    <button id="show-comments-btn" class="btn btn-secondary" onclick="showComments()">Afficher {{ count($article->comments) }} commentaires</button>
    @endif
    <a id="add-comment-btn" class="btn btn-success" href="{{ route('comments.create', ['article' => $article->slug]) }}">Ajouter un commentaire</a>
</div>
</div>
</div>
<div id="comments-container" style="display: none" class="mt-2">
@include('incs.comments')
</div>


@endsection
