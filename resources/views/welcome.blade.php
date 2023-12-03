@extends('layouts.body')

@section('NavbarLinks')
<ul class="navbar-nav">
    <li class="nav-item" >
        <a href="{{Route('login')}}" class="nav-link @yield('accueilActive')">Connexion</a>
    </li>
    <li class="nav-item ">
        <a href="{{Route('register')}}" class="nav-link @yield('profileActive')">Inscription</a>
    </li>
</ul>

<div class="container">
  <div class="row justify-content-end">
    <div class="col-auto">
      <a class="nav-link text-light" href="mailto:learntogrther@gmail.com?subject=Contact%20Us" target="_blank" rel="noopener noreferrer" style="cursor: pointer;">
        
        Contactez-nous
      </a>
    </div>
  </div>
</div>
@endsection

@section('Footer_Register')
  <span class="me-3">Inscription gratuite</span>
  <button type="button" class="btn btn-outline-light btn-rounded">
    <a href="{{Route('register')}}" class="nav-link @yield('profileActive')">Inscription</a>
  </button>
@endsection

<style>
   #footer{
    position: fixed;
    bottom: 0;
   }
    
   .body {
            background-color: #ffffff;
            font-family:  Arial, sans-serif;
            text-align: center;
            padding: 50px;
        }
        
        h1 {
            color: #333;
            font-size: 48px;
            margin-bottom: 30px;
        }
        
        p {
            color: #666;
            font-size: 24px;
            margin-bottom: 40px;
        }
        
        .decorative-text {
            background-color: #ffcc00;
            color: #333;
            font-size: 36px;
            padding: 10px 20px;
            display: inline-block;
            border-radius: 5px;
            animation: bounce 2s infinite;
        }
        
        @keyframes bounce {
            0% {
                transform: translateY(0);
            }
            50% {
                transform: translateY(-20px);
            }
            100% {
                transform: translateY(0);
            }
        }
    
</style>

@section('content')  
<div class="body ">
  <h1>Bienvenue sur notre site de partage de cours !</h1>
    <p>Connectez-vous et explorez les cours disponibles.</p>
    <p>Rejoignez notre communauté d'étudiants passionnés !</p>
    <div class="decorative-text">Partagez et apprenez</div>

</div>


@endsection