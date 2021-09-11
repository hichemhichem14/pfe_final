mkdir  $HOME/php_mariadb/app2/$1
cd    $HOME/php_mariadb/app2/$1
#mkdir web1
cp -r    $HOME/php_mariadb/app2/web1  $HOME/php_mariadb/app2/$1/
cp $HOME/php_mariadb/app2/docker-compose.yml   $HOME/php_mariadb/app2/$1/docker-compose.yml
touch  $HOME/php_mariadb/app2/$1/.env
touch $HOME/php_mariadb/app2/$1/backup.sh
docker network create "$1"
echo   "MYSQL_ROOT_PASSWORD=$6
        MYSQL_DATABASE=$2
        VIRTUAL_HOST=$3
        LETSENCRYPT_HOST=$3
        name=$1
        email=$4
        password=$5
        network=$1" > $HOME/php_mariadb/app2/$1/.env
        echo "#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec $1_mariadb_1 /usr/bin/mysqldump -u root --password=$6 $2 >$HOME/php_mariadb/app2/$1/backup.sql">$HOME/php_mariadb/app2/$1/backup.sh
docker network  connect  $1 nginx-proxy
  docker network  connect  $1 letsencrypt-proxy
 cd   $HOME/php_mariadb/app2/$1
 docker-compose  up  -d 
crontab -l > $HOME/php_mariadb/app2/$1/jobs.txt
sudo echo "* * * * * /bin/bash $HOME/php_mariadb/app2/$1/backup.sh" >> $HOME/php_mariadb/app2/$1/jobs.txt
crontab jobs.txt
rm  jobs.txt
cd ~/php_mariadb/proxy && docker-compose up -d
