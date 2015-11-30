module.exports = function (grunt) {
	grunt.initConfig({
		bower: grunt.file.readJSON('./.bowerrc'),
		ytnuk: {
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
				'app/scripts/index.js'
			]
		},
		shell: {
			install: {
				command: [
					'chmod 777 app/temp',
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
					'git clean -xdf app/public'
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
					'app/public/scripts/index.js': '<%=ytnuk.scripts%>'
				}
			}
		},
		sass: {
			default: {
				options: {
					style: 'compressed'
				},
				files: {
					'app/public/styles/index.css': 'app/styles/index.scss'
				}
			},
		},
		watch: {
			sass: {
				files: [
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
