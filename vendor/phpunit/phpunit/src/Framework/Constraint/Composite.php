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
use PHPUnit\Framework\ExpectationFailedException;

/**
 * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
 *
 * @codeCoverageIgnore
 */
abstract class Composite extends Constraint
{
    /**
     * @var Constraint
     */
    private $innerConstraint;

    public function __construct(Constraint $innerConstraint)
    {
=======

/**
 * @since Class available since Release 3.1.0
 */
abstract class PHPUnit_Framework_Constraint_Composite extends PHPUnit_Framework_Constraint
{
    /**
     * @var PHPUnit_Framework_Constraint
     */
    protected $innerConstraint;

    /**
     * @param PHPUnit_Framework_Constraint $innerConstraint
     */
    public function __construct(PHPUnit_Framework_Constraint $innerConstraint)
    {
        parent::__construct();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->innerConstraint = $innerConstraint;
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
        try {
            return $this->innerConstraint->evaluate(
                $other,
                $description,
                $returnResult
            );
<<<<<<< HEAD
        } catch (ExpectationFailedException $e) {
            $this->fail($other, $description, $e->getComparisonFailure());
=======
        } catch (PHPUnit_Framework_ExpectationFailedException $e) {
            $this->fail($other, $description);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Counts the number of constraint elements.
<<<<<<< HEAD
     */
    public function count(): int
    {
        return count($this->innerConstraint);
    }

    protected function innerConstraint(): Constraint
    {
        return $this->innerConstraint;
    }
=======
     *
     * @return int
     */
    public function count()
    {
        return count($this->innerConstraint);
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
