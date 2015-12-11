module.exports = function (grunt) {
	grunt.initConfig({
		bower: grunt.file.readJSON('./.bowerrc'),
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
					'pg_dump --no-owner --no-privileges --schema-only --exclude-table "migrations|migrations_id_seq" --dbname=vagrant --file=app/migrations/structures/0000-00-00-000000-dump.sql',
					'pg_dump --no-owner --no-privileges --data-only --inserts --exclude-table "migrations|migrations_id_seq" --dbname=vagrant --file=app/migrations/dummy-data/0000-00-00-000000-dump.sql'
				].join(' && ')
			}
		},
		uglify: {
			default: {
				files: {
					'app/public/scripts/index.js': [
						'<%=bower.directory%>/tether/dist/js/tether.js',
						'<%=bower.directory%>/jquery/jquery.js',
						'<%=bower.directory%>/bootstrap/dist/js/bootstrap.js',
						'<%=bower.directory%>/nette-forms/src/assets/netteForms.js',
						'<%=bower.directory%>/nette.ajax.js/nette.ajax.js',
						'<%=bower.directory%>/history.nette.ajax.js/client-side/history.ajax.js',
						'<%=bower.directory%>/nette.ajax.scroll.js/nette.ajax.scroll.js',
						'<%=bower.directory%>/nette.ajax.loader.js/nette.ajax.loader.js',
						'app/scripts/nette.ajax.modal.js',
						'app/scripts/index.js'
					]
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
