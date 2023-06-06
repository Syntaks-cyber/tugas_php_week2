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

final class SameSize extends Count
{
    public function __construct(iterable $expected)
=======

/**
 * @since Class available since Release 3.6.0
 */
class PHPUnit_Framework_Constraint_SameSize extends PHPUnit_Framework_Constraint_Count
{
    /**
     * @var int
     */
    protected $expectedCount;

    /**
     * @param int $expected
     */
    public function __construct($expected)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        parent::__construct($this->getCountOf($expected));
    }
}
