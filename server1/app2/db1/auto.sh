x=`echo "#!/bin/bash";echo "#/bin/mysqld_safe";echo "Db_name=\"$1\""; echo "Db_password=\"$2\""; cat /docker-entrypoint-initdb.d/setup_db.sh`
echo "$x" > /docker-entrypoint-initdb.d/setup_db.sh