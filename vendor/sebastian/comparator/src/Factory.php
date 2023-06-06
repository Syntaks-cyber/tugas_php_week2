<?php
/*
<<<<<<< HEAD
 * This file is part of sebastian/comparator.
=======
 * This file is part of the Comparator package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
namespace SebastianBergmann\Comparator;

/**
 * Factory for comparators which compare values for equality.
 */
class Factory
{
    /**
<<<<<<< HEAD
=======
     * @var Comparator[]
     */
    private $comparators = array();

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @var Factory
     */
    private static $instance;

    /**
<<<<<<< HEAD
     * @var Comparator[]
     */
    private $customComparators = [];

    /**
     * @var Comparator[]
     */
    private $defaultComparators = [];
=======
     * Constructs a new factory.
     */
    public function __construct()
    {
        $this->register(new TypeComparator);
        $this->register(new ScalarComparator);
        $this->register(new NumericComparator);
        $this->register(new DoubleComparator);
        $this->register(new ArrayComparator);
        $this->register(new ResourceComparator);
        $this->register(new ObjectComparator);
        $this->register(new ExceptionComparator);
        $this->register(new SplObjectStorageComparator);
        $this->register(new DOMNodeComparator);
        $this->register(new MockObjectComparator);
        $this->register(new DateTimeComparator);
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @return Factory
     */
    public static function getInstance()
    {
        if (self::$instance === null) {
            self::$instance = new self;
        }

        return self::$instance;
    }

    /**
<<<<<<< HEAD
     * Constructs a new factory.
     */
    public function __construct()
    {
        $this->registerDefaultComparators();
    }

    /**
     * Returns the correct comparator for comparing two values.
     *
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
=======
     * Returns the correct comparator for comparing two values.
     *
     * @param  mixed      $expected The first value to compare
     * @param  mixed      $actual   The second value to compare
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return Comparator
     */
    public function getComparatorFor($expected, $actual)
    {
<<<<<<< HEAD
        foreach ($this->customComparators as $comparator) {
            if ($comparator->accepts($expected, $actual)) {
                return $comparator;
            }
        }

        foreach ($this->defaultComparators as $comparator) {
=======
        foreach ($this->comparators as $comparator) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($comparator->accepts($expected, $actual)) {
                return $comparator;
            }
        }
    }

    /**
     * Registers a new comparator.
     *
<<<<<<< HEAD
     * This comparator will be returned by getComparatorFor() if its accept() method
     * returns TRUE for the compared values. It has higher priority than the
     * existing comparators, meaning that its accept() method will be invoked
     * before those of the other comparators.
     *
     * @param Comparator $comparator The comparator to be registered
     */
    public function register(Comparator $comparator)
    {
        \array_unshift($this->customComparators, $comparator);
=======
     * This comparator will be returned by getInstance() if its accept() method
     * returns TRUE for the compared values. It has higher priority than the
     * existing comparators, meaning that its accept() method will be tested
     * before those of the other comparators.
     *
     * @param Comparator $comparator The registered comparator
     */
    public function register(Comparator $comparator)
    {
        array_unshift($this->comparators, $comparator);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $comparator->setFactory($this);
    }

    /**
     * Unregisters a comparator.
     *
<<<<<<< HEAD
     * This comparator will no longer be considered by getComparatorFor().
     *
     * @param Comparator $comparator The comparator to be unregistered
     */
    public function unregister(Comparator $comparator)
    {
        foreach ($this->customComparators as $key => $_comparator) {
            if ($comparator === $_comparator) {
                unset($this->customComparators[$key]);
            }
        }
    }

    /**
     * Unregisters all non-default comparators.
     */
    public function reset()
    {
        $this->customComparators = [];
    }

    private function registerDefaultComparators()
    {
        $this->registerDefaultComparator(new MockObjectComparator);
        $this->registerDefaultComparator(new DateTimeComparator);
        $this->registerDefaultComparator(new DOMNodeComparator);
        $this->registerDefaultComparator(new SplObjectStorageComparator);
        $this->registerDefaultComparator(new ExceptionComparator);
        $this->registerDefaultComparator(new ObjectComparator);
        $this->registerDefaultComparator(new ResourceComparator);
        $this->registerDefaultComparator(new ArrayComparator);
        $this->registerDefaultComparator(new NumericComparator);
        $this->registerDefaultComparator(new ScalarComparator);
        $this->registerDefaultComparator(new TypeComparator);
    }

    private function registerDefaultComparator(Comparator $comparator)
    {
        $this->defaultComparators[] = $comparator;

        $comparator->setFactory($this);
    }
=======
     * This comparator will no longer be returned by getInstance().
     *
     * @param Comparator $comparator The unregistered comparator
     */
    public function unregister(Comparator $comparator)
    {
        foreach ($this->comparators as $key => $_comparator) {
            if ($comparator === $_comparator) {
                unset($this->comparators[$key]);
            }
        }
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
