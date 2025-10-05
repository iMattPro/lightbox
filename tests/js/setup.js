// Mock global objects
global.vseLightbox = {
	resizeWidth: 800,
	resizeHeight: 600,
	lightboxAll: true,
	lightboxSig: true,
	lightboxGal: 0,
	imageTitles: true,
	downloadFile: 'download/file.php'
};

global.mChat = {};

// Mock jQuery with chainable methods
const mockJQuery = jest.fn(() => ({
	on: jest.fn().mockReturnThis()
}));
mockJQuery.fn = {};
global.$ = mockJQuery;

// Mock window.matchMedia
Object.defineProperty(window, 'matchMedia', {
	writable: true,
	value: jest.fn().mockImplementation(query => ({
		matches: false,
		media: query,
		onchange: null,
		addListener: jest.fn(),
		removeListener: jest.fn(),
		addEventListener: jest.fn(),
		removeEventListener: jest.fn(),
		dispatchEvent: jest.fn(),
	})),
});

// Mock navigator properties
Object.defineProperty(navigator, 'maxTouchPoints', {
	writable: true,
	configurable: true,
	value: 0
});