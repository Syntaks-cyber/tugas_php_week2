<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class CoverageNotProtectedTest extends TestCase
=======
class CoverageNotProtectedTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @covers CoveredClass::<!protected>
     */
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
