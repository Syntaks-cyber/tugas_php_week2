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

use Symfony\Component\Finder\Comparator\NumberComparator;

/**
 * SizeRangeFilterIterator filters out files that are not in the given size range.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @extends \FilterIterator<string, \SplFileInfo>
 */
class SizeRangeFilterIterator extends \FilterIterator
{
    private $comparators = [];

    /**
     * @param \Iterator<string, \SplFileInfo> $iterator
     * @param NumberComparator[]              $comparators
=======
 */
class SizeRangeFilterIterator extends FilterIterator
{
    private $comparators = array();

    /**
     * Constructor.
     *
     * @param \Iterator          $iterator    The Iterator to filter
     * @param NumberComparator[] $comparators An array of NumberComparator instances
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function __construct(\Iterator $iterator, array $comparators)
    {
        $this->comparators = $comparators;

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
        if (!$fileinfo->isFile()) {
            return true;
        }

        $filesize = $fileinfo->getSize();
        foreach ($this->comparators as $compare) {
            if (!$compare->test($filesize)) {
                return false;
            }
        }

        return true;
    }
}
