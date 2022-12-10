@extends('admin.layouts.app_dashboard')
@section("nav-umkm", 'active')
@section('content')
<div class="page-heading">
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>UMKM</h3>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">UMKM</a></li>
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
                class="btn-close msg"
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

    <section>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
                    <div class="card-header">
                        <a href="{{ route('umkm.create') }}" class="btn btn-primary">
                            <i class="fa fa-plus"></i> Tambah Data
                        </a>
                    </div>
                    <div class="card-content">
                        <div class="card-body">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>NIB</th>
                                        <th>Name</th>
                                        <th>Pemilik</th>
                                        <th>Tipe Bisnis</th>
                                        <th>RT</th>
                                        <th>Thumbnail</th>
                                        <th>Status</th>
                                        <th>Aksi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($data as $item)
                                        <tr>
                                            <td>{{ $loop->iteration }}</td>
                                            <td> <b> {{ $item->nib ?: "-" }} </b> </td>
                                            <td>{{ ucfirst($item->name) }}</td>
                                            <td>{{ ucfirst($item->pic) }}</td>
                                            <td>{{ $item->business_type }}</td>
                                            <td>{{ $item->demografi->neighborhood }}</td>
                                            <td>
                                                @if($item->thumbnail != null)
                                                    <img src="{{ URL::asset($item->thumbnail) }}" alt="" style="max-height: 120px; max-width: 120px">
                                                @else
                                                    -
                                                @endif
                                            </td>
                                            <td>
                                                @if($item->status == \App\Models\MicroSmallAndMediumEnterprise::STATUS_CREATED)
                                                    <span class="badge bg-primary"> {{ $item->status }} </span>
                                                @elseif( $item->status == \App\Models\MicroSmallAndMediumEnterprise::STATUS_PUBLISHED )
                                                    <span class="badge bg-success"> {{ $item->status }} </span>
                                                @elseif( $item->status == \App\Models\MicroSmallAndMediumEnterprise::STATUS_UNLISTED )
                                                    <span class="badge bg-warning"> {{ $item->status }} </span>
                                                @elseif( $item->status == \App\Models\MicroSmallAndMediumEnterprise::STATUS_ARCHIVED )
                                                    <span class="badge bg-danger"> {{ $item->status }} </span>
                                                @endif
                                            </td>
                                            <td>
                                                <a href="{{ route('umkm.edit', ['id' => $item->id ]) }}" class="btn icon btn-primary"> 
                                                    <i class="fa fa-pencil-alt"></i> 
                                                </a>
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
    <script>
        $(document).ready(function(){
            setTimeout(function() {
                $('.msg').fadeOut('slow');
            }, 5000);
        });
    </script>
@endsection