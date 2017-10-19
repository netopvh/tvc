var gulp = require('gulp');
var concat = require('gulp-concat');
var cleanCss = require('gulp-clean-css');
var uglify = require('gulp-uglify');
var less = require('gulp-less');
var rev = require('gulp-rev');
var rename = require('gulp-rename');

/**
 * BACKEND
 */
gulp.task('bootstrap-less', function () {
    return gulp.src([
        'resources/assets/backend/less/_main_full/bootstrap.less'
    ])
        .pipe(less())
        .pipe(concat('bootstrap.min.css'))
        //.pipe(cleanCss())
        .pipe(gulp.dest('public/backend/css'))
});

gulp.task('core-less', function () {
    return gulp.src([
        'resources/assets/backend/less/_main_full/core.less'
    ])
        .pipe(less())
        .pipe(concat('core.min.css'))
        //.pipe(cleanCss())
        .pipe(gulp.dest('public/backend/css'))
});

gulp.task('components-less', function () {
    return gulp.src([
        'resources/assets/backend/less/_main_full/components.less'
    ])
        .pipe(less())
        .pipe(concat('components.min.css'))
        //.pipe(cleanCss())
        .pipe(gulp.dest('public/backend/css'))
});

gulp.task('colors-less', function () {
    return gulp.src([
        'resources/assets/backend/less/_main_full/colors.less'
    ])
        .pipe(less())
        .pipe(concat('colors.min.css'))
        //.pipe(cleanCss())
        .pipe(gulp.dest('public/backend/css'))
});

gulp.task('core', function () {
    return gulp.src(['resources/assets/backend/js/plugins/loaders/pace.min.js',
        'resources/assets/backend/js/core/libraries/jquery.min.js',
        'resources/assets/backend/js/core/libraries/bootstrap.min.js',
        'resources/assets/backend/js/plugins/loaders/blockui.min.js'])
        .pipe(concat('js/core.js'))
        //.pipe(uglify())
        //.pipe(rev())
        .pipe(gulp.dest('public/backend'));
});

gulp.task('fonts', function () {
    return gulp.src([
        'resources/assets/backend/css/icons/fontawesome/fonts/*',
        'resources/assets/backend/css/icons/glyphicons/*',
        'resources/assets/backend/css/icons/icomoon/fonts/*',
        'resources/assets/backend/css/icons/summernote/*'
    ])
        .pipe(gulp.dest('./public/backend/fonts'));
});

gulp.task('images', function () {
    return gulp.src([
        'resources/assets/backend/images/**/**'
    ])
        .pipe(gulp.dest('./public/backend/images'));
});

gulp.task('icon-css', function () {
    return gulp.src([
        'resources/assets/backend/css/icons/icomoon/styles.css'
    ])
        .pipe(rename("icoomon.css"))
        .pipe(cleanCss())
        .pipe(gulp.dest('./public/backend/css'));
});

gulp.task('less', ['bootstrap-less', 'core-less', 'components-less', 'colors-less', 'icon-css']);

gulp.task('default',['less','core','fonts','images','icon-css']);

/**
 * Frontend
 */