#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec newstore_mariadb_1 /usr/bin/mysqldump -u root --password=dbpass db >/home/nadirpfe/php_mariadb/app2/newstore/backup.sql
