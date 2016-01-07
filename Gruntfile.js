module.exports = function (grunt) {

    // 1. All configuration goes here
    grunt.initConfig({
        pkg: grunt.file.readJSON('package.json'),
        watch: {
            css: {
                files: 'assets/scss/**/*.scss',
                tasks: ['sass', 'postcss']
            },
            svg: {
                files: 'assets/images/svg/*.svg',
                tasks: ['svgstore']
            },
            js: {
                files: 'assets/js/*.js',
                tasks: ['uglify']
            }
        },
        sass: {
            options: {
                sourceMap: true,
                outputStyle: 'compressed'
            },
            dist: {
                files: {
                    'style.css': 'assets/scss/main.scss'
                }
            }
        },
        uglify: {
            my_target: {
                files: {
                    'assets/dist/js/main.js': [
                        'assets/vendor/jquery/dist/jquery.min.js',
                        'assets/vendor/jquery-form/jquery.form.js',
                        'assets/js/wp-plugins/contact-form-7/scripts-cf7.js',
                        'assets/js/navigation.js',
                        'assets/js/ac-inuk.js'
                    ]
                }
            }
        },
        svgstore: {
            options: {
                svg: {
                    style: "display:none"
                },
                prefix: 'icon-', // This will prefix each ID
                svg: {// will be added as attributes to the resulting SVG
                    viewBox: '0 0 100 100'
                }
            },
            default: {
                files: {
                    'assets/images/defs.svg': ['assets/images/svg/*.svg']
                }
                //your_target: {

            }
        },//svgstore
        postcss: {
            options: {
                map: {
                    inline: false, // save all sourcemaps as separate files...
                    annotation: 'dist/css/maps/' // ...to the specified directory
                },

                processors: [
                    require('pixrem')(), // add fallbacks for rem units
                    require('autoprefixer')({browsers: 'last 2 versions'}), // add vendor prefixes
                    require('cssnano')() // minify the result
                ]
            },
            dist: {
                src: 'style.css'
            }
        },//postcss
        browserSync: {
            dev: {
                bsFiles: {
                    src : [
                        'style.css',
                        '*.php'
                    ]
                },
                options: {
                    proxy: 'cardiffmusic.local',
                    watchTask: true
                }
            }
        }
    });

    // 3. Where we tell Grunt we plan to use this plug-in.
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-sass');
    grunt.loadNpmTasks('grunt-svgstore');
    grunt.loadNpmTasks('grunt-browser-sync');
    grunt.loadNpmTasks('grunt-postcss');


    // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
    grunt.registerTask('default', ['browserSync', 'watch']);
    grunt.registerTask('build', ['sass', 'postcss', 'svgstore', 'uglify']);

};