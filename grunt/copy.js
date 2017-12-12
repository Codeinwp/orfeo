/* jshint node:true */
// https://github.com/gruntjs/grunt-contrib-copy
module.exports = {
	companion: {
		files: [{
			cwd: './inc/companion',
			src: 'hestia-functions.php',
			dest: '../../plugins/hestia-companion/',
			expand: true
		}, {
			cwd: './inc/companion',
			src: 'customizer.php',
			dest: '../../plugins/hestia-companion/inc/',
			expand: true
		}, {
			cwd: './inc/sections',
			src: ['hestia-team-section.php', 'hestia-features-section.php', 'hestia-testimonials-section.php', 'hestia-ribbon-section.php', 'hestia-clients-bar-section.php'],
			dest: '../../plugins/hestia-companion/inc/sections',
			expand: true
		}
		]
	},
	potFile: {
		files: [
			{
				expand: true,
				cwd: './languages',
				src: 'hestia-pro.pot',
				dest: '../<%= package.litename %>/languages/',
				rename: function (dest ) {
					return dest + 'hestia.pot';
				}
		}
		]
	}
};
