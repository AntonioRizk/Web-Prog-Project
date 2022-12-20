@extends('CookOrStore\RestaurantLayout\restaurantloginlayout') 

@section('content')
    <div class="content-body">
        <section class="flexbox-container"> 
            <div class="col-12 d-flex align-items-center justify-content-center">
                <div class="col-md-4 col-10 box-shadow-2 p-0">
                    <div class="card border-grey border-lighten-3 m-0">
                        <div class="card-header border-0">
                            <div class="card-title text-center"> 
                                <div class="p-1">
                                    <img style="height: 200px" src="{{ asset('cms/app-assets/images/logo/weblogo.png') }}" alt="branding logo">
                                </div>
                            </div>
                            <h6 class="card-subtitle line-on-side text-muted text-center font-small-3 pt-2"> 
                                <span>LOGIN TO RestaurantDashboard</span>
                            </h6>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                <form class="form-horizontal form-simple" action="" method="POST">
                                    @csrf
                                    <fieldset class="form-group position-relative has-icon-left mb-2">
                                        <input id="email" type="email" name="email" class="form-control form-control-lg input-lg" placeholder="email"
                                               autocomplete="email"  required>
                                        <div class="form-control-position">
                                            <i class="ft-user"></i>
                                        </div>
                                    </fieldset>
                                    @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror

                                    <fieldset class="form-group position-relative has-icon-left">
                                        <input name="password" id="password" type="password" class="form-control form-control-lg input-lg"
                                               autocomplete="current-password"  placeholder="Enter Password" required>
                                        <div class="form-control-position">
                                            <i class="la la-key"></i>
                                        </div>
                                    </fieldset>
                                    @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <div class="form-group row">
                                      
                                    <button type="submit" class="btn btn-info btn-lg btn-block"><i class="ft-unlock"></i> Login</button>
                                </form>
                               
                                <div> 
            
                                </div>
                            </div>
                        </div>
                        
                    </div>
                </div> 
            </div>
        </section>
    </div>
@endsection
