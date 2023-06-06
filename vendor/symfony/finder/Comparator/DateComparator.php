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
 * DateCompare compiles date comparisons.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class DateComparator extends Comparator
{
    /**
<<<<<<< HEAD
=======
     * Constructor.
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string $test A comparison string
     *
     * @throws \InvalidArgumentException If the test is not understood
     */
<<<<<<< HEAD
    public function __construct(string $test)
=======
    public function __construct($test)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!preg_match('#^\s*(==|!=|[<>]=?|after|since|before|until)?\s*(.+?)\s*$#i', $test, $matches)) {
            throw new \InvalidArgumentException(sprintf('Don\'t understand "%s" as a date test.', $test));
        }

        try {
            $date = new \DateTime($matches[2]);
            $target = $date->format('U');
        } catch (\Exception $e) {
            throw new \InvalidArgumentException(sprintf('"%s" is not a valid date.', $matches[2]));
        }

<<<<<<< HEAD
        $operator = $matches[1] ?? '==';
=======
        $operator = isset($matches[1]) ? $matches[1] : '==';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        if ('since' === $operator || 'after' === $operator) {
            $operator = '>';
        }

        if ('until' === $operator || 'before' === $operator) {
            $operator = '<';
        }

<<<<<<< HEAD
        parent::__construct($target, $operator);
=======
        $this->setOperator($operator);
        $this->setTarget($target);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
