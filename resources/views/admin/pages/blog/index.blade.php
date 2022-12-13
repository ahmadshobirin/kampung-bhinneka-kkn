@extends('admin.layouts.app_dashboard')
@section("nav-blog", 'active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Berita</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Berita</a></li>
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
                        <a href="{{ route('blog.create') }}" class="btn btn-primary">
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
                                        <th>Kategory</th>
                                        <th>Thumbnail</th>
                                        <th>Dibuat Oleh</th>
                                        <th>Unggulan</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td>{{ ucfirst($item->title) }}</td>
                                            <td>{{ ucfirst($item->category->name) }}</td>
                                            <td>
                                                @if($item->thumbnail != null)
                                                    <img src="{{ URL::asset($item->thumbnail) }}" alt="" style="max-height: 120px; max-width: 120px">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>{{ ucfirst($item->user->name) }}</td>
                                            <td>
                                                @if($item->status == \App\Models\Blog::STATUS_CREATED)
                                                <span class="badge bg-primary"> {{ $item->status }} </span>
                                            @elseif( $item->status == \App\Models\Blog::STATUS_PUBLISHED )
                                                <span class="badge bg-success"> {{ $item->status }} </span>
                                            @elseif( $item->status == \App\Models\Blog::STATUS_UNLISTED )
                                                <span class="badge bg-warning"> {{ $item->status }} </span>
                                            @elseif( $item->status == \App\Models\Blog::STATUS_ARCHIVED )
                                                <span class="badge bg-danger"> {{ $item->status }} </span>
                                            @endif
                                            </td>
                                            <td> 
                                                @if($item->is_higlight_post)
                                                    <span class="badge bg-primary"> Aktif </span>
                                                @else
                                                    <span class="badge bg-warning"> Tidak Aktif </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('blog.edit', ['id' => $item->id ]) }}" class="btn icon btn-primary btn-sm"> 
                                                    <i class="fa fa-pencil-alt"></i> 
                                                </a>
                                                <a href="javascript:void(0)" class="btn icon btn-danger btn-delete" data-id="{{ $item->id }}"> 
                                                    <i class="fa fa-trash"></i> 
                                                </a>

                                                {{-- <form action="{{ route('blog.destroy', $item->id) }}" method="post">                      
                                                    @csrf @method('DELETE')
                                                    <button type="submit"  class="btn icon btn-danger" data-toggle="tooltip" title='Delete'>
                                                        <i class="fa fa-trash"></i> 
                                                    </button>
                                                </form> --}}
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
            </div>
        </div>
    </section>
</div>
@endsection

@section('script')
    <script type="text/javascript">

        // Delete Data Kategori
        $(".btn-delete").click(function(){
            var id = $(this).data("id");
            Swal.fire({
                icon: "warning",
                title: "Apakah anda yakin?",
                text: "ingin menghapus data berita ini!",
                showCancelButton: true,
                cancelButtonText: 'TIDAK',
                confirmButtonText: 'YA, HAPUS!'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax(
                    {
                        url: "blog/"+id,
                        type: 'DELETE',
                        data: {
                            "id": id,
                            "_token": '{{ csrf_token() }}',
                        },
                        success: function (){
                            Swal.fire({
                                type: 'success',
                                icon: 'success',
                                title: 'Data berita berhasil dihapus!',
                                showConfirmButton: true,
                                timer: 3000
                            });

                            // $(`#index_${category_id}`).remove();
                            location.reload(true);
                        }
                    });
                }
            })
        });
    </script>
@endsection