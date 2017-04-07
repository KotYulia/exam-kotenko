jQuery(function($) {
   $(document).ready(function() {


       $('.container').each(function(){
           var highestBox = 0;
           $('.col-md-4 ', this).each(function(){
               if($(this).height() > highestBox) {
                   highestBox = $(this).height();
               }
           });
           $('.col-md-4 ',this).height(highestBox);
       });
   });
});