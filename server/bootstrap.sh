#!/usr/bin/env bash

export LC_ALL=en_US.utf8
add-apt-repository -y ppa:ondrej/php-7.0

apt-get update
apt-get upgrade -y --force-yes

apt-get install -y --force-yes nginx php7.0-fpm php-pgsql php-sqlite3 postgresql nodejs-legacy npm

if ! [ -L "/var/www" ]; then
	rm -rf "/var/www"
	ln -fs "/vagrant" "/var/www"
fi

if ! [ -L "/etc/nginx/sites-enabled" ]; then
	rm -rf "/etc/nginx/sites-enabled"
	ln -fs "/vagrant/server/nginx/sites-available" "/etc/nginx/sites-enabled"
fi

if ! [ -L "/etc/nginx/snippets/nette.conf" ]; then
	rm -rf "/etc/nginx/snippets/nette.conf"
	ln -fs "/vagrant/server/nginx/snippets/nette.conf" "/etc/nginx/snippets/nette.conf"
fi
if ! [ -L "/etc/nginx/snippets/php.conf" ]; then
	rm -rf "/etc/nginx/snippets/php.conf"
	ln -fs "/vagrant/server/nginx/snippets/php.conf" "/etc/nginx/snippets/php.conf"
fi

chown www-data "/var/lib/php/sessions"

su postgres -c 'dropdb ytnuk'
su postgres -c 'createdb ytnuk'
su postgres -c 'psql ytnuk < /vagrant/server/database/schema.sql'
su postgres -c 'psql ytnuk < /vagrant/server/database/data.sql'
su postgres -c 'psql ytnuk < /vagrant/server/database/permission.sql'

curl -sS https://getcomposer.org/installer | php
mv composer.phar /usr/local/bin/composer
npm install -g grunt-cli
npm install -g bower
gem install sass
