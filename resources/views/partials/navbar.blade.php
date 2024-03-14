

{{-- <nav class="bg-white h-14 flex justify-between items-center px-6">
    <a href="/" class="text-lg font-semibold text-gray-700">
        <!-- Insert Logo Here -->
        BPS Kota Batam
    </a>

        @if(Request::is('/'))
            <div class="flex items-center space-x-4">
                <a href="#beranda" class="text-gray-700 hover:text-green-600">Beranda</a>
                <a href="#tentang-epss" class="text-gray-700 hover:text-green-600">Tentang EPSS</a>
                <a href="#romantik" class="text-gray-700 hover:text-green-600">Romantik</a>
                <a href="#simbatik" class="text-gray-700 hover:text-green-600">Simbatik</a>
                <a href="#indah" class="text-gray-700 hover:text-green-600">Indah</a>
                <a href="#hubungi-kami" class="text-gray-700 hover:text-green-600">Hubungi Kami</a>
                <a href="{{ url('/login') }}" class="text-green-600 hover:text-green-800">Login</a>
                <a href="{{ url('/epss') }}" class="text-green-600 hover:text-green-800">EPSS</a>
            </div>
        @else
            <div class="flex items-center space-x-4">
                <a href="{{ url('/epss') }}" class="text-gray-700 hover:text-green-600">EPSS</a>
                <a href="{{ url('/sdi') }}" class="text-gray-700 hover:text-green-600">Prinsip SDI</a>
                <a href="{{ url('/kualitas-data') }}" class="text-gray-700 hover:text-green-600">Kualitas Data</a>
                <a href="{{ url('/proses-bisnis-statistik') }}" class="text-gray-700 hover:text-green-600">Proses Bisnis Statistik</a>
                <a href="{{ url('/kelembagaan') }}" class="text-gray-700 hover:text-green-600">Kelembagaan</a>
                <a href="{{ url('/statistik-nasional') }}" class="text-green-600 hover:text-green-800">Statistik Nasional</a>
                <a href="{{ url('/dashboard') }}" class="text-green-600 hover:text-green-800">Dashboard Perencanaan</a>
                <a href="{{ url('/list-opd') }}" class="text-green-600 hover:text-green-800">List OPD</a>
                @if(Auth::check())
                <form action="{{ route('logout') }}" method="POST">
                    @csrf
                    <button type="submit">Logout</button>
                </form>
                @endif
        
            </div>
        @endif

    
</nav> --}}



{{-- <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
    <div class="container">
        <a class="navbar-brand" href="/">
            <img src="{{ asset('img/Logo BPS Kota Batam Artboard 1 .png') }}" alt="BPS Kota Batam Logo" height="70">
        </a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse justify-content-end" style="z-index: 100" id="navbarNavDropdown">
            <ul class="navbar-nav ms-auto">
                @if(Request::is('/'))
                    <li class="nav-item">
                        <a href="#beranda" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tentang-epss" class="nav-link">Tentang EPSS</a>
                    </li>
                    <li class="nav-item">
                        <a href="#romantik" class="nav-link">Romantik</a>
                    </li>
                    <li class="nav-item">
                        <a href="#indah" class="nav-link">Indah</a>
                    </li>
                    <li class="nav-item">
                        <a href="#simbatik" class="nav-link">Simbatik</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#hubungi-kami" class="nav-link">Hubungi Kami</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/epss') }}" class="nav-link">EPSS</a>
                    </li>
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a href="{{ url('/login') }}" class="nav-link">Login</a>
                        </li>
                    @endif
                    <!-- More nav items -->

                @else
                    @if(Auth::check())
                        <!-- Nav items for other pages -->
                        <li class="nav-item">
                            <a href="{{ url('/epss') }}" class="nav-link {{ Request::is('epss') ? 'active' : '' }}">EPSS</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/sdi') }}" class="nav-link {{ Request::is('sdi') ? 'active' : '' }}">Prinsip SDI</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kualitas-data') }}" class="nav-link {{ Request::is('kualitas-data') ? 'active' : '' }}">Kualitas Data</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/proses-bisnis-statistik') }}" class="nav-link {{ Request::is('proses-bisnis-statistik') ? 'active' : '' }}">Proses Bisnis Statistik</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/kelembagaan') }}" class="nav-link {{ Request::is('kelembagaan') ? 'active' : '' }}">Kelembagaan</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/statistik-nasional') }}" class="nav-link {{ Request::is('statistik-nasional') ? 'active' : '' }}">Statistik Nasional</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/dashboard') }}" class="nav-link {{ Request::is('dashboard') ? 'active' : '' }}">Dashboard</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ url('/list-opd') }}" class="nav-link {{ Request::is('list-opd') ? 'active' : '' }}">List OPD</a>
                        </li>
                        <li class="nav-item">
                            <a href="{{ route('logout') }}" 
                            onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                            class="nav-link">Logout</a>
                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                        <!-- More nav items -->
                    @endif
                @endif

            </ul>
        </div>
    </div>
</nav> --}}


<!-- Check if the user is authenticated -->
@if(!Auth::check())
    <nav class="navbar navbar-expand-lg navbar-light bg-body-tertiary">
        <div class="container">
            <a class="navbar-brand" href="/">
                <img src="{{ asset('img/Logo BPS Kota Batam Artboard 1 .png') }}" alt="BPS Kota Batam Logo" height="70">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse justify-content-end" style="z-index: 100" id="navbarNavDropdown">
                <ul class="navbar-nav ms-auto">
                    <li class="nav-item">
                        <a href="#beranda" class="nav-link">Beranda</a>
                    </li>
                    <li class="nav-item">
                        <a href="#tentang-epss" class="nav-link">Tentang EPSS</a>
                    </li>
                    <li class="nav-item">
                        <a href="#romantik" class="nav-link">Romantik</a>
                    </li>
                    <li class="nav-item">
                        <a href="#indah" class="nav-link">Indah</a>
                    </li>
                    <li class="nav-item">
                        <a href="#simbatik" class="nav-link">Simbatik</a>
                    </li>
                    
                    <li class="nav-item">
                        <a href="#hubungi-kami" class="nav-link">Hubungi Kami</a>
                    </li>
                    <li class="nav-item">
                        <a href="{{ url('/epss') }}" class="nav-link">EPSS</a>
                    </li>
                    @if(!Auth::check())
                        <li class="nav-item">
                            <a href="{{ url('/login') }}" class="nav-link">Login</a>
                        </li>
                    @endif
                </ul>
            </div>   
        </div>
    </nav>
@else
    <header class="header body-pd" id="header" >
        <div class="header_toggle"> <i class='bx bx-menu' id="header-toggle"></i> </div>
                
    
    </header>
    <div class="l-navbar show_side" id="nav-bar" >
        <nav class="nav">
            <div> <a href="/" class="nav_logo"> <i class='bx bx-layer nav_logo-icon'></i> <span class="nav_logo-name">MONITA</span> </a>
                <div class="nav_list"> 
                    <a href="{{ url('/epss') }}" class="nav_link {{ Request::is('epss') ? 'active' : '' }}"> <i class='bx bx-grid-alt nav_icon'></i> <span class="nav_title">EPSS</span> </a> 
                    <!-- Dropdown for DOMAIN group -->
                    <div class="nav_item">
                        <a href="#" class="nav_link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#domain-dropdown" aria-expanded="false">
                            <i class='bx bx-folder nav_icon'></i>
                            <span class="nav_title">DOMAIN</span>
                        </a>
                        <div id="domain-dropdown" class="collapse">
                            <a href="{{ url('/sdi') }}" class="nav_link sub_link {{ Request::is('sdi') ? 'active' : '' }}">
                                <i class='bx bxs-data nav_icon '></i><span>SDI</span>
                            
                                
                            </a>
                            <a href="{{ url('/kualitas-data') }}" class="nav_link sub_link  {{ Request::is('kualitas-data') ? 'active' : '' }}"> <i class='bx bx-message-square-detail nav_icon'></i> <span class="nav_name">KD</span> </a> 
                            <a href="{{ url('/proses-bisnis-statistik') }}" class="nav_link sub_link  {{ Request::is('proses-bisnis-statistik') ? 'active' : '' }}"> <i class='bx bxs-business nav_icon'></i> <span class="nav_name">PBS</span> </a> 
                            <a href="{{ url('/kelembagaan') }}" class="nav_link sub_link  {{ Request::is('kelembagaan') ? 'active' : '' }}"> <i class='bx bx-world nav_icon'></i> <span class="nav_name">Kelembagaan</span> </a> 
                            <a href="{{ url('/statistik-nasional') }}" class="nav_link sub_link  {{ Request::is('statistik-nasional') ? 'active' : '' }}"> <i class='bx bx-stats nav_icon'></i> <span class="nav_name">SN</span> </a> 
                        
                            <!-- Add more links for this group -->
                        </div>
                    </div>

                    <div class="nav_item">
                        <a href="#" class="nav_link dropdown-toggle" data-bs-toggle="collapse" data-bs-target="#perencanaan-dropdown" aria-expanded="false">
                            <i class='bx bxs-dashboard nav_icon'></i>
                            <span class="nav_title">PERENCANAAN</span>
                        </a>
                        <div id="perencanaan-dropdown" class="collapse">
                            <a href="{{ url('/dashboard') }}" class="nav_link sub_link {{ Request::is('dashboard') ? 'active' : '' }}"> <i class='bx bx-bar-chart-alt-2 nav_icon'></i> <span class="nav_name">Dashboard</span> </a> 
                            <a href="{{ url('/list-opd') }}" class="nav_link sub_link {{ Request::is('list-opd') ? 'active' : '' }}"> <i class='bx bx-list-ul nav_icon'></i> <span class="nav_name">List OPD</span> </a> 
                    
                        
                            <!-- Add more links for this group -->
                        </div>
                    </div>
                    
                    
                    <a href="{{ route('logout') }}" 
                        onclick="event.preventDefault(); document.getElementById('logout-form').submit();" 
                        class="nav-link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">Logout</span></a>
                        <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                            @csrf
                        </form>             
                
              
                    


                </div>
            </div> 
            {{-- <a href="#" class="nav_link"> <i class='bx bx-log-out nav_icon'></i> <span class="nav_name">SignOut</span> </a> --}}
            
        </nav>
    </div>

    <!-- Link to your JavaScript files -->
    <!-- ... -->
    @section('script.navbar')
        <script>
            
            document.addEventListener("DOMContentLoaded", function(event) {
    
                const show_sideNavbar = (toggleId, navId, bodyId, headerId) =>{
                    const toggle = document.getElementById(toggleId),
                    nav = document.getElementById(navId),
                    bodypd = document.getElementById(bodyId),
                    headerpd = document.getElementById(headerId)
                    
                    // Validate that all variables exist
                    if(toggle && nav && bodypd && headerpd){
                        toggle.addEventListener('click', ()=>{
                        // show_side navbar
                        nav.classList.toggle('show_side')
                        // change icon
                        toggle.classList.toggle('bx-x')
                        // add padding to body
                        bodypd.classList.toggle('body-pd')
                        // add padding to header
                        headerpd.classList.toggle('body-pd')
                        })
                    }
                }
                
                show_sideNavbar('header-toggle','nav-bar','body-pd','header')

                
                /*===== LINK ACTIVE =====*/
                const linkColor = document.querySelectorAll('.nav_link')
                
                function colorLink(){
                    if(linkColor){
                        linkColor.forEach(l=> l.classList.remove('active'))
                        this.classList.add('active')
                    }
                }
                linkColor.forEach(l=> l.addEventListener('click', colorLink))
                
                    // Your code to run since DOM is loaded and ready
            });
        </script>
    @endsection
@endif

