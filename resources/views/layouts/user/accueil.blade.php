@extends('layouts.body')

@section('Title')
    LearnTogether
@endsection

@section('Contactez-nous')
  <a class="text-white" href="mailto:learntogrther@gmail.com?subject=Contact%20Us" target="_blank" rel="noopener noreferrer">
    Contactez-nous
  </a>
@endsection

@section('Privacy Policy')
  <a class="text-white" href="{{ route('etudiant.privacy') }}" target="_blank" rel="noopener noreferrer">
    Politique de confidentialité
  </a>
@endsection

@section('logo')
  {{Route('etudiant.accueil.index')}}
@endsection

@section('UserName')
{{ $user->prenom }}
@endsection 

@section('accueilActive')
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


</style>

@section('content')  

@if ($errors->any())
        <div class="flag note note--error" style="margin-top:50px">
          @foreach ($errors->all() as $error)
            
            <script src="{{ asset('js/jquery.toast.min.js') }}"></script>
            <script>
              var errorMessage = {!! json_encode($error) !!};
              $.toast({
                  heading: 'Erreur',
                  text: errorMessage,
                  position: 'top-center',
                  loaderBg: '#ff6849',
                  icon: 'error',
                  hideAfter: 6000,
                  stack: 6
              });
            </script>
          @endforeach
        </div>
      @endif

    

<span></span><br><br>
<button class="btn  mb-5 text-light gradient-custom" data-bs-toggle="modal" data-bs-target="#ajouterEtudiant" style="font-size: 18px; width:max-content;">
  <img src="/images/upload.png" alt="upload" width="35">
    Partager mes Documents
</button>
<br><br><br>

<form action="{{ route('etudiant.accueil.index') }}" method="GET">
  
  <center><div class="hero-image  ">

    <div class="row ">
        <div id="filter-box" class="col-sm">
                <div id="reset-cross" class="col-xs">
                    <input autocomplete="off" name="universite" class="form-control" list="Unis-List" id="universite" placeholder="Ville - université / école " onchange="checkUniInput();">
                    <i type="button" id="crossbtn" class="lni lni-cross-circle" onclick="ResetUni();"></i>
                </div>
                <datalist id="Unis-List"> 
                  <option value="Agadir - ENCG"></option>
                  <option value="Agadir - ENSA"></option>
                  <option value="Agadir - EST"></option>
                  <option value="Agadir - Faculté des Sciences"></option>
                  <option value="Agadir - FLSH"></option>
                  <option value="Agadir - FSJES"></option>
                  <option value="Ait melloul - FLASH"></option>
                  <option value="Ait melloul - FSJES"></option>
                  <option value="Al Hoceima - ENSA"></option>
                  <option value="Béni mellal - École nationale des sciences appliquées"></option>
                  <option value="Béni mellal - École supérieure de l’education et de la formation"></option>
                  <option value="Béni mellal - ENCG"></option>
                  <option value="Béni mellal - EST"></option>
                  <option value="Béni Mellal - Faculté d’économie et de gestion"></option>
                  <option value="Béni Mellal - Faculté des Lettres et des Sciences Humaines"></option>
                  <option value="Béni mellal - Faculté polydisciplinaire"></option>
                  <option value="Béni Mellal - FST"></option>
                  <option value="Berrechid - École Supérieure de l’Education et de la Formation"></option>
                  <option value="Berrechid - ENSA"></option>
                  <option value="Berrechid - Faculté Polydisciplinaire de Berrechid"></option>
                  <option value="Casablanca - Académie des arts Traditionnels"></option>
                  <option value="Casablanca - EMSI"></option>
                  <option value="Casablanca - ENCG"></option>
                  <option value="Casablanca - ENS"></option>
                  <option value="Casablanca - ENSAM"></option>
                  <option value="Casablanca - ESITH"></option>
                  <option value="Casablanca - EST"></option>
                  <option value="Casablanca - Faculté des sciences Ben Msik"></option>
                  <option value="Casablanca - FLSH Ain chock"></option>
                  <option value="Casablanca - FSAC"></option>
                  <option value="Casablanca - FSJES Ain chock"></option>
                  <option value="Casablanca - FSJES Ain Sbaa"></option>
                  <option value="Casablanca - HEM"></option>
                  <option value="Casablanca - ISCAE"></option>
                  <option value="Casablanca - UM6SS"></option>
                  <option value="EL Jadida - ENCG"></option>
                  <option value="EL Jadida - ENSA"></option>
                  <option value="EL Jadida - Faculté des lettres et des sciences humaines"></option>
                  <option value="EL Jadida - Faculté des sciences"></option>
                  <option value="El Jadida - FLSH"></option>
                  <option value="EL Jadida - FSJES"></option>
                  <option value="Errachidia - FST"></option>
                  <option value="Essaouira - EST"></option>
                  <option value="Fès - ENCG"></option>
                  <option value="Fès - ENS"></option>
                  <option value="Fès - ENSA"></option>
                  <option value="Fès - EST"></option>
                  <option value="Fès - Faculté des Lettres et des Sciences Humaines"></option>
                  <option value="Fès - Faculté des sciences"></option>
                  <option value="Fès - FSJES"></option>
                  <option value="Fès - FST"></option>
                  <option value="Guelmim - EST"></option>
                  <option value="Guelmim - FEG"></option>
                  <option value="Kénitra - ENCG"></option>
                  <option value="Kénitra - ENSA"></option>
                  <option value="Kénitra - EST"></option>
                  <option value="Kénitra - Faculté des sciences"></option>
                  <option value="Kénitra - FEG"></option>
                  <option value="Kénitra - FLSH"></option>
                  <option value="Khouribga - ENSA"></option>
                  <option value="Laâyoune - EST"></option>
                  <option value="Marrakech - ENSA"></option>
                  <option value="Marrakech - FLSH"></option>
                  <option value="Marrakech - FSJES"></option>
                  <option value="Marrakech - FSSM"></option>
                  <option value="Marrakech - FST"></option>
                  <option value="Meknès - ENAM"></option>
                  <option value="Meknès - ENCG"></option>
                  <option value="Meknès - ENS"></option>
                  <option value="Meknès - ENSAM"></option>
                  <option value="Meknès - EST"></option>
                  <option value="Meknès - Faculté des Sciences"></option>
                  <option value="Meknès - FLSH"></option>
                  <option value="Meknès - FSJES"></option>
                  <option value="Mohammedia - ENSAD"></option>
                  <option value="Mohammedia - ENSET"></option>
                  <option value="Mohammedia - FLSH"></option>
                  <option value="Mohammedia - FSJES"></option>
                  <option value="Mohammedia - FST"></option>
                  <option value="Ouarzazate - Faculté Polydisciplinaire"></option>
                  <option value="Oujda - ENCG"></option>
                  <option value="Oujda - ENSA"></option>
                  <option value="Oujda - EST"></option>
                  <option value="Oujda - Faculté des Sciences"></option>
                  <option value="Oujda - FSJES"></option>
                  <option value="Rabat - EMI"></option>
                  <option value="Rabat - ENS"></option>
                  <option value="Rabat - ESI"></option>
                  <option value="Rabat - FLSH"></option>
                  <option value="Rabat - FMPR"></option>
                  <option value="Rabat - FSJES AGDAL"></option>
                  <option value="Rabat - FSJES SOUISSI"></option>
                  <option value="Rabat - FSR"></option>
                  <option value="Rabat - IAV Hassan II"></option>
                  <option value="Rabat - INAU"></option>
                  <option value="Rabat - INPT"></option>
                  <option value="Rabat - INSEA"></option>
                  <option value="Rabat - ISPITS"></option>
                  <option value="Rabat - Mines"></option>
                  <option value="Safi - ENSA"></option>
                  <option value="Safi - EST"></option>
                  <option value="Safi - FPS"></option>
                  <option value="Salé - EST"></option>
                  <option value="Salé - FSJES"></option>
                  <option value="Settat - ENCG"></option>
                  <option value="Settat - Faculté des Langues- Arts et Sciences Humaines"></option>
                  <option value="Settat - FEG"></option><option value="Settat - FSJES"></option>
                  <option value="Settat - FSJP"></option><option value="Settat - FST"></option>
                  <option value="Settat - Institut des sciences de sport"></option>
                  <option value="Settat - Institut supérieur des sciences de la santé"></option>
                  <option value="Tanger - ENCG"></option><option value="Tanger - ENSA"></option>
                  <option value="Tanger - FSJES"></option><option value="Tanger - FST"></option>
                  <option value="Taroudant - Faculté Polydisciplinaire"></option>
                  <option value="Taza - FPT"></option>
                  <option value="Tétouan - ENS"></option>
                  <option value="Tétouan - ENSA"></option>
                  <option value="Tétouan - Faculté des Sciences"></option>
                  <option value="Tétouan - FLSH"></option>
                  <option value="Tétouan - FSJES"></option>
                </datalist>
        </div>  
        <div id="filter-box" class="col-sm">
            <div id="reset-cross" class="col-xs">
                <input autocomplete="off" class="form-control" list="Types-List" name="typeDoc" id="type" onchange="checkTypeInput();" placeholder="Type du document" >
                <i type="button" onclick="ResetType(); " id="crossbtn" class="lni lni-cross-circle" ></i>
            </div>                     
                <datalist id="Types-List" >
                    <option value="Examen">
                    </option><option value="Résumé">
                    </option><option value="TD/TP">
                    
                </option></datalist>
                
        </div>
        <div id="filter-box" class="col-sm">
          <div id="reset-cross" class="col-xs">
            <select name="niveau" id="niveau"  class="form-control">
              <option disabled selected value="">Niveau</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
              <option value="5">5</option>
          </select>
          </div>                     
              
              
        </div>

        <div id="filter-box" class="col-sm">
          <div id="reset-cross" class="col-xs">
            <button class="btn btn-outline-light gradient-custom   mb-2" type="submit">Filter</button>
          </div>                     
              
              
        </div>
        
  </div>  
  </div></center>
  
  
</form>
<br><br><br>
<table class="table table-striped table-bordered text-center custom-table">
    <thead>
        <tr style="background-color: #4F437F">
          <th colspan="9" class="text-light" style="font-size: 25px ;">Liste des documents</th>
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
        <tr>
            <td class="text-wrap"><a href="{{ route('etudiant.documents.show', ['id' => $document->id]) }}" target="_blank"><img src="/images/document.png" alt="file" width="35"></a></td>
            <td class="text-wrap">{{ $document->titre}}</td>
            <td class="text-wrap">{{ $document->desc}}</td>
            <td class="text-wrap">{{ $document->universite}}</td>
            <td class="text-wrap">{{ $document->filiere}}</td>
            <td class="text-wrap">{{ $document->typeDoc}}</td>
            <td class="text-wrap">{{ $document->niveau}}</td>
       
                <td class="text-center">
                    
                    <a href="{{ route('download', $document->id) }}"><img src="/images/download-file.png" alt="download" width="35"></a>

                </td>
            
        </tr>
    @endforeach
    </tbody>
</table>
<div class="d-flex justify-content-center"  style="margin-bottom: 100px;">
  {{ $documents->links('pagination::bootstrap-4') }}
</div>
 {{-- -----------------------------------------------------Modal: Partager document----------------------------------------------------- --}}

  <!-- Modal -->
  <div class="modal fade" id="ajouterEtudiant" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header gradient-custom text-white fw-bold" style="">
          <h5 class="modal-title fs-5" id="exampleModalLabel">Partager Document</h5>
        </div>
        <div class="modal-body ">
            <form action="{{ Route('etudiant.profile.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                  <div class="col-auto form-row">
                    <div class="input-group mb-2 col-sm-6">
                        <div class="input-group-text"><i class="fa-solid fa-file"></i></div>
                      
                        <input type="file" class="form-control" name="file" placeholder="file">
                    </div>
                    <div class="input-group mb-2 col-sm-6">
                        <div class="input-group-text"><i class="fa-solid fa-file"></i></div>
                      
                        <input type="text" class="form-control" name="titre" placeholder="titre">
                    </div>
    
                    <div class="input-group mb-2 col-sm-6">
                        <div class="input-group-text"><i class="fa-solid fa-file"></i></div>
                      
                        <input type="text" class="form-control" name="desc" placeholder="description">
                    </div>
                  </div>
    
                  <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-text"><i class="fa-solid fa-file"></i></div> 
                      
                        <div id="reset-cross">
                          <input autocomplete="off" name="universite" class="form-control" list="Unis-List" id="university" placeholder="Ville - université / école" onchange="checkUniInput();" required="">
                      <i type="button" id="crossbtn" class="lni lni-cross-circle" onclick="ResetUni();"></i>
                          </div>
                      
                      <datalist id="Unis-List"> 

                       <option value="Agadir - ENCG"></option>
                       <option value="Agadir - ENSA"></option>
                       <option value="Agadir - EST"></option>
                       <option value="Agadir - Faculté des Sciences"></option>
                       <option value="Agadir - FLSH"></option>
                       <option value="Agadir - FSJES"></option>
                       <option value="Ait melloul - FLASH"></option>
                       <option value="Ait melloul - FSJES"></option>
                       <option value="Al Hoceima - ENSA"></option>
                       <option value="Béni mellal - École nationale des sciences appliquées"></option>
                       <option value="Béni mellal - École supérieure de l’education et de la formation"></option>
                       <option value="Béni mellal - ENCG"></option>
                       <option value="Béni mellal - EST"></option>
                       <option value="Béni Mellal - Faculté d’économie et de gestion"></option>
                       <option value="Béni Mellal - Faculté des Lettres et des Sciences Humaines"></option>
                       <option value="Béni mellal - Faculté polydisciplinaire"></option>
                       <option value="Béni Mellal - FST"></option>
                       <option value="Berrechid - École Supérieure de l’Education et de la Formation"></option>
                       <option value="Berrechid - ENSA"></option>
                       <option value="Berrechid - Faculté Polydisciplinaire de Berrechid"></option>
                       <option value="Casablanca - Académie des arts Traditionnels"></option>
                       <option value="Casablanca - EMSI"></option>
                       <option value="Casablanca - ENCG"></option>
                       <option value="Casablanca - ENS"></option>
                       <option value="Casablanca - ENSAM"></option>
                       <option value="Casablanca - ESITH"></option>
                       <option value="Casablanca - EST"></option>
                       <option value="Casablanca - Faculté des sciences Ben Msik"></option>
                       <option value="Casablanca - FLSH Ain chock"></option>
                       <option value="Casablanca - FSAC"></option>
                       <option value="Casablanca - FSJES Ain chock"></option>
                       <option value="Casablanca - FSJES Ain Sbaa"></option>
                       <option value="Casablanca - HEM"></option>
                       <option value="Casablanca - ISCAE"></option>
                       <option value="Casablanca - UM6SS"></option>
                       <option value="EL Jadida - ENCG"></option>
                       <option value="EL Jadida - ENSA"></option>
                       <option value="EL Jadida - Faculté des lettres et des sciences humaines"></option>
                       <option value="EL Jadida - Faculté des sciences"></option>
                       <option value="El Jadida - FLSH"></option>
                       <option value="EL Jadida - FSJES"></option>
                       <option value="Errachidia - FST"></option>
                       <option value="Essaouira - EST"></option>
                       <option value="Fès - ENCG"></option>
                       <option value="Fès - ENS"></option>
                       <option value="Fès - ENSA"></option>
                       <option value="Fès - EST"></option>
                       <option value="Fès - Faculté des Lettres et des Sciences Humaines"></option>
                       <option value="Fès - Faculté des sciences"></option>
                       <option value="Fès - FSJES"></option>
                       <option value="Fès - FST"></option>
                       <option value="Guelmim - EST"></option>
                       <option value="Guelmim - FEG"></option>
                       <option value="Kénitra - ENCG"></option>
                       <option value="Kénitra - ENSA"></option>
                       <option value="Kénitra - EST"></option>
                       <option value="Kénitra - Faculté des sciences"></option>
                       <option value="Kénitra - FEG"></option>
                       <option value="Kénitra - FLSH"></option>
                       <option value="Khouribga - ENSA"></option>
                       <option value="Laâyoune - EST"></option>
                       <option value="Marrakech - ENSA"></option>
                       <option value="Marrakech - FLSH"></option>
                       <option value="Marrakech - FSJES"></option>
                       <option value="Marrakech - FSSM"></option>
                       <option value="Marrakech - FST"></option>
                       <option value="Meknès - ENAM"></option>
                       <option value="Meknès - ENCG"></option>
                       <option value="Meknès - ENS"></option>
                       <option value="Meknès - ENSAM"></option>
                       <option value="Meknès - EST"></option>
                       <option value="Meknès - Faculté des Sciences"></option>
                       <option value="Meknès - FLSH"></option>
                       <option value="Meknès - FSJES"></option>
                       <option value="Mohammedia - ENSAD"></option>
                       <option value="Mohammedia - ENSET"></option>
                       <option value="Mohammedia - FLSH"></option>
                       <option value="Mohammedia - FSJES"></option>
                       <option value="Mohammedia - FST"></option>
                       <option value="Ouarzazate - Faculté Polydisciplinaire"></option>
                       <option value="Oujda - ENCG"></option>
                       <option value="Oujda - ENSA"></option>
                       <option value="Oujda - EST"></option>
                       <option value="Oujda - Faculté des Sciences"></option>
                       <option value="Oujda - FSJES"></option>
                       <option value="Rabat - EMI"></option>
                       <option value="Rabat - ENS"></option>
                       <option value="Rabat - ESI"></option>
                       <option value="Rabat - FLSH"></option>
                       <option value="Rabat - FMPR"></option>
                       <option value="Rabat - FSJES AGDAL"></option>
                       <option value="Rabat - FSJES SOUISSI"></option>
                       <option value="Rabat - FSR"></option>
                       <option value="Rabat - IAV Hassan II"></option>
                       <option value="Rabat - INAU"></option>
                       <option value="Rabat - INPT"></option>
                       <option value="Rabat - INSEA"></option>
                       <option value="Rabat - ISPITS"></option>
                       <option value="Rabat - Mines"></option>
                       <option value="Safi - ENSA"></option>
                       <option value="Safi - EST"></option>
                       <option value="Safi - FPS"></option>
                       <option value="Salé - EST"></option>
                       <option value="Salé - FSJES"></option>
                       <option value="Settat - ENCG"></option>
                       <option value="Settat - Faculté des Langues- Arts et Sciences Humaines"></option>
                       <option value="Settat - FEG"></option><option value="Settat - FSJES"></option>
                       <option value="Settat - FSJP"></option><option value="Settat - FST"></option>
                       <option value="Settat - Institut des sciences de sport"></option>
                       <option value="Settat - Institut supérieur des sciences de la santé"></option>
                       <option value="Tanger - ENCG"></option><option value="Tanger - ENSA"></option>
                       <option value="Tanger - FSJES"></option><option value="Tanger - FST"></option>
                       <option value="Taroudant - Faculté Polydisciplinaire"></option>
                       <option value="Taza - FPT"></option>
                       <option value="Tétouan - ENS"></option>
                       <option value="Tétouan - ENSA"></option>
                       <option value="Tétouan - Faculté des Sciences"></option>
                       <option value="Tétouan - FLSH"></option>
                       <option value="Tétouan - FSJES"></option>
                      </datalist>
                    </div>
                  </div>
    
                  <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-text"><i class="fa-solid fa-file"></i></div>
                      
                        <input type="text" class="form-control" name="filiere" placeholder="filiere">
                    </div>
                  </div>
    
                  <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-text"><i class="fa-solid fa-file"></i></div>
                      
                        <select name="typeDoc" id="typeDoc"  class="form-control">
                            <option disabled selected value="">Type Document</option>
                            <option value="Examen">Examen</option>
                            <option value="Résumé">Résumé</option>
                            <option value="TD/TP">TD/TP</option>
                        </select>
                    </div>
                  </div>
                  <div class="col-auto">
                    <div class="input-group mb-2">
                        <div class="input-group-text"><i class="fa-solid fa-file"></i></div>
                      
                        <select name="niveau" id="niveau"  class="form-control">
                            <option disabled selected value="">Niveau</option>
                            <option value="1">1</option>
                            <option value="2">2</option>
                            <option value="3">3</option>
                            <option value="4">4</option>
                            <option value="5">5</option>
                        </select>
                    </div>
                  </div>
                  <div class="modal-footer pb-0">
                    <button type="button" class="btn btn-danger" data-bs-dismiss="modal">Annuler</button>
                    <input type="submit" value="Partager" class="btn btn-primary">
                </div>
                </div>
                
            </form>
        </div>
        
      </div>
    </div>
  </div>

  
  @if(session('success'))
  <script src="{{ asset('js/jquery.toast.min.js') }}"></script>
  
          <script>
            
              $.toast({
                  heading: 'Succès',
                  text: '{{ session("txtsuccess") }}',
                  position: 'top-center',
                  loaderBg: '#ff6849',
                  icon: 'success',
                  hideAfter: 3000,
                  stack: 6
              });
          </script>
  @endif
@endsection