@extends('admin.layouts.app_dashboard')
@section("nav-master1", 'active')
@section("nav-master", 'block')
@section("nav-category", 'active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master</h3>
                <p class="text-subtitle text-muted">Kategori</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Kategori</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>

    <section>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('category.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Nama</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucfirst($item->name) }}</td>
                                            <td>
                                                @if($item->status)
                                                    <span class="badge bg-primary"> Aktif </span>
                                                @else
                                                    <span class="badge bg-danger"> Tidak Aktif </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('category.edit', ['id' => $item->id ]) }}" class="btn icon btn-primary"> 
                                                    <i class="fa fa-pencil-alt"></i> 
                                                </a>
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
</div>
@endsection

@section('script')
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
@endsection