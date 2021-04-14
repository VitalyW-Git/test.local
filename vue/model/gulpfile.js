var webpack = require('webpack-stream'),
    gulp = require('gulp'),
    gulprimraf = require('gulp-rimraf');

/** Исходники */
var assetsDir = 'src/';

/** Скомпилированные файлы */
var productionDir = '../../components/widget/vue/';

/** Путь до папки с кешам */
var cacheRuntimeDir = '../../web/';

/**
 * Берёт исходники и запускает конфигурационный
 *  файл webpack, собирает в assets для продакшина
 */
gulp.task('webpack', function(){
    return gulp.src(assetsDir + 'assets/app.js')
        .pipe(webpack( require('./webpack.config.js') ))
        .pipe(gulp.dest(productionDir + 'assets/'));
});

/** При запуске данного task очищается кеш */
gulp.task('clean-runtime-cache',function () {
    return gulp.src(cacheRuntimeDir + 'assets/**/*', {read: false})
        .pipe(gulprimraf({force: true}));
});

/** WATCH отслеживаем изменения в указанных дерикториях и запускем task */
gulp.task('watch', function (done) {
    gulp.watch(assetsDir + 'assets/**/*', gulp.series('webpack'));

    // gulp.watch(assetsDir + '**/*.js', ['vue'], gulp.series('clean-runtime-cache'));
    gulp.watch(assetsDir + '**/*.js', gulp.series('clean-runtime-cache'));
    gulp.watch(assetsDir + '**/*.vue', gulp.series('clean-runtime-cache'));
    done();
});