// <!-- Initialize niceScroll -->

if (screen.width > 768) {
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
}
else {

  $("#mydiv").getNiceScroll().hide();
}


// <!-- Initialize bigtext -->
$('#bigtext').bigtext();

// <!-- Initialize white navbar -->
$(window).on('scroll',function () {
    var scrollDistance = $(window).scrollTop();
    if (scrollDistance > 100) {
        $('header .navbar').addClass('navNew')
        $('.logo').attr('src','img/logo.png');
    }else{
        $('header .navbar').removeClass('navNew')
        $('.logo').attr('src','img/logo-white.png');    
    }
    
})
$('.show li a').addClass('text-center')
//how to go to the click section from nav
$("#navbar").find(".link").click(function(e) {
  e.preventDefault();
  $( ".show" ).removeClass( "show" )
  var section = $(this).attr("href");
  $("html, body").animate({
      scrollTop: $(section).offset().top - 100
  },2000,"swing");
});
$("footer ul").find("a").click(function(e) {
  e.preventDefault();
  var section = $(this).attr("href");
  $("html, body").animate({
      scrollTop: $(section).offset().top - 100
  },2000,"swing");
});

// <!-- Initialize Swiper -->
// Home section
var swiper = new Swiper('#home .home-container', {
  effect: 'fade',
  // loop: true,
  autoplay: {
    delay: 10000,
    disableOnInteraction: false,
  },
    pagination: {
      el: '.swiper-pagination',
      dynamicBullets: false,
      clickable: true,
    },
  });

// testimonials section
var testimSwiper = new Swiper('#testimonials .swiper-container', {
  spaceBetween: 0,
  centeredSlides: true,
  loop: true,
  autoplay: {
    delay: 5000,
    disableOnInteraction: false,
  },
  pagination: {
    el: '.swiper-pagination',
    clickable: true,
  },
  navigation: {
    nextEl: '.swiper-button-next',
    prevEl: '.swiper-button-prev',
  },
});

// <!-- MAKE THE SLIDER home IMGS MOVE  -->
$(window).scroll(function(e) {
parallax();
})
function parallax() {
var scroll = $(window).scrollTop();
var screenHeight = $(window).height();

$('.parallax').each(function() {
    var offset = $(this).offset().top;
    var distanceFromBottom = offset - scroll - screenHeight
    if (offset > screenHeight && offset) {
    $(this).css('background-position', 'center ' + (( distanceFromBottom ) * 0.4) +'px');
    } else {
    $(this).css('background-position', 'center ' + (( scroll  ) * 0.4) + 'px');
    }
})
}






$(function() {  
  if ($(screen).width() < 800) {
    $(".snip1543").addClass("hover");
  }
});



  
  
 //controol media elements
$("#media .btn-custom").click(
  function() {
    $("#media .btn-custom").toggleClass("seen");
    if($("#media .btn-custom").hasClass('seen')){
      $("#media .btn-custom p").text('show Less');	
      $("#media .btn-custom i").removeClass( "fas fa-arrow-down" ).addClass("fas fa-arrow-up");
     

      $("#media .hiddable" ).animate({
        opacity: 1,
        height: "88%"
      }, 500)
     
     
		} else {
      $("#media .btn-custom p").text('show More');
      $("#media .btn-custom i").removeClass( "fas fa-arrow-up" ).addClass("fas fa-arrow-down");      
      $("#media .hiddable" ).animate({
        opacity: 0,
        height: "0"
      }, 500)      
		}
  }
)

// popup of the event info

$('.modal').iziModal({
  title: ' ',
  iconColor:'#2584A5',
  headerColor: 'transparent',
  width: '50%',
  closeButton: true,
  overlayColor: 'rgba(0, 0, 0, 0.5)',
  // fullscreen: true,
  transitionIn: 'fadeInUp',
  transitionOut: 'fadeOutDown'
});


AOS.init({
  once: true
 
});

if (localStorage.getItem('test')==5) {
  
  $( document ).ready(function() {
    swal({
                    title: "Thanks for your registration",
                    text: " You will receive a confirmation email with all event details and a payment link to complete your registration by finalizing your payment whether by credit card or cash.",
                    type: "success",
                    showCancelButton: false,
                    confirmButtonColor: '#2F80ED',
                    confirmButtonText: 'Continue',
                    closeOnConfirm: false,
                  
                });
  });
    
    localStorage.removeItem('test');
}