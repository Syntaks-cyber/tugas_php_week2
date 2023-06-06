[![Build Status](https://travis-ci.org/sebastianbergmann/php-timer.svg?branch=master)](https://travis-ci.org/sebastianbergmann/php-timer)

<<<<<<< HEAD
# phpunit/php-timer
=======
# PHP_Timer
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

Utility class for timing things, factored out of PHPUnit into a stand-alone component.

## Installation

<<<<<<< HEAD
You can add this library as a local, per-project dependency to your project using [Composer](https://getcomposer.org/):

    composer require phpunit/php-timer

If you only need this library during development, for instance to run your project's test suite, then you should add it as a development-time dependency:

    composer require --dev phpunit/php-timer
=======
To add this package as a local, per-project dependency to your project, simply add a dependency on `phpunit/php-timer` to your project's `composer.json` file. Here is a minimal example of a `composer.json` file that just defines a dependency on PHP_Timer:

    {
        "require": {
            "phpunit/php-timer": "~1.0"
        }
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

## Usage

### Basic Timing

```php
<<<<<<< HEAD
use SebastianBergmann\Timer\Timer;

Timer::start();

// ...

$time = Timer::stop();
var_dump($time);

print Timer::secondsToTimeString($time);
=======
PHP_Timer::start();

$timer->start();

// ...

$time = PHP_Timer::stop();
var_dump($time);

print PHP_Timer::secondsToTimeString($time);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
```

The code above yields the output below:

    double(1.0967254638672E-5)
    0 ms

### Resource Consumption Since PHP Startup

```php
<<<<<<< HEAD
use SebastianBergmann\Timer\Timer;

print Timer::resourceUsage();
=======
print PHP_Timer::resourceUsage();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
```

The code above yields the output below:

    Time: 0 ms, Memory: 0.50MB
