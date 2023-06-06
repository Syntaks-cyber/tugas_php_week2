<?php
/*
<<<<<<< HEAD
 * This file is part of php-token-stream.
=======
 * This file is part of the PHP_TokenStream package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
use PHPUnit\Framework\TestCase;

class PHP_Token_FunctionTest extends TestCase
{
    /**
     * @var PHP_Token_FUNCTION[]
     */
    private $functions;

    protected function setUp()
    {
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'source.php') as $token) {
=======
/**
 * Tests for the PHP_Token_FUNCTION class.
 *
 * @package    PHP_TokenStream
 * @subpackage Tests
 * @author     Sebastian Bergmann <sebastian@phpunit.de>
 * @copyright  Sebastian Bergmann <sebastian@phpunit.de>
 * @license    http://www.opensource.org/licenses/BSD-3-Clause  The BSD 3-Clause License
 * @version    Release: @package_version@
 * @link       http://github.com/sebastianbergmann/php-token-stream/
 * @since      Class available since Release 1.0.0
 */
class PHP_Token_FunctionTest extends PHPUnit_Framework_TestCase
{
    protected $functions;

    protected function setUp()
    {
        $ts = new PHP_Token_Stream(TEST_FILES_PATH . 'source.php');

        foreach ($ts as $token) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            if ($token instanceof PHP_Token_FUNCTION) {
                $this->functions[] = $token;
            }
        }
    }

<<<<<<< HEAD
    public function testGetArguments()
    {
        $this->assertEquals([], $this->functions[0]->getArguments());

        $this->assertEquals(
            ['$baz' => 'Baz'], $this->functions[1]->getArguments()
        );

        $this->assertEquals(
            ['$foobar' => 'Foobar'], $this->functions[2]->getArguments()
        );

        $this->assertEquals(
            ['$barfoo' => 'Barfoo'], $this->functions[3]->getArguments()
        );

        $this->assertEquals([], $this->functions[4]->getArguments());

        $this->assertEquals(['$x' => null, '$y' => null], $this->functions[5]->getArguments());
    }

=======
    /**
     * @covers PHP_Token_FUNCTION::getArguments
     */
    public function testGetArguments()
    {
        $this->assertEquals(array(), $this->functions[0]->getArguments());

        $this->assertEquals(
          array('$baz' => 'Baz'), $this->functions[1]->getArguments()
        );

        $this->assertEquals(
          array('$foobar' => 'Foobar'), $this->functions[2]->getArguments()
        );

        $this->assertEquals(
          array('$barfoo' => 'Barfoo'), $this->functions[3]->getArguments()
        );

        $this->assertEquals(array(), $this->functions[4]->getArguments());

        $this->assertEquals(array('$x' => null, '$y' => null), $this->functions[5]->getArguments());
    }

    /**
     * @covers PHP_Token_FUNCTION::getName
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function testGetName()
    {
        $this->assertEquals('foo', $this->functions[0]->getName());
        $this->assertEquals('bar', $this->functions[1]->getName());
        $this->assertEquals('foobar', $this->functions[2]->getName());
        $this->assertEquals('barfoo', $this->functions[3]->getName());
        $this->assertEquals('baz', $this->functions[4]->getName());
    }

<<<<<<< HEAD
=======
    /**
     * @covers PHP_Token::getLine
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function testGetLine()
    {
        $this->assertEquals(5, $this->functions[0]->getLine());
        $this->assertEquals(10, $this->functions[1]->getLine());
        $this->assertEquals(17, $this->functions[2]->getLine());
        $this->assertEquals(21, $this->functions[3]->getLine());
        $this->assertEquals(29, $this->functions[4]->getLine());
<<<<<<< HEAD
        $this->assertEquals(37, $this->functions[6]->getLine());
    }

=======
    }

    /**
     * @covers PHP_TokenWithScope::getEndLine
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function testGetEndLine()
    {
        $this->assertEquals(5, $this->functions[0]->getEndLine());
        $this->assertEquals(12, $this->functions[1]->getEndLine());
        $this->assertEquals(19, $this->functions[2]->getEndLine());
        $this->assertEquals(23, $this->functions[3]->getEndLine());
        $this->assertEquals(31, $this->functions[4]->getEndLine());
<<<<<<< HEAD
        $this->assertEquals(41, $this->functions[6]->getEndLine());
    }

=======
    }

    /**
     * @covers PHP_Token_FUNCTION::getDocblock
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function testGetDocblock()
    {
        $this->assertNull($this->functions[0]->getDocblock());

        $this->assertEquals(
<<<<<<< HEAD
            "/**\n     * @param Baz \$baz\n     */",
            $this->functions[1]->getDocblock()
        );

        $this->assertEquals(
            "/**\n     * @param Foobar \$foobar\n     */",
            $this->functions[2]->getDocblock()
=======
          "/**\n     * @param Baz \$baz\n     */",
          $this->functions[1]->getDocblock()
        );

        $this->assertEquals(
          "/**\n     * @param Foobar \$foobar\n     */",
          $this->functions[2]->getDocblock()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );

        $this->assertNull($this->functions[3]->getDocblock());
        $this->assertNull($this->functions[4]->getDocblock());
    }

    public function testSignature()
    {
<<<<<<< HEAD
        $tokens     = new PHP_Token_Stream(TEST_FILES_PATH . 'source5.php');
        $functions  = $tokens->getFunctions();
        $classes    = $tokens->getClasses();
        $interfaces = $tokens->getInterfaces();

        $this->assertEquals(
            'foo($a, array $b, array $c = array())',
            $functions['foo']['signature']
        );

        $this->assertEquals(
            'm($a, array $b, array $c = array())',
            $classes['c']['methods']['m']['signature']
        );

        $this->assertEquals(
            'm($a, array $b, array $c = array())',
            $classes['a']['methods']['m']['signature']
        );

        $this->assertEquals(
            'm($a, array $b, array $c = array())',
            $interfaces['i']['methods']['m']['signature']
=======
        $ts = new PHP_Token_Stream(TEST_FILES_PATH . 'source5.php');
        $f  = $ts->getFunctions();
        $c  = $ts->getClasses();
        $i  = $ts->getInterfaces();

        $this->assertEquals(
          'foo($a, array $b, array $c = array())',
          $f['foo']['signature']
        );

        $this->assertEquals(
          'm($a, array $b, array $c = array())',
          $c['c']['methods']['m']['signature']
        );

        $this->assertEquals(
          'm($a, array $b, array $c = array())',
          $c['a']['methods']['m']['signature']
        );

        $this->assertEquals(
          'm($a, array $b, array $c = array())',
          $i['i']['methods']['m']['signature']
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        );
    }
}
