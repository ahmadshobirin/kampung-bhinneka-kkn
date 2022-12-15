@extends('admin.layouts.app_dashboard')
@section("nav-gallery", 'active')
 
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Galeri</h3>
                {{-- <p class="text-subtitle text-muted"></p> --}}
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Galeri</a></li>
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
                        <a href="{{ route('gallery.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Judul</th>
                                        <th>Foto</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucfirst($item->title) }}</td>
                                             <td>
                                                @if($item->thumbnail != null)
                                                    <a href="{{ asset('uploads/galleries/'.$item->image) }}" target="_blank">
                                                        <img src="{{ URL::asset('uploads/galleries/thumbnail/'.$item->thumbnail) }}" alt="" style="max-height: 120px; max-width: 120px">
                                                    </a>
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('gallery.edit', ['id' => $item->id ]) }}" class="btn icon btn-primary"> 
                                                    <i class="fa fa-pencil-alt"></i> 
                                                </a>
                                                <button onclick="hapus({{$item->id}})" class="btn icon btn-danger"> 
                                                    <i class="fa fa-trash"></i> 
                                                </button>
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
    function hapus(id){
        if (confirm('Anda yakin ingin menghapus data ini?')) {
            $.ajax({
                url: `{{ url('admin/gallery') }}/${id}`,
                data: {
                    "_token" : "{{ csrf_token() }}"
                },
                method: "DELETE",
                success: function(res){
                     Toastify({
                        text: res.message,
                        duration: 3000,
                        close: true,
                        backgroundColor: "#4fbe87",
                    }).showToast();
                    setTimeout(() => {
                        location.reload();
                    }, 500);
                }
            });
        }
    }
</script>
@endsection