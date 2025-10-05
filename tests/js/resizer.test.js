/**
 * @jest-environment jsdom
 */

const fs = require('fs');
const path = require('path');

describe('Lightbox Resizer', () => {
	let mockImg, mockContainer, lightboxResizer;

	beforeEach(() => {
		// Reset DOM
		document.body.innerHTML = '';
		// Load and execute the resizer script in isolated scope
		const resizerPath = path.join(__dirname, '../../styles/all/template/js/resizer.js');
		const resizerCode = fs.readFileSync(resizerPath, 'utf8');
		// Extract functions for testing
		const modifiedCode = resizerCode
			.replace('const lightboxResizer = (container) =>', 'global.lightboxResizer = (container) =>')
			.replace('const processImage = (img, index) =>', 'global.processImage = (img, index) =>')
			.replace('const isImageVisible = (img) =>', 'global.isImageVisible = (img) =>')
			.replace('const getImageDimensions = (img) =>', 'global.getImageDimensions = (img) =>')
			.replace('const getGalleryId = (img, index) =>', 'global.getGalleryId = (img, index) =>');
		eval(modifiedCode);
		lightboxResizer = global.lightboxResizer;

		// Create mock elements
		mockContainer = document.createElement('div');
		mockImg = document.createElement('img');
		mockImg.className = 'postimage';
		mockImg.src = 'test.jpg';
		mockImg.naturalWidth = 1000;
		mockImg.naturalHeight = 800;
		// Mock complete property
		Object.defineProperty(mockImg, 'complete', {
			value: true,
			writable: true
		});
		// Mock getBoundingClientRect
		mockImg.getBoundingClientRect = jest.fn(() => ({
			width: 1000,
			height: 800
		}));

		mockContainer.appendChild(mockImg);
		document.body.appendChild(mockContainer);
	});

	test('should add lightbox attributes to images when lightboxAll is enabled', () => {
		// Call lightboxResizer directly
		lightboxResizer(mockContainer);

		// Check if lightbox attributes were added
		const link = mockImg.parentElement;
		expect(link.tagName).toBe('A');
		expect(link.getAttribute('data-lightbox')).toBe('post-gallery0');
	});

	test('should process oversized images when lightboxAll is false', () => {
		// Temporarily disable lightboxAll
		global.vseLightbox.lightboxAll = false;
		// Create oversized image
		mockImg.getBoundingClientRect = jest.fn(() => ({
			width: 1000,
			height: 800
		}));
		mockImg.naturalWidth = 1000;
		mockImg.naturalHeight = 800;

		lightboxResizer(mockContainer);

		const link = mockImg.parentElement;
		expect(link.tagName).toBe('A');
		// Reset
		global.vseLightbox.lightboxAll = true;
	});

	test('should not process images in closed spoilers', () => {
		const spoiler = document.createElement('div');
		spoiler.className = 'spoiler';
		mockContainer.removeChild(mockImg);
		spoiler.appendChild(mockImg);
		mockContainer.appendChild(spoiler);

		lightboxResizer(mockContainer);

		expect(mockImg.parentElement.tagName).toBe('DIV');
	});

	test('should add hover effects to processed images', () => {
		lightboxResizer(mockContainer);

		expect(mockImg.style.border).toBe('3px solid transparent');
		expect(mockImg.style.cursor).toBe('pointer');
	});

	test('should handle mobile detection', () => {
		// Mock mobile user agent
		Object.defineProperty(navigator, 'userAgent', {
			value: 'Mozilla/5.0 (iPhone; CPU iPhone OS 14_0 like Mac OS X)',
			configurable: true
		});
		// Set maxTouchPoints directly since it's already defined
		navigator.maxTouchPoints = 5;

		lightboxResizer(mockContainer);

		// Should not process on mobile
		expect(mockImg.parentElement.tagName).toBe('DIV');
	});
});
