<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of phpunit/php-timer.
=======
<?php
/*
 * This file is part of the PHP_Timer package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace SebastianBergmann\Timer;

use PHPUnit\Framework\TestCase;

/**
 * @covers \SebastianBergmann\Timer\Timer
 */
final class TimerTest extends TestCase
{
    public function testCanBeStartedAndStopped(): void
    {
        $this->assertIsFloat(Timer::stop());
    }

    public function testCanFormatTimeSinceStartOfRequest(): void
    {
        $this->assertStringMatchesFormat('%f %s', Timer::timeSinceStartOfRequest());
    }

    /**
     * @backupGlobals enabled
     */
    public function testCanFormatSinceStartOfRequestWhenRequestTimeIsNotAvailableAsFloat(): void
    {
        if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
            unset($_SERVER['REQUEST_TIME_FLOAT']);
        }

        $this->assertStringMatchesFormat('%f %s', Timer::timeSinceStartOfRequest());
    }

    /**
     * @backupGlobals enabled
     */
    public function testCannotFormatTimeSinceStartOfRequestWhenRequestTimeIsNotAvailable(): void
    {
        if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
            unset($_SERVER['REQUEST_TIME_FLOAT']);
        }

        if (isset($_SERVER['REQUEST_TIME'])) {
            unset($_SERVER['REQUEST_TIME']);
        }

        $this->expectException(RuntimeException::class);

        Timer::timeSinceStartOfRequest();
    }

    public function testCanFormatResourceUsage(): void
    {
        $this->assertStringMatchesFormat('Time: %s, Memory: %f %s', Timer::resourceUsage());
    }

    /**
     * @dataProvider secondsProvider
     */
    public function testCanFormatSecondsAsString(string $string, float $seconds): void
    {
        $this->assertEquals($string, Timer::secondsToTimeString($seconds));
    }

    public function secondsProvider(): array
    {
        return [
            ['0 ms', 0],
            ['1 ms', .001],
            ['10 ms', .01],
            ['100 ms', .1],
            ['999 ms', .999],
            ['1 second', .9999],
            ['1 second', 1],
            ['2 seconds', 2],
            ['59.9 seconds', 59.9],
            ['59.99 seconds', 59.99],
            ['59.99 seconds', 59.999],
            ['1 minute', 59.9999],
            ['59 seconds', 59.001],
            ['59.01 seconds', 59.01],
            ['1 minute', 60],
            ['1.01 minutes', 61],
            ['2 minutes', 120],
            ['2.01 minutes', 121],
            ['59.99 minutes', 3599.9],
            ['59.99 minutes', 3599.99],
            ['59.99 minutes', 3599.999],
            ['1 hour', 3599.9999],
            ['59.98 minutes', 3599.001],
            ['59.98 minutes', 3599.01],
            ['1 hour', 3600],
            ['1 hour', 3601],
            ['1 hour', 3601.9],
            ['1 hour', 3601.99],
            ['1 hour', 3601.999],
            ['1 hour', 3601.9999],
            ['1.01 hours', 3659.9999],
            ['1.01 hours', 3659.001],
            ['1.01 hours', 3659.01],
            ['2 hours', 7199.9999],
        ];
    }

    /**
     * @dataProvider bytesProvider
     */
    public function testCanFormatBytesAsString(string $string, float $bytes): void
    {
        $this->assertEquals($string, Timer::bytesToString($bytes));
    }

    public function bytesProvider(): array
    {
        return [
            ['0 bytes', 0],
            ['1 byte', 1],
            ['1023 bytes', 1023],
            ['1.00 KB', 1024],
            ['1.50 KB', 1.5 * 1024],
            ['2.00 MB', 2 * 1048576],
            ['2.50 MB', 2.5 * 1048576],
            ['3.00 GB', 3 * 1073741824],
            ['3.50 GB', 3.5 * 1073741824],
        ];
=======

/**
 * Tests for PHP_Timer.
 *
 * @since      Class available since Release 1.0.0
 */
class PHP_TimerTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PHP_Timer::start
     * @covers PHP_Timer::stop
     */
    public function testStartStop()
    {
        $this->assertInternalType('float', PHP_Timer::stop());
    }

    /**
     * @covers       PHP_Timer::secondsToTimeString
     * @dataProvider secondsProvider
     */
    public function testSecondsToTimeString($string, $seconds)
    {
        $this->assertEquals(
            $string,
            PHP_Timer::secondsToTimeString($seconds)
        );
    }

    /**
     * @covers PHP_Timer::timeSinceStartOfRequest
     */
    public function testTimeSinceStartOfRequest()
    {
        $this->assertStringMatchesFormat(
            '%f %s',
            PHP_Timer::timeSinceStartOfRequest()
        );
    }


    /**
     * @covers PHP_Timer::resourceUsage
     */
    public function testResourceUsage()
    {
        $this->assertStringMatchesFormat(
            'Time: %s, Memory: %fMB',
            PHP_Timer::resourceUsage()
        );
    }

    public function secondsProvider()
    {
        return array(
          array('0 ms', 0),
          array('1 ms', .001),
          array('10 ms', .01),
          array('100 ms', .1),
          array('999 ms', .999),
          array('1 second', .9999),
          array('1 second', 1),
          array('2 seconds', 2),
          array('59.9 seconds', 59.9),
          array('59.99 seconds', 59.99),
          array('59.99 seconds', 59.999),
          array('1 minute', 59.9999),
          array('59 seconds', 59.001),
          array('59.01 seconds', 59.01),
          array('1 minute', 60),
          array('1.01 minutes', 61),
          array('2 minutes', 120),
          array('2.01 minutes', 121),
          array('59.99 minutes', 3599.9),
          array('59.99 minutes', 3599.99),
          array('59.99 minutes', 3599.999),
          array('1 hour', 3599.9999),
          array('59.98 minutes', 3599.001),
          array('59.98 minutes', 3599.01),
          array('1 hour', 3600),
          array('1 hour', 3601),
          array('1 hour', 3601.9),
          array('1 hour', 3601.99),
          array('1 hour', 3601.999),
          array('1 hour', 3601.9999),
          array('1.01 hours', 3659.9999),
          array('1.01 hours', 3659.001),
          array('1.01 hours', 3659.01),
          array('2 hours', 7199.9999),
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
