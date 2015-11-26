#!/usr/bin/env bash

php "/vagrant/app/run.php" migrations:reset
grep -q "cd /vagrant" ~/.profile 2> /dev/null || echo "cd /vagrant" >> ~/.profile
cd "/vagrant"
npm install
grunt install
