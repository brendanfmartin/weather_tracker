weather_tracker
===============

Track the accuracy of weather forecasts

Setup
===============

### config.yml Setup

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
```

### Dev Setup
```
# Javascript Dependency Management
sudo apt-get install nodejs
sudo apt-get install npm
sudo npm install -g bower
sudo npm install -g jshint

# PHP Dependency Management
cd config/composer
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install

sudo apt-get install postgresql postgresql-contrib php5-pgsql
.database/migrate.sh -u weather_tracker_user -p weather_tracker
```

Vagrant
================
After initial setup, simply use ```vagrant up``` to start server.

To remote in, use ```vagrant ssh```

### Initial Setup
```
cd config\vagrant
sudo ./bootstrap.sh
```

### Known Ubuntu Issue
*default: stdin: is not a tty*
[Ubuntu Bug](https://github.com/mitchellh/vagrant/issues/1673)

Coding Standards
================
### PHP Lint
Currently will ignore any file in a folder named tests (case insensitive).
```
vendor/bin/phpcs --standard=config/lint/ruleset.xml path/to/file/___.php
```

### JavaScript
```
jshint --config config/lint/.jshintrc frontend/javascript/src/
```

Testing
================
### PHP
All tests cases located in test folder with naming convention {ClassName}Test.php

To run all tests:
```
vendor/bin/phpunit --bootstrap autoload.php tests/
```

### JavaScript
Open tests/javascript/SpecRunner.html in a browser.