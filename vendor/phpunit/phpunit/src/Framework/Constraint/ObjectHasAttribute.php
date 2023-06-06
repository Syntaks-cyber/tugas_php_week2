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

use ReflectionObject;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the object it is evaluated for has a given
 * attribute.
 *
 * The attribute name is passed in the constructor.
<<<<<<< HEAD
 */
final class ObjectHasAttribute extends ClassHasAttribute
=======
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_ObjectHasAttribute extends PHPUnit_Framework_Constraint_ClassHasAttribute
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return (new ReflectionObject($other))->hasProperty($this->attributeName());
=======
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        $object = new ReflectionObject($other);

        return $object->hasProperty($this->attributeName);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
