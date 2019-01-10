"use strict";

var g = require('gulp'),
    sass = require('gulp-sass'),
    cleaner = require('gulp-clean'),
    imagemin = require('gulp-imagemin'),
    jsmin = require('gulp-uglify'),
    concat = require('gulp-concat'),
    htmlReplace = require('gulp-html-replace'),
    usemin = require('gulp-usemin'),
    browserSync = require('browser-sync'),
    sassLint = require('gulp-sass-lint'),
    jsHint = require('gulp-jshint'),
    jsHintStylish = require('jshint-stylish'),
    autoPrefixer = require('gulp-autoprefixer');

    g.task('watch', function() {

      browserSync.init({
        proxy: "localhost/Server/WeMake/versatil/src"
       })

       g.watch('./src/view/scss/build/**/*.scss', ['sass']);
       g.watch('./src/view/js/**/*.js', ['jsHint']);

     g.watch('./src/view/**/*').on('change', browserSync.reload);

    })

  g.task('clean-dist', function(){
    return g.src('./dist')
    .pipe(cleaner());
  });

  g.task('sass', ['sassLint'],function(){

      return g.src('./src/view/scss/build/index.scss')
      .pipe(sass().on('error', sass.logError))
      .pipe(g.dest('./src/view'));
  })

  g.task('reload', function() {
    return browserSync.reload();
  });

  g.task('sassLint', function(){
    return g.src('/src/view/scss/build/**/*.scss')
      .pipe(sassLint({
        options: {
             formatter: 'stylish',
             'merge-default-rules': true
         },
         rules: {
           'indentation': 0,
           'property-sort-order':1,
           'space-before-brace':0,
           'no-color-literals':1,
           'no-color-keywords':1,
           'space-after-colon':1,
           'no-empty-rulesets':0,
           'single-line-per-selector':0,
           'no-important':0,
           'no-url-protocols':0,
           'no-url-domains':0,
           'force-element-nesting':0,
           'no-qualifying-elements':0,
           'no-ids':0
         }
         }))
      .pipe(sassLint.format())
      .pipe(sassLint.failOnError());
  })

  g.task('jsHint', function(){
    return g.src('./src/view/js/build/**/*.js')
    .pipe(jsHint())
    .pipe(jsHint.reporter(jsHintStylish));
  })


  g.task('dist', ['clean-dist'],function(){

      g.src('./src/view/scss/build/index.scss')
     .pipe(sass({outputStyle: 'compressed'}).on('error', sass.logError))
     .pipe(autoPrefixer({browsers:['last 5 versions'],cascade: true}))
     .pipe(g.dest('./dist/view'));

     g.src(['./src/view/img/**/*.png','./src/view/img/**/*.jpg','./src/view/img/**/*.jpeg'])
     .pipe(imagemin())
     .pipe(g.dest('./dist/view/img'));
     
    g.src(['./src/view/font/**/*.otf','./src/view/font/**/*.woff','./src/view/font/**/*.ttf'])
    .pipe(g.dest('./dist/view/font'));

    g.src(['./src/**/*.php','./src/**/*.html'])
    .pipe(usemin({'js':[jsmin]}))
    .pipe(g.dest('./dist'));

  })

