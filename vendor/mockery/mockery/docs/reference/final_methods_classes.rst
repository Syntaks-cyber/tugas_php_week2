.. index::
    single: Mocking; Final Classes/Methods

Dealing with Final Classes/Methods
==================================

One of the primary restrictions of mock objects in PHP, is that mocking
classes or methods marked final is hard. The final keyword prevents methods so
marked from being replaced in subclasses (subclassing is how mock objects can
<<<<<<< HEAD
inherit the type of the class or object being mocked).

The simplest solution is to not mark classes or methods as final!
=======
inherit the type of the class or object being mocked.

The simplest solution is not to mark classes or methods as final!
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

However, in a compromise between mocking functionality and type safety,
Mockery does allow creating "proxy mocks" from classes marked final, or from
classes with methods marked final. This offers all the usual mock object
goodness but the resulting mock will not inherit the class type of the object
<<<<<<< HEAD
being mocked, i.e. it will not pass any instanceof comparison. Methods marked
as final will be proxied to the original method, i.e., final methods can't be
mocked.

We can create a proxy mock by passing the instantiated object we wish to
mock into ``\Mockery::mock()``, i.e. Mockery will then generate a Proxy to the
real object and selectively intercept method calls for the purposes of setting
and meeting expectations.

See the :ref:`creating-test-doubles-partial-test-doubles` chapter, the subsection
about proxied partial test doubles.
=======
being mocked, i.e.  it will not pass any instanceof comparison.

You can create a proxy mock by passing the instantiated object you wish to
mock into ``\Mockery::mock()``, i.e. Mockery will then generate a Proxy to the
real object and selectively intercept method calls for the purposes of setting
and meeting expectations.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
