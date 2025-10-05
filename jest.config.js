module.exports = {
	testEnvironment: 'jsdom',
	testMatch: ['**/tests/js/**/*.test.js'],
	collectCoverageFrom: [
		'styles/all/template/js/**/*.js'
	],
	setupFilesAfterEnv: ['<rootDir>/tests/js/setup.js']
};