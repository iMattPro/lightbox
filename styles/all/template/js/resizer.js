/*global vseLightbox, mChat*/
(function($) { // Avoid conflicts with other libraries

	'use strict';

	$.fn.extend({
		borderHover: function() {
			return this.each(function() {
				$(this).css({
					border: 'solid 3px transparent',
					borderRadius: '6px',
					transition: 'border-color 0.1s ease-out',
					cursor: 'pointer'
				}).hover(function() {
					$(this).css('border-color', '#4ae');
				}, function() {
					$(this).css('border-color', 'transparent');
				});
			});
		}
	});

	function isResizable() {
		var mobileWidth = 900; // disable on screens < 900px
		return (vseLightbox.resizeWidth > 0 && $(window).width() > mobileWidth);
	}

	function lightboxResizer(elements) {
		var $targetImage = elements.find('.postimage'),
			galleryName = 'post-gallery';
		if (!vseLightbox.lightboxSig) {
			$targetImage = $targetImage.not(function() {
				return $(this).closest('.signature').length > 0;
			});
		}
		if (isResizable()) {
			$targetImage.css('max-width', vseLightbox.resizeWidth + 'px');
		} else {
			return;
		}
		// enclosing the following in a setTimeout seems to solve issues with
		// images not being ready and causing $(this).width() to return 0.
		setTimeout(function() {
			$targetImage.one('load', function() {
				if ($(this).closest('.postlink').length > 0) {
					return;
				}
				var imgWidth = $(this).outerWidth(),
					galIndex =  '';
				switch (vseLightbox.lightboxGal)
				{
					case 0:
						galIndex = $targetImage.index(this);
					break;
					case 2:
						galIndex = $(this).closest('.post').attr('id') || '';
					break;
				}
				// attached images (check their width and height)
				if ($(this).parent('a').length > 0) {
					if (imgWidth >= vseLightbox.resizeWidth || $(this).height() >= vseLightbox.resizeWidth) {
						$(this).parent('a').attr({
							'data-lightbox': galleryName + galIndex,
							'data-title': (vseLightbox.imageTitles) ? $(this).attr('alt') : ''
						}).end().borderHover();
					}
				}
				// regular images
				else if (imgWidth >= vseLightbox.resizeWidth) {
					$(this).wrap(function() {
						var url = $(this).attr('src');
						return $('<a/>').attr({
							href: url,
							'data-lightbox': galleryName + galIndex,
							'data-title': (vseLightbox.imageTitles) ? ((url.indexOf(vseLightbox.downloadFile) !== -1) ? $(this).attr('alt') : url.split('/').pop()) : ''
						});
					}).borderHover();
				}
			}).each(function() {
				if (this.complete) {
					$(this).load();
				}
			});
		}, 0);
	}

	$(function() {
		lightboxResizer($(document));
	});

	// Compatibility with QuickReply Reloaded extension
	$('#qr_posts').on('qr_loaded', function(e, elements) {
		lightboxResizer(elements);
	});
	$('#qr_postform').on('ajax_submit_preview', function() {
		lightboxResizer($('#preview'));
	});

	// Compatibility with mChat extension
	if (typeof mChat === 'object') {
		$(mChat).on('mchat_add_message_before', function(e, data) {
			setTimeout(function() {
				lightboxResizer(data.message);
			}, 0);
		});
	}

})(jQuery);
