#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec client_mariadb_1 /usr/bin/mysqldump -u root --password=pass db >~/php_mariadb/app2/client/backup.sql
