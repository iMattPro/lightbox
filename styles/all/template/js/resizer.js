/*global vseLightbox, mChat*/
(() => {
	'use strict';

	const addBorderHover = (img) => {
		Object.assign(img.style, {
			border: 'solid 3px transparent',
			borderRadius: '6px',
			transition: 'border-color 0.1s ease-out',
			cursor: 'pointer'
		});
		img.addEventListener('mouseenter', () => img.style.borderColor = '#4ae');
		img.addEventListener('mouseleave', () => img.style.borderColor = 'transparent');
	};

	const isMobile = () => {
		// Check if running as PWA (in standalone mode or display-mode: standalone)
		const isPWA = window.matchMedia('(display-mode: standalone)').matches ||
			window.navigator.standalone ||
			document.referrer.includes('android-app://');
		// Check if on a mobile device using more reliable methods
		const isMobileDevice = /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ||
			('maxTouchPoints' in navigator && navigator.maxTouchPoints > 0);
		return !isPWA && isMobileDevice;
	};

	const isOversized = (img) =>
		(vseLightbox.resizeWidth > 0 && img.width >= vseLightbox.resizeWidth) ||
		(vseLightbox.resizeHeight > 0 && img.height >= vseLightbox.resizeHeight);

	const lightboxResizer = (container) => {
		if (typeof vseLightbox === 'undefined' || isMobile() ||
			(vseLightbox.resizeWidth <= 0 && vseLightbox.resizeHeight <= 0 && !vseLightbox.lightboxAll)) {
			return;
		}

		const selector = vseLightbox.lightboxSig ? '.postimage' : '.postimage:not(.signature .postimage)';
		const images = Array.from(container.querySelectorAll(selector)).filter(img => {
			if (img.closest('.spoiler:not([open]), .abbc3-spoiler:not([open])')) {
				return false;
			}
			const spoilcontent = img.closest('.spoilcontent');
			return !(spoilcontent && spoilcontent.style.display === 'none');
		});

		const processImage = (img, index) => {
			if (img.closest('.postlink')) {
				return;
			}

			const rect = img.getBoundingClientRect();
			const imgData = {
				width: Math.max(rect.width || parseInt(img.getAttribute('width')) || img.naturalWidth || 0, img.naturalWidth || 0),
				height: Math.max(rect.height || parseInt(img.getAttribute('height')) || img.naturalHeight || 0, img.naturalHeight || 0),
				index: vseLightbox.lightboxGal === 0 ? index : vseLightbox.lightboxGal === 2 ? (img.closest('.post') ? img.closest('.post').id : '') : ''
			};

			if (!vseLightbox.lightboxAll && !isOversized(imgData)) {
				return;
			}

			const galleryId = 'post-gallery' + imgData.index;
			const parentLink = img.parentElement;

			if (parentLink.tagName === 'A') {
				// attached images
				parentLink.setAttribute('data-lightbox', galleryId);
				if (vseLightbox.imageTitles) {
					parentLink.setAttribute('data-title', img.alt || '');
				}
			} else {
				// bbcode images
				const link = document.createElement('a');
				link.href = img.src;
				link.setAttribute('data-lightbox', (vseLightbox.lightboxSig && img.closest('.signature')) ? index : galleryId);
				if (vseLightbox.imageTitles) {
					link.setAttribute('data-title', img.src.includes(vseLightbox.downloadFile) ? (img.alt || '') : (img.src.split('/').pop() || ''));
				}
				img.parentNode.insertBefore(link, img);
				link.appendChild(img);
			}
			addBorderHover(img);
		};

		images.forEach((img, index) => {
			if (img.complete) {
				processImage(img, index);
			} else {
				const handler = () => processImage(img, index);
				img.addEventListener('load', handler, { once: true });
				img.addEventListener('error', handler, { once: true });
			}
		});
	};

	document.addEventListener('DOMContentLoaded', () => lightboxResizer(document));

	// Compatibility with QuickReply Reloaded extension
	if (typeof $ !== 'undefined') {
		$('#qr_posts').on('qr_loaded', (e, elements) => {
			lightboxResizer(elements);
		});
		$('#qr_postform').on('ajax_submit_preview', () => {
			lightboxResizer(document.getElementById('preview'));
		});
	}

	// Handle spoiler clicks
	document.addEventListener('click', (e) => {
		let container;
		if (e.target.matches('.spoiler-header') && !e.target.closest('.spoiler').hasAttribute('open')) {
			container = e.target.closest('.spoiler').querySelector('.spoiler-body');
		} else if (e.target.matches('.spoilbtn')) {
			const spoilwrapper = e.target.closest('.spoilwrapper');
			if (spoilwrapper) {
				container = spoilwrapper.querySelector('.spoilcontent');
			}
		} else if (e.target.matches('summary') && !e.target.closest('.abbc3-spoiler').hasAttribute('open')) {
			container = e.target.closest('.abbc3-spoiler');
		}
		if (container) {
			setTimeout(() => lightboxResizer(container), 0);
		}
	});

	// Compatibility with mChat extension
	if (typeof $ !== 'undefined') {
		if (typeof mChat === 'object') {
			$(mChat).on('mchat_add_message_before mchat_edit_message_before', (e, data) => {
				setTimeout(() => lightboxResizer(data.message || data.newMessage), 0);
			});
		}
	}

})();
