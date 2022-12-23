<header id="header" class="fixed-top d-flex align-items-center">
    <div class="container d-flex align-items-center">
      <h1 class="logo me-auto"><a href="/">{{ config('app.name') }}</a></h1>
      <!-- Uncomment below if you prefer to use an image logo -->
      <!-- <a href="index.html" class="logo me-auto"><img src="assets/img/logo.png" alt=""></a>-->

      <nav id="navbar" class="navbar order-last order-lg-0">
        <ul>
          <li><a class="nav-link scrollto {{ ($parent === 'Beranda') ? 'active' : '' }}" href="/">Beranda</a></li>
          <li><a class="nav-link scrollto {{ ($parent === 'Demografi') ? 'active' : '' }}" href="/#demografi">Demografi</a></li>
          <li><a class="nav-link scrollto {{ ($parent === 'Gallery') ? 'active' : '' }}" href="/#portfolio">Gallery</a></li>
          <li><a class="nav-link {{ ($parent === 'Berita') ? 'active' : '' }}" href="/berita">Berita</a></li>
          <li><a class="nav-link {{ ($parent === 'UMKM') ? 'active' : '' }}" href="/umkm">UMKM</a></li>
          <li><a class="nav-link {{ ($parent === 'Penyewaan Baju Adat') ? 'active' : '' }}" href="/clothing">Penyewaan Baju Adat</a></li>
          <li><a class="nav-link" href="/#video">Video</a></li>
        <i class="bi bi-list mobile-nav-toggle"></i>
      </nav><!-- .navbar -->
      @auth
        <a href="{{ route('home') }}" class="get-started-btn scrollto">Dashboard</a>
      @endauth
    </div>
  </header><!-- End Header -->