$(".nav-blacklayer").hide();

const hamburger = document.querySelector(".hamburger");
const navMenu = document.querySelector(".nav-menu");
hamburger.addEventListener("click", mobileMenu);
function mobileMenu() {
  hamburger.classList.toggle("active");
  navMenu.classList.toggle("active");
  $(".nav-blacklayer").toggle();
  $("body").toggleClass("overflow-hidden");
}

const navLink = document.querySelectorAll(".nav-link");
navLink.forEach((n) => n.addEventListener("click", closeMenu));
function closeMenu() {
  hamburger.classList.remove("active");
  navMenu.classList.remove("active");
  $(".nav-blacklayer").hide();
  $("body").removeClass("overflow-hidden");
}

$(document).ready(function () {
  $(".close-nav").click(function () {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
    $(".nav-blacklayer").hide();
    $("body").removeClass("overflow-hidden");
  });
  $(".nav-blacklayer").click(function () {
    hamburger.classList.remove("active");
    navMenu.classList.remove("active");
    $(".nav-blacklayer").hide();
    $("body").removeClass("overflow-hidden");
  });
});

wow = new WOW({
  boxClass: "wow", 
  animateClass: "animated", 
  offset: 0, 
  mobile: true, 
  live: true, 
});
wow.init();

 




var didScroll;
var lastScrollTop = 0;
var delta = 5;
var navbarHeight = $('#navfix').outerHeight();

$(window).scroll(function (event) {
	didScroll = true;
});

setInterval(function () {
	if (didScroll) {
		hasScrolled();
		didScroll = false;
	}
}, 250);

function hasScrolled() {
	var st = $(this).scrollTop();
	if (st === 0) {
        $('.navbar-section').removeClass('active');      
    }
	if (Math.abs(lastScrollTop - st) <= delta)
		return;
	if (st > lastScrollTop && st > navbarHeight) {
		$('#navfix').css('top', '-100px');
		$('.navbar-section').addClass('active');
	} else {
		if (st + $(window).height() < $(document).height()) {
			$('#navfix').css('top', '20px');
		}
	}	

	lastScrollTop = st;
}