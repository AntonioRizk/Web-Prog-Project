<!DOCTYPE html>
<html class="loading" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    
    <link rel="stylesheet" href="{{ asset('User/css/menu.css') }}">
    <link rel="stylesheet" href="{{ asset('User/css/categories.css') }}">

    @yield('customcss')
</head>
<body>


<script src="{{ asset('User/js/menu.js') }}"></script>
</body>