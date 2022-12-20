
<head>
<link rel="stylesheet" href="{{ asset('User/css/user.css') }}">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
@section('content')

<div class="topnav">
  <a class="active" href="{{route('userOrders')}}">Orders</a>
  <a  href="{{route('logout')}}">Logout</a>
 
  
</div>

<div class="main">
  <h1>All you need is love and home cooked food</h1>
   <ul class="cards">
 
@foreach($restaurants as $res)  
@if($res->approved == 1)
  
 
    <li class="cards_item">
      <div class="card">
        <div class="card_image"><img src="{{URL::asset('public/CMS/assets/restaurant_list_image/'.$res->mainimage)}}"></div>
        <div class="card_content">
          <h2 class="card_title">{{$res->name}}</h2>
          <p class="card_text">Address: {{$res->address}}</p>
          <p class="card_text">Phone Number: {{$res->phone}}</p>
         <a class="btn card_btn" href="{{ route('menudashboard',$res->id)}}">View More</a>
        </div>
      </div>
    </li>
 @endif
  @endforeach
 </ul>
</div>

<h3 class="made_by">Made with ♡</h3>