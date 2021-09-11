FROM mariadb:latest
#ENV MYSQL_ROOT_PASSWORD="mypass" 
#ENV MYSQL_DATABASE="clientB"
#ADD ./setup_db/setup_db.sh /docker-entrypoint-initdb.d
RUN export $MYSQL_ROOT_PASSWORD
RUN export $MYSQL_DATABASE
#COPY ./auto.sh /
#RUN   sed -i "db_name=${Db_name}" /docker-entrypoint-initdb.d/setup_db.sh
#RUN   sed -i "db_password=${Db_password}" /docker-entrypoint-initdb.d/setup_db.sh
#RUN chmod +x /auto.sh
#RUN bash -c "/auto.sh"
#ENV MARIADB_ROOT_PASSWORD="mypass"

# WORKDIR /docker-entrypoint-initdb.d

# RUN /bin/bash -c ./setup_db.sh 
#let's restart again
