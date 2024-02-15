@extends('layouts.main')

@section('title', 'Beranda')

<head>
    <!-- ... other head elements ... -->
  
    <!-- AOS Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  </head>

@section('content')

<section class="hero-section">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h1 class="hero-title mb-2" style="color:#717171;">Sistem Monitoring</h1>
          <h1 class="hero-title mt-2">EPSS BPS Batam</h1>
          <p class="hero-text">Portal ini bertujuan untuk memantau dan menyajikan informasi terkini mengenai Evaluasi Penyelenggaraan Statistik Sektoral (EPSS) di Batam.</p>
          <a href="{{ url('/login') }}" class="btn btn-success mt-3 pt-2 ml-2 mr-2" data-aos="fade-up">Login</a>
        </div>
        <div class="col-lg-6">
          <!-- You can add an image here or use an icon library like Font Awesome -->
          <img src="{{ asset('img/6425301.png') }}" alt="Monitoring Illustration" class="img-fluid hero-image" data-aos="fade-up">
        </div>
      </div>
    </div>
  </section>

  <section class="info-section py-5">
    <div class="container container-sm-padding">
      <div class="row">
        <div class="col-12 text-center mb-4" data-aos="fade-up">
          <h2 class="section-title">Tentang Statistik Sektoral dan EPSS</h2>
        </div>
      </div>
      <div class="row" data-aos="fade-up">
        <div class="col-12 mb-4">
          <p class="section-text text-center">
            Statistik Sektoral adalah kumpulan data statistik yang bertujuan memenuhi kebutuhan spesifik kementerian atau lembaga pemerintah, baik dilakukan secara mandiri atau bersama dengan BPS. EPSS (Evaluasi Penyelenggaraan Statistik Sektoral) adalah kerangka kerja yang digunakan untuk mengevaluasi proses ini, menjamin kualitas dan efektivitas pengumpulan serta pengolahan data statistik sektoral.
          </p>
        </div>
      </div>
      <div class="row justify-content-center" data-aos="fade-up">
                <!-- Icon and text pairs go here, repeat this column structure for each icon -->
        <div class="col-6 col-md-2 mb-3">
            <div class="icon-container d-flex justify-content-center mb-2">
              <!-- Include your icon image here -->
              <img src="{{ asset('img/sdi.png') }}" alt="Satu Data Indonesia" class="img-fluid">
            </div>
            <p class="text-center icon-text">Satu Data Indonesia</p>
          </div>
          <div class="col-6 col-md-2 mb-3">
              <div class="icon-container d-flex justify-content-center mb-2">
                <!-- Include your icon image here -->
                <img src="{{ asset('img/kd.png') }}" alt="Kualitas Data" class="img-fluid">
              </div>
              <p class="text-center icon-text">Kualitas Data</p>
            </div>
            <div class="col-6 col-md-2 mb-3">
              <div class="icon-container d-flex justify-content-center mb-2">
                <!-- Include your icon image here -->
                <img src="{{ asset('img/pbs.png') }}" alt="Proses Bisnis Statistik" class="img-fluid">
              </div>
              <p class="text-center icon-text">Proses Bisnis Statistik</p>
            </div>
            <div class="col-6 col-md-2 mb-3">
              <div class="icon-container d-flex justify-content-center mb-2">
                <!-- Include your icon image here -->
                <img src="{{ asset('img/kelembagaan.png') }}" alt="Kelembagaan" class="img-fluid">
              </div>
              <p class="text-center icon-text">Kelembagaan</p>
            </div>
            <div class="col-6 col-md-2 mb-3">
              <div class="icon-container d-flex justify-content-center mb-2">
                <!-- Include your icon image here -->
                <img src="{{ asset('img/sn.png') }}" alt="Statistik Nasional" class="img-fluid">
              </div>
              <p class="text-center icon-text">Statistik Nasional</p>
            </div>
          <!-- Repeat for other icons -->
      </div>
    </div>
  </section>
  



  <script src="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.js"></script>
  <script>
    AOS.init({
      offset: 200, // offset from the original trigger point
      duration: 600, // duration of the animation
      once: true, // whether animation should happen only once - while scrolling down
      mirror: false, // whether elements should animate out while scrolling past them
      anchorPlacement: 'top-bottom', // defines which position of the element regarding to window should trigger the animation
    });
  </script>
  
  
  




    <!-- Hero Section for Beranda -->
    <section id="beranda" style="height: 589px; background-color: #F5F7FA;">
        <div class="hero bg-light" style="height: 589px; background-color: #F5F7FA;">
            <div class="container h-100 d-flex justify-content-center align-items-center flex-column">
                <h1 class="display-4 text-center" style="color: #4CAF4F;">
                    Sistem Monitoring EPSS BPS Batam
                </h1>
                <p class="text-center" style="color: #717171;">
                    Portal ini bertujuan untuk memantau dan menyajikan informasi terkini mengenai Evaluasi Penyelenggaraan Statistik Sektoral (EPSS) di Batam.
                </p>
                <a href="{{ url('/login') }}" class="btn btn-success mt-3">Login</a>
            </div>
        </div>
    </section>

    <!-- Section for Tentang EPSS -->
    <section id="tentang-epss" style="height: 589px; background-color: #FFFFFF;">
        <h1>Tentang EPSS</h1>
        <!-- Other Tentang EPSS content goes here -->
    </section>

    <!-- Section for Romantik -->
    <section id="romantik" style="height: 589px; background-color: #F5F7FA;">
        <h1>Romantik</h1>
        <!-- Other Romantik content goes here -->
    </section>

    <!-- Section for Simbatik -->
    <section id="simbatik" style="height: 589px; background-color: #FFFFFF;">
        <h1>Simbatik</h1>
        <!-- Other Simbatik content goes here -->
    </section>

    <!-- Section for Indah -->
    <section id="indah" style="height: 589px; background-color: #F5F7FA;">
        <h1>Indah</h1>
        <!-- Other Indah content goes here -->
    </section>
    

@endsection