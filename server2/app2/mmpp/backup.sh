#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec mmpp_mariadb_1 /usr/bin/mysqldump -u root --password=dbpass db >~/php_mariadb/app2/mmpp/backup.sql
