<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class NamespaceCoverageClassExtendedTest extends TestCase
=======
class NamespaceCoverageClassExtendedTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @covers Foo\CoveredClass<extended>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
