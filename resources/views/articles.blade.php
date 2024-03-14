@extends('base')

@section('content')
    <h1 class="display-3 text-center"> Articles </h1>
    <div class = "articles row justify-content-center">
        @foreach ($articles as $article)
            <div class="card" style="width: 30rem; height: 35rem">
                <div class="card-body">
                    @if ( $article->category->id == 1 )
                    <i class="fa-solid fa-futbol"></i>
                    @elseif( $article->category->id == 2 )
                    <i class="fa-solid fa-laptop-code"></i>
                    @elseif ( $article->category->id == 3)
                    <i class="fa-solid fa-flask"></i>
                    @elseif( $article->category->id == 4 )
                    <i class="fa-solid fa-atom"></i>
                    @endif
                    <div class="d-flex justify-content-center align-content-center mb-2">
                        <span class="badge rounded-pill bg-info">{{ $article->category->label }}</span>
                    </div>
                    <h5 class="card-title">{{ $article->title }}</h5>
                    <h6 class="card-subtitle mb-2 text-body-secondary">{{ $article->subtitle }}</h6>
                    <p class="card-text">{!! $article->content !!}</p>
                    <a href="{{ route('article', $article->slug) }}" class="btn btn-primary">Lire la suite</a>
                </div>
            </div>
        @endforeach
    </div>
    <div class = "d-flex justify-content-center mt-5">
        {{ $articles->links('vendor.pagination.custom') }}
    </div>
@endsection
