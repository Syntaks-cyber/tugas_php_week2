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
namespace PHPUnit\Framework\Constraint;

use PHPUnit\Framework\ExpectationFailedException;

/**
 * Constraint that accepts any input value.
 */
final class IsAnything extends Constraint
{
    /**
     * Evaluates the constraint for parameter $other.
=======

/**
 * Constraint that accepts any input value.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_IsAnything extends PHPUnit_Framework_Constraint
{
    /**
     * Evaluates the constraint for parameter $other
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
<<<<<<< HEAD
     * @throws ExpectationFailedException
     */
    public function evaluate($other, string $description = '', bool $returnResult = false)
=======
     * @param mixed  $other        Value or object to evaluate.
     * @param string $description  Additional information about the test
     * @param bool   $returnResult Whether to return a result or throw an exception
     *
     * @return mixed
     *
     * @throws PHPUnit_Framework_ExpectationFailedException
     */
    public function evaluate($other, $description = '', $returnResult = false)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $returnResult ? true : null;
    }

    /**
     * Returns a string representation of the constraint.
<<<<<<< HEAD
     */
    public function toString(): string
=======
     *
     * @return string
     */
    public function toString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'is anything';
    }

    /**
     * Counts the number of constraint elements.
<<<<<<< HEAD
     */
    public function count(): int
=======
     *
     * @return int
     *
     * @since  Method available since Release 3.5.0
     */
    public function count()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 0;
    }
}
