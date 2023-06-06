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

use function count;
use function gettype;
use function sprintf;
use function strpos;
use Countable;
use EmptyIterator;

/**
 * Constraint that checks whether a variable is empty().
 */
final class IsEmpty extends Constraint
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'is empty';
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        if ($other instanceof EmptyIterator) {
            return true;
        }

=======

/**
 * Constraint that checks whether a variable is empty().
 *
 * @since Class available since Release 3.5.0
 */
class PHPUnit_Framework_Constraint_IsEmpty extends PHPUnit_Framework_Constraint
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
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ($other instanceof Countable) {
            return count($other) === 0;
        }

        return empty($other);
    }

    /**
<<<<<<< HEAD
     * Returns the description of the failure.
=======
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is empty';
    }

    /**
     * Returns the description of the failure
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
<<<<<<< HEAD
     * @param mixed $other evaluated value or object
     */
    protected function failureDescription($other): string
=======
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $type = gettype($other);

        return sprintf(
            '%s %s %s',
<<<<<<< HEAD
            strpos($type, 'a') === 0 || strpos($type, 'o') === 0 ? 'an' : 'a',
=======
            $type[0] == 'a' || $type[0] == 'o' ? 'an' : 'a',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $type,
            $this->toString()
        );
    }
}
