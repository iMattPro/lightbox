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
				}).on('mouseenter', function() {
					$(this).css('border-color', '#4ae');
				}).on('mouseleave',  function() {
					$(this).css('border-color', 'transparent');
				});
			});
		}
	});

	function resizeWideImages() {
		return (vseLightbox.resizeWidth > 0);
	}

	function resizeTallImages() {
		return (vseLightbox.resizeHeight > 0);
	}

	function isMobile() {
		var mobileWidth = 900; // disable on screens < 900px
		return $(window).width() <= mobileWidth && phpbb.isTouch;
	}

	function isOversized(img) {
		return (resizeWideImages() && img.width >= vseLightbox.resizeWidth) || (resizeTallImages() && img.height >= vseLightbox.resizeHeight);
	}

	function lightboxResizer(elements) {
		if (isMobile() || (!resizeWideImages() && !resizeTallImages() && !vseLightbox.lightboxAll)) {
			return;
		}
		var $targetImage = elements.find('.postimage'),
			galleryName = 'post-gallery';
		if (!vseLightbox.lightboxSig) {
			$targetImage = $targetImage.not(function() {
				return $(this).closest('.signature').length > 0;
			});
		}
		// enclosing the following in a setTimeout seems to solve issues with
		// images not being ready and causing $(this).width() to return 0.
		setTimeout(function() {
			$targetImage.one('load', function() {
				if ($(this).closest('.postlink').length > 0) {
					return;
				}
				var img = {
					index: '',
					width: $(this).outerWidth(),
					height: $(this).outerHeight()
				};
				switch (vseLightbox.lightboxGal)
				{
					case 0:
						img.index = $targetImage.index(this);
					break;
					case 2:
						img.index = $(this).closest('.post').attr('id') || '';
					break;
				}
				// attached images
				if ($(this).parent('a').length > 0) {
					if (vseLightbox.lightboxAll || isOversized(img)) {
						$(this).parent('a').attr({
							'data-lightbox': galleryName + img.index,
							'data-title': (vseLightbox.imageTitles) ? $(this).attr('alt') : ''
						}).end().borderHover();
					}
				}
				// regular images
				else if (vseLightbox.lightboxAll || isOversized(img)) {
					$(this).wrap(function() {
						var url = $(this).attr('src');
						return $('<a/>').attr({
							href: url,
							'data-lightbox': (vseLightbox.lightboxSig && $(this).closest('.signature').length > 0) ? $targetImage.index(this) : galleryName + img.index,
							'data-title': (vseLightbox.imageTitles) ? ((url.indexOf(vseLightbox.downloadFile) !== -1) ? $(this).attr('alt') : url.split('/').pop()) : ''
						});
					}).borderHover();
				}
			}).each(function() {
				if (this.complete) {
					$(this).trigger('load');
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

	// Compatibility with SimpleSpoiler extension
	$('.spoiler-header').on('click', function(e) {
		var spoiler = e.target.closest('.spoiler');
		if (!spoiler.hasAttribute('open')) {
			lightboxResizer($(spoiler).find('.spoiler-body'));
		}
	});

	// Compatibility with ABBC3 spoil BBCode
	$('.spoilbtn').on('click', function(e) {
		var spoilcontent = $(e.target.closest('.spoilwrapper')).find('.spoilcontent');
		if (spoilcontent.css('display') === 'none') {
			lightboxResizer(spoilcontent);
		}
	});

	// Compatibility with mChat extension
	if (typeof mChat === 'object') {
		$(mChat).on({
			mchat_add_message_before: function(e, data) {
				setTimeout(function() {
					lightboxResizer(data.message);
				}, 0);
			},
			mchat_edit_message_before: function(e, data) {
				setTimeout(function() {
					lightboxResizer(data.newMessage);
				}, 0);
			}
		});
	}

})(jQuery);
