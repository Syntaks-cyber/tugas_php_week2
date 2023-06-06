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

use function array_replace_recursive;
use function is_array;
use function iterator_to_array;
use function var_export;
use ArrayObject;
use PHPUnit\Framework\ExpectationFailedException;
use SebastianBergmann\Comparator\ComparisonFailure;
use Traversable;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the array it is evaluated for has a specified subset.
 *
 * Uses array_replace_recursive() to check if a key value subset is part of the
 * subject array.
 *
<<<<<<< HEAD
 * @codeCoverageIgnore
 *
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3494
 */
final class ArraySubset extends Constraint
{
    /**
     * @var iterable
     */
    private $subset;
=======
 * @since Class available since Release 4.4.0
 */
class PHPUnit_Framework_Constraint_ArraySubset extends PHPUnit_Framework_Constraint
{
    /**
     * @var array|ArrayAccess
     */
    protected $subset;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $strict;

    public function __construct(iterable $subset, bool $strict = false)
    {
=======
    protected $strict;

    /**
     * @param array|ArrayAccess $subset
     * @param bool              $strict Check for object identity
     */
    public function __construct($subset, $strict = false)
    {
        parent::__construct();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->strict = $strict;
        $this->subset = $subset;
    }

    /**
<<<<<<< HEAD
     * Evaluates the constraint for parameter $other.
     *
     * If $returnResult is set to false (the default), an exception is thrown
     * in case of a failure. null is returned otherwise.
     *
     * If $returnResult is true, the result of the evaluation is returned as
     * a boolean value instead: true in case of success, false in case of a
     * failure.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function evaluate($other, string $description = '', bool $returnResult = false)
    {
        //type cast $other & $this->subset as an array to allow
        //support in standard array functions.
        $other        = $this->toArray($other);
        $this->subset = $this->toArray($this->subset);
=======
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param array|ArrayAccess $other Array or ArrayAccess object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        //type cast $other & $this->subset as an array to allow 
        //support in standard array functions.
        if($other instanceof ArrayAccess) {
            $other = (array) $other;
        }

        if($this->subset instanceof ArrayAccess) {
            $this->subset = (array) $this->subset;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $patched = array_replace_recursive($other, $this->subset);

        if ($this->strict) {
<<<<<<< HEAD
            $result = $other === $patched;
        } else {
            $result = $other == $patched;
        }

        if ($returnResult) {
            return $result;
        }

        if (!$result) {
            $f = new ComparisonFailure(
                $patched,
                $other,
                var_export($patched, true),
                var_export($other, true)
            );

            $this->fail($other, $description, $f);
=======
            return $other === $patched;
        } else {
            return $other == $patched;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Returns a string representation of the constraint.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function toString(): string
    {
        return 'has the subset ' . $this->exporter()->export($this->subset);
    }

    /**
     * Returns the description of the failure.
=======
     * @return string
     */
    public function toString()
    {
        return 'has the subset ' . $this->exporter->export($this->subset);
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
    {
        return 'an array ' . $this->toString();
    }

    private function toArray(iterable $other): array
    {
        if (is_array($other)) {
            return $other;
        }

        if ($other instanceof ArrayObject) {
            return $other->getArrayCopy();
        }

        if ($other instanceof Traversable) {
            return iterator_to_array($other);
        }

        // Keep BC even if we know that array would not be the expected one
        return (array) $other;
    }
=======
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
        return 'an array ' . $this->toString();
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
