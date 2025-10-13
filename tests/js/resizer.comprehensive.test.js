/**
 * @jest-environment jsdom
 */

/* jshint ignore:start */
const fs = require('fs');
const path = require('path');

describe('Lightbox Resizer - Comprehensive Tests', () => {
	let mockImg, mockContainer, lightboxResizer;

	beforeEach(() => {
		document.body.innerHTML = '';
		const resizerPath = path.join(__dirname, '../../styles/all/template/js/resizer.js');
		const resizerCode = fs.readFileSync(resizerPath, 'utf8');
		const modifiedCode = resizerCode
			.replace('const lightboxResizer = (container) =>', 'global.lightboxResizer = (container) =>')
			.replace('const processImage = (img, index) =>', 'global.processImage = (img, index) =>')
			.replace('const isImageVisible = (img) =>', 'global.isImageVisible = (img) =>')
			.replace('const getImageDimensions = (img) =>', 'global.getImageDimensions = (img) =>')
			.replace('const getGalleryId = (img, index) =>', 'global.getGalleryId = (img, index) =>');
		eval(modifiedCode);
		lightboxResizer = global.lightboxResizer;

		mockContainer = document.createElement('div');
		mockImg = document.createElement('img');
		mockImg.className = 'postimage';
		mockImg.src = 'test.jpg';
		mockImg.naturalWidth = 1000;
		mockImg.naturalHeight = 800;
		Object.defineProperty(mockImg, 'complete', { value: true, writable: true });
		mockImg.getBoundingClientRect = jest.fn(() => ({ width: 1000, height: 800 }));
		mockContainer.appendChild(mockImg);
		document.body.appendChild(mockContainer);
	});

	test('should handle images already wrapped in links', () => {
		const link = document.createElement('a');
		link.href = 'original.jpg';
		mockContainer.removeChild(mockImg);
		link.appendChild(mockImg);
		mockContainer.appendChild(link);

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.tagName).toBe('A');
		expect(mockImg.parentElement.getAttribute('data-lightbox')).toBe('post-gallery0');
	});

	test('should respect lightboxSig setting for signature images', () => {
		global.vseLightbox.lightboxSig = false;
		const signature = document.createElement('div');
		signature.className = 'signature';
		mockContainer.removeChild(mockImg);
		signature.appendChild(mockImg);
		mockContainer.appendChild(signature);

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.tagName).toBe('DIV');
	});

	test('should handle different gallery modes', () => {
		global.vseLightbox.lightboxGal = 2;
		const post = document.createElement('div');
		post.className = 'post';
		post.id = 'p123';
		mockContainer.removeChild(mockImg);
		post.appendChild(mockImg);
		mockContainer.appendChild(post);

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.getAttribute('data-lightbox')).toBe('post-galleryp123');
	});

	test('should add image titles when enabled', () => {
		mockImg.alt = 'Test Image';
		mockImg.src = 'download/file.php?id=123';
		global.vseLightbox.imageTitles = true;

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.getAttribute('data-title')).toBe('Test Image');
	});

	test('should handle images in ABBC3 spoilers', () => {
		const spoiler = document.createElement('div');
		spoiler.className = 'abbc3-spoiler';
		mockContainer.removeChild(mockImg);
		spoiler.appendChild(mockImg);
		mockContainer.appendChild(spoiler);

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.tagName).toBe('DIV');
	});

	test('should handle images in hidden spoilcontent', () => {
		const spoilcontent = document.createElement('div');
		spoilcontent.className = 'spoilcontent';
		spoilcontent.style.display = 'none';
		mockContainer.removeChild(mockImg);
		spoilcontent.appendChild(mockImg);
		mockContainer.appendChild(spoilcontent);

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.tagName).toBe('DIV');
	});

	test('should skip images in postlinks', () => {
		const postlink = document.createElement('div');
		postlink.className = 'postlink';
		mockContainer.removeChild(mockImg);
		postlink.appendChild(mockImg);
		mockContainer.appendChild(postlink);

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.tagName).toBe('DIV');
	});

	test('should handle incomplete images with load events', (done) => {
		Object.defineProperty(mockImg, 'complete', { value: false, writable: true });

		lightboxResizer(mockContainer);

		// Simulate image load
		setTimeout(() => {
			mockImg.dispatchEvent(new Event('load'));
			setTimeout(() => {
				expect(mockImg.parentElement.tagName).toBe('A');
				done();
			}, 10);
		}, 10);
	});

	test('should handle PWA detection', () => {
		window.matchMedia = jest.fn().mockImplementation(query => ({
			matches: query === '(display-mode: standalone)',
			media: query
		}));

		lightboxResizer(mockContainer);

		// Should process in PWA mode (not mobile)
		expect(mockImg.parentElement.tagName).toBe('A');
	});

	test('should handle missing vseLightbox gracefully', () => {
		const originalVseLightbox = global.vseLightbox;
		delete global.vseLightbox;

		expect(() => lightboxResizer(mockContainer)).not.toThrow();

		global.vseLightbox = originalVseLightbox;
	});
});
