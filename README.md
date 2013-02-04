Check out [the slides](http://matthewturland.com/slides/phpunit-db) associated with this code.

# Installation

```
git clone git://github.com/elazar/phpunit-db-examples.git
cd php-db-examples
mysql -e 'create database phpunit_db'
mysql phpunit_db < phpunit_db.sql
cd tests
php composer.phar install
```

# Usage

```
cd php-db-examples/tests
./vendor/bin/phpunit My/Dao/FooTest.php
```

# License

Released under the [BSD License](http://opensource.org/licenses/BSD-2-Clause).
