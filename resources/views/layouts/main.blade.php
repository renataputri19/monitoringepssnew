<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>@yield('title') - Monitoring EPSS</title>
        <link href="{{ asset('css/footer.css') }}" rel="stylesheet">
        <link href="{{ asset('css/navbar.css') }}" rel="stylesheet">
        <link href="{{ asset('css/home.css') }}" rel="stylesheet">
        <link href="{{ asset('css/epss.css') }}" rel="stylesheet">
        <link href="{{ asset('css/carousel-style.css') }}" rel="stylesheet">
        <link href="{{ asset('css/dashboard.css') }}" rel="stylesheet">
        <link href="{{ asset('css/list-opd.css') }}" rel="stylesheet">
        
        
        
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/aos@2.3.4/dist/aos.css" />
        {{-- <link href="{{ asset('css/login.css') }}" rel="stylesheet"> --}}
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">

        <!-- Scripts -->
        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>


    @if(Auth::check())
        <body id="body-pd" class="body-pd">
    @else
        <body>
    @endif
            <header>  
                @include('partials.navbar')
            </header>

            @yield('content')

            <footer id="hubungi-kami" style="height: 229px; background-color: #263238;">
                @include('partials.footer')
            </footer>

        
        </body>


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
    
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
    <script src="{{ asset('js/carousel-js.js') }}"></script>
    
    
    @yield('scripts')
    @yield('script.navbar')
    
    <script>
        function validateFiles() {
            let fileInput = document.getElementById('file');
            let fileError = document.getElementById('file-error');
            fileError.style.display = 'none'; // Hide error message
    
            for (let i = 0; i < fileInput.files.length; i++) {
                let file = fileInput.files[i];
                
                // Check if the file is a PDF
                if (file.type !== 'application/pdf') {
                    fileError.style.display = 'block'; // Show error message
                    fileInput.value = ''; // Reset file input
                    return;
                }
    
                // Check if the file size is more than 3MB
                if (file.size > 3 * 1024 * 1024) {
                    fileError.style.display = 'block'; // Show error message
                    fileInput.value = ''; // Reset file input
                    return;
                }
            }
        }
        
    </script>

    <script>
        // Wait for the DOM to be ready
        document.addEventListener('DOMContentLoaded', function () {
            // Check if the success message exists
            var successAlert = document.querySelector('.alert-success');
            if (successAlert) {
                // Hide the success message after 5 seconds (5000 milliseconds)
                setTimeout(function() {
                    successAlert.style.display = 'none';
                }, 5000);
            }
            
            // Additionally, you can hide the alert when the user starts interacting with the form again
            var fileInput = document.getElementById('file');
            fileInput.addEventListener('change', function() {
                if (successAlert) {
                    successAlert.style.display = 'none';
                }
            });
        });
    </script>
    



</html>


