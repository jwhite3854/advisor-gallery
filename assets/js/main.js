(function ($) {
	'use strict';

	function imageLoaded() {
    	imagesLoaded++;
    	if (imagesLoaded == totalImages) {
			$grid.masonry();
    	}
	}

	function initMasonry() {
		let grid = $('.grid').masonry({
			isInitLayout: false,
			itemSelector: '.grid-item',
			columnWidth: 120,
			gutter: 12,
			transitionDuration: '1.5s'
		});

		let imagesLoaded = 0;
		let totalImages = $('img').length;

		$('img').each(function(idx, img) {
			$('<img>').on('load', imageLoaded).attr('src', $(img).attr('src'));
		});
	}

	function toggleFavorite(element) {
		let src = $(element).data('src');
		$.post( "api/toggle-favorites", { src: src }).done(function( data ) {
			if (data) {
				$(element).removeClass('chosen');
			} else {
				$(element).addClass('chosen');
			}
		});
	}

	$(document).ready(function() {
		let items = $('.item');
		if ( items.length > 0 ) {
			items.simpleLightbox();
		}

		let grid = $('.grid');
		if ( grid.length > 0 ) {
			initMasonry();
		}

		$('.container').on("click", '.favToggler', function(e){
			toggleFavorite(this);
		});
	});
})(jQuery);