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
 * @covers \SebastianBergmann\Environment\Runtime
 */
final class RuntimeTest extends TestCase
=======

namespace SebastianBergmann\Environment;

use PHPUnit_Framework_TestCase;

class RuntimeTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var \SebastianBergmann\Environment\Runtime
     */
    private $env;

<<<<<<< HEAD
    protected function setUp(): void
=======
    protected function setUp()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->env = new Runtime;
    }

    /**
<<<<<<< HEAD
     * @requires extension xdebug
     */
    public function testCanCollectCodeCoverageWhenXdebugExtensionIsEnabled(): void
    {
        $this->assertTrue($this->env->canCollectCodeCoverage());
    }

    /**
     * @requires extension pcov
     */
    public function testCanCollectCodeCoverageWhenPcovExtensionIsEnabled(): void
    {
        $this->assertTrue($this->env->canCollectCodeCoverage());
    }

    public function testCanCollectCodeCoverageWhenRunningOnPhpdbg(): void
    {
        $this->markTestSkippedWhenNotRunningOnPhpdbg();

        $this->assertTrue($this->env->canCollectCodeCoverage());
    }

    public function testBinaryCanBeRetrieved(): void
    {
        $this->assertNotEmpty($this->env->getBinary());
    }

    /**
     * @requires PHP
     */
    public function testIsHhvmReturnsFalseWhenRunningOnPhp(): void
    {
        $this->assertFalse($this->env->isHHVM());
    }

    /**
     * @requires PHP
     */
    public function testIsPhpReturnsTrueWhenRunningOnPhp(): void
    {
        $this->markTestSkippedWhenRunningOnPhpdbg();

        $this->assertTrue($this->env->isPHP());
    }

    /**
     * @requires extension pcov
     */
    public function testPCOVCanBeDetected(): void
    {
        $this->assertTrue($this->env->hasPCOV());
    }

    public function testPhpdbgCanBeDetected(): void
    {
        $this->markTestSkippedWhenNotRunningOnPhpdbg();

        $this->assertTrue($this->env->hasPHPDBGCodeCoverage());
    }

    /**
     * @requires extension xdebug
     */
    public function testXdebugCanBeDetected(): void
    {
        $this->markTestSkippedWhenRunningOnPhpdbg();

        $this->assertTrue($this->env->hasXdebug());
    }

    public function testNameAndVersionCanBeRetrieved(): void
    {
        $this->assertNotEmpty($this->env->getNameWithVersion());
    }

    public function testGetNameReturnsPhpdbgWhenRunningOnPhpdbg(): void
    {
        $this->markTestSkippedWhenNotRunningOnPhpdbg();

        $this->assertSame('PHPDBG', $this->env->getName());
    }

    /**
     * @requires PHP
     */
    public function testGetNameReturnsPhpdbgWhenRunningOnPhp(): void
    {
        $this->markTestSkippedWhenRunningOnPhpdbg();

        $this->assertSame('PHP', $this->env->getName());
    }

    public function testNameAndCodeCoverageDriverCanBeRetrieved(): void
    {
        $this->assertNotEmpty($this->env->getNameWithVersionAndCodeCoverageDriver());
    }

    /**
     * @requires PHP
     */
    public function testGetVersionReturnsPhpVersionWhenRunningPhp(): void
    {
        $this->assertSame(\PHP_VERSION, $this->env->getVersion());
    }

    /**
     * @requires PHP
     */
    public function testGetVendorUrlReturnsPhpDotNetWhenRunningPhp(): void
    {
        $this->assertSame('https://secure.php.net/', $this->env->getVendorUrl());
    }

    private function markTestSkippedWhenNotRunningOnPhpdbg(): void
    {
        if ($this->isRunningOnPhpdbg()) {
            return;
        }

        $this->markTestSkipped('PHPDBG is required.');
    }

    private function markTestSkippedWhenRunningOnPhpdbg(): void
    {
        if (!$this->isRunningOnPhpdbg()) {
            return;
        }

        $this->markTestSkipped('Cannot run on PHPDBG');
    }

    private function isRunningOnPhpdbg(): bool
    {
        return \PHP_SAPI === 'phpdbg';
=======
     * @covers \SebastianBergmann\Environment\Runtime::canCollectCodeCoverage
     * @uses   \SebastianBergmann\Environment\Runtime::hasXdebug
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     * @uses   \SebastianBergmann\Environment\Runtime::isPHP
     */
    public function testAbilityToCollectCodeCoverageCanBeAssessed()
    {
        $this->assertInternalType('boolean', $this->env->canCollectCodeCoverage());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::getBinary
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testBinaryCanBeRetrieved()
    {
        $this->assertInternalType('string', $this->env->getBinary());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testCanBeDetected()
    {
        $this->assertInternalType('boolean', $this->env->isHHVM());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::isPHP
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testCanBeDetected2()
    {
        $this->assertInternalType('boolean', $this->env->isPHP());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::hasXdebug
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     * @uses   \SebastianBergmann\Environment\Runtime::isPHP
     */
    public function testXdebugCanBeDetected()
    {
        $this->assertInternalType('boolean', $this->env->hasXdebug());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::getNameWithVersion
     * @uses   \SebastianBergmann\Environment\Runtime::getName
     * @uses   \SebastianBergmann\Environment\Runtime::getVersion
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     * @uses   \SebastianBergmann\Environment\Runtime::isPHP
     */
    public function testNameAndVersionCanBeRetrieved()
    {
        $this->assertInternalType('string', $this->env->getNameWithVersion());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::getName
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testNameCanBeRetrieved()
    {
        $this->assertInternalType('string', $this->env->getName());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::getVersion
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testVersionCanBeRetrieved()
    {
        $this->assertInternalType('string', $this->env->getVersion());
    }

    /**
     * @covers \SebastianBergmann\Environment\Runtime::getVendorUrl
     * @uses   \SebastianBergmann\Environment\Runtime::isHHVM
     */
    public function testVendorUrlCanBeRetrieved()
    {
        $this->assertInternalType('string', $this->env->getVendorUrl());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
