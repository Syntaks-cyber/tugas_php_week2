<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Comparator;

/**
<<<<<<< HEAD
=======
 * Comparator.
 *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * @author Fabien Potencier <fabien@symfony.com>
 */
class Comparator
{
    private $target;
    private $operator = '==';

<<<<<<< HEAD
    public function __construct(string $target = null, string $operator = '==')
    {
        if (null === $target) {
            trigger_deprecation('symfony/finder', '5.4', 'Constructing a "%s" without setting "$target" is deprecated.', __CLASS__);
        }

        $this->target = $target;
        $this->doSetOperator($operator);
    }

    /**
     * Gets the target value.
     *
     * @return string
     */
    public function getTarget()
    {
        if (null === $this->target) {
            trigger_deprecation('symfony/finder', '5.4', 'Calling "%s" without initializing the target is deprecated.', __METHOD__);
        }

=======
    /**
     * Gets the target value.
     *
     * @return string The target value
     */
    public function getTarget()
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this->target;
    }

    /**
<<<<<<< HEAD
     * @deprecated set the target via the constructor instead
     */
    public function setTarget(string $target)
    {
        trigger_deprecation('symfony/finder', '5.4', '"%s" is deprecated. Set the target via the constructor instead.', __METHOD__);

=======
     * Sets the target value.
     *
     * @param string $target The target value
     */
    public function setTarget($target)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->target = $target;
    }

    /**
     * Gets the comparison operator.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The operator
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getOperator()
    {
        return $this->operator;
    }

    /**
     * Sets the comparison operator.
     *
<<<<<<< HEAD
     * @throws \InvalidArgumentException
     *
     * @deprecated set the operator via the constructor instead
     */
    public function setOperator(string $operator)
    {
        trigger_deprecation('symfony/finder', '5.4', '"%s" is deprecated. Set the operator via the constructor instead.', __METHOD__);

        $this->doSetOperator('' === $operator ? '==' : $operator);
=======
     * @param string $operator A valid operator
     *
     * @throws \InvalidArgumentException
     */
    public function setOperator($operator)
    {
        if (!$operator) {
            $operator = '==';
        }

        if (!in_array($operator, array('>', '<', '>=', '<=', '==', '!='))) {
            throw new \InvalidArgumentException(sprintf('Invalid operator "%s".', $operator));
        }

        $this->operator = $operator;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Tests against the target.
     *
     * @param mixed $test A test value
     *
     * @return bool
     */
    public function test($test)
    {
<<<<<<< HEAD
        if (null === $this->target) {
            trigger_deprecation('symfony/finder', '5.4', 'Calling "%s" without initializing the target is deprecated.', __METHOD__);
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        switch ($this->operator) {
            case '>':
                return $test > $this->target;
            case '>=':
                return $test >= $this->target;
            case '<':
                return $test < $this->target;
            case '<=':
                return $test <= $this->target;
            case '!=':
                return $test != $this->target;
        }

        return $test == $this->target;
    }
<<<<<<< HEAD

    private function doSetOperator(string $operator): void
    {
        if (!\in_array($operator, ['>', '<', '>=', '<=', '==', '!='])) {
            throw new \InvalidArgumentException(sprintf('Invalid operator "%s".', $operator));
        }

        $this->operator = $operator;
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
