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

@section('documentsActive')
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

    

    <h1 style="margin-top:30px;margin-bottom: 30px;">Documents</h1>
    <div class="table-responsive">
        <table class="table table-striped table-bordered text-center  custom-table">
            <thead>
                <tr style="background-color: #4F437F;">
                <th colspan="9" class="text-light" style="font-size: 25px">Liste des documents</th>
                </tr>
                <tr class="text-light" style="background-color: #7F6CCC;">
                    <th>file</th>
                    <th>Titre</th>
                    <th>Desc</th>
                    <th>universite</th>
                    <th>filiere</th>
                    <th>type-doc</th>
                    <th>niveau</th>
                    <th colspan="2">Actions</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($documents as $document)
                <tr style="border-radius: 10px;">
                    <td class="text-wrap"><a href="{{ route('documents.show', ['id' => $document->id]) }}" target="_blank"><img src="/images/document.png" alt="file" width="35"></a></td>
                    
                    <td class="text-wrap">{{ $document->titre}}</td>
                    <td class="text-wrap">{{ $document->desc}}</td>
                    <td class="text-wrap">{{ $document->universite}}</td>
                    <td class="text-wrap">{{ $document->filiere}}</td>
                    <td class="text-wrap">{{ $document->typeDoc}}</td>
                    <td class="text-wrap">{{ $document->niveau}}</td>
                    
                        
                    
                        <td class="text-center">
                            @if ($document->accepted==0)
                                <form method="POST" action="{{ route('documents.update', $document) }}">
                                    @csrf
                                    <input type="hidden" name="_method" value="PUT">
                                    <button type="submit" style="border: none; padding: 0; background-color: transparent;"><img src="/images/accept.png" alt="download" width="35"></button>
                                </form>
                            @endif
                            
                            
                        </td>   
                        <td class="text-center">
                            <a href="javascript:void(0)"  onclick="Supprimer({{ $document->id }})" style="background-color: transparent; border: none">
                                <img src="/images/delete.png" alt="download" width="35">
                            </a>
                        </td>
                    
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
    <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
        {{ $documents->links('pagination::bootstrap-4') }}
    </div>



{{-- -----------------------------------------------------Modal: Delete----------------------------------------------------- --}}
<div class="modal fade" id="deleteDocumentModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
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
        
        $('#deleteDocumentModal').modal('toggle');
        $('#deleteDocumentForm').attr('action', "/admin/documents/" +id);
    }
    
</script>
<script src="{{ asset('js/jquery.toast.min.js') }}"></script>
@if(session('success'))

        <script>
           
            $.toast({
                heading: 'Success',
                text: '{{ session("txtsuccess") }}',
                position: 'top-center',
                loaderBg: '#ff6849',
                icon: 'success',
                hideAfter: 4000,
                stack: 6,
                width: '300px',
                height: '600px'
            });
        </script>
    @endif
    
@endsection