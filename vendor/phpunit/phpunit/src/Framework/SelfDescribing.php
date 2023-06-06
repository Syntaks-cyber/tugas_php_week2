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
namespace PHPUnit\Framework;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
interface SelfDescribing
{
    /**
     * Returns a string representation of the object.
     */
    public function toString(): string;
=======

/**
 * Interface for classes that can return a description of itself.
 *
 * @since Interface available since Release 3.0.0
 */
interface PHPUnit_Framework_SelfDescribing
{
    /**
     * Returns a string representation of the object.
     *
     * @return string
     */
    public function toString();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
