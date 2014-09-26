module.exports = function (grunt) {
    grunt.initConfig({
        bower: grunt.file.readJSON('./.bowerrc'),
        webedit: {
            parameters: {
                publicTempDir: 'public/temp'
            }
        },
        shell: {
            default: {
                command: [
                    'chmod 777 private/temp',
                    'chmod 777 public/temp',
                    'bower install'
                ].join('&&')
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

    grunt.loadNpmTasks('grunt-shell');
    grunt.loadNpmTasks('grunt-contrib-copy');
    grunt.loadNpmTasks('grunt-contrib-uglify');
    grunt.loadNpmTasks('grunt-contrib-cssmin');

    grunt.registerTask('default', [
        'shell',
        'copy',
        'uglify',
        'cssmin'
    ]);

};