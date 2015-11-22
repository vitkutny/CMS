module.exports = function (grunt) {
	grunt.initConfig({
		bower: grunt.file.readJSON('./.bowerrc'),
		ytnuk: {
			parameters: {
				front: {
					directory: 'app/Front',
					public: {
						directory: '<%=ytnuk.parameters.front.directory%>/public',
						temp: {
							directory: '<%=ytnuk.parameters.front.public.directory%>/temp'
						}
					}
				},
				admin: {
					directory: 'app/Admin',
					public: {
						directory: '<%=ytnuk.parameters.admin.directory%>/public',
						temp: {
							directory: '<%=ytnuk.parameters.admin.public.directory%>/temp'
						}
					}
				}
			},
			scripts: [
				'<%=bower.directory%>/tether/dist/js/tether.js',
				'<%=bower.directory%>/jquery/jquery.js',
				'<%=bower.directory%>/bootstrap/dist/js/bootstrap.js',
				'<%=bower.directory%>/nette-forms/src/assets/netteForms.js',
				'<%=bower.directory%>/nette.ajax.js/nette.ajax.js',
				'<%=bower.directory%>/history.nette.ajax.js/client-side/history.ajax.js',
				'app/scripts/nette.ajax.modal.js',
				'app/scripts/nette.ajax.loader.js',
				'<%=bower.directory%>/nette.ajax.scroll.js/nette.ajax.scroll.js',
				'<%=bower.directory%>/nette.ajax.loader.js/nette.ajax.loader.js',
				'app/scripts/index.js',
				'<%=ytnuk.parameters.front.directory%>/scripts/index.js',
				'<%=ytnuk.parameters.admin.directory%>/scripts/index.js'
			]
		},
		shell: {
			install: {
				command: [
					'chmod 777 <%=ytnuk.parameters.front.public.temp.directory%>',
					'chmod 777 <%=ytnuk.parameters.admin.public.temp.directory%>',
					'bower install --colors',
					'composer install --prefer-source --ansi'
				].join(' && ')
			},
			update: {
				command: [
					'bower update --colors',
					'composer update --prefer-source --ansi',
				].join(' && ')
			},
			cleanup: {
				command: [
					'git clean -xdf app/temp',
					'git clean -xdf app/Admin/public/temp',
					'git clean -xdf app/Front/public/temp ',
				].join(' && ')
			},
			dump: {
				command: [
					'pg_dump vagrant > server/database/schema.sql --no-owner --no-privileges --schema-only --clean --if-exists',
					'pg_dump vagrant > server/database/data.sql --no-owner --no-privileges --data-only --inserts'
				].join(' && ')
			}
		},
		uglify: {
			default: {
				files: {
					'<%=ytnuk.parameters.front.public.directory%>/temp/scripts.js': '<%=ytnuk.scripts%>',
					'<%=ytnuk.parameters.admin.public.directory%>/temp/scripts.js': '<%=ytnuk.scripts%>'
				}
			}
		},
		sass: {
			default: {
				options: {
					style: 'compressed'
				},
				files: {
					'<%=ytnuk.parameters.front.public.directory%>/temp/styles.css': '<%=ytnuk.parameters.front.directory%>/styles/index.scss',
					'<%=ytnuk.parameters.admin.public.directory%>/temp/styles.css': '<%=ytnuk.parameters.admin.directory%>/styles/index.scss'
				}
			},
		},
		watch: {
			sass: {
				files: [
					'<%=ytnuk.parameters.front.directory%>/styles/{,*/}*.scss',
					'<%=ytnuk.parameters.admin.directory%>/styles/{,*/}*.scss',
					'app/styles/{,*/}*.scss'
				],
				tasks: ['sass']
			}
		}
	});

	grunt.loadNpmTasks('grunt-shell');
	grunt.loadNpmTasks('grunt-contrib-uglify');
	grunt.loadNpmTasks('grunt-contrib-sass');
	grunt.loadNpmTasks('grunt-contrib-watch');

	grunt.registerTask('default', [
		'shell:cleanup',
		'uglify',
		'sass',
	]);

	grunt.registerTask('install', [
		'shell:install',
		'default'
	]);

	grunt.registerTask('update', [
		'shell:update',
		'default'
	]);

};
