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
namespace PHPUnit\Framework\Error;

final class Notice extends Error
{
=======

/**
 * Wrapper for PHP notices.
 * You can disable notice-to-exception conversion by setting
 *
 * <code>
 * PHPUnit_Framework_Error_Notice::$enabled = false;
 * </code>
 *
 * @since Class available since Release 3.3.0
 */
class PHPUnit_Framework_Error_Notice extends PHPUnit_Framework_Error
{
    public static $enabled = true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
