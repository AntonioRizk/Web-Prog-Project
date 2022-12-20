@extends('User.UserLayout')
@section('customcss')
<head>
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

</head>

@endsection 
@section('content')
  
 
<div class="topnav">
  <a class="active" href="{{route('userDashboard')}}">Home</a>
  <a href="{{route('reviewdashboard',$restau)}}">Add review</a>
  <div class="search-container">
    <form action="{{ route('search')}}" method="post">
		@csrf
      <input type="text" id="Search" name="name" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
  </div>
  
  <a class="cart"href="{{ route('cart.list') }}"><i class="fa fa-shopping-cart"></i></a>  
  
</div>
  
<div class="cards-list">
  @foreach($category as $cat)
<div class="card 1">
  <div class="card_image" > <a href="{{ route('categorymenu',['resid' => $cat->restaurant_id, 'catid' => $cat->id] )}}"><img class="cat_img" src="{{URL::asset('public/CMS/assets/category_list_image/'.$cat->image)}}" ></a> </div>
  <div class="card_title title-white">
    <p class="target">{{$cat->name}}</p>
  </div>
</div>  
@endforeach
 
  </div>

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
<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
@csrf
   @foreach($food as $food)
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
								<button class="px-4 py-2 text-white bg-blue-800 rounded">Add To Cart</button> 
							</div>
						</div> 
					</div>
					@endforeach   
					</form>
					
					
					</div>

				</div><!-- .col-sm-6 -->

			

		</div><!-- .container -->
	</section>
	<section id="popular" class="module">
		<div class="container">

			<div class="row">

				<div class="col-sm-6">
<form action="{{ route('cart.store') }}" method="POST" enctype="multipart/form-data">
@csrf
   @foreach($offers as $food)
					<div class="menu">
						<div class="row">
						
							<div class="col-sm-8">
							
								<h4 class="target" class="menu-title">{{$food->getFoods->name}}</h4>
	
								
							</div>
							<div class="col-sm-4 menu-price-detail">
								

								<h4 class="menu-price">Discount: {{$food->percentage}}</h4>
								
							</div>
						</div> 
					</div>
					@endforeach
					</form>
					
					
					</div>

				</div><!-- .col-sm-6 -->

			

		</div><!-- .container -->
	</section>
</body>


@section('customjs')
<script>
function myFunction() {
  var input = document.getElementById("Search");
  var filter = input.value.toLowerCase();
  var nodes = document.getElementsByClassName('target');

  for (i = 0; i < nodes.length; i++) {
    if (nodes[i].innerText.toLowerCase().includes(filter)) {
      nodes[i].style.display = "block";
    } else {
      nodes[i].style.display = "none";
    }
  }
}
</script>
@endsection




