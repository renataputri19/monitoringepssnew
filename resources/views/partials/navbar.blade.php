<nav class="bg-white h-14 flex justify-between items-center px-6">
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

    
</nav>
