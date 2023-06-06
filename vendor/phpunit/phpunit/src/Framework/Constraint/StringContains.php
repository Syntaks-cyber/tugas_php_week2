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

use function mb_stripos;
use function mb_strpos;
use function mb_strtolower;
use function sprintf;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Constraint that asserts that the string it is evaluated for contains
 * a given string.
 *
<<<<<<< HEAD
 * Uses mb_strpos() to find the position of the string in the input, if not
 * found the evaluation fails.
 *
 * The sub-string is passed in the constructor.
 */
final class StringContains extends Constraint
=======
 * Uses strpos() to find the position of the string in the input, if not found
 * the evaluation fails.
 *
 * The sub-string is passed in the constructor.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Framework_Constraint_StringContains extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
<<<<<<< HEAD
    private $string;
=======
    protected $string;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
<<<<<<< HEAD
    private $ignoreCase;

    public function __construct(string $string, bool $ignoreCase = false)
    {
=======
    protected $ignoreCase;

    /**
     * @param string $string
     * @param bool   $ignoreCase
     */
    public function __construct($string, $ignoreCase = false)
    {
        parent::__construct();

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->string     = $string;
        $this->ignoreCase = $ignoreCase;
    }

    /**
<<<<<<< HEAD
     * Returns a string representation of the constraint.
     */
    public function toString(): string
    {
        if ($this->ignoreCase) {
            $string = mb_strtolower($this->string);
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
        if ($this->ignoreCase) {
            return stripos($other, $this->string) !== false;
        } else {
            return strpos($other, $this->string) !== false;
        }
    }

    /**
     * Returns a string representation of the constraint.
     *
     * @return string
     */
    public function toString()
    {
        if ($this->ignoreCase) {
            $string = strtolower($this->string);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        } else {
            $string = $this->string;
        }

        return sprintf(
            'contains "%s"',
            $string
        );
    }
<<<<<<< HEAD

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other value or object to evaluate
     */
    protected function matches($other): bool
    {
        if ('' === $this->string) {
            return true;
        }

        if ($this->ignoreCase) {
            return mb_stripos($other, $this->string) !== false;
        }

        return mb_strpos($other, $this->string) !== false;
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
