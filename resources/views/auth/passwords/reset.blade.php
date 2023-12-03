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
                    
                        <h2 class="fw-bold mb-4 text-uppercase">Reset Password</h2>

                        
                        <form method="POST" action="{{ route('password.update') }}">
                            @csrf

                            <input type="hidden" name="token" value="{{ $token }}">

                            <div class="form-outline form-white mb-4">
                                <input type="email" id="email" class="form-control form-control-lg  @error('email') is-invalid @enderror" name="email" value="{{ $email ?? old('email') }}" required autocomplete="email"   placeholder="Email"/>

                                @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                @enderror
                            </div>

                            <div class="form-outline form-white mb-4">
                                <input id="password" type="password" class="form-control  form-control-lg @error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>

                            <div class="form-outline form-white mb-4">

                                <input id="password-confirm" type="password" class="form-control form-control-lg" name="password_confirmation" required autocomplete="new-password">

                            </div>

                            <button class="btn btn-outline-light btn-lg px-5 mb-2 mt-4" type="submit">Reset Password</button>

                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
