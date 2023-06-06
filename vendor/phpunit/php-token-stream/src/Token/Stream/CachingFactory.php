<?php
/*
<<<<<<< HEAD
 * This file is part of php-token-stream.
=======
 * This file is part of the PHP_TokenStream package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 * A caching factory for token stream objects.
<<<<<<< HEAD
=======
 *
 * @author    Sebastian Bergmann <sebastian@phpunit.de>
 * @copyright Sebastian Bergmann <sebastian@phpunit.de>
 * @license   http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @link      http://github.com/sebastianbergmann/php-token-stream/tree
 * @since     Class available since Release 1.0.0
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class PHP_Token_Stream_CachingFactory
{
    /**
     * @var array
     */
<<<<<<< HEAD
    protected static $cache = [];

    /**
     * @param string $filename
     *
=======
    protected static $cache = array();

    /**
     * @param  string $filename
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return PHP_Token_Stream
     */
    public static function get($filename)
    {
        if (!isset(self::$cache[$filename])) {
            self::$cache[$filename] = new PHP_Token_Stream($filename);
        }

        return self::$cache[$filename];
    }

    /**
     * @param string $filename
     */
    public static function clear($filename = null)
    {
        if (is_string($filename)) {
            unset(self::$cache[$filename]);
        } else {
<<<<<<< HEAD
            self::$cache = [];
=======
            self::$cache = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }
}
