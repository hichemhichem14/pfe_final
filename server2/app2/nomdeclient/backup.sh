#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec nomdeclient_mariadb_1 /usr/bin/mysqldump -u root --password=dbpass db >/home/nadirpfe/php_mariadb/app2/nomdeclient/backup.sql
