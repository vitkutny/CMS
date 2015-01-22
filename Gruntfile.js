module.exports = function (grunt) {
	grunt.initConfig({
		bower: grunt.file.readJSON('./.bowerrc'),
		ytnuk: {
			parameters: {
				front: {
					directory: 'app/front',
					temp: {
						directory: '<%=ytnuk.parameters.front.directory%>/temp'
					},
					public: {
						directory: '<%=ytnuk.parameters.front.directory%>/public',
						temp: {
							directory: '<%=ytnuk.parameters.front.public.directory%>/temp'
						}
					}
				},
				admin: {
					directory: 'app/admin',
					temp: {
						directory: '<%=ytnuk.parameters.admin.directory%>/temp'
					},
					public: {
						directory: '<%=ytnuk.parameters.admin.directory%>/public',
						temp: {
							directory: '<%=ytnuk.parameters.admin.public.directory%>/temp'
						}
					}
				}
			},
			scripts: [ //TODO: iterate over all packages from bower.directory and include main files
				'<%=bower.directory%>/jquery/dist/jquery.js',
				'<%=bower.directory%>/bootstrap/dist/js/bootstrap.js',
				'<%=bower.directory%>/nette-forms/src/assets/netteForms.js',
				'<%=bower.directory%>/nette.ajax.js/nette.ajax.js',
				'<%=bower.directory%>/nette.ajax.snippets.multiple.js/nette.ajax.snippets.multiple.js',
				'<%=bower.directory%>/nette.ajax.notification.js/nette.ajax.notification.js',
				'<%=bower.directory%>/history.nette.ajax.js/client-side/history.ajax.js',
				'app/nette.ajax.modal.js',
				'app/nette.ajax.loader.js',
				'<%=bower.directory%>/nette.ajax.scroll.js/nette.ajax.scroll.js',
				'app/app.js'
			],
			styles: [
				'<%=bower.directory%>/bootstrap/dist/css/bootstrap.css'
			]
		},
		shell: {
			default: {
				command: [
					'chmod 777 <%=ytnuk.parameters.front.temp.directory%>',
					'chmod 777 <%=ytnuk.parameters.admin.temp.directory%>',
					'chmod 777 <%=ytnuk.parameters.front.public.temp.directory%>',
					'chmod 777 <%=ytnuk.parameters.admin.public.temp.directory%>',
					'bower install',
					'composer install'
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
						dest: '<%=ytnuk.parameters.admin.public.directory%>'
					},
					{
						expand: true,
						cwd: '<%=bower.directory%>/bootstrap/',
						src: ['fonts/*'],
						dest: '<%=ytnuk.parameters.front.public.directory%>'
					}
				]
			}
		},
		uglify: {
			default: {
				files: {
					'<%=ytnuk.parameters.front.public.directory%>/scripts/index.js': '<%=ytnuk.scripts%>',
					'<%=ytnuk.parameters.admin.public.directory%>/scripts/index.js': '<%=ytnuk.scripts%>'
				}
			}
		},
		cssmin: {
			default: {
				files: {
					'<%=ytnuk.parameters.front.public.directory%>/styles/index.css': '<%=ytnuk.styles%>',
					'<%=ytnuk.parameters.admin.public.directory%>/styles/index.css': '<%=ytnuk.styles%>'
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
