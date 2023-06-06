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
use function is_array;
use function iterator_count;
use function sprintf;
use Countable;
use EmptyIterator;
use Generator;
use Iterator;
use IteratorAggregate;
use Traversable;

class Count extends Constraint
=======

/**
 * @since Class available since Release 3.6.0
 */
class PHPUnit_Framework_Constraint_Count extends PHPUnit_Framework_Constraint
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var int
     */
<<<<<<< HEAD
    private $expectedCount;

    public function __construct(int $expected)
    {
        $this->expectedCount = $expected;
    }

    public function toString(): string
    {
        return sprintf(
            'count matches %d',
            $this->expectedCount
        );
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     */
    protected function matches($other): bool
=======
    protected $expectedCount = 0;

    /**
     * @param int $expected
     */
    public function __construct($expected)
    {
        parent::__construct();
        $this->expectedCount = $expected;
    }

    /**
     * Evaluates the constraint for parameter $other. Returns true if the
     * constraint is met, false otherwise.
     *
     * @param mixed $other
     *
     * @return bool
     */
    protected function matches($other)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->expectedCount === $this->getCountOf($other);
    }

    /**
<<<<<<< HEAD
     * @param iterable $other
     */
    protected function getCountOf($other): ?int
    {
        if ($other instanceof Countable || is_array($other)) {
            return count($other);
        }

        if ($other instanceof EmptyIterator) {
            return 0;
        }

        if ($other instanceof Traversable) {
            while ($other instanceof IteratorAggregate) {
                $other = $other->getIterator();
            }

            $iterator = $other;

            if ($iterator instanceof Generator) {
                return $this->getCountOfGenerator($iterator);
            }

            if (!$iterator instanceof Iterator) {
                return iterator_count($iterator);
=======
     * @param mixed $other
     *
     * @return bool
     */
    protected function getCountOf($other)
    {
        if ($other instanceof Countable || is_array($other)) {
            return count($other);
        } elseif ($other instanceof Traversable) {
            if ($other instanceof IteratorAggregate) {
                $iterator = $other->getIterator();
            } else {
                $iterator = $other;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }

            $key   = $iterator->key();
            $count = iterator_count($iterator);

<<<<<<< HEAD
            // Manually rewind $iterator to previous key, since iterator_count
            // moves pointer.
            if ($key !== null) {
                $iterator->rewind();

=======
            // manually rewind $iterator to previous key, since iterator_count
            // moves pointer
            if ($key !== null) {
                $iterator->rewind();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                while ($iterator->valid() && $key !== $iterator->key()) {
                    $iterator->next();
                }
            }

            return $count;
        }
<<<<<<< HEAD

        return null;
    }

    /**
     * Returns the total number of iterations from a generator.
     * This will fully exhaust the generator.
     */
    protected function getCountOfGenerator(Generator $generator): int
    {
        for ($count = 0; $generator->valid(); $generator->next()) {
            $count++;
        }

        return $count;
    }

    /**
     * Returns the description of the failure.
=======
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
        return sprintf(
            'actual size %d matches expected size %d',
            $this->getCountOf($other),
            $this->expectedCount
        );
    }
<<<<<<< HEAD
=======

    /**
     * @return string
     */
    public function toString()
    {
        return sprintf(
            'count matches %d',
            $this->expectedCount
        );
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
