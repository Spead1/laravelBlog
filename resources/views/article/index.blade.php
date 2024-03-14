@extends('base')

@section('content')
    <div class="container">
        <h1 class="text-center my-5">Articles</h1>
        <div class ="d-flex justify-content-center"><a class = "btn btn-info my-5" href="{{ route('articles.create') }}">
                Ajouter un nouvel article</a></div>
        <table class="table">
            <thead>
                <tr class="table-active">
                    <th scope="col">ID</th>
                    <th scope="col">Titre</th>
                    <th scope="col">Créé le</th>
                    <th scope="col"><i class="fas fa-audio-description    "></i></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($articles as $article)
                    <tr>
                        <th scope="row">{{ $article->id }}</th>
                        <td>{{ $article->title }}</td>
                        <td>{{ $article->dateFormatted() }}</td>
                        <td class="d-flex">
                            <form action={{ route('articles.edit', $article->id) }} method="GET"><button class="btn btn-primary">Editer</button></form>
                            <button type="submit" class="btn btn-danger" onclick="document.getElementById('modal-open-{{ $article->slug }}').style.display='block'">Supprimer</button>
                            <form action={{ route('articles.delete', $article->id) }} method="POST">
                                @csrf
                                @method("DELETE")
                                <div class="modal" id="modal-open-{{ $article->slug }}">
                                    <div class="modal-dialog" role="document">
                                      <div class="modal-content">
                                        <div class="modal-header">
                                          <h5 class="modal-title">La suppression d'un article est définitive !</h5>
                                          <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $article->slug }}').style.display='none'" aria-label="Close">
                                            <span aria-hidden="true"></span>
                                          </button>
                                        </div>
                                        <div class="modal-body">
                                          <p>Etes-vous sûr de vouloir supprimer cet article ?</p>
                                        </div>
                                        <div class="modal-footer">
                                          <button type="submit" class="btn btn-primary">Oui</button>
                                          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $article->slug }}').style.display='none'">Fermer</button>
                                        </div>
                                      </div>
                                    </div>
                                  </div>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class = "d-flex justify-content-center mt-5">
            {{ $articles->links('vendor.pagination.custom') }}
        </div>
    </div>
@endsection
