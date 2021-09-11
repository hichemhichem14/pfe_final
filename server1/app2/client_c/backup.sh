#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec client_c_mariadb_1 /usr/bin/mysqldump -u root --password=dbpass db >/home/nadirpfe/php_mariadb/app2/client_c/backup.sql
