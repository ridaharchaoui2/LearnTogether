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
                
                    <h2 class="fw-bold mb-2 text-uppercase">{{ __('Verify Your Email Address') }}</h2>

                    @if (session('resent'))
                        <div class="alert alert-success" role="alert">
                            {{ __('A fresh verification link has been sent to your email address.') }}
                        </div>
                    @endif

                    {{ __('Before proceeding, please check your email for a verification link.') }}
                    {{ __('If you did not receive the email') }},

                    <form class="d-inline" method="POST" action="{{ route('verification.resend') }}">
                        @csrf
                        <button type="submit" class="btn btn-link text-white-50">{{ __('click here to request another') }}</button>.
                    </form>
                    
  
            </div>
          </div>
        </div>
      </div>
    </div>
</section>
@endsection
