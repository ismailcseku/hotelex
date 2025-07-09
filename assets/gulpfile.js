var gulp = require("gulp");
const sass = require("gulp-sass")(require("sass"));
var rtlcss = require("gulp-rtlcss");
var rename = require("gulp-rename");
const errorHandler = require("gulp-error-handle");
//var sourcemaps = require('gulp-sourcemaps');
var concat = require("gulp-concat");
var gutil = require("gulp-util");
var lec = require("gulp-line-ending-corrector");

//main task
gulp.task("default", function () {
  gulp.watch("scss/**/*.scss", gulp.series("sass-hotelex", "rtl-hotelex", "hotelex-shop", "rtl-hotelex-shop", "hotelex-kodelisting", "rtl-hotelex-kodelisting", "sass-custom-admin-hotelex"));
});

//Task 1 - scss to css
gulp.task("sass-hotelex", function () {
  return gulp
    .src(["scss/**/*.scss", "!scss/**/custom-theme-color.scss", "!scss/custom-admin.scss"])
    .pipe(errorHandler())
    .pipe(sass()) // Using gulp-sass
    .pipe(lec()) // gulp-line-ending-corrector
    .pipe(gulp.dest("css"));
});

//Task 2 - css to rtl-css
gulp.task("rtl-hotelex", function () {
  return gulp
    .src("../assets/css/style-main.css")
    .pipe(rtlcss())
    .pipe(rename("style-main-rtl.css"))
    .pipe(lec()) // gulp-line-ending-corrector
    .pipe(gulp.dest("css/"));
});

gulp.task("sass-custom-admin-hotelex", function () {
  return gulp
    .src(["scss/custom-admin.scss"])
    .pipe(errorHandler())
    .pipe(sass()) // Using gulp-sass
    .pipe(lec()) // gulp-line-ending-corrector
    .pipe(gulp.dest("../admin/assets/css"));
});

//Task 4 - hotelex-shop
gulp.task("hotelex-shop", function () {
  return gulp.src("../assets/css/shop/**/*.scss").pipe(rtlcss()).pipe(lec()).pipe(gulp.dest("css/shop/"));
});

//Task 5 - css to rtl-css
gulp.task("rtl-hotelex-shop", function () {
  return gulp
    .src(["css/shop/**/*.css", "!css/shop/**/*.rtl.css"])
    .pipe(rtlcss())
    .pipe(rename({ suffix: ".rtl" }))
    .pipe(lec())
    .pipe(gulp.dest("css/shop/"));
});

//Task 4 - hotelex-shop
gulp.task("hotelex-kodelisting", function () {
  return gulp.src("../assets/css/listing-folder/**/*.scss").pipe(rtlcss()).pipe(lec()).pipe(gulp.dest("css/listing-folder/"));
});

//Task 5 - css to rtl-css
gulp.task("rtl-hotelex-kodelisting", function () {
  return gulp
    .src(["css/listing-folder/**/*.css", "!css/listing-folder/**/*.rtl.css"])
    .pipe(rtlcss())
    .pipe(rename({ suffix: ".rtl" }))
    .pipe(lec())
    .pipe(gulp.dest("css/listing-folder/"));
});
