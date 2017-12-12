/* jshint node:true */
// https://github.com/kswedberg/grunt-version
module.exports = {
	package_ti: {
		options: {
			prefix: '"version"\\:\\s+"'
		},
		src: 'package.json'
	},
	style_ti: {
		options: {
			prefix: 'Version\\:\\s+'
		},
		src: 'style.css'
	},
	scss_ti: {
		options: {
			prefix: 'Version\\:\\s+'
		},
		src: 'assets/sass/style.scss'
	},
	scss_lite: {
		options: {
			prefix: 'Version\\:\\s+'
		},
		src: 'assets/sass/lite-style.scss'
	},
	companion_ti: {
		options: {
			prefix: 'Version\\:\\s+'
		},
		src: 'inc/companion/hestia-companion.php'
	},
	functions: {
		options: {
			prefix: 'HESTIA_VERSION\', \''
		},
		src: 'functions.php'
	},
};
