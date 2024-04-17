@extends('base')
@section('content')
<div class="container">
<h1>Modification de l'utilisateur</h1>
<form method="POST" action="{{ route('users.update', $user->id) }}">
@method('PUT')
@csrf
<div class="col-12">
    <div class = "form-group">
        <label>Nom</label>
        <input type="text" value={{ $user->name }} name="name"
            class="form-control @error('nom') is-invalid
        @enderror"
           />
        @error('name')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class="col-12">
    <div class = "form-group">
        <label>Email</label>
        <input type="text" value={{ $user->email }}  name="email" class="form-control @error('email') is-invalid
        @enderror"/>
        @error('email')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror
    </div>
</div>
<div class ="col-12">
    <div class="form-group">
        <label for="role">Rôle</label>
        <select name="role" class="form-control">
            @foreach ( $roles as $role )
            <option value="{{ $role->id }}" {{ $role->id === $user->role_id ? 'selected' : '' }}>{{ $role->label }}</option>
            @endforeach
        </select>
    </div>
</div>
<button type="submit" class="btn btn-primary">Confirmer les modifications</button>
</form>
@endsection
