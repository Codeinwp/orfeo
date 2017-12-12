/* jshint node:true */
// https://github.com/gruntjs/grunt-contrib-sass
module.exports = {
	style: {
		options: {
			noCache: true,
			style: 'expanded',
		},
		files: [ {
			'style.css': 'assets/sass/style.scss'

		} ]
	}
};
