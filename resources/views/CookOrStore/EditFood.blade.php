@extends('CookOrStore\RestaurantLayout\restaurantlayout')
@section('content')

<div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Add Food</h3> 
                </div>
            </div>
            <div class="content-body">
            <div class="row" id="default">
                    <div class="col-12">
                        <div class="card clientcard">
                            <div class="card-header">
                                <h4 class="card-title">Food Info</h4>
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
  <form action = "{{ route('updatefood',$food->id)}}" method = "post" class="form-group" >     
  @csrf
  <div class="form-body"> 
      <div class="row">
      <div class="col-md-12">   
      <div class="form-group">
      <label for="userinput1" >Name</label>
    <input type="text" class="form-control" value="{{$food->name}}"  name="name" ><br>
    @error('name')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
    </div>
  </div>
  <div class="col-md-12">   
      <div class="form-group">
      <label for="userinput1" >Calories</label>
    <input type="text" class="form-control" value="{{$food->caloriecount}}" name="caloriecount" ><br>
    @error('caloriecount')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
    </div>
  </div>     
  <div class="col-md-12">   
      <div class="form-group">
      <label for="userinput1" >Cuisine</label>
    <input type="text" class="form-control" value="{{$food->cuisine}}" name="cuisine" ><br>
    @error('cuisine')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
    </div>
  </div>
  
  <div class="col-md-12">
    <div class="form-group">
    <label for="userinput1" >Description</label>
     <textArea type="text" name="description" rows="3" placeholder="Description"
      class="form-control @error('description') is-invalid @enderror" >{{$food->description}}</textArea>
       @error('description')
       <span class="invalid-feedback" role="alert">
        <strong>{{ $message }}</strong>
        </span>
          @enderror
          </div>
    </div>  
  <div class="col-md-12">
    <div class="form-group"> 
                                       
    <label for="userinput1" >Category</label> 
                                        
    <select  class="form-control" name="category_id" > 
     @foreach($categorie as $categoryf)  
      <option  name="category_id" value="{{ $categoryf->id }} ">{{$categoryf->name }}</option>     
       @endforeach 
       </select>
       @error('category_id')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
       </div>
       </div>
       <div class="col-md-12">   
      <div class="form-group">
      <label for="userinput1" >Price</label>
    <input type="text" class="form-control" value="{{$food->price}}" name="price" ><br>
    @error('price')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
    </div>
  </div>    
  <div class="col-md-12">   
      <div class="form-group">
      <label for="userinput1" >Discount</label>    
    <input type="text" class="form-control" value="{{$food->discountpercentage}}" name="discountpercentage" ><br>
    @error('discountpercentage')
       <span class="invalid-feedback" role="alert">
       <strong>{{ $message }}</strong>
       </span>
       @enderror
    </div>
  </div>     
  <div class="col-md-12">      
      <div class="form-group"> 
      <label for="userinput1" >Availability</label>
      <select name="available" id="available"  class="form-select">
      <option value="1">Active</option> 
    <option value="0">Not Active</option> 
    </select>    
    @error('available')
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
