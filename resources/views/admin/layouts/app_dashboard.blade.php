
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    <link rel="stylesheet" href="{{ URL::asset('assets/css/bootstrap.min.css') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main/app.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/main/app-dark.css') }}">
    <link rel="shortcut icon" href="{{ URL::asset('assets/img/favicon.ico') }}">
    
    <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/fontawesome.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/shared/iconly.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/extensions/toastify-js/src/toastify.css') }}">

    {{-- Datatable --}}
    <link rel="stylesheet" href="{{ URL::asset('assets/extensions/simple-datatables/style.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/extensions/datatables.net-bs5/css/dataTables.bootstrap5.min.css') }}">
    <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/simple-datatables.css') }}">

    <link rel="stylesheet" href="{{ URL::asset('assets/extensions/sweetalert2/sweetalert2.min.css') }}">
    @yield('css')
</head>
<body>
    <div id="app">
        @include('admin.layouts.sidebar')
    </div>
    <div id="main">
        <header class="mb-3">
            <a href="#" class="burger-btn d-block d-xl-none">
                <i class="bi bi-justify fs-3"></i>
            </a>
        </header>
        <div id="main-content">
            @yield('content')
        </div>
        <footer>
            <div class="footer clearfix mb-0 text-muted">
                <div class="float-start">
                    <p>2022@ &copy; Template by Mazer</p>
                </div>
                <div class="float-end">
                    <p>Crafted by <a target="_blank" href="https://www.untag-sby.ac.id/">KKN Universitas 17 Agustus Surabaya 2022</a></p>
                </div>
            </div>
        </footer>
        <!--Loading Bar-->
        <div class="div-loading">
            <div id="loader" style="display: none;"></div>
        </div>
    </div>
    {{-- start script --}}
    <script src="{{ URL::asset('assets/js/app.js') }}"></script>
    <script src="{{ URL::asset('assets/js/bootstrap.js') }}"></script>
    
    <script src="{{ URL::asset('assets/js/jquery-3.5.1.js') }}"></script>
    <script src="{{ URL::asset('assets/js/select2.min.js') }}"></script>

    <script src="{{ URL::asset('assets/extensions/toastify-js/src/toastify.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/pages/toastify.js') }}"></script> --}}

    {{-- Datatable --}}
    <script src="{{ URL::asset('assets/extensions/jquery/jquery.min.js') }}"></script>
    <script src="https://cdn.datatables.net/v/bs5/dt-1.12.1/datatables.min.js"></script>
    <script src="{{ URL::asset('assets/extensions/simple-datatables/umd/simple-datatables.js') }}"></script>

    <script src="{{ URL::asset('assets/extensions/sweetalert2/sweetalert2.min.js') }}"></script>
    {{-- <script src="{{ URL::asset('assets/js/pages/sweetalert2.js') }}"></script> --}}

    <script>
        // Alert jika berhasil
        @if ($message = Session::get('success'))    
            Toastify({
                text: "{{ $message }}",
                duration: 3000,
                close: true,
                backgroundColor: "#4fbe87",
            }).showToast();
        @endif

        // ALert jika gagal
        @if ($message = Session::get('error_msg'))    
            Toastify({
                text: "{{ $message }}",
                duration: 3000,
                close: true,
                backgroundColor: "#f01d1d",
            }).showToast();
        @endif
    </script>
    
    @yield('script')
</body>

</html>
