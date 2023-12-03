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
          <div class="row d-flex justify-content-center align-items-center h-100 ">
            <div class="col-12 col-md-8 col-lg-6 col-xl-5 ">
              <div class="card text-white " style="border-radius: 2rem; background-color: #201843;">
                <div class="card-body p-5 text-center box shadow-right-bottom">
      
                  <div class="mb-md-0 mt-md-0 pb-3">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <h2 class="fw-bold mb-2 text-uppercase">Login</h2>
          
                        <div class="form-outline form-white mb-4">
                            
                          <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"   placeholder="Email"/>
                          

                          @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
          
                        <div class="form-outline form-white mb-4">
                          <input type="password" id="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="current-password"  placeholder="Password"/>
                          

                          @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6 offset-md-3">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
    
                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>
                        
                        
          
                        <button class="btn btn-outline-light btn-lg px-5 mb-2" type="submit">Connexion</button>
                        @if (Route::has('password.request'))
                            <p class="small mb-1 pb-lg-0">
                                <a class="text-white-50" href="{{ route('password.request') }}">
                                    Forgot password?
                                </a>
                            </p>
                        @endif
          
                      </div>
          
                      <div>
                        <p class="mb-0">Don't have an account? <a href="{{ route('register') }}" class="text-white-50 fw-bold">Sign Up</a>
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
