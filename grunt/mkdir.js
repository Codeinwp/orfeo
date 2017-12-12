/* jshint node:true */
// https://github.com/rubenv/grunt-mkdir
module.exports = {
	lite: {
		options: {
			create: [ '../<%= package.litename %>' ]
		}
	},
	companion: {
		options: {
			create: [ '../../plugins/hestia-companion', '../../plugins/hestia-companion/features' ]
		}
	},
	childTheme: {
		options: {
			create: [ '../tiny-hestia' ]
		}
	}
};
