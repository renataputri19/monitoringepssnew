$(document).ready(function(){
    // Initialize the carousel without auto-swipe
    $('#indikatorCarousel').carousel({
        interval: false
    });

    // Prevent event propagation for buttons inside carousel items
    $('#indikatorCarousel .btn').on('click', function(event){
        event.stopPropagation();
    });

    // Custom event handling for swipe controls
    // You'll need to use a library like TouchSwipe or another for swipe detection
    $('#indikatorCarousel .carousel-inner').swipe({
        swipeLeft: function() {
            $('#indikatorCarousel').carousel('next');
        },
        swipeRight: function() {
            $('#indikatorCarousel').carousel('prev');
        },
        threshold: 0
    });
});

// Include your TouchSwipe library if not already included
// <script src="path_to_your_touchswipe_library.js"></script>
