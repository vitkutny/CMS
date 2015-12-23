#!/usr/bin/env bash

grep -q "cd /vagrant" ~/.profile 2> "/dev/null" || echo "cd /vagrant" >> ~/.profile
cd "/vagrant"

npm install
grunt install

php "/vagrant/application/run.php" migrations:reset
