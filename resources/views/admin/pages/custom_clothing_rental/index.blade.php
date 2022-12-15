@extends('admin.layouts.app_dashboard')
@section("nav-clothing", 'active')

@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Penyewaan Baju Adat</h3>
                {{-- <p class="text-subtitle text-muted"></p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Penyewaan Baju Adat</a></li>
                        {{-- <li class="breadcrumb-item active" aria-current="page"></li> --}}
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
                        <a href="{{ route('clothing.create') }}" class="btn btn-primary">
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
                                        <th>Gambar</th>
                                        <th>Harga</th>
                                        <th>Deskripsi</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucfirst($item->name) }}</td>
                                            <td>
                                                @if($item->image != null)
                                                    <a href="{{ asset('uploads/clothing/'.$item->image) }}" target="_blank">
                                                        <img src="{{ URL::asset('uploads/clothing/'.$item->image) }}" alt="" style="max-height: 120px; max-width: 120px">
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ "Rp ". number_format($item->price, 2) }}</td>
                                            <td>{!! $item->description !!}</td>
                                            <td>
                                                <a href="{{ route('clothing.edit', ['id' => $item->id ]) }}" class="btn icon btn-primary"> 
                                                    <i class="fa fa-pencil-alt"></i> 
                                                </a>
                                                <a href="javascript:void(0)" class="btn icon btn-danger btn-delete" data-id="{{ $item->id }}"> 
                                                    <i class="fa fa-trash"></i> 
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
        // Delete Data Kategori
        $(".btn-delete").click(function(){
            var id = $(this).data("id");
            Swal.fire({
                icon: "warning",
                title: "Apakah anda yakin?",
                text: "ingin menghapus data ini!",
                showCancelButton: true,
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA, HAPUS!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax(
                    {
                        url: "clothing/"+id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": '{{ csrf_token() }}',
                        },
                        success: function (res){
                            Toastify({
                                text: res.message,
                                duration: 3000,
                                close: true,
                                backgroundColor: "#4fbe87",
                            }).showToast();
                            setTimeout(() => {
                                location.reload(true);
                            }, 500);
                        }
                    });
                }
            })
        });
    </script>
@endsection