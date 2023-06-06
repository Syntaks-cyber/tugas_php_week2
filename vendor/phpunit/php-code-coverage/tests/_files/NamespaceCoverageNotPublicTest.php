<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class NamespaceCoverageNotPublicTest extends TestCase
=======
class NamespaceCoverageNotPublicTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @covers Foo\CoveredClass::<!public>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
