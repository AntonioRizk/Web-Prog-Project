@extends('CookOrStore\RestaurantLayout\restaurantlayout')
@section('customcss')
<head>
<link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
    <style>
        @media only screen and (max-width: 768px) {
            .dt-buttons{
                display: grid !important;
            }
            .dropdown-menu{
                right: 25% !important;
            }
        }
        .dt-button-collection.dropdown-menu{
            right: 50%;
        }

    </style>
@endsection

@section('content')
@if (Session::has('message'))
        <div class="alert bg-success alert-success text-white" role="alert">
            {{ Session::get('message') }}
        </div>
    @endif

    {{--    desktop	x > 1024--}}
    {{--    tablet-l (landscape)	768 < x <= 1024--}}
    {{--    tablet-p (portrait)	480 < x <= 768--}}
    {{--    mobile-l (landscape)	320 < x <= 768--}}
    {{--    mobile-p (portrait)	x <= 320--}}
    <div class="app-content content">
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                    <h3 class="content-header-title mb-0 d-inline-block">Restaurants</h3>
                </div>
                <div class="content-header-right col-md-6 col-12"> 
                    
                </div>
            </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
  
            <div class="content-body">

                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">My Restaurants</h4>  
                                </div>
                                <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                        <table id="example1" class="table table-striped table-bordered file-export2 col-l-12" style="width: 100%!important;">
                                            <thead>
                                            <tr>
                                            <th>Approved</th>
                                            <th>Name</th>
                                            <th>Email</th>
                                            <th>Phone</th>
                                            <th>Address</th>  
                                            <th>Main Image</th>
                                            <th>Delivery Fee</th>
                                            <th>Active</th>
                                             <th>Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
         @foreach ($store as $s)
         <tr id="rowdata{{$s->id}}">
                @if($s->approved == 0)
                <td>No</td>  
                
                @else
                    <td>Yes</td>  
                
                @endif
                <td>{{ $s->name ?: 'N/A' }}</td>      
                <td>{{ $s->email ?: 'N/A' }}</td>
                <td>{{ $s->phone ?: 'N/A' }}</td>
                <td>{{ $s->address ?: 'N/A' }}</td>
                <td> <img src="{{URL::asset('public/CMS/assets/restaurant_list_image/'.$s->mainimage)}}"  height="50" width="50"></td>
                <td>{{ $s->delivery_fee ?: 'N/A' }}</td>
                @if($s->active == 0){
                <td>Active</td>
                }
                @else{
                <td>Not Active</td>  
                }
                @endif
                <td>
                <a href="{{ route('DisplayStoreToEdit', $s->id)}}"><i class="la la-edit"></i></a>
                </td>
            </tr>
            @endforeach
        </tbody>
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </section>
                <!--/ Configuration option table -->
               
            </div>
        </div>
    </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->





@endsection