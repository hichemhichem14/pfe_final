#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec nouveauclient1_mariadb_1 /usr/bin/mysqldump -u root --password=dbpass db >~/php_mariadb/app2/nouveauclient1/backup.sql
