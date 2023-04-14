#!/bin/bash

# Se placer dans le répertoire contenant mysqldump.exe
cd "/c/wamp64/bin/mysql/mysql8.0.21/bin"

# Exporter la base de données doctowish
./mysqldump.exe -u root doctowish > "/c/wamp64/www/projet-web/bd-save/temp.sql"

# Supprimer la base de données dwish_backup si elle existe déjà
./mysql.exe -u root -e "DROP DATABASE IF EXISTS dwish_backup"

# Créer une copie de la base de données doctowish sous le nom dwish_backup
./mysql.exe -u root -e "CREATE DATABASE dwish_backup"
./mysql.exe -u root dwish_backup < "/c/wamp64/www/projet-web/bd-save/temp.sql"
