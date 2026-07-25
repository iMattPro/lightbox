/*global vseLightbox, mChat, Lightbox3*/
(() => {
	'use strict';

	const standaloneGalleryIds = new WeakMap();
	let nextStandaloneGalleryId = 0;

	const decodeHtmlEntities = (value) => value.replace(/&(amp|lt|gt|quot);/g, (entity) => ({
		'&amp;': '&',
		'&lt;': '<',
		'&gt;': '>',
		'&quot;': '"'
	}[entity]));

	// Lightbox3 renders data-title using innerHTML, so title text must be escaped here.
	const escapeHtml = (value) => decodeHtmlEntities(value).replace(/[&<>"']/g, (char) => ({
		'&': '&amp;',
		'<': '&lt;',
		'>': '&gt;',
		'"': '&quot;',
		'\'': '&#39;'
	}[char]));

	const addLightboxAffordance = (img) => {
		Object.assign(img.style, {
			cursor: 'pointer'
		});
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

	const getStandaloneGalleryId = (img) => {
		if (!standaloneGalleryIds.has(img)) {
			standaloneGalleryIds.set(img, nextStandaloneGalleryId++);
		}
		return standaloneGalleryIds.get(img);
	};

	const getGalleryId = (img) => {
		if (vseLightbox.lightboxGal === 0) {
			return getStandaloneGalleryId(img);
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
			link.setAttribute('data-title', escapeHtml(title));
		}

		img.parentNode.insertBefore(link, img);
		link.appendChild(img);
	};

	const setupAttachedImage = (img, galleryId) => {
		const parentLink = img.parentElement;
		parentLink.setAttribute('data-lightbox', galleryId);
		if (vseLightbox.imageTitles) {
			parentLink.setAttribute('data-title', escapeHtml(img.alt || ''));
		}
	};

	const processImage = (img) => {
		if (!img.parentElement || img.closest('.postlink')) {
			return;
		}

		const imgData = getImageDimensions(img);
		if (!vseLightbox.lightboxAll && !isOversized(imgData)) {
			return;
		}

		const galleryIndex = getGalleryId(img);
		const galleryId = 'post-gallery' + galleryIndex;
		const parentLink = img.parentElement;

		if (parentLink.tagName === 'A') {
			setupAttachedImage(img, galleryId);
		} else {
			const finalGalleryId = (vseLightbox.lightboxSig && img.closest('.signature')) ?
				'post-gallery' + getStandaloneGalleryId(img) :
				galleryId;
			createLightboxLink(img, finalGalleryId);
		}
		addLightboxAffordance(img);
	};

	const lightboxResizer = (container) => {
		if (typeof vseLightbox === 'undefined' ||
			(vseLightbox.resizeWidth <= 0 && vseLightbox.resizeHeight <= 0 && !vseLightbox.lightboxAll) ||
			!container) {
			return;
		}

		const selector = vseLightbox.lightboxSig ? '.postimage' : '.postimage:not(.signature .postimage)';
		const images = Array.from(container.querySelectorAll(selector)).filter(isImageVisible);

		images.forEach((img) => {
			if (img.complete) {
				processImage(img);
			} else {
				const handler = () => {
					img.removeEventListener('load', handler);
					img.removeEventListener('error', handler);
					processImage(img);
				};
				img.addEventListener('load', handler);
				img.addEventListener('error', handler);
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

		// Ensure delegated handlers exist when all image processing was deferred.
		setTimeout(() => {
			if (typeof Lightbox3 !== 'undefined' && Lightbox3.Lightbox) {
				Lightbox3.Lightbox.init();
			}
		}, 0);
	});

	document.addEventListener('click', handleSpoilerClick);

})();
