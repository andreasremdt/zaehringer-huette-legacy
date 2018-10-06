var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var uglify = require('gulp-uglify');

gulp.task('css', function() {
  return gulp.src('assets/scss/styles.scss')
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
    .pipe(gulp.dest('assets/css/'));
});

gulp.task('js', function() {
  return gulp.src('assets/js/main.js')
    .pipe(uglify())
      .on('error', function (err) { console.log(err.toString()); })
    .pipe(rename({ suffix: '.min' }))
    .pipe(gulp.dest('assets/js/'));
});

gulp.task('watch', function() {
  gulp.watch('assets/scss/**/*.scss', ['css']);
  gulp.watch('assets/js/main.js', ['js']);
});