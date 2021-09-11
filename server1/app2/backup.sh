#!/usr/bin/env bash
DOCKER="/usr/bin/docker"
$DOCKER  exec app2_mariadb_1 /usr/bin/mysqldump -u root --password=mypass clientB >~/app2_backup.sql