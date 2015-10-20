#!/usr/bin/env bash

service php7.0-fpm restart
nginx -s stop
nginx
