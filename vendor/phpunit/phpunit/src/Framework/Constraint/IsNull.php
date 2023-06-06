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

/**
 * Constraint that accepts null.
 */
final class IsNull extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is null';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return $other === null;
    }
=======

/**
 * Constraint that accepts null.
 *
 * @since Class available since Release 3.3.0
 */
class PHPUnit_Framework_Constraint_IsNull extends PHPUnit_Framework_Constraint
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        return $other === null;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is null';
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
