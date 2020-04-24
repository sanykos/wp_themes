const gulp = require('gulp');
const sass = require('gulp-sass');
const sourcemaps = require('gulp-sourcemaps');
const watch = require('gulp-watch');
const concat = require('gulp-concat');
const browserSync = require('browser-sync');
const uglify = require('gulp-uglify');

gulp.task('sass', function() {
    return gulp.src('public/scss/**/*.scss')
    .pipe(sass({outputStyle:'expanded'}))
    .pipe(gulp.dest('public/css/'))
    .pipe(browserSync.reload({stream: true}))
});

gulp.task('scripts', function() {
    return gulp.src('public/js/**/*.js')
    .pipe(concat('common.min.js'))
    .pipe(uglify())
    .pipe(gulp.dest('public/js/'))
    .pipe(browserSync.reload({stream: true}))
});



gulp.task('server', function() {
    browserSync.init({
        server: 'public'
    });
});

gulp.task('watch', function() {
    gulp.watch('public/scss/**/*.scss', gulp.parallel('sass'));
    gulp.watch('public/js/**/*.js', gulp.parallel('scripts'));
    gulp.watch('public/index.html', browserSync.reload);
});

gulp.task('default', gulp.parallel('server', 'watch'));


