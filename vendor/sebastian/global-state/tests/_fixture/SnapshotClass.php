<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of sebastian/global-state.
=======
<?php
/*
 * This file is part of the GlobalState package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace SebastianBergmann\GlobalState\TestFixture;

class SnapshotClass
{
    private static $string = 'string';

    private static $closures = [];

    private static $files = [];

    private static $resources = [];

    private static $objects = [];

    public static function init(): void
    {
        self::$closures[] = function (): void {
        };

        self::$files[] = new \SplFileInfo(__FILE__);

        self::$resources[] = \fopen('php://memory', 'r');

        self::$objects[] = new \stdClass;
=======

namespace SebastianBergmann\GlobalState\TestFixture;

use DomDocument;
use ArrayObject;

/**
 */
class SnapshotClass
{
    private static $string = 'snapshot';
    private static $dom;
    private static $closure;
    private static $arrayObject;
    private static $snapshotDomDocument;
    private static $resource;
    private static $stdClass;

    public static function init()
    {
        self::$dom = new DomDocument();
        self::$closure = function () {};
        self::$arrayObject = new ArrayObject(array(1, 2, 3));
        self::$snapshotDomDocument = new SnapshotDomDocument();
        self::$resource = fopen('php://memory', 'r');
        self::$stdClass = new \stdClass();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
