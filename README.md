weather_tracker
===============

Track the accuracy of weather forecasts

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
../vendor/bin/phpcs path/to/file/___.php