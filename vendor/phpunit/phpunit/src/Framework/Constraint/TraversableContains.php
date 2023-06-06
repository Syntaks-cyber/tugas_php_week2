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

use function is_array;
use function is_object;
use function is_string;
use function sprintf;
use function strpos;
use SplObjectStorage;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the Traversable it is applied to contains
 * a given value.
 *
<<<<<<< HEAD
 * @deprecated Use TraversableContainsEqual or TraversableContainsIdentical instead
 */
final class TraversableContains extends Constraint
=======
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_TraversableContains extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var bool
     */
<<<<<<< HEAD
    private $checkForObjectIdentity;
=======
    protected $checkForObjectIdentity;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $checkForNonObjectIdentity;
=======
    protected $checkForNonObjectIdentity;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var mixed
     */
<<<<<<< HEAD
    private $value;

    public function __construct($value, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false)
    {
=======
    protected $value;

    /**
     * @param mixed $value
     * @param bool  $checkForObjectIdentity
     * @param bool  $checkForNonObjectIdentity
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        parent::__construct();

        if (!is_bool($checkForObjectIdentity)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'boolean');
        }

        if (!is_bool($checkForNonObjectIdentity)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(3, 'boolean');
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->checkForObjectIdentity    = $checkForObjectIdentity;
        $this->checkForNonObjectIdentity = $checkForNonObjectIdentity;
        $this->value                     = $value;
    }

    /**
<<<<<<< HEAD
     * Returns a string representation of the constraint.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function toString(): string
    {
        if (is_string($this->value) && strpos($this->value, "\n") !== false) {
            return 'contains "' . $this->value . '"';
        }

        return 'contains ' . $this->exporter()->export($this->value);
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
        if ($other instanceof SplObjectStorage) {
            return $other->contains($this->value);
        }

        if (is_object($this->value)) {
            foreach ($other as $element) {
                if ($this->checkForObjectIdentity && $element === $this->value) {
                    return true;
<<<<<<< HEAD
                }

                /* @noinspection TypeUnsafeComparisonInspection */
                if (!$this->checkForObjectIdentity && $element == $this->value) {
=======
                } elseif (!$this->checkForObjectIdentity && $element == $this->value) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    return true;
                }
            }
        } else {
            foreach ($other as $element) {
                if ($this->checkForNonObjectIdentity && $element === $this->value) {
                    return true;
<<<<<<< HEAD
                }

                /* @noinspection TypeUnsafeComparisonInspection */
                if (!$this->checkForNonObjectIdentity && $element == $this->value) {
=======
                } elseif (!$this->checkForNonObjectIdentity && $element == $this->value) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    return true;
                }
            }
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
        if (is_string($this->value) && strpos($this->value, "\n") !== false) {
            return 'contains "' . $this->value . '"';
        } else {
            return 'contains ' . $this->exporter->export($this->value);
        }
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
        return sprintf(
            '%s %s',
            is_array($other) ? 'an array' : 'a traversable',
            $this->toString()
        );
    }
}
