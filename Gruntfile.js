// jshint node:true

module.exports = function( grunt ) {
	'use strict';

	var loader = require( 'load-project-config' ),
		config = require( 'grunt-theme-fleet' );
	config     = config();

	// Map grunt-contrib-sass
	config.taskMap.sass = 'grunt-contrib-sass';

	// Map grunt-contrib-watch
	config.taskMap.watch = 'grunt-contrib-watch';

	// Map grunt-rtlcss
	config.taskMap.rtlcss = 'grunt-rtlcss';

	loader( grunt, config ).init();
};
