#!/bin/bash

# Set MySQL connection details
mysql_user="root"
mysql_password=""
mysql_host="localhost"
mysql_db="doctowish"

# Set path to export SQL file
sql_file="C:\wamp64\www\projet-web\bd-save\temps.sql"

# Export MySQL database to SQL file
mysqldump -u $mysql_user -p$mysql_password -h $mysql_host $mysql_db > $sql_file
