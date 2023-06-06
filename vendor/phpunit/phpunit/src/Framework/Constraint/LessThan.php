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
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the value it is evaluated for is less than
 * a given value.
<<<<<<< HEAD
 */
final class LessThan extends Constraint
{
    /**
     * @var float|int
     */
    private $value;

    /**
     * @param float|int $value
     */
    public function __construct($value)
    {
=======
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_LessThan extends PHPUnit_Framework_Constraint
{
    /**
     * @var numeric
     */
    protected $value;

    /**
     * @param numeric $value
     */
    public function __construct($value)
    {
        parent::__construct();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->value = $value;
    }

    /**
<<<<<<< HEAD
     * Returns a string representation of the constraint.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     */
    public function toString(): string
    {
        return 'is less than ' . $this->exporter()->export($this->value);
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        return $this->value > $other;
    }
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
        return $this->value > $other;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'is less than ' . $this->exporter->export($this->value);
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
