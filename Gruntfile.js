module.exports = function (grunt) {
	grunt.initConfig({
		bower: grunt.file.readJSON('./.bowerrc'),
		ytnuk: {
			parameters: {
				frontTempDir: 'app/front/public/temp',
				adminTempDir: 'app/admin/public/temp'
			}
		},
		shell: {
			default: {
				command: [
					'chmod 777 temp',
					'chmod 777 <%=ytnuk.parameters.frontTempDir%>',
					'chmod 777 <%=ytnuk.parameters.adminTempDir%>',
					'bower install',
					'bower update'
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
						dest: '<%=ytnuk.parameters.frontTempDir%>/application/'
					},
					{
						expand: true,
						cwd: '<%=bower.directory%>/bootstrap/',
						src: ['fonts/*'],
						dest: '<%=ytnuk.parameters.adminTempDir%>/application/'
					}
				]
			}
		},
		uglify: {
			default: {
				files: {
					'<%=ytnuk.parameters.frontTempDir%>/application/scripts/index.js': [
						'<%=bower.directory%>/jquery/dist/jquery.js',
						'<%=bower.directory%>/bootstrap/dist/js/bootstrap.js',
						'<%=bower.directory%>/nette-forms/src/assets/netteForms.js',
						'<%=bower.directory%>/nette.ajax.js/nette.ajax.js',
						'<%=bower.directory%>/history.nette.ajax.js/client-side/history.ajax.js',
						'app/main.js'
					],
					'<%=ytnuk.parameters.adminTempDir%>/application/scripts/index.js': [
						'<%=bower.directory%>/jquery/dist/jquery.js',
						'<%=bower.directory%>/bootstrap/dist/js/bootstrap.js',
						'<%=bower.directory%>/nette-forms/src/assets/netteForms.js',
						'<%=bower.directory%>/nette.ajax.js/nette.ajax.js',
						'<%=bower.directory%>/history.nette.ajax.js/client-side/history.ajax.js',
						'app/main.js'
					]
				}
			}
		},
		cssmin: {
			default: {
				files: {
					'<%=ytnuk.parameters.frontTempDir%>/application/styles/index.css': [
						'<%=bower.directory%>/bootstrap/dist/css/bootstrap.css',
						'<%=bower.directory%>/bootswatch/sandstone/bootstrap.css'
					],
					'<%=ytnuk.parameters.adminTempDir%>/application/styles/index.css': [
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
