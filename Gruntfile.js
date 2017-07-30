module.exports = function(grunt) {

    //Initializing the configuration object
    grunt.initConfig({

        // Task configuration
        concat: {
            js: {
                options: {
                    separator: ';'
                },
                src: [
                    './bower_components/jquery/dist/jquery.js',
                    './bower_components/moment/min/moment.min.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './bower_components/eonasdan-bootstrap-datetimepicker/build/js/bootstrap-datetimepicker.min.js',
                    './resources/assets/js/app.js'
                ],
                dest: './public/js/full.js'
            }
        },
        less: {
            development: {
                files: {
                    //compiling frontend.less into frontend.css
                    "./public/css/app.css":"./resources/assets/less/app.less",
                    "./public/css/bootstrap.css":"./bower_components/bootstrap/less/bootstrap.less"
                }
            }
        },
        watch: {
            all: {
                files: [
                    //watched files
                    './bower_components/jquery/dist/jquery.js',
                    './bower_components/bootstrap/dist/js/bootstrap.js',
                    './resources/assets/js/app.js',
                    './resources/assets/less/app.less',
                    './resources/assets/less/_variables.less'
                ],
                tasks: ['concat','less'],     //tasks to run
                options: {
                    livereload: true                        //reloads the browser
                }
            }
        }
    });

    // Plugin loading

    grunt.loadNpmTasks('grunt-contrib-concat');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.loadNpmTasks('grunt-contrib-less');


    // Task definition
    grunt.registerTask('default', ['watch']);

};
