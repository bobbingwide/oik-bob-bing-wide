const defaultConfig = require( '@wordpress/scripts/config/webpack.config' );
module.exports = {
	...defaultConfig,
	entry: {
		'github': './src/github',
		'csv': './src/oik-csv',
		'dashicon': './src/oik-dashicon',
		'search': './src/oik-search',
		'wp': './src/oik-wp'
	},
};
