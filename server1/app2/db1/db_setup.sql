
CREATE DATABASE IF NOT EXISTS clientA;
USE clientA;
CREATE TABLE users (
  id int(11) NOT NULL,
  username varchar(50) NOT NULL,
  password varchar(255) NOT NULL,
  created_at datetime DEFAULT current_timestamp()
);
CREATE TABLE Products (
    productID INT,
    productName VARCHAR(255),
    productBrand VARCHAR(255),
    productQty INT(10),
    Price INT(11)
);



CREATE TABLE Workers (
    PersonID int,
    LastName varchar(255),
    FirstName varchar(255),
    Address varchar(255),
    City varchar(255),
    Job varchar(255)
);

