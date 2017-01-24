var gulp = require("gulp"),
util = require("gulp-util"),
sass = require("gulp-sass"),
autoprefixer = require('gulp-autoprefixer'),
cleancss = require('gulp-clean-css'),
rename = require('gulp-rename'),
log = util.log;


gulp.task('sass', function(){
	log("Generating CSS files " + (new Date()).toString());
  return gulp.src('scss/**/*.scss')
    .pipe(sass({ style: 'expanded' }))
		.pipe(autoprefixer("last 3 version","safari 8", "ie 10"))
    .pipe(gulp.dest("css"))
		.pipe(rename({suffix: '.min'}))
		.pipe(cleancss())
		.pipe(gulp.dest('css'));
});

gulp.task('watch', function(){
  gulp.watch('scss/**/*.scss', ['sass']); 
  // Other watchers
});




/*
gulp.task("sass", function(){
	log("Generating CSS files " + (new Date()).toString());
  gulp.src(sassFiles)
		.pipe(sass({ style: 'expanded' }))
		.pipe(autoprefixer("last 3 version","safari 8", "ie 10"))
		.pipe(gulp.dest("css"))
		.pipe(rename({suffix: '.min'}))
		.pipe(cleancss())
		.pipe(gulp.dest('css'));
});



gulp.task('default', function() {
  // place code for your default task here
});

*/