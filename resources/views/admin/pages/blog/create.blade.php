@extends('admin.layouts.app_dashboard')
@section("nav-blog", 'active')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/summernote.css') }}" />
@endsection

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
                            <form class="form form-vertical" action="{{ route('blog.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-body">
                                    <div class="row">

                                        <div class="col-12">
                                            <label for="">Kategori</label>
                                            <div class="form-group">
                                                <select name="category_id" class="form-select" required >
                                                    <option value="" selected disabled>Pilih Kategori</option>
                                                    @foreach ($category as $item)
                                                        <option @if( old('category_id') == $item->id ) selected @endif value="{{ $item->id }}"> 
                                                            {{  ucfirst($item->name) }}</option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="title">Title</label>
                                                <input type="text" id="title" name="title" class="form-control" value="{{ old('title') }}" placeholder="Sosialisasi Bank Jelantah..."/>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="image_upload">Banner Image</label>
                                                <input class="form-control" type="file" name="image_upload" id="image_upload" accept="image/png, image/jpeg">
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="pic">Deskripsi Singkat</label>
                                                <textarea name="short_desc" id="" class="form-control">{{ old('short_desc') }}</textarea>
                                            </div>
                                        </div>

                                        <div class="col-12">
                                            <div class="form-group">
                                                <label for="description">Deskripsi</label>
                                                <textarea name="description" id="summernote" class="form-control">{{ old('description') }}</textarea>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-12 d-flex justify-content-end">
                                    <a href="{{ route('blog.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                                    <button type="submit" class="btn btn-primary me-1 mb-1">
                                        Submit
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
    </script>
@endsection