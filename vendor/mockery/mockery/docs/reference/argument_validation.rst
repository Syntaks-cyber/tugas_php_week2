.. index::
    single: Argument Validation

Argument Validation
===================

The arguments passed to the ``with()`` declaration when setting up an
expectation determine the criteria for matching method calls to expectations.
<<<<<<< HEAD
Thus, we can setup up many expectations for a single method, each
=======
Thus, you can setup up many expectations for a single method, each
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
differentiated by the expected arguments. Such argument matching is done on a
"best fit" basis.  This ensures explicit matches take precedence over
generalised matches.

An explicit match is merely where the expected argument and the actual
argument are easily equated (i.e. using ``===`` or ``==``). More generalised
matches are possible using regular expressions, class hinting and the
available generic matchers. The purpose of generalised matchers is to allow
arguments be defined in non-explicit terms, e.g. ``Mockery::any()`` passed to
``with()`` will match **any** argument in that position.

Mockery's generic matchers do not cover all possibilities but offers optional
support for the Hamcrest library of matchers. Hamcrest is a PHP port of the
similarly named Java library (which has been ported also to Python, Erlang,
<<<<<<< HEAD
etc). By using Hamcrest, Mockery does not need to duplicate Hamcrest's already
impressive utility which itself promotes a natural English DSL.

The examples below show Mockery matchers and their Hamcrest equivalent, if there
is one. Hamcrest uses functions (no namespacing).

.. note::

    If you don't wish to use the global Hamcrest functions, they are all exposed
    through the ``\Hamcrest\Matchers`` class as well, as static methods. Thus,
    ``identicalTo($arg)`` is the same as ``\Hamcrest\Matchers::identicalTo($arg)``

The most common matcher is the ``with()`` matcher:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(1):

It tells mockery that it should receive a call to the ``foo`` method with the
integer ``1`` as an argument. In cases like this, Mockery first tries to match
the arguments using ``===`` (identical) comparison operator. If the argument is
a primitive, and if it fails the identical comparison, Mockery does a fallback
to the ``==`` (equals) comparison operator.

When matching objects as arguments, Mockery only does the strict ``===``
comparison, which means only the same ``$object`` will match:

.. code-block:: php

    $object = new stdClass();
    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive("foo")
        ->with($object);

    // Hamcrest equivalent
    $mock->shouldReceive("foo")
        ->with(identicalTo($object));

A different instance of ``stdClass`` will **not** match.

.. note::

    The ``Mockery\Matcher\MustBe`` matcher has been deprecated.

If we need a loose comparison of objects, we can do that using Hamcrest's
``equalTo`` matcher:

.. code-block:: php

    $mock->shouldReceive("foo")
        ->with(equalTo(new stdClass));

In cases when we don't care about the type, or the value of an argument, just
that any argument is present, we use ``any()``:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive("foo")
        ->with(\Mockery::any());

    // Hamcrest equivalent
    $mock->shouldReceive("foo")
        ->with(anything())

Anything and everything passed in this argument slot is passed unconstrained.

Validating Types and Resources
------------------------------

The ``type()`` matcher accepts any string which can be attached to ``is_`` to
form a valid type check.

To match any PHP resource, we could do the following:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive("foo")
        ->with(\Mockery::type('resource'));

    // Hamcrest equivalents
    $mock->shouldReceive("foo")
        ->with(resourceValue());
    $mock->shouldReceive("foo")
        ->with(typeOf('resource'));

It will return a ``true`` from an ``is_resource()`` call, if the provided
argument to the method is a PHP resource. For example, ``\Mockery::type('float')``
or Hamcrest's ``floatValue()`` and ``typeOf('float')`` checks use ``is_float()``,
and ``\Mockery::type('callable')`` or Hamcrest's ``callable()`` uses
``is_callable()``.

The ``type()`` matcher also accepts a class or interface name to be used in an
``instanceof`` evaluation of the actual argument. Hamcrest uses ``anInstanceOf()``.

A full list of the type checkers is available at
`php.net <http://www.php.net/manual/en/ref.var.php>`_ or browse Hamcrest's function
list in
`the Hamcrest code <https://github.com/hamcrest/hamcrest-php/blob/master/hamcrest/Hamcrest.php>`_.

.. _argument-validation-complex-argument-validation:

Complex Argument Validation
---------------------------

If we want to perform a complex argument validation, the ``on()`` matcher is
invaluable. It accepts a closure (anonymous function) to which the actual
argument will be passed.

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive("foo")
        ->with(\Mockery::on(closure));

If the closure evaluates to (i.e. returns) boolean ``true`` then the argument is
assumed to have matched the expectation.

.. code-block:: php

    $mock = \Mockery::mock('MyClass');

    $mock->shouldReceive('foo')
        ->with(\Mockery::on(function ($argument) {
            if ($argument % 2 == 0) {
                return true;
            }
            return false;
        }));

    $mock->foo(4); // matches the expectation
    $mock->foo(3); // throws a NoMatchingExpectationException

.. note::

    There is no Hamcrest version of the ``on()`` matcher.

We can also perform argument validation by passing a closure to ``withArgs()``
method. The closure will receive all arguments passed in the call to the expected
method and if it evaluates (i.e. returns) to boolean ``true``, then the list of
arguments is assumed to have matched the expectation:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive("foo")
        ->withArgs(closure);

The closure can also handle optional parameters, so if an optional parameter is
missing in the call to the expected method, it doesn't necessary means that the
list of arguments doesn't match the expectation.

.. code-block:: php

    $closure = function ($odd, $even, $sum = null) {
        $result = ($odd % 2 != 0) && ($even % 2 == 0);
        if (!is_null($sum)) {
            return $result && ($odd + $even == $sum);
        }
        return $result;
    };

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')->withArgs($closure);

    $mock->foo(1, 2); // It matches the expectation: the optional argument is not needed
    $mock->foo(1, 2, 3); // It also matches the expectation: the optional argument pass the validation
    $mock->foo(1, 2, 4); // It doesn't match the expectation: the optional doesn't pass the validation

.. note::

    In previous versions, Mockery's ``with()`` would attempt to do a pattern
    matching against the arguments, attempting to use the argument as a
    regular expression. Over time this proved to be not such a great idea, so
    we removed this functionality, and have introduced ``Mockery::pattern()``
    instead.

If we would like to match an argument against a regular expression, we can use
the ``\Mockery::pattern()``:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::pattern('/^foo/'));

    // Hamcrest equivalent
    $mock->shouldReceive('foo')
        with(matchesPattern('/^foo/'));

The ``ducktype()`` matcher is an alternative to matching by class type:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::ducktype('foo', 'bar'));

It matches any argument which is an object containing the provided list of
methods to call.

.. note::

    There is no Hamcrest version of the ``ducktype()`` matcher.

Capturing Arguments
-------------------

If we want to perform multiple validations on a single argument, the ``capture``
matcher provides a streamlined alternative to using the ``on()`` matcher.
It accepts a variable which the actual argument will be assigned.

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive("foo")
        ->with(\Mockery::capture($bar));

This will assign *any* argument passed to ``foo`` to the local ``$bar`` variable to
then perform additional validation using assertions.

.. note::

    The ``capture`` matcher always evaluates to ``true``. As such, we should always
    perform additional argument validation.

Additional Argument Matchers
----------------------------

The ``not()`` matcher matches any argument which is not equal or identical to
the matcher's parameter:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::not(2));

    // Hamcrest equivalent
    $mock->shouldReceive('foo')
        ->with(not(2));

``anyOf()`` matches any argument which equals any one of the given parameters:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::anyOf(1, 2));

    // Hamcrest equivalent
    $mock->shouldReceive('foo')
        ->with(anyOf(1,2));

``notAnyOf()`` matches any argument which is not equal or identical to any of
the given parameters:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::notAnyOf(1, 2));

.. note::

    There is no Hamcrest version of the ``notAnyOf()`` matcher.

``subset()`` matches any argument which is any array containing the given array
subset:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::subset(array(0 => 'foo')));

This enforces both key naming and values, i.e. both the key and value of each
actual element is compared.

.. note::

    There is no Hamcrest version of this functionality, though Hamcrest can check
    a single entry using ``hasEntry()`` or ``hasKeyValuePair()``.

``contains()`` matches any argument which is an array containing the listed
values:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::contains(value1, value2));

The naming of keys is ignored.

``hasKey()`` matches any argument which is an array containing the given key
name:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::hasKey(key));

``hasValue()`` matches any argument which is an array containing the given
value:

.. code-block:: php

    $mock = \Mockery::mock('MyClass');
    $mock->shouldReceive('foo')
        ->with(\Mockery::hasValue(value));
=======
etc).  I strongly recommend using Hamcrest since Mockery simply does not need
to duplicate Hamcrest's already impressive utility which itself promotes a
natural English DSL.

The example below show Mockery matchers and their Hamcrest equivalent.
Hamcrest uses functions (no namespacing).

Here's a sample of the possibilities.

.. code-block:: php

    with(1)

Matches the integer ``1``. This passes the ``===`` test (identical). It does
facilitate a less strict ``==`` check (equals) where the string ``'1'`` would
also match the
argument.

.. code-block:: php

    with(\Mockery::any()) OR with(anything())

Matches any argument. Basically, anything and everything passed in this
argument slot is passed unconstrained.

.. code-block:: php

    with(\Mockery::type('resource')) OR with(resourceValue()) OR with(typeOf('resource'))

Matches any resource, i.e. returns true from an ``is_resource()`` call. The
Type matcher accepts any string which can be attached to ``is_`` to form a
valid type check. For example, ``\Mockery::type('float')`` or Hamcrest's
``floatValue()`` and ``typeOf('float')`` checks using ``is_float()``, and
``\Mockery::type('callable')`` or Hamcrest's ``callable()`` uses
``is_callable()``.

The Type matcher also accepts a class or interface name to be used in an
``instanceof`` evaluation of the actual argument (similarly Hamcrest uses
``anInstanceOf()``).

You may find a full list of the available type checkers at
`php.net <http://www.php.net/manual/en/ref.var.php>`_ or browse Hamcrest's function
list in
`the Hamcrest code <http://code.google.com/p/hamcrest/source/browse/trunk/hamcrest-php/hamcrest/Hamcrest.php>`_.

.. code-block:: php

    with(\Mockery::on(closure))

The On matcher accepts a closure (anonymous function) to which the actual
argument will be passed. If the closure evaluates to (i.e. returns) boolean
``true`` then the argument is assumed to have matched the expectation. This is
invaluable where your argument expectation is a bit too complex for or simply
not implemented in the current default matchers.

There is no Hamcrest version of this functionality.

.. code-block:: php

    with('/^foo/') OR with(matchesPattern('/^foo/'))

The argument declarator also assumes any given string may be a regular
expression to be used against actual arguments when matching. The regex option
is only used when a) there is no ``===`` or ``==`` match and b) when the regex
is verified to be a valid regex (i.e. does not return false from
``preg_match()``).  If the regex detection doesn't suit your tastes, Hamcrest
offers the more explicit ``matchesPattern()`` function.

.. code-block:: php

    with(\Mockery::ducktype('foo', 'bar'))

The Ducktype matcher is an alternative to matching by class type. It simply
matches any argument which is an object containing the provided list of
methods to call.

There is no Hamcrest version of this functionality.

.. code-block:: php

    with(\Mockery::mustBe(2)) OR with(identicalTo(2))

The MustBe matcher is more strict than the default argument matcher. The
default matcher allows for PHP type casting, but the MustBe matcher also
verifies that the argument must be of the same type as the expected value.
Thus by default, the argument `'2'` matches the actual argument 2 (integer)
but the MustBe matcher would fail in the same situation since the expected
argument was a string and instead we got an integer.

Note: Objects are not subject to an identical comparison using this matcher
since PHP would fail the comparison if both objects were not the exact same
instance. This is a hindrance when objects are generated prior to being
returned, since an identical match just would never be possible.

.. code-block:: php

    with(\Mockery::not(2)) OR with(not(2))

The Not matcher matches any argument which is not equal or identical to the
matcher's parameter.

.. code-block:: php

    with(\Mockery::anyOf(1, 2)) OR with(anyOf(1,2))

Matches any argument which equals any one of the given parameters.

.. code-block:: php

    with(\Mockery::notAnyOf(1, 2))

Matches any argument which is not equal or identical to any of the given
parameters.

There is no Hamcrest version of this functionality.

.. code-block:: php

    with(\Mockery::subset(array(0 => 'foo')))

Matches any argument which is any array containing the given array subset.
This enforces both key naming and values, i.e. both the key and value of each
actual element is compared.

There is no Hamcrest version of this functionality, though Hamcrest can check
a single entry using ``hasEntry()`` or ``hasKeyValuePair()``.

.. code-block:: php

    with(\Mockery::contains(value1, value2))

Matches any argument which is an array containing the listed values. The
naming of keys is ignored.

.. code-block:: php

    with(\Mockery::hasKey(key));

Matches any argument which is an array containing the given key name.

.. code-block:: php

    with(\Mockery::hasValue(value));

Matches any argument which is an array containing the given value.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
