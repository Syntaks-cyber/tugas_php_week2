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
use function substr;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the string it is evaluated for ends with a given
 * suffix.
<<<<<<< HEAD
 */
final class StringEndsWith extends Constraint
=======
 *
 * @since Class available since Release 3.4.0
 */
class PHPUnit_Framework_Constraint_StringEndsWith extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private $suffix;

    public function __construct(string $suffix)
    {
        $this->suffix = $suffix;
    }

    /**
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        return 'ends with "' . $this->suffix . '"';
=======
    protected $suffix;

    /**
     * @param string $suffix
     */
    public function __construct($suffix)
    {
        parent::__construct();
        $this->suffix = $suffix;
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
        return substr($other, 0 - strlen($this->suffix)) === $this->suffix;
=======
     * @param mixed $other Value or object to evaluate.
     *
     * @return bool
     */
    protected function matches($other)
    {
        return substr($other, 0 - strlen($this->suffix)) == $this->suffix;
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        return 'ends with "' . $this->suffix . '"';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
