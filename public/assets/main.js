/* threebox slider start */
if($(".threebox-slider").length){
	var swiper = new Swiper('.threebox-slider', {
		spaceBetween: 30,
		loop: true,
		navigation: {
			nextEl: '.swiper-left-arrow',
			prevEl: '.swiper-right-arrow',
		},
		// Responsive breakpoints
		breakpoints: {
			// when window width is >= 320px
			320: {
				slidesPerView: 1,
			},
			// when window width is >= 480px
			576: {
				slidesPerView: 2,
			},
			// when window width is >= 640px
			992: {
				slidesPerView: 3,
				// Navigation arrows
				navigation: {
					nextEl: '.swiper-left-arrow',
					prevEl: '.swiper-right-arrow',
				},
			}
		}
	});
}	
/* threebox slider end */

$(document).ready(function(){
	
	$(".toTop").click(function() {
		$("html, body").animate({ scrollTop: 0 }, "slow");
		return false;
	});
});