@extends('admin.layouts.app_dashboard')
@section("nav-master1", 'active')
@section("nav-master", 'block')
@section("nav-demografi", 'active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master</h3>
                <p class="text-subtitle text-muted">Demografi</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Demografi</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    {{-- Alert jika berhasil --}}
    @if ($message = Session::get('success'))    
        <div style="width: 30%;">
            <div
                class="alert alert-success alert-dismissible fade show msg"
                role="alert"
            >
                {{ $message }}
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
                ></button>
            </div>
        </div>
    @endif

    {{-- Alert jika gagal --}}
    @if ($message = Session::get('error_msg'))    
        <div style="width: 30%;">
            <div
                class="alert alert-danger alert-dismissible fade show msg"
                role="alert"
            >
                {{ $message }}
                <button
                type="button"
                class="btn-close"
                data-bs-dismiss="alert"
                aria-label="Close"
                ></button>
            </div>
        </div>
    @endif

    <section class="section">
        <div class="card">
            <div class="card-header">
                <h3>Demografi</h3>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>RT</th>
                                <th>Jumlah KK</th>
                                <th>Jumlah Warga</th>
                                <th>Jumlah Balita</th>
                                <th>Jumlah Lansia</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($item->neighborhood) }}</td>
                                <td><b>{{ $item->head_of_family }}</b></td>
                                <td><b>{{ $item->inhabitant }}</b></td>
                                <td><b>{{ $item->toddler }}</b></td>
                                <td><b>{{ $item->elderly }}</b></td>
                                <td>
                                    <a href="{{ route('demografi.edit', ['id' => $item->id ]) }}" class="btn icon btn-primary"> <i class="fa fa-pencil-alt"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>

    </section>
</div>
@endsection

@section('script')
    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $('.msg').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection