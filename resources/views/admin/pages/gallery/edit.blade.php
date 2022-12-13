@extends('admin.layouts.app_dashboard')
@section("nav-gallery", 'active')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/summernote.css') }}" />
@endsection

@section('content')
<div class="page-heading">  
    <div class="page-title">
        <div class="row">
            <div class="col-12 col-md-6 order-md-1 order-last">
                <h3>Master</h3>
                <p class="text-subtitle text-muted">Galeri</p>
            </div>
            <div class="col-12 col-md-6 order-md-2 order-first">
                <nav aria-label="breadcrumb" class="breadcrumb-header float-start float-lg-end">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Master</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Galeri</li>
                    </ol>
                </nav>
            </div>
        </div>
    </div>
    <section>
        <div class="row match-height">
            <div class="col-md-12 col-12">
                <div class="card">
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
                            <form class="form form-vertical" action="{{ route('gallery.update', ['id'=>$data->id]) }}" method="POST" enctype="multipart/form-data">
                                @csrf @method('PUT')
                                <div class="form-body">
                                    <div class="row">
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Judul</label>
                                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') ?? $data->title }}"/>
                                            </div>
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Foto</label>
                                                <input type="file" name="image_upload" class="form-control image" value="{{ old('image')}}">
                                            </div>
                                            <img id="imgPreview" src="{{ asset('uploads/galleries/thumbnail/'.$data->thumbnail) ?? asset('assets/images/no-image.jpg') }}" class="mt-2 mb-2" style="height: 170px">
                                        </div>
                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="name">Deskripsi</label>
                                                <textarea name="description" id="summernote" class="form-control">{{ old('description') ?? $data->description}}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('gallery.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1" >
                                        Update
                                    </button>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
@section('script')
<script src="{{ URL::asset('assets/extensions/summernote/summernote-lite.min.js') }}"></script>
<script>
    $("#summernote").summernote({
        tabsize: 2,
        height: 120,
        placeholder: "description",
        toolbar: [
            ['style', ['style']],
            ['font', ['bold', 'underline', 'clear']],
            ['fontname', ['fontname']],
            ['color', ['color']],
            ['para', ['ul', 'ol', 'paragraph']],
            ['view', ['codeview']],
        ],
    });

    $('.image').change(function(){
        const file = this.files[0];
        if (file){
            let reader = new FileReader();
            reader.onload = function(event){
                $('#imgPreview').attr('src', event.target.result);
            }
            reader.readAsDataURL(file);
        }
    });
</script>
@endsection
