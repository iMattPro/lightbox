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

	const resizeWideImages = () => vseLightbox.resizeWidth > 0;
	const resizeTallImages = () => vseLightbox.resizeHeight > 0;

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
		(resizeWideImages() && img.width >= vseLightbox.resizeWidth) ||
		(resizeTallImages() && img.height >= vseLightbox.resizeHeight);

	const lightboxResizer = (container) => {
		if (typeof vseLightbox === 'undefined' || isMobile() ||
			(!resizeWideImages() && !resizeTallImages() && !vseLightbox.lightboxAll)) {
			return;
		}

		let images = Array.from(container.querySelectorAll('.postimage'));
		if (!vseLightbox.lightboxSig) {
			images = images.filter(img => !img.closest('.signature'));
		}

		const processImage = (img, index) => {
			if (img.closest('.postlink')) {
				return;
			}

			const naturalWidth = img.naturalWidth || 0;
			const naturalHeight = img.naturalHeight || 0;
			const rect = img.getBoundingClientRect();
			const displayWidth = rect.width || parseInt(img.getAttribute('width')) || naturalWidth;
			const displayHeight = rect.height || parseInt(img.getAttribute('height')) || naturalHeight;

			const post = img.closest('.post');
			const imgData = {
				width: Math.max(displayWidth, naturalWidth),
				height: Math.max(displayHeight, naturalHeight),
				index: vseLightbox.lightboxGal === 0 ? index :
					   vseLightbox.lightboxGal === 2 ? (post ? post.id : '') : ''
			};

			const galleryName = 'post-gallery';
			const shouldProcess = vseLightbox.lightboxAll || isOversized(imgData);

			if (!shouldProcess) {
				return;
			}

			const parentLink = img.parentElement;
			if (parentLink.tagName === 'A') {
				// attached images
				parentLink.setAttribute('data-lightbox', galleryName + imgData.index);
				if (vseLightbox.imageTitles) {
					parentLink.setAttribute('data-title', img.alt || '');
				}
				addBorderHover(img);
			} else {
				// regular images
				const link = document.createElement('a');
				link.href = img.src;
				link.setAttribute('data-lightbox',
					(vseLightbox.lightboxSig && img.closest('.signature')) ? index : galleryName + imgData.index
				);
				if (vseLightbox.imageTitles) {
					const title = img.src.includes(vseLightbox.downloadFile) ?
						img.alt : img.src.split('/').pop();
					link.setAttribute('data-title', title || '');
				}
				img.parentNode.insertBefore(link, img);
				link.appendChild(img);
				addBorderHover(img);
			}
		};

		// Use requestAnimationFrame to ensure DOM is ready
		images.forEach((img, index) => {
			requestAnimationFrame(() => {
				if (img.complete || img.readyState === 4) {
					processImage(img, index);
				} else {
					const handler = () => processImage(img, index);
					img.addEventListener('load', handler, { once: true });
					img.addEventListener('error', handler, { once: true });
					// Fallback timeout
					setTimeout(() => processImage(img, index), 100);
				}
			});
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

	// Compatibility with SimpleSpoiler extension
	document.addEventListener('click', (e) => {
		if (e.target.matches('.spoiler-header')) {
			const spoiler = e.target.closest('.spoiler');
			if (!spoiler.hasAttribute('open')) {
				lightboxResizer(spoiler.querySelector('.spoiler-body'));
			}
		}
		// Compatibility with ABBC3 spoil BBCode
		if (e.target.matches('.spoilbtn')) {
			const spoilwrapper = e.target.closest('.spoilwrapper');
			if (spoilwrapper) {
				const spoilcontent = spoilwrapper.querySelector('.spoilcontent');
				if (spoilcontent && getComputedStyle(spoilcontent).display === 'none') {
					lightboxResizer(spoilcontent);
				}
			}
		}
	});

	// Compatibility with mChat extension
	if (typeof mChat === 'object' && typeof $ !== 'undefined') {
		$(mChat).on('mchat_add_message_before', (e, data) => {
			setTimeout(() => lightboxResizer(data.message), 0);
		});
		$(mChat).on('mchat_edit_message_before', (e, data) => {
			setTimeout(() => lightboxResizer(data.newMessage), 0);
		});
	}

})();
