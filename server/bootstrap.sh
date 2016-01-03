#!/usr/bin/env bash

add-apt-repository -y ppa:ondrej/php-7.0

apt-get update
apt-get upgrade -y --force-yes

apt-get install -y --force-yes \
	nginx \
	php-fpm \
	php-pgsql \
	php-sqlite3 \
	php-xdebug \
	postgresql \
	nodejs-legacy \
	npm \
	diffutils

if ! [ -L "/var/www" ]; then
	rm -rf "/var/www"
	ln -fs "/vagrant" "/var/www"
fi

if ! [ -L "/etc/nginx/sites-enabled" ]; then
	rm -rf "/etc/nginx/sites-enabled"
	ln -fs "/vagrant/server/etc/nginx/sites-enabled" "/etc/nginx/sites-enabled"
fi

if ! [ -L "/etc/nginx/snippets/nette.conf" ]; then
	rm -rf "/etc/nginx/snippets/nette.conf"
	ln -fs "/vagrant/server/etc/nginx/snippets/nette.conf" "/etc/nginx/snippets/nette.conf"
fi
if ! [ -L "/etc/nginx/snippets/php.conf" ]; then
	rm -rf "/etc/nginx/snippets/php.conf"
	ln -fs "/vagrant/server/etc/nginx/snippets/php.conf" "/etc/nginx/snippets/php.conf"
fi

if ! [ -L "/etc/php/mods-available/xdebug.ini" ]; then
	rm -f "/etc/php/mods-available/xdebug.ini"
	ln -fs "/vagrant/server/etc/php/mods-available/xdebug.ini" "/etc/php/mods-available/xdebug.ini"
fi

chown vagrant "/var/lib/php/sessions"
sed -ie "s/www-data/vagrant/g" "/etc/nginx/nginx.conf"
sed -ie "s/www-data/vagrant/g" "/etc/php/7.0/fpm/pool.d/www.conf"

su postgres -c 'dropdb vagrant --if-exists'
su postgres -c 'createdb vagrant'
su postgres -c 'psql vagrant --command="CREATE USER vagrant WITH PASSWORD '\''vagrant'\'' SUPERUSER"'

curl -sS "https://getcomposer.org/installer" | php
mv "composer.phar" "/usr/local/bin/composer"
npm install -g grunt-cli
npm install -g bower
gem install sass
