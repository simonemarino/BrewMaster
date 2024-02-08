-- create the databases
CREATE DATABASE IF NOT EXISTS beer;

-- create the users for each database
CREATE USER 'beer_user'@'localhost' IDENTIFIED BY '!ed23zA24d';
CREATE USER 'beer_user'@'%' IDENTIFIED BY '!ed23zA24d';
GRANT CREATE, ALTER, INDEX, LOCK TABLES, REFERENCES, UPDATE, DELETE, DROP, SELECT, INSERT ON `beer`.* TO 'beer_user'@'localhost';
GRANT CREATE, ALTER, INDEX, LOCK TABLES, REFERENCES, UPDATE, DELETE, DROP, SELECT, INSERT ON `beer`.* TO 'beer_user'@'%';

FLUSH PRIVILEGES;
