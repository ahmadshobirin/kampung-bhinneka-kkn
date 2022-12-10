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

        {{-- Start Inputan --}}
        <section class="section">
            <form method="POST" action="{{ route('change.password') }}">
                @csrf

                @foreach ($errors->all() as $error)
                    <p class="text-danger">{{ $error }}</p>
                @endforeach
                <div class="card">
                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <label for="password" class="text-md-right">Password Sebelumnya</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="password"
                                        name="current_password"
                                        autocomplete="current-password"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="password">Password Baru</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="new_password"
                                        name="new_password"
                                        autocomplete="current-password"
                                    />
                                </div>
                                <div class="form-group">
                                    <label for="password">Konfirmasi Password Baru</label>
                                    <input
                                        type="password"
                                        class="form-control"
                                        id="new_confirm_password"
                                        name="new_confirm_password"
                                        autocomplete="current-password"
                                    />
                                </div>
                                <div class="form-group">
                                    <div class="buttons">
                                        <button type="submit" class="btn icon icon-left btn-primary rounded-pill">
                                            <i data-feather="edit"></i>
                                            Ubah
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </form>
            
        </section>
        {{-- End Inputan --}}
    </div>


@endsection