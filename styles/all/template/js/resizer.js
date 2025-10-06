/*global vseLightbox, mChat*/
(() => {
	'use strict';

	const CONFIG = {
		BORDER_COLOR: '#4ae',
		MOBILE_REGEX: /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i
	};

	const addBorderHover = (img) => {
		Object.assign(img.style, {
			border: 'solid 3px transparent',
			borderRadius: '6px',
			transition: 'border-color 0.1s ease-out',
			cursor: 'pointer'
		});
		img.addEventListener('mouseenter', () => img.style.borderColor = CONFIG.BORDER_COLOR);
		img.addEventListener('mouseleave', () => img.style.borderColor = 'transparent');
	};

	const isMobile = () => {
		const isMobileDevice = CONFIG.MOBILE_REGEX.test(navigator.userAgent) ||
			('maxTouchPoints' in navigator && navigator.maxTouchPoints > 2 && window.screen.width <= 1024);
		const isPWA = isMobileDevice &&
			(window.matchMedia('(display-mode: standalone)').matches ||
			window.navigator.standalone ||
			document.referrer.includes('android-app://'));
		return !isPWA && isMobileDevice;
	};

	const isOversized = (imgData) =>
		(vseLightbox.resizeWidth > 0 && imgData.width >= vseLightbox.resizeWidth) ||
		(vseLightbox.resizeHeight > 0 && imgData.height >= vseLightbox.resizeHeight);

	const getImageDimensions = (img) => {
		const rect = img.getBoundingClientRect();
		return {
			width: Math.max(rect.width || parseInt(img.getAttribute('width')) || img.naturalWidth || 0, img.naturalWidth || 0),
			height: Math.max(rect.height || parseInt(img.getAttribute('height')) || img.naturalHeight || 0, img.naturalHeight || 0)
		};
	};

	const getGalleryId = (img, index) => {
		if (vseLightbox.lightboxGal === 0) {
			return index;
		}
		if (vseLightbox.lightboxGal === 2) {
			const post = img.closest('.post');
			return post ? post.id : '';
		}
		return '';
	};

	const isImageVisible = (img) => {
		if (img.closest('.spoiler:not([open]), .abbc3-spoiler:not([open])')) {
			return false;
		}
		const spoilcontent = img.closest('.spoilcontent');
		return !(spoilcontent && spoilcontent.style.display === 'none');
	};

	const createLightboxLink = (img, galleryId) => {
		const link = document.createElement('a');
		link.href = img.src;
		link.setAttribute('data-lightbox', galleryId);

		if (vseLightbox.imageTitles) {
			const title = img.src.includes(vseLightbox.downloadFile) ? (img.alt || '') : (img.src.split('/').pop() || '');
			link.setAttribute('data-title', title);
		}

		img.parentNode.insertBefore(link, img);
		link.appendChild(img);
	};

	const setupAttachedImage = (img, galleryId) => {
		const parentLink = img.parentElement;
		parentLink.setAttribute('data-lightbox', galleryId);
		if (vseLightbox.imageTitles) {
			parentLink.setAttribute('data-title', img.alt || '');
		}
	};

	const processImage = (img, index) => {
		if (img.closest('.postlink')) {
			return;
		}

		const imgData = getImageDimensions(img);
		if (!vseLightbox.lightboxAll && !isOversized(imgData)) {
			return;
		}

		const galleryIndex = getGalleryId(img, index);
		const galleryId = 'post-gallery' + galleryIndex;
		const parentLink = img.parentElement;

		if (parentLink.tagName === 'A') {
			setupAttachedImage(img, galleryId);
		} else {
			const finalGalleryId = (vseLightbox.lightboxSig && img.closest('.signature')) ? index : galleryId;
			createLightboxLink(img, finalGalleryId);
		}
		addBorderHover(img);
	};

	const lightboxResizer = (container) => {
		if (typeof vseLightbox === 'undefined' || isMobile() ||
			(vseLightbox.resizeWidth <= 0 && vseLightbox.resizeHeight <= 0 && !vseLightbox.lightboxAll)) {
			return;
		}

		const selector = vseLightbox.lightboxSig ? '.postimage' : '.postimage:not(.signature .postimage)';
		const images = Array.from(container.querySelectorAll(selector)).filter(isImageVisible);

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

	const handleSpoilerClick = (e) => {
		const handlers = [
			{
				match: () => e.target.matches('.spoiler-header') && !e.target.closest('.spoiler').hasAttribute('open'),
				getContainer: () => e.target.closest('.spoiler').querySelector('.spoiler-body')
			},
			{
				match: () => e.target.matches('.spoilbtn'),
				getContainer: () => {
					const spoilwrapper = e.target.closest('.spoilwrapper');
					return spoilwrapper ? spoilwrapper.querySelector('.spoilcontent') : null;
				}
			},
			{
				match: () => e.target.matches('summary') && !e.target.closest('.abbc3-spoiler').hasAttribute('open'),
				getContainer: () => e.target.closest('.abbc3-spoiler')
			}
		];

		for (const handler of handlers) {
			if (handler.match()) {
				const container = handler.getContainer();
				if (container) {
					setTimeout(() => lightboxResizer(container), 0);
				}
				break;
			}
		}
	};

	const initExtensionCompatibility = () => {
		if (typeof $ === 'undefined') {
			return;
		}

		// QuickReply Reloaded extension
		$('#qr_posts').on('qr_loaded', (e, elements) => lightboxResizer(elements));
		$('#qr_postform').on('ajax_submit_preview', () => {
			lightboxResizer(document.getElementById('preview'));
		});

		// mChat extension
		if (typeof mChat === 'object') {
			$(mChat).on('mchat_add_message_before', (e, data) => {
				setTimeout(() => lightboxResizer(data.message[0] || data.message), 0);
			});
			$(mChat).on('mchat_edit_message_before', (e, data) => {
				setTimeout(() => lightboxResizer(data.newMessage[0] || data.newMessage), 0);
			});
		}
	};

	document.addEventListener('DOMContentLoaded', () => {
		lightboxResizer(document);
		initExtensionCompatibility();
	});

	document.addEventListener('click', handleSpoilerClick);

})();
