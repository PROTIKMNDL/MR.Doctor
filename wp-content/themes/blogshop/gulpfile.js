// Initialize modules
// Importing specific gulp API functions lets us write them below as series() instead of gulp.series()
const { src, dest, watch, series, parallel } = require('gulp');
// Importing all the Gulp-related packages we want to use
const sourcemaps = require('gulp-sourcemaps');
const sass = require('gulp-sass');
const concat = require('gulp-concat');
const browserSync = require('browser-sync').create();
const reload = browserSync.reload;
const uglify = require('gulp-uglify-es').default;
const postcss = require('gulp-postcss');
const autoprefixer = require('autoprefixer');
// const cssnano = require('cssnano');


const files = {
    scssPath: 'assets/scss/**/*.scss',
    jsPath: 'assets/js/**/*.js',
    phpPath: './**/*.php'
}

// Sass task: compiles the style.scss file into style.css
function scssTask() {
    return src(files.scssPath)
        .pipe(sourcemaps.init()) // initialize sourcemaps first
        .pipe(sass({
            includePaths: ['node_modules']
        })) // compile SCSS to CSS
        .pipe(postcss([autoprefixer()])) // PostCSS plugins
        .pipe(sourcemaps.write('.')) // write sourcemaps file in current directory
        .pipe(dest('.')); // put final CSS in dist folder
}

// JS task: concatenates and uglifies JS files to script.js
function jsTask() {
    return src([
            files.jsPath

        ])
        .pipe(concat('bundle.js'))
        .pipe(uglify())
        .pipe(dest('js'));
}
// Watch task: watch SCSS and JS files for changes
// If any change, run scss and js tasks simultaneously
function watchTask() {
    browserSync.init({
        open: 'external',
        proxy: 'http://localhost/freetheme/blogshop',
    });
    watch([files.scssPath, files.jsPath, files.phpPath],
        parallel(scssTask, jsTask)).on('change', reload);

}

// Export the default Gulp task so it can be run
// Runs the scss and js tasks simultaneously
// then runs cacheBust, then watch task
exports.default = series(
    parallel(scssTask, jsTask),
    watchTask
);