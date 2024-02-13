@extends('layouts.main')

@section('title', 'Footer')


<html lang="en" >
<head>
  <meta charset="UTF-8">
  <title>Responsive footer</title>
  <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
</head>

@section('content')
    <body>
    <!-- partial:index.partial.html -->
    <footer>
    <div class="content">
        <div class="top">
        <div class="logo-details">
            <img src="{{ asset('img/Logo BPS Kota Batam Artboard 1 .png') }}" alt="BPS Kota Batam Logo" height="100" width="300">
        </div>
        <div class="media-icons">
            <a href="https://www.facebook.com/BPS.KOTA.BATAM/?locale=id_ID"><i class="fab fa-facebook-f"></i></a>
            <a href="https://www.instagram.com/bps.batam/"><i class="fab fa-instagram"></i></a>
            <a href="https://www.youtube.com/channel/UCjNSyjtj4Y9fBhxcJG3Xaag"><i class="fab fa-youtube"></i></a>
        </div>
        </div>
        <div class="link-boxes">
        <ul class="box">
            <li class="link_name">About Us</li>
            <li><a href="https://batamkota.bps.go.id/">Website</a></li>
            <li><a href="mailto:bps2171@bps.go.id">Contact us</a></li>
            <li><a href="https://batamkota.bps.go.id/">About us</a></li>
            <li><a href="/">Get started</a></li>
        </ul>

        </div>
    </div>
    <div class="bottom-details">
        <div class="bottom_text">
        <span class="copyright_text">Copyright © 2024 
            <img src="{{ asset('img/Logo BPS Kota Batam Artboard 1 .png') }}" alt="BPS Kota Batam Logo" height="70" width="200">
        </span>
        
        </div>
    </div>
    </footer>
    
    </body>
@endsection
