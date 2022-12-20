@extends('User.UserLayout')
@section('customcss')
<head>
    
<style>
 body {
	height: 100vh;
	background: grey;
	display: flex;
	justify-content: center;
	align-items: center;
}

a{
	margin: 20px;
	padding: 40px 80px;
	border: none;
	cursor: pointer;
}

/* PIERWSZY SPOSOB WYKORZYSTANIE CIENIA */
.first{
	background: #A52A2A;
	box-shadow: inset 0px 0px 0px 0px #ff0099;
	transition: all 0.5s ease-in-out;
}
.first:hover{
	box-shadow: inset 0px -200px 0px 0px #ff0099;
}

/* DRUGI SPOSOB DLUZSZY ALE BARDZIEJ UNIWERSALNY*/
.sec{
	background: none;
	position: relative;
	overflow: hidden;
}

.sec:before, .sec:after{
	content: "";
	background: #19c3d6;
	display: block;
	position: absolute;
	left: 0;
	right: 0;
	top: 0;
	bottom: 0;
	z-index: -2;
}
.sec:after{
	background: #ff0099;
	top: 100%;
	transition: all 0.5s ease-in-out;
}
.sec:hover:after{
	top: 0;
}
</style>

</head>

@endsection 
@section('content')
 <a  class="first" href="{{route('userDashboard')}}">Pay on delievery</a> 
<a class="first" href="{{route('onlinepayment')}}">Pay online </a> 