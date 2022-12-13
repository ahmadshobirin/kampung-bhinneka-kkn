@extends('partials.main')

@section('UMKM', 'active')

@section('main_content')
    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
        <div class="container">
  
          <ol>
            <li><a href="/">Beranda</a></li>
            <li>UMKM</li>
          </ol>
          <h2>UMKM</h2>
  
        </div>
      </section><!-- End Breadcrumbs -->
  
      <!-- ======= Blog Section ======= -->
      <section id="blog" class="blog">
        <div class="container" data-aos="fade-up">
  
          <div class="row">
  
            <div class="col-lg-8 entries">
  
              @if ($data->isNotEmpty())
                @foreach ($data as $item)
                  <article class="entry">
      
                    <div class="entry-img">
                        @if ($item->thumbnail != null)
                          <img src="{{ URL::asset($item->thumbnail) }}" alt="" class="img-fluid">
                        @else
                          <img src="{{ URL::asset('assets/images/blank-thumbnail.jpg') }}" alt="" class="img-fluid">   
                        @endif
                      
                    </div>
      
                    <h2 class="entry-title">
                      <a href="#">{{ $item->name }}</a>
                    </h2>
      
                    <div class="entry-meta">
                      <ul>
                        <li class="d-flex align-items-center"><i class="bi bi-person"></i> <a href="#">{{ $item->pic }}</a></li>
                        <li class="d-flex align-items-center"><i class="bi bi-clock"></i> <a href="#"><time datetime="{{ $item->created_at }}">{{ date('d-m-Y H:i:s', strtotime($item->created_at)) }}</time></a></li>
                        {{-- <li class="d-flex align-items-center"><i class="bi bi-chat-dots"></i> <a href="#">12 Comments</a></li> --}}
                      </ul>
                    </div>
      
                    <div class="entry-content">
                      <p>{{ strip_tags($item->description) }}</p>
                      <div class="read-more">
                        <a href="{{ route('frontend.umkm.show', $data->id) }}">Baca selengkapnya</a>
                      </div>
                    </div>
      
                  </article>
                @endforeach
              @else
              <div>
                <h2>No posts found</h2>
              </div>
              @endif
              
              <!-- End blog entry -->
  
              <div class="blog-pagination">
                <ul class="justify-content-center">
                  <li><a href="#">1</a></li>
                  <li class="active"><a href="#">2</a></li>
                  <li><a href="#">3</a></li>
                </ul>
              </div>
  
            </div><!-- End blog entries list -->
  
            <div class="col-lg-4">
  
              <div class="sidebar">
  
                <h3 class="sidebar-title">Search</h3>
                <div class="sidebar-item search-form">
                  <form action="{{ url('/umkm') }}" method="GET">
                    <input type="text" name="search" required/>
                    <button type="submit"><i class="bi bi-search"></i></button>
                  </form>
                </div><!-- End sidebar search formn-->
  
              </div><!-- End sidebar -->
  
            </div><!-- End blog sidebar -->
  
          </div>
  
        </div>
      </section><!-- End Blog Section -->
@endsection