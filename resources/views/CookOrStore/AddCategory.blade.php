@extends('CookOrStore\RestaurantLayout\restaurantlayout')
@section('content')

<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Add Category</h3> 
                </div>
            </div>
            <div class="content-body">
            <div class="row" id="default">
                    <div class="col-12">
                        <div class="card clientcard">
                            <div class="card-header">
                                <h4 class="card-title">Category Info</h4>
                                <a class="heading-elements-toggle"><i class="la la-ellipsis-v font-medium-3"></i></a>
                                <div class="heading-elements">
                                    <ul class="list-inline mb-0">
                                        <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                                        <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                                        <li><a data-action="expand"><i class="ft-maximize"></i></a></li>
                                    </ul>
                                </div> 
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard ">
  <form action = "{{ route('InsertCategory')}}" method = "post" class="form-group" enctype="multipart/form-data">
  @csrf
  <div class="form-body"> 
      <div class="row">
      <div class="col-md-12">   
      <div class="form-group">
      <label for="userinput1" >Name</label>
    <input type="text" class="form-control"  name="name" ><br>
    @error('name')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
    </div>
  </div>     
  <div class="col-md-12">
    <div class="form-group"> 
    <label for="userinput1" >Image</label>                    
    <input type="file" class="form-control"  name="image">
    @error('image')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
     </div>  
     </div>                      
  <div class="col-md-12" class="submitbutton">
                                            <div class="form-group">
                                                <button  id="mybtn"
                                                        class="btn btn-success displayblock">
                                             Submit 
                                                </button>
                                            </div>
                                        </div>


                                    </div> 
                                    </form>
                                    </div>  
                                </div>

                            </div>
                        </div>
                    </div>
                </div>


           </div>
        </div>
    </div>

@endsection
