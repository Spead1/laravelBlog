@extends('base')
@section('content')
    <div class="container">
        <table id="usersTable" class="display">
            <thead>
                <tr>
                    <th>Nom</th>
                    <th>email</th>
                    <th>role</th>
                    <th>date de création</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                    <tr>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        <td>{{ $user->role }}</td>
                        <td>{{ $user->created_at }}</td>
                        <td><a class="btn btn-warning" href="{{ route('users.edit', ['user' => $user, 'id' => $user->id]) }}">Editer</a></td>
                        <td>
                        <button type="submit" class="btn btn-danger" onclick="document.getElementById('modal-open-{{ $user->id }}').style.display='block'">Supprimer</button>
                        <form action="{{ route('users.delete', ['user' => $user, 'id' => $user->id]) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <div class="modal" id="modal-open-{{ $user->id }}">
                                <div class="modal-dialog" role="document">
                                  <div class="modal-content">
                                    <div class="modal-header">
                                      <h5 class="modal-title">La suppression d'un utilisateur est définitive !</h5>
                                      <button type="button" class="btn-close" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $user->id }}').style.display='none'" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                      <p>Etes-vous sûr de vouloir supprimer cet utilisateur ?</p>
                                    </div>
                                    <div class="modal-footer">
                                      <button type="submit" class="btn btn-primary">Oui</button>
                                      <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" onclick="document.getElementById('modal-open-{{ $user->id }}').style.display='none'">Fermer</button>
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
        <script src="https://code.jquery.com/jquery-3.7.1.js" integrity="sha256-eKhayi8LEQwp4NKxN+CfCh+3qOVUtJn3QNZ0TciWLP4="
            crossorigin="anonymous"></script>
        <script src="https://cdn.datatables.net/2.0.3/js/dataTables.min.js" crossorigin="anonymous"></script>
    </div>
@endsection
