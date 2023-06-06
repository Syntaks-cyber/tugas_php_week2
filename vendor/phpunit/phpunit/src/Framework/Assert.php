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
namespace PHPUnit\Framework;

use const DEBUG_BACKTRACE_IGNORE_ARGS;
use const PHP_EOL;
use function array_key_exists;
use function array_shift;
use function array_unshift;
use function assert;
use function class_exists;
use function count;
use function debug_backtrace;
use function explode;
use function file_get_contents;
use function func_get_args;
use function implode;
use function interface_exists;
use function is_array;
use function is_bool;
use function is_int;
use function is_iterable;
use function is_object;
use function is_string;
use function preg_match;
use function preg_split;
use function sprintf;
use function strpos;
use ArrayAccess;
use Countable;
use DOMAttr;
use DOMDocument;
use DOMElement;
use PHPUnit\Framework\Constraint\ArrayHasKey;
use PHPUnit\Framework\Constraint\ArraySubset;
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
use PHPUnit\Framework\Constraint\JsonMatches;
use PHPUnit\Framework\Constraint\LessThan;
use PHPUnit\Framework\Constraint\LogicalAnd;
use PHPUnit\Framework\Constraint\LogicalNot;
use PHPUnit\Framework\Constraint\LogicalOr;
use PHPUnit\Framework\Constraint\LogicalXor;
use PHPUnit\Framework\Constraint\ObjectHasAttribute;
use PHPUnit\Framework\Constraint\RegularExpression;
use PHPUnit\Framework\Constraint\SameSize;
use PHPUnit\Framework\Constraint\StringContains;
use PHPUnit\Framework\Constraint\StringEndsWith;
use PHPUnit\Framework\Constraint\StringMatchesFormatDescription;
use PHPUnit\Framework\Constraint\StringStartsWith;
use PHPUnit\Framework\Constraint\TraversableContains;
use PHPUnit\Framework\Constraint\TraversableContainsEqual;
use PHPUnit\Framework\Constraint\TraversableContainsIdentical;
use PHPUnit\Framework\Constraint\TraversableContainsOnly;
use PHPUnit\Util\Type;
use PHPUnit\Util\Xml;
use ReflectionClass;
use ReflectionException;
use ReflectionObject;
use Traversable;

/**
 * A set of assertion methods.
 */
abstract class Assert
=======

/**
 * A set of assertion methods.
 *
 * @since Class available since Release 2.0.0
 */
abstract class PHPUnit_Framework_Assert
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var int
     */
    private static $count = 0;

    /**
     * Asserts that an array has a specified key.
     *
<<<<<<< HEAD
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertArrayHasKey($key, $array, string $message = ''): void
    {
        if (!(is_int($key) || is_string($key))) {
            throw InvalidArgumentException::create(
=======
     * @param mixed             $key
     * @param array|ArrayAccess $array
     * @param string            $message
     *
     * @since Method available since Release 3.0.0
     */
    public static function assertArrayHasKey($key, $array, $message = '')
    {
        if (!(is_integer($key) || is_string($key))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                1,
                'integer or string'
            );
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
<<<<<<< HEAD
            throw InvalidArgumentException::create(
=======
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                2,
                'array or ArrayAccess'
            );
        }

<<<<<<< HEAD
        $constraint = new ArrayHasKey($key);

        static::assertThat($array, $constraint, $message);
=======
        $constraint = new PHPUnit_Framework_Constraint_ArrayHasKey($key);

        self::assertThat($array, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an array has a specified subset.
     *
     * @param array|ArrayAccess $subset
     * @param array|ArrayAccess $array
<<<<<<< HEAD
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @codeCoverageIgnore
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3494
     */
    public static function assertArraySubset($subset, $array, bool $checkForObjectIdentity = false, string $message = ''): void
    {
        self::createWarning('assertArraySubset() is deprecated and will be removed in PHPUnit 9.');

        if (!(is_array($subset) || $subset instanceof ArrayAccess)) {
            throw InvalidArgumentException::create(
=======
     * @param bool              $strict  Check for object identity
     * @param string            $message
     *
     * @since Method available since Release 4.4.0
     */
    public static function assertArraySubset($subset, $array, $strict = false, $message = '')
    {
        if (!(is_array($subset) || $subset instanceof ArrayAccess)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                1,
                'array or ArrayAccess'
            );
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
<<<<<<< HEAD
            throw InvalidArgumentException::create(
=======
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                2,
                'array or ArrayAccess'
            );
        }

<<<<<<< HEAD
        $constraint = new ArraySubset($subset, $checkForObjectIdentity);

        static::assertThat($array, $constraint, $message);
=======
        $constraint = new PHPUnit_Framework_Constraint_ArraySubset($subset, $strict);

        self::assertThat($array, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an array does not have a specified key.
     *
<<<<<<< HEAD
     * @param int|string        $key
     * @param array|ArrayAccess $array
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertArrayNotHasKey($key, $array, string $message = ''): void
    {
        if (!(is_int($key) || is_string($key))) {
            throw InvalidArgumentException::create(
=======
     * @param mixed             $key
     * @param array|ArrayAccess $array
     * @param string            $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertArrayNotHasKey($key, $array, $message = '')
    {
        if (!(is_integer($key) || is_string($key))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                1,
                'integer or string'
            );
        }

        if (!(is_array($array) || $array instanceof ArrayAccess)) {
<<<<<<< HEAD
            throw InvalidArgumentException::create(
=======
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                2,
                'array or ArrayAccess'
            );
        }

<<<<<<< HEAD
        $constraint = new LogicalNot(
            new ArrayHasKey($key)
        );

        static::assertThat($array, $constraint, $message);
=======
        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ArrayHasKey($key)
        );

        self::assertThat($array, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a haystack contains a needle.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        // @codeCoverageIgnoreStart
        if (is_string($haystack)) {
            self::createWarning('Using assertContains() with string haystacks is deprecated and will not be supported in PHPUnit 9. Refactor your test to use assertStringContainsString() or assertStringContainsStringIgnoringCase() instead.');
        }

        if (!$checkForObjectIdentity) {
            self::createWarning('The optional $checkForObjectIdentity parameter of assertContains() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertContainsEquals() instead.');
        }

        if ($checkForNonObjectIdentity) {
            self::createWarning('The optional $checkForNonObjectIdentity parameter of assertContains() is deprecated and will be removed in PHPUnit 9.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertContains() is deprecated and will be removed in PHPUnit 9.');
        }
        // @codeCoverageIgnoreEnd

        if (is_array($haystack) ||
            (is_object($haystack) && $haystack instanceof Traversable)) {
            $constraint = new TraversableContains(
=======
     * @param mixed  $needle
     * @param mixed  $haystack
     * @param string $message
     * @param bool   $ignoreCase
     * @param bool   $checkForObjectIdentity
     * @param bool   $checkForNonObjectIdentity
     *
     * @since  Method available since Release 2.1.0
     */
    public static function assertContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        if (is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable) {
            $constraint = new PHPUnit_Framework_Constraint_TraversableContains(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $needle,
                $checkForObjectIdentity,
                $checkForNonObjectIdentity
            );
        } elseif (is_string($haystack)) {
            if (!is_string($needle)) {
<<<<<<< HEAD
                throw InvalidArgumentException::create(
=======
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    1,
                    'string'
                );
            }

<<<<<<< HEAD
            $constraint = new StringContains(
=======
            $constraint = new PHPUnit_Framework_Constraint_StringContains(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $needle,
                $ignoreCase
            );
        } else {
<<<<<<< HEAD
            throw InvalidArgumentException::create(
=======
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                2,
                'array, traversable or string'
            );
        }

<<<<<<< HEAD
        static::assertThat($haystack, $constraint, $message);
    }

    public static function assertContainsEquals($needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new TraversableContainsEqual($needle);

        static::assertThat($haystack, $constraint, $message);
=======
        self::assertThat($haystack, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains a needle.
     *
<<<<<<< HEAD
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        self::createWarning('assertAttributeContains() is deprecated and will be removed in PHPUnit 9.');

        static::assertContains(
            $needle,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
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
    public static function assertAttributeContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        self::assertContains(
            $needle,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message,
            $ignoreCase,
            $checkForObjectIdentity,
            $checkForNonObjectIdentity
        );
    }

    /**
     * Asserts that a haystack does not contain a needle.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertNotContains($needle, $haystack, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        // @codeCoverageIgnoreStart
        if (is_string($haystack)) {
            self::createWarning('Using assertNotContains() with string haystacks is deprecated and will not be supported in PHPUnit 9. Refactor your test to use assertStringNotContainsString() or assertStringNotContainsStringIgnoringCase() instead.');
        }

        if (!$checkForObjectIdentity) {
            self::createWarning('The optional $checkForObjectIdentity parameter of assertNotContains() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertNotContainsEquals() instead.');
        }

        if ($checkForNonObjectIdentity) {
            self::createWarning('The optional $checkForNonObjectIdentity parameter of assertNotContains() is deprecated and will be removed in PHPUnit 9.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertNotContains() is deprecated and will be removed in PHPUnit 9.');
        }
        // @codeCoverageIgnoreEnd

        if (is_array($haystack) ||
            (is_object($haystack) && $haystack instanceof Traversable)) {
            $constraint = new LogicalNot(
                new TraversableContains(
=======
     * @param mixed  $needle
     * @param mixed  $haystack
     * @param string $message
     * @param bool   $ignoreCase
     * @param bool   $checkForObjectIdentity
     * @param bool   $checkForNonObjectIdentity
     *
     * @since  Method available since Release 2.1.0
     */
    public static function assertNotContains($needle, $haystack, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        if (is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable) {
            $constraint = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_TraversableContains(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $needle,
                    $checkForObjectIdentity,
                    $checkForNonObjectIdentity
                )
            );
        } elseif (is_string($haystack)) {
            if (!is_string($needle)) {
<<<<<<< HEAD
                throw InvalidArgumentException::create(
=======
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    1,
                    'string'
                );
            }

<<<<<<< HEAD
            $constraint = new LogicalNot(
                new StringContains(
=======
            $constraint = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_StringContains(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $needle,
                    $ignoreCase
                )
            );
        } else {
<<<<<<< HEAD
            throw InvalidArgumentException::create(
=======
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                2,
                'array, traversable or string'
            );
        }

<<<<<<< HEAD
        static::assertThat($haystack, $constraint, $message);
    }

    public static function assertNotContainsEquals($needle, iterable $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new TraversableContainsEqual($needle));

        static::assertThat($haystack, $constraint, $message);
=======
        self::assertThat($haystack, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain a needle.
     *
<<<<<<< HEAD
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeNotContains($needle, string $haystackAttributeName, $haystackClassOrObject, string $message = '', bool $ignoreCase = false, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): void
    {
        self::createWarning('assertAttributeNotContains() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotContains(
            $needle,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
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
    public static function assertAttributeNotContains($needle, $haystackAttributeName, $haystackClassOrObject, $message = '', $ignoreCase = false, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        self::assertNotContains(
            $needle,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message,
            $ignoreCase,
            $checkForObjectIdentity,
            $checkForNonObjectIdentity
        );
    }

    /**
     * Asserts that a haystack contains only values of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        if ($isNativeType === null) {
            $isNativeType = Type::isType($type);
        }

        static::assertThat(
            $haystack,
            new TraversableContainsOnly(
=======
     * @param string $type
     * @param mixed  $haystack
     * @param bool   $isNativeType
     * @param string $message
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertContainsOnly($type, $haystack, $isNativeType = null, $message = '')
    {
        if (!(is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or traversable'
            );
        }

        if ($isNativeType == null) {
            $isNativeType = PHPUnit_Util_Type::isType($type);
        }

        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_TraversableContainsOnly(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $type,
                $isNativeType
            ),
            $message
        );
    }

    /**
<<<<<<< HEAD
     * Asserts that a haystack contains only instances of a given class name.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertContainsOnlyInstancesOf(string $className, iterable $haystack, string $message = ''): void
    {
        static::assertThat(
            $haystack,
            new TraversableContainsOnly(
                $className,
=======
     * Asserts that a haystack contains only instances of a given classname
     *
     * @param string            $classname
     * @param array|Traversable $haystack
     * @param string            $message
     */
    public static function assertContainsOnlyInstancesOf($classname, $haystack, $message = '')
    {
        if (!(is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or traversable'
            );
        }

        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_TraversableContainsOnly(
                $classname,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                false
            ),
            $message
        );
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object contains only values of a given type.
     *
<<<<<<< HEAD
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
     */
    public static function assertAttributeContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = ''): void
    {
        self::createWarning('assertAttributeContainsOnly() is deprecated and will be removed in PHPUnit 9.');

        static::assertContainsOnly(
            $type,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string $type
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param bool   $isNativeType
     * @param string $message
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertAttributeContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
    {
        self::assertContainsOnly(
            $type,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $isNativeType,
            $message
        );
    }

    /**
     * Asserts that a haystack does not contain only values of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotContainsOnly(string $type, iterable $haystack, ?bool $isNativeType = null, string $message = ''): void
    {
        if ($isNativeType === null) {
            $isNativeType = Type::isType($type);
        }

        static::assertThat(
            $haystack,
            new LogicalNot(
                new TraversableContainsOnly(
=======
     * @param string $type
     * @param mixed  $haystack
     * @param bool   $isNativeType
     * @param string $message
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertNotContainsOnly($type, $haystack, $isNativeType = null, $message = '')
    {
        if (!(is_array($haystack) ||
            is_object($haystack) && $haystack instanceof Traversable)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                2,
                'array or traversable'
            );
        }

        if ($isNativeType == null) {
            $isNativeType = PHPUnit_Util_Type::isType($type);
        }

        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_TraversableContainsOnly(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    $type,
                    $isNativeType
                )
            ),
            $message
        );
    }

    /**
     * Asserts that a haystack that is stored in a static attribute of a class
     * or an attribute of an object does not contain only values of a given
     * type.
     *
<<<<<<< HEAD
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
     */
    public static function assertAttributeNotContainsOnly(string $type, string $haystackAttributeName, $haystackClassOrObject, ?bool $isNativeType = null, string $message = ''): void
    {
        self::createWarning('assertAttributeNotContainsOnly() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotContainsOnly(
            $type,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string $type
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param bool   $isNativeType
     * @param string $message
     *
     * @since  Method available since Release 3.1.4
     */
    public static function assertAttributeNotContainsOnly($type, $haystackAttributeName, $haystackClassOrObject, $isNativeType = null, $message = '')
    {
        self::assertNotContainsOnly(
            $type,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $isNativeType,
            $message
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
<<<<<<< HEAD
     * @param Countable|iterable $haystack
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertCount(int $expectedCount, $haystack, string $message = ''): void
    {
        if (!$haystack instanceof Countable && !is_iterable($haystack)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
        }

        static::assertThat(
            $haystack,
            new Count($expectedCount),
=======
     * @param int    $expectedCount
     * @param mixed  $haystack
     * @param string $message
     */
    public static function assertCount($expectedCount, $haystack, $message = '')
    {
        if (!is_int($expectedCount)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

        if (!$haystack instanceof Countable &&
            !$haystack instanceof Traversable &&
            !is_array($haystack)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        self::assertThat(
            $haystack,
            new PHPUnit_Framework_Constraint_Count($expectedCount),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
<<<<<<< HEAD
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeCount() is deprecated and will be removed in PHPUnit 9.');

        static::assertCount(
            $expectedCount,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param int    $expectedCount
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.6.0
     */
    public static function assertAttributeCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertCount(
            $expectedCount,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable.
     *
<<<<<<< HEAD
     * @param Countable|iterable $haystack
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertNotCount(int $expectedCount, $haystack, string $message = ''): void
    {
        if (!$haystack instanceof Countable && !is_iterable($haystack)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
        }

        $constraint = new LogicalNot(
            new Count($expectedCount)
        );

        static::assertThat($haystack, $constraint, $message);
=======
     * @param int    $expectedCount
     * @param mixed  $haystack
     * @param string $message
     */
    public static function assertNotCount($expectedCount, $haystack, $message = '')
    {
        if (!is_int($expectedCount)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'integer');
        }

        if (!$haystack instanceof Countable &&
            !$haystack instanceof Traversable &&
            !is_array($haystack)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_Count($expectedCount)
        );

        self::assertThat($haystack, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts the number of elements of an array, Countable or Traversable
     * that is stored in an attribute.
     *
<<<<<<< HEAD
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeNotCount(int $expectedCount, string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeNotCount() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotCount(
            $expectedCount,
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param int    $expectedCount
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.6.0
     */
    public static function assertAttributeNotCount($expectedCount, $haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertNotCount(
            $expectedCount,
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that two variables are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEquals($expected, $actual, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        // @codeCoverageIgnoreStart
        if ($delta !== 0.0) {
            self::createWarning('The optional $delta parameter of assertEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertEqualsWithDelta() instead.');
        }

        if ($maxDepth !== 10) {
            self::createWarning('The optional $maxDepth parameter of assertEquals() is deprecated and will be removed in PHPUnit 9.');
        }

        if ($canonicalize) {
            self::createWarning('The optional $canonicalize parameter of assertEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertEqualsCanonicalizing() instead.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertEqualsIgnoringCase() instead.');
        }
        // @codeCoverageIgnoreEnd

        $constraint = new IsEqual(
=======
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     */
    public static function assertEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $constraint = new PHPUnit_Framework_Constraint_IsEqual(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $expected,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );

<<<<<<< HEAD
        static::assertThat($actual, $constraint, $message);
    }

    /**
     * Asserts that two variables are equal (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEqualsCanonicalizing($expected, $actual, string $message = ''): void
    {
        $constraint = new IsEqual(
            $expected,
            0.0,
            10,
            true,
            false
        );

        static::assertThat($actual, $constraint, $message);
    }

    /**
     * Asserts that two variables are equal (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEqualsIgnoringCase($expected, $actual, string $message = ''): void
    {
        $constraint = new IsEqual(
            $expected,
            0.0,
            10,
            false,
            true
        );

        static::assertThat($actual, $constraint, $message);
    }

    /**
     * Asserts that two variables are equal (with delta).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
    {
        $constraint = new IsEqual(
            $expected,
            $delta
        );

        static::assertThat($actual, $constraint, $message);
=======
        self::assertThat($actual, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a variable is equal to an attribute of an object.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        self::createWarning('assertAttributeEquals() is deprecated and will be removed in PHPUnit 9.');

        static::assertEquals(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     */
    public static function assertAttributeEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        self::assertEquals(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
     * Asserts that two variables are not equal.
     *
<<<<<<< HEAD
     * @param float $delta
     * @param int   $maxDepth
     * @param bool  $canonicalize
     * @param bool  $ignoreCase
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEquals($expected, $actual, string $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false): void
    {
        // @codeCoverageIgnoreStart
        if ($delta !== 0.0) {
            self::createWarning('The optional $delta parameter of assertNotEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertNotEqualsWithDelta() instead.');
        }

        if ($maxDepth !== 10) {
            self::createWarning('The optional $maxDepth parameter of assertNotEquals() is deprecated and will be removed in PHPUnit 9.');
        }

        if ($canonicalize) {
            self::createWarning('The optional $canonicalize parameter of assertNotEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertNotEqualsCanonicalizing() instead.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertNotEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertNotEqualsIgnoringCase() instead.');
        }
        // @codeCoverageIgnoreEnd

        $constraint = new LogicalNot(
            new IsEqual(
=======
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
    public static function assertNotEquals($expected, $actual, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsEqual(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $expected,
                $delta,
                $maxDepth,
                $canonicalize,
                $ignoreCase
            )
        );

<<<<<<< HEAD
        static::assertThat($actual, $constraint, $message);
    }

    /**
     * Asserts that two variables are not equal (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEqualsCanonicalizing($expected, $actual, string $message = ''): void
    {
        $constraint = new LogicalNot(
            new IsEqual(
                $expected,
                0.0,
                10,
                true,
                false
            )
        );

        static::assertThat($actual, $constraint, $message);
    }

    /**
     * Asserts that two variables are not equal (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEqualsIgnoringCase($expected, $actual, string $message = ''): void
    {
        $constraint = new LogicalNot(
            new IsEqual(
                $expected,
                0.0,
                10,
                false,
                true
            )
        );

        static::assertThat($actual, $constraint, $message);
    }

    /**
     * Asserts that two variables are not equal (with delta).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotEqualsWithDelta($expected, $actual, float $delta, string $message = ''): void
    {
        $constraint = new LogicalNot(
            new IsEqual(
                $expected,
                $delta
            )
        );

        static::assertThat($actual, $constraint, $message);
=======
        self::assertThat($actual, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a variable is not equal to an attribute of an object.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeNotEquals($expected, string $actualAttributeName, $actualClassOrObject, string $message = '', float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): void
    {
        self::createWarning('assertAttributeNotEquals() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotEquals(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     * @param float  $delta
     * @param int    $maxDepth
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     */
    public static function assertAttributeNotEquals($expected, $actualAttributeName, $actualClassOrObject, $message = '', $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        self::assertNotEquals(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
        );
    }

    /**
     * Asserts that a variable is empty.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert empty $actual
     */
    public static function assertEmpty($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isEmpty(), $message);
=======
     * @param mixed  $actual
     * @param string $message
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertEmpty($actual, $message = '')
    {
        self::assertThat($actual, self::isEmpty(), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is empty.
     *
<<<<<<< HEAD
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeEmpty() is deprecated and will be removed in PHPUnit 9.');

        static::assertEmpty(
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertEmpty(
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a variable is not empty.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !empty $actual
     */
    public static function assertNotEmpty($actual, string $message = ''): void
    {
        static::assertThat($actual, static::logicalNot(static::isEmpty()), $message);
=======
     * @param mixed  $actual
     * @param string $message
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertNotEmpty($actual, $message = '')
    {
        self::assertThat($actual, self::logicalNot(self::isEmpty()), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a static attribute of a class or an attribute of an object
     * is not empty.
     *
<<<<<<< HEAD
     * @param object|string $haystackClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeNotEmpty(string $haystackAttributeName, $haystackClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeNotEmpty() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotEmpty(
            static::readAttribute($haystackClassOrObject, $haystackAttributeName),
=======
     * @param string $haystackAttributeName
     * @param mixed  $haystackClassOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeNotEmpty($haystackAttributeName, $haystackClassOrObject, $message = '')
    {
        self::assertNotEmpty(
            self::readAttribute($haystackClassOrObject, $haystackAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a value is greater than another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertGreaterThan($expected, $actual, string $message = ''): void
    {
        static::assertThat($actual, static::greaterThan($expected), $message);
=======
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertGreaterThan($expected, $actual, $message = '')
    {
        self::assertThat($actual, self::greaterThan($expected), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an attribute is greater than another value.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeGreaterThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeGreaterThan() is deprecated and will be removed in PHPUnit 9.');

        static::assertGreaterThan(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeGreaterThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertGreaterThan(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a value is greater than or equal to another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertGreaterThanOrEqual($expected, $actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            static::greaterThanOrEqual($expected),
=======
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertGreaterThanOrEqual($expected, $actual, $message = '')
    {
        self::assertThat(
            $actual,
            self::greaterThanOrEqual($expected),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that an attribute is greater than or equal to another value.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeGreaterThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeGreaterThanOrEqual() is deprecated and will be removed in PHPUnit 9.');

        static::assertGreaterThanOrEqual(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeGreaterThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertGreaterThanOrEqual(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a value is smaller than another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertLessThan($expected, $actual, string $message = ''): void
    {
        static::assertThat($actual, static::lessThan($expected), $message);
=======
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertLessThan($expected, $actual, $message = '')
    {
        self::assertThat($actual, self::lessThan($expected), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an attribute is smaller than another value.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeLessThan($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeLessThan() is deprecated and will be removed in PHPUnit 9.');

        static::assertLessThan(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeLessThan($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertLessThan(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a value is smaller than or equal to another value.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertLessThanOrEqual($expected, $actual, string $message = ''): void
    {
        static::assertThat($actual, static::lessThanOrEqual($expected), $message);
=======
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertLessThanOrEqual($expected, $actual, $message = '')
    {
        self::assertThat($actual, self::lessThanOrEqual($expected), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an attribute is smaller than or equal to another value.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeLessThanOrEqual($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeLessThanOrEqual() is deprecated and will be removed in PHPUnit 9.');

        static::assertLessThanOrEqual(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param string $actualClassOrObject
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertAttributeLessThanOrEqual($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertLessThanOrEqual(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        // @codeCoverageIgnoreStart
        if ($canonicalize) {
            self::createWarning('The optional $canonicalize parameter of assertFileEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertFileEqualsCanonicalizing() instead.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertFileEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertFileEqualsIgnoringCase() instead.');
        }
        // @codeCoverageIgnoreEnd

        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new IsEqual(
            file_get_contents($expected),
            0.0,
=======
     * @param string $expected
     * @param string $actual
     * @param string $message
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     *
     * @since  Method available since Release 3.2.14
     */
    public static function assertFileEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);

        self::assertEquals(
            file_get_contents($expected),
            file_get_contents($actual),
            $message,
            0,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            10,
            $canonicalize,
            $ignoreCase
        );
<<<<<<< HEAD

        static::assertThat(file_get_contents($actual), $constraint, $message);
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new IsEqual(
            file_get_contents($expected),
            0.0,
            10,
            true
        );

        static::assertThat(file_get_contents($actual), $constraint, $message);
    }

    /**
     * Asserts that the contents of one file is equal to the contents of another
     * file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new IsEqual(
            file_get_contents($expected),
            0.0,
            10,
            false,
            true
        );

        static::assertThat(file_get_contents($actual), $constraint, $message);
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of
     * another file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotEquals(string $expected, string $actual, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        // @codeCoverageIgnoreStart
        if ($canonicalize) {
            self::createWarning('The optional $canonicalize parameter of assertFileNotEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertFileNotEqualsCanonicalizing() instead.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertFileNotEquals() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertFileNotEqualsIgnoringCase() instead.');
        }
        // @codeCoverageIgnoreEnd

        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new LogicalNot(
            new IsEqual(
                file_get_contents($expected),
                0.0,
                10,
                $canonicalize,
                $ignoreCase
            )
        );

        static::assertThat(file_get_contents($actual), $constraint, $message);
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of another
     * file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotEqualsCanonicalizing(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new LogicalNot(
            new IsEqual(
                file_get_contents($expected),
                0.0,
                10,
                true
            )
        );

        static::assertThat(file_get_contents($actual), $constraint, $message);
    }

    /**
     * Asserts that the contents of one file is not equal to the contents of another
     * file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotEqualsIgnoringCase(string $expected, string $actual, string $message = ''): void
    {
        static::assertFileExists($expected, $message);
        static::assertFileExists($actual, $message);

        $constraint = new LogicalNot(
            new IsEqual(
                file_get_contents($expected),
                0.0,
                10,
                false,
                true
            )
        );

        static::assertThat(file_get_contents($actual), $constraint, $message);
    }

    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        // @codeCoverageIgnoreStart
        if ($canonicalize) {
            self::createWarning('The optional $canonicalize parameter of assertStringEqualsFile() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertStringEqualsFileCanonicalizing() instead.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertStringEqualsFile() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertStringEqualsFileIgnoringCase() instead.');
        }
        // @codeCoverageIgnoreEnd

        static::assertFileExists($expectedFile, $message);

        $constraint = new IsEqual(
            file_get_contents($expectedFile),
            0.0,
=======
     * @param string $expected
     * @param string $actual
     * @param string $message
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     *
     * @since  Method available since Release 3.2.14
     */
    public static function assertFileNotEquals($expected, $actual, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expected, $message);
        self::assertFileExists($actual, $message);

        self::assertNotEquals(
            file_get_contents($expected),
            file_get_contents($actual),
            $message,
            0,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            10,
            $canonicalize,
            $ignoreCase
        );
<<<<<<< HEAD

        static::assertThat($actualString, $constraint, $message);
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that the contents of a string is equal
<<<<<<< HEAD
     * to the contents of a file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);

        $constraint = new IsEqual(
            file_get_contents($expectedFile),
            0.0,
            10,
            true
        );

        static::assertThat($actualString, $constraint, $message);
    }

    /**
     * Asserts that the contents of a string is equal
     * to the contents of a file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);

        $constraint = new IsEqual(
            file_get_contents($expectedFile),
            0.0,
            10,
            false,
            true
        );

        static::assertThat($actualString, $constraint, $message);
=======
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
    public static function assertStringEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expectedFile, $message);

        self::assertEquals(
            file_get_contents($expectedFile),
            $actualString,
            $message,
            0,
            10,
            $canonicalize,
            $ignoreCase
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotEqualsFile(string $expectedFile, string $actualString, string $message = '', bool $canonicalize = false, bool $ignoreCase = false): void
    {
        // @codeCoverageIgnoreStart
        if ($canonicalize) {
            self::createWarning('The optional $canonicalize parameter of assertStringNotEqualsFile() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertStringNotEqualsFileCanonicalizing() instead.');
        }

        if ($ignoreCase) {
            self::createWarning('The optional $ignoreCase parameter of assertStringNotEqualsFile() is deprecated and will be removed in PHPUnit 9. Refactor your test to use assertStringNotEqualsFileIgnoringCase() instead.');
        }
        // @codeCoverageIgnoreEnd

        static::assertFileExists($expectedFile, $message);

        $constraint = new LogicalNot(
            new IsEqual(
                file_get_contents($expectedFile),
                0.0,
                10,
                $canonicalize,
                $ignoreCase
            )
        );

        static::assertThat($actualString, $constraint, $message);
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file (canonicalizing).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotEqualsFileCanonicalizing(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);

        $constraint = new LogicalNot(
            new IsEqual(
                file_get_contents($expectedFile),
                0.0,
                10,
                true
            )
        );

        static::assertThat($actualString, $constraint, $message);
    }

    /**
     * Asserts that the contents of a string is not equal
     * to the contents of a file (ignoring case).
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotEqualsFileIgnoringCase(string $expectedFile, string $actualString, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);

        $constraint = new LogicalNot(
            new IsEqual(
                file_get_contents($expectedFile),
                0.0,
                10,
                false,
                true
            )
        );

        static::assertThat($actualString, $constraint, $message);
    }

    /**
     * Asserts that a file/dir is readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertIsReadable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new IsReadable, $message);
    }

    /**
     * Asserts that a file/dir exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotIsReadable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new LogicalNot(new IsReadable), $message);
    }

    /**
     * Asserts that a file/dir exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertIsWritable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new IsWritable, $message);
    }

    /**
     * Asserts that a file/dir exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotIsWritable(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new LogicalNot(new IsWritable), $message);
    }

    /**
     * Asserts that a directory exists.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryExists(string $directory, string $message = ''): void
    {
        static::assertThat($directory, new DirectoryExists, $message);
    }

    /**
     * Asserts that a directory does not exist.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryNotExists(string $directory, string $message = ''): void
    {
        static::assertThat($directory, new LogicalNot(new DirectoryExists), $message);
    }

    /**
     * Asserts that a directory exists and is readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryIsReadable(string $directory, string $message = ''): void
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsReadable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryNotIsReadable(string $directory, string $message = ''): void
    {
        self::assertDirectoryExists($directory, $message);
        self::assertNotIsReadable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryIsWritable(string $directory, string $message = ''): void
    {
        self::assertDirectoryExists($directory, $message);
        self::assertIsWritable($directory, $message);
    }

    /**
     * Asserts that a directory exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertDirectoryNotIsWritable(string $directory, string $message = ''): void
    {
        self::assertDirectoryExists($directory, $message);
        self::assertNotIsWritable($directory, $message);
=======
     * @param string $expectedFile
     * @param string $actualString
     * @param string $message
     * @param bool   $canonicalize
     * @param bool   $ignoreCase
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertStringNotEqualsFile($expectedFile, $actualString, $message = '', $canonicalize = false, $ignoreCase = false)
    {
        self::assertFileExists($expectedFile, $message);

        self::assertNotEquals(
            file_get_contents($expectedFile),
            $actualString,
            $message,
            0,
            10,
            $canonicalize,
            $ignoreCase
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a file exists.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileExists(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new FileExists, $message);
=======
     * @param string $filename
     * @param string $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertFileExists($filename, $message = '')
    {
        if (!is_string($filename)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_FileExists;

        self::assertThat($filename, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a file does not exist.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotExists(string $filename, string $message = ''): void
    {
        static::assertThat($filename, new LogicalNot(new FileExists), $message);
    }

    /**
     * Asserts that a file exists and is readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileIsReadable(string $file, string $message = ''): void
    {
        self::assertFileExists($file, $message);
        self::assertIsReadable($file, $message);
    }

    /**
     * Asserts that a file exists and is not readable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotIsReadable(string $file, string $message = ''): void
    {
        self::assertFileExists($file, $message);
        self::assertNotIsReadable($file, $message);
    }

    /**
     * Asserts that a file exists and is writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileIsWritable(string $file, string $message = ''): void
    {
        self::assertFileExists($file, $message);
        self::assertIsWritable($file, $message);
    }

    /**
     * Asserts that a file exists and is not writable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFileNotIsWritable(string $file, string $message = ''): void
    {
        self::assertFileExists($file, $message);
        self::assertNotIsWritable($file, $message);
=======
     * @param string $filename
     * @param string $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertFileNotExists($filename, $message = '')
    {
        if (!is_string($filename)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_FileExists
        );

        self::assertThat($filename, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a condition is true.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert true $condition
     */
    public static function assertTrue($condition, string $message = ''): void
    {
        static::assertThat($condition, static::isTrue(), $message);
=======
     * @param bool   $condition
     * @param string $message
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertTrue($condition, $message = '')
    {
        self::assertThat($condition, self::isTrue(), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a condition is not true.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !true $condition
     */
    public static function assertNotTrue($condition, string $message = ''): void
    {
        static::assertThat($condition, static::logicalNot(static::isTrue()), $message);
=======
     * @param bool   $condition
     * @param string $message
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertNotTrue($condition, $message = '')
    {
        self::assertThat($condition, self::logicalNot(self::isTrue()), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a condition is false.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert false $condition
     */
    public static function assertFalse($condition, string $message = ''): void
    {
        static::assertThat($condition, static::isFalse(), $message);
=======
     * @param bool   $condition
     * @param string $message
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertFalse($condition, $message = '')
    {
        self::assertThat($condition, self::isFalse(), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a condition is not false.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !false $condition
     */
    public static function assertNotFalse($condition, string $message = ''): void
    {
        static::assertThat($condition, static::logicalNot(static::isFalse()), $message);
    }

    /**
     * Asserts that a variable is null.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert null $actual
     */
    public static function assertNull($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isNull(), $message);
=======
     * @param bool   $condition
     * @param string $message
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function assertNotFalse($condition, $message = '')
    {
        self::assertThat($condition, self::logicalNot(self::isFalse()), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a variable is not null.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !null $actual
     */
    public static function assertNotNull($actual, string $message = ''): void
    {
        static::assertThat($actual, static::logicalNot(static::isNull()), $message);
    }

    /**
     * Asserts that a variable is finite.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertFinite($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isFinite(), $message);
    }

    /**
     * Asserts that a variable is infinite.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertInfinite($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isInfinite(), $message);
    }

    /**
     * Asserts that a variable is nan.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNan($actual, string $message = ''): void
    {
        static::assertThat($actual, static::isNan(), $message);
=======
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertNotNull($actual, $message = '')
    {
        self::assertThat($actual, self::logicalNot(self::isNull()), $message);
    }

    /**
     * Asserts that a variable is null.
     *
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertNull($actual, $message = '')
    {
        self::assertThat($actual, self::isNull(), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a class has a specified attribute.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertClassHasAttribute(string $attributeName, string $className, string $message = ''): void
    {
        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat($className, new ClassHasAttribute($attributeName), $message);
=======
     * @param string $attributeName
     * @param string $className
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassHasAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_ClassHasAttribute(
            $attributeName
        );

        self::assertThat($className, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a class does not have a specified attribute.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertClassNotHasAttribute(string $attributeName, string $className, string $message = ''): void
    {
        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat(
            $className,
            new LogicalNot(
                new ClassHasAttribute($attributeName)
            ),
            $message
        );
=======
     * @param string $attributeName
     * @param string $className
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassNotHasAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ClassHasAttribute($attributeName)
        );

        self::assertThat($className, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a class has a specified static attribute.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertClassHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
    {
        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat(
            $className,
            new ClassHasStaticAttribute($attributeName),
            $message
        );
=======
     * @param string $attributeName
     * @param string $className
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassHasStaticAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
            $attributeName
        );

        self::assertThat($className, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a class does not have a specified static attribute.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertClassNotHasStaticAttribute(string $attributeName, string $className, string $message = ''): void
    {
        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(2, 'class name');
        }

        static::assertThat(
            $className,
            new LogicalNot(
                new ClassHasStaticAttribute($attributeName)
            ),
            $message
        );
=======
     * @param string $attributeName
     * @param string $className
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertClassNotHasStaticAttribute($attributeName, $className, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_string($className) || !class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'class name', $className);
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
                $attributeName
            )
        );

        self::assertThat($className, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an object has a specified attribute.
     *
<<<<<<< HEAD
     * @param object $object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertObjectHasAttribute(string $attributeName, $object, string $message = ''): void
    {
        if (!self::isValidObjectAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw InvalidArgumentException::create(2, 'object');
        }

        static::assertThat(
            $object,
            new ObjectHasAttribute($attributeName),
            $message
        );
=======
     * @param string $attributeName
     * @param object $object
     * @param string $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertObjectHasAttribute($attributeName, $object, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'object');
        }

        $constraint = new PHPUnit_Framework_Constraint_ObjectHasAttribute(
            $attributeName
        );

        self::assertThat($object, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an object does not have a specified attribute.
     *
<<<<<<< HEAD
     * @param object $object
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertObjectNotHasAttribute(string $attributeName, $object, string $message = ''): void
    {
        if (!self::isValidObjectAttributeName($attributeName)) {
            throw InvalidArgumentException::create(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw InvalidArgumentException::create(2, 'object');
        }

        static::assertThat(
            $object,
            new LogicalNot(
                new ObjectHasAttribute($attributeName)
            ),
            $message
        );
=======
     * @param string $attributeName
     * @param object $object
     * @param string $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertObjectNotHasAttribute($attributeName, $object, $message = '')
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'valid attribute name');
        }

        if (!is_object($object)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'object');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_ObjectHasAttribute($attributeName)
        );

        self::assertThat($object, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two variables have the same type and value.
     * Used on objects, it asserts that two variables reference
     * the same object.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-template ExpectedType
     *
     * @psalm-param ExpectedType $expected
     *
     * @psalm-assert =ExpectedType $actual
     */
    public static function assertSame($expected, $actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsIdentical($expected),
            $message
        );
=======
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertSame($expected, $actual, $message = '')
    {
        if (is_bool($expected) && is_bool($actual)) {
            self::assertEquals($expected, $actual, $message);
        } else {
            $constraint = new PHPUnit_Framework_Constraint_IsIdentical(
                $expected
            );

            self::assertThat($actual, $constraint, $message);
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a variable and an attribute of an object have the same type
     * and value.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeSame() is deprecated and will be removed in PHPUnit 9.');

        static::assertSame(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param object $actualClassOrObject
     * @param string $message
     */
    public static function assertAttributeSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertSame(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that two variables do not have the same type and value.
     * Used on objects, it asserts that two variables do not reference
     * the same object.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotSame($expected, $actual, string $message = ''): void
    {
        if (is_bool($expected) && is_bool($actual)) {
            static::assertNotEquals($expected, $actual, $message);
        }

        static::assertThat(
            $actual,
            new LogicalNot(
                new IsIdentical($expected)
            ),
            $message
        );
=======
     * @param mixed  $expected
     * @param mixed  $actual
     * @param string $message
     */
    public static function assertNotSame($expected, $actual, $message = '')
    {
        if (is_bool($expected) && is_bool($actual)) {
            self::assertNotEquals($expected, $actual, $message);
        } else {
            $constraint = new PHPUnit_Framework_Constraint_Not(
                new PHPUnit_Framework_Constraint_IsIdentical($expected)
            );

            self::assertThat($actual, $constraint, $message);
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a variable and an attribute of an object do not have the
     * same type and value.
     *
<<<<<<< HEAD
     * @param object|string $actualClassOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeNotSame($expected, string $actualAttributeName, $actualClassOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeNotSame() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotSame(
            $expected,
            static::readAttribute($actualClassOrObject, $actualAttributeName),
=======
     * @param mixed  $expected
     * @param string $actualAttributeName
     * @param object $actualClassOrObject
     * @param string $message
     */
    public static function assertAttributeNotSame($expected, $actualAttributeName, $actualClassOrObject, $message = '')
    {
        self::assertNotSame(
            $expected,
            self::readAttribute($actualClassOrObject, $actualAttributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a variable is of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $expected
     *
     * @psalm-assert =ExpectedType $actual
     */
    public static function assertInstanceOf(string $expected, $actual, string $message = ''): void
    {
        if (!class_exists($expected) && !interface_exists($expected)) {
            throw InvalidArgumentException::create(1, 'class or interface name');
        }

        static::assertThat(
            $actual,
            new IsInstanceOf($expected),
            $message
        );
=======
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertInstanceOf($expected, $actual, $message = '')
    {
        if (!(is_string($expected) && (class_exists($expected) || interface_exists($expected)))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $constraint = new PHPUnit_Framework_Constraint_IsInstanceOf(
            $expected
        );

        self::assertThat($actual, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
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
     */
    public static function assertAttributeInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeInstanceOf() is deprecated and will be removed in PHPUnit 9.');

        static::assertInstanceOf(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
=======
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeInstanceOf($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertInstanceOf(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a variable is not of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @psalm-template ExpectedType of object
     *
     * @psalm-param class-string<ExpectedType> $expected
     *
     * @psalm-assert !ExpectedType $actual
     */
    public static function assertNotInstanceOf(string $expected, $actual, string $message = ''): void
    {
        if (!class_exists($expected) && !interface_exists($expected)) {
            throw InvalidArgumentException::create(1, 'class or interface name');
        }

        static::assertThat(
            $actual,
            new LogicalNot(
                new IsInstanceOf($expected)
            ),
            $message
        );
=======
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertNotInstanceOf($expected, $actual, $message = '')
    {
        if (!(is_string($expected) && (class_exists($expected) || interface_exists($expected)))) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class or interface name');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsInstanceOf($expected)
        );

        self::assertThat($actual, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
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
     */
    public static function assertAttributeNotInstanceOf(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeNotInstanceOf() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotInstanceOf(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
=======
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeNotInstanceOf($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertNotInstanceOf(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a variable is of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
     *
     * @codeCoverageIgnore
     */
    public static function assertInternalType(string $expected, $actual, string $message = ''): void
    {
        self::createWarning(
            sprintf(
                'assertInternalType() is deprecated and will be removed in PHPUnit 9. Refactor your test to use %s() instead.',
                self::assertInternalTypeReplacement($expected, false)
            )
        );

        static::assertThat(
            $actual,
            new IsType($expected),
            $message
        );
=======
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertInternalType($expected, $actual, $message = '')
    {
        if (!is_string($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_IsType(
            $expected
        );

        self::assertThat($actual, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
     * @param object|string $classOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeInternalType(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeInternalType() is deprecated and will be removed in PHPUnit 9.');

        static::assertInternalType(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
            $message
        );
    }

    /**
     * Asserts that a variable is of type array.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert array $actual
     */
    public static function assertIsArray($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_ARRAY),
            $message
        );
    }

    /**
     * Asserts that a variable is of type bool.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert bool $actual
     */
    public static function assertIsBool($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_BOOL),
            $message
        );
    }

    /**
     * Asserts that a variable is of type float.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert float $actual
     */
    public static function assertIsFloat($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_FLOAT),
            $message
        );
    }

    /**
     * Asserts that a variable is of type int.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert int $actual
     */
    public static function assertIsInt($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_INT),
            $message
        );
    }

    /**
     * Asserts that a variable is of type numeric.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert numeric $actual
     */
    public static function assertIsNumeric($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_NUMERIC),
            $message
        );
    }

    /**
     * Asserts that a variable is of type object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert object $actual
     */
    public static function assertIsObject($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_OBJECT),
            $message
        );
    }

    /**
     * Asserts that a variable is of type resource.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert resource $actual
     */
    public static function assertIsResource($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_RESOURCE),
            $message
        );
    }

    /**
     * Asserts that a variable is of type string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert string $actual
     */
    public static function assertIsString($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_STRING),
            $message
        );
    }

    /**
     * Asserts that a variable is of type scalar.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert scalar $actual
     */
    public static function assertIsScalar($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_SCALAR),
            $message
        );
    }

    /**
     * Asserts that a variable is of type callable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert callable $actual
     */
    public static function assertIsCallable($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_CALLABLE),
            $message
        );
    }

    /**
     * Asserts that a variable is of type iterable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert iterable $actual
     */
    public static function assertIsIterable($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new IsType(IsType::TYPE_ITERABLE),
=======
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeInternalType($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertInternalType(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a variable is not of a given type.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3369
     *
     * @codeCoverageIgnore
     */
    public static function assertNotInternalType(string $expected, $actual, string $message = ''): void
    {
        self::createWarning(
            sprintf(
                'assertNotInternalType() is deprecated and will be removed in PHPUnit 9. Refactor your test to use %s() instead.',
                self::assertInternalTypeReplacement($expected, true)
            )
        );

        static::assertThat(
            $actual,
            new LogicalNot(
                new IsType($expected)
            ),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type array.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !array $actual
     */
    public static function assertIsNotArray($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_ARRAY)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type bool.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !bool $actual
     */
    public static function assertIsNotBool($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_BOOL)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type float.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !float $actual
     */
    public static function assertIsNotFloat($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_FLOAT)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type int.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !int $actual
     */
    public static function assertIsNotInt($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_INT)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type numeric.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !numeric $actual
     */
    public static function assertIsNotNumeric($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_NUMERIC)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !object $actual
     */
    public static function assertIsNotObject($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_OBJECT)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type resource.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !resource $actual
     */
    public static function assertIsNotResource($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_RESOURCE)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type string.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !string $actual
     */
    public static function assertIsNotString($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_STRING)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type scalar.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !scalar $actual
     */
    public static function assertIsNotScalar($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_SCALAR)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type callable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !callable $actual
     */
    public static function assertIsNotCallable($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_CALLABLE)),
            $message
        );
    }

    /**
     * Asserts that a variable is not of type iterable.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     *
     * @psalm-assert !iterable $actual
     */
    public static function assertIsNotIterable($actual, string $message = ''): void
    {
        static::assertThat(
            $actual,
            new LogicalNot(new IsType(IsType::TYPE_ITERABLE)),
            $message
        );
=======
     * @param string $expected
     * @param mixed  $actual
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertNotInternalType($expected, $actual, $message = '')
    {
        if (!is_string($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_IsType($expected)
        );

        self::assertThat($actual, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that an attribute is of a given type.
     *
<<<<<<< HEAD
     * @param object|string $classOrObject
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function assertAttributeNotInternalType(string $expected, string $attributeName, $classOrObject, string $message = ''): void
    {
        self::createWarning('assertAttributeNotInternalType() is deprecated and will be removed in PHPUnit 9.');

        static::assertNotInternalType(
            $expected,
            static::readAttribute($classOrObject, $attributeName),
=======
     * @param string $expected
     * @param string $attributeName
     * @param mixed  $classOrObject
     * @param string $message
     *
     * @since Method available since Release 3.5.0
     */
    public static function assertAttributeNotInternalType($expected, $attributeName, $classOrObject, $message = '')
    {
        self::assertNotInternalType(
            $expected,
            self::readAttribute($classOrObject, $attributeName),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Asserts that a string matches a given regular expression.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertRegExp(string $pattern, string $string, string $message = ''): void
    {
        static::assertThat($string, new RegularExpression($pattern), $message);
=======
     * @param string $pattern
     * @param string $string
     * @param string $message
     */
    public static function assertRegExp($pattern, $string, $message = '')
    {
        if (!is_string($pattern)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_PCREMatch($pattern);

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string does not match a given regular expression.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertNotRegExp(string $pattern, string $string, string $message = ''): void
    {
        static::assertThat(
            $string,
            new LogicalNot(
                new RegularExpression($pattern)
            ),
            $message
        );
=======
     * @param string $pattern
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 2.1.0
     */
    public static function assertNotRegExp($pattern, $string, $message = '')
    {
        if (!is_string($pattern)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_PCREMatch($pattern)
        );

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is the same.
     *
<<<<<<< HEAD
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertSameSize($expected, $actual, string $message = ''): void
    {
        if (!$expected instanceof Countable && !is_iterable($expected)) {
            throw InvalidArgumentException::create(1, 'countable or iterable');
        }

        if (!$actual instanceof Countable && !is_iterable($actual)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
        }

        static::assertThat(
            $actual,
            new SameSize($expected),
=======
     * @param array|Countable|Traversable $expected
     * @param array|Countable|Traversable $actual
     * @param string                      $message
     */
    public static function assertSameSize($expected, $actual, $message = '')
    {
        if (!$expected instanceof Countable &&
            !$expected instanceof Traversable &&
            !is_array($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'countable or traversable');
        }

        if (!$actual instanceof Countable &&
            !$actual instanceof Traversable &&
            !is_array($actual)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        self::assertThat(
            $actual,
            new PHPUnit_Framework_Constraint_SameSize($expected),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $message
        );
    }

    /**
     * Assert that the size of two arrays (or `Countable` or `Traversable` objects)
     * is not the same.
     *
<<<<<<< HEAD
     * @param Countable|iterable $expected
     * @param Countable|iterable $actual
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertNotSameSize($expected, $actual, string $message = ''): void
    {
        if (!$expected instanceof Countable && !is_iterable($expected)) {
            throw InvalidArgumentException::create(1, 'countable or iterable');
        }

        if (!$actual instanceof Countable && !is_iterable($actual)) {
            throw InvalidArgumentException::create(2, 'countable or iterable');
        }

        static::assertThat(
            $actual,
            new LogicalNot(
                new SameSize($expected)
            ),
            $message
        );
=======
     * @param array|Countable|Traversable $expected
     * @param array|Countable|Traversable $actual
     * @param string                      $message
     */
    public static function assertNotSameSize($expected, $actual, $message = '')
    {
        if (!$expected instanceof Countable &&
            !$expected instanceof Traversable &&
            !is_array($expected)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'countable or traversable');
        }

        if (!$actual instanceof Countable &&
            !$actual instanceof Traversable &&
            !is_array($actual)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'countable or traversable');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_SameSize($expected)
        );

        self::assertThat($actual, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string matches a given format string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringMatchesFormat(string $format, string $string, string $message = ''): void
    {
        static::assertThat($string, new StringMatchesFormatDescription($format), $message);
=======
     * @param string $format
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringMatchesFormat($format, $string, $message = '')
    {
        if (!is_string($format)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringMatches($format);

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string does not match a given format string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotMatchesFormat(string $format, string $string, string $message = ''): void
    {
        static::assertThat(
            $string,
            new LogicalNot(
                new StringMatchesFormatDescription($format)
            ),
            $message
        );
=======
     * @param string $format
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringNotMatchesFormat($format, $string, $message = '')
    {
        if (!is_string($format)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringMatches($format)
        );

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string matches a given format file.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        static::assertFileExists($formatFile, $message);

        static::assertThat(
            $string,
            new StringMatchesFormatDescription(
                file_get_contents($formatFile)
            ),
            $message
        );
=======
     * @param string $formatFile
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringMatchesFormatFile($formatFile, $string, $message = '')
    {
        self::assertFileExists($formatFile, $message);

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringMatches(
            file_get_contents($formatFile)
        );

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string does not match a given format string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotMatchesFormatFile(string $formatFile, string $string, string $message = ''): void
    {
        static::assertFileExists($formatFile, $message);

        static::assertThat(
            $string,
            new LogicalNot(
                new StringMatchesFormatDescription(
                    file_get_contents($formatFile)
                )
            ),
            $message
        );
=======
     * @param string $formatFile
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 3.5.0
     */
    public static function assertStringNotMatchesFormatFile($formatFile, $string, $message = '')
    {
        self::assertFileExists($formatFile, $message);

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringMatches(
                file_get_contents($formatFile)
            )
        );

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string starts with a given prefix.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringStartsWith(string $prefix, string $string, string $message = ''): void
    {
        static::assertThat($string, new StringStartsWith($prefix), $message);
=======
     * @param string $prefix
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringStartsWith($prefix, $string, $message = '')
    {
        if (!is_string($prefix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringStartsWith(
            $prefix
        );

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string starts not with a given prefix.
     *
     * @param string $prefix
     * @param string $string
<<<<<<< HEAD
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringStartsNotWith($prefix, $string, string $message = ''): void
    {
        static::assertThat(
            $string,
            new LogicalNot(
                new StringStartsWith($prefix)
            ),
            $message
        );
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringContainsString(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new StringContains($needle, false);

        static::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new StringContains($needle, true);

        static::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotContainsString(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new StringContains($needle));

        static::assertThat($haystack, $constraint, $message);
    }

    /**
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringNotContainsStringIgnoringCase(string $needle, string $haystack, string $message = ''): void
    {
        $constraint = new LogicalNot(new StringContains($needle, true));

        static::assertThat($haystack, $constraint, $message);
=======
     * @param string $message
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringStartsNotWith($prefix, $string, $message = '')
    {
        if (!is_string($prefix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringStartsWith($prefix)
        );

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string ends with a given suffix.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEndsWith(string $suffix, string $string, string $message = ''): void
    {
        static::assertThat($string, new StringEndsWith($suffix), $message);
=======
     * @param string $suffix
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringEndsWith($suffix, $string, $message = '')
    {
        if (!is_string($suffix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_StringEndsWith($suffix);

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a string ends not with a given suffix.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertStringEndsNotWith(string $suffix, string $string, string $message = ''): void
    {
        static::assertThat(
            $string,
            new LogicalNot(
                new StringEndsWith($suffix)
            ),
            $message
        );
=======
     * @param string $suffix
     * @param string $string
     * @param string $message
     *
     * @since  Method available since Release 3.4.0
     */
    public static function assertStringEndsNotWith($suffix, $string, $message = '')
    {
        if (!is_string($suffix)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!is_string($string)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        $constraint = new PHPUnit_Framework_Constraint_Not(
            new PHPUnit_Framework_Constraint_StringEndsWith($suffix)
        );

        self::assertThat($string, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two XML files are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertXmlFileEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::loadFile($actualFile);

        static::assertEquals($expected, $actual, $message);
=======
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlFileEqualsXmlFile($expectedFile, $actualFile, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::loadFile($actualFile);

        self::assertEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two XML files are not equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertXmlFileNotEqualsXmlFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::loadFile($actualFile);

        static::assertNotEquals($expected, $actual, $message);
=======
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlFileNotEqualsXmlFile($expectedFile, $actualFile, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::loadFile($actualFile);

        self::assertNotEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two XML documents are equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertXmlStringEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::load($actualXml);

        static::assertEquals($expected, $actual, $message);
=======
     * @param string $expectedFile
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertXmlStringEqualsXmlFile($expectedFile, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two XML documents are not equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertXmlStringNotEqualsXmlFile(string $expectedFile, $actualXml, string $message = ''): void
    {
        $expected = Xml::loadFile($expectedFile);
        $actual   = Xml::load($actualXml);

        static::assertNotEquals($expected, $actual, $message);
=======
     * @param string $expectedFile
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertXmlStringNotEqualsXmlFile($expectedFile, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::loadFile($expectedFile);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertNotEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two XML documents are equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertXmlStringEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
    {
        $expected = Xml::load($expectedXml);
        $actual   = Xml::load($actualXml);

        static::assertEquals($expected, $actual, $message);
=======
     * @param string $expectedXml
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlStringEqualsXmlString($expectedXml, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::load($expectedXml);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two XML documents are not equal.
     *
<<<<<<< HEAD
     * @param DOMDocument|string $expectedXml
     * @param DOMDocument|string $actualXml
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws Exception
     * @throws ExpectationFailedException
     */
    public static function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, string $message = ''): void
    {
        $expected = Xml::load($expectedXml);
        $actual   = Xml::load($actualXml);

        static::assertNotEquals($expected, $actual, $message);
=======
     * @param string $expectedXml
     * @param string $actualXml
     * @param string $message
     *
     * @since  Method available since Release 3.1.0
     */
    public static function assertXmlStringNotEqualsXmlString($expectedXml, $actualXml, $message = '')
    {
        $expected = PHPUnit_Util_XML::load($expectedXml);
        $actual   = PHPUnit_Util_XML::load($actualXml);

        self::assertNotEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that a hierarchy of DOMElements matches.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws AssertionFailedError
     * @throws ExpectationFailedException
     */
    public static function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, bool $checkAttributes = false, string $message = ''): void
    {
        $expectedElement = Xml::import($expectedElement);
        $actualElement   = Xml::import($actualElement);

        static::assertSame(
=======
     * @param DOMElement $expectedElement
     * @param DOMElement $actualElement
     * @param bool       $checkAttributes
     * @param string     $message
     *
     * @since  Method available since Release 3.3.0
     */
    public static function assertEqualXMLStructure(DOMElement $expectedElement, DOMElement $actualElement, $checkAttributes = false, $message = '')
    {
        $tmp             = new DOMDocument;
        $expectedElement = $tmp->importNode($expectedElement, true);

        $tmp           = new DOMDocument;
        $actualElement = $tmp->importNode($actualElement, true);

        unset($tmp);

        self::assertEquals(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $expectedElement->tagName,
            $actualElement->tagName,
            $message
        );

        if ($checkAttributes) {
<<<<<<< HEAD
            static::assertSame(
=======
            self::assertEquals(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $expectedElement->attributes->length,
                $actualElement->attributes->length,
                sprintf(
                    '%s%sNumber of attributes on node "%s" does not match',
                    $message,
                    !empty($message) ? "\n" : '',
                    $expectedElement->tagName
                )
            );

            for ($i = 0; $i < $expectedElement->attributes->length; $i++) {
                $expectedAttribute = $expectedElement->attributes->item($i);
<<<<<<< HEAD
                $actualAttribute   = $actualElement->attributes->getNamedItem($expectedAttribute->name);

                assert($expectedAttribute instanceof DOMAttr);

                if (!$actualAttribute) {
                    static::fail(
=======
                $actualAttribute   = $actualElement->attributes->getNamedItem(
                    $expectedAttribute->name
                );

                if (!$actualAttribute) {
                    self::fail(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                        sprintf(
                            '%s%sCould not find attribute "%s" on node "%s"',
                            $message,
                            !empty($message) ? "\n" : '',
                            $expectedAttribute->name,
                            $expectedElement->tagName
                        )
                    );
                }
            }
        }

<<<<<<< HEAD
        Xml::removeCharacterDataNodes($expectedElement);
        Xml::removeCharacterDataNodes($actualElement);

        static::assertSame(
=======
        PHPUnit_Util_XML::removeCharacterDataNodes($expectedElement);
        PHPUnit_Util_XML::removeCharacterDataNodes($actualElement);

        self::assertEquals(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $expectedElement->childNodes->length,
            $actualElement->childNodes->length,
            sprintf(
                '%s%sNumber of child nodes of "%s" differs',
                $message,
                !empty($message) ? "\n" : '',
                $expectedElement->tagName
            )
        );

        for ($i = 0; $i < $expectedElement->childNodes->length; $i++) {
<<<<<<< HEAD
            static::assertEqualXMLStructure(
=======
            self::assertEqualXMLStructure(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $expectedElement->childNodes->item($i),
                $actualElement->childNodes->item($i),
                $checkAttributes,
                $message
            );
        }
    }

    /**
<<<<<<< HEAD
     * Evaluates a PHPUnit\Framework\Constraint matcher object.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertThat($value, Constraint $constraint, string $message = ''): void
=======
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
     * assertSelectCount(".binder", 3, $xml);     // exactly 3?
     *
     * @param array          $selector
     * @param int|bool|array $count
     * @param mixed          $actual
     * @param string         $message
     * @param bool           $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertSelectCount($selector, $count, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        self::assertSelectEquals(
            $selector,
            true,
            $count,
            $actual,
            $message,
            $isHtml
        );
    }

    /**
     * assertSelectRegExp("#binder .name", "/Mike|Derek/", true, $xml); // any?
     * assertSelectRegExp("#binder .name", "/Mike|Derek/", 3, $xml);    // 3?
     *
     * @param array          $selector
     * @param string         $pattern
     * @param int|bool|array $count
     * @param mixed          $actual
     * @param string         $message
     * @param bool           $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertSelectRegExp($selector, $pattern, $count, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        self::assertSelectEquals(
            $selector,
            "regexp:$pattern",
            $count,
            $actual,
            $message,
            $isHtml
        );
    }

    /**
     * assertSelectEquals("#binder .name", "Chuck", true,  $xml);  // any?
     * assertSelectEquals("#binder .name", "Chuck", false, $xml);  // none?
     *
     * @param array          $selector
     * @param string         $content
     * @param int|bool|array $count
     * @param mixed          $actual
     * @param string         $message
     * @param bool           $isHtml
     *
     * @since  Method available since Release 3.3.0
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertSelectEquals($selector, $content, $count, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $tags = PHPUnit_Util_XML::cssSelect(
            $selector,
            $content,
            $actual,
            $isHtml
        );

        // assert specific number of elements
        if (is_numeric($count)) {
            $counted = $tags ? count($tags) : 0;
            self::assertEquals($count, $counted, $message);
        } // assert any elements exist if true, assert no elements exist if false
        elseif (is_bool($count)) {
            $any = count($tags) > 0 && $tags[0] instanceof DOMNode;

            if ($count) {
                self::assertTrue($any, $message);
            } else {
                self::assertFalse($any, $message);
            }
        } // check for range number of elements
        elseif (is_array($count) &&
                (isset($count['>']) || isset($count['<']) ||
                isset($count['>=']) || isset($count['<=']))) {
            $counted = $tags ? count($tags) : 0;

            if (isset($count['>'])) {
                self::assertTrue($counted > $count['>'], $message);
            }

            if (isset($count['>='])) {
                self::assertTrue($counted >= $count['>='], $message);
            }

            if (isset($count['<'])) {
                self::assertTrue($counted < $count['<'], $message);
            }

            if (isset($count['<='])) {
                self::assertTrue($counted <= $count['<='], $message);
            }
        } else {
            throw new PHPUnit_Framework_Exception;
        }
    }

    /**
     * Evaluate an HTML or XML string and assert its structure and/or contents.
     *
     * The first argument ($matcher) is an associative array that specifies the
     * match criteria for the assertion:
     *
     *  - `id`           : the node with the given id attribute must match the
     *                     corresponding value.
     *  - `tag`          : the node type must match the corresponding value.
     *  - `attributes`   : a hash. The node's attributes must match the
     *                     corresponding values in the hash.
     *  - `content`      : The text content must match the given value.
     *  - `parent`       : a hash. The node's parent must match the
     *                     corresponding hash.
     *  - `child`        : a hash. At least one of the node's immediate children
     *                     must meet the criteria described by the hash.
     *  - `ancestor`     : a hash. At least one of the node's ancestors must
     *                     meet the criteria described by the hash.
     *  - `descendant`   : a hash. At least one of the node's descendants must
     *                     meet the criteria described by the hash.
     *  - `children`     : a hash, for counting children of a node.
     *                     Accepts the keys:
     *    - `count`        : a number which must equal the number of children
     *                       that match
     *    - `less_than`    : the number of matching children must be greater
     *                       than this number
     *    - `greater_than` : the number of matching children must be less than
     *                       this number
     *    - `only`         : another hash consisting of the keys to use to match
     *                       on the children, and only matching children will be
     *                       counted
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
     *   'tag'        => 'span',
     *   'attributes' => array('class' => 'list')
     * );
     *
     * // Matcher that asserts that there is a "span" inside of a "div".
     * $matcher = array(
     *   'tag'    => 'span',
     *   'parent' => array('tag' => 'div')
     * );
     *
     * // Matcher that asserts that there is a "span" somewhere inside a
     * // "table".
     * $matcher = array(
     *   'tag'      => 'span',
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
     *   'tag'        => 'span',
     *   'descendant' => array('tag' => 'strong')
     * );
     *
     * // Matcher that asserts that there is a "span" containing 5-10 "em" tags
     * // as immediate children.
     * $matcher = array(
     *   'tag'      => 'span',
     *   'children' => array(
     *     'less_than'    => 11,
     *     'greater_than' => 4,
     *     'only'         => array('tag' => 'em')
     *   )
     * );
     *
     * // Matcher that asserts that there is a "div", with an "ul" ancestor and
     * // a "li" parent (with class="enum"), and containing a "span" descendant
     * // that contains an element with id="my_test" and the text "Hello World".
     * $matcher = array(
     *   'tag'        => 'div',
     *   'ancestor'   => array('tag' => 'ul'),
     *   'parent'     => array(
     *     'tag'        => 'li',
     *     'attributes' => array('class' => 'enum')
     *   ),
     *   'descendant' => array(
     *     'tag'   => 'span',
     *     'child' => array(
     *       'id'      => 'my_test',
     *       'content' => 'Hello World'
     *     )
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
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertTag($matcher, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $dom     = PHPUnit_Util_XML::load($actual, $isHtml);
        $tags    = PHPUnit_Util_XML::findNodes($dom, $matcher, $isHtml);
        $matched = count($tags) > 0 && $tags[0] instanceof DOMNode;

        self::assertTrue($matched, $message);
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
     * @deprecated
     * @codeCoverageIgnore
     */
    public static function assertNotTag($matcher, $actual, $message = '', $isHtml = true)
    {
        trigger_error(__METHOD__ . ' is deprecated', E_USER_DEPRECATED);

        $dom     = PHPUnit_Util_XML::load($actual, $isHtml);
        $tags    = PHPUnit_Util_XML::findNodes($dom, $matcher, $isHtml);
        $matched = count($tags) > 0 && $tags[0] instanceof DOMNode;

        self::assertFalse($matched, $message);
    }

    /**
     * Evaluates a PHPUnit_Framework_Constraint matcher object.
     *
     * @param mixed                        $value
     * @param PHPUnit_Framework_Constraint $constraint
     * @param string                       $message
     *
     * @since  Method available since Release 3.0.0
     */
    public static function assertThat($value, PHPUnit_Framework_Constraint $constraint, $message = '')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        self::$count += count($constraint);

        $constraint->evaluate($value, $message);
    }

    /**
     * Asserts that a string is a valid JSON string.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJson(string $actualJson, string $message = ''): void
    {
        static::assertThat($actualJson, static::isJson(), $message);
=======
     * @param string $actualJson
     * @param string $message
     *
     * @since  Method available since Release 3.7.20
     */
    public static function assertJson($actualJson, $message = '')
    {
        if (!is_string($actualJson)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        self::assertThat($actualJson, self::isJson(), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringEqualsJsonString(string $expectedJson, string $actualJson, string $message = ''): void
    {
        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat($actualJson, new JsonMatches($expectedJson), $message);
=======
     * @param string $expectedJson
     * @param string $actualJson
     * @param string $message
     */
    public static function assertJsonStringEqualsJsonString($expectedJson, $actualJson, $message = '')
    {
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        $expected = json_decode($expectedJson);
        $actual   = json_decode($actualJson);

        self::assertEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two given JSON encoded objects or arrays are not equal.
     *
     * @param string $expectedJson
     * @param string $actualJson
<<<<<<< HEAD
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, string $message = ''): void
    {
        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat(
            $actualJson,
            new LogicalNot(
                new JsonMatches($expectedJson)
            ),
            $message
        );
=======
     * @param string $message
     */
    public static function assertJsonStringNotEqualsJsonString($expectedJson, $actualJson, $message = '')
    {
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        $expected = json_decode($expectedJson);
        $actual   = json_decode($actualJson);

        self::assertNotEquals($expected, $actual, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat($actualJson, new JsonMatches($expectedJson), $message);
=======
     * @param string $expectedFile
     * @param string $actualJson
     * @param string $message
     */
    public static function assertJsonStringEqualsJsonFile($expectedFile, $actualJson, $message = '')
    {
        self::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraint = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        self::assertThat($actualJson, $constraint, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that the generated JSON encoded object and the content of the given file are not equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonStringNotEqualsJsonFile(string $expectedFile, string $actualJson, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        static::assertThat(
            $actualJson,
            new LogicalNot(
                new JsonMatches($expectedJson)
            ),
            $message
        );
    }

    /**
     * Asserts that two JSON files are equal.
     *
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonFileEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        static::assertFileExists($actualFile, $message);

        $actualJson   = file_get_contents($actualFile);
        $expectedJson = file_get_contents($expectedFile);

        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraintExpected = new JsonMatches(
            $expectedJson
        );

        $constraintActual = new JsonMatches($actualJson);

        static::assertThat($expectedJson, $constraintActual, $message);
        static::assertThat($actualJson, $constraintExpected, $message);
=======
     * @param string $expectedFile
     * @param string $actualJson
     * @param string $message
     */
    public static function assertJsonStringNotEqualsJsonFile($expectedFile, $actualJson, $message = '')
    {
        self::assertFileExists($expectedFile, $message);
        $expectedJson = file_get_contents($expectedFile);

        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraint = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        self::assertThat($actualJson, new PHPUnit_Framework_Constraint_Not($constraint), $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Asserts that two JSON files are not equal.
     *
<<<<<<< HEAD
     * @throws \SebastianBergmann\RecursionContext\InvalidArgumentException
     * @throws ExpectationFailedException
     */
    public static function assertJsonFileNotEqualsJsonFile(string $expectedFile, string $actualFile, string $message = ''): void
    {
        static::assertFileExists($expectedFile, $message);
        static::assertFileExists($actualFile, $message);
=======
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
     */
    public static function assertJsonFileNotEqualsJsonFile($expectedFile, $actualFile, $message = '')
    {
        self::assertFileExists($expectedFile, $message);
        self::assertFileExists($actualFile, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $actualJson   = file_get_contents($actualFile);
        $expectedJson = file_get_contents($expectedFile);

<<<<<<< HEAD
        static::assertJson($expectedJson, $message);
        static::assertJson($actualJson, $message);

        $constraintExpected = new JsonMatches(
            $expectedJson
        );

        $constraintActual = new JsonMatches($actualJson);

        static::assertThat($expectedJson, new LogicalNot($constraintActual), $message);
        static::assertThat($actualJson, new LogicalNot($constraintExpected), $message);
    }

    /**
     * @throws Exception
     */
    public static function logicalAnd(): LogicalAnd
    {
        $constraints = func_get_args();

        $constraint = new LogicalAnd;
=======
        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraintExpected = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        $constraintActual = new PHPUnit_Framework_Constraint_JsonMatches($actualJson);

        self::assertThat($expectedJson, new PHPUnit_Framework_Constraint_Not($constraintActual), $message);
        self::assertThat($actualJson, new PHPUnit_Framework_Constraint_Not($constraintExpected), $message);
    }

    /**
     * Asserts that two JSON files are equal.
     *
     * @param string $expectedFile
     * @param string $actualFile
     * @param string $message
     */
    public static function assertJsonFileEqualsJsonFile($expectedFile, $actualFile, $message = '')
    {
        self::assertFileExists($expectedFile, $message);
        self::assertFileExists($actualFile, $message);

        $actualJson   = file_get_contents($actualFile);
        $expectedJson = file_get_contents($expectedFile);

        self::assertJson($expectedJson, $message);
        self::assertJson($actualJson, $message);

        // call constraint
        $constraintExpected = new PHPUnit_Framework_Constraint_JsonMatches(
            $expectedJson
        );

        $constraintActual = new PHPUnit_Framework_Constraint_JsonMatches($actualJson);

        self::assertThat($expectedJson, $constraintActual, $message);
        self::assertThat($actualJson, $constraintExpected, $message);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_And matcher object.
     *
     * @return PHPUnit_Framework_Constraint_And
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalAnd()
    {
        $constraints = func_get_args();

        $constraint = new PHPUnit_Framework_Constraint_And;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $constraint->setConstraints($constraints);

        return $constraint;
    }

<<<<<<< HEAD
    public static function logicalOr(): LogicalOr
    {
        $constraints = func_get_args();

        $constraint = new LogicalOr;
=======
    /**
     * Returns a PHPUnit_Framework_Constraint_Or matcher object.
     *
     * @return PHPUnit_Framework_Constraint_Or
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalOr()
    {
        $constraints = func_get_args();

        $constraint = new PHPUnit_Framework_Constraint_Or;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $constraint->setConstraints($constraints);

        return $constraint;
    }

<<<<<<< HEAD
    public static function logicalNot(Constraint $constraint): LogicalNot
    {
        return new LogicalNot($constraint);
    }

    public static function logicalXor(): LogicalXor
    {
        $constraints = func_get_args();

        $constraint = new LogicalXor;
=======
    /**
     * Returns a PHPUnit_Framework_Constraint_Not matcher object.
     *
     * @param PHPUnit_Framework_Constraint $constraint
     *
     * @return PHPUnit_Framework_Constraint_Not
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalNot(PHPUnit_Framework_Constraint $constraint)
    {
        return new PHPUnit_Framework_Constraint_Not($constraint);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Xor matcher object.
     *
     * @return PHPUnit_Framework_Constraint_Xor
     *
     * @since  Method available since Release 3.0.0
     */
    public static function logicalXor()
    {
        $constraints = func_get_args();

        $constraint = new PHPUnit_Framework_Constraint_Xor;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $constraint->setConstraints($constraints);

        return $constraint;
    }

<<<<<<< HEAD
    public static function anything(): IsAnything
    {
        return new IsAnything;
    }

    public static function isTrue(): IsTrue
    {
        return new IsTrue;
    }

    /**
     * @psalm-template CallbackInput of mixed
     *
     * @psalm-param callable(CallbackInput $callback): bool $callback
     *
     * @psalm-return Callback<CallbackInput>
     */
    public static function callback(callable $callback): Callback
    {
        return new Callback($callback);
    }

    public static function isFalse(): IsFalse
    {
        return new IsFalse;
    }

    public static function isJson(): IsJson
    {
        return new IsJson;
    }

    public static function isNull(): IsNull
    {
        return new IsNull;
    }

    public static function isFinite(): IsFinite
    {
        return new IsFinite;
    }

    public static function isInfinite(): IsInfinite
    {
        return new IsInfinite;
    }

    public static function isNan(): IsNan
    {
        return new IsNan;
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function attribute(Constraint $constraint, string $attributeName): Attribute
    {
        self::createWarning('attribute() is deprecated and will be removed in PHPUnit 9.');

        return new Attribute($constraint, $attributeName);
    }

    /**
     * @deprecated Use containsEqual() or containsIdentical() instead
     */
    public static function contains($value, bool $checkForObjectIdentity = true, bool $checkForNonObjectIdentity = false): TraversableContains
    {
        return new TraversableContains($value, $checkForObjectIdentity, $checkForNonObjectIdentity);
    }

    public static function containsEqual($value): TraversableContainsEqual
    {
        return new TraversableContainsEqual($value);
    }

    public static function containsIdentical($value): TraversableContainsIdentical
    {
        return new TraversableContainsIdentical($value);
    }

    public static function containsOnly(string $type): TraversableContainsOnly
    {
        return new TraversableContainsOnly($type);
    }

    public static function containsOnlyInstancesOf(string $className): TraversableContainsOnly
    {
        return new TraversableContainsOnly($className, false);
    }

    /**
     * @param int|string $key
     */
    public static function arrayHasKey($key): ArrayHasKey
    {
        return new ArrayHasKey($key);
    }

    public static function equalTo($value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): IsEqual
    {
        return new IsEqual($value, $delta, $maxDepth, $canonicalize, $ignoreCase);
    }

    /**
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function attributeEqualTo(string $attributeName, $value, float $delta = 0.0, int $maxDepth = 10, bool $canonicalize = false, bool $ignoreCase = false): Attribute
    {
        self::createWarning('attributeEqualTo() is deprecated and will be removed in PHPUnit 9.');

        return static::attribute(
            static::equalTo(
=======
    /**
     * Returns a PHPUnit_Framework_Constraint_IsAnything matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsAnything
     *
     * @since  Method available since Release 3.0.0
     */
    public static function anything()
    {
        return new PHPUnit_Framework_Constraint_IsAnything;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsTrue matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsTrue
     *
     * @since  Method available since Release 3.3.0
     */
    public static function isTrue()
    {
        return new PHPUnit_Framework_Constraint_IsTrue;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Callback matcher object.
     *
     * @param callable $callback
     *
     * @return PHPUnit_Framework_Constraint_Callback
     */
    public static function callback($callback)
    {
        return new PHPUnit_Framework_Constraint_Callback($callback);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsFalse matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsFalse
     *
     * @since  Method available since Release 3.3.0
     */
    public static function isFalse()
    {
        return new PHPUnit_Framework_Constraint_IsFalse;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsJson matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsJson
     *
     * @since  Method available since Release 3.7.20
     */
    public static function isJson()
    {
        return new PHPUnit_Framework_Constraint_IsJson;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_IsNull matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsNull
     *
     * @since  Method available since Release 3.3.0
     */
    public static function isNull()
    {
        return new PHPUnit_Framework_Constraint_IsNull;
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
    public static function attribute(PHPUnit_Framework_Constraint $constraint, $attributeName)
    {
        return new PHPUnit_Framework_Constraint_Attribute(
            $constraint,
            $attributeName
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
    public static function contains($value, $checkForObjectIdentity = true, $checkForNonObjectIdentity = false)
    {
        return new PHPUnit_Framework_Constraint_TraversableContains($value, $checkForObjectIdentity, $checkForNonObjectIdentity);
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
    public static function containsOnly($type)
    {
        return new PHPUnit_Framework_Constraint_TraversableContainsOnly($type);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_TraversableContainsOnly matcher
     * object.
     *
     * @param string $classname
     *
     * @return PHPUnit_Framework_Constraint_TraversableContainsOnly
     */
    public static function containsOnlyInstancesOf($classname)
    {
        return new PHPUnit_Framework_Constraint_TraversableContainsOnly($classname, false);
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
    public static function arrayHasKey($key)
    {
        return new PHPUnit_Framework_Constraint_ArrayHasKey($key);
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
    public static function equalTo($value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return new PHPUnit_Framework_Constraint_IsEqual(
            $value,
            $delta,
            $maxDepth,
            $canonicalize,
            $ignoreCase
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
    public static function attributeEqualTo($attributeName, $value, $delta = 0.0, $maxDepth = 10, $canonicalize = false, $ignoreCase = false)
    {
        return self::attribute(
            self::equalTo(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $value,
                $delta,
                $maxDepth,
                $canonicalize,
                $ignoreCase
            ),
            $attributeName
        );
    }

<<<<<<< HEAD
    public static function isEmpty(): IsEmpty
    {
        return new IsEmpty;
    }

    public static function isWritable(): IsWritable
    {
        return new IsWritable;
    }

    public static function isReadable(): IsReadable
    {
        return new IsReadable;
    }

    public static function directoryExists(): DirectoryExists
    {
        return new DirectoryExists;
    }

    public static function fileExists(): FileExists
    {
        return new FileExists;
    }

    public static function greaterThan($value): GreaterThan
    {
        return new GreaterThan($value);
    }

    public static function greaterThanOrEqual($value): LogicalOr
    {
        return static::logicalOr(
            new IsEqual($value),
            new GreaterThan($value)
        );
    }

    public static function classHasAttribute(string $attributeName): ClassHasAttribute
    {
        return new ClassHasAttribute($attributeName);
    }

    public static function classHasStaticAttribute(string $attributeName): ClassHasStaticAttribute
    {
        return new ClassHasStaticAttribute($attributeName);
    }

    public static function objectHasAttribute($attributeName): ObjectHasAttribute
    {
        return new ObjectHasAttribute($attributeName);
    }

    public static function identicalTo($value): IsIdentical
    {
        return new IsIdentical($value);
    }

    public static function isInstanceOf(string $className): IsInstanceOf
    {
        return new IsInstanceOf($className);
    }

    public static function isType(string $type): IsType
    {
        return new IsType($type);
    }

    public static function lessThan($value): LessThan
    {
        return new LessThan($value);
    }

    public static function lessThanOrEqual($value): LogicalOr
    {
        return static::logicalOr(
            new IsEqual($value),
            new LessThan($value)
        );
    }

    public static function matchesRegularExpression(string $pattern): RegularExpression
    {
        return new RegularExpression($pattern);
    }

    public static function matches(string $string): StringMatchesFormatDescription
    {
        return new StringMatchesFormatDescription($string);
    }

    public static function stringStartsWith($prefix): StringStartsWith
    {
        return new StringStartsWith($prefix);
    }

    public static function stringContains(string $string, bool $case = true): StringContains
    {
        return new StringContains($string, $case);
    }

    public static function stringEndsWith(string $suffix): StringEndsWith
    {
        return new StringEndsWith($suffix);
    }

    public static function countOf(int $count): Count
    {
        return new Count($count);
    }

    /**
     * Fails a test with the given message.
     *
     * @throws AssertionFailedError
     *
     * @psalm-return never-return
     */
    public static function fail(string $message = ''): void
    {
        self::$count++;

        throw new AssertionFailedError($message);
=======
    /**
     * Returns a PHPUnit_Framework_Constraint_IsEmpty matcher object.
     *
     * @return PHPUnit_Framework_Constraint_IsEmpty
     *
     * @since  Method available since Release 3.5.0
     */
    public static function isEmpty()
    {
        return new PHPUnit_Framework_Constraint_IsEmpty;
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_FileExists matcher object.
     *
     * @return PHPUnit_Framework_Constraint_FileExists
     *
     * @since  Method available since Release 3.0.0
     */
    public static function fileExists()
    {
        return new PHPUnit_Framework_Constraint_FileExists;
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
    public static function greaterThan($value)
    {
        return new PHPUnit_Framework_Constraint_GreaterThan($value);
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
    public static function greaterThanOrEqual($value)
    {
        return self::logicalOr(
            new PHPUnit_Framework_Constraint_IsEqual($value),
            new PHPUnit_Framework_Constraint_GreaterThan($value)
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
    public static function classHasAttribute($attributeName)
    {
        return new PHPUnit_Framework_Constraint_ClassHasAttribute(
            $attributeName
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
    public static function classHasStaticAttribute($attributeName)
    {
        return new PHPUnit_Framework_Constraint_ClassHasStaticAttribute(
            $attributeName
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
    public static function objectHasAttribute($attributeName)
    {
        return new PHPUnit_Framework_Constraint_ObjectHasAttribute(
            $attributeName
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
    public static function identicalTo($value)
    {
        return new PHPUnit_Framework_Constraint_IsIdentical($value);
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
    public static function isInstanceOf($className)
    {
        return new PHPUnit_Framework_Constraint_IsInstanceOf($className);
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
    public static function isType($type)
    {
        return new PHPUnit_Framework_Constraint_IsType($type);
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
    public static function lessThan($value)
    {
        return new PHPUnit_Framework_Constraint_LessThan($value);
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
    public static function lessThanOrEqual($value)
    {
        return self::logicalOr(
            new PHPUnit_Framework_Constraint_IsEqual($value),
            new PHPUnit_Framework_Constraint_LessThan($value)
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
    public static function matchesRegularExpression($pattern)
    {
        return new PHPUnit_Framework_Constraint_PCREMatch($pattern);
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
    public static function matches($string)
    {
        return new PHPUnit_Framework_Constraint_StringMatches($string);
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
    public static function stringStartsWith($prefix)
    {
        return new PHPUnit_Framework_Constraint_StringStartsWith($prefix);
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
    public static function stringContains($string, $case = true)
    {
        return new PHPUnit_Framework_Constraint_StringContains($string, $case);
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
    public static function stringEndsWith($suffix)
    {
        return new PHPUnit_Framework_Constraint_StringEndsWith($suffix);
    }

    /**
     * Returns a PHPUnit_Framework_Constraint_Count matcher object.
     *
     * @param int $count
     *
     * @return PHPUnit_Framework_Constraint_Count
     */
    public static function countOf($count)
    {
        return new PHPUnit_Framework_Constraint_Count($count);
    }
    /**
     * Fails a test with the given message.
     *
     * @param string $message
     *
     * @throws PHPUnit_Framework_AssertionFailedError
     */
    public static function fail($message = '')
    {
        throw new PHPUnit_Framework_AssertionFailedError($message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the value of an attribute of a class or an object.
     * This also works for attributes that are declared protected or private.
     *
<<<<<<< HEAD
     * @param object|string $classOrObject
     *
     * @throws Exception
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function readAttribute($classOrObject, string $attributeName)
    {
        self::createWarning('readAttribute() is deprecated and will be removed in PHPUnit 9.');

        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(2, 'valid attribute name');
=======
     * @param mixed  $classOrObject
     * @param string $attributeName
     *
     * @return mixed
     *
     * @throws PHPUnit_Framework_Exception
     */
    public static function readAttribute($classOrObject, $attributeName)
    {
        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (is_string($classOrObject)) {
            if (!class_exists($classOrObject)) {
<<<<<<< HEAD
                throw InvalidArgumentException::create(
=======
                throw PHPUnit_Util_InvalidArgumentHelper::factory(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                    1,
                    'class name'
                );
            }

<<<<<<< HEAD
            return static::getStaticAttribute(
                $classOrObject,
                $attributeName
            );
        }

        if (is_object($classOrObject)) {
            return static::getObjectAttribute(
                $classOrObject,
                $attributeName
            );
        }

        throw InvalidArgumentException::create(
            1,
            'class name or object'
        );
=======
            return self::getStaticAttribute(
                $classOrObject,
                $attributeName
            );
        } elseif (is_object($classOrObject)) {
            return self::getObjectAttribute(
                $classOrObject,
                $attributeName
            );
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(
                1,
                'class name or object'
            );
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the value of a static attribute.
     * This also works for attributes that are declared protected or private.
     *
<<<<<<< HEAD
     * @throws Exception
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function getStaticAttribute(string $className, string $attributeName)
    {
        self::createWarning('getStaticAttribute() is deprecated and will be removed in PHPUnit 9.');

        if (!class_exists($className)) {
            throw InvalidArgumentException::create(1, 'class name');
        }

        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(2, 'valid attribute name');
        }

        try {
            $class = new ReflectionClass($className);
            // @codeCoverageIgnoreStart
        } catch (ReflectionException $e) {
            throw new Exception(
                $e->getMessage(),
                $e->getCode(),
                $e
            );
        }
        // @codeCoverageIgnoreEnd
=======
     * @param string $className
     * @param string $attributeName
     *
     * @return mixed
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getStaticAttribute($className, $attributeName)
    {
        if (!is_string($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'string');
        }

        if (!class_exists($className)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'class name');
        }

        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
        }

        $class = new ReflectionClass($className);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        while ($class) {
            $attributes = $class->getStaticProperties();

            if (array_key_exists($attributeName, $attributes)) {
                return $attributes[$attributeName];
            }

            $class = $class->getParentClass();
        }

<<<<<<< HEAD
        throw new Exception(
=======
        throw new PHPUnit_Framework_Exception(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            sprintf(
                'Attribute "%s" not found in class.',
                $attributeName
            )
        );
    }

    /**
     * Returns the value of an object's attribute.
     * This also works for attributes that are declared protected or private.
     *
     * @param object $object
<<<<<<< HEAD
     *
     * @throws Exception
     *
     * @deprecated https://github.com/sebastianbergmann/phpunit/issues/3338
     *
     * @codeCoverageIgnore
     */
    public static function getObjectAttribute($object, string $attributeName)
    {
        self::createWarning('getObjectAttribute() is deprecated and will be removed in PHPUnit 9.');

        if (!is_object($object)) {
            throw InvalidArgumentException::create(1, 'object');
        }

        if (!self::isValidClassAttributeName($attributeName)) {
            throw InvalidArgumentException::create(2, 'valid attribute name');
        }

        $reflector = new ReflectionObject($object);

        do {
            try {
                $attribute = $reflector->getProperty($attributeName);

                if (!$attribute || $attribute->isPublic()) {
                    return $object->{$attributeName};
                }

                $attribute->setAccessible(true);
                $value = $attribute->getValue($object);
                $attribute->setAccessible(false);

                return $value;
            } catch (ReflectionException $e) {
            }
        } while ($reflector = $reflector->getParentClass());

        throw new Exception(
=======
     * @param string $attributeName
     *
     * @return mixed
     *
     * @throws PHPUnit_Framework_Exception
     *
     * @since  Method available since Release 4.0.0
     */
    public static function getObjectAttribute($object, $attributeName)
    {
        if (!is_object($object)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'object');
        }

        if (!is_string($attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'string');
        }

        if (!preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName)) {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(2, 'valid attribute name');
        }

        try {
            $attribute = new ReflectionProperty($object, $attributeName);
        } catch (ReflectionException $e) {
            $reflector = new ReflectionObject($object);

            while ($reflector = $reflector->getParentClass()) {
                try {
                    $attribute = $reflector->getProperty($attributeName);
                    break;
                } catch (ReflectionException $e) {
                }
            }
        }

        if (isset($attribute)) {
            if (!$attribute || $attribute->isPublic()) {
                return $object->$attributeName;
            }

            $attribute->setAccessible(true);
            $value = $attribute->getValue($object);
            $attribute->setAccessible(false);

            return $value;
        }

        throw new PHPUnit_Framework_Exception(
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            sprintf(
                'Attribute "%s" not found in object.',
                $attributeName
            )
        );
    }

    /**
     * Mark the test as incomplete.
     *
<<<<<<< HEAD
     * @throws IncompleteTestError
     *
     * @psalm-return never-return
     */
    public static function markTestIncomplete(string $message = ''): void
    {
        throw new IncompleteTestError($message);
=======
     * @param string $message
     *
     * @throws PHPUnit_Framework_IncompleteTestError
     *
     * @since  Method available since Release 3.0.0
     */
    public static function markTestIncomplete($message = '')
    {
        throw new PHPUnit_Framework_IncompleteTestError($message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Mark the test as skipped.
     *
<<<<<<< HEAD
     * @throws SkippedTestError
     * @throws SyntheticSkippedError
     *
     * @psalm-return never-return
     */
    public static function markTestSkipped(string $message = ''): void
    {
        if ($hint = self::detectLocationHint($message)) {
            $trace = debug_backtrace(DEBUG_BACKTRACE_IGNORE_ARGS);
            array_unshift($trace, $hint);

            throw new SyntheticSkippedError($hint['message'], 0, $hint['file'], (int) $hint['line'], $trace);
        }

        throw new SkippedTestError($message);
=======
     * @param string $message
     *
     * @throws PHPUnit_Framework_SkippedTestError
     *
     * @since  Method available since Release 3.0.0
     */
    public static function markTestSkipped($message = '')
    {
        throw new PHPUnit_Framework_SkippedTestError($message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Return the current assertion count.
<<<<<<< HEAD
     */
    public static function getCount(): int
=======
     *
     * @return int
     *
     * @since  Method available since Release 3.3.3
     */
    public static function getCount()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::$count;
    }

    /**
     * Reset the assertion counter.
<<<<<<< HEAD
     */
    public static function resetCount(): void
    {
        self::$count = 0;
    }

    private static function detectLocationHint(string $message): ?array
    {
        $hint  = null;
        $lines = preg_split('/\r\n|\r|\n/', $message);

        while (strpos($lines[0], '__OFFSET') !== false) {
            $offset = explode('=', array_shift($lines));

            if ($offset[0] === '__OFFSET_FILE') {
                $hint['file'] = $offset[1];
            }

            if ($offset[0] === '__OFFSET_LINE') {
                $hint['line'] = $offset[1];
            }
        }

        if ($hint) {
            $hint['message'] = implode(PHP_EOL, $lines);
        }

        return $hint;
    }

    private static function isValidObjectAttributeName(string $attributeName): bool
    {
        return (bool) preg_match('/[^\x00-\x1f\x7f-\x9f]+/', $attributeName);
    }

    private static function isValidClassAttributeName(string $attributeName): bool
    {
        return (bool) preg_match('/[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*/', $attributeName);
    }

    /**
     * @codeCoverageIgnore
     */
    private static function createWarning(string $warning): void
    {
        foreach (debug_backtrace() as $step) {
            if (isset($step['object']) && $step['object'] instanceof TestCase) {
                assert($step['object'] instanceof TestCase);

                $step['object']->addWarning($warning);

                break;
            }
        }
    }

    /**
     * @throws Exception
     */
    private static function assertInternalTypeReplacement(string $type, bool $not): string
    {
        switch ($type) {
            case 'numeric':
                return 'assertIs' . ($not ? 'Not' : '') . 'Numeric';

            case 'integer':
            case 'int':
                return 'assertIs' . ($not ? 'Not' : '') . 'Int';

            case 'double':
            case 'float':
            case 'real':
                return 'assertIs' . ($not ? 'Not' : '') . 'Float';

            case 'string':
                return 'assertIs' . ($not ? 'Not' : '') . 'String';

            case 'boolean':
            case 'bool':
                return 'assertIs' . ($not ? 'Not' : '') . 'Bool';

            case 'null':
                return 'assert' . ($not ? 'Not' : '') . 'Null';

            case 'array':
                return 'assertIs' . ($not ? 'Not' : '') . 'Array';

            case 'object':
                return 'assertIs' . ($not ? 'Not' : '') . 'Object';

            case 'resource':
                return 'assertIs' . ($not ? 'Not' : '') . 'Resource';

            case 'scalar':
                return 'assertIs' . ($not ? 'Not' : '') . 'Scalar';

            case 'callable':
                return 'assertIs' . ($not ? 'Not' : '') . 'Callable';

            case 'iterable':
                return 'assertIs' . ($not ? 'Not' : '') . 'Iterable';
        }

        throw new Exception(
            sprintf(
                '"%s" is not a type supported by assertInternalType() / assertNotInternalType()',
                $type
            )
        );
    }
=======
     *
     * @since  Method available since Release 3.3.3
     */
    public static function resetCount()
    {
        self::$count = 0;
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
