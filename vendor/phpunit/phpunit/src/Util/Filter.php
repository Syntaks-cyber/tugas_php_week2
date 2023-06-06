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
namespace PHPUnit\Util;

use function array_unshift;
use function defined;
use function in_array;
use function is_file;
use function realpath;
use function sprintf;
use function strpos;
use PHPUnit\Framework\Exception;
use PHPUnit\Framework\SyntheticError;
use Throwable;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Filter
{
    /**
     * @throws Exception
     */
    public static function getFilteredStacktrace(Throwable $t): string
    {
        $filteredStacktrace = '';

        if ($t instanceof SyntheticError) {
            $eTrace = $t->getSyntheticTrace();
            $eFile  = $t->getSyntheticFile();
            $eLine  = $t->getSyntheticLine();
        } elseif ($t instanceof Exception) {
            $eTrace = $t->getSerializableTrace();
            $eFile  = $t->getFile();
            $eLine  = $t->getLine();
        } else {
            if ($t->getPrevious()) {
                $t = $t->getPrevious();
            }

            $eTrace = $t->getTrace();
            $eFile  = $t->getFile();
            $eLine  = $t->getLine();
=======

/**
 * Utility class for code filtering.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Util_Filter
{
    /**
     * Filters stack frames from PHPUnit classes.
     *
     * @param Exception $e
     * @param bool      $asString
     *
     * @return string
     */
    public static function getFilteredStacktrace(Exception $e, $asString = true)
    {
        $prefix = false;
        $script = realpath($GLOBALS['_SERVER']['SCRIPT_NAME']);

        if (defined('__PHPUNIT_PHAR_ROOT__')) {
            $prefix = __PHPUNIT_PHAR_ROOT__;
        }

        if ($asString === true) {
            $filteredStacktrace = '';
        } else {
            $filteredStacktrace = array();
        }

        if ($e instanceof PHPUnit_Framework_SyntheticError) {
            $eTrace = $e->getSyntheticTrace();
            $eFile  = $e->getSyntheticFile();
            $eLine  = $e->getSyntheticLine();
        } elseif ($e instanceof PHPUnit_Framework_Exception) {
            $eTrace = $e->getSerializableTrace();
            $eFile  = $e->getFile();
            $eLine  = $e->getLine();
        } else {
            if ($e->getPrevious()) {
                $e = $e->getPrevious();
            }
            $eTrace = $e->getTrace();
            $eFile  = $e->getFile();
            $eLine  = $e->getLine();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (!self::frameExists($eTrace, $eFile, $eLine)) {
            array_unshift(
                $eTrace,
<<<<<<< HEAD
                ['file' => $eFile, 'line' => $eLine]
            );
        }

        $prefix    = defined('__PHPUNIT_PHAR_ROOT__') ? __PHPUNIT_PHAR_ROOT__ : false;
        $blacklist = new Blacklist;

        foreach ($eTrace as $frame) {
            if (self::shouldPrintFrame($frame, $prefix, $blacklist)) {
                $filteredStacktrace .= sprintf(
                    "%s:%s\n",
                    $frame['file'],
                    $frame['line'] ?? '?'
                );
=======
                array('file' => $eFile, 'line' => $eLine)
            );
        }

        $blacklist = new PHPUnit_Util_Blacklist;

        foreach ($eTrace as $frame) {
            if (isset($frame['file']) && is_file($frame['file']) &&
                !$blacklist->isBlacklisted($frame['file']) &&
                ($prefix === false || strpos($frame['file'], $prefix) !== 0) &&
                $frame['file'] !== $script) {
                if ($asString === true) {
                    $filteredStacktrace .= sprintf(
                        "%s:%s\n",
                        $frame['file'],
                        isset($frame['line']) ? $frame['line'] : '?'
                    );
                } else {
                    $filteredStacktrace[] = $frame;
                }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        return $filteredStacktrace;
    }

<<<<<<< HEAD
    private static function shouldPrintFrame($frame, $prefix, Blacklist $blacklist): bool
    {
        if (!isset($frame['file'])) {
            return false;
        }

        $file              = $frame['file'];
        $fileIsNotPrefixed = $prefix === false || strpos($file, $prefix) !== 0;

        // @see https://github.com/sebastianbergmann/phpunit/issues/4033
        if (isset($GLOBALS['_SERVER']['SCRIPT_NAME'])) {
            $script = realpath($GLOBALS['_SERVER']['SCRIPT_NAME']);
        } else {
            $script = '';
        }

        return is_file($file) &&
               self::fileIsBlacklisted($file, $blacklist) &&
               $fileIsNotPrefixed &&
               $file !== $script;
    }

    private static function fileIsBlacklisted($file, Blacklist $blacklist): bool
    {
        return (empty($GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST']) ||
                !in_array($file, $GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST'], true)) &&
               !$blacklist->isBlacklisted($file);
    }

    private static function frameExists(array $trace, string $file, int $line): bool
    {
        foreach ($trace as $frame) {
            if (isset($frame['file'], $frame['line']) && $frame['file'] === $file && $frame['line'] === $line) {
=======
    /**
     * @param array  $trace
     * @param string $file
     * @param int    $line
     *
     * @return bool
     *
     * @since  Method available since Release 3.3.2
     */
    private static function frameExists(array $trace, $file, $line)
    {
        foreach ($trace as $frame) {
            if (isset($frame['file']) && $frame['file'] == $file &&
                isset($frame['line']) && $frame['line'] == $line) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return true;
            }
        }

        return false;
    }
}
