#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec oda_mariadb_1 /usr/bin/mysqldump -u root --password=pass db >/home/nadirpfe/php_mariadb/app2/oda/backup.sql
