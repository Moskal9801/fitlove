const gulp = require( 'gulp' );
const { pipeline } = require( 'stream' );
const sass = require( 'gulp-sass' )( require( 'sass' ) );
const sourcemaps = require( 'gulp-sourcemaps' );
const csso = require( 'gulp-csso' );
const autoprefixer = require( 'gulp-autoprefixer' );
const uglify = require( 'gulp-uglify' );
const concat = require( 'gulp-concat' );
const tinypng = require( 'gulp-tinypng-compress' );


function sass_compile ( cb ) {
    return pipeline(
        gulp.src('./assets/scss/**/style.scss'),
        sourcemaps.init(),
        sass().on( 'error', sass.logError ),
        autoprefixer() ,
        csso( {
            restructure: true,
            sourceMap: true,
            debug: true,
            comments: 'exclamation',
        } ) ,
        sourcemaps.write( './' ) ,
        gulp.dest( './' ),
        (err) => {
            if (err) {
                console.error('Таск sass_compile выдал ошибку.', err.toString());
            } else {
                console.log('Таск sass_compile завершён');
            }
        });
}

function minify_js ( cb ) {
    return pipeline(
        gulp.src( './assets/js/*' ),
        sourcemaps.init(),
        uglify().on('error', function ( err ) {
            console.log('Таск minify_js выдал ошибку: \n ' + err)
        }),
        concat( 'main.js' ),
        sourcemaps.write( './' ),
        gulp.dest( './' ),
        (err) => {}
    );
}


gulp.task( 'watch', function () {
    gulp.watch( './assets/scss/**/*.scss', gulp.series( sass_compile ) );
    gulp.watch( './assets/js/*', gulp.series( minify_js ) );
} );

gulp.task( 'tiny-png', function ( cb ) {
    gulp.src( 'assets/images/**/*.{png,jpg,jpeg}' )
        .pipe( tinypng( {
            key: 'bFJ9p10D7jNMT8NSlKPJqGxngxZfFWb9',
            sigFile: 'assets/images/.tinypng-sigs',
            log: true,
            sameDest: true,
            summarize: true,
        } ) )
        .pipe( gulp.dest( 'assets/images' ) );
    cb();
} );