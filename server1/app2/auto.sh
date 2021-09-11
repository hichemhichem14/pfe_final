mkdir ~/php_mariadb/app2/$1/backup
docker run --rm --volumes-from "$1_mariadb_1" -v ~/php_mariadb/app2/$1/backup:/backup ubuntu bash -c 
"cd /var/lib/mysql && tar cvf /backup/backup.tar ."  && sshpass -p 'hichempfe14*' scp -r ~/php_mariadb/app2/$1/  
hichempfe@20.106.177.84:~/php_mariadb/app2/ && sshpass -p 'hichempfe14*' ssh hichempfe@20.106.177.84  
"docker volume create '$1_pfe' && docker run --rm -v $1_pfe:/recover -v /home/hichempfe/php_mariadb/app2/$1/backup:/backup ubuntu bash -c 
'cd /recover && tar xfv  /backup/backup.tar' && cd  ~/php_mariadb/app2/$1 && docker-compose up -d && crontab -l > 
~/php_mariadb/app2/$1/jobs.txt && sudo echo '* * * * * /bin/bash $HOME/php_mariadb/app2/$1/backup.sh' >> 
~/php_mariadb/app2/$1/jobs.txt && crontab jobs.txt  && rm jobs.txt && rm -r -f ~/php_mariadb/app2/$1/backup"  &&  
rm -r -f ~/php_mariadb/app2/$1/backup  && docker container rm -f -v "$1_mariadb_1" "$1_web_1"  && 
docker volume rm -f  "$1_pfe"
