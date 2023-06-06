<?php
<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class CoverageFunctionParenthesesWhitespaceTest extends TestCase
=======
class CoverageFunctionParenthesesWhitespaceTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @covers ::globalFunction ( )
     */
    public function testSomething()
    {
        globalFunction();
    }
}
