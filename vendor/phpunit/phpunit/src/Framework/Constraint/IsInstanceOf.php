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
use ReflectionClass;
use ReflectionException;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the object it is evaluated for is an instance
 * of a given class.
 *
 * The expected class name is passed in the constructor.
<<<<<<< HEAD
 */
final class IsInstanceOf extends Constraint
=======
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_IsInstanceOf extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private $className;

    public function __construct(string $className)
    {
=======
    protected $className;

    /**
     * @param string $className
     */
    public function __construct($className)
    {
        parent::__construct();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->className = $className;
    }

    /**
<<<<<<< HEAD
     * Returns a string representation of the constraint.
     */
    public function toString(): string
=======
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        return ($other instanceof $this->className);
    }

    /**
     * Returns the description of the failure
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
        return sprintf(
            '%s is an instance of %s "%s"',
            $this->exporter->shortenedExport($other),
            $this->getType(),
            $this->className
        );
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return sprintf(
            'is instance of %s "%s"',
            $this->getType(),
            $this->className
        );
    }

<<<<<<< HEAD
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return $other instanceof $this->className;
    }

    /**
     * Returns the description of the failure.
     *
     * The beginning of failure messages is "Failed asserting that" in most
     * cases. This method should return the second part of that sentence.
     *
     * @param mixed $other evaluated value or object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    protected function failureDescription($other): string
    {
        return sprintf(
            '%s is an instance of %s "%s"',
            $this->exporter()->shortenedExport($other),
            $this->getType(),
            $this->className
        );
    }

    private function getType(): string
    {
        try {
            $reflection = new ReflectionClass($this->className);

=======
    private function getType()
    {
        try {
            $reflection = new ReflectionClass($this->className);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($reflection->isInterface()) {
                return 'interface';
            }
        } catch (ReflectionException $e) {
        }

        return 'class';
    }
}
