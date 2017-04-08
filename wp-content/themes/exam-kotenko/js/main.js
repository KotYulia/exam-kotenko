function initMap() {
    var uluru = {lat: 48.8511901, lng: 2.3266958};
    var map = new google.maps.Map(document.getElementById('map'), {
        zoom: 4,
        center: uluru
    });
    var marker = new google.maps.Marker({
        position: uluru,
        map: map
    });
}

jQuery(function($) {
   $(document).ready(function() {


       $(".section-scroll-down").on("click","a", function (event) {
           event.preventDefault();
           var id  = $(this).attr('href'),
               top = $(id).offset().top;
           $('body,html').animate({scrollTop: top}, 1500);
       });

       $('.container').each(function(){
           var highestBox = 0;
           $('.col-md-4 ', this).each(function(){
               if($(this).height() > highestBox) {
                   highestBox = $(this).height();
               }
           });
           $('.col-md-4 ',this).height(highestBox);
       });

       $('.responsive').slick({
           slidesToShow: 4,
           slidesToScroll: 1,
           responsive: [
               {
                   breakpoint: 1200,
                   settings: {
                       slidesToShow: 6,
                       slidesToScroll: 1,
                   }
               },
               {
                   breakpoint: 800,
                   settings: {
                       slidesToShow: 4,
                       slidesToScroll: 1
                   }
               },
               {
                   breakpoint: 480,
                   settings: {
                       slidesToShow: 1,
                       slidesToScroll: 1
                   }
               }
           ]
       });
   });
});