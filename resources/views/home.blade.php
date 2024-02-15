@extends('layouts.main')

@section('title', 'Beranda')

<head>
    <!-- ... other head elements ... -->
  
    <!-- AOS Library -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
  </head>

@section('content')

<section id="beranda" class="hero-section">
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

  <section id="tentang-epss" class="info-section py-5">
    <div class="container">
        <div class="col-12 text-center mb-4" data-aos="fade-up">
            <h2 class="section-title">Tentang Statistik Sektoral dan EPSS</h2>
        </div>
        <div class="col-12 mb-4" data-aos="fade-up">
            <p class="section-text text-center">
                Statistik Sektoral adalah kumpulan data statistik yang bertujuan memenuhi kebutuhan spesifik kementerian atau lembaga pemerintah, baik dilakukan secara mandiri atau bersama dengan BPS. EPSS (Evaluasi Penyelenggaraan Statistik Sektoral) adalah kerangka kerja yang digunakan untuk mengevaluasi proses ini, menjamin kualitas dan efektivitas pengumpulan serta pengolahan data statistik sektoral.
            </p>
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


  <section id="romantik" class="romantik-section py-5" style="background-color: #F5F7FA;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-md-6">
            <div class="rounded-box d-block p-4 text-white" style="background-color: #043277; border-radius: 20px;" data-aos="fade-up"> <!-- Adjust the background color to your preference -->
                <h2>Selamat datang di Romantik</h2>
                <p>Layanan bagi instansi pemerintah untuk mendapatkan rekomendasi penyelenggaraan kegiatan statistik sektoral dari BPS.</p>
                <a href="https://romantik.web.bps.go.id/" class="btn btn-success" style="color: #F5F7FA">Ajukan Rekomendasi</a> <!-- Adjust button styling as needed -->
            </div>
        </div>
        <div class="col-md-6" data-aos="fade-up">
          <h2 class="mt-md-0 mt-4" >Sistem Romantik</h2>
          <p>Sistem Romantik digunakan untuk pelaporan dan rekomendasi acara statistik. Ini memastikan bahwa semua kegiatan statistik diatur dan dilaporkan secara tepat.</p>
        </div>
      </div>
    </div>
  </section>

  <section id="simbatik" class="simbatik-section py-5" style="background-color: #ffffff;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <h2 data-aos="fade-up">Sistem Simbatik</h2>
          <p data-aos="fade-up">Sistem Simbatik adalah platform untuk mengunggah dokumen yang berkaitan dengan indikator EPSS. Ini memudahkan proses dokumentasi dan verifikasi.</p>
        </div>
        <div class="col-lg-6 d-flex justify-content-center">
          <div class="card rounded-lg shadow p-4" style="background-color: #F5F7FA;" data-aos="fade-up">
            <h3>Apikasi Evaluasi Penyelenggaraan Statistik Sektoral</h3>
            <p>Dalam rangka untuk meningkatkan kualitas penyelenggaraan statistik sektoral secara efektif, efisien, dan berkesinambungan, perlu dilakukan Evaluasi terhadap Penyelenggaraan Statistik Sektoral dengan mengukur kapabilitas penyelenggaraan statistik sektoral pada Instansi Pusat dan Pemerintah Daerah dengan ukuran tingkat kematangan (maturity level).</p>
            <a href="https://webapps.bps.go.id/simbatik/" class="btn btn-primary">Mulai Pengisian</a>
            <!-- Change the href to your actual link -->
          </div>
        </div>
      </div>
    </div>
  </section>
  
  
  <section id="indah" class="indah-section py-5" style="background-color: #F5F7FA;">
    <div class="container">
      <div class="row align-items-center">
        <div class="col-lg-6">
          <div class="rounded-lg p-4" style="background-color: #ffffff;" data-aos="fade-up">
            <h2>Indonesia Data Hub (INDAH)</h2>
            <p>Indonesia Data Hub merupakan one stop collaboration platform yang bertujuan untuk meningkatkan literasi data dan value of statistics serta mendukung interoperabilitas data dan kolaborasi eksplorasi terhadap data.</p>
            <!-- Icons and descriptions go here -->
            <!-- ... -->
            <a href="https://indah.bps.go.id/" class="btn btn-primary">Kunjungi INDAH</a>
          </div>
        </div>
        <div class="col-lg-6" data-aos="fade-up">
          <h2 class="mt-md-0 mt-4">Sistem Indah</h2>
          <p>Sistem Indah digunakan untuk pengelolaan metadata statistik. Sistem ini memastikan bahwa data yang disediakan akurat dan dapat diakses oleh lembaga yang memerlukannya.</p>
        </div>
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
  

@endsection