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

use function get_class;
use function sprintf;
use PHPUnit\Util\Filter;
use Throwable;

final class Exception extends Constraint
=======

/**
 * @since Class available since Release 3.6.6
 */
class PHPUnit_Framework_Constraint_Exception extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private $className;

    public function __construct(string $className)
    {
        $this->className = $className;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return sprintf(
            'exception of type "%s"',
            $this->className
        );
=======
    protected $className;

    /**
     * @param string $className
     */
    public function __construct($className)
    {
        parent::__construct();
        $this->className = $className;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
<<<<<<< HEAD
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
=======
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $other instanceof $this->className;
    }

    /**
<<<<<<< HEAD
     * Returns the description of the failure.
=======
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
        if ($other !== null) {
            $message = '';

            if ($other instanceof Throwable) {
                $message = '. Message was: "' . $other->getMessage() . '" at'
                    . "\n" . Filter::getFilteredStacktrace($other);
=======
     * @param mixed $other Evaluated value or object.
     *
     * @return string
     */
    protected function failureDescription($other)
    {
        if ($other !== null) {
            $message = '';
            if ($other instanceof Exception) {
                $message = '. Message was: "' . $other->getMessage() . '" at'
                        . "\n" . $other->getTraceAsString();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            return sprintf(
                'exception of type "%s" matches expected exception "%s"%s',
                get_class($other),
                $this->className,
                $message
            );
        }

        return sprintf(
            'exception of type "%s" is thrown',
            $this->className
        );
    }
<<<<<<< HEAD
=======

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return sprintf(
            'exception of type "%s"',
            $this->className
        );
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
