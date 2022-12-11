@extends('admin.layouts.app_dashboard')
@section('nav-umkm', 'active')

@section('css')
    <link rel="stylesheet" href="{{ URL::asset('assets/css/pages/summernote.css') }}" />
@endsection

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
                                <form class="form form-vertical" action="{{ route('umkm.store') }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <div class="form-body">
                                        <div class="row">
                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="nib">NIB</label>
                                                    <input type="text" id="nib" name="nib" class="form-control"
                                                        value="{{ old('nib') }}" placeholder="120197******"
                                                        maxlength="20" minlength="10" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="name">Nama UMKM</label>
                                                    <input type="text" id="name" name="name" class="form-control"
                                                        value="{{ old('name') }}" placeholder="Toko / Warung xxx" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="pic">Nama Pemilik</label>
                                                    <input type="text" id="pic" name="pic" class="form-control"
                                                        value="{{ old('pic') }}" placeholder="Jhon Doe" />
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="image_upload">Banner Image</label>
                                                    <input class="form-control" type="file" name="image_upload"
                                                        id="image_upload" accept="image/png, image/jpeg">
                                                </div>
                                            </div>

                                            <div class="col-12">
                                                <label for="">Tipe Bisnis</label>
                                                <input type="text" id="business_type" name="business_type"
                                                    class="form-control" value="{{ old('business_type') }}"
                                                    placeholder="Jasa / Dagang xxx" />
                                            </div>

                                            <div class="col-12">
                                                <label for="">RT</label>
                                                <fieldset class="form-group">
                                                    <select name="demografis_id" class="form-control" required>
                                                        <option value="" selected disabled>Pilih RT</option>
                                                        @foreach ($data as $item)
                                                            <option @if (old('demografis_id') == $item->id) selected @endif
                                                                value="{{ $item->id }}"> {{ $item->neighborhood }}
                                                            </option>
                                                        @endforeach
                                                    </select>
                                                </fieldset>
                                            </div>


                                            <div class="col-12">
                                                <div class="form-group">
                                                    <label for="address">Alamat</label>
                                                    <textarea name="address" id="" class="form-control">{{ old('address') }}</textarea>
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

                                    <div class="col-12 d-flex justify-content-end mt-2">
                                        <a href="{{ route('umkm.index') }}" class="btn btn-success me-1 mb-1">Kembali</a>
                                        
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
