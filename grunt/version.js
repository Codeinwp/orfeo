/* jshint node:true */
// https://github.com/kswedberg/grunt-version
module.exports = {
	package: {
		options: {
			prefix: '"version"\\:\\s+"'
		},
		src: 'package.json'
	},
	style: {
		options: {
			prefix: 'Version\\:\\s+'
		},
		src: 'style.css'
	},
	sscs: {
		options: {
			prefix: 'Version\\:\\s+'
		},
		src: 'assets/sass/style.scss'
	},
	functions: {
		options: {
			prefix: 'ORFEO_VERSION\', \''
		},
		src: 'functions.php'
	},
};
