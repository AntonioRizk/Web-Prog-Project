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
                                <span>Sign Up</span>
                            </h6>
                        </div>  
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal form-simple" action="{{ route('register') }}" method="POST">
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input type="text" class="form-control form-control-lg input-lg" id="user-name" placeholder="Name" name="name">
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>

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
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                        <input id="phone" type="phone" class="form-control form-control-lg input-lg"  name="phone"
                                               placeholder="Your Phone-number" required>
                                        <div class="form-control-position">
                                            <i class="ft-phone"></i>
                                        </div>
                                    </fieldset>
                                    @error('phone')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <fieldset class="form-group position-relative has-icon-left mb-1">
                                    <select name="role_id" id="role_id" class="form-select">
                                        <option value="2">User</option> 
                                        <option value="3">Cook/Resaurant</option>
                                    </select> 
        
                                    </fieldset>
                                    @error('role_id')
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
                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input id="password-confirm" type="password" class="form-control form-control-lg input-lg" name="password_confirmation"
                                               placeholder="Confirm Password" autocomplete="new-password" required>
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                    </fieldset>
                                    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Sign Up</button>
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
