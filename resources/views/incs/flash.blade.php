@if ($message = Session::get('success'))
    <div class="alert alert-success alert-block">
        <strong>{{ $message }}</strong>
        <button type="button" class="close btn-dark" data-bs-dismiss="alert">x</button>
    </div>
@endif

@if ($message = Session::get('warning'))
    <div class="alert alert-danger alert-block">
        <strong>{{ $message }}</strong>
        <button type="button" class="close btn-dark" data-bs-dismiss="alert">x</button>
    </div>
@endif
