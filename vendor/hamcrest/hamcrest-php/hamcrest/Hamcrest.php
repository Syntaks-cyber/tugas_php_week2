<?php

/*
 Copyright (c) 2009-2010 hamcrest.org
 */

// This file is generated from the static method @factory doctags.

if (!function_exists('assertThat')) {
    /**
     * Make an assertion and throw {@link Hamcrest_AssertionError} if it fails.
     *
     * Example:
     * <pre>
     * //With an identifier
     * assertThat("assertion identifier", $apple->flavour(), equalTo("tasty"));
     * //Without an identifier
     * assertThat($apple->flavour(), equalTo("tasty"));
     * //Evaluating a boolean expression
     * assertThat("some error", $a > $b);
     * </pre>
     */
    function assertThat()
    {
        $args = func_get_args();
        call_user_func_array(
            array('Hamcrest\MatcherAssert', 'assertThat'),
            $args
        );
    }
}

<<<<<<< HEAD
if (!function_exists('anArray')) {
    /**
=======
if (!function_exists('anArray')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to true only if each $matcher[$i] is satisfied by $array[$i].
     */
    function anArray(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArray', 'anArray'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('hasItemInArray')) {
    /**
=======
if (!function_exists('hasItemInArray')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to true if any item in an array satisfies the given matcher.
     *
     * @param mixed $item as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContaining
     */
    function hasItemInArray($item)
    {
        return \Hamcrest\Arrays\IsArrayContaining::hasItemInArray($item);
    }
}

<<<<<<< HEAD
if (!function_exists('hasValue')) {
    /**
=======
if (!function_exists('hasValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to true if any item in an array satisfies the given matcher.
     *
     * @param mixed $item as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContaining
     */
    function hasValue($item)
    {
        return \Hamcrest\Arrays\IsArrayContaining::hasItemInArray($item);
    }
}

<<<<<<< HEAD
if (!function_exists('arrayContainingInAnyOrder')) {
    /**
=======
if (!function_exists('arrayContainingInAnyOrder')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * An array with elements that match the given matchers.
     */
    function arrayContainingInAnyOrder(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('containsInAnyOrder')) {
    /**
=======
if (!function_exists('containsInAnyOrder')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * An array with elements that match the given matchers.
     */
    function containsInAnyOrder(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInAnyOrder', 'arrayContainingInAnyOrder'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('arrayContaining')) {
    /**
=======
if (!function_exists('arrayContaining')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * An array with elements that match the given matchers in the same order.
     */
    function arrayContaining(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInOrder', 'arrayContaining'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('contains')) {
    /**
=======
if (!function_exists('contains')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * An array with elements that match the given matchers in the same order.
     */
    function contains(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Arrays\IsArrayContainingInOrder', 'arrayContaining'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('hasKeyInArray')) {
    /**
=======
if (!function_exists('hasKeyInArray')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to true if any key in an array matches the given matcher.
     *
     * @param mixed $key as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContainingKey
     */
    function hasKeyInArray($key)
    {
        return \Hamcrest\Arrays\IsArrayContainingKey::hasKeyInArray($key);
    }
}

<<<<<<< HEAD
if (!function_exists('hasKey')) {
    /**
=======
if (!function_exists('hasKey')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to true if any key in an array matches the given matcher.
     *
     * @param mixed $key as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayContainingKey
     */
    function hasKey($key)
    {
        return \Hamcrest\Arrays\IsArrayContainingKey::hasKeyInArray($key);
    }
}

<<<<<<< HEAD
if (!function_exists('hasKeyValuePair')) {
    /**
=======
if (!function_exists('hasKeyValuePair')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Test if an array has both an key and value in parity with each other.
     */
    function hasKeyValuePair($key, $value)
    {
        return \Hamcrest\Arrays\IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
    }
}

<<<<<<< HEAD
if (!function_exists('hasEntry')) {
    /**
=======
if (!function_exists('hasEntry')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Test if an array has both an key and value in parity with each other.
     */
    function hasEntry($key, $value)
    {
        return \Hamcrest\Arrays\IsArrayContainingKeyValuePair::hasKeyValuePair($key, $value);
    }
}

<<<<<<< HEAD
if (!function_exists('arrayWithSize')) {
    /**
=======
if (!function_exists('arrayWithSize')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Does array size satisfy a given matcher?
     *
     * @param \Hamcrest\Matcher|int $size as a {@link Hamcrest\Matcher} or a value.
     *
     * @return \Hamcrest\Arrays\IsArrayWithSize
     */
    function arrayWithSize($size)
    {
        return \Hamcrest\Arrays\IsArrayWithSize::arrayWithSize($size);
    }
}

<<<<<<< HEAD
if (!function_exists('emptyArray')) {
    /**
=======
if (!function_exists('emptyArray')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches an empty array.
     */
    function emptyArray()
    {
        return \Hamcrest\Arrays\IsArrayWithSize::emptyArray();
    }
}

<<<<<<< HEAD
if (!function_exists('nonEmptyArray')) {
    /**
=======
if (!function_exists('nonEmptyArray')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches an empty array.
     */
    function nonEmptyArray()
    {
        return \Hamcrest\Arrays\IsArrayWithSize::nonEmptyArray();
    }
}

<<<<<<< HEAD
if (!function_exists('emptyTraversable')) {
    /**
=======
if (!function_exists('emptyTraversable')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Returns true if traversable is empty.
     */
    function emptyTraversable()
    {
        return \Hamcrest\Collection\IsEmptyTraversable::emptyTraversable();
    }
}

<<<<<<< HEAD
if (!function_exists('nonEmptyTraversable')) {
    /**
=======
if (!function_exists('nonEmptyTraversable')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Returns true if traversable is not empty.
     */
    function nonEmptyTraversable()
    {
        return \Hamcrest\Collection\IsEmptyTraversable::nonEmptyTraversable();
    }
}

<<<<<<< HEAD
if (!function_exists('traversableWithSize')) {
    /**
=======
if (!function_exists('traversableWithSize')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Does traversable size satisfy a given matcher?
     */
    function traversableWithSize($size)
    {
        return \Hamcrest\Collection\IsTraversableWithSize::traversableWithSize($size);
    }
}

<<<<<<< HEAD
if (!function_exists('allOf')) {
    /**
=======
if (!function_exists('allOf')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to true only if ALL of the passed in matchers evaluate to true.
     */
    function allOf(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AllOf', 'allOf'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('anyOf')) {
    /**
=======
if (!function_exists('anyOf')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to true if ANY of the passed in matchers evaluate to true.
     */
    function anyOf(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AnyOf', 'anyOf'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('noneOf')) {
    /**
=======
if (!function_exists('noneOf')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Evaluates to false if ANY of the passed in matchers evaluate to true.
     */
    function noneOf(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\AnyOf', 'noneOf'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('both')) {
    /**
=======
if (!function_exists('both')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * This is useful for fluently combining matchers that must both pass.
     * For example:
     * <pre>
     *   assertThat($string, both(containsString("a"))->andAlso(containsString("b")));
     * </pre>
     */
    function both(\Hamcrest\Matcher $matcher)
    {
        return \Hamcrest\Core\CombinableMatcher::both($matcher);
    }
}

<<<<<<< HEAD
if (!function_exists('either')) {
    /**
=======
if (!function_exists('either')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * This is useful for fluently combining matchers where either may pass,
     * for example:
     * <pre>
     *   assertThat($string, either(containsString("a"))->orElse(containsString("b")));
     * </pre>
     */
    function either(\Hamcrest\Matcher $matcher)
    {
        return \Hamcrest\Core\CombinableMatcher::either($matcher);
    }
}

<<<<<<< HEAD
if (!function_exists('describedAs')) {
    /**
=======
if (!function_exists('describedAs')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Wraps an existing matcher and overrides the description when it fails.
     */
    function describedAs(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\DescribedAs', 'describedAs'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('everyItem')) {
    /**
=======
if (!function_exists('everyItem')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param Matcher $itemMatcher
     *   A matcher to apply to every element in an array.
     *
     * @return \Hamcrest\Core\Every
     *   Evaluates to TRUE for a collection in which every item matches $itemMatcher
     */
    function everyItem(\Hamcrest\Matcher $itemMatcher)
    {
        return \Hamcrest\Core\Every::everyItem($itemMatcher);
    }
}

<<<<<<< HEAD
if (!function_exists('hasToString')) {
    /**
=======
if (!function_exists('hasToString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Does array size satisfy a given matcher?
     */
    function hasToString($matcher)
    {
        return \Hamcrest\Core\HasToString::hasToString($matcher);
    }
}

<<<<<<< HEAD
if (!function_exists('is')) {
    /**
=======
if (!function_exists('is')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Decorates another Matcher, retaining the behavior but allowing tests
     * to be slightly more expressive.
     *
     * For example:  assertThat($cheese, equalTo($smelly))
     *          vs.  assertThat($cheese, is(equalTo($smelly)))
     */
    function is($value)
    {
        return \Hamcrest\Core\Is::is($value);
    }
}

<<<<<<< HEAD
if (!function_exists('anything')) {
    /**
=======
if (!function_exists('anything')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * This matcher always evaluates to true.
     *
     * @param string $description A meaningful string used when describing itself.
     *
     * @return \Hamcrest\Core\IsAnything
     */
    function anything($description = 'ANYTHING')
    {
        return \Hamcrest\Core\IsAnything::anything($description);
    }
}

<<<<<<< HEAD
if (!function_exists('hasItem')) {
    /**
=======
if (!function_exists('hasItem')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Test if the value is an array containing this matcher.
     *
     * Example:
     * <pre>
     * assertThat(array('a', 'b'), hasItem(equalTo('b')));
     * //Convenience defaults to equalTo()
     * assertThat(array('a', 'b'), hasItem('b'));
     * </pre>
     */
    function hasItem(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\IsCollectionContaining', 'hasItem'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('hasItems')) {
    /**
=======
if (!function_exists('hasItems')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Test if the value is an array containing elements that match all of these
     * matchers.
     *
     * Example:
     * <pre>
     * assertThat(array('a', 'b', 'c'), hasItems(equalTo('a'), equalTo('b')));
     * </pre>
     */
    function hasItems(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Core\IsCollectionContaining', 'hasItems'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('equalTo')) {
    /**
=======
if (!function_exists('equalTo')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value equal to another value, as tested by the use of the "=="
     * comparison operator?
     */
    function equalTo($item)
    {
        return \Hamcrest\Core\IsEqual::equalTo($item);
    }
}

<<<<<<< HEAD
if (!function_exists('identicalTo')) {
    /**
=======
if (!function_exists('identicalTo')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Tests of the value is identical to $value as tested by the "===" operator.
     */
    function identicalTo($value)
    {
        return \Hamcrest\Core\IsIdentical::identicalTo($value);
    }
}

<<<<<<< HEAD
if (!function_exists('anInstanceOf')) {
    /**
=======
if (!function_exists('anInstanceOf')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value an instance of a particular type?
     * This version assumes no relationship between the required type and
     * the signature of the method that sets it up, for example in
     * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
     */
    function anInstanceOf($theClass)
    {
        return \Hamcrest\Core\IsInstanceOf::anInstanceOf($theClass);
    }
}

<<<<<<< HEAD
if (!function_exists('any')) {
    /**
=======
if (!function_exists('any')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value an instance of a particular type?
     * This version assumes no relationship between the required type and
     * the signature of the method that sets it up, for example in
     * <code>assertThat($anObject, anInstanceOf('Thing'));</code>
     */
    function any($theClass)
    {
        return \Hamcrest\Core\IsInstanceOf::anInstanceOf($theClass);
    }
}

<<<<<<< HEAD
if (!function_exists('not')) {
    /**
=======
if (!function_exists('not')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value does not match $value.
     */
    function not($value)
    {
        return \Hamcrest\Core\IsNot::not($value);
    }
}

<<<<<<< HEAD
if (!function_exists('nullValue')) {
    /**
=======
if (!function_exists('nullValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is null.
     */
    function nullValue()
    {
        return \Hamcrest\Core\IsNull::nullValue();
    }
}

<<<<<<< HEAD
if (!function_exists('notNullValue')) {
    /**
=======
if (!function_exists('notNullValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is not null.
     */
    function notNullValue()
    {
        return \Hamcrest\Core\IsNull::notNullValue();
    }
}

<<<<<<< HEAD
if (!function_exists('sameInstance')) {
    /**
=======
if (!function_exists('sameInstance')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Creates a new instance of IsSame.
     *
     * @param mixed $object
     *   The predicate evaluates to true only when the argument is
     *   this object.
     *
     * @return \Hamcrest\Core\IsSame
     */
    function sameInstance($object)
    {
        return \Hamcrest\Core\IsSame::sameInstance($object);
    }
}

<<<<<<< HEAD
if (!function_exists('typeOf')) {
    /**
=======
if (!function_exists('typeOf')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a particular built-in type?
     */
    function typeOf($theType)
    {
        return \Hamcrest\Core\IsTypeOf::typeOf($theType);
    }
}

<<<<<<< HEAD
if (!function_exists('set')) {
    /**
=======
if (!function_exists('set')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value (class, object, or array) has named $property.
     */
    function set($property)
    {
        return \Hamcrest\Core\Set::set($property);
    }
}

<<<<<<< HEAD
if (!function_exists('notSet')) {
    /**
=======
if (!function_exists('notSet')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value (class, object, or array) does not have named $property.
     */
    function notSet($property)
    {
        return \Hamcrest\Core\Set::notSet($property);
    }
}

<<<<<<< HEAD
if (!function_exists('closeTo')) {
    /**
=======
if (!function_exists('closeTo')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a number equal to $value within some range of
     * acceptable error $delta.
     */
    function closeTo($value, $delta)
    {
        return \Hamcrest\Number\IsCloseTo::closeTo($value, $delta);
    }
}

<<<<<<< HEAD
if (!function_exists('comparesEqualTo')) {
    /**
=======
if (!function_exists('comparesEqualTo')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * The value is not > $value, nor < $value.
     */
    function comparesEqualTo($value)
    {
        return \Hamcrest\Number\OrderingComparison::comparesEqualTo($value);
    }
}

<<<<<<< HEAD
if (!function_exists('greaterThan')) {
    /**
=======
if (!function_exists('greaterThan')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * The value is > $value.
     */
    function greaterThan($value)
    {
        return \Hamcrest\Number\OrderingComparison::greaterThan($value);
    }
}

<<<<<<< HEAD
if (!function_exists('greaterThanOrEqualTo')) {
    /**
=======
if (!function_exists('greaterThanOrEqualTo')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * The value is >= $value.
     */
    function greaterThanOrEqualTo($value)
    {
        return \Hamcrest\Number\OrderingComparison::greaterThanOrEqualTo($value);
    }
}

<<<<<<< HEAD
if (!function_exists('atLeast')) {
    /**
=======
if (!function_exists('atLeast')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * The value is >= $value.
     */
    function atLeast($value)
    {
        return \Hamcrest\Number\OrderingComparison::greaterThanOrEqualTo($value);
    }
}

<<<<<<< HEAD
if (!function_exists('lessThan')) {
    /**
=======
if (!function_exists('lessThan')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * The value is < $value.
     */
    function lessThan($value)
    {
        return \Hamcrest\Number\OrderingComparison::lessThan($value);
    }
}

<<<<<<< HEAD
if (!function_exists('lessThanOrEqualTo')) {
    /**
=======
if (!function_exists('lessThanOrEqualTo')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * The value is <= $value.
     */
    function lessThanOrEqualTo($value)
    {
        return \Hamcrest\Number\OrderingComparison::lessThanOrEqualTo($value);
    }
}

<<<<<<< HEAD
if (!function_exists('atMost')) {
    /**
=======
if (!function_exists('atMost')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * The value is <= $value.
     */
    function atMost($value)
    {
        return \Hamcrest\Number\OrderingComparison::lessThanOrEqualTo($value);
    }
}

<<<<<<< HEAD
if (!function_exists('isEmptyString')) {
    /**
=======
if (!function_exists('isEmptyString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a zero-length string.
     */
    function isEmptyString()
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyString();
    }
}

<<<<<<< HEAD
if (!function_exists('emptyString')) {
    /**
=======
if (!function_exists('emptyString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a zero-length string.
     */
    function emptyString()
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyString();
    }
}

<<<<<<< HEAD
if (!function_exists('isEmptyOrNullString')) {
    /**
=======
if (!function_exists('isEmptyOrNullString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is null or a zero-length string.
     */
    function isEmptyOrNullString()
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyOrNullString();
    }
}

<<<<<<< HEAD
if (!function_exists('nullOrEmptyString')) {
    /**
=======
if (!function_exists('nullOrEmptyString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is null or a zero-length string.
     */
    function nullOrEmptyString()
    {
        return \Hamcrest\Text\IsEmptyString::isEmptyOrNullString();
    }
}

<<<<<<< HEAD
if (!function_exists('isNonEmptyString')) {
    /**
=======
if (!function_exists('isNonEmptyString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a non-zero-length string.
     */
    function isNonEmptyString()
    {
        return \Hamcrest\Text\IsEmptyString::isNonEmptyString();
    }
}

<<<<<<< HEAD
if (!function_exists('nonEmptyString')) {
    /**
=======
if (!function_exists('nonEmptyString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a non-zero-length string.
     */
    function nonEmptyString()
    {
        return \Hamcrest\Text\IsEmptyString::isNonEmptyString();
    }
}

<<<<<<< HEAD
if (!function_exists('equalToIgnoringCase')) {
    /**
=======
if (!function_exists('equalToIgnoringCase')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a string equal to $string, regardless of the case.
     */
    function equalToIgnoringCase($string)
    {
        return \Hamcrest\Text\IsEqualIgnoringCase::equalToIgnoringCase($string);
    }
}

<<<<<<< HEAD
if (!function_exists('equalToIgnoringWhiteSpace')) {
    /**
=======
if (!function_exists('equalToIgnoringWhiteSpace')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a string equal to $string, regardless of whitespace.
     */
    function equalToIgnoringWhiteSpace($string)
    {
        return \Hamcrest\Text\IsEqualIgnoringWhiteSpace::equalToIgnoringWhiteSpace($string);
    }
}

<<<<<<< HEAD
if (!function_exists('matchesPattern')) {
    /**
=======
if (!function_exists('matchesPattern')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a string that matches regular expression $pattern.
     */
    function matchesPattern($pattern)
    {
        return \Hamcrest\Text\MatchesPattern::matchesPattern($pattern);
    }
}

<<<<<<< HEAD
if (!function_exists('containsString')) {
    /**
=======
if (!function_exists('containsString')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a string that contains $substring.
     */
    function containsString($substring)
    {
        return \Hamcrest\Text\StringContains::containsString($substring);
    }
}

<<<<<<< HEAD
if (!function_exists('containsStringIgnoringCase')) {
    /**
=======
if (!function_exists('containsStringIgnoringCase')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a string that contains $substring regardless of the case.
     */
    function containsStringIgnoringCase($substring)
    {
        return \Hamcrest\Text\StringContainsIgnoringCase::containsStringIgnoringCase($substring);
    }
}

<<<<<<< HEAD
if (!function_exists('stringContainsInOrder')) {
    /**
=======
if (!function_exists('stringContainsInOrder')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value contains $substrings in a constrained order.
     */
    function stringContainsInOrder(/* args... */)
    {
        $args = func_get_args();
        return call_user_func_array(array('\Hamcrest\Text\StringContainsInOrder', 'stringContainsInOrder'), $args);
    }
}

<<<<<<< HEAD
if (!function_exists('endsWith')) {
    /**
=======
if (!function_exists('endsWith')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a string that ends with $substring.
     */
    function endsWith($substring)
    {
        return \Hamcrest\Text\StringEndsWith::endsWith($substring);
    }
}

<<<<<<< HEAD
if (!function_exists('startsWith')) {
    /**
=======
if (!function_exists('startsWith')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Matches if value is a string that starts with $substring.
     */
    function startsWith($substring)
    {
        return \Hamcrest\Text\StringStartsWith::startsWith($substring);
    }
}

<<<<<<< HEAD
if (!function_exists('arrayValue')) {
    /**
=======
if (!function_exists('arrayValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value an array?
     */
    function arrayValue()
    {
        return \Hamcrest\Type\IsArray::arrayValue();
    }
}

<<<<<<< HEAD
if (!function_exists('booleanValue')) {
    /**
=======
if (!function_exists('booleanValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a boolean?
     */
    function booleanValue()
    {
        return \Hamcrest\Type\IsBoolean::booleanValue();
    }
}

<<<<<<< HEAD
if (!function_exists('boolValue')) {
    /**
=======
if (!function_exists('boolValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a boolean?
     */
    function boolValue()
    {
        return \Hamcrest\Type\IsBoolean::booleanValue();
    }
}

<<<<<<< HEAD
if (!function_exists('callableValue')) {
    /**
=======
if (!function_exists('callableValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value callable?
     */
    function callableValue()
    {
        return \Hamcrest\Type\IsCallable::callableValue();
    }
}

<<<<<<< HEAD
if (!function_exists('doubleValue')) {
    /**
=======
if (!function_exists('doubleValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a float/double?
     */
    function doubleValue()
    {
        return \Hamcrest\Type\IsDouble::doubleValue();
    }
}

<<<<<<< HEAD
if (!function_exists('floatValue')) {
    /**
=======
if (!function_exists('floatValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a float/double?
     */
    function floatValue()
    {
        return \Hamcrest\Type\IsDouble::doubleValue();
    }
}

<<<<<<< HEAD
if (!function_exists('integerValue')) {
    /**
=======
if (!function_exists('integerValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value an integer?
     */
    function integerValue()
    {
        return \Hamcrest\Type\IsInteger::integerValue();
    }
}

<<<<<<< HEAD
if (!function_exists('intValue')) {
    /**
=======
if (!function_exists('intValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value an integer?
     */
    function intValue()
    {
        return \Hamcrest\Type\IsInteger::integerValue();
    }
}

<<<<<<< HEAD
if (!function_exists('numericValue')) {
    /**
=======
if (!function_exists('numericValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a numeric?
     */
    function numericValue()
    {
        return \Hamcrest\Type\IsNumeric::numericValue();
    }
}

<<<<<<< HEAD
if (!function_exists('objectValue')) {
    /**
=======
if (!function_exists('objectValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value an object?
     */
    function objectValue()
    {
        return \Hamcrest\Type\IsObject::objectValue();
    }
}

<<<<<<< HEAD
if (!function_exists('anObject')) {
    /**
=======
if (!function_exists('anObject')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value an object?
     */
    function anObject()
    {
        return \Hamcrest\Type\IsObject::objectValue();
    }
}

<<<<<<< HEAD
if (!function_exists('resourceValue')) {
    /**
=======
if (!function_exists('resourceValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a resource?
     */
    function resourceValue()
    {
        return \Hamcrest\Type\IsResource::resourceValue();
    }
}

<<<<<<< HEAD
if (!function_exists('scalarValue')) {
    /**
=======
if (!function_exists('scalarValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a scalar (boolean, integer, double, or string)?
     */
    function scalarValue()
    {
        return \Hamcrest\Type\IsScalar::scalarValue();
    }
}

<<<<<<< HEAD
if (!function_exists('stringValue')) {
    /**
=======
if (!function_exists('stringValue')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Is the value a string?
     */
    function stringValue()
    {
        return \Hamcrest\Type\IsString::stringValue();
    }
}

<<<<<<< HEAD
if (!function_exists('hasXPath')) {
    /**
=======
if (!function_exists('hasXPath')) {    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Wraps <code>$matcher</code> with {@link Hamcrest\Core\IsEqual)
     * if it's not a matcher and the XPath in <code>count()</code>
     * if it's an integer.
     */
    function hasXPath($xpath, $matcher = null)
    {
        return \Hamcrest\Xml\HasXPath::hasXPath($xpath, $matcher);
    }
}
