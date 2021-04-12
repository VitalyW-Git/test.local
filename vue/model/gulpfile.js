var webpack = require('webpack-stream'),
    gulp = require('gulp');
    // gulprimraf = require('gulp-rimraf');

var assetsDir = 'src/';
var productionDir = '../../components/widget/vue/';

// var cacheRuntimeDir = '../../runtime/cache/';

gulp.task('webpack', function(){
    return gulp.src(assetsDir + 'assets/app.js')
        .pipe(webpack( require('./webpack.config.js') ))
        .pipe(gulp.dest(productionDir + 'assets/'));
});

// //CLEAN CACHE
// gulp.task('clean-runtime-cache',function () {
//     return gulp.src(cacheRuntimeDir + '*', {read: false})
//         .pipe(gulprimraf({force: true}));
// });

//WATCH
gulp.task('watch', function (done) {
    gulp.watch(assetsDir + 'assets/**/*', gulp.series('webpack'));
    done();
});