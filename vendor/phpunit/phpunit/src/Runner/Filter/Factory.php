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
namespace PHPUnit\Runner\Filter;

use function sprintf;
use FilterIterator;
use InvalidArgumentException;
use Iterator;
use PHPUnit\Framework\TestSuite;
use RecursiveFilterIterator;
use ReflectionClass;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Factory
=======

/**
 * @since Class available since Release 4.0.0
 */
class PHPUnit_Runner_Filter_Factory
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var array
     */
<<<<<<< HEAD
    private $filters = [];

    /**
     * @throws InvalidArgumentException
     */
    public function addFilter(ReflectionClass $filter, $args): void
    {
        if (!$filter->isSubclassOf(RecursiveFilterIterator::class)) {
=======
    private $filters = array();

    /**
     * @param ReflectionClass $filter
     * @param mixed           $args
     */
    public function addFilter(ReflectionClass $filter, $args)
    {
        if (!$filter->isSubclassOf('RecursiveFilterIterator')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new InvalidArgumentException(
                sprintf(
                    'Class "%s" does not extend RecursiveFilterIterator',
                    $filter->name
                )
            );
        }

<<<<<<< HEAD
        $this->filters[] = [$filter, $args];
    }

    public function factory(Iterator $iterator, TestSuite $suite): FilterIterator
    {
        foreach ($this->filters as $filter) {
            [$class, $args] = $filter;
            $iterator       = $class->newInstance($iterator, $args, $suite);
=======
        $this->filters[] = array($filter, $args);
    }

    /**
     * @return FilterIterator
     */
    public function factory(Iterator $iterator, PHPUnit_Framework_TestSuite $suite)
    {
        foreach ($this->filters as $filter) {
            list($class, $args) = $filter;
            $iterator           = $class->newInstance($iterator, $args, $suite);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $iterator;
    }
}
