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
                    <h3 class="content-header-title mb-0 d-inline-block">List of Orders</h3>
                </div>
              
            </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
    
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
                                            <th>User Name</th>
                                            <th>Order Status</th>
                                             <th>Actions</th>
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
                <td>{{ $o->getUser->name ?: 'N/A' }}</td>  
                <td>
                <div class="dropdown">
                <button class="btn btn-success btn-sm dropdown-toggle" type="button" data-toggle="dropdown">Status
                    <span class="caret"></span>
                </button>
                <ul class="dropdown-menu">
                @foreach ($status as $s)
                <li><a href="{{ route('update.order',['id' => $o->id, 'statusid' => $s->id] )}}" >{{ $s->name }} </a>
                @endforeach
    </ul>
            </div>
                      
                </td> 

                <td>
                
               
            <a href="javascript:deleteorder({{$o->id}})" ><i class="la la-trash" style="color:red"></i></a>
           
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

@section('customjs')


<script>
        $("#manageorders").addClass("active");
        function deleteorder(theidoforder){
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this order!",
                    type: "warning",
                    showCancelButton: true,
                    confirmButtonColor: '#DD6B55',
                    confirmButtonText: 'Yes, delete it!', 
                    cancelButtonText: "No, cancel plz!",
                    closeOnConfirm: false,
                    closeOnCancel: false
                },
                function (isConfirm) {
                    if (isConfirm) {

                        $.ajax({
                            url: "{{ route('deleteorder') }}",
                            type: 'POST',
                            data:{'id' : theidoforder},
                            success: function(res){
                       
                                var table = $('#example1').DataTable();
                                table.row('#rowdata'+theidoforder).remove().draw();
                                swal("Deleted!", "Your order has been deleted!", "success");
                               
                            },
                        });


                    } else {
                        swal("Cancelled", "Your order is safe :)", "error"); 
                    }
                });


        }
       
    </script>
@endsection