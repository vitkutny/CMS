module.exports = function (grunt) {
	grunt.config.init({
		bower: grunt.file.readJSON('./.bowerrc'),
		shell: {
			run: {
				command: 'echo "<?php return require_once __DIR__ . \'/../run.php\';" > app/public/index.php'
			},
			maintenance: {
				command: 'echo "<?php return require_once __DIR__ . \'/../maintenance.php\';" > app/public/index.php'
			},
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
					'git clean -xdf app/temp'
				].join(' && ')
			},
			dump: {
				command: [
					'pg_dump --no-owner --no-privileges --schema-only --exclude-table "migrations*" --dbname=vagrant --file=app/migrations/structures/0000-00-00-000000-dump.sql',
					'pg_dump --no-owner --no-privileges --data-only --inserts --exclude-table "migrations*" --dbname=vagrant --file=app/migrations/dummy-data/0000-00-00-000000-dump.sql'
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
		},
		copy: {
			FontAwesome: {
				src: '<%=bower.directory%>/font-awesome/fonts/*',
				dest: 'app/public/styles/fonts/',
				flatten: true,
				expand: true
			}
		}
	});
	grunt.file.exists('./local.json') && grunt.config.merge(grunt.file.readJSON('./local.json'));

	grunt.task.loadNpmTasks('grunt-shell');
	grunt.task.loadNpmTasks('grunt-contrib-copy');
	grunt.task.loadNpmTasks('grunt-contrib-uglify');
	grunt.task.loadNpmTasks('grunt-contrib-sass');
	grunt.task.loadNpmTasks('grunt-contrib-watch');

	grunt.task.registerTask('default', [
		'uglify',
		'sass',
		'copy'
	]);

	grunt.task.registerTask('install', [
		'shell:maintenance',
		'shell:cleanup',
		'shell:install',
		'default',
		'shell:run'
	]);

	grunt.task.registerTask('update', [
		'shell:maintenance',
		'shell:cleanup',
		'shell:update',
		'default',
		'shell:run'
	]);

};
