@extends('admin.layouts.app_dashboard')
@section("nav-master1", 'active')
@section("nav-master", 'block')
@section("nav-user", 'active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master</h3>
                <p class="text-subtitle text-muted">Admin</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Admin</li>
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
                <a href="{{ route('admin.create') }}" class="btn btn-primary">
                    <i class="fa fa-plus"></i> Tambah Data
                </a>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table class="table table-hover">
                        <thead>
                            <tr>
                                <th>No</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Status</th>
                                <th>Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($data as $item)
                            <tr>
                                <td>{{ $loop->iteration }}</td>
                                <td>{{ ucfirst($item->name) }}</td>
                                <td>{{ $item->email }}</td>
                                <td>
                                    <span class="badge {{ $item->status == \App\Models\User::STATUS_ACTIVE ? 'bg-primary' : 'bg-dark' }}">
                                        {{ $item->status }}
                                    </span>
                                </td>
                                <td>
                                    <a href="{{ route('admin.edit', ["id" => $item->id]) }}" class="btn icon btn-primary"> <i class="fa fa-pencil-alt"></i> </a>
                                    <a href="{{ route('admin.edit.password', ["id" => $item->id]) }}" class="btn icon btn-warning"> <i class="fa fa-key"></i> </a>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                        <tfoot>
                            {{ $data->links() }}
                        </tfoot>
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