<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of sebastian/environment.
=======
<?php
/*
 * This file is part of the Environment package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace SebastianBergmann\Environment;

use PHPUnit\Framework\TestCase;

/**
 * @covers \SebastianBergmann\Environment\Console
 */
final class ConsoleTest extends TestCase
=======

namespace SebastianBergmann\Environment;

use PHPUnit_Framework_TestCase;

class ConsoleTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var \SebastianBergmann\Environment\Console
     */
    private $console;

<<<<<<< HEAD
    protected function setUp(): void
=======
    protected function setUp()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->console = new Console;
    }

    /**
<<<<<<< HEAD
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectIfStdoutIsInteractiveByDefault(): void
    {
        $this->assertIsBool($this->console->isInteractive());
    }

    /**
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectIfFileDescriptorIsInteractive(): void
    {
        $this->assertIsBool($this->console->isInteractive(\STDOUT));
    }

    /**
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectColorSupport(): void
    {
        $this->assertIsBool($this->console->hasColorSupport());
    }

    /**
     * @todo Now that this component is PHP 7-only and uses return type declarations
     * this test makes even less sense than before
     */
    public function testCanDetectNumberOfColumns(): void
    {
        $this->assertIsInt($this->console->getNumberOfColumns());
=======
     * @covers \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectIfStdoutIsInteractiveByDefault()
    {
        $this->assertInternalType('boolean', $this->console->isInteractive());
    }

    /**
     * @covers \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectIfFileDescriptorIsInteractive()
    {
        $this->assertInternalType('boolean', $this->console->isInteractive(STDOUT));
    }

    /**
     * @covers \SebastianBergmann\Environment\Console::hasColorSupport
     * @uses   \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectColorSupport()
    {
        $this->assertInternalType('boolean', $this->console->hasColorSupport());
    }

    /**
     * @covers \SebastianBergmann\Environment\Console::getNumberOfColumns
     * @uses   \SebastianBergmann\Environment\Console::isInteractive
     */
    public function testCanDetectNumberOfColumns()
    {
        $this->assertInternalType('integer', $this->console->getNumberOfColumns());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
