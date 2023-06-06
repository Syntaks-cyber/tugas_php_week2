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

use function strlen;
use function strpos;
use PHPUnit\Framework\InvalidArgumentException;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the string it is evaluated for begins with a
 * given prefix.
<<<<<<< HEAD
 */
final class StringStartsWith extends Constraint
=======
 *
 * @since Class available since Release 3.4.0
 */
class PHPUnit_Framework_Constraint_StringStartsWith extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private $prefix;

    public function __construct(string $prefix)
    {
        if (strlen($prefix) === 0) {
            throw InvalidArgumentException::create(1, 'non-empty string');
        }

        $this->prefix = $prefix;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'starts with "' . $this->prefix . '"';
=======
    protected $prefix;

    /**
     * @param string $prefix
     */
    public function __construct($prefix)
    {
        parent::__construct();
        $this->prefix = $prefix;
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
    {
        return strpos((string) $other, $this->prefix) === 0;
=======
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        return strpos($other, $this->prefix) === 0;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'starts with "' . $this->prefix . '"';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
