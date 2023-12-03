@extends('layouts.app')

@section('content')
<style>
    .shadow-right-bottom {
        -webkit-box-shadow: 8px 8px 10px -6px #000000;
        -moz-box-shadow: 8px 8px 10px -6px #000000;
        box-shadow: 100px 10px 50px -6px #000000;
        border-radius: 2rem;
    }
</style>
<section class="vh-100 gradient-custom">
    <div class="container py-1 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col-12 col-md-8 col-lg-6 col-xl-5">
          <div class="card text-white" style="border-radius: 2rem;  background-color: #201843;">
            <div class="card-body p-5 pt-3 pb-3 text-center box shadow-right-bottom">
  
              <div class="mb-md-0 mt-md-0 pb-3">
                <form method="POST" action="{{ route('register') }}">
                    @csrf
                    <h2 class="fw-bold mb-2 text-uppercase">{{ __('Register') }}</h2>
                    <div class="row">
                        <div class="form-outline form-white mb-4 col-md-6">
                        <input type="text" id="nom" class="form-control form-control-lg @error('nom') is-invalid @enderror" name="nom" value="{{ old('nom') }}" required autocomplete="nom" autofocus  placeholder="Nom"/>
                        

                        @error('nom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
        
                        <div class="form-outline form-white mb-4 col-md-6">
                        <input type="text" id="prenom" class="form-control form-control-lg @error('prenom') is-invalid @enderror" name="prenom" value="{{ old('prenom') }}" required autocomplete="prenom" autofocus  placeholder="Prenom"/>
                        

                        @error('prenom')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus  placeholder="Email"/>
                      

                      @error('email')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="Mot de Passe"/>
                      

                      @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <div class="form-outline form-white mb-4">
                      <input type="password" id="password-confirm" class="form-control form-control-lg"name="password_confirmation" required autocomplete="new-password"  placeholder="Confirmer le Mot de Passe"/>
                      
                    </div>
                   
                    <button class="btn btn-outline-light btn-lg px-5" type="submit">{{ __('Register') }}</button>
                    
      
                  </div>
      
                  <div>
                    <p class="mb-0">Have an account? <a href="{{ route('login') }}" class="text-white-50 fw-bold">Login</a>
                    </p>
                  </div>
                </form>
  
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
