	#!/bin/bash
#/bin/mysqld_safe
#Db_name=$MYSQL_ROOT_PASSWORD
#Db_password=$MYSQL_DATABASE
mysql -u root -p --password=$MYSQL_ROOT_PASSWORD -e "CREATE DATABASE IF NOT EXISTS ${MYSQL_DATABASE}"

mysql -u root -p --password=$MYSQL_ROOT_PASSWORD --database=$MYSQL_DATABASE -e "CREATE TABLE users (
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  created_at datetime DEFAULT current_timestamp()
)"
mysql -u root -p --password=$MYSQL_ROOT_PASSWORD --database=$MYSQL_DATABASE  -e "CREATE TABLE Products (
  productID int(11) DEFAULT NULL,
  productName varchar(255) DEFAULT NULL,
  productBrand varchar(255) DEFAULT NULL,
  productQty int(10) DEFAULT NULL,
  Price int(11) DEFAULT NULL
)" 

mysql -u root -p --password=$MYSQL_ROOT_PASSWORD --database=$MYSQL_DATABASE  -e "INSERT INTO users(username,password) VALUES ('${CLIENT_NAME}','${CLIENT_PASSWORD}')"
  
