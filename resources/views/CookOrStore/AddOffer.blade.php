@extends('CookOrStore\RestaurantLayout\restaurantlayout')
@section('content')

<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Add Offer</h3> 
                </div>
            </div>
            <div class="content-body">
            <div class="row" id="default">
                    <div class="col-12">
                        <div class="card clientcard">
                            <div class="card-header">
                                <h4 class="card-title">Offer Info</h4>
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
  <form action = "{{ route('InsertOffers')}}" method = "post" class="form-group" >   
  @csrf
  <div class="form-body"> 
      <div class="row">
      <div class="col-md-12">   
      <div class="form-group">
      <label for="userinput1" >Percentage</label>
    <input type="text" class="form-control"  name="percentage" ><br>
    @error('percentage')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
    </div>
  </div>
  <div class="col-md-12">
    <div class="form-group"> 
                                       
    <label for="userinput1" >Food</label>  
                                        
    <select  class="form-control" name="food_id" >     
     @foreach($food as $f)  
      <option  name="food_id" value="{{ $f->id }} ">{{$f->name }}</option>     
       @endforeach 
       </select>
       @error('food_id')
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
