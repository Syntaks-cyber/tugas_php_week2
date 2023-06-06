<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class NamespaceCoverageNotPrivateTest extends TestCase
=======
class NamespaceCoverageNotPrivateTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @covers Foo\CoveredClass::<!private>
     */
    public function testSomething()
    {
        $o = new Foo\CoveredClass;
        $o->publicMethod();
    }
}
