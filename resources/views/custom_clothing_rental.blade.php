@extends('partials.main')

@section('Penyewaan Baju Adat', 'active')

@section('main_content')
<section class="breadcrumbs">
    <div class="container">

    <ol>
        <li><a href="/">Beranda</a></li>
        <li>{{ $parent }}</li>
    </ol>
    <h2>{{ $parent }}</h2>

    </div>
</section><!-- End Breadcrumbs -->

<section class="blog">
    <div class="container" data-aos="fade-up">
            <div class="row">

                    @foreach ($data as $item)
                            <article class="col col-sm-4 entry" style="border-radius: 8px; margin: 8px;">
                                <div class="entry-img">
                                    @if (blank($item->image))
                                        <img src="{{ url('assets/img/no-image-available.png') }}" alt="" class="img-fluid" style="border-radius: 8px;">
                                    @else
                                        <img src="{{ URL::asset('uploads/clothing/'.$item->image) }}" alt="{{$item->name}}" class="img-fluid" style="border-radius: 8px; ">
                                    @endif
                                </div>
                                <h2 class="entry-title">
                                    <a href="#">{{ ucfirst($item->name) }}</a>
                                </h2>
                                <div class="entry-meta">
                                        <ul>
                                                <li class="d-flex align-items-center"><i class="bi bi-coin"></i> <a
                                                                href="#">{{"Rp. ". number_format($item->price, 2) }}</a></li>
                                </div>
    
                                <div class="entry-content">
                                        {{-- <p> {{$item->short_desc}}</p> --}}
                                        <div class="read-more">
                                            <a href="{{ route("fe.clothing.detail", $item->id) }}">Selengkapnya...</a>
                                        </div>
                                </div>
    
                            </article><!-- End blog entry -->
                    @endforeach
            </div>
    </div>
</section><!-- End Blog Section -->
@endsection