const gulp = require('gulp')
const webpack = require('webpack')
const webpackConfig = require('./webpack.config.js')

function rebuildJsBundle(cb) {
    return new Promise((resolve, reject) => {
        webpack(webpackConfig, (err, stats) => {
            if (err) {
                return reject(err)
            }
            if (stats.hasErrors()) {
                return reject(new Error(stats.compilation.errors.join('\n')))
            }
            resolve()
        })
    })
}


exports.default = function() {
	gulp.watch(
        [
        'js/src/vue/userAdmin/*.js', 
        'js/src/vue/userAdmin/components/*.vue',
        'js/src/vue/surveys/*.js', 
        'js/src/vue/surveys/components/*.vue'

        ], 
        { ignoreInitial: false }, 
        gulp.series(rebuildJsBundle)
    );
    // gulp.watch('js/src/vue/components/*.vue', { ignoreInitial: false }, gulp.series(rebuildJsBundle));
};
