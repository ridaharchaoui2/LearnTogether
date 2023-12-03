@extends('layouts.body')

@section('Title')
    Admin
@endsection

@section('logo')
  {{Route('documents.index')}}
@endsection

@section('img')
admin
@endsection

@section('UserName')
    Admin
@endsection  

@section('usersActive')
    active
@endsection

@section('NavbarLinks')
<ul class="navbar-nav">
    <li class="nav-item ">
        <a href="{{Route('documents.index')}}" class="nav-link @yield('documentsActive')">Accueil</a>
    </li>
    <li class="nav-item ">
        <a href="{{Route('users.index')}}" class="nav-link @yield('usersActive')">Users</a>
    </li>
</ul>
<div class="container">
    <div class="row justify-content-end">
      <div class="col-auto">
        <a class="nav-link text-light" onclick="event.preventDefault(); document.getElementById('logout-form').submit();" style="cursor: pointer;">
          
          <img src="/images/logout.png" alt="file" width="27">
        </a>
      </div>
    </div>
  </div>
@endsection

<style>
*,
*:before,
*:after {
  box-sizing: border-box;
}


</style>

@section('content')   

    

    <h1 style="margin-top:30px;margin-bottom: 30px;">Users</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center custom-table">
            <thead>
                <tr style="background-color: #4F437F;">
                    <th colspan="9" class="text-light" style="font-size: 25px">Liste des documents</th>
                    </tr>
                    <tr class="text-light" style="background-color: #7F6CCC;">
                    <th>Nom</th>
                    <th>Prénom</th>
                    <th>E-mail</th>
                    <th  >Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($users as $user)
                <tr>
                    <td>{{ $user->nom}}</td>
                    <td>{{ $user->prenom}}</td>
                    <td>{{ $user->email}}</td>
                    <td class="" style="display: flex; justify-content: center; ">
                      <div>
                          <a class="text-white" href="mailto:{{ $user->email }}?subject=Contact%20Us" target="_blank" rel="noopener noreferrer">
                              <img src="/images/mail.png" alt="mail" width="35">
                          </a>
                      </div>
                      <div style="">
                          <form action="{{ route('user.destroy', $user->id) }}" method="GET">
                              @csrf
                              @method('DELETE')
                              <button type="submit" onclick="return confirm('Are you sure you want to delete this user?')" style="background-color: transparent; border: none;">
                                  <img src="/images/delete1.png" alt="delete" width="35">
                              </button>
                          </form>
                      </div>
                    </td>
                  
                  
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
        {{ $users->links('pagination::bootstrap-4') }}
    </div>

{{-- -----------------------------------------------------Modal: Delete----------------------------------------------------- --}}
<div class="modal fade" id="deleteUserModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Supprimer Document</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <p>Voulez-vous vraiment supprimer ce document ?</p>
          <small class="font-weight-bold" style="color:#edb200;">
              <i class="fas fa-exclamation-triangle"></i>
              Cette action ne peut pas être annulée !
          </small>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annuler</button>
            <form id="deleteDocumentForm" method="POST">
              @csrf
              @method('DELETE')
              <input type="submit" value="Supprimer" class="btn btn-danger">
            </form>
            
          </div>
        </div>
        
      </div>
    </div>
  </div>

{{-- -----------------------------------------------------JavasSript----------------------------------------------------- --}}
<script>
    
    function Supprimer(id){
        
        $('#deleteUserModal').modal('toggle');
        $('#deleteDocumentForm').attr('action', "/admin/documents/" +id);
    }
    
</script>
<script src="{{ asset('js/jquery.toast.min.js') }}"></script>
@endsection