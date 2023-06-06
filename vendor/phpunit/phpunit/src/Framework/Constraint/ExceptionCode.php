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
use Throwable;

final class ExceptionCode extends Constraint
{
    /**
     * @var int|string
     */
    private $expectedCode;

    /**
     * @param int|string $expected
     */
    public function __construct($expected)
    {
        $this->expectedCode = $expected;
    }

    public function toString(): string
    {
        return 'exception code is ';
    }

=======

/**
 * @since Class available since Release 3.6.6
 */
class PHPUnit_Framework_Constraint_ExceptionCode extends PHPUnit_Framework_Constraint
{
    /**
     * @var int
     */
    protected $expectedCode;

    /**
     * @param int $expected
     */
    public function __construct($expected)
    {
        parent::__construct();
        $this->expectedCode = $expected;
    }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param Throwable $other
     */
    protected function matches($other): bool
    {
        return (string) $other->getCode() === (string) $this->expectedCode;
    }

    /**
     * Returns the description of the failure.
=======
     * @param Exception $other
     *
     * @return bool
     */
    protected function matches($other)
    {
        return (string) $other->getCode() == (string) $this->expectedCode;
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
        return sprintf(
            '%s is equal to expected exception code %s',
            $this->exporter()->export($other->getCode()),
            $this->exporter()->export($this->expectedCode)
        );
    }
=======
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
        return sprintf(
            '%s is equal to expected exception code %s',
            $this->exporter->export($other->getCode()),
            $this->exporter->export($this->expectedCode)
        );
    }

    /**
     * @return string
     */
    public function toString()
    {
        return 'exception code is ';
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
