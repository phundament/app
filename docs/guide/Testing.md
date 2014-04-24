Setup
-----

Get codeception via composer or from http://codeception.com

Setup your test database by running

    app/yiic migrate --connectionID=dbTest --interactive=0

Update your application URL, use `index-test.php` to ensure the testing configuration.

    edit app/tests/codeception/acceptance.suite.yml

Or start the PHP built-in webserver (only available from PHP 5.4)

    php -S localhost:31415 -t www/ &

Run tests

    codecept.phar run -c`pwd`

Add a test
----------

    vendor/bin/codecept generate:cept acceptance 1234-MyCept
    edit app/tests/codeception/acceptance/1234-MyCept.php


***

Installation via composer
-------------------------

Enable the packagist repo in `composer.json`. 
> Note: The codeception test-suite is installed in `tests/codeception`

    vendor/bin/codecept run