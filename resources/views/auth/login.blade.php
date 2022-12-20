@extends('layouts\loginlayout') 

@section('content')
<div style="overflow-y: scroll;"> 
<div class="content-body" >
        <section class="flexbox-container"> 
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center"> 
                                <div class="p-1">
                                    <img style="height: 100px" src="https://www.creativefabrica.com/wp-content/uploads/2018/10/Chef-restaurant-logo-by-DEEMKA-STUDIO-4.jpg" alt="branding logo">
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"> 
                                <span>LOGIN </span>
                            </h6>
                        </div>  
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal form-simple" action="{{ route('login') }}" method="POST">
                                    @csrf
                                    

                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input id="email" type="email" class="form-control form-control-lg input-lg"  name="email"
                                               placeholder="Your Email Address" required>
                                        <div class="form-control-position">
                                            <i class="ft-mail"></i>
                                        </div>
                                    </fieldset>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                   
                                   
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input id="password" type="password" class="form-control form-control-lg input-lg mb-0"  name="password" autocomplete="new-password"
                                               placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                    </fieldset>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                   
                                    <button type="submit" class="btn btn-info btn-lg btn-block" ><i class="ft-unlock"></i>Login</button>
									  <div class="row mb-3">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-8 offset-md-4">
                            

                                @if (Route::has('password.request'))
                                    <a class="btn btn-link" href="{{ route('password.request') }}">
                                        {{ __('Forgot Your Password?') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                                </form>
                            </div>
                        </div>
                    </div>  
                </div>
            </div>
        </section>
    </div>
    </div>
    </div>
</div>
@endsection
