#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec polmm_mariadb_1 /usr/bin/mysqldump -u root --password=pass db >~/php_mariadb/app2/polmm/backup.sql
