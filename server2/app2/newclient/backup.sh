#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec newclient_mariadb_1 /usr/bin/mysqldump -u root --password=password db >/home/nadirpfe/php_mariadb/app2/newclient/backup.sql
