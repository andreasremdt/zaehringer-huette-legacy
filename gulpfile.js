var gulp = require('gulp');
var sass = require('gulp-sass');
var autoprefixer = require('gulp-autoprefixer');

gulp.task('css', function() {
  return gulp.src('assets/scss/styles.scss')
    .pipe(sass({ outputStyle: 'compressed' }).on('error', sass.logError))
    .pipe(autoprefixer({ browsers: ['last 2 versions'] }))
    .pipe(gulp.dest('assets/css/'));
});

gulp.task('watch', function() {
  gulp.watch('assets/scss/**/*.scss', ['css']);
});