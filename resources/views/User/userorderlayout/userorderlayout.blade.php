<!DOCTYPE html>
<html class="loading" lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Food-Delivery</title>
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('CMS/app-assets/images/logo/favicon.ico') }}">
    
    <link rel="apple-touch-icon" sizes="57x57" href="{{ asset('CMS/app-assets/images/logo/apple-icon-57x57.png') }}">
    <link rel="apple-touch-icon" sizes="60x60" href="{{ asset('CMS/app-assets/images/logo/apple-icon-60x60.png') }}" >
    <link rel="apple-touch-icon" sizes="72x72" href="{{ asset('CMS/app-assets/images/logo/apple-icon-72x72.png') }}">
    <link rel="apple-touch-icon" sizes="76x76" href="{{ asset('CMS/app-assets/images/logo/apple-icon-76x76.png') }}">
    <link rel="apple-touch-icon" sizes="114x114" href="{{ asset('CMS/app-assets/images/logo/apple-icon-114x114.png') }}">
    <link rel="apple-touch-icon" sizes="120x120" href="{{ asset('CMS/app-assets/images/logo/apple-icon-120x120.png') }}" >
    <link rel="apple-touch-icon" sizes="144x144" href="{{ asset('CMS/app-assets/images/logo/apple-icon-144x144.png') }}" >
    <link rel="apple-touch-icon" sizes="152x152" href="{{ asset('CMS/app-assets/images/logo/apple-icon-152x152.png') }}"  >
    <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('CMS/app-assets/images/logo/apple-icon-180x180.png') }}" >
    <link rel="icon" type="image/png" sizes="192x192" href="{{ asset('CMS/app-assets/images/logo/android-icon-192x192.png') }}" >
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('CMS/app-assets/images/logo/favicon-32x32.png') }}" >
    <link rel="icon" type="image/png" sizes="96x96" href="{{ asset('CMS/app-assets/images/logo/favicon-96x96.png') }}">
    <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('CMS/app-assets/images/logo/favicon-16x16.png') }}">
    <link rel="manifest" href="{{ asset('CMS/app-assets/images/logo/manifest.json') }}">
    <meta name="msapplication-TileColor" content="#ffffff">
    <meta name="msapplication-TileImage" content="/ms-icon-144x144.png">
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i|Quicksand:300,400,500,700"
          rel="stylesheet">
    <link href="https://maxcdn.icons8.com/fonts/line-awesome/1.1/css/line-awesome.min.css"
          rel="stylesheet">


    <link rel="stylesheet" href="{{ asset('CMS/app-assets/css/vendors.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/css/app.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/css/core/menu/menu-types/vertical-menu-modern.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/css/core/colors/palette-gradient.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/css/pages/timeline.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/assets/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/css/bascustomize.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/select2/css/select2.min.css')}}">
    <link rel="stylesheet" href="{{ asset('CMS/select2-bootstrap4-theme/select2-bootstrap4.min.css')}}">
    <link rel="stylesheet" href="{{ asset('CMS/css/sweet-alert.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/css/fontawesome.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/css/templatemo-style.css') }}">

    <link rel="stylesheet" href="{{ asset('CMS/app-assets/vendors/css/tables/datatable/datatables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/vendors/css/tables/extensions/responsive.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/vendors/css/tables/extensions/colReorder.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/vendors/css/tables/extensions/buttons.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/vendors/css/tables/datatable/buttons.bootstrap4.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/app-assets/vendors/css/tables/extensions/fixedHeader.dataTables.min.css') }}">
    <link rel="stylesheet" href="{{ asset('CMS/assets/css/custom.css') }}">
    @yield('customcss')
</head>

<body class="vertical-layout vertical-menu-modern 2-columns   menu-expanded fixed-navbar"
      data-open="click" data-menu="vertical-menu-modern" data-col="2-columns">


@yield('content')


<script src="{{ asset('CMS/app-assets/vendors/js/vendors.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/js/core/app-menu.js') }}"></script>
<script src="{{ asset('CMS/app-assets/js/core/app.js') }}"></script>
<script src="{{ asset('CMS/app-assets/js/scripts/customizer.js') }}"></script>
<script src="{{ asset('CMS/select2/js/select2.full.min.js')}}"></script>
<script src="{{ asset('CMS/js/jquery.toaster.js') }}"></script>
<script src="{{ asset('CMS/js/sweet-alert.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/datatable/datatables.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/datatable/dataTables.responsive.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/buttons.colVis.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/datatable/dataTables.colReorder.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/datatable/buttons.bootstrap4.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/datatable/dataTables.fixedHeader.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/datatable/dataTables.buttons.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/buttons.flash.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/jszip.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/pdfmake.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/vfs_fonts.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/buttons.html5.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/vendors/js/tables/buttons.print.min.js') }}"></script>
<script src="{{ asset('CMS/app-assets/js/scripts/tables/datatables/datatable-advanced.js') }}"></script>
<script src="{{ asset('CMS/app-assets/js/scripts/tables/datatables-extensions/datatable-responsive.js') }}"></script>
<script>

    $(document).ready(function(){
        $.ajaxSetup({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            }
        });
    });

</script>
<script>
    $(function () {
        $("#example1").DataTable({
            "responsive": true, "lengthChange": true, "autoWidth": false,
            "order": [[ 0, "desc" ]],
            "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": false,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });

</script>

<script>
    $('.select2').select2()
    $('.select2bs4').select2({
        theme: 'bootstrap4',
        sorter: function(results) {
            var query = $('.select2-search__field').val().toLowerCase();
            return results.sort(function(a, b) {
                return a.text.toLowerCase().indexOf(query) -
                    b.text.toLowerCase().indexOf(query);
            });
        }
    })

    $("form").submit(function(){
        $('.btn[type="submit"]').attr("disabled","true")

    });

</script>
@yield('customjs')

</body>
</html>
