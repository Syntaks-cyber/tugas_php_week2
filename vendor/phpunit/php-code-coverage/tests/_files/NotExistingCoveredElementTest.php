<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class NotExistingCoveredElementTest extends TestCase
=======
class NotExistingCoveredElementTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @covers NotExistingClass
     */
    public function testOne()
    {
    }

    /**
     * @covers NotExistingClass::notExistingMethod
     */
    public function testTwo()
    {
    }

    /**
     * @covers NotExistingClass::<public>
     */
    public function testThree()
    {
    }
}
