#!/bin/bash
#
# Provision vagrant machine.
#  - Install postgres
#  - Run migrations
#  - Install apache
#  - Setup configuration

apt-get -y update
sudo apt-get -y install postgresql postgresql-contrib php5-pgsql
cp -f database/pg_hba.conf /etc/postgresql/9.3/main/pg_hba.conf
service postgresql restart
database/migrate.sh -u weather_tracker_user -p weather_tracker

apt-get -y install apache2
apt-get -y install libapache2-mod-php5
a2enmod php5

echo "ServerName weather-tracker.com" | tee /etc/apache2/conf-available/fqdn.conf
a2enconf fqdn
a2dissite weather-tracker.com

service apache2 restart