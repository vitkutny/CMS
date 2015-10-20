#!/usr/bin/env bash

export LC_ALL=en_US.utf8
add-apt-repository -y ppa:ondrej/php-7.0

apt-get update
apt-get upgrade -y --force-yes

apt-get install -y --force-yes nginx php7.0-fpm php-pgsql php-sqlite3 postgresql

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

#su - postgres
#dropdb ytnuk
#createdb ytnuk
#psql ytnuk < /vagrant/schema.sql
#psql ytnuk < /vagrant/data.sql
#psql -s ytnuk
#CREATE USER "www-data";
#GRANT ALL PRIVILEGES ON DATABASE ytnuk TO "www-data";
#GRANT ALL PRIVILEGES ON ALL TABLES IN SCHEMA public TO "www-data";
#GRANT USAGE ON SCHEMA public TO "www-data";
