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

final class Timer
{
    /**
     * @var int[]
     */
    private static $sizes = [
        'GB' => 1073741824,
        'MB' => 1048576,
        'KB' => 1024,
    ];

    /**
     * @var int[]
     */
    private static $times = [
        'hour'   => 3600000,
        'minute' => 60000,
        'second' => 1000,
    ];

    /**
     * @var float[]
     */
    private static $startTimes = [];

    public static function start(): void
    {
        self::$startTimes[] = \microtime(true);
    }

    public static function stop(): float
    {
        return \microtime(true) - \array_pop(self::$startTimes);
    }

    public static function bytesToString(float $bytes): string
    {
        foreach (self::$sizes as $unit => $value) {
            if ($bytes >= $value) {
                return \sprintf('%.2f %s', $bytes >= 1024 ? $bytes / $value : $bytes, $unit);
            }
        }

        return $bytes . ' byte' . ((int) $bytes !== 1 ? 's' : '');
    }

    public static function secondsToTimeString(float $time): string
    {
        $ms = \round($time * 1000);

        foreach (self::$times as $unit => $value) {
            if ($ms >= $value) {
                $time = \floor($ms / $value * 100.0) / 100.0;
=======

/**
 * Utility class for timing.
 *
 * @since      Class available since Release 1.0.0
 */
class PHP_Timer
{
    /**
     * @var array
     */
    private static $times = array(
      'hour'   => 3600000,
      'minute' => 60000,
      'second' => 1000
    );

    /**
     * @var array
     */
    private static $startTimes = array();

    /**
     * @var float
     */
    public static $requestTime;

    /**
     * Starts the timer.
     */
    public static function start()
    {
        array_push(self::$startTimes, microtime(true));
    }

    /**
     * Stops the timer and returns the elapsed time.
     *
     * @return float
     */
    public static function stop()
    {
        return microtime(true) - array_pop(self::$startTimes);
    }

    /**
     * Formats the elapsed time as a string.
     *
     * @param  float  $time
     * @return string
     */
    public static function secondsToTimeString($time)
    {
        $ms = round($time * 1000);

        foreach (self::$times as $unit => $value) {
            if ($ms >= $value) {
                $time = floor($ms / $value * 100.0) / 100.0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

                return $time . ' ' . ($time == 1 ? $unit : $unit . 's');
            }
        }

        return $ms . ' ms';
    }

    /**
<<<<<<< HEAD
     * @throws RuntimeException
     */
    public static function timeSinceStartOfRequest(): string
    {
        if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
            $startOfRequest = $_SERVER['REQUEST_TIME_FLOAT'];
        } elseif (isset($_SERVER['REQUEST_TIME'])) {
            $startOfRequest = $_SERVER['REQUEST_TIME'];
        } else {
            throw new RuntimeException('Cannot determine time at which the request started');
        }

        return self::secondsToTimeString(\microtime(true) - $startOfRequest);
    }

    /**
     * @throws RuntimeException
     */
    public static function resourceUsage(): string
    {
        return \sprintf(
            'Time: %s, Memory: %s',
            self::timeSinceStartOfRequest(),
            self::bytesToString(\memory_get_peak_usage(true))
        );
    }
}
=======
     * Formats the elapsed time since the start of the request as a string.
     *
     * @return string
     */
    public static function timeSinceStartOfRequest()
    {
        return self::secondsToTimeString(microtime(true) - self::$requestTime);
    }

    /**
     * Returns the resources (time, memory) of the request as a string.
     *
     * @return string
     */
    public static function resourceUsage()
    {
        return sprintf(
            'Time: %s, Memory: %4.2fMB',
            self::timeSinceStartOfRequest(),
            memory_get_peak_usage(true) / 1048576
        );
    }
}

if (isset($_SERVER['REQUEST_TIME_FLOAT'])) {
    PHP_Timer::$requestTime = $_SERVER['REQUEST_TIME_FLOAT'];
} elseif (isset($_SERVER['REQUEST_TIME'])) {
    PHP_Timer::$requestTime = $_SERVER['REQUEST_TIME'];
} else {
    PHP_Timer::$requestTime = microtime(true);
}
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
