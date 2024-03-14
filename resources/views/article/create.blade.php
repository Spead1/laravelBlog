@extends('base')
@section('content')
    <div class="container">
        <h1 class="text-center my-5">Poster un nouvel article</h1>
        <form method="POST" action="{{ route('articles.store') }}">
            @csrf
            <div class="col-12">
                <div class = "form-group">
                    <label>Titre</label>
                    <input type="text" name="title"
                        class="form-control @error('title') is-invalid
                    @enderror"
                        placeholder="Titre du nouvel article" />
                    @error('title')
                        <span class="invalid-feedback" role="alert">
                            < <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
            </div>
            <div class="col-12">
                <div class = "form-group">
                    <label>Sous-titre</label>
                    <input type="text" name="subtitle"
                        class="form-control @error('title') is-invalid
                    @enderror"
                        placeholder="Sous-titre de l'article" />
                    @error('subtitle')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                    <small class="form-text text-muted">Décrivez le contenu de votre article</small>
                </div>
            </div>
            <div class ="col-12">
                <div class="form-group">
                    <label for="category">Catégorie</label>
                    <select name="category" class="form-control">
                        @foreach ($categories as $category )
                        <option value="{{ $category->id }}">{{ $category->label }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-12">
                <div class = "form-group">
                    <label>Contenu</label>
                    <script>
                        tinymce.init({
                            selector: 'textarea',
                            plugins: 'anchor autolink charmap codesample emoticons image link lists media searchreplace table visualblocks wordcount checklist mediaembed casechange export formatpainter pageembed linkchecker a11ychecker tinymcespellchecker permanentpen powerpaste advtable advcode editimage advtemplate ai mentions tinycomments tableofcontents footnotes mergetags autocorrect typography inlinecss',
                            toolbar: 'undo redo | blocks fontfamily fontsize | bold italic underline strikethrough | link image media table mergetags | addcomment showcomments | spellcheckdialog a11ycheck typography | align lineheight | checklist numlist bullist indent outdent | emoticons charmap | removeformat',
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
                        placeholder="Titre du nouvel article"></textarea>
                    <small class="form-text text-muted">Ecrivez le contenu de votre article</small>
                    @error('content')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror

                </div>
            </div>
            <div class="d-flex justify-content-center mb-5"></div>
            <button type="submit" class="btn btn-primary">Poster l'article</button>
        </form>
    </div>
@endsection
