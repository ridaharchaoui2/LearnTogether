@extends('layouts.body')

@section('Contactez-nous')
  <a class="text-white" href="mailto:learntogrther@gmail.com?subject=Contact%20Us" target="_blank" rel="noopener noreferrer">Contactez-nous</a>
@endsection

@section('Privacy Policy')
  <a class="text-white" href="{{ route('etudiant.privacy') }}" target="_blank" rel="noopener noreferrer">Politique de confidentialité</a>
@endsection


@section('Title')
    Profile
@endsection

@section('logo')
  {{Route('etudiant.accueil.index')}}
@endsection

@section('UserName')
{{ $user->prenom }}
@endsection 

@section('profileActive')
    active
@endsection

@section('NavbarLinks')
<ul class="navbar-nav">
    <li class="nav-item ">
        <a href="{{Route('etudiant.accueil.index')}}" class="nav-link @yield('accueilActive')">Accueil</a>
    </li>
    <li class="nav-item ">
        <a href="{{Route('etudiant.profile.index')}}" class="nav-link @yield('profileActive')">Profile</a>
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

body{
    background: #f7f7ff;
    margin-top:20px;
}
.card {
    position: relative;
    display: flex;
    flex-direction: column;
    min-width: 0;
    word-wrap: break-word;
    background-color: #fff;
    background-clip: border-box;
    border: 0 solid transparent;
    border-radius: .25rem;
    margin-bottom: 1.5rem;
    box-shadow: 0 2px 6px 0 rgb(218 218 253 / 65%), 0 2px 6px 0 rgb(206 206 238 / 54%);
}
.me-2 {
    margin-right: .5rem!important;
}
</style>

@section('content')   


<div class="container " style="margin-top: 10px">
    <div class="main-body ">
        <div class="row">
            <div class="col-lg-4">
                <div class="card">
                    <div class="card-body">
                        <div class="d-flex flex-column align-items-center text-center">
                            <img src="/images/education1.png" alt="Admin" class="rounded-circle p-1" width="150">
                            <div class="mt-3">
                                <h4>{{ $user->nom}} {{ $user->prenom}}</h4>
                                <p class="text-secondary mb-1">{{ $user->email}}</p>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="card">
                    <div class="card-body">
                        <form method="POST" action="{{ route('etudiant.profile.update', ['profile' => $user->id]) }}">
                            @csrf
                            @method('PUT')
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Nom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" id="nom" name="nom" class="form-control" value="{{ $user->nom}}">
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="hidden" name="id" value="{{ $user->id }}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">Prénom</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" id="prenom" name="prenom" class="form-control" value="{{ $user->prenom}}">
                                </div>
                            </div>
                            <div class="row mb-3">
                                <div class="col-sm-3">
                                    <h6 class="mb-0">E-mail</h6>
                                </div>
                                <div class="col-sm-9 text-secondary">
                                    <input type="text" id="email" name="email" class="form-control" value="{{ $user->email}}" disabled>
                                </div>
                            </div>
                            
                            
                            
                            <div class="row">
                                
                                  <center>  <button type="submit" class="btn btn-primary px-4 text-center" style="font-size: 16px; width: max-content; background-color: #5e17eb;"><img src="/images/edit1.png" alt="file" width="20"> Enregister</button></center>
                                
                            </div>
                        </form>
                    </div>
                </div>
                
            </div>
            
        </div>
        <div class="row">
            <div class="col-lg">
                <div class="card">
                    <div class="card-body">
                        <table class="table table-striped table-bordered text-center custom-table">
                            <thead>
                                <tr style="background-color: #4F437F">
                                  <th colspan="9" class="text-light" style="font-size: 25px ;">Mes documents</th>
                                </tr>
                                <tr class="text-light" style="background-color: #7F6CCC;">
                                    <th>file</th>
                                    <th>Titre</th>
                                    <th>type-doc</th>
                                    <th>niveau</th>
                                    <th colspan="2">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($documents as $document)
                                <tr>
                                    <td class="text-wrap"><a href="{{ route('etudiant.documents.show', ['id' => $document->id]) }}" target="_blank"><img src="/images/document.png" alt="file" width="35"></a></td>
                                    <td class="text-wrap">{{ $document->titre}}</td>
                                    <td class="text-wrap">{{ $document->typeDoc}}</td>
                                    <td class="text-wrap">{{ $document->niveau}}</td>
                               
                                        <td class="text-center">
                                            <form action="{{ route('etudiant.document.destroy', $document->id) }}" method="GET">
                                                @csrf
                                                @method('DELETE')
                                                @if (!$document->accepted )
                                                <p style="font-family: 'YourSlimFont'; font-size: 14px;font-weight: 600; font-style: italic; color: rgb(209, 62, 4);">
                                                    (This file is under review.)
                                                </p>
                                                @endif
                                                <button type="submit"  onclick="return confirm('Are you sure you want to delete this document?')" style="background-color: transparent; border: none">
                                                    <img src="/images/delete.png" alt="download" width="35">
                                                </button><br>
                                                
                                            </form>
                                        </td>
                                    
                                </tr>
                            @endforeach
                            </tbody>
                        </table>
                        <div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
                            {{ $documents->links('pagination::bootstrap-4') }}
                        </div>
                    </div>
                </div>
                
            </div>
        </div>
    </div>
</div>

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
