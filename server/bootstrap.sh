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

su postgres -c 'dropdb vagrant'
su postgres -c 'createdb vagrant'
su postgres -c 'psql vagrant < /vagrant/server/database/schema.sql'
su postgres -c 'psql vagrant < /vagrant/server/database/data.sql'
su postgres -c 'psql vagrant < /vagrant/server/database/permission.sql'

chown vagrant "/var/lib/php/sessions"
sed -ie "s/www-data/vagrant/g" "/etc/nginx/nginx.conf"
sed -ie "s/www-data/vagrant/g" "/etc/php/7.0/fpm/pool.d/www.conf"

curl -sS "https://getcomposer.org/installer" | php
mv "composer.phar" "/usr/local/bin/composer"
npm install -g grunt-cli
npm install -g bower
gem install sass
