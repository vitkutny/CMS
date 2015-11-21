#!/usr/bin/env bash

php /vagrant/app/run.php migrations:reset
cd "/vagrant"
npm install
grunt install
