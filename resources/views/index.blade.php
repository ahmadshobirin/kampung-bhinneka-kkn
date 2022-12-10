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
    <!-- ======= Sambutan Section ======= -->
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
                <h5>Ketua RW 11, kelurahan Ngagel Rejo</h5>
                <p>
                  Ullamco laboris nisi ut aliquip ex ea commodo consequat.
                  Duis aute irure dolor in reprehenderit in voluptate velit
                  esse cillum dolore eu fugiat nulla pariatur. Excepteur sint
                  occaecat cupidatat non proident, sunt in culpa qui officia
                  deserunt mollit anim id est laborum
                </p>
                <p style="font-size: 16px; color: #828893; line-height: 26px">
                  <strong>- Nama Ketua RW</strong>
                </p>
              </div>
              <div
                class="col-lg-6 order-1 order-lg-2 text-center"
                data-aos="fade-up"
                data-aos-delay="200"
              >
                <img src="assets/img/tabs-1.jpg" alt="" class="img-fluid" />
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    <!-- End Sambutan Section -->

    <!-- ======= Definisi Section ======= -->
    <section id="definisi" class="definisi">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Apa itu Kampung Bhinneka?</h2>
          <p>Kampung Bhineka RW 11 Kelurahan Ngagel Rejo merupakan kampung dengan konsep keanekaragaman yang ada di RW 11 Kelurahan Ngagel Rejo Surabaya. <br> Dalam rangka meningkatkan perekonomian serta kualitas hidup masyarakat sekitar RW 11 Ngagel Rejo Surabaya membuat ikon kampung dengan nama kampung Bhineka.</p>
        </div>

      </div>
    </section><!-- End Definisi Section -->

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
          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-1.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Gambar 1</h4>
                <p>gambar 1</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-1.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="App 1"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-2.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-2.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="Web 3"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-3.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>App 2</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-3.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="App 2"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-4.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Card 2</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-4.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="Card 2"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-5.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Web 2</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-5.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="Web 2"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-6.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>App 3</h4>
                <p>App</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-6.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="App 3"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-7.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Card 1</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-7.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="Card 1"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-8.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Card 3</h4>
                <p>Card</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-8.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="Card 3"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-4 col-md-6 portfolio-item">
            <div class="portfolio-wrap">
              <img
                src="assets/img/portfolio/portfolio-9.jpg"
                class="img-fluid"
                alt=""
              />
              <div class="portfolio-info">
                <h4>Web 3</h4>
                <p>Web</p>
                <div class="portfolio-links">
                  <a
                    href="assets/img/portfolio/portfolio-9.jpg"
                    data-gallery="portfolioGallery"
                    class="portfolio-lightbox"
                    title="Web 3"
                    ><i class="bx bx-plus"></i
                  ></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>
    
@endsection