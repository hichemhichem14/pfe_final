#!/usr/bin/env bash
DOCKER="/usr/bin/docker"
sudo $DOCKER  exec hichamnadir_web_1  /usr/bin/mysqldump -u root --password=hi  hi >./backup.sql
