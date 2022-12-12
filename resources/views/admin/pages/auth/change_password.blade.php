@extends('admin.layouts.app_dashboard')
@section('nav-changePassword', 'active')

@section('content')
    <div class="page-heading">
        <div class="page-title">
            <div class="row">
                <div class="col-12 col-md-6 order-md-1 order-last">
                    <h3>Ubah Password</h3>
                </div>
                <div class="col-12 col-md-6 order-md-2 order-first">
                    <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item"><a href="{{ route('change-password') }}">Ubah Password</a></li>
                        </ol>
                    </nav>
                </div>
            </div>
        </div>

        {{-- Jika gagal ubah password --}}
        @if ($message = Session::get('error_msg'))
            <div style="width: 30%;">
                <div class="alert alert-danger alert-dismissible fade show msg" role="alert">
                    {{ $message }}
                    <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                </div>
            </div>
        @endif

        {{-- Start Inputan --}}
        <section class="section">
            <div class="row match-height">
                <div class="col-md-10 col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4 class="card-title">Edit Data</h4>
                        </div>
                        <div class="card-content">
                            <div class="card-body">
                                @if ($errors->any())
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach ($errors->all() as $error)
                                                <li>{{ $error }}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form class="form form-vertical" method="POST" action="{{ route('change.password') }}">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password" class="text-md-right">Password Sebelumnya</label>
                                                    <input type="password" class="form-control" id="password"
                                                        name="current_password" autocomplete="current-password" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password">Password Baru</label>
                                                    <input type="password" class="form-control" id="new_password"
                                                        name="new_password" autocomplete="current-password" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="password">Konfirmasi Password Baru</label>
                                                    <input type="password" class="form-control" id="new_confirm_password"
                                                        name="new_confirm_password" autocomplete="current-password" />
                                                </div>
                                            </div>

                                            <div class="col-12 d-flex justify-content-end">
                                                <a href="{{ route('home') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                                                <button type="submit" class="btn btn-primary me-1 mb-1">
                                                    Submit
                                                </button>
                                            </div>

                                        </div>
                                    </div>

                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        {{-- End Inputan --}}
    </div>


@endsection

@section('script')
    <script>
        $(document).ready(function() {
            setTimeout(function() {
                $('.msg').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection
