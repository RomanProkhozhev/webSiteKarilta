// jshint node:true

module.exports = function( grunt ) {
    'use strict';

    var loader = require( 'load-project-config' ),
        config = require( 'grunt-theme-fleet' );
    config = config();
    config.files.js.push( 'assets/js/*.js','!assets/js/*.min.js', '!assets/js/vendor/**/*.js', '!assets/bootstrap/js/**/*.js', '!grunt/**/*.js', '!inc/customizer/customizer-repeater/**/*.js', '!inc/customizer/customizer-alpha-color-picker/js/alpha-color-picker.js', '!js/navigation.js',
     '!js/navigation.min.js', '!assets/js/custom.js' );
    config.files.css.push( 'assets/css/*.css', '!assets/css/vendor/**/*.css', '!assets/bootstrap/css/**/*.css' );
    config.files.php.push( '!class-tgm-plugin-activation.php', '!inc/customizer/customizer-repeater/class/customizer-repeater-control.php', '!inc/customizer/customizer-repeater/functions.php', '!inc/customizer/customizer-range-value-control/class-customizer-range-value-control.php', '!inc/customizer/customizer-repeater/inc/customizer.php' );

    //Add Copy Task for ShopIsle screenshot
    config.taskMap.copy = 'grunt-contrib-copy';
    //Add Version Task for ShopIsle versioning
    config.taskMap.version = 'grunt-version';
    //Map CSS Minify Task
    config.taskMap.cssmin = 'grunt-contrib-cssmin';
    //Map Watch Task
    config.taskMap.watch = 'grunt-contrib-watch';
    //Map Uglify Task
    config.taskMap.uglify = 'grunt-contrib-uglify';


    loader( grunt, config ).init();
};
