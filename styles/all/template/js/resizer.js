(function($) { // Avoid conflicts with other libraries

	'use strict';

	$.fn.extend({
		borderHover: function() {
			return this.each(function() {
				$(this).css({
					'border': 'solid 3px transparent',
					'transition': 'border-color 0.1s ease-out',
					'border-radius': '6px',
					'cursor': 'pointer'
				}).hover(function() {
					$(this).css('border-color', '#4ae');
				}, function() {
					$(this).css('border-color', 'transparent');
				});
			});
		}
	});

	$(function() {
		var $targetImage = $('.postimage'),
			galleryName = 'post-gallery',
			mobileWidth = 900;
		if (!vseLightbox.lightboxSig) {
			$targetImage = $targetImage.not(function() {
				return $(this).closest('.signature').length > 0;
			});
		}
		if (vseLightbox.resizeWidth > 0 && $(window).width() > mobileWidth) {
			$targetImage.css('max-width', vseLightbox.resizeWidth + 'px');
		} else {
			return;
		}
		// enclosing the following in a setTimeout seems to solve issues with
		// images not being ready and causing $(this).width() to return 0.
		setTimeout(function() {
			$targetImage.one('load', function() {
				if ($(this).closest('.postlink').length > 0) return;
				var imgIndex = (vseLightbox.lightboxGal) ? '' : $targetImage.index(this);
				if ($(this).parent('a').length > 0) {
					if ($(this).outerWidth() >= vseLightbox.resizeWidth) {
						$(this).parent('a').attr({
							'data-lightbox': galleryName + imgIndex,
							'data-title': $(this).attr('alt')
						}).end().borderHover();
					}
				}
				else if ($(this).outerWidth() >= vseLightbox.resizeWidth) {
					$(this).wrap(function() {
						var url = $(this).attr('src');
						return $('<a/>').attr({
							'href': url,
							'data-lightbox': galleryName + imgIndex,
							'data-title': (url.indexOf('download/file.php') !== -1) ? $(this).attr('alt') : url.split('/').pop()
						});
					}).borderHover();
				}
			}).each(function() {
				if (this.complete) $(this).load();
			});
		}, 0);
	});

})(jQuery);
