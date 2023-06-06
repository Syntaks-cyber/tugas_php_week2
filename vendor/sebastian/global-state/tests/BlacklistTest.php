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
use SebastianBergmann\GlobalState\TestFixture\BlacklistedChildClass;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedClass;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedImplementor;
use SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface;

/**
 * @covers \SebastianBergmann\GlobalState\Blacklist
 */
final class BlacklistTest extends TestCase
=======

namespace SebastianBergmann\GlobalState;

use PHPUnit_Framework_TestCase;

/**
 */
class BlacklistTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var \SebastianBergmann\GlobalState\Blacklist
     */
    private $blacklist;

<<<<<<< HEAD
    protected function setUp(): void
=======
    protected function setUp()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->blacklist = new Blacklist;
    }

<<<<<<< HEAD
    public function testGlobalVariableThatIsNotBlacklistedIsNotTreatedAsBlacklisted(): void
=======
    public function testGlobalVariableThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->assertFalse($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

<<<<<<< HEAD
    public function testGlobalVariableCanBeBlacklisted(): void
=======
    public function testGlobalVariableCanBeBlacklisted()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->blacklist->addGlobalVariable('variable');

        $this->assertTrue($this->blacklist->isGlobalVariableBlacklisted('variable'));
    }

<<<<<<< HEAD
    public function testStaticAttributeThatIsNotBlacklistedIsNotTreatedAsBlacklisted(): void
    {
        $this->assertFalse(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedClass::class,
=======
    public function testStaticAttributeThatIsNotBlacklistedIsNotTreatedAsBlacklisted()
    {
        $this->assertFalse(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testClassCanBeBlacklisted(): void
    {
        $this->blacklist->addClass(BlacklistedClass::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedClass::class,
=======
    public function testClassCanBeBlacklisted()
    {
        $this->blacklist->addClass('SebastianBergmann\GlobalState\TestFixture\BlacklistedClass');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testSubclassesCanBeBlacklisted(): void
    {
        $this->blacklist->addSubclassesOf(BlacklistedClass::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedChildClass::class,
=======
    public function testSubclassesCanBeBlacklisted()
    {
        $this->blacklist->addSubclassesOf('SebastianBergmann\GlobalState\TestFixture\BlacklistedClass');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedChildClass',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testImplementorsCanBeBlacklisted(): void
    {
        $this->blacklist->addImplementorsOf(BlacklistedInterface::class);

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                BlacklistedImplementor::class,
=======
    public function testImplementorsCanBeBlacklisted()
    {
        $this->blacklist->addImplementorsOf('SebastianBergmann\GlobalState\TestFixture\BlacklistedInterface');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedImplementor',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testClassNamePrefixesCanBeBlacklisted(): void
=======
    public function testClassNamePrefixesCanBeBlacklisted()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->blacklist->addClassNamePrefix('SebastianBergmann\GlobalState');

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
<<<<<<< HEAD
                BlacklistedClass::class,
=======
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'attribute'
            )
        );
    }

<<<<<<< HEAD
    public function testStaticAttributeCanBeBlacklisted(): void
    {
        $this->blacklist->addStaticAttribute(
            BlacklistedClass::class,
=======
    public function testStaticAttributeCanBeBlacklisted()
    {
        $this->blacklist->addStaticAttribute(
            'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            'attribute'
        );

        $this->assertTrue(
            $this->blacklist->isStaticAttributeBlacklisted(
<<<<<<< HEAD
                BlacklistedClass::class,
=======
                'SebastianBergmann\GlobalState\TestFixture\BlacklistedClass',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                'attribute'
            )
        );
    }
}
