docker network create "$1" 2>&1
mkdir  /home/hichem/Desktop/pfe_final/server2/app2/$1
cd    /home/hichem/Desktop/pfe_final/server2/app2/$1
#mkdir web1
cp -r    /home/hichem/Desktop/pfe_final/server2/app2/web1  /home/hichem/Desktop/pfe_final/server2/app2/$1/
cp /home/hichem/Desktop/pfe_final/server2/app2/docker-compose.yml   /home/hichem/Desktop/pfe_final/server2/app2/$1/docker-compose.yml
touch  /home/hichem/Desktop/pfe_final/server2/app2/$1/.env
touch /home/hichem/Desktop/pfe_final/server2/app2/$1/backup.sh
echo   "MYSQL_ROOT_PASSWORD=$6
        MYSQL_DATABASE=$2
        VIRTUAL_HOST=$3
        LETSENCRYPT_HOST=$3
        name=$1
        email=$4
        password=$5
        network=$1" > /home/hichem/Desktop/pfe_final/server2/app2/$1/.env
        echo "#!/usr/bin/env bash
         #DOCKER=/usr/bin/docker
       /usr/bin/docker  exec $1_mariadb_1 /usr/bin/mysqldump -u root --password=$6 $2 >/home/hichem/Desktop/pfe_final/server2/app2/$1/backup.sql">/home/hichem/Desktop/pfe_final/server2/app2/$1/backup.sh
docker network  connect  $1 nginx-proxy
  docker network  connect  $1 letsencrypt-proxy
 cd   /home/hichem/Desktop/pfe_final/server2/app2/$1
 /usr/local/bin/docker-compose  up  -d 
crontab -l > /home/hichem/Desktop/pfe_final/server2/app2/$1/jobs.txt
echo "* * * * * /bin/bash /home/hichem/Desktop/pfe_final/server2/app2/$1/backup.sh" >> /home/hichem//Desktop/pfe_final/server2/app2/$1/jobs.txt
crontab jobs.txt
rm  jobs.txt
#cd /home/hichem/Desktop/pfe_final/server2/proxy && /usr/local/bin/docker-compose up -d
