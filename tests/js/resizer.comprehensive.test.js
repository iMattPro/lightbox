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
		Object.assign(global.vseLightbox, {
			resizeWidth: 800,
			resizeHeight: 600,
			lightboxAll: true,
			lightboxSig: true,
			lightboxGal: 0,
			imageTitles: true,
			downloadFile: 'download/file.php'
		});
		const resizerPath = path.join(__dirname, '../../styles/all/template/js/resizer.js');
		const resizerCode = fs.readFileSync(resizerPath, 'utf8');
		const modifiedCode = resizerCode
			.replace('const lightboxResizer = (container) =>', 'global.lightboxResizer = (container) =>')
			.replace('const processImage = (img) =>', 'global.processImage = (img) =>')
			.replace('const isImageVisible = (img) =>', 'global.isImageVisible = (img) =>')
			.replace('const getImageDimensions = (img) =>', 'global.getImageDimensions = (img) =>')
			.replace('const getGalleryId = (img) =>', 'global.getGalleryId = (img) =>');
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

	test('should assign unique standalone gallery IDs across processing passes', () => {
		const secondContainer = document.createElement('div');
		const secondImg = document.createElement('img');
		secondImg.className = 'postimage';
		secondImg.src = 'second.jpg';
		Object.defineProperty(secondImg, 'complete', { value: true });
		secondImg.getBoundingClientRect = jest.fn(() => ({ width: 1000, height: 800 }));
		secondContainer.appendChild(secondImg);
		document.body.appendChild(secondContainer);

		lightboxResizer(mockContainer);
		lightboxResizer(secondContainer);

		expect(mockImg.parentElement.getAttribute('data-lightbox'))
			.not.toBe(secondImg.parentElement.getAttribute('data-lightbox'));
	});

	test('should add image titles when enabled', () => {
		mockImg.alt = 'Test Image';
		mockImg.src = 'download/file.php?id=123';
		global.vseLightbox.imageTitles = true;

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.getAttribute('data-title')).toBe('Test Image');
	});

	test('should encode attachment titles before passing them to Lightbox3', () => {
		const maliciousTitle = '<img src=x onerror=alert(1)>.png';
		mockImg.alt = maliciousTitle;
		mockImg.src = 'download/file.php?id=123';
		global.vseLightbox.imageTitles = true;

		lightboxResizer(mockContainer);

		const title = mockImg.parentElement.getAttribute('data-title');
		const caption = document.createElement('span');
		caption.innerHTML = title;

		expect(title).toBe('&lt;img src=x onerror=alert(1)&gt;.png');
		expect(caption.textContent).toBe(maliciousTitle);
		expect(caption.firstElementChild).toBeNull();
	});

	test('should normalize phpBB-encoded entities before encoding titles', () => {
		mockImg.alt = 'A&amp;B &lt;example&gt; &quot;caption&quot;';
		mockImg.src = 'download/file.php?id=123';

		lightboxResizer(mockContainer);

		const title = mockImg.parentElement.getAttribute('data-title');
		const caption = document.createElement('span');
		caption.innerHTML = title;

		expect(title).toBe('A&amp;B &lt;example&gt; &quot;caption&quot;');
		expect(caption.textContent).toBe('A&B <example> "caption"');
		expect(caption.firstElementChild).toBeNull();
	});

	test('should encode titles on images already wrapped in links', () => {
		const maliciousTitle = '<img src=x onerror=alert(1)>.png';
		const link = document.createElement('a');
		mockImg.alt = maliciousTitle;
		mockContainer.removeChild(mockImg);
		link.appendChild(mockImg);
		mockContainer.appendChild(link);
		global.vseLightbox.imageTitles = true;

		lightboxResizer(mockContainer);

		const title = link.getAttribute('data-title');
		const caption = document.createElement('span');
		caption.innerHTML = title;

		expect(title).toBe('&lt;img src=x onerror=alert(1)&gt;.png');
		expect(caption.textContent).toBe(maliciousTitle);
		expect(caption.firstElementChild).toBeNull();
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

	test('should ignore deferred events after an image is removed', () => {
		Object.defineProperty(mockImg, 'complete', { value: false, writable: true });

		lightboxResizer(mockContainer);
		mockContainer.removeChild(mockImg);
		mockImg.dispatchEvent(new Event('load'));
		mockContainer.appendChild(mockImg);
		mockImg.dispatchEvent(new Event('error'));

		expect(mockImg.parentElement).toBe(mockContainer);
	});

	test('should initialize Lightbox3 when all image processing is deferred', () => {
		jest.useFakeTimers();
		Object.defineProperty(mockImg, 'complete', { value: false, writable: true });
		global.Lightbox3 = {
			Lightbox: {
				init: jest.fn()
			}
		};

		document.dispatchEvent(new Event('DOMContentLoaded'));
		expect(global.Lightbox3.Lightbox.init).not.toHaveBeenCalled();

		jest.runOnlyPendingTimers();
		expect(global.Lightbox3.Lightbox.init).toHaveBeenCalled();

		delete global.Lightbox3;
		jest.useRealTimers();
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
