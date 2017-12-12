/* jshint node:true */
// https://github.com/tomusdrw/grunt-sync
module.exports = {
	syncWporg: {
		files: [{
			// cwd: '*',
			src: [
				/* Include Everything */
				'**',

				/* Exclude Utilities */
				'!node_modules/**',
				'!grunt/**',
				'!logs/**',
				'!.idea/**',
				'!package.json',
				'!Gruntfile.js',
				'!.gitignore',
				'!.jshintrc',
				'!phpcs.xml',
				'!languages/hestia-pro.pot',

				'!inc/features/feature-section-ordering.php',
				'!inc/features/feature-pricing-section.php',
				'!inc/features/feature-portfolio-section.php',
				'!inc/features/feature-blog-settings.php',
				'!inc/customizer-subscribe-info/templates/subscribe-textarea-content.php',
				'!inc/features/feature-features-on-product.php',
				'!inc/features/feature-advanced-color-settings.php',
				'!inc/features/feature-slider-section.php',
				'!inc/features/feature-pro-manager.php',
				'!inc/features/feature-themeisle-lite-manager.php',
				'!inc/features/feature-general-credits.php',
				'!inc/features/feature-ribbon-section.php',
				'!inc/features/feature-clients-bar-section.php',
				'!inc/features/feature-contact-form.php',

				'!inc/features/feature-features-section.php',
				'!inc/features/feature-testimonials-section.php',
				'!inc/features/feature-team-section.php',

				'!inc/sections/hestia-pricing-section.php',
				'!inc/sections/hestia-portfolio-section.php',
				'!inc/sections/hestia-subscribe-blog-section.php',
				'!inc/sections/hestia-authors-blog-section.php',
				'!inc/sections/hestia-team-section.php',
				'!inc/sections/hestia-features-section.php',
				'!inc/sections/hestia-testimonials-section.php',
				'!inc/sections/hestia-ribbon-section.php',
				'!inc/sections/hestia-clients-bar-section.php',

				'!inc/plugins-compatibility/**',

				'!inc/customizer-info/class/class-hestia-customizer-info-singleton-pro.php',
				'!inc/customizer-info/js/customizer-info-controls-pro.js',

				'!inc/customizer-multiple-select/**',
				'!inc/typography/typography-pro-settings.php',
				'!inc/navigation/cart-content.php',
				'!inc/companion/**',
				'!inc/shortcodes/**',
				'!inc/plugins-compatibility/**',

				'!assets/sass/**',
				'!assets/css/pagebuilder-style.css',
				'!assets/css/pagebuilder-style.css.map',
				'!assets/js/hammer.js',
				'!assets/js/hammer.min.js',
				'!assets/js/scripts-pro.js',

				'!style.css',
				'!style.css.map',
				'!inc/wpml-pll/**',
				'!bin/**',
				'!wpml-config.xml',

				'!inc/hooks/**',
			],
			dest: '../<%= package.litename %>/'
		}],
		updateAndDelete: true,
		failOnError: true,
		verbose: true // Display log messages when copying files
	},

	syncCompanion: {
		files: [
			{
				src: [
					'inc/features/feature-features-section.php',
					'inc/features/feature-testimonials-section.php',
					'inc/features/feature-team-section.php',
					'inc/features/feature-ribbon-section.php',
					'inc/features/feature-clients-bar-section.php'
				],
				dest: '../../plugins/hestia-companion/'
		}
		],
		updateAndDelete: true,
		failOnError: true,
		verbose: true // Display log messages when copying files
	},

};
