# Project: CI Base PHP with TravisCI

[![Build Status](https://travis-ci.org/vukanac/ci-base-php.svg?branch=master)](https://travis-ci.org/vukanac/ci-base-php)


## Description

> CI with PHP and TravisCI

Code is hosted on *GitHub* and tests are run on *TravisCI* on every push to `master` branch.


This is base set of tools that help writing PHP code.

They are not obligatory but they are great help!


## Test and Development

### Infection

* https://infection.github.io

Install:

    composer global require infection/infection

or

    brew install infection

Run:

    infection


### PHP CS/CBF/CPD tools

They will help you to write code with consistent style (quotation, indentation, unused variable, ...).

* phpcs
* phpcbf
* phpcpd


### PHPstan ##

The PHP Static Analysis tool.

    $ vendor/bin/phpstan analyse src tests

Added strict rules with:

* https://github.com/thecodingmachine/phpstan-strict-rules


### The best use

Install plugins to Sublime Text 3:

* SublimeLinter
* SublimeLinter-phpcs
* SublimeLinter-phpcs-formatter


Optional:

* DocBlockr
* FileManager
* GitGutter
* Pretty JSON
* SublimeLinter-annotations


## Install


    git clone https://github.com/vukanac/ci-base-php.git phpstarter
    cd phpstarter
    composer install


## Start dev

    composer test

or

    composer ci

Watching for changes:
    ./vendor/bin/phpunit-watcher --watch


## Test

    composer test
    ./vendor/bin/phpunit


## License

MIT

[![FOSSA Status](https://app.fossa.io/api/projects/git%2Bgithub.com%2Fvukanac%2Fci-base-php.svg?type=large)](https://app.fossa.io/projects/git%2Bgithub.com%2Fvukanac%2Fci-base-php?ref=badge_large)


Vladimir Vukanac
