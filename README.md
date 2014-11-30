weather_tracker
===============

Track the accuracy of weather forecasts

Setup
===============

### Production Setup
```
sudo apt-get install  postgresql postgresql-contrib
psql -f database/weather.db.sql
cd config
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install --no-dev
```

### Dev Setup
```
sudo apt-get install  postgresql postgresql-contrib
psql -f database/weather.db.sql
cd config
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
../vendor/bin/phpcs --config-set default_standard PHPCS
```

Coding Standards
================
### PHP Lint
vendor/bin/phpcs path/to/file/___.php

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