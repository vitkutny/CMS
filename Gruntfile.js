module.exports = function (grunt) {
	grunt.config.init({
		bower: grunt.file.readJSON('./.bowerrc'),
		shell: {
			application: {
				command: function (mode) {
					var file = './app/' + mode + '.php';
					if (grunt.file.exists(file)) {
						return 'echo "<?php return require_once __DIR__ . \'/../' + mode + '.php\';" > app/public/index.php';
					} else {
						grunt.fail.warn('File "' + file + '" does not exists');
						return '';
					}
				}
			},
			install: {
				command: [
					'chmod 777 app/temp',
					'bower install --colors',
					'composer install --prefer-source --ansi'
				].join('&&')
			},
			update: {
				command: [
					'bower update --colors',
					'composer update --prefer-source --ansi',
				].join('&&')
			},
			cleanup: {
				command: [
					'git clean -xdf app/temp'
				].join('&&')
			},
			dump: {
				command: [
					'pg_dump --no-owner --no-privileges --schema-only --exclude-table "migrations*" --dbname=vagrant --file=app/migrations/structures/0000-00-00-000000-dump.sql',
					'pg_dump --no-owner --no-privileges --data-only --inserts --exclude-table "migrations*" --dbname=vagrant --file=app/migrations/dummy-data/0000-00-00-000000-dump.sql'
				].join('&&')
			},
			public: {
				command: [
					'for from in $(find app/temp/public -type f); do ' + [
						'to=$(echo $from | sed -r "s/^app\\/temp\\/public\\//app\\/public\\//g")',
						'if ! diff -q $from $to 2> /dev/null',
						'then mkdir -p $(dirname $to) && mv $from $to',
						'fi',
						'done'
					].join(';'),
					'rm -rf app/temp/public'
				].join('&&')
			}
		},
		uglify: {
			default: {
				files: {
					'app/temp/public/scripts/index.js': [
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
					'app/temp/public/styles/index.css': 'app/styles/index.scss'
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
				dest: 'app/temp/public/styles/fonts/',
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
		'copy',
		'shell:public',
	]);

	grunt.task.registerTask('install', [
		'shell:application:maintenance',
		'shell:cleanup',
		'shell:install',
		'default',
		'shell:application:run'
	]);

	grunt.task.registerTask('update', [
		'shell:application:maintenance',
		'shell:cleanup',
		'shell:update',
		'default',
		'shell:application:run'
	]);

};
