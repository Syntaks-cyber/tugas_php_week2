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

use PHPUnit\Framework\ExpectationFailedException;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the Traversable it is applied to contains
 * only values of a given type.
<<<<<<< HEAD
 */
final class TraversableContainsOnly extends Constraint
{
    /**
     * @var Constraint
     */
    private $constraint;
=======
 *
 * @since Class available since Release 3.1.4
 */
class PHPUnit_Framework_Constraint_TraversableContainsOnly extends PHPUnit_Framework_Constraint
{
    /**
     * @var PHPUnit_Framework_Constraint
     */
    protected $constraint;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var string
     */
<<<<<<< HEAD
    private $type;

    /**
     * @throws \PHPUnit\Framework\Exception
     */
    public function __construct(string $type, bool $isNativeType = true)
    {
        if ($isNativeType) {
            $this->constraint = new IsType($type);
        } else {
            $this->constraint = new IsInstanceOf(
=======
    protected $type;

    /**
     * @param string $type
     * @param bool   $isNativeType
     */
    public function __construct($type, $isNativeType = true)
    {
        parent::__construct();

        if ($isNativeType) {
            $this->constraint = new PHPUnit_Framework_Constraint_IsType($type);
        } else {
            $this->constraint = new PHPUnit_Framework_Constraint_IsInstanceOf(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $type
            );
        }

        $this->type = $type;
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
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public function evaluate($other, string $description = '', bool $returnResult = false)
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
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $success = true;

        foreach ($other as $item) {
            if (!$this->constraint->evaluate($item, '', true)) {
                $success = false;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                break;
            }
        }

        if ($returnResult) {
            return $success;
        }

        if (!$success) {
            $this->fail($other, $description);
        }
    }

    /**
     * Returns a string representation of the constraint.
<<<<<<< HEAD
     */
    public function toString(): string
=======
     *
     * @return string
     */
    public function toString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'contains only values of type "' . $this->type . '"';
    }
}
