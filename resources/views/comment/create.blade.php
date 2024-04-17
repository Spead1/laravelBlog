@extends('base')
@section('content')
    <div class="container">
        <h1 class="text-center my-5">Poster un nouveau commentaire</h1>
        <form method="POST" action="{{ route('comments.store', ['article' => $article]) }}">
            @csrf
            <div class="col-12">
                <div class = "form-group">
                    <label>Titre</label>
                    <input type="text" name="title"
                        class="form-control @error('title') is-invalid
                    @enderror"
                        placeholder="Titre de votre commentaire" />
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            < <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class = "form-group">
                    <label>Contenu</label>
                    <script>
                        tinymce.init({
                            selector: 'textarea',
                            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount linkchecker',
                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table | align lineheight | numlist bullist indent outdent | emoticons charmap | removeformat',
                            tinycomments_mode: 'embedded',
                            tinycomments_author: 'Author name',
                            mergetags_list: [{
                                    value: 'First.Name',
                                    title: 'First Name'
                                },
                                {
                                    value: 'Email',
                                    title: 'Email'
                                },
                            ],
                            ai_request: (request, respondWith) => respondWith.string(() => Promise.reject(
                                "See docs to implement AI Assistant")),
                        });
                    </script>
                    <textarea name="content" class="form-control w-100 @error('title') is-invalid
                    @enderror"
                        placeholder="Contenu de votre commentaire"></textarea>
                    <small class="form-text text-muted">Ecrivez le contenu de votre commentaire</small>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
            <div class="d-flex justify-content-center mb-5"></div>
            <button type="submit" class="btn btn-primary">Poster le commentaire</button>
        </form>
    </div>
@endsection
