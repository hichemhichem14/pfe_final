#!/usr/bin/env bash
#DOCKER="/usr/bin/docker"
/usr/bin/docker container rm -f -v "$1_web_1" "$1_mariadb_1"
/usr/bin/docker  volume rm "$1_pfe"
