weather_tracker
===============

Track the accuracy of weather forecasts

Setup
===============
```
sudo apt-get install  postgresql postgresql-contrib
psql -f database/weather.db.sql
```

Dev Setup
===============
```
cd config
php -r "readfile('https://getcomposer.org/installer');" | php
php composer.phar install
../vendor/bin/phpcs --config-set default_standard PHPCS
```

Coding Standards
================
# PHP Lint
vendor/bin/phpcs path/to/file/___.php

# JavaScript
Currently using external JSLint site.

Testing
================
# PHP
```
vendor/bin/phpunit --bootstrap autoload.php tests/____Test
```

#JavaScript