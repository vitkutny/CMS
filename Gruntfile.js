module.exports = function (grunt) {
	var os = require('os');
	var path = require('path');
	grunt.config.init({
		bower: grunt.file.readJSON('./.bowerrc'),
		composer: grunt.file.readJSON('./composer.json'),
		temp: {
			directory: [os.tmpdir(), '<%=composer.name%>'].join(path.sep)
		},
		uglify: {
			default: {
				files: {
					'<%=temp.directory%>/public/assets/scripts/index.js': [
						'<%=bower.directory%>/tether/dist/js/tether.js',
						'<%=bower.directory%>/jquery/jquery.js',
						'<%=bower.directory%>/bootstrap/dist/js/bootstrap.js',
						'<%=bower.directory%>/nette-forms/src/assets/netteForms.js',
						'<%=bower.directory%>/nette.ajax.js/nette.ajax.js',
						'<%=bower.directory%>/history.nette.ajax.js/client-side/history.ajax.js',
						'<%=bower.directory%>/nette.ajax.scroll.js/nette.ajax.scroll.js',
						'<%=bower.directory%>/nette.ajax.loader.js/nette.ajax.loader.js',
						'application/assets/scripts/nette.ajax.modal.js',
						'application/assets/scripts/index.js'
					]
				}
			}
		},
		sass: {
			default: {
				files: {
					'<%=temp.directory%>/public/assets/styles/index.css': 'application/assets/styles/index.scss'
				}
			}
		},
		copy: {
			FontAwesome: {
				src: '<%=bower.directory%>/font-awesome/fonts/*',
				dest: '<%=temp.directory%>/public/assets/fonts/',
				flatten: true,
				expand: true
			}
		},
		watch: {
			scripts: {
				files: [
					'application/assets/scripts/*.js'
				],
				tasks: ['uglify', 'shell:public']
			},
			styles: {
				files: [
					'application/assets/styles/*.scss'
				],
				tasks: ['sass', 'shell:public']
			}
		},
		shell: {
			application: {
				command: function (mode) {
					var file = './application/' + mode + '.php';
					if (grunt.file.exists(file)) {
						return 'echo "<?php return require __DIR__ . \'/../' + mode + '.php\';" > application/public/index.php';
					} else {
						grunt.fail.warn('File "' + file + '" does not exists');
						return '';
					}
				}
			},
			public: {
				command: [
					'directory=$(pwd)',
					'cd <%=temp.directory%>',
					'files=' + [
						'$(if [ -d public ]',
						'then find public -type f',
						'fi)'
					].join(';'),
					'cd $directory',
					'for file in $files; do ' + [
						'from=<%=temp.directory%>/$file',
						'to=application/$file',
						'if ! diff -q $from $to 2> /dev/null',
						'then mkdir -p $(dirname $to) && cp $from $to',
						'fi',
						'done'
					].join(';'),
					[
						'if [ -d <%=temp.directory%>/public ]',
						'then rm -rf <%=temp.directory%>/public',
						'fi'
					].join(';')
				].join('&&')
			},
			install: {
				command: [
					[
						'if ! [ -d <%=temp.directory%> ]',
						'then mkdir -p <%=temp.directory%>',
						'fi'
					].join(';'),
					'chmod 777 <%=temp.directory%>',
					'bower install --colors',
					'composer install --prefer-source --ansi'
				].join('&&')
			},
			update: {
				command: [
					'bower update --colors',
					'composer update --prefer-source --ansi'
				].join('&&')
			},
			cleanup: {
				command: [
					'rm -rf <%=temp.directory%>/*'
				].join('&&')
			},
			dump: {
				command: [
					'pg_dump --no-owner --no-privileges --schema-only --exclude-table "migrations*" --dbname=vagrant --file=application/migrations/structures/0000-00-00-000000-dump.sql',
					'pg_dump --no-owner --no-privileges --data-only --inserts --exclude-table "migrations*" --dbname=vagrant --file=application/migrations/dummy-data/0000-00-00-000000-dump.sql'
				].join('&&')
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
		'shell:public'
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
