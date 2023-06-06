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
 * CustomFilterIterator filters files by applying anonymous functions.
 *
 * The anonymous function receives a \SplFileInfo and must return false
 * to remove files.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @extends \FilterIterator<string, \SplFileInfo>
 */
class CustomFilterIterator extends \FilterIterator
{
    private $filters = [];

    /**
     * @param \Iterator<string, \SplFileInfo> $iterator The Iterator to filter
     * @param callable[]                      $filters  An array of PHP callbacks
=======
 */
class CustomFilterIterator extends FilterIterator
{
    private $filters = array();

    /**
     * Constructor.
     *
     * @param \Iterator  $iterator The Iterator to filter
     * @param callable[] $filters  An array of PHP callbacks
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @throws \InvalidArgumentException
     */
    public function __construct(\Iterator $iterator, array $filters)
    {
        foreach ($filters as $filter) {
<<<<<<< HEAD
            if (!\is_callable($filter)) {
=======
            if (!is_callable($filter)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                throw new \InvalidArgumentException('Invalid PHP callback.');
            }
        }
        $this->filters = $filters;

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
        $fileinfo = $this->current();

        foreach ($this->filters as $filter) {
<<<<<<< HEAD
            if (false === $filter($fileinfo)) {
=======
            if (false === call_user_func($filter, $fileinfo)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                return false;
            }
        }

        return true;
    }
}
