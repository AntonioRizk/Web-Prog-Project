@extends('User.UserLayout')
@section('content')
 
<div class="topnav">
  <a class="active" href="{{route('userDashboard')}}">Home</a>
 
  
  <a class="cart"href="{{ route('cart.list') }}"><i class="fa fa-shopping-cart"></i></a>  
  
</div>
<section id="popular" class="module">
		<div class="container">

			<div class="row">
				<div class="col-sm-6 col-sm-offset-3">
					<div class="module-header wow fadeInUp animated" style="visibility: visible; animation-name: fadeInUp;">
						<h2 class="module-title">Meals cooked from the heart are the best way to start.</h2>
						<h3 class="module-subtitle">Our Whole Menu</h3>
					</div>
				</div>
			</div><!-- .row -->

			<div class="row">

				<div class="col-sm-6">
				

   @foreach($food as $food)
   <form action="{{ route('cart.store) }}" method="POST" enctype="multipart/form-data">
   @csrf 
					<div class="menu">
						<div class="row">
						
							<div class="col-sm-8">
							<img class="foodimage" src="{{URL::asset('public/CMS/assets/food_list_image/'.$food->image)}}" > 
								<h4 class="target" class="menu-title">{{$food->name}}</h4>
								
								<input type="hidden" value="{{ $food->id }}" name="food_id"> 
								<input type="hidden" value="1" name="quantity">  
								<input type="hidden" value="{{ $food->price }}" name="price"> 
								<input type="hidden" value="{{ $food->restaurant_id }}" name="restaurant_id">  
								<div class="menu-detail">{{$food->caloriecount}} KCAL / {{$food->cuisine}} / {{$food->description}}</div>
							</div>
							<div class="col-sm-4 menu-price-detail">
								
							<a class="menu-price" href="#"><i class="fa fa-shopping-cart"></i></a>

								<h4 class="menu-price">{{$food->price}}</h4>
								<button type="submit" class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button> 
							</div>
						</div> 
					</div>
					</form> 
					@endforeach   
				
					
					</div>

				</div><!-- .col-sm-6 -->

			

		</div><!-- .container -->
	</section>