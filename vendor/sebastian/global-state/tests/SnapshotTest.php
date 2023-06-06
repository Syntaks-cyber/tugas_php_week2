<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of sebastian/global-state.
=======
<?php
/*
 * This file is part of the GlobalState package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace SebastianBergmann\GlobalState;

use PHPUnit\Framework\TestCase;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface;
use SebastianBergmann\GlobalState\TestFixture\SnapshotClass;
use SebastianBergmann\GlobalState\TestFixture\SnapshotTrait;

/**
 * @covers \SebastianBergmann\GlobalState\Snapshot
 *
 * @uses \SebastianBergmann\GlobalState\Blacklist
 */
final class SnapshotTest extends TestCase
{
    /**
     * @var Blacklist
     */
    private $blacklist;

    protected function setUp(): void
    {
        $this->blacklist = new Blacklist;
    }

    public function testStaticAttributes(): void
    {
        SnapshotClass::init();

        $this->blacklistAllLoadedClassesExceptSnapshotClass();

        $snapshot = new Snapshot($this->blacklist, false, true, false, false, false, false, false, false, false);

        $expected = [
            SnapshotClass::class => [
                'string'  => 'string',
                'objects' => [new \stdClass],
            ],
        ];
=======

namespace SebastianBergmann\GlobalState;

use ArrayObject;
use PHPUnit_Framework_TestCase;
use SebastianBergmann\GlobalState\TestFixture\SnapshotClass;

/**
 */
class SnapshotTest extends PHPUnit_Framework_TestCase
{
    public function testStaticAttributes()
    {
        $blacklist = $this->getBlacklist();
        $blacklist->method('isStaticAttributeBlacklisted')->willReturnCallback(function ($class) {
            return $class !== 'SebastianBergmann\GlobalState\TestFixture\SnapshotClass';
        });

        SnapshotClass::init();

        $snapshot = new Snapshot($blacklist, false, true, false, false, false, false, false, false, false);
        $expected = array('SebastianBergmann\GlobalState\TestFixture\SnapshotClass' => array(
            'string' => 'snapshot',
            'arrayObject' => new ArrayObject(array(1, 2, 3)),
            'stdClass' => new \stdClass(),
        ));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->assertEquals($expected, $snapshot->staticAttributes());
    }

<<<<<<< HEAD
    public function testConstants(): void
    {
        $snapshot = new Snapshot($this->blacklist, false, false, true, false, false, false, false, false, false);

        $this->assertArrayHasKey('GLOBALSTATE_TESTSUITE', $snapshot->constants());
    }

    public function testFunctions(): void
    {
        $snapshot  = new Snapshot($this->blacklist, false, false, false, true, false, false, false, false, false);
        $functions = $snapshot->functions();

        $this->assertContains('sebastianbergmann\globalstate\testfixture\snapshotfunction', $functions);
        $this->assertNotContains('assert', $functions);
    }

    public function testClasses(): void
    {
        $snapshot = new Snapshot($this->blacklist, false, false, false, false, true, false, false, false, false);
        $classes  = $snapshot->classes();

        $this->assertContains(TestCase::class, $classes);
        $this->assertNotContains(Exception::class, $classes);
    }

    public function testInterfaces(): void
    {
        $snapshot   = new Snapshot($this->blacklist, false, false, false, false, false, true, false, false, false);
        $interfaces = $snapshot->interfaces();

        $this->assertContains(BlacklistedInterface::class, $interfaces);
        $this->assertNotContains(\Countable::class, $interfaces);
    }

    public function testTraits(): void
    {
        \spl_autoload_call('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait');

        $snapshot = new Snapshot($this->blacklist, false, false, false, false, false, false, true, false, false);

        $this->assertContains(SnapshotTrait::class, $snapshot->traits());
    }

    public function testIniSettings(): void
    {
        $snapshot    = new Snapshot($this->blacklist, false, false, false, false, false, false, false, true, false);
=======
    public function testConstants()
    {
        $snapshot = new Snapshot($this->getBlacklist(), false, false, true, false, false, false, false, false, false);
        $this->assertArrayHasKey('GLOBALSTATE_TESTSUITE', $snapshot->constants());
    }

    public function testFunctions()
    {
        require_once __DIR__.'/_fixture/SnapshotFunctions.php';

        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, true, false, false, false, false, false);
        $functions = $snapshot->functions();

        $this->assertThat(
            $functions,
            $this->logicalOr(
                // Zend
                $this->contains('sebastianbergmann\globalstate\testfixture\snapshotfunction'),
                // HHVM
                $this->contains('SebastianBergmann\GlobalState\TestFixture\snapshotFunction')
            )
        );

        $this->assertNotContains('assert', $functions);
    }

    public function testClasses()
    {
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, true, false, false, false, false);
        $classes = $snapshot->classes();

        $this->assertContains('PHPUnit_Framework_TestCase', $classes);
        $this->assertNotContains('Exception', $classes);
    }

    public function testInterfaces()
    {
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, true, false, false, false);
        $interfaces = $snapshot->interfaces();

        $this->assertContains('PHPUnit_Framework_Test', $interfaces);
        $this->assertNotContains('Countable', $interfaces);
    }

    /**
     * @requires PHP 5.4
     */
    public function testTraits()
    {
        spl_autoload_call('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait');

        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, true, false, false);
        $this->assertContains('SebastianBergmann\GlobalState\TestFixture\SnapshotTrait', $snapshot->traits());
    }

    public function testIniSettings()
    {
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, false, true, false);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $iniSettings = $snapshot->iniSettings();

        $this->assertArrayHasKey('date.timezone', $iniSettings);
        $this->assertEquals('Etc/UTC', $iniSettings['date.timezone']);
    }

<<<<<<< HEAD
    public function testIncludedFiles(): void
    {
        $snapshot = new Snapshot($this->blacklist, false, false, false, false, false, false, false, false, true);
        $this->assertContains(__FILE__, $snapshot->includedFiles());
    }

    private function blacklistAllLoadedClassesExceptSnapshotClass(): void
    {
        foreach (\get_declared_classes() as $class) {
            if ($class === SnapshotClass::class) {
                continue;
            }

            $this->blacklist->addClass($class);
        }
=======
    public function testIncludedFiles()
    {
        $snapshot = new Snapshot($this->getBlacklist(), false, false, false, false, false, false, false, false, true);
        $this->assertContains(__FILE__, $snapshot->includedFiles());
    }

    /**
     * @return \SebastianBergmann\GlobalState\Blacklist
     */
    private function getBlacklist()
    {
        return $this->getMockBuilder('SebastianBergmann\GlobalState\Blacklist')
                    ->disableOriginalConstructor()
                    ->getMock();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
