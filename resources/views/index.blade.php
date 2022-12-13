@extends('partials.main')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center">

  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <div class="row">
      <div class="col-xl-6">
        <h1>Kenali lebih dekat Kampung Bhinneka!</h1>
        <h2>Kelurahan Ngagel Rejo RW 11, Kecamatan Wonokromo, Kota Surabaya</h2>
      </div>
    </div>
  </div>

</section><!-- End Hero -->

@section('main_content')
    <!-- ======= Definisi Section ======= -->
    <section id="sambutan" class="sambutan">
      <div class="container" data-aos="fade-up">
        <div class="tab-content">
          <div class="tab-pane active show" id="tab-1">
            <div class="row">
              <div
                class="col-lg-6 order-2 order-lg-1 mt-3 mt-lg-0"
                data-aos="fade-up"
                data-aos-delay="100"
              >
                <h2>Kampung Bhinneka</h2>
                <p>
                  RW XI Kelurahan Ngagel Rejo disebut sebagai Kampung Bhinneka <br>
                  karena kehidupan sosial kemasyarakatan sangat terlihat serta seni dan kebudayaan yang beragam salah satu <br>
                  contohnya adalah adanya toleransi tinggi antar warga dalam berbagai aspek ketahanan  <br>
                  dengan berbagai metode yaitu Aquaponik Budikdamper dan Penyemprotan Automatis.
                </p>
                <p>
                  Juga Masyrakat yang masih melestarikan Tari Tradisional Seperti Tari Remo <br>
                  dan Tari Sajojo agar kesenian daerah tetap terjaga tidak hanya tari tradisional, <br>
                  di Kampung Bhinneka juga Mempelajari Tari Modern. <br>
                  adapun musik di Kampung Bhinneka juga sangat beragam seperti Volksong Dan Hadrah <br>
                </p>
                <p>
                  Beberapa warga masih menjual makanan tradisional yang resepnya masih turun temurun dan terlegalitas. <br>
                  disana juga masih ada beberapa warga yang menyewakan baju adat daerah tidak hanya itu, <br>
                  rim Kampung Bhinneka juga sering menjuarai olahraga Tenis Meja. <br>
                  terakhir disana juga ada Punden Kh Achmad Zainuri" <br>
                </p>
              </div>
              <div
                class="col-lg-6 order-1 order-lg-2 text-center"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <img src="{{ URL::asset('assets/img/kampung-bhinneka.png') }}" alt="" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Definisi Section -->

    <!-- ======= Counts Section ======= -->
    <section id="demografi" class="counts">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Demografi</h2>
          <p>Kelurahan Ngangel Rejo RW 11 adalah sebuah pemukiman warga  yang padat penduduk. <br>
            Desa Ngangel Rw 11 terdiri dari 7 RT dengan jumlah KK rata rata {{ ceil($headOfFamily / 7) }} per RT.</p>
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-journal-richtext"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $headOfFamily }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Kepala Keluarga</p>      
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-person"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $inhabitant }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Penduduk</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-person-hearts"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $toddler }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Balita</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-person-badge"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $elderly }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Lansia</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <section id="portfolio" class="portfolio">
      <div class="container" data-aos="fade-up">
        <div class="section-title">
          <h2>Galeri</h2>
        </div>

        <div
          class="row portfolio-container"
          data-aos="fade-up"
          data-aos-delay="200"
        >
        @foreach ($gallery as $item)            
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="{{ url("uploads/galleries/".$item->image) }}"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>{{ ucfirst($item->title) }}</h4>
                <div class="portfolio-links">
                  <a
                    href="{{ url("uploads/galleries/".$item->image) }}"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="{!! ucfirst($item->description) !!}"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        @endforeach

        </div>
      </div>
    </section>
    
@endsection