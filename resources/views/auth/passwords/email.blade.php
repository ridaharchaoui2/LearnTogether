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

                        @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                        @endif
                        <form method="POST" action="{{ route('password.email') }}">
                            @csrf

                            <input type="email" id="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email"   placeholder="Email"/>

                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror

                            <button class="btn btn-outline-light btn-lg px-5 mb-2 mt-4" type="submit">Send Password Reset Link</button>

                        </form>
                </div>
              </div>
            </div>
          </div>
        </div>
    </section>
@endsection
