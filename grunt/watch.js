/* jshint node:true */
// https://github.com/gruntjs/grunt-contrib-watch
module.exports = {
	sass: {
		files: [
			'assets/sass/**/*.scss'
		],
		tasks: ['sass:style']
	}
};
