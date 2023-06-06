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

use function array_key_exists;
use function is_array;
use ArrayAccess;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the array it is evaluated for has a given key.
 *
 * Uses array_key_exists() to check if the key is found in the input array, if
 * not found the evaluation fails.
 *
 * The array key is passed in the constructor.
<<<<<<< HEAD
 */
final class ArrayHasKey extends Constraint
=======
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_ArrayHasKey extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var int|string
     */
<<<<<<< HEAD
    private $key;
=======
    protected $key;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @param int|string $key
     */
    public function __construct($key)
    {
<<<<<<< HEAD
=======
        parent::__construct();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->key = $key;
    }

    /**
<<<<<<< HEAD
     * Returns a string representation of the constraint.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function toString(): string
    {
        return 'has the key ' . $this->exporter()->export($this->key);
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
=======
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (is_array($other)) {
            return array_key_exists($this->key, $other);
        }

        if ($other instanceof ArrayAccess) {
            return $other->offsetExists($this->key);
        }

        return false;
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
        return 'has the key ' . $this->exporter->export($this->key);
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
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
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
        return 'an array ' . $this->toString();
    }
}
