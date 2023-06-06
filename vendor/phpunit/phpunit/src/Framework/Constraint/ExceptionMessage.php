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
use function strpos;
use Throwable;

final class ExceptionMessage extends Constraint
{
    /**
     * @var string
     */
    private $expectedMessage;

    public function __construct(string $expected)
    {
        $this->expectedMessage = $expected;
    }

    public function toString(): string
    {
        if ($this->expectedMessage === '') {
            return 'exception message is empty';
        }

        return 'exception message contains ';
    }

=======

/**
 * @since Class available since Release 3.6.6
 */
class PHPUnit_Framework_Constraint_ExceptionMessage extends PHPUnit_Framework_Constraint
{
    /**
     * @var int
     */
    protected $expectedMessage;

    /**
     * @param string $expected
     */
    public function __construct($expected)
    {
        parent::__construct();
        $this->expectedMessage = $expected;
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
        if ($this->expectedMessage === '') {
            return $other->getMessage() === '';
        }

        return strpos((string) $other->getMessage(), $this->expectedMessage) !== false;
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
        return strpos($other->getMessage(), $this->expectedMessage) !== false;
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
    {
        if ($this->expectedMessage === '') {
            return sprintf(
                "exception message is empty but is '%s'",
                $other->getMessage()
            );
        }

=======
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return sprintf(
            "exception message '%s' contains '%s'",
            $other->getMessage(),
            $this->expectedMessage
        );
    }
<<<<<<< HEAD
=======

    /**
     * @return string
     */
    public function toString()
    {
        return 'exception message contains ';
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
