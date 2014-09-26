module.exports = function (grunt) {
    grunt.initConfig({
        bower: grunt.file.readJSON('./.bowerrc'),
        webedit: {
            parameters: {
                publicTempDir: 'public/temp'
            }
        },
        "bower-install-simple": {
            options: {
                directory: '<%=bower.directory%>'
            },
            production: {
                options: {
                    production: true
                }
            },
            development: {
                options: {
                    production: false
                }
            }
        },
        copy: {
            default: {
                files: [
                    {
                        expand: true,
                        cwd: '<%=bower.directory%>/bootstrap/',
                        src: ['fonts/*'],
                        dest: '<%=webedit.parameters.publicTempDir%>/application/'
                    }
                ]
            }
        },
        uglify: {
            default: {
                files: {
                    '<%=webedit.parameters.publicTempDir%>/application/scripts/index.js': [
                        '<%=bower.directory%>/bootstrap/dist/js/bootstrap.js'
                    ]
                }
            }
        },
        cssmin: {
            default: {
                files: {
                    '<%=webedit.parameters.publicTempDir%>/application/styles/index.css': [
                        '<%=bower.directory%>/bootstrap/dist/css/bootstrap.css',
                        '<%=bower.directory%>/bootswatch/sandstone/bootstrap.css'
                    ]
                }
            }
        }
    });

    grunt.loadNpmTasks('grunt-composer');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');
    grunt.loadNpmTasks('grunt-bower-install-simple');

    grunt.registerTask('default', [
        'composer:install',
        'bower-install-simple',
        'copy',
        'uglify',
        'cssmin'
    ]);

};