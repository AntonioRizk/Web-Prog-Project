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
                    <h3 class="content-header-title mb-0 d-inline-block">Foods</h3>
                </div>
                <div class="content-header-right col-md-6 col-12"> 
                    <div class="float-md-right">
                        <button onclick="window.location.href='{{asset('AddFood')}}';" class="btn btn-dark round btn-glow px-2" type="button" aria-haspopup="true" aria-expanded="false">Add Foods</button>
                    </div>
                </div>
            </div>
    <!-- ////////////////////////////////////////////////////////////////////////////-->
  
            <div class="content-body">

                <section id="configuration">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-header">
                                    <h4 class="card-title">Foods</h4>  
                                </div>
                                <div class="card-content collapse show">
                                    <div class="card-body card-dashboard">
                                        <table id="example1" class="table table-striped table-bordered file-export2 col-l-12" style="width: 100%!important;">
                                            <thead>
                                            
                                            <th>Name</th>
                                            <th>caloriecount</th>
                                            <th>cuisine</th>
                                            <th>diets</th>
                                            <th>Image</th>
                                            <th>category</th>
                                             <th>price</th>
                                             <th>Availablity</th>
                                             <th>Actions</th>
                                            </tr>
                                            </thead>

                                            <tbody>
         @foreach ($food as $s)
         <tr id="rowdata{{$s->id}}">
               <td>{{ $s->name ?: 'N/A' }}</td>
               <td>{{ $s->caloriecount ?: 'N/A' }}</td>
               <td>{{ $s->cuisine ?: 'N/A' }}</td>
               <td>{{ $s->diets ?: 'N/A' }}</td>
               <td> <img src="{{URL::asset('public/CMS/assets/food_list_image/'.$s->image)}}"  height="50" width="50"></td>
               <td>{{ $s->getCategory->name ?: 'N/A' }}</td>
               <td>{{ $s->price ?: 'N/A' }}</td>
               <td>{{ $s->available ?: 'N/A' }}</td>
               <td>
                <a href="{{ route('DisplayFoodToEdit', $s->id)}}"><i class="la la-edit"></i></a>
                <a href="javascript:deletefood({{$s->id}})" ><i class="la la-trash" style="color:red"></i></a>
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
        $("#managefoods").addClass("active");
        function deletefood(theidoffood){
            swal({
                    title: "Are you sure?",
                    text: "You will not be able to recover this food!",
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
                            url: "{{ route('deletefood') }}",  
                            type: 'POST',
                            data:{'id' : theidoffood},
                            success: function(res){
                       
                                var table = $('#example1').DataTable();
                                table.row('#rowdata'+theidoffood).remove().draw();
                                swal("Deleted!", "Your food has been deleted!", "success");
                               
                            },
                        });


                    } else {
                        swal("Cancelled", "Your food is safe :)", "error");
                    }
                });


        }
       
    </script>
@endsection