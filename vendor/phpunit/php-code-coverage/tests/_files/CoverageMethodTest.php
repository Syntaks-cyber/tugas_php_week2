<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class CoverageMethodTest extends TestCase
=======
class CoverageMethodTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @covers CoveredClass::publicMethod
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
