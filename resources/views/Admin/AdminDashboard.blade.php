@extends('Admin.Adminlayouts.adminlayout')
@section('customcss')

<head>
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
</head>
<style>
    @media only screen and (max-width: 768px) {
        .dt-buttons {
            display: grid !important;
        }

        .dropdown-menu {
            right: 25% !important;
        }
    }

    .dt-button-collection.dropdown-menu {
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

{{-- desktop x > 1024--}}
{{-- tablet-l (landscape) 768 < x <=1024--}} {{-- tablet-p (portrait) 480 < x <=768--}} {{-- mobile-l (landscape) 320 <
    x <=768--}} {{-- mobile-p (portrait) x <=320--}} <div class="app-content content">
    <div class="content-wrapper">
        <div class="content-header row">
            <div class="content-header-left col-md-6 col-12 mb-2 breadcrumb-new">
                <h3 class="content-header-title mb-0 d-inline-block">List of Users</h3>
            </div>

        </div>
        <!-- ////////////////////////////////////////////////////////////////////////////-->

        <div class="content-body">

            <section id="configuration">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                @if(Session::get('AdminPage') == 'Users')
                                <h4 class="card-title">Users</h4>
                                @else
                                <h4 class="card-title">Restaurant/Cook Requests</h4>
                                @endif
                            </div>
                            <div class="card-content collapse show">
                                <div class="card-body card-dashboard">
                                    <table id="example1"
                                        class="table table-striped table-bordered file-export2 col-l-12"
                                        style="width: 100%!important;">
                                        <thead>
                                            <tr>
                                                @if(Session::get('AdminPage') == 'Users')
                                                <th>ID</th>
                                                <th>Name</th>
                                                <th>Email</th>
                                                <th>Actions</th>
                                                @endif
                                                @if(Session::get('AdminPage') == 'Requests')
                                                <th>ID</th>
                                                <th>Cook/Restaurant Name</th>
                                                <th>Status</th>
                                                @endif
                                            </tr>
                                        </thead>

                                        <tbody>
                                            @if(Session::get('AdminPage') == 'Users')
                                            @if($Users != null)
                                            @foreach($Users as $user)
                                            <tr>
                                                <td>{{$user->id}}</td>
                                                <td>{{$user->name}}</td>
                                                <td>{{$user->email}}</td>
                                                <td>
                                                    <button type="button"
                                                        class="btn btn-sm btn-square btn-neutral text-danger-hover">
                                                        <a href="delete/{{$user->id}}">
                                                            <i class="la la-trash"></i>
                                                        </a>
                                                    </button>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            @endif

                                            @if(Session::get('AdminPage') == 'Requests')
                                            @if($Requests != null)
                                            @foreach($Requests as $Request)
                                            <tr>
                                                <td>{{$Request->id}}</td>
                                                <td>{{$Request->name}}</td>
                                                <td>
                                                    <a class="btn btn-success" href="{{ route('accept', $Request->id)}}">  
                                                       Success
                                                    </a>
                                                        <a class="btn btn-danger" href="{{ route('reject', $Request->id)}}">
                                                           Reject
                                                        </a>
                                                </td>
                                            </tr>
                                            @endforeach
                                            @endif
                                            @endif
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


    @endsection