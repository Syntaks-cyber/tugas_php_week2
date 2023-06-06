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

use function array_keys;
use function array_shift;
use function count;
use function defined;
use function get_defined_constants;
use function get_included_files;
use function in_array;
use function ini_get_all;
use function is_array;
use function is_file;
use function is_scalar;
use function preg_match;
use function serialize;
use function sprintf;
use function strpos;
use function strtr;
use function substr;
use function var_export;
use Closure;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class GlobalState
{
    /**
     * @var string[]
     */
    private const SUPER_GLOBAL_ARRAYS = [
        '_ENV',
        '_POST',
        '_GET',
        '_COOKIE',
        '_SERVER',
        '_FILES',
        '_REQUEST',
    ];

    /**
     * @throws Exception
     */
    public static function getIncludedFilesAsString(): string
    {
        return self::processIncludedFilesAsString(get_included_files());
    }

    /**
     * @param string[] $files
     *
     * @throws Exception
     */
    public static function processIncludedFilesAsString(array $files): string
    {
        $blacklist = new Blacklist;
=======

/**
 * @since Class available since Release 3.4.0
 */
class PHPUnit_Util_GlobalState
{
    /**
     * @var array
     */
    protected static $superGlobalArrays = array(
      '_ENV',
      '_POST',
      '_GET',
      '_COOKIE',
      '_SERVER',
      '_FILES',
      '_REQUEST'
    );

    /**
     * @var array
     */
    protected static $superGlobalArraysLong = array(
      'HTTP_ENV_VARS',
      'HTTP_POST_VARS',
      'HTTP_GET_VARS',
      'HTTP_COOKIE_VARS',
      'HTTP_SERVER_VARS',
      'HTTP_POST_FILES'
    );

    public static function getIncludedFilesAsString()
    {
        return static::processIncludedFilesAsString(get_included_files());
    }

    public static function processIncludedFilesAsString(array $files)
    {
        $blacklist = new PHPUnit_Util_Blacklist;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $prefix    = false;
        $result    = '';

        if (defined('__PHPUNIT_PHAR__')) {
            $prefix = 'phar://' . __PHPUNIT_PHAR__ . '/';
        }

<<<<<<< HEAD
        // Do not process bootstrap script
        array_shift($files);

        // If bootstrap script was a Composer bin proxy, skip the second entry as well
        if (substr(strtr($files[0], '\\', '/'), -24) === '/phpunit/phpunit/phpunit') {
            array_shift($files);
        }

        for ($i = count($files) - 1; $i >= 0; $i--) {
            $file = $files[$i];

            if (!empty($GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST']) &&
                in_array($file, $GLOBALS['__PHPUNIT_ISOLATION_BLACKLIST'], true)) {
                continue;
            }

=======
        for ($i = count($files) - 1; $i > 0; $i--) {
            $file = $files[$i];

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($prefix !== false && strpos($file, $prefix) === 0) {
                continue;
            }

            // Skip virtual file system protocols
            if (preg_match('/^(vfs|phpvfs[a-z0-9]+):/', $file)) {
                continue;
            }

            if (!$blacklist->isBlacklisted($file) && is_file($file)) {
                $result = 'require_once \'' . $file . "';\n" . $result;
            }
        }

        return $result;
    }

<<<<<<< HEAD
    public static function getIniSettingsAsString(): string
    {
        $result = '';

        foreach (ini_get_all(null, false) as $key => $value) {
            $result .= sprintf(
                '@ini_set(%s, %s);' . "\n",
                self::exportVariable($key),
                self::exportVariable((string) $value)
=======
    public static function getIniSettingsAsString()
    {
        $result      = '';
        $iniSettings = ini_get_all(null, false);

        foreach ($iniSettings as $key => $value) {
            $result .= sprintf(
                '@ini_set(%s, %s);' . "\n",
                self::exportVariable($key),
                self::exportVariable($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );
        }

        return $result;
    }

<<<<<<< HEAD
    public static function getConstantsAsString(): string
=======
    public static function getConstantsAsString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $constants = get_defined_constants(true);
        $result    = '';

        if (isset($constants['user'])) {
            foreach ($constants['user'] as $name => $value) {
                $result .= sprintf(
                    'if (!defined(\'%s\')) define(\'%s\', %s);' . "\n",
                    $name,
                    $name,
                    self::exportVariable($value)
                );
            }
        }

        return $result;
    }

<<<<<<< HEAD
    public static function getGlobalsAsString(): string
    {
        $result = '';

        foreach (self::SUPER_GLOBAL_ARRAYS as $superGlobalArray) {
            if (isset($GLOBALS[$superGlobalArray]) && is_array($GLOBALS[$superGlobalArray])) {
=======
    public static function getGlobalsAsString()
    {
        $result            = '';
        $superGlobalArrays = self::getSuperGlobalArrays();

        foreach ($superGlobalArrays as $superGlobalArray) {
            if (isset($GLOBALS[$superGlobalArray]) &&
                is_array($GLOBALS[$superGlobalArray])) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                foreach (array_keys($GLOBALS[$superGlobalArray]) as $key) {
                    if ($GLOBALS[$superGlobalArray][$key] instanceof Closure) {
                        continue;
                    }

                    $result .= sprintf(
                        '$GLOBALS[\'%s\'][\'%s\'] = %s;' . "\n",
                        $superGlobalArray,
                        $key,
                        self::exportVariable($GLOBALS[$superGlobalArray][$key])
                    );
                }
            }
        }

<<<<<<< HEAD
        $blacklist   = self::SUPER_GLOBAL_ARRAYS;
        $blacklist[] = 'GLOBALS';

        foreach (array_keys($GLOBALS) as $key) {
            if (!$GLOBALS[$key] instanceof Closure && !in_array($key, $blacklist, true)) {
=======
        $blacklist   = $superGlobalArrays;
        $blacklist[] = 'GLOBALS';

        foreach (array_keys($GLOBALS) as $key) {
            if (!in_array($key, $blacklist) && !$GLOBALS[$key] instanceof Closure) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $result .= sprintf(
                    '$GLOBALS[\'%s\'] = %s;' . "\n",
                    $key,
                    self::exportVariable($GLOBALS[$key])
                );
            }
        }

        return $result;
    }

<<<<<<< HEAD
    private static function exportVariable($variable): string
    {
        if (is_scalar($variable) || $variable === null ||
            (is_array($variable) && self::arrayOnlyContainsScalars($variable))) {
            return var_export($variable, true);
        }

        return 'unserialize(' . var_export(serialize($variable), true) . ')';
    }

    private static function arrayOnlyContainsScalars(array $array): bool
=======
    protected static function getSuperGlobalArrays()
    {
        if (ini_get('register_long_arrays') == '1') {
            return array_merge(
                self::$superGlobalArrays,
                self::$superGlobalArraysLong
            );
        } else {
            return self::$superGlobalArrays;
        }
    }

    protected static function exportVariable($variable)
    {
        if (is_scalar($variable) || is_null($variable) ||
           (is_array($variable) && self::arrayOnlyContainsScalars($variable))) {
            return var_export($variable, true);
        }

        return 'unserialize(' .
                var_export(serialize($variable), true) .
                ')';
    }

    protected static function arrayOnlyContainsScalars(array $array)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $result = true;

        foreach ($array as $element) {
            if (is_array($element)) {
                $result = self::arrayOnlyContainsScalars($element);
<<<<<<< HEAD
            } elseif (!is_scalar($element) && $element !== null) {
                $result = false;
            }

            if (!$result) {
=======
            } elseif (!is_scalar($element) && !is_null($element)) {
                $result = false;
            }

            if ($result === false) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                break;
            }
        }

        return $result;
    }
}
