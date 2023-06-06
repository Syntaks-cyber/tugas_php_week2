<<<<<<< HEAD
<?php declare(strict_types=1);
=======
<?php
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace PHPUnit\Runner;

use function array_slice;
use function dirname;
use function explode;
use function implode;
use function strpos;
use SebastianBergmann\Version as VersionId;

final class Version
{
    /**
     * @var string
     */
    private static $pharVersion = '';

    /**
     * @var string
     */
    private static $version = '';

    /**
     * Returns the current version of PHPUnit.
     */
    public static function id(): string
    {
        if (self::$pharVersion !== '') {
            return self::$pharVersion;
        }

        if (self::$version === '') {
            self::$version = (new VersionId('8.5.32', dirname(__DIR__, 2)))->getVersion();
=======

use SebastianBergmann\Version;

/**
 * This class defines the current version of PHPUnit.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Runner_Version
{
    private static $pharVersion;
    private static $version;

    /**
     * Returns the current version of PHPUnit.
     *
     * @return string
     */
    public static function id()
    {
        if (self::$pharVersion !== null) {
            return self::$pharVersion;
        }

        if (self::$version === null) {
            $version       = new Version('4.8.36', dirname(dirname(__DIR__)));
            self::$version = $version->getVersion();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return self::$version;
    }

<<<<<<< HEAD
    public static function series(): string
    {
        if (strpos(self::id(), '-')) {
            $version = explode('-', self::id())[0];
=======
    /**
     * @return string
     *
     * @since Method available since Release 4.8.13
     */
    public static function series()
    {
        if (strpos(self::id(), '-')) {
            $tmp     = explode('-', self::id());
            $version = $tmp[0];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        } else {
            $version = self::id();
        }

        return implode('.', array_slice(explode('.', $version), 0, 2));
    }

<<<<<<< HEAD
    public static function getVersionString(): string
=======
    /**
     * @return string
     */
    public static function getVersionString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'PHPUnit ' . self::id() . ' by Sebastian Bergmann and contributors.';
    }

<<<<<<< HEAD
    public static function getReleaseChannel(): string
    {
        if (strpos(self::$pharVersion, '-') !== false) {
            return '-snapshot';
=======
    /**
     * @return string
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getReleaseChannel()
    {
        if (strpos(self::$pharVersion, '-') !== false) {
            return '-nightly';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return '';
    }
}
