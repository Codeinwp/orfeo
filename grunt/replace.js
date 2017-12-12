/* jshint node:true */
// https://github.com/outaTiME/grunt-replace
module.exports = {

	liteRename: {
		src: [
			'../<%=package.litename%>/style.css', '../<%=package.litename%>/README.md'
		],
		overwrite: true,
		replacements: [{
			from: /Hestia Pro/g,
			to: 'Hestia'
		},{
			from: /hestia-pro/g,
			to: 'hestia'
		}]
	},

	wpmlLiteRename: {
		src: [
			'../<%=package.litename%>/wpml-config.xml'
		],
		overwrite: true,
		replacements: [{
			from: /theme_mods_hestia-pro/g,
			to: 'theme_mods_hestia'
		}]
	},

	setupWpRename: {
		src: [
			'../<%=package.litename%>/functions.php'
		],
		overwrite: true,
		replacements: [{
			from: /hestia_setup\(\)/g,
			to: 'hestia_setup_theme()'
		}, {
			from: /\'hestia_setup\'/g,
			to: '\'hestia_setup_theme\''
		}]
	},
	loadTextDomain: {
		src: [
			'../<%=package.litename%>/functions.php'
		],
		overwrite: true,
		replacements: [{
			from: /hestia-pro/g,
			to: 'hestia'
		}]
	}
};
