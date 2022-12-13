@extends('partials.main')

@section('main_content')
		<!-- ======= Breadcrumbs ======= -->
		<section class="breadcrumbs">
				<div class="container">
						<ol>
								<li><a href="/">Beranda</a></li>
								<li>{{ $parent }}</li>
						</ol>
						<h2>{{ $parent }}</h2>

				</div>
		</section><!-- End Breadcrumbs -->

		<!-- ======= Blog Single Section ======= -->
        <section id="blog" class="blog">
            <div class="container" data-aos="fade-up">
      
              <div class="row">
      
                <div class="align-items-center entries">
      
                  <article class="entry entry-single">
      
                    <div class="entry-img">
                      @if (blank($item->image))
                            <img src="{{ url('assets/img/no-image-available.png') }}" alt="" class="img-fluid">
                        @else
                            <img src="{{ url($item->image) }}" alt="{{$item->name}}" class="img-fluid">
                        @endif
                    </div>
      
                    <h2 class="entry-title">
                      <a href="{{ route("fe.umkm.detail", $item->slug) }}">{{ $item->name }}</a>
                    </h2>
      
                    <div class="entry-meta">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-pencil"></i> <a
                            href="{{ route("fe.umkm.detail", $item->slug) }}">{{ ucfirst($item->user->name) }}</a></li>
            <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a
                            href="{{ route("fe.umkm.detail", $item->slug) }}"><time datetime="2020-01-01">{{ $item->updated_at->diffForHumans() }}</time></a></li>
            <li class="d-flex align-items-center"><i class="bi bi-tag"></i> <a
                            href="{{ route("fe.umkm.detail", $item->slug) }}"> {{ ucfirst($item->business_type) }}</a></li>
                      </ul>
                    </div>
      
                    <div class="entry-content">
                      {!! $item->description !!}
                    </div>

                    <div class="entry-footer">
                        <i class="bi bi-person-circle"></i>
                        <ul class="cats">
                          <li><a href="#">Pemilik {{ $item->pic }}</a></li>
                        </ul>

                        <i class="bi bi-map"></i>
                        <ul class="cats">
                          <li><a href="#">Alamat {{ $item->address }}</a></li>
                        </ul>

                        <i class="bi bi-folder"></i>
                        <ul class="cats">
                          <li><a href="#">Wilayah {{ $item->demografi->neighborhood }}</a></li>
                        </ul>
                    </div>
                  </article><!-- End blog entry -->
      
                  {{-- <div class="blog-author d-flex align-items-center">
                    <img src="assets/img/blog/blog-author.jpg" class="rounded-circle float-left" alt="">
                    <div>
                      <h4>Jane Smith</h4>
                      <div class="social-links">
                        <a href="https://twitters.com/#"><i class="bi bi-twitter"></i></a>
                        <a href="https://facebook.com/#"><i class="bi bi-facebook"></i></a>
                        <a href="https://instagram.com/#"><i class="biu bi-instagram"></i></a>
                      </div>
                      <p>
                        Itaque quidem optio quia voluptatibus dolorem dolor. Modi eum sed possimus accusantium. Quas repellat voluptatem officia numquam sint aspernatur voluptas. Esse et accusantium ut unde voluptas.
                      </p>
                    </div>
                  </div><!-- End blog author bio --> --}}
      
                </div><!-- End blog entries list -->
    
      
              </div>
      
            </div>
          </section><!-- End Blog Single Section -->
@endsection
