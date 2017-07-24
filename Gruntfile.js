module.exports = function(grunt) {
    grunt.initConfig({
        sass: {
            dist: {
                options: {
                    style: 'compressed',
                    loadPath: 'node_modules/bootstrap-sass/assets/stylesheets',
                    sourcemap: 'none'
                },
                files: {
                    'www/css/main.css': 'sass/main.scss'
                }
            }
        },
        watch: {
            sass: {
                files: 'sass/*.scss',
                tasks: ['sass:dist']
            }
        }
    });
    grunt.loadNpmTasks('grunt-contrib-sass');
    grunt.loadNpmTasks('grunt-contrib-watch');
    grunt.registerTask('buildcss', ['sass:dist']);
};