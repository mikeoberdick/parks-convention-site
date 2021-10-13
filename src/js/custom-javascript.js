jQuery(function($){
	$(document).ready(function() {

		//Smooth scroll behavior for jump links
		$(".scroll-down").on('click', function(event) {
		  var hash = this.hash;
		  $('html, body').animate({
		    scrollTop: $(hash).offset().top
		  }, 500);
		    return false;
		});

		//Move homepage hero up under the logo and geometric overlay
		var top = $('#wrapper-navbar').height();
		$('#homepage #hero').css('margin-top', '-' + top + 'px');

		//Push down the footer on short pages
		$('#js-heightControl').css('height', $(window).height() - $('html').height() +'px');

		//FULL CAR DIV CLICKABLE LINK
		$('.link').on('click', function(e){
		  e.preventDefault();
		  window.location.href=$(this).data('link');
		});

		//SINGLE CAR PAGE GALLERY
//If thumb is last in gallery go to first one (after video)
$.fn.nextOrFirst = function (selector) {
  var next = this.next(selector);
  return next.length ? next : this.prevAll(selector).last();
};

//If thumb is first in gallery go to last one
$.fn.prevOrLast = function (selector) {
  var prev = this.prev(selector);
  return prev.length ? prev : this.nextAll(selector).last();
};

//Handle the video thumb
$(".video-thumb").click(function () {
  $("#imageViewer").addClass("d-none");
  $("#videoViewer").removeClass("d-none");
  $("#carGallery").children().removeClass("selected");
  $(this).addClass("selected");
  $('html,body').animate({
    scrollTop: $('.entry-header').offset().top
  }, 0);
});

//Handle the image thumbs
$("#singleCar .gallery-thumb").click(function () {
  var video = $("#videoViewer iframe").attr("src");
  $("#videoViewer iframe").attr("src","");
  $("#videoViewer iframe").attr("src",video);
  $("#videoViewer").addClass("d-none");
  $("#imageViewer").removeClass("d-none");
  $("#carGallery").children().removeClass("selected");
  $(this).addClass("selected");
  //Need to remove the thumbnail size and add the larger size parameters
  var img = $(this).find("img").attr("src");
  var imgRaw= img.substr(0, img.indexOf('?'));
  var imgFull = imgRaw + '?h=460&w=730';
  var index = $(this).find('img').attr('data-slide-to');
  $("#imageViewer #featuredImage").attr({"src": imgFull, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $('html,body').animate({
    scrollTop: $('.entry-header').offset().top
  }, 0);
});

//Previous button functionality
$("#prev").click(function () {
  var prev = $(".selected").prevOrLast(".gallery-thumb");
  var img = prev.find("img").attr("src");
  var imgRaw= img.substr(0, img.indexOf('?'));
  var imgFull = imgRaw + '?h=460&w=730';
  var index = prev.find("img").attr("data-slide-to");
  $("#imageViewer #featuredImage").attr({"src": imgFull, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $("#carGallery").children().removeClass("selected");
  prev.addClass("selected");
});

//Next button functionality
$("#next").click(function () {
  var next = $(".selected").nextOrFirst(".gallery-thumb");
  var img = next.find("img").attr("src");
  var imgRaw= img.substr(0, img.indexOf('?'));
  var imgFull = imgRaw + '?h=460&w=730';
  var index = next.find("img").attr("data-slide-to");
  $("#imageViewer #featuredImage").attr({"src": imgFull, "data-slide-to": index});
  $("#modalLauncher").attr("data-slide-to",index);
  $("#carGallery").children().removeClass("selected");
  next.addClass("selected");
});

//Load up the image last viewed in modal when close button was clicked
$('#exampleModal').on('hidden.bs.modal', function (e) {
  var currentIndex = $('.carousel-item.active').index();
  $('.gallery-thumb').eq(currentIndex).trigger('click');
});

//LOAD MORE PHOTOS IN Single Car GALLERY
$('#singleCar .more-photos').on( 'click', function() {
    $('#carGallery .gallery-thumb:gt(10)').toggleClass('hidden');
    $(this).find('h5 span').text(function(i, text){
          return text === "LESS PHOTOS" ? "MORE PHOTOS" : "LESS PHOTOS";
      })
    $(this).find('.fa-caret-down').toggleClass('rotate');
});

		//if ($(window).width() < 992) {
		   //do some mobile stuff
		//}

		//end of document ready call
	});
//end of file
});