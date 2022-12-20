@extends('User\userorderlayout\userorderlayout')
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
  
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    <a href="{{route('userDashboard')}}"><i class="la la-angle-left"></i></a> 
            <div class="content-body">

                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Orders</h4>
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table id="example1" class="table table-striped table-bordered file-export2 col-l-12" style="width: 100%!important;">
                                            <thead>
                                            <tr>
                                          
                                            <th>Order number</th>
                                            <th>Food</th>
                                            <th>Date Time</th>
                                            <th>Shipping Address</th>
                                            <th>Quantity</th> 
                                            <th>Total</th>       
                            
                                            <th>Order Status</th>
                                            
                                            </tr>
                                            </thead>

                                            <tbody>    
        @foreach ($orders as $o)
        <tr id="rowdata{{$o->id}}">
            
                <td>{{ $o->orderno ?: 'N/A' }}</td>
                <td>{{ $o->getFood->name ?: 'N/A' }}</td>
                <td>{{ $o->datetime ?: 'N/A' }}</td>  
                <td>{{ $o->shippingaddress ?: 'N/A' }}</td>  
                <td>{{ $o->quantity ?: 'N/A' }}</td>  
                <td>{{ $o->total ?: 'N/A' }}</td>  
                @if($o->orderstatus_id == NULL)
                <td>Pending</td>  
                @else
                <td>{{ $o->getStatus->name ?: 'N/A' }}</td> 
                @endif   
               

                
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

