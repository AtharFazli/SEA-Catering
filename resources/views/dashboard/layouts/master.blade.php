<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title')</title>

    <!-- Custom fonts for this template-->
    <link type="text/css" href="{{ asset('/dashboard/vendor/fontawesome-free/css/all.min.css') }}" rel="stylesheet">
    <link
        href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
        rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="{{ asset('/dashboard/css/sb-admin-2.min.css') }}" rel="stylesheet">

    {{-- DataTables --}}
    <link
        href="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.3.2/b-3.2.3/b-html5-3.2.3/cc-1.0.5/date-1.5.5/fh-4.0.3/r-3.0.4/datatables.min.css"
        rel="stylesheet" integrity="sha384-mKvOPIKfWT98k63t2sHYATN7tVLpjBWgEb8IJVzlccZq40HqKyLvyDudA2/gtOWG"
        crossorigin="anonymous">

        @stack('styles')

</head>

<body id="page-top">

    <!-- Page Wrapper -->
    <div id="wrapper">

        @include('dashboard.layouts.sidebar')

        <!-- Content Wrapper -->
        <div class="d-flex flex-column" id="content-wrapper">

            <!-- Main Content -->
            <div id="content">

                @include('dashboard.layouts.header')

                <!-- Begin Page Content -->
                <div class="container-fluid">

                    @yield('content')

                </div>
                <!-- /.container-fluid -->

            </div>
            <!-- End of Main Content -->

            <!-- Footer -->
            @include('dashboard.layouts.footer')
            <!-- End of Footer -->

        </div>
        <!-- End of Content Wrapper -->

    </div>
    <!-- End of Page Wrapper -->

    <!-- Scroll to Top Button-->
    <a class="scroll-to-top rounded" href="#page-top">
        <i class="fas fa-angle-up"></i>
    </a>

    <!-- Bootstrap core JavaScript-->
    <script src="{{ asset('/dashboard/vendor/jquery/jquery.min.js') }}"></script>
    <script src="{{ asset('/dashboard/vendor/bootstrap/js/bootstrap.bundle.min.js') }}"></script>

    <!-- Core plugin JavaScript-->
    <script src="{{ asset('/dashboard/vendor/jquery-easing/jquery.easing.min.js') }}"></script>

    <!-- Custom scripts for all pages-->
    <script src="{{ asset('/dashboard/js/sb-admin-2.min.js') }}"></script>

    <!-- Page level plugins -->
    <script src="{{ asset('/dashboard/vendor/chart.js/Chart.min.js') }}"></script>

    <!-- Page level custom scripts -->
    {{-- <script src="{{ asset('/dashboard/js/demo/chart-area-demo.js') }}"></script>
    <script src="{{ asset('/dashboard/js/demo/chart-pie-demo.js') }}"></script> --}}

    {{-- sweetalert --}}
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    {{-- datatables --}}
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/pdfmake.min.js"
        integrity="sha384-VFQrHzqBh5qiJIU0uGU5CIW3+OWpdGGJM9LBnGbuIH2mkICcFZ7lPd/AAtI7SNf7" crossorigin="anonymous">
    </script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/pdfmake/0.2.7/vfs_fonts.js"
        integrity="sha384-/RlQG9uf0M2vcTw3CX7fbqgbj/h8wKxw7C3zu9/GxcBPRKOEcESxaxufwRXqzq6n" crossorigin="anonymous">
    </script>
    <script
        src="https://cdn.datatables.net/v/bs5/jq-3.7.0/jszip-3.10.1/dt-2.3.2/b-3.2.3/b-html5-3.2.3/cc-1.0.5/date-1.5.5/fh-4.0.3/r-3.0.4/datatables.min.js"
        integrity="sha384-qDUNu/+PR+3ppmBeWXMcjyHqeiqdCHJeI4tfDkMLCBJ93u/fRhGotZuOT97MuSc7" crossorigin="anonymous">
    </script>

    @stack('scripts')

</body>

</html>
