<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="{{ asset('js/app.js') }}" defer></script>

    

    <link rel="shortcut icon" type="x-icon" href="/images/graduate.png">
  
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" 
      integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">
      <link rel="stylesheet" href="{{ asset('css/jquery.toast.min.css') }}">

      <script src="https://kit.fontawesome.com/cfaf51b016.js" crossorigin="anonymous"></script>

    <title>@yield('Title')</title>
    <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">
    <script src="{{ asset('js/jquery-3.6.3.js') }}"></script>
  </head>
<body style="display: flex; flex-direction: column; min-height: 100vh;">

    <nav class="navbar navbar-expand-sm fs-5 fw-bold navbar-dark  shadow-sm  gradient-custom" style="background-color: #5e17eb;">
        <div class="container-fluid">
            
            <a class="navbar-brand" href="@yield('logo')">
              <img src="/images/learn1.png" alt="user" width="200" class="mr-1">
            </a>
            &nbsp;
            <span class="navbar-brand mr-2">&nbsp;@yield('UserName')</span>
                <span style="height:30px;border-left:2px solid rgb(255, 255, 255);"></span>
          
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            @yield('NavbarLinks')
            
          </div>
          
        <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
          @csrf
      </form>
        </div>
    </nav>
  <div class="container " style="flex: 1;">
      <div class="row justify-content-center ">
        @yield('content')
      </div>
  </div>
    


  <section class="">
    <!-- Footer -->
    <footer class="text-center text-white  gradient-custom " id="footer" style="background-color: #5e17eb;  bottom: 0; width: 100%; margin-top: auto;">
      <!-- Grid container -->
      <div class="container p-4 pb-0">
        <!-- Section: CTA -->
        <section class="">
          <p class="d-flex justify-content-center align-items-center">
            @yield('Footer_Register')
          </p>
        </section>
        <!-- Section: CTA -->
      </div>
      <!-- Grid container -->
  
      <!-- Copyright -->
      <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2);">
        © <script>document.write(new Date().getFullYear());</script> :</span> Copyright: LearnTogether
        &nbsp;&nbsp;
        
        @yield('Privacy Policy')&nbsp;&nbsp;  
        @yield('Contactez-nous')
        

      </div>
      <!-- Copyright -->
    </footer>
    <!-- Footer -->
  </section>
  <script src="{{ asset('js/jquery.toast.min.js') }}"></script>

  <!--<script>
    $(document).ready(function() {
        $.toast({
            heading: 'Welcome to my Laravel 8 project!',
            text: 'jQuery Toast is working!',
            position: 'top-center',
            loaderBg: '#ff6849',
            icon: 'success',
            hideAfter: 3000,
            stack: 6
        });
    });
    function msgsuccess(txtsuccess){
		$.toast({
		  heading: 'Success',
		  text:txtsuccess,
		  showHideTransition: 'slide',
		  icon: 'success',
		  loaderBg: '#f96868',
		  position: 'top-center'
   	 });
	}	
	//Message error
	function msgerror(txterror){
		$.toast({
		  heading: 'Error',
		  text:txterror,
		  showHideTransition: 'slide',
		  icon: 'error',
		  loaderBg: '#f96868',
		  position: 'top-center'
		});
	}	
    
  </script>-->
</body>
</html>