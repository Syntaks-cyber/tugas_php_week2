<<<<<<< HEAD
<?php declare(strict_types=1);
=======
<?php
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
use PHPUnit\Framework\Assert;
use PHPUnit\Framework\AssertionFailedError;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\Attribute;
use PHPUnit\Framework\Constraint\Callback;
use PHPUnit\Framework\Constraint\ClassHasAttribute;
use PHPUnit\Framework\Constraint\ClassHasStaticAttribute;
use PHPUnit\Framework\Constraint\Constraint;
use PHPUnit\Framework\Constraint\Count;
use PHPUnit\Framework\Constraint\DirectoryExists;
use PHPUnit\Framework\Constraint\FileExists;
use PHPUnit\Framework\Constraint\GreaterThan;
use PHPUnit\Framework\Constraint\IsAnything;
use PHPUnit\Framework\Constraint\IsEmpty;
use PHPUnit\Framework\Constraint\IsEqual;
use PHPUnit\Framework\Constraint\IsFalse;
use PHPUnit\Framework\Constraint\IsFinite;
use PHPUnit\Framework\Constraint\IsIdentical;
use PHPUnit\Framework\Constraint\IsInfinite;
use PHPUnit\Framework\Constraint\IsInstanceOf;
use PHPUnit\Framework\Constraint\IsJson;
use PHPUnit\Framework\Constraint\IsNan;
use PHPUnit\Framework\Constraint\IsNull;
use PHPUnit\Framework\Constraint\IsReadable;
use PHPUnit\Framework\Constraint\IsTrue;
use PHPUnit\Framework\Constraint\IsType;
use PHPUnit\Framework\Constraint\IsWritable;
use PHPUnit\Framework\Constraint\LessThan;
use PHPUnit\Framework\Constraint\LogicalAnd;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Constraint\LogicalXor;
use PHPUnit\Framework\Constraint\ObjectHasAttribute;
use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Framework\Constraint\StringEndsWith;
use PHPUnit\Framework\Constraint\StringMatchesFormatDescription;
use PHPUnit\Framework\Constraint\StringStartsWith;
use PHPUnit\Framework\Constraint\TraversableContains;
use PHPUnit\Framework\Constraint\TraversableContainsEqual;
use PHPUnit\Framework\Constraint\TraversableContainsIdentical;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;
use PHPUnit\Framework\ExpectationFailedException;
use PHPUnit\Framework\MockObject\Rule\AnyInvokedCount as AnyInvokedCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtIndex as InvokedAtIndexMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastCount as InvokedAtLeastCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtLeastOnce as InvokedAtLeastOnceMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedAtMostCount as InvokedAtMostCountMatcher;
use PHPUnit\Framework\MockObject\Rule\InvokedCount as InvokedCountMatcher;
use PHPUnit\Framework\MockObject\Stub\ConsecutiveCalls as ConsecutiveCallsStub;
use PHPUnit\Framework\MockObject\Stub\Exception as ExceptionStub;
use PHPUnit\Framework\MockObject\Stub\ReturnArgument as ReturnArgumentStub;
use PHPUnit\Framework\MockObject\Stub\ReturnCallback as ReturnCallbackStub;
use PHPUnit\Framework\MockObject\Stub\ReturnSelf as ReturnSelfStub;
use PHPUnit\Framework\MockObject\Stub\ReturnStub;
use PHPUnit\Framework\MockObject\Stub\ReturnValueMap as ReturnValueMapStub;

if (!\function_exists('PHPUnit\Framework\assertArrayHasKey')) {
    /**
     * Asserts that an array has a specified key.
     *
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertArrayHasKey
     */
    function assertArrayHasKey($key, $array, string $message = ''): void
    {
        Assert::assertArrayHasKey(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertArraySubset')) {
    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess $subset
     * @param array|ArrayAccess $array
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3494
     * @see Assert::assertArraySubset
     */
    function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = ''): void
    {
        Assert::assertArraySubset(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertArrayNotHasKey')) {
    /**
     * Asserts that an array does not have a specified key.
     *
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertArrayNotHasKey
     */
    function assertArrayNotHasKey($key, $array, string $message = ''): void
    {
        Assert::assertArrayNotHasKey(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertContains')) {
    /**
     * Asserts that a haystack contains a needle.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertContains
     */
    function assertContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        Assert::assertContains(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertContainsEquals')) {
    function assertContainsEquals($needle, iterable $haystack, string $message = ''): void
    {
        Assert::assertContainsEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeContains')) {
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains a needle.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeContains
     */
    function assertAttributeContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        Assert::assertAttributeContains(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotContains')) {
    /**
     * Asserts that a haystack does not contain a needle.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotContains
     */
    function assertNotContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        Assert::assertNotContains(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotContainsEquals')) {
    function assertNotContainsEquals($needle, iterable $haystack, string $message = ''): void
    {
        Assert::assertNotContainsEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotContains')) {
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain a needle.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeNotContains
     */
    function assertAttributeNotContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        Assert::assertAttributeNotContains(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertContainsOnly')) {
    /**
     * Asserts that a haystack contains only values of a given type.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertContainsOnly
     */
    function assertContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        Assert::assertContainsOnly(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertContainsOnlyInstancesOf')) {
    /**
     * Asserts that a haystack contains only instances of a given class name.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertContainsOnlyInstancesOf
     */
    function assertContainsOnlyInstancesOf(string $className, iterable $haystack, string $message = ''): void
    {
        Assert::assertContainsOnlyInstancesOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeContainsOnly')) {
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains only values of a given type.
     *
     * @param object|string $haystackClassOrObject
     * @param bool          $isNativeType
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeContainsOnly
     */
    function assertAttributeContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = ''): void
    {
        Assert::assertAttributeContainsOnly(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotContainsOnly')) {
    /**
     * Asserts that a haystack does not contain only values of a given type.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotContainsOnly
     */
    function assertNotContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        Assert::assertNotContainsOnly(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotContainsOnly')) {
    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain only values of a given
     * type.
     *
     * @param object|string $haystackClassOrObject
     * @param bool          $isNativeType
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeNotContainsOnly
     */
    function assertAttributeNotContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = ''): void
    {
        Assert::assertAttributeNotContainsOnly(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertCount')) {
    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param Countable|iterable $haystack
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertCount
     */
    function assertCount(int $expectedCount, $haystack, string $message = ''): void
    {
        Assert::assertCount(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeCount')) {
    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeCount
     */
    function assertAttributeCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeCount(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotCount')) {
    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
     * @param Countable|iterable $haystack
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotCount
     */
    function assertNotCount(int $expectedCount, $haystack, string $message = ''): void
    {
        Assert::assertNotCount(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotCount')) {
    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeNotCount
     */
    function assertAttributeNotCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeNotCount(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertEquals')) {
    /**
     * Asserts that two variables are equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertEquals
     */
    function assertEquals($expected, $actual, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        Assert::assertEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertEqualsCanonicalizing')) {
    /**
     * Asserts that two variables are equal (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertEqualsCanonicalizing
     */
    function assertEqualsCanonicalizing($expected, $actual, string $message = ''): void
    {
        Assert::assertEqualsCanonicalizing(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertEqualsIgnoringCase')) {
    /**
     * Asserts that two variables are equal (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertEqualsIgnoringCase
     */
    function assertEqualsIgnoringCase($expected, $actual, string $message = ''): void
    {
        Assert::assertEqualsIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertEqualsWithDelta')) {
    /**
     * Asserts that two variables are equal (with delta).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertEqualsWithDelta
     */
    function assertEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
    {
        Assert::assertEqualsWithDelta(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeEquals')) {
    /**
     * Asserts that a variable is equal to an attribute of an object.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeEquals
     */
    function assertAttributeEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        Assert::assertAttributeEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotEquals')) {
    /**
     * Asserts that two variables are not equal.
     *
     * @param float $delta
     * @param int   $maxDepth
     * @param bool  $canonicalize
     * @param bool  $ignoreCase
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotEquals
     */
    function assertNotEquals($expected, $actual, string $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false): void
    {
        Assert::assertNotEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotEqualsCanonicalizing')) {
    /**
     * Asserts that two variables are not equal (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotEqualsCanonicalizing
     */
    function assertNotEqualsCanonicalizing($expected, $actual, string $message = ''): void
    {
        Assert::assertNotEqualsCanonicalizing(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotEqualsIgnoringCase')) {
    /**
     * Asserts that two variables are not equal (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotEqualsIgnoringCase
     */
    function assertNotEqualsIgnoringCase($expected, $actual, string $message = ''): void
    {
        Assert::assertNotEqualsIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotEqualsWithDelta')) {
    /**
     * Asserts that two variables are not equal (with delta).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotEqualsWithDelta
     */
    function assertNotEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
    {
        Assert::assertNotEqualsWithDelta(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotEquals')) {
    /**
     * Asserts that a variable is not equal to an attribute of an object.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeNotEquals
     */
    function assertAttributeNotEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        Assert::assertAttributeNotEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertEmpty')) {
    /**
     * Asserts that a variable is empty.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert empty $actual
     *
     * @see Assert::assertEmpty
     */
    function assertEmpty($actual, string $message = ''): void
    {
        Assert::assertEmpty(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeEmpty')) {
    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is empty.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeEmpty
     */
    function assertAttributeEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeEmpty(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotEmpty')) {
    /**
     * Asserts that a variable is not empty.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !empty $actual
     *
     * @see Assert::assertNotEmpty
     */
    function assertNotEmpty($actual, string $message = ''): void
    {
        Assert::assertNotEmpty(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotEmpty')) {
    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is not empty.
     *
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeNotEmpty
     */
    function assertAttributeNotEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeNotEmpty(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertGreaterThan')) {
    /**
     * Asserts that a value is greater than another value.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertGreaterThan
     */
    function assertGreaterThan($expected, $actual, string $message = ''): void
    {
        Assert::assertGreaterThan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeGreaterThan')) {
    /**
     * Asserts that an attribute is greater than another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeGreaterThan
     */
    function assertAttributeGreaterThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeGreaterThan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertGreaterThanOrEqual')) {
    /**
     * Asserts that a value is greater than or equal to another value.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertGreaterThanOrEqual
     */
    function assertGreaterThanOrEqual($expected, $actual, string $message = ''): void
    {
        Assert::assertGreaterThanOrEqual(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeGreaterThanOrEqual')) {
    /**
     * Asserts that an attribute is greater than or equal to another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeGreaterThanOrEqual
     */
    function assertAttributeGreaterThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeGreaterThanOrEqual(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertLessThan')) {
    /**
     * Asserts that a value is smaller than another value.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertLessThan
     */
    function assertLessThan($expected, $actual, string $message = ''): void
    {
        Assert::assertLessThan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeLessThan')) {
    /**
     * Asserts that an attribute is smaller than another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeLessThan
     */
    function assertAttributeLessThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeLessThan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertLessThanOrEqual')) {
    /**
     * Asserts that a value is smaller than or equal to another value.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertLessThanOrEqual
     */
    function assertLessThanOrEqual($expected, $actual, string $message = ''): void
    {
        Assert::assertLessThanOrEqual(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeLessThanOrEqual')) {
    /**
     * Asserts that an attribute is smaller than or equal to another value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeLessThanOrEqual
     */
    function assertAttributeLessThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeLessThanOrEqual(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileEquals')) {
    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileEquals
     */
    function assertFileEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        Assert::assertFileEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileEqualsCanonicalizing')) {
    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileEqualsCanonicalizing
     */
    function assertFileEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        Assert::assertFileEqualsCanonicalizing(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileEqualsIgnoringCase')) {
    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileEqualsIgnoringCase
     */
    function assertFileEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        Assert::assertFileEqualsIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileNotEquals')) {
    /**
     * Asserts that the contents of one file is not equal to the contents of
     * another file.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileNotEquals
     */
    function assertFileNotEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        Assert::assertFileNotEquals(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileNotEqualsCanonicalizing')) {
    /**
     * Asserts that the contents of one file is not equal to the contents of another
     * file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileNotEqualsCanonicalizing
     */
    function assertFileNotEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        Assert::assertFileNotEqualsCanonicalizing(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileNotEqualsIgnoringCase')) {
    /**
     * Asserts that the contents of one file is not equal to the contents of another
     * file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileNotEqualsIgnoringCase
     */
    function assertFileNotEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        Assert::assertFileNotEqualsIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringEqualsFile')) {
    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringEqualsFile
     */
    function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        Assert::assertStringEqualsFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringEqualsFileCanonicalizing')) {
    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringEqualsFileCanonicalizing
     */
    function assertStringEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        Assert::assertStringEqualsFileCanonicalizing(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringEqualsFileIgnoringCase')) {
    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringEqualsFileIgnoringCase
     */
    function assertStringEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        Assert::assertStringEqualsFileIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringNotEqualsFile')) {
    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringNotEqualsFile
     */
    function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        Assert::assertStringNotEqualsFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringNotEqualsFileCanonicalizing')) {
    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringNotEqualsFileCanonicalizing
     */
    function assertStringNotEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        Assert::assertStringNotEqualsFileCanonicalizing(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringNotEqualsFileIgnoringCase')) {
    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringNotEqualsFileIgnoringCase
     */
    function assertStringNotEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        Assert::assertStringNotEqualsFileIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsReadable')) {
    /**
     * Asserts that a file/dir is readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertIsReadable
     */
    function assertIsReadable(string $filename, string $message = ''): void
    {
        Assert::assertIsReadable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotIsReadable')) {
    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotIsReadable
     */
    function assertNotIsReadable(string $filename, string $message = ''): void
    {
        Assert::assertNotIsReadable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsWritable')) {
    /**
     * Asserts that a file/dir exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertIsWritable
     */
    function assertIsWritable(string $filename, string $message = ''): void
    {
        Assert::assertIsWritable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotIsWritable')) {
    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotIsWritable
     */
    function assertNotIsWritable(string $filename, string $message = ''): void
    {
        Assert::assertNotIsWritable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertDirectoryExists')) {
    /**
     * Asserts that a directory exists.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertDirectoryExists
     */
    function assertDirectoryExists(string $directory, string $message = ''): void
    {
        Assert::assertDirectoryExists(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertDirectoryNotExists')) {
    /**
     * Asserts that a directory does not exist.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertDirectoryNotExists
     */
    function assertDirectoryNotExists(string $directory, string $message = ''): void
    {
        Assert::assertDirectoryNotExists(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertDirectoryIsReadable')) {
    /**
     * Asserts that a directory exists and is readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertDirectoryIsReadable
     */
    function assertDirectoryIsReadable(string $directory, string $message = ''): void
    {
        Assert::assertDirectoryIsReadable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertDirectoryNotIsReadable')) {
    /**
     * Asserts that a directory exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertDirectoryNotIsReadable
     */
    function assertDirectoryNotIsReadable(string $directory, string $message = ''): void
    {
        Assert::assertDirectoryNotIsReadable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertDirectoryIsWritable')) {
    /**
     * Asserts that a directory exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertDirectoryIsWritable
     */
    function assertDirectoryIsWritable(string $directory, string $message = ''): void
    {
        Assert::assertDirectoryIsWritable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertDirectoryNotIsWritable')) {
    /**
     * Asserts that a directory exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertDirectoryNotIsWritable
     */
    function assertDirectoryNotIsWritable(string $directory, string $message = ''): void
    {
        Assert::assertDirectoryNotIsWritable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileExists')) {
    /**
     * Asserts that a file exists.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileExists
     */
    function assertFileExists(string $filename, string $message = ''): void
    {
        Assert::assertFileExists(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileNotExists')) {
    /**
     * Asserts that a file does not exist.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileNotExists
     */
    function assertFileNotExists(string $filename, string $message = ''): void
    {
        Assert::assertFileNotExists(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileIsReadable')) {
    /**
     * Asserts that a file exists and is readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileIsReadable
     */
    function assertFileIsReadable(string $file, string $message = ''): void
    {
        Assert::assertFileIsReadable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileNotIsReadable')) {
    /**
     * Asserts that a file exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileNotIsReadable
     */
    function assertFileNotIsReadable(string $file, string $message = ''): void
    {
        Assert::assertFileNotIsReadable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileIsWritable')) {
    /**
     * Asserts that a file exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileIsWritable
     */
    function assertFileIsWritable(string $file, string $message = ''): void
    {
        Assert::assertFileIsWritable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFileNotIsWritable')) {
    /**
     * Asserts that a file exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFileNotIsWritable
     */
    function assertFileNotIsWritable(string $file, string $message = ''): void
    {
        Assert::assertFileNotIsWritable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertTrue')) {
    /**
     * Asserts that a condition is true.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert true $condition
     *
     * @see Assert::assertTrue
     */
    function assertTrue($condition, string $message = ''): void
    {
        Assert::assertTrue(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotTrue')) {
    /**
     * Asserts that a condition is not true.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !true $condition
     *
     * @see Assert::assertNotTrue
     */
    function assertNotTrue($condition, string $message = ''): void
    {
        Assert::assertNotTrue(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFalse')) {
    /**
     * Asserts that a condition is false.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert false $condition
     *
     * @see Assert::assertFalse
     */
    function assertFalse($condition, string $message = ''): void
    {
        Assert::assertFalse(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotFalse')) {
    /**
     * Asserts that a condition is not false.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !false $condition
     *
     * @see Assert::assertNotFalse
     */
    function assertNotFalse($condition, string $message = ''): void
    {
        Assert::assertNotFalse(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNull')) {
    /**
     * Asserts that a variable is null.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert null $actual
     *
     * @see Assert::assertNull
     */
    function assertNull($actual, string $message = ''): void
    {
        Assert::assertNull(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotNull')) {
    /**
     * Asserts that a variable is not null.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !null $actual
     *
     * @see Assert::assertNotNull
     */
    function assertNotNull($actual, string $message = ''): void
    {
        Assert::assertNotNull(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertFinite')) {
    /**
     * Asserts that a variable is finite.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertFinite
     */
    function assertFinite($actual, string $message = ''): void
    {
        Assert::assertFinite(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertInfinite')) {
    /**
     * Asserts that a variable is infinite.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertInfinite
     */
    function assertInfinite($actual, string $message = ''): void
    {
        Assert::assertInfinite(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNan')) {
    /**
     * Asserts that a variable is nan.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNan
     */
    function assertNan($actual, string $message = ''): void
    {
        Assert::assertNan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertClassHasAttribute')) {
    /**
     * Asserts that a class has a specified attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertClassHasAttribute
     */
    function assertClassHasAttribute(string $attributeName, string $className, string $message = ''): void
    {
        Assert::assertClassHasAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertClassNotHasAttribute')) {
    /**
     * Asserts that a class does not have a specified attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertClassNotHasAttribute
     */
    function assertClassNotHasAttribute(string $attributeName, string $className, string $message = ''): void
    {
        Assert::assertClassNotHasAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertClassHasStaticAttribute')) {
    /**
     * Asserts that a class has a specified static attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertClassHasStaticAttribute
     */
    function assertClassHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
    {
        Assert::assertClassHasStaticAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertClassNotHasStaticAttribute')) {
    /**
     * Asserts that a class does not have a specified static attribute.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertClassNotHasStaticAttribute
     */
    function assertClassNotHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
    {
        Assert::assertClassNotHasStaticAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertObjectHasAttribute')) {
    /**
     * Asserts that an object has a specified attribute.
     *
     * @param object $object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertObjectHasAttribute
     */
    function assertObjectHasAttribute(string $attributeName, $object, string $message = ''): void
    {
        Assert::assertObjectHasAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertObjectNotHasAttribute')) {
    /**
     * Asserts that an object does not have a specified attribute.
     *
     * @param object $object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertObjectNotHasAttribute
     */
    function assertObjectNotHasAttribute(string $attributeName, $object, string $message = ''): void
    {
        Assert::assertObjectNotHasAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertSame')) {
    /**
     * Asserts that two variables have the same type and value.
     * Used on objects, it asserts that two variables reference
     * the same object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-template ExpectedType
     *
     * @psalm-param ExpectedType $expected
     *
     * @psalm-assert =ExpectedType $actual
     *
     * @see Assert::assertSame
     */
    function assertSame($expected, $actual, string $message = ''): void
    {
        Assert::assertSame(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeSame')) {
    /**
     * Asserts that a variable and an attribute of an object have the same type
     * and value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeSame
     */
    function assertAttributeSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeSame(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotSame')) {
    /**
     * Asserts that two variables do not have the same type and value.
     * Used on objects, it asserts that two variables do not reference
     * the same object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotSame
     */
    function assertNotSame($expected, $actual, string $message = ''): void
    {
        Assert::assertNotSame(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotSame')) {
    /**
     * Asserts that a variable and an attribute of an object do not have the
     * same type and value.
     *
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeNotSame
     */
    function assertAttributeNotSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        Assert::assertAttributeNotSame(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertInstanceOf')) {
    /**
     * Asserts that a variable is of a given type.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $expected
     *
     * @psalm-assert =ExpectedType $actual
     *
     * @see Assert::assertInstanceOf
     */
    function assertInstanceOf(string $expected, $actual, string $message = ''): void
    {
        Assert::assertInstanceOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeInstanceOf')) {
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @psalm-param class-string $expected
     *
     * @see Assert::assertAttributeInstanceOf
     */
    function assertAttributeInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        Assert::assertAttributeInstanceOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotInstanceOf')) {
    /**
     * Asserts that a variable is not of a given type.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $expected
     *
     * @psalm-assert !ExpectedType $actual
     *
     * @see Assert::assertNotInstanceOf
     */
    function assertNotInstanceOf(string $expected, $actual, string $message = ''): void
    {
        Assert::assertNotInstanceOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotInstanceOf')) {
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @psalm-param class-string $expected
     *
     * @see Assert::assertAttributeNotInstanceOf
     */
    function assertAttributeNotInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        Assert::assertAttributeNotInstanceOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertInternalType')) {
    /**
     * Asserts that a variable is of a given type.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertInternalType
     */
    function assertInternalType(string $expected, $actual, string $message = ''): void
    {
        Assert::assertInternalType(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeInternalType')) {
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeInternalType
     */
    function assertAttributeInternalType(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        Assert::assertAttributeInternalType(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsArray')) {
    /**
     * Asserts that a variable is of type array.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert array $actual
     *
     * @see Assert::assertIsArray
     */
    function assertIsArray($actual, string $message = ''): void
    {
        Assert::assertIsArray(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsBool')) {
    /**
     * Asserts that a variable is of type bool.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert bool $actual
     *
     * @see Assert::assertIsBool
     */
    function assertIsBool($actual, string $message = ''): void
    {
        Assert::assertIsBool(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsFloat')) {
    /**
     * Asserts that a variable is of type float.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert float $actual
     *
     * @see Assert::assertIsFloat
     */
    function assertIsFloat($actual, string $message = ''): void
    {
        Assert::assertIsFloat(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsInt')) {
    /**
     * Asserts that a variable is of type int.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert int $actual
     *
     * @see Assert::assertIsInt
     */
    function assertIsInt($actual, string $message = ''): void
    {
        Assert::assertIsInt(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNumeric')) {
    /**
     * Asserts that a variable is of type numeric.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert numeric $actual
     *
     * @see Assert::assertIsNumeric
     */
    function assertIsNumeric($actual, string $message = ''): void
    {
        Assert::assertIsNumeric(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsObject')) {
    /**
     * Asserts that a variable is of type object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert object $actual
     *
     * @see Assert::assertIsObject
     */
    function assertIsObject($actual, string $message = ''): void
    {
        Assert::assertIsObject(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsResource')) {
    /**
     * Asserts that a variable is of type resource.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert resource $actual
     *
     * @see Assert::assertIsResource
     */
    function assertIsResource($actual, string $message = ''): void
    {
        Assert::assertIsResource(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsString')) {
    /**
     * Asserts that a variable is of type string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert string $actual
     *
     * @see Assert::assertIsString
     */
    function assertIsString($actual, string $message = ''): void
    {
        Assert::assertIsString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsScalar')) {
    /**
     * Asserts that a variable is of type scalar.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert scalar $actual
     *
     * @see Assert::assertIsScalar
     */
    function assertIsScalar($actual, string $message = ''): void
    {
        Assert::assertIsScalar(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsCallable')) {
    /**
     * Asserts that a variable is of type callable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert callable $actual
     *
     * @see Assert::assertIsCallable
     */
    function assertIsCallable($actual, string $message = ''): void
    {
        Assert::assertIsCallable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsIterable')) {
    /**
     * Asserts that a variable is of type iterable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert iterable $actual
     *
     * @see Assert::assertIsIterable
     */
    function assertIsIterable($actual, string $message = ''): void
    {
        Assert::assertIsIterable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotInternalType')) {
    /**
     * Asserts that a variable is not of a given type.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertNotInternalType
     */
    function assertNotInternalType(string $expected, $actual, string $message = ''): void
    {
        Assert::assertNotInternalType(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotArray')) {
    /**
     * Asserts that a variable is not of type array.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !array $actual
     *
     * @see Assert::assertIsNotArray
     */
    function assertIsNotArray($actual, string $message = ''): void
    {
        Assert::assertIsNotArray(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotBool')) {
    /**
     * Asserts that a variable is not of type bool.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !bool $actual
     *
     * @see Assert::assertIsNotBool
     */
    function assertIsNotBool($actual, string $message = ''): void
    {
        Assert::assertIsNotBool(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotFloat')) {
    /**
     * Asserts that a variable is not of type float.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !float $actual
     *
     * @see Assert::assertIsNotFloat
     */
    function assertIsNotFloat($actual, string $message = ''): void
    {
        Assert::assertIsNotFloat(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotInt')) {
    /**
     * Asserts that a variable is not of type int.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !int $actual
     *
     * @see Assert::assertIsNotInt
     */
    function assertIsNotInt($actual, string $message = ''): void
    {
        Assert::assertIsNotInt(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotNumeric')) {
    /**
     * Asserts that a variable is not of type numeric.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !numeric $actual
     *
     * @see Assert::assertIsNotNumeric
     */
    function assertIsNotNumeric($actual, string $message = ''): void
    {
        Assert::assertIsNotNumeric(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotObject')) {
    /**
     * Asserts that a variable is not of type object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !object $actual
     *
     * @see Assert::assertIsNotObject
     */
    function assertIsNotObject($actual, string $message = ''): void
    {
        Assert::assertIsNotObject(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotResource')) {
    /**
     * Asserts that a variable is not of type resource.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !resource $actual
     *
     * @see Assert::assertIsNotResource
     */
    function assertIsNotResource($actual, string $message = ''): void
    {
        Assert::assertIsNotResource(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotString')) {
    /**
     * Asserts that a variable is not of type string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !string $actual
     *
     * @see Assert::assertIsNotString
     */
    function assertIsNotString($actual, string $message = ''): void
    {
        Assert::assertIsNotString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotScalar')) {
    /**
     * Asserts that a variable is not of type scalar.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !scalar $actual
     *
     * @see Assert::assertIsNotScalar
     */
    function assertIsNotScalar($actual, string $message = ''): void
    {
        Assert::assertIsNotScalar(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotCallable')) {
    /**
     * Asserts that a variable is not of type callable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !callable $actual
     *
     * @see Assert::assertIsNotCallable
     */
    function assertIsNotCallable($actual, string $message = ''): void
    {
        Assert::assertIsNotCallable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertIsNotIterable')) {
    /**
     * Asserts that a variable is not of type iterable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !iterable $actual
     *
     * @see Assert::assertIsNotIterable
     */
    function assertIsNotIterable($actual, string $message = ''): void
    {
        Assert::assertIsNotIterable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertAttributeNotInternalType')) {
    /**
     * Asserts that an attribute is of a given type.
     *
     * @param object|string $classOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     *
     * @see Assert::assertAttributeNotInternalType
     */
    function assertAttributeNotInternalType(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        Assert::assertAttributeNotInternalType(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertRegExp')) {
    /**
     * Asserts that a string matches a given regular expression.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertRegExp
     */
    function assertRegExp(string $pattern, string $string, string $message = ''): void
    {
        Assert::assertRegExp(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotRegExp')) {
    /**
     * Asserts that a string does not match a given regular expression.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotRegExp
     */
    function assertNotRegExp(string $pattern, string $string, string $message = ''): void
    {
        Assert::assertNotRegExp(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertSameSize')) {
    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is the same.
     *
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertSameSize
     */
    function assertSameSize($expected, $actual, string $message = ''): void
    {
        Assert::assertSameSize(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertNotSameSize')) {
    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is not the same.
     *
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertNotSameSize
     */
    function assertNotSameSize($expected, $actual, string $message = ''): void
    {
        Assert::assertNotSameSize(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringMatchesFormat')) {
    /**
     * Asserts that a string matches a given format string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringMatchesFormat
     */
    function assertStringMatchesFormat(string $format, string $string, string $message = ''): void
    {
        Assert::assertStringMatchesFormat(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringNotMatchesFormat')) {
    /**
     * Asserts that a string does not match a given format string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringNotMatchesFormat
     */
    function assertStringNotMatchesFormat(string $format, string $string, string $message = ''): void
    {
        Assert::assertStringNotMatchesFormat(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringMatchesFormatFile')) {
    /**
     * Asserts that a string matches a given format file.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringMatchesFormatFile
     */
    function assertStringMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        Assert::assertStringMatchesFormatFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringNotMatchesFormatFile')) {
    /**
     * Asserts that a string does not match a given format string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringNotMatchesFormatFile
     */
    function assertStringNotMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        Assert::assertStringNotMatchesFormatFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringStartsWith')) {
    /**
     * Asserts that a string starts with a given prefix.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringStartsWith
     */
    function assertStringStartsWith(string $prefix, string $string, string $message = ''): void
    {
        Assert::assertStringStartsWith(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringStartsNotWith')) {
    /**
     * Asserts that a string starts not with a given prefix.
     *
     * @param string $prefix
     * @param string $string
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringStartsNotWith
     */
    function assertStringStartsNotWith($prefix, $string, string $message = ''): void
    {
        Assert::assertStringStartsNotWith(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringContainsString')) {
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringContainsString
     */
    function assertStringContainsString(string $needle, string $haystack, string $message = ''): void
    {
        Assert::assertStringContainsString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringContainsStringIgnoringCase')) {
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringContainsStringIgnoringCase
     */
    function assertStringContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        Assert::assertStringContainsStringIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringNotContainsString')) {
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringNotContainsString
     */
    function assertStringNotContainsString(string $needle, string $haystack, string $message = ''): void
    {
        Assert::assertStringNotContainsString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringNotContainsStringIgnoringCase')) {
    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringNotContainsStringIgnoringCase
     */
    function assertStringNotContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        Assert::assertStringNotContainsStringIgnoringCase(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringEndsWith')) {
    /**
     * Asserts that a string ends with a given suffix.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringEndsWith
     */
    function assertStringEndsWith(string $suffix, string $string, string $message = ''): void
    {
        Assert::assertStringEndsWith(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertStringEndsNotWith')) {
    /**
     * Asserts that a string ends not with a given suffix.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertStringEndsNotWith
     */
    function assertStringEndsNotWith(string $suffix, string $string, string $message = ''): void
    {
        Assert::assertStringEndsNotWith(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertXmlFileEqualsXmlFile')) {
    /**
     * Asserts that two XML files are equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertXmlFileEqualsXmlFile
     */
    function assertXmlFileEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        Assert::assertXmlFileEqualsXmlFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertXmlFileNotEqualsXmlFile')) {
    /**
     * Asserts that two XML files are not equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertXmlFileNotEqualsXmlFile
     */
    function assertXmlFileNotEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        Assert::assertXmlFileNotEqualsXmlFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertXmlStringEqualsXmlFile')) {
    /**
     * Asserts that two XML documents are equal.
     *
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertXmlStringEqualsXmlFile
     */
    function assertXmlStringEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
    {
        Assert::assertXmlStringEqualsXmlFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertXmlStringNotEqualsXmlFile')) {
    /**
     * Asserts that two XML documents are not equal.
     *
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertXmlStringNotEqualsXmlFile
     */
    function assertXmlStringNotEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
    {
        Assert::assertXmlStringNotEqualsXmlFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertXmlStringEqualsXmlString')) {
    /**
     * Asserts that two XML documents are equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertXmlStringEqualsXmlString
     */
    function assertXmlStringEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
    {
        Assert::assertXmlStringEqualsXmlString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertXmlStringNotEqualsXmlString')) {
    /**
     * Asserts that two XML documents are not equal.
     *
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @see Assert::assertXmlStringNotEqualsXmlString
     */
    function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
    {
        Assert::assertXmlStringNotEqualsXmlString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertEqualXMLStructure')) {
    /**
     * Asserts that a hierarchy of DOMElements matches.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws AssertionFailedError
     * @throws ExpectationFailedException
     *
     * @see Assert::assertEqualXMLStructure
     */
    function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, bool $checkAttributes = false, string $message = ''): void
    {
        Assert::assertEqualXMLStructure(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertThat')) {
    /**
     * Evaluates a PHPUnit\Framework\Constraint matcher object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertThat
     */
    function assertThat($value, Constraint $constraint, string $message = ''): void
    {
        Assert::assertThat(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertJson')) {
    /**
     * Asserts that a string is a valid JSON string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertJson
     */
    function assertJson(string $actualJson, string $message = ''): void
    {
        Assert::assertJson(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertJsonStringEqualsJsonString')) {
    /**
     * Asserts that two given JSON encoded objects or arrays are equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertJsonStringEqualsJsonString
     */
    function assertJsonStringEqualsJsonString(string $expectedJson, string $actualJson, string $message = ''): void
    {
        Assert::assertJsonStringEqualsJsonString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertJsonStringNotEqualsJsonString')) {
    /**
     * Asserts that two given JSON encoded objects or arrays are not equal.
     *
     * @param string $expectedJson
     * @param string $actualJson
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertJsonStringNotEqualsJsonString
     */
    function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, string $message = ''): void
    {
        Assert::assertJsonStringNotEqualsJsonString(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertJsonStringEqualsJsonFile')) {
    /**
     * Asserts that the generated JSON encoded object and the content of the given file are equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertJsonStringEqualsJsonFile
     */
    function assertJsonStringEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        Assert::assertJsonStringEqualsJsonFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertJsonStringNotEqualsJsonFile')) {
    /**
     * Asserts that the generated JSON encoded object and the content of the given file are not equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertJsonStringNotEqualsJsonFile
     */
    function assertJsonStringNotEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        Assert::assertJsonStringNotEqualsJsonFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertJsonFileEqualsJsonFile')) {
    /**
     * Asserts that two JSON files are equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertJsonFileEqualsJsonFile
     */
    function assertJsonFileEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        Assert::assertJsonFileEqualsJsonFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\assertJsonFileNotEqualsJsonFile')) {
    /**
     * Asserts that two JSON files are not equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @see Assert::assertJsonFileNotEqualsJsonFile
     */
    function assertJsonFileNotEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        Assert::assertJsonFileNotEqualsJsonFile(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\logicalAnd')) {
    function logicalAnd(): LogicalAnd
    {
        return Assert::logicalAnd(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\logicalOr')) {
    function logicalOr(): LogicalOr
    {
        return Assert::logicalOr(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\logicalNot')) {
    function logicalNot(Constraint $constraint): LogicalNot
    {
        return Assert::logicalNot(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\logicalXor')) {
    function logicalXor(): LogicalXor
    {
        return Assert::logicalXor(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\anything')) {
    function anything(): IsAnything
    {
        return Assert::anything(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isTrue')) {
    function isTrue(): IsTrue
    {
        return Assert::isTrue(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\callback')) {
    function callback(callable $callback): Callback
    {
        return Assert::callback(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isFalse')) {
    function isFalse(): IsFalse
    {
        return Assert::isFalse(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isJson')) {
    function isJson(): IsJson
    {
        return Assert::isJson(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isNull')) {
    function isNull(): IsNull
    {
        return Assert::isNull(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isFinite')) {
    function isFinite(): IsFinite
    {
        return Assert::isFinite(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isInfinite')) {
    function isInfinite(): IsInfinite
    {
        return Assert::isInfinite(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isNan')) {
    function isNan(): IsNan
    {
        return Assert::isNan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\attribute')) {
    function attribute(Constraint $constraint, string $attributeName): Attribute
    {
        return Assert::attribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\contains')) {
    function contains($value, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): TraversableContains
    {
        return Assert::contains(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\containsEqual')) {
    function containsEqual($value): TraversableContainsEqual
    {
        return Assert::containsEqual(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\containsIdentical')) {
    function containsIdentical($value): TraversableContainsIdentical
    {
        return Assert::containsIdentical(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\containsOnly')) {
    function containsOnly(string $type): TraversableContainsOnly
    {
        return Assert::containsOnly(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\containsOnlyInstancesOf')) {
    function containsOnlyInstancesOf(string $className): TraversableContainsOnly
    {
        return Assert::containsOnlyInstancesOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\arrayHasKey')) {
    function arrayHasKey($key): ArrayHasKey
    {
        return Assert::arrayHasKey(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\equalTo')) {
    function equalTo($value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): IsEqual
    {
        return Assert::equalTo(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\attributeEqualTo')) {
    function attributeEqualTo(string $attributeName, $value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): Attribute
    {
        return Assert::attributeEqualTo(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isEmpty')) {
    function isEmpty(): IsEmpty
    {
        return Assert::isEmpty(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isWritable')) {
    function isWritable(): IsWritable
    {
        return Assert::isWritable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isReadable')) {
    function isReadable(): IsReadable
    {
        return Assert::isReadable(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\directoryExists')) {
    function directoryExists(): DirectoryExists
    {
        return Assert::directoryExists(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\fileExists')) {
    function fileExists(): FileExists
    {
        return Assert::fileExists(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\greaterThan')) {
    function greaterThan($value): GreaterThan
    {
        return Assert::greaterThan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\greaterThanOrEqual')) {
    function greaterThanOrEqual($value): LogicalOr
    {
        return Assert::greaterThanOrEqual(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\classHasAttribute')) {
    function classHasAttribute(string $attributeName): ClassHasAttribute
    {
        return Assert::classHasAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\classHasStaticAttribute')) {
    function classHasStaticAttribute(string $attributeName): ClassHasStaticAttribute
    {
        return Assert::classHasStaticAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\objectHasAttribute')) {
    function objectHasAttribute($attributeName): ObjectHasAttribute
    {
        return Assert::objectHasAttribute(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\identicalTo')) {
    function identicalTo($value): IsIdentical
    {
        return Assert::identicalTo(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isInstanceOf')) {
    function isInstanceOf(string $className): IsInstanceOf
    {
        return Assert::isInstanceOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\isType')) {
    function isType(string $type): IsType
    {
        return Assert::isType(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\lessThan')) {
    function lessThan($value): LessThan
    {
        return Assert::lessThan(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\lessThanOrEqual')) {
    function lessThanOrEqual($value): LogicalOr
    {
        return Assert::lessThanOrEqual(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\matchesRegularExpression')) {
    function matchesRegularExpression(string $pattern): RegularExpression
    {
        return Assert::matchesRegularExpression(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\matches')) {
    function matches(string $string): StringMatchesFormatDescription
    {
        return Assert::matches(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\stringStartsWith')) {
    function stringStartsWith($prefix): StringStartsWith
    {
        return Assert::stringStartsWith(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\stringContains')) {
    function stringContains(string $string, bool $case = true): StringContains
    {
        return Assert::stringContains(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\stringEndsWith')) {
    function stringEndsWith(string $suffix): StringEndsWith
    {
        return Assert::stringEndsWith(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\countOf')) {
    function countOf(int $count): Count
    {
        return Assert::countOf(...\func_get_args());
    }
}

if (!\function_exists('PHPUnit\Framework\any')) {
    /**
     * Returns a matcher that matches when the method is executed
     * zero or more times.
     */
    function any(): AnyInvokedCountMatcher
    {
        return new AnyInvokedCountMatcher;
    }
}

if (!\function_exists('PHPUnit\Framework\never')) {
    /**
     * Returns a matcher that matches when the method is never executed.
     */
    function never(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(0);
    }
}

if (!\function_exists('PHPUnit\Framework\atLeast')) {
    /**
     * Returns a matcher that matches when the method is executed
     * at least N times.
     */
    function atLeast(int $requiredInvocations): InvokedAtLeastCountMatcher
    {
        return new InvokedAtLeastCountMatcher(
            $requiredInvocations
        );
    }
}

if (!\function_exists('PHPUnit\Framework\atLeastOnce')) {
    /**
     * Returns a matcher that matches when the method is executed at least once.
     */
    function atLeastOnce(): InvokedAtLeastOnceMatcher
    {
        return new InvokedAtLeastOnceMatcher;
    }
}

if (!\function_exists('PHPUnit\Framework\once')) {
    /**
     * Returns a matcher that matches when the method is executed exactly once.
     */
    function once(): InvokedCountMatcher
    {
        return new InvokedCountMatcher(1);
    }
}

if (!\function_exists('PHPUnit\Framework\exactly')) {
    /**
     * Returns a matcher that matches when the method is executed
     * exactly $count times.
     */
    function exactly(int $count): InvokedCountMatcher
    {
        return new InvokedCountMatcher($count);
    }
}

if (!\function_exists('PHPUnit\Framework\atMost')) {
    /**
     * Returns a matcher that matches when the method is executed
     * at most N times.
     */
    function atMost(int $allowedInvocations): InvokedAtMostCountMatcher
    {
        return new InvokedAtMostCountMatcher($allowedInvocations);
    }
}

if (!\function_exists('PHPUnit\Framework\at')) {
    /**
     * Returns a matcher that matches when the method is executed
     * at the given index.
     */
    function at(int $index): InvokedAtIndexMatcher
    {
        return new InvokedAtIndexMatcher($index);
    }
}

if (!\function_exists('PHPUnit\Framework\returnValue')) {
    function returnValue($value): ReturnStub
    {
        return new ReturnStub($value);
    }
}

if (!\function_exists('PHPUnit\Framework\returnValueMap')) {
    function returnValueMap(array $valueMap): ReturnValueMapStub
    {
        return new ReturnValueMapStub($valueMap);
    }
}

if (!\function_exists('PHPUnit\Framework\returnArgument')) {
    function returnArgument(int $argumentIndex): ReturnArgumentStub
    {
        return new ReturnArgumentStub($argumentIndex);
    }
}

if (!\function_exists('PHPUnit\Framework\returnCallback')) {
    function returnCallback($callback): ReturnCallbackStub
    {
        return new ReturnCallbackStub($callback);
    }
}

if (!\function_exists('PHPUnit\Framework\returnSelf')) {
    /**
     * Returns the current object.
     *
     * This method is useful when mocking a fluent interface.
     */
    function returnSelf(): ReturnSelfStub
    {
        return new ReturnSelfStub;
    }
}

if (!\function_exists('PHPUnit\Framework\throwException')) {
    function throwException(Throwable $exception): ExceptionStub
    {
        return new ExceptionStub($exception);
    }
}

if (!\function_exists('PHPUnit\Framework\onConsecutiveCalls')) {
    function onConsecutiveCalls(): ConsecutiveCallsStub
    {
        $args = \func_get_args();

        return new ConsecutiveCallsStub($args);
    }
=======

/**
 * Returns a matcher that matches when the method is executed
 * zero or more times.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_AnyInvokedCount
 *
 * @since  Method available since Release 3.0.0
 */
function any()
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::any',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsAnything matcher object.
 *
 * @return PHPUnit_Framework_Constraint_IsAnything
 *
 * @since  Method available since Release 3.0.0
 */
function anything()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::anything',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ArrayHasKey matcher object.
 *
 * @param mixed $key
 *
 * @return PHPUnit_Framework_Constraint_ArrayHasKey
 *
 * @since  Method available since Release 3.0.0
 */
function arrayHasKey($key)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::arrayHasKey',
        func_get_args()
    );
}

/**
 * Asserts that an array has a specified key.
 *
 * @param mixed             $key
 * @param array|ArrayAccess $array
 * @param string            $message
 *
 * @since  Method available since Release 3.0.0
 */
function assertArrayHasKey($key, $array, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertArrayHasKey',
        func_get_args()
    );
}

/**
 * Asserts that an array has a specified subset.
 *
 * @param array|ArrayAccess $subset
 * @param array|ArrayAccess $array
 * @param bool              $strict  Check for object identity
 * @param string            $message
 *
 * @since Method available since Release 4.4.0
 */
function assertArraySubset($subset, $array, $strict = false, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertArraySubset',
        func_get_args()
    );
}

/**
 * Asserts that an array does not have a specified key.
 *
 * @param mixed             $key
 * @param array|ArrayAccess $array
 * @param string            $message
 *
 * @since  Method available since Release 3.0.0
 */
function assertArrayNotHasKey($key, $array, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertArrayNotHasKey',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object contains a needle.
 *
 * @param mixed  $needle
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 *
 * @since  Method available since Release 3.0.0
 */
function assertAttributeContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object contains only values of a given type.
 *
 * @param string $type
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param bool   $isNativeType
 * @param string $message
 *
 * @since  Method available since Release 3.1.4
 */
function assertAttributeContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable
 * that is stored in an attribute.
 *
 * @param int    $expectedCount
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 *
 * @since Method available since Release 3.6.0
 */
function assertAttributeCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeCount',
        func_get_args()
    );
}

/**
 * Asserts that a static attribute of a class or an attribute of an object
 * is empty.
 *
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertAttributeEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeEmpty',
        func_get_args()
    );
}

/**
 * Asserts that a variable is equal to an attribute of an object.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertAttributeEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeEquals',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is greater than another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertAttributeGreaterThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeGreaterThan',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is greater than or equal to another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertAttributeGreaterThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeGreaterThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertAttributeInstanceOf($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertAttributeInternalType($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeInternalType',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is smaller than another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertAttributeLessThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeLessThan',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is smaller than or equal to another value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertAttributeLessThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeLessThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object does not contain a needle.
 *
 * @param mixed  $needle
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 *
 * @since  Method available since Release 3.0.0
 */
function assertAttributeNotContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack that is stored in a static attribute of a class
 * or an attribute of an object does not contain only values of a given
 * type.
 *
 * @param string $type
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param bool   $isNativeType
 * @param string $message
 *
 * @since  Method available since Release 3.1.4
 */
function assertAttributeNotContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable
 * that is stored in an attribute.
 *
 * @param int    $expectedCount
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 *
 * @since Method available since Release 3.6.0
 */
function assertAttributeNotCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotCount',
        func_get_args()
    );
}

/**
 * Asserts that a static attribute of a class or an attribute of an object
 * is not empty.
 *
 * @param string $haystackAttributeName
 * @param mixed  $haystackClassOrObject
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertAttributeNotEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotEmpty',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not equal to an attribute of an object.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param string $actualClassOrObject
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertAttributeNotEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotEquals',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertAttributeNotInstanceOf($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that an attribute is of a given type.
 *
 * @param string $expected
 * @param string $attributeName
 * @param mixed  $classOrObject
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertAttributeNotInternalType($expected, $attributeName, $classOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotInternalType',
        func_get_args()
    );
}

/**
 * Asserts that a variable and an attribute of an object do not have the
 * same type and value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param object $actualClassOrObject
 * @param string $message
 */
function assertAttributeNotSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeNotSame',
        func_get_args()
    );
}

/**
 * Asserts that a variable and an attribute of an object have the same type
 * and value.
 *
 * @param mixed  $expected
 * @param string $actualAttributeName
 * @param object $actualClassOrObject
 * @param string $message
 */
function assertAttributeSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertAttributeSame',
        func_get_args()
    );
}

/**
 * Asserts that a class has a specified attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertClassHasAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertClassHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a class has a specified static attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertClassHasStaticAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertClassHasStaticAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a class does not have a specified attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertClassNotHasAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertClassNotHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a class does not have a specified static attribute.
 *
 * @param string $attributeName
 * @param string $className
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertClassNotHasStaticAttribute($attributeName, $className, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertClassNotHasStaticAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a haystack contains a needle.
 *
 * @param mixed  $needle
 * @param mixed  $haystack
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 *
 * @since  Method available since Release 2.1.0
 */
function assertContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack contains only values of a given type.
 *
 * @param string $type
 * @param mixed  $haystack
 * @param bool   $isNativeType
 * @param string $message
 *
 * @since  Method available since Release 3.1.4
 */
function assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts that a haystack contains only instances of a given classname
 *
 * @param string            $classname
 * @param array|Traversable $haystack
 * @param string            $message
 */
function assertContainsOnlyInstancesOf($classname, $haystack, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertContainsOnlyInstancesOf',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable.
 *
 * @param int    $expectedCount
 * @param mixed  $haystack
 * @param string $message
 */
function assertCount($expectedCount, $haystack, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertCount',
        func_get_args()
    );
}

/**
 * Asserts that a variable is empty.
 *
 * @param mixed  $actual
 * @param string $message
 *
 * @throws PHPUnit_Framework_AssertionFailedError
 */
function assertEmpty($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertEmpty',
        func_get_args()
    );
}

/**
 * Asserts that a hierarchy of DOMElements matches.
 *
 * @param DOMElement $expectedElement
 * @param DOMElement $actualElement
 * @param bool       $checkAttributes
 * @param string     $message
 *
 * @since  Method available since Release 3.3.0
 */
function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, $checkAttributes = false, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertEqualXMLStructure',
        func_get_args()
    );
}

/**
 * Asserts that two variables are equal.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 */
function assertEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertEquals',
        func_get_args()
    );
}

/**
 * Asserts that a condition is not true.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws PHPUnit_Framework_AssertionFailedError
 */
function assertNotTrue($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotTrue',
        func_get_args()
    );
}

/**
 * Asserts that a condition is false.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws PHPUnit_Framework_AssertionFailedError
 */
function assertFalse($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertFalse',
        func_get_args()
    );
}

/**
 * Asserts that the contents of one file is equal to the contents of another
 * file.
 *
 * @param string $expected
 * @param string $actual
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 *
 * @since  Method available since Release 3.2.14
 */
function assertFileEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertFileEquals',
        func_get_args()
    );
}

/**
 * Asserts that a file exists.
 *
 * @param string $filename
 * @param string $message
 *
 * @since  Method available since Release 3.0.0
 */
function assertFileExists($filename, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertFileExists',
        func_get_args()
    );
}

/**
 * Asserts that the contents of one file is not equal to the contents of
 * another file.
 *
 * @param string $expected
 * @param string $actual
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 *
 * @since  Method available since Release 3.2.14
 */
function assertFileNotEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertFileNotEquals',
        func_get_args()
    );
}

/**
 * Asserts that a file does not exist.
 *
 * @param string $filename
 * @param string $message
 *
 * @since  Method available since Release 3.0.0
 */
function assertFileNotExists($filename, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertFileNotExists',
        func_get_args()
    );
}

/**
 * Asserts that a value is greater than another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertGreaterThan($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertGreaterThan',
        func_get_args()
    );
}

/**
 * Asserts that a value is greater than or equal to another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertGreaterThanOrEqual($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertGreaterThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that a variable is of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertInstanceOf($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that a variable is of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertInternalType($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertInternalType',
        func_get_args()
    );
}

/**
 * Asserts that a string is a valid JSON string.
 *
 * @param string $actualJson
 * @param string $message
 *
 * @since  Method available since Release 3.7.20
 */
function assertJson($actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertJson',
        func_get_args()
    );
}

/**
 * Asserts that two JSON files are equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 */
function assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertJsonFileEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that two JSON files are not equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 */
function assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertJsonFileNotEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that the generated JSON encoded object and the content of the given file are equal.
 *
 * @param string $expectedFile
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertJsonStringEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that two given JSON encoded objects or arrays are equal.
 *
 * @param string $expectedJson
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertJsonStringEqualsJsonString',
        func_get_args()
    );
}

/**
 * Asserts that the generated JSON encoded object and the content of the given file are not equal.
 *
 * @param string $expectedFile
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertJsonStringNotEqualsJsonFile',
        func_get_args()
    );
}

/**
 * Asserts that two given JSON encoded objects or arrays are not equal.
 *
 * @param string $expectedJson
 * @param string $actualJson
 * @param string $message
 */
function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertJsonStringNotEqualsJsonString',
        func_get_args()
    );
}

/**
 * Asserts that a value is smaller than another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertLessThan($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertLessThan',
        func_get_args()
    );
}

/**
 * Asserts that a value is smaller than or equal to another value.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertLessThanOrEqual($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertLessThanOrEqual',
        func_get_args()
    );
}

/**
 * Asserts that a haystack does not contain a needle.
 *
 * @param mixed  $needle
 * @param mixed  $haystack
 * @param string $message
 * @param bool   $ignoreCase
 * @param bool   $checkForObjectIdentity
 * @param bool   $checkForNonObjectIdentity
 *
 * @since  Method available since Release 2.1.0
 */
function assertNotContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotContains',
        func_get_args()
    );
}

/**
 * Asserts that a haystack does not contain only values of a given type.
 *
 * @param string $type
 * @param mixed  $haystack
 * @param bool   $isNativeType
 * @param string $message
 *
 * @since  Method available since Release 3.1.4
 */
function assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotContainsOnly',
        func_get_args()
    );
}

/**
 * Asserts the number of elements of an array, Countable or Traversable.
 *
 * @param int    $expectedCount
 * @param mixed  $haystack
 * @param string $message
 */
function assertNotCount($expectedCount, $haystack, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotCount',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not empty.
 *
 * @param mixed  $actual
 * @param string $message
 *
 * @throws PHPUnit_Framework_AssertionFailedError
 */
function assertNotEmpty($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotEmpty',
        func_get_args()
    );
}

/**
 * Asserts that two variables are not equal.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 *
 * @since  Method available since Release 2.3.0
 */
function assertNotEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotEquals',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertNotInstanceOf($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotInstanceOf',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not of a given type.
 *
 * @param string $expected
 * @param mixed  $actual
 * @param string $message
 *
 * @since Method available since Release 3.5.0
 */
function assertNotInternalType($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotInternalType',
        func_get_args()
    );
}

/**
 * Asserts that a condition is not false.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws PHPUnit_Framework_AssertionFailedError
 */
function assertNotFalse($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotFalse',
        func_get_args()
    );
}

/**
 * Asserts that a variable is not null.
 *
 * @param mixed  $actual
 * @param string $message
 */
function assertNotNull($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotNull',
        func_get_args()
    );
}

/**
 * Asserts that a string does not match a given regular expression.
 *
 * @param string $pattern
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 2.1.0
 */
function assertNotRegExp($pattern, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotRegExp',
        func_get_args()
    );
}

/**
 * Asserts that two variables do not have the same type and value.
 * Used on objects, it asserts that two variables do not reference
 * the same object.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertNotSame($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotSame',
        func_get_args()
    );
}

/**
 * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
 * is not the same.
 *
 * @param array|Countable|Traversable $expected
 * @param array|Countable|Traversable $actual
 * @param string                      $message
 */
function assertNotSameSize($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotSameSize',
        func_get_args()
    );
}

/**
 * This assertion is the exact opposite of assertTag().
 *
 * Rather than asserting that $matcher results in a match, it asserts that
 * $matcher does not match.
 *
 * @param array  $matcher
 * @param string $actual
 * @param string $message
 * @param bool   $isHtml
 *
 * @since  Method available since Release 3.3.0
 */
function assertNotTag($matcher, $actual, $message = '', $isHtml = true)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNotTag',
        func_get_args()
    );
}

/**
 * Asserts that a variable is null.
 *
 * @param mixed  $actual
 * @param string $message
 */
function assertNull($actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertNull',
        func_get_args()
    );
}

/**
 * Asserts that an object has a specified attribute.
 *
 * @param string $attributeName
 * @param object $object
 * @param string $message
 *
 * @since  Method available since Release 3.0.0
 */
function assertObjectHasAttribute($attributeName, $object, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertObjectHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that an object does not have a specified attribute.
 *
 * @param string $attributeName
 * @param object $object
 * @param string $message
 *
 * @since  Method available since Release 3.0.0
 */
function assertObjectNotHasAttribute($attributeName, $object, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertObjectNotHasAttribute',
        func_get_args()
    );
}

/**
 * Asserts that a string matches a given regular expression.
 *
 * @param string $pattern
 * @param string $string
 * @param string $message
 */
function assertRegExp($pattern, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertRegExp',
        func_get_args()
    );
}

/**
 * Asserts that two variables have the same type and value.
 * Used on objects, it asserts that two variables reference
 * the same object.
 *
 * @param mixed  $expected
 * @param mixed  $actual
 * @param string $message
 */
function assertSame($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertSame',
        func_get_args()
    );
}

/**
 * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
 * is the same.
 *
 * @param array|Countable|Traversable $expected
 * @param array|Countable|Traversable $actual
 * @param string                      $message
 */
function assertSameSize($expected, $actual, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertSameSize',
        func_get_args()
    );
}

/**
 * Assert the presence, absence, or count of elements in a document matching
 * the CSS $selector, regardless of the contents of those elements.
 *
 * The first argument, $selector, is the CSS selector used to match
 * the elements in the $actual document.
 *
 * The second argument, $count, can be either boolean or numeric.
 * When boolean, it asserts for presence of elements matching the selector
 * (true) or absence of elements (false).
 * When numeric, it asserts the count of elements.
 *
 * assertSelectCount("#binder", true, $xml);  // any?
 * assertSelectCount(".binder", 3, $xml); // exactly 3?
 *
 * @param array  $selector
 * @param int    $count
 * @param mixed  $actual
 * @param string $message
 * @param bool   $isHtml
 *
 * @since  Method available since Release 3.3.0
 */
function assertSelectCount($selector, $count, $actual, $message = '', $isHtml = true)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertSelectCount',
        func_get_args()
    );
}

/**
 * assertSelectEquals("#binder .name", "Chuck", true,  $xml);  // any?
 * assertSelectEquals("#binder .name", "Chuck", false, $xml);  // none?
 *
 * @param array  $selector
 * @param string $content
 * @param int    $count
 * @param mixed  $actual
 * @param string $message
 * @param bool   $isHtml
 *
 * @since  Method available since Release 3.3.0
 */
function assertSelectEquals($selector, $content, $count, $actual, $message = '', $isHtml = true)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertSelectEquals',
        func_get_args()
    );
}

/**
 * assertSelectRegExp("#binder .name", "/Mike|Derek/", true, $xml); // any?
 * assertSelectRegExp("#binder .name", "/Mike|Derek/", 3, $xml);// 3?
 *
 * @param array  $selector
 * @param string $pattern
 * @param int    $count
 * @param mixed  $actual
 * @param string $message
 * @param bool   $isHtml
 *
 * @since  Method available since Release 3.3.0
 */
function assertSelectRegExp($selector, $pattern, $count, $actual, $message = '', $isHtml = true)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertSelectRegExp',
        func_get_args()
    );
}

/**
 * Asserts that a string ends not with a given prefix.
 *
 * @param string $suffix
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.4.0
 */
function assertStringEndsNotWith($suffix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringEndsNotWith',
        func_get_args()
    );
}

/**
 * Asserts that a string ends with a given prefix.
 *
 * @param string $suffix
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.4.0
 */
function assertStringEndsWith($suffix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringEndsWith',
        func_get_args()
    );
}

/**
 * Asserts that the contents of a string is equal
 * to the contents of a file.
 *
 * @param string $expectedFile
 * @param string $actualString
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 *
 * @since  Method available since Release 3.3.0
 */
function assertStringEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringEqualsFile',
        func_get_args()
    );
}

/**
 * Asserts that a string matches a given format string.
 *
 * @param string $format
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.5.0
 */
function assertStringMatchesFormat($format, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringMatchesFormat',
        func_get_args()
    );
}

/**
 * Asserts that a string matches a given format file.
 *
 * @param string $formatFile
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.5.0
 */
function assertStringMatchesFormatFile($formatFile, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringMatchesFormatFile',
        func_get_args()
    );
}

/**
 * Asserts that the contents of a string is not equal
 * to the contents of a file.
 *
 * @param string $expectedFile
 * @param string $actualString
 * @param string $message
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 *
 * @since  Method available since Release 3.3.0
 */
function assertStringNotEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringNotEqualsFile',
        func_get_args()
    );
}

/**
 * Asserts that a string does not match a given format string.
 *
 * @param string $format
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.5.0
 */
function assertStringNotMatchesFormat($format, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringNotMatchesFormat',
        func_get_args()
    );
}

/**
 * Asserts that a string does not match a given format string.
 *
 * @param string $formatFile
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.5.0
 */
function assertStringNotMatchesFormatFile($formatFile, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringNotMatchesFormatFile',
        func_get_args()
    );
}

/**
 * Asserts that a string starts not with a given prefix.
 *
 * @param string $prefix
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.4.0
 */
function assertStringStartsNotWith($prefix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringStartsNotWith',
        func_get_args()
    );
}

/**
 * Asserts that a string starts with a given prefix.
 *
 * @param string $prefix
 * @param string $string
 * @param string $message
 *
 * @since  Method available since Release 3.4.0
 */
function assertStringStartsWith($prefix, $string, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertStringStartsWith',
        func_get_args()
    );
}

/**
 * Evaluate an HTML or XML string and assert its structure and/or contents.
 *
 * The first argument ($matcher) is an associative array that specifies the
 * match criteria for the assertion:
 *
 *  - `id`   : the node with the given id attribute must match the
 * corresponding value.
 *  - `tag`  : the node type must match the corresponding value.
 *  - `attributes`   : a hash. The node's attributes must match the
 * corresponding values in the hash.
 *  - `content`  : The text content must match the given value.
 *  - `parent`   : a hash. The node's parent must match the
 * corresponding hash.
 *  - `child`: a hash. At least one of the node's immediate children
 * must meet the criteria described by the hash.
 *  - `ancestor` : a hash. At least one of the node's ancestors must
 * meet the criteria described by the hash.
 *  - `descendant`   : a hash. At least one of the node's descendants must
 * meet the criteria described by the hash.
 *  - `children` : a hash, for counting children of a node.
 * Accepts the keys:
 *- `count`: a number which must equal the number of children
 *   that match
 *- `less_than`: the number of matching children must be greater
 *   than this number
 *- `greater_than` : the number of matching children must be less than
 *   this number
 *- `only` : another hash consisting of the keys to use to match
 *   on the children, and only matching children will be
 *   counted
 *
 * <code>
 * // Matcher that asserts that there is an element with an id="my_id".
 * $matcher = array('id' => 'my_id');
 *
 * // Matcher that asserts that there is a "span" tag.
 * $matcher = array('tag' => 'span');
 *
 * // Matcher that asserts that there is a "span" tag with the content
 * // "Hello World".
 * $matcher = array('tag' => 'span', 'content' => 'Hello World');
 *
 * // Matcher that asserts that there is a "span" tag with content matching
 * // the regular expression pattern.
 * $matcher = array('tag' => 'span', 'content' => 'regexp:/Try P(HP|ython)/');
 *
 * // Matcher that asserts that there is a "span" with an "list" class
 * // attribute.
 * $matcher = array(
 *   'tag'=> 'span',
 *   'attributes' => array('class' => 'list')
 * );
 *
 * // Matcher that asserts that there is a "span" inside of a "div".
 * $matcher = array(
 *   'tag'=> 'span',
 *   'parent' => array('tag' => 'div')
 * );
 *
 * // Matcher that asserts that there is a "span" somewhere inside a
 * // "table".
 * $matcher = array(
 *   'tag'  => 'span',
 *   'ancestor' => array('tag' => 'table')
 * );
 *
 * // Matcher that asserts that there is a "span" with at least one "em"
 * // child.
 * $matcher = array(
 *   'tag'   => 'span',
 *   'child' => array('tag' => 'em')
 * );
 *
 * // Matcher that asserts that there is a "span" containing a (possibly
 * // nested) "strong" tag.
 * $matcher = array(
 *   'tag'=> 'span',
 *   'descendant' => array('tag' => 'strong')
 * );
 *
 * // Matcher that asserts that there is a "span" containing 5-10 "em" tags
 * // as immediate children.
 * $matcher = array(
 *   'tag'  => 'span',
 *   'children' => array(
 * 'less_than'=> 11,
 * 'greater_than' => 4,
 * 'only' => array('tag' => 'em')
 *   )
 * );
 *
 * // Matcher that asserts that there is a "div", with an "ul" ancestor and
 * // a "li" parent (with class="enum"), and containing a "span" descendant
 * // that contains an element with id="my_test" and the text "Hello World".
 * $matcher = array(
 *   'tag'=> 'div',
 *   'ancestor'   => array('tag' => 'ul'),
 *   'parent' => array(
 * 'tag'=> 'li',
 * 'attributes' => array('class' => 'enum')
 *   ),
 *   'descendant' => array(
 * 'tag'   => 'span',
 * 'child' => array(
 *   'id'  => 'my_test',
 *   'content' => 'Hello World'
 * )
 *   )
 * );
 *
 * // Use assertTag() to apply a $matcher to a piece of $html.
 * $this->assertTag($matcher, $html);
 *
 * // Use assertTag() to apply a $matcher to a piece of $xml.
 * $this->assertTag($matcher, $xml, '', false);
 * </code>
 *
 * The second argument ($actual) is a string containing either HTML or
 * XML text to be tested.
 *
 * The third argument ($message) is an optional message that will be
 * used if the assertion fails.
 *
 * The fourth argument ($html) is an optional flag specifying whether
 * to load the $actual string into a DOMDocument using the HTML or
 * XML load strategy.  It is true by default, which assumes the HTML
 * load strategy.  In many cases, this will be acceptable for XML as well.
 *
 * @param array  $matcher
 * @param string $actual
 * @param string $message
 * @param bool   $isHtml
 *
 * @since  Method available since Release 3.3.0
 */
function assertTag($matcher, $actual, $message = '', $isHtml = true)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertTag',
        func_get_args()
    );
}

/**
 * Evaluates a PHPUnit_Framework_Constraint matcher object.
 *
 * @param  mixed $value
 * @param PHPUnit_Framework_Constraint $constraint
 * @param string                       $message
 *
 * @since  Method available since Release 3.0.0
 */
function assertThat($value, PHPUnit_Framework_Constraint $constraint, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertThat',
        func_get_args()
    );
}

/**
 * Asserts that a condition is true.
 *
 * @param bool   $condition
 * @param string $message
 *
 * @throws PHPUnit_Framework_AssertionFailedError
 */
function assertTrue($condition, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertTrue',
        func_get_args()
    );
}

/**
 * Asserts that two XML files are equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertXmlFileEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML files are not equal.
 *
 * @param string $expectedFile
 * @param string $actualFile
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertXmlFileNotEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are equal.
 *
 * @param string $expectedFile
 * @param string $actualXml
 * @param string $message
 *
 * @since  Method available since Release 3.3.0
 */
function assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertXmlStringEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are equal.
 *
 * @param string $expectedXml
 * @param string $actualXml
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertXmlStringEqualsXmlString',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are not equal.
 *
 * @param string $expectedFile
 * @param string $actualXml
 * @param string $message
 *
 * @since  Method available since Release 3.3.0
 */
function assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertXmlStringNotEqualsXmlFile',
        func_get_args()
    );
}

/**
 * Asserts that two XML documents are not equal.
 *
 * @param string $expectedXml
 * @param string $actualXml
 * @param string $message
 *
 * @since  Method available since Release 3.1.0
 */
function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::assertXmlStringNotEqualsXmlString',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed
 * at the given $index.
 *
 * @param int $index
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtIndex
 *
 * @since  Method available since Release 3.0.0
 */
function at($index)
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::at',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed at least once.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedAtLeastOnce
 *
 * @since  Method available since Release 3.0.0
 */
function atLeastOnce()
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::atLeastOnce',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Attribute matcher object.
 *
 * @param PHPUnit_Framework_Constraint $constraint
 * @param string                       $attributeName
 *
 * @return PHPUnit_Framework_Constraint_Attribute
 *
 * @since  Method available since Release 3.1.0
 */
function attribute(PHPUnit_Framework_Constraint $constraint, $attributeName)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::attribute',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object
 * that is wrapped in a PHPUnit_Framework_Constraint_Attribute matcher
 * object.
 *
 * @param string $attributeName
 * @param mixed  $value
 * @param float  $delta
 * @param int    $maxDepth
 * @param bool   $canonicalize
 * @param bool   $ignoreCase
 *
 * @return PHPUnit_Framework_Constraint_Attribute
 *
 * @since  Method available since Release 3.1.0
 */
function attributeEqualTo($attributeName, $value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::attributeEqualTo',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Callback matcher object.
 *
 * @param callable $callback
 *
 * @return PHPUnit_Framework_Constraint_Callback
 */
function callback($callback)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::callback',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ClassHasAttribute matcher object.
 *
 * @param string $attributeName
 *
 * @return PHPUnit_Framework_Constraint_ClassHasAttribute
 *
 * @since  Method available since Release 3.1.0
 */
function classHasAttribute($attributeName)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::classHasAttribute',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ClassHasStaticAttribute matcher
 * object.
 *
 * @param string $attributeName
 *
 * @return PHPUnit_Framework_Constraint_ClassHasStaticAttribute
 *
 * @since  Method available since Release 3.1.0
 */
function classHasStaticAttribute($attributeName)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::classHasStaticAttribute',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_TraversableContains matcher
 * object.
 *
 * @param mixed $value
 * @param bool  $checkForObjectIdentity
 * @param bool  $checkForNonObjectIdentity
 *
 * @return PHPUnit_Framework_Constraint_TraversableContains
 *
 * @since  Method available since Release 3.0.0
 */
function contains($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::contains',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
 * object.
 *
 * @param string $type
 *
 * @return PHPUnit_Framework_Constraint_TraversableContainsOnly
 *
 * @since  Method available since Release 3.1.4
 */
function containsOnly($type)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::containsOnly',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
 * object.
 *
 * @param string $classname
 *
 * @return PHPUnit_Framework_Constraint_TraversableContainsOnly
 */
function containsOnlyInstancesOf($classname)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::containsOnlyInstancesOf',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsEqual matcher object.
 *
 * @param mixed $value
 * @param float $delta
 * @param int   $maxDepth
 * @param bool  $canonicalize
 * @param bool  $ignoreCase
 *
 * @return PHPUnit_Framework_Constraint_IsEqual
 *
 * @since  Method available since Release 3.0.0
 */
function equalTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::equalTo',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed
 * exactly $count times.
 *
 * @param int $count
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
 *
 * @since  Method available since Release 3.0.0
 */
function exactly($count)
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::exactly',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_FileExists matcher object.
 *
 * @return PHPUnit_Framework_Constraint_FileExists
 *
 * @since  Method available since Release 3.0.0
 */
function fileExists()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::fileExists',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_GreaterThan matcher object.
 *
 * @param mixed $value
 *
 * @return PHPUnit_Framework_Constraint_GreaterThan
 *
 * @since  Method available since Release 3.0.0
 */
function greaterThan($value)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::greaterThan',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
 * a PHPUnit_Framework_Constraint_IsEqual and a
 * PHPUnit_Framework_Constraint_GreaterThan matcher object.
 *
 * @param mixed $value
 *
 * @return PHPUnit_Framework_Constraint_Or
 *
 * @since  Method available since Release 3.1.0
 */
function greaterThanOrEqual($value)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::greaterThanOrEqual',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsIdentical matcher object.
 *
 * @param mixed $value
 *
 * @return PHPUnit_Framework_Constraint_IsIdentical
 *
 * @since  Method available since Release 3.0.0
 */
function identicalTo($value)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::identicalTo',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsEmpty matcher object.
 *
 * @return PHPUnit_Framework_Constraint_IsEmpty
 *
 * @since  Method available since Release 3.5.0
 */
function isEmpty()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::isEmpty',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsFalse matcher object.
 *
 * @return PHPUnit_Framework_Constraint_IsFalse
 *
 * @since  Method available since Release 3.3.0
 */
function isFalse()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::isFalse',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsInstanceOf matcher object.
 *
 * @param string $className
 *
 * @return PHPUnit_Framework_Constraint_IsInstanceOf
 *
 * @since  Method available since Release 3.0.0
 */
function isInstanceOf($className)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::isInstanceOf',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsJson matcher object.
 *
 * @return PHPUnit_Framework_Constraint_IsJson
 *
 * @since  Method available since Release 3.7.20
 */
function isJson()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::isJson',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsNull matcher object.
 *
 * @return PHPUnit_Framework_Constraint_IsNull
 *
 * @since  Method available since Release 3.3.0
 */
function isNull()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::isNull',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsTrue matcher object.
 *
 * @return PHPUnit_Framework_Constraint_IsTrue
 *
 * @since  Method available since Release 3.3.0
 */
function isTrue()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::isTrue',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_IsType matcher object.
 *
 * @param string $type
 *
 * @return PHPUnit_Framework_Constraint_IsType
 *
 * @since  Method available since Release 3.0.0
 */
function isType($type)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::isType',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_LessThan matcher object.
 *
 * @param mixed $value
 *
 * @return PHPUnit_Framework_Constraint_LessThan
 *
 * @since  Method available since Release 3.0.0
 */
function lessThan($value)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::lessThan',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Or matcher object that wraps
 * a PHPUnit_Framework_Constraint_IsEqual and a
 * PHPUnit_Framework_Constraint_LessThan matcher object.
 *
 * @param mixed $value
 *
 * @return PHPUnit_Framework_Constraint_Or
 *
 * @since  Method available since Release 3.1.0
 */
function lessThanOrEqual($value)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::lessThanOrEqual',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_And matcher object.
 *
 * @return PHPUnit_Framework_Constraint_And
 *
 * @since  Method available since Release 3.0.0
 */
function logicalAnd()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::logicalAnd',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Not matcher object.
 *
 * @param PHPUnit_Framework_Constraint $constraint
 *
 * @return PHPUnit_Framework_Constraint_Not
 *
 * @since  Method available since Release 3.0.0
 */
function logicalNot(PHPUnit_Framework_Constraint $constraint)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::logicalNot',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Or matcher object.
 *
 * @return PHPUnit_Framework_Constraint_Or
 *
 * @since  Method available since Release 3.0.0
 */
function logicalOr()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::logicalOr',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_Xor matcher object.
 *
 * @return PHPUnit_Framework_Constraint_Xor
 *
 * @since  Method available since Release 3.0.0
 */
function logicalXor()
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::logicalXor',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringMatches matcher object.
 *
 * @param string $string
 *
 * @return PHPUnit_Framework_Constraint_StringMatches
 *
 * @since  Method available since Release 3.5.0
 */
function matches($string)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::matches',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_PCREMatch matcher object.
 *
 * @param string $pattern
 *
 * @return PHPUnit_Framework_Constraint_PCREMatch
 *
 * @since  Method available since Release 3.0.0
 */
function matchesRegularExpression($pattern)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::matchesRegularExpression',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is never executed.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
 *
 * @since  Method available since Release 3.0.0
 */
function never()
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::never',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_ObjectHasAttribute matcher object.
 *
 * @param string $attributeName
 *
 * @return PHPUnit_Framework_Constraint_ObjectHasAttribute
 *
 * @since  Method available since Release 3.0.0
 */
function objectHasAttribute($attributeName)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::objectHasAttribute',
        func_get_args()
    );
}

/**
 * @param mixed $value, ...
 *
 * @return PHPUnit_Framework_MockObject_Stub_ConsecutiveCalls
 *
 * @since  Method available since Release 3.0.0
 */
function onConsecutiveCalls()
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::onConsecutiveCalls',
        func_get_args()
    );
}

/**
 * Returns a matcher that matches when the method is executed exactly once.
 *
 * @return PHPUnit_Framework_MockObject_Matcher_InvokedCount
 *
 * @since  Method available since Release 3.0.0
 */
function once()
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::once',
        func_get_args()
    );
}

/**
 * @param int $argumentIndex
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnArgument
 *
 * @since  Method available since Release 3.3.0
 */
function returnArgument($argumentIndex)
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::returnArgument',
        func_get_args()
    );
}

/**
 * @param mixed $callback
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnCallback
 *
 * @since  Method available since Release 3.3.0
 */
function returnCallback($callback)
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::returnCallback',
        func_get_args()
    );
}

/**
 * Returns the current object.
 *
 * This method is useful when mocking a fluent interface.
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnSelf
 *
 * @since  Method available since Release 3.6.0
 */
function returnSelf()
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::returnSelf',
        func_get_args()
    );
}

/**
 * @param mixed $value
 *
 * @return PHPUnit_Framework_MockObject_Stub_Return
 *
 * @since  Method available since Release 3.0.0
 */
function returnValue($value)
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::returnValue',
        func_get_args()
    );
}

/**
 * @param array $valueMap
 *
 * @return PHPUnit_Framework_MockObject_Stub_ReturnValueMap
 *
 * @since  Method available since Release 3.6.0
 */
function returnValueMap(array $valueMap)
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::returnValueMap',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringContains matcher object.
 *
 * @param string $string
 * @param bool   $case
 *
 * @return PHPUnit_Framework_Constraint_StringContains
 *
 * @since  Method available since Release 3.0.0
 */
function stringContains($string, $case = true)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::stringContains',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringEndsWith matcher object.
 *
 * @param mixed $suffix
 *
 * @return PHPUnit_Framework_Constraint_StringEndsWith
 *
 * @since  Method available since Release 3.4.0
 */
function stringEndsWith($suffix)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::stringEndsWith',
        func_get_args()
    );
}

/**
 * Returns a PHPUnit_Framework_Constraint_StringStartsWith matcher object.
 *
 * @param mixed $prefix
 *
 * @return PHPUnit_Framework_Constraint_StringStartsWith
 *
 * @since  Method available since Release 3.4.0
 */
function stringStartsWith($prefix)
{
    return call_user_func_array(
        'PHPUnit_Framework_Assert::stringStartsWith',
        func_get_args()
    );
}

/**
 * @param Exception $exception
 *
 * @return PHPUnit_Framework_MockObject_Stub_Exception
 *
 * @since  Method available since Release 3.1.0
 */
function throwException(Exception $exception)
{
    return call_user_func_array(
        'PHPUnit_Framework_TestCase::throwException',
        func_get_args()
    );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
