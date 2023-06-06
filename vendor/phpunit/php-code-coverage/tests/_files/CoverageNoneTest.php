<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class CoverageNoneTest extends TestCase
=======
class CoverageNoneTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    public function testSomething()
    {
        $o = new CoveredClass;
        $o->publicMethod();
    }
}
