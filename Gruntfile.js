module.exports = function (grunt) {

  // 1. All configuration goes here
  grunt.initConfig({
    pkg: grunt.file.readJSON('package.json'),
    watch: {
      css: {
        files: 'assets/scss/**/*.scss',
        tasks: ['sass', 'autoprefixer', 'concat'],
        options: {
          livereload: true
        }
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
    cssmin: {
      build: {
        files: {
          'style.css': ['style.css']
        }
      }
    },
    autoprefixer: {
      build: {
        expand: true,
        cwd: 'assets/css',
        src: ['**/*.css'],
        dest: 'assets/css'
      }
    },
    concat: {
      options: {
        separator: ''
      },
      dist: {
        src: ['assets/css/style.css', 'style.css'],
        dest: 'style.css'
      }
    },
    svgstore: {
      options: {
        svg: {
          style: "display:none",
          viewBox: '0 0 100 100'
        },
        prefix: 'icon-', // This will prefix each ID
        cleanup: ['fill'],
        cleanupdefs: true

      },
      default: {
        files: {
          'assets/images/defs.svg': ['assets/images/svg/*.svg']
        }
        //your_target: {

      }
    },//svgstore
      uglify: {
          my_target: {
              options:{
                  sourceMap: true
              },
              files: {
                  'assets/js/dist/main.js': [
                      'assets/vendor/remodal/dist/jquery.remodal.js',
                      'assets/js/pushy.js',
                     //'assets/vendor/fitvids/jquery.fitvids.js',
                      'assets/vendor/sticky/jquery.sticky.js',
                      //'assets/js/plugins.js',
                      'assets/js/bds.js']
              }
          }
      }
  });

  // 3. Where we tell Grunt we plan to use this plug-in.
  grunt.loadNpmTasks('grunt-contrib-watch');
  grunt.loadNpmTasks('grunt-contrib-concat');
  grunt.loadNpmTasks('grunt-contrib-uglify');
  grunt.loadNpmTasks('grunt-contrib-cssmin');
  grunt.loadNpmTasks('grunt-sass');
  grunt.loadNpmTasks('grunt-autoprefixer');
  grunt.loadNpmTasks('grunt-svgstore');


  // 4. Where we tell Grunt what to do when we type "grunt" into the terminal.
  grunt.registerTask('default', ['sass', 'autoprefixer', 'concat']);

};