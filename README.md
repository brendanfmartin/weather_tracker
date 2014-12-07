weather_tracker
===============

Track the accuracy of weather forecasts

Setup
===============

### Ubuntu 14.04 Postgres Issues
1. Uninstall
  - ```sudo apt-get purge postgresql postgresql-9.3 postgresql-common php5-pgsql```
2. Reinstall
  - ```sudo apt-get install postgresql postgresql-contrib php5-pgsql```
3. Edit configuration (postgres user should be setup with "trust" not "peer")
  - local   all             all                                     trust
  - host    all             127.0.0.1/32                            trust
  - local   all             postgres                                trust
4. Restart postgres
  - ```sudo /etc/init.d/postgresql reload```

### Production Setup
```
sudo apt-get install postgresql postgresql-contrib php5-pgsql
sudo psql -U postgres weather_tracker -f database/weather.db.sql
cd config
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install --no-dev
```

### Dev Setup
```
sudo apt-get install postgresql postgresql-contrib php5-pgsql
sudo psql -U postgres weather_tracker -f database/weather.db.sql
cd config
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
```

Coding Standards
================
### PHP Lint
```
vendor/bin/phpcs --standard=config/ruleset.xml path/to/file/___.php
```

### JavaScript
Currently using external JSLint site.

Testing
================
### PHP
All tests cases located in test folder with naming convention {ClassName}Test.php

To run all tests:
```
vendor/bin/phpunit --bootstrap autoload.php tests/
```

### JavaScript