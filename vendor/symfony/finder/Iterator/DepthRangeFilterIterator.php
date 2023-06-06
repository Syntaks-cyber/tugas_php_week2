<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

/**
 * DepthRangeFilterIterator limits the directory depth.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @template-covariant TKey
 * @template-covariant TValue
 *
 * @extends \FilterIterator<TKey, TValue>
 */
class DepthRangeFilterIterator extends \FilterIterator
=======
 */
class DepthRangeFilterIterator extends FilterIterator
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    private $minDepth = 0;

    /**
<<<<<<< HEAD
     * @param \RecursiveIteratorIterator<\RecursiveIterator<TKey, TValue>> $iterator The Iterator to filter
     * @param int                                                          $minDepth The min depth
     * @param int                                                          $maxDepth The max depth
     */
    public function __construct(\RecursiveIteratorIterator $iterator, int $minDepth = 0, int $maxDepth = \PHP_INT_MAX)
    {
        $this->minDepth = $minDepth;
        $iterator->setMaxDepth(\PHP_INT_MAX === $maxDepth ? -1 : $maxDepth);
=======
     * Constructor.
     *
     * @param \RecursiveIteratorIterator $iterator The Iterator to filter
     * @param int                        $minDepth The min depth
     * @param int                        $maxDepth The max depth
     */
    public function __construct(\RecursiveIteratorIterator $iterator, $minDepth = 0, $maxDepth = PHP_INT_MAX)
    {
        $this->minDepth = $minDepth;
        $iterator->setMaxDepth(PHP_INT_MAX === $maxDepth ? -1 : $maxDepth);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        parent::__construct($iterator);
    }

    /**
     * Filters the iterator values.
     *
<<<<<<< HEAD
     * @return bool
     */
    #[\ReturnTypeWillChange]
=======
     * @return bool true if the value should be kept, false otherwise
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function accept()
    {
        return $this->getInnerIterator()->getDepth() >= $this->minDepth;
    }
}
