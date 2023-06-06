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

use function sprintf;
use PHPUnit\Framework\Exception;
use ReflectionClass;
use ReflectionException;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the class it is evaluated for has a given
 * static attribute.
 *
 * The attribute name is passed in the constructor.
<<<<<<< HEAD
 */
final class ClassHasStaticAttribute extends ClassHasAttribute
{
    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
            'has static attribute "%s"',
            $this->attributeName()
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        try {
            $class = new ReflectionClass($other);

            if ($class->hasProperty($this->attributeName())) {
                return $class->getProperty($this->attributeName())->isStatic();
            }
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
        // @codeCoverageIgnoreEnd

        return false;
=======
 *
 * @since Class available since Release 3.1.0
 */
class PHPUnit_Framework_Constraint_ClassHasStaticAttribute extends PHPUnit_Framework_Constraint_ClassHasAttribute
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
        $class = new ReflectionClass($other);

        if ($class->hasProperty($this->attributeName)) {
            $attribute = $class->getProperty($this->attributeName);

            return $attribute->isStatic();
        } else {
            return false;
        }
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     *
     * @since  Method available since Release 3.3.0
     */
    public function toString()
    {
        return sprintf(
            'has static attribute "%s"',
            $this->attributeName
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
