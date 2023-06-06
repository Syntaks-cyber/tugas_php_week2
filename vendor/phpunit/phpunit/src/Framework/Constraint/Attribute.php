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

use PHPUnit\Framework\Assert;
use PHPUnit\Framework\ExpectationFailedException;

/**
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 *
 * @codeCoverageIgnore
 */
final class Attribute extends Composite
=======

/**
 * @since Class available since Release 3.1.0
 */
class PHPUnit_Framework_Constraint_Attribute extends PHPUnit_Framework_Constraint_Composite
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private $attributeName;

    public function __construct(Constraint $constraint, string $attributeName)
=======
    protected $attributeName;

    /**
     * @param PHPUnit_Framework_Constraint $constraint
     * @param string                       $attributeName
     */
    public function __construct(PHPUnit_Framework_Constraint $constraint, $attributeName)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        parent::__construct($constraint);

        $this->attributeName = $attributeName;
    }

    /**
<<<<<<< HEAD
     * Evaluates the constraint for parameter $other.
=======
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
     * @throws \PHPUnit\Framework\Exception
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function evaluate($other, string $description = '', bool $returnResult = false)
    {
        return parent::evaluate(
            Assert::readAttribute(
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
    {
        return parent::evaluate(
            PHPUnit_Framework_Assert::readAttribute(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $other,
                $this->attributeName
            ),
            $description,
            $returnResult
        );
    }

    /**
     * Returns a string representation of the constraint.
<<<<<<< HEAD
     */
    public function toString(): string
    {
        return 'attribute "' . $this->attributeName . '" ' . $this->innerConstraint()->toString();
    }

    /**
     * Returns the description of the failure.
=======
     *
     * @return string
     */
    public function toString()
    {
        return 'attribute "' . $this->attributeName . '" ' .
               $this->innerConstraint->toString();
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
        return $this->toString();
    }
}
