(function($){
	$('.item').simpleLightbox();

	var $grid = $('.grid').masonry({
		isInitLayout: false,
		itemSelector: '.grid-item',
		columnWidth: 120,
		gutter: 12,
		transitionDuration: '1.5s'
	});

	var imagesLoaded = 0;
  	var totalImages = $('img').length;

  	$('img').each(function(idx, img) {
    	$('<img>').on('load', imageLoaded).attr('src', $(img).attr('src'));
  	});

  	function imageLoaded() {
    	imagesLoaded++;
    	if (imagesLoaded == totalImages) {
			$grid.masonry();
    	}
	} 
})(jQuery);