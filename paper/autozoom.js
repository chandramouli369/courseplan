//Autozoom

jQuery(document).ready(function($){
  
 nsZoomZoom(); 
  
 // $( window ).resize(function() { 
 //   nsZoomZoom();
 // });
  
  
 function nsZoomZoom() {
    htmlWidth = $('html').innerWidth();
    console.log(htmlWidth);
    bodyWidth = 1366;
    // bodyWidth = 1000;
    if (htmlWidth == bodyWidth)
    {
        scale = 1;
    }
    else if (htmlWidth < bodyWidth)
       // scale = 1;
       scale = htmlWidth / bodyWidth; 
    else {
       scale = htmlWidth / bodyWidth; 
    }
 
    // Req for IE9
    $("body").css('-ms-transform', 'scale(' + scale + ')');
    $("body").css('transform', 'scale(' + scale + ')');
 } 
    
});