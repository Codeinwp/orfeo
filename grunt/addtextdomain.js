/* jshint node:true */
// https://github.com/blazersix/grunt-wp-i18n
module.exports = {
	lite: {
		options: {
			textdomain: '<%= package.litename %>',
			updateDomains: ['<%= package.theme.textdomain %>']
		},
		files: {
			src: [
				'../<%= package.litename %>/**/*.php'
			]
		}
	},
	companion: {
		options: {
			textdomain: '<%= package.companion %>',
			updateDomains: ['<%= package.theme.textdomain %>']
		},
		files: {
			src: [
				'../../plugins/hestia-companion/**/*.php'
			]
		}
	}
};
