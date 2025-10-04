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
		// Check if running as PWA (in standalone mode or display-mode: standalone)
		const isPWA = window.matchMedia('(display-mode: standalone)').matches ||
			window.navigator.standalone ||
			document.referrer.includes('android-app://');

		// Check if on a mobile device using more reliable methods
		const isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ||
			('maxTouchPoints' in navigator && navigator.maxTouchPoints > 0);

		return !isPWA && isMobileDevice;
	}

	function isOversized(img) {
		return (resizeWideImages() && img.width >= vseLightbox.resizeWidth) || (resizeTallImages() && img.height >= vseLightbox.resizeHeight);
	}

	function lightboxResizer(elements) {
		if (typeof vseLightbox === 'undefined') {
			return;
		}

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
		// Process images with proper loading detection for modern browsers
		function processImage($img) {
			if ($img.closest('.postlink').length > 0) {
				return;
			}

			var naturalWidth = $img[0].naturalWidth || 0;
			var naturalHeight = $img[0].naturalHeight || 0;
			var displayWidth = $img.outerWidth() || parseInt($img.attr('width')) || naturalWidth;
			var displayHeight = $img.outerHeight() || parseInt($img.attr('height')) || naturalHeight;

			var img = {
				index: '',
				width: Math.max(displayWidth, naturalWidth),
				height: Math.max(displayHeight, naturalHeight)
			};
			switch (vseLightbox.lightboxGal)
			{
				case 0:
					img.index = $targetImage.index($img);
				break;
				case 2:
					img.index = $img.closest('.post').attr('id') || '';
				break;
			}
			// attached images
			if ($img.parent('a').length > 0) {
				if (vseLightbox.lightboxAll || isOversized(img)) {
					$img.parent('a').attr({
						'data-lightbox': galleryName + img.index,
						'data-title': (vseLightbox.imageTitles) ? $img.attr('alt') : ''
					});
					$img.borderHover();
				}
			}
			// regular images
			else if (vseLightbox.lightboxAll || isOversized(img)) {
				var url = $img.attr('src');
				$img.wrap($('<a/>').attr({
					href: url,
					'data-lightbox': (vseLightbox.lightboxSig && $img.closest('.signature').length > 0) ? $targetImage.index($img) : galleryName + img.index,
					'data-title': (vseLightbox.imageTitles) ? ((url.indexOf(vseLightbox.downloadFile) !== -1) ? $img.attr('alt') : url.split('/').pop()) : ''
				}));
				$img.borderHover();
			}
		}

		$targetImage.each(function() {
			var $img = $(this);
			var img = this;

			// Use requestAnimationFrame to ensure DOM is ready
			requestAnimationFrame(function() {
				if (img.complete || img.readyState === 4) {
					processImage($img);
				} else {
					$img.one('load error', function() {
						processImage($img);
					});
					// Fallback timeout
					setTimeout(function() {
						processImage($img);
					}, 100);
				}
			});
		});
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
