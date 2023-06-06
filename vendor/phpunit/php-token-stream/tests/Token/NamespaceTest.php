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

class PHP_Token_NamespaceTest extends TestCase
{
=======
/**
 * Tests for the PHP_Token_NAMESPACE class.
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
class PHP_Token_NamespaceTest extends PHPUnit_Framework_TestCase
{
    /**
     * @covers PHP_Token_NAMESPACE::getName
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function testGetName()
    {
        $tokenStream = new PHP_Token_Stream(
          TEST_FILES_PATH . 'classInNamespace.php'
        );

        foreach ($tokenStream as $token) {
            if ($token instanceof PHP_Token_NAMESPACE) {
                $this->assertSame('Foo\\Bar', $token->getName());
            }
        }
    }

    public function testGetStartLineWithUnscopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php') as $token) {
            if ($token instanceof PHP_Token_NAMESPACE) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php');
        foreach($tokenStream as $token) {
            if($token instanceOf PHP_Token_NAMESPACE) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->assertSame(2, $token->getLine());
            }
        }
    }

    public function testGetEndLineWithUnscopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php') as $token) {
            if ($token instanceof PHP_Token_NAMESPACE) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInNamespace.php');
        foreach($tokenStream as $token) {
            if($token instanceOf PHP_Token_NAMESPACE) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->assertSame(2, $token->getEndLine());
            }
        }
    }
    public function testGetStartLineWithScopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php') as $token) {
            if ($token instanceof PHP_Token_NAMESPACE) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php');
        foreach($tokenStream as $token) {
            if($token instanceOf PHP_Token_NAMESPACE) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->assertSame(2, $token->getLine());
            }
        }
    }

    public function testGetEndLineWithScopedNamespace()
    {
<<<<<<< HEAD
        foreach (new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php') as $token) {
            if ($token instanceof PHP_Token_NAMESPACE) {
=======
        $tokenStream = new PHP_Token_Stream(TEST_FILES_PATH . 'classInScopedNamespace.php');
        foreach($tokenStream as $token) {
            if($token instanceOf PHP_Token_NAMESPACE) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $this->assertSame(8, $token->getEndLine());
            }
        }
    }
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
