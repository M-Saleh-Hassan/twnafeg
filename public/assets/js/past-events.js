// <!-- Initialize white navbar -->
$(window).on('scroll',function () {
    var scrollDistance = $(window).scrollTop();
    if (scrollDistance > 50) {
        $('header .navbar').addClass('navNew')
        $('.logo').attr('src','img/logo.png');
    }else{
        $('header .navbar').removeClass('navNew')
        $('.logo').attr('src','img/logo-white.png');    
    }
    
})

AOS.init({
  once: true
 
});
// <!-- Initialize niceScroll -->
$(function() {  
    $("body").niceScroll({
      cursorwidth:"8px",
      cursorcolor: "#3c415e", // change cursor color in hex
      cursorborder: "0px solid #fff", // css definition for cursor border
      zindex: "auto" | [10000000000], // change z-index for scrollbar div
      cursoropacitymin: 0.4,// change opacity when cursor is inactive (scrollabar "hidden" state), range from 1 to 0
      background:"rgba(20,20,20,0.3)",
    });
  });




  
// <!-- grid niceScroll -->
  var $grid = $('.grid').masonry({
    // set itemSelector so .grid-sizer is not used in layout
    itemSelector: '.grid-item',
    // use element for option
    columnWidth: '.grid-sizer',
    percentPosition: true	
  })
  
  $grid.imagesLoaded().progress( function() {
    $grid.masonry();
  });




  $('[data-fancybox="gallery"]').fancybox({
    loop: true,
    buttons: [
        "zoom",
        "slideShow",
        "fullScreen",
        "download",
        "thumbs",
        "close"
      ],

	thumbs : {
		autoStart : false
	}
});

AOS.init({
  once: true
 
});