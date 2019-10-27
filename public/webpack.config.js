const path = require('path');
const webpack = require('webpack');
const VueLoaderPlugin = require('vue-loader/lib/plugin')

/*
 * SplitChunksPlugin is enabled by default and replaced
 * deprecated CommonsChunkPlugin. It automatically identifies modules which
 * should be splitted of chunk by heuristics using module duplication count and
 * module category (i. e. node_modules). And splits the chunks…
 *
 * It is safe to remove "splitChunks" from the generated configuration
 * and was added as an educational example.
 *
 * https://webpack.js.org/plugins/split-chunks-plugin/
 *
 */

/*const HtmlWebpackPlugin = require('html-webpack-plugin');
*/

/*
 * We've enabled HtmlWebpackPlugin for you! This generates a html
 * page for you when you compile webpack, which will make you start
 * developing and prototyping faster.
 *
 * https://github.com/jantimon/html-webpack-plugin
 *
 */

module.exports = {
	mode: 'development', //'production',
	entry: {
		'userAdmin': './js/src/vue/userAdmin/appUserAdmin.js',
		'surveys': './js/src/vue/surveys/appSurveys.js'
	},

	output: {
		filename: 'bundle_[name].js',
		path: path.resolve(__dirname, 'js/dist')
	},

	plugins: [new webpack.ProgressPlugin()], /* new HtmlWebpackPlugin()], */

	module: {
		rules: [
			{
				test: /\.vue$/,
				loader: 'vue-loader'
			}
		]
	},

	optimization: {
		splitChunks: {
			cacheGroups: {
				vendors: {
					priority: -10,
					test: /[\\/]node_modules[\\/]/
				}
			},

			chunks: 'async',
			minChunks: 1,
			minSize: 30000,
			name: true
		}
	},

	devServer: {
		open: true
	},

	plugins: [
	    // make sure to include the plugin for the magic
	    new VueLoaderPlugin()
	]
};
