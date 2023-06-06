.. index::
    single: PHPUnit Integration

PHPUnit Integration
===================

Mockery was designed as a simple-to-use *standalone* mock object framework, so
its need for integration with any testing framework is entirely optional.  To
<<<<<<< HEAD
integrate Mockery, we need to define a ``tearDown()`` method for our tests
containing the following (we may use a shorter ``\Mockery`` namespace
=======
integrate Mockery, you just need to define a ``tearDown()`` method for your
tests containing the following (you may use a shorter ``\Mockery`` namespace
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
alias):

.. code-block:: php

    public function tearDown() {
        \Mockery::close();
    }

This static call cleans up the Mockery container used by the current test, and
<<<<<<< HEAD
run any verification tasks needed for our expectations.

For some added brevity when it comes to using Mockery, we can also explicitly
=======
run any verification tasks needed for your expectations.

For some added brevity when it comes to using Mockery, you can also explicitly
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use the Mockery namespace with a shorter alias. For example:

.. code-block:: php

    use \Mockery as m;

<<<<<<< HEAD
    class SimpleTest extends \PHPUnit\Framework\TestCase
=======
    class SimpleTest extends PHPUnit_Framework_TestCase
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        public function testSimpleMock() {
            $mock = m::mock('simplemock');
            $mock->shouldReceive('foo')->with(5, m::any())->once()->andReturn(10);

            $this->assertEquals(10, $mock->foo(5));
        }

        public function tearDown() {
            m::close();
        }
    }

<<<<<<< HEAD
Mockery ships with an autoloader so we don't need to litter our tests with
``require_once()`` calls. To use it, ensure Mockery is on our
``include_path`` and add the following to our test suite's ``Bootstrap.php``
=======
Mockery ships with an autoloader so you don't need to litter your tests with
``require_once()`` calls. To use it, ensure Mockery is on your
``include_path`` and add the following to your test suite's ``Bootstrap.php``
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
or ``TestHelper.php`` file:

.. code-block:: php

    require_once 'Mockery/Loader.php';
    require_once 'Hamcrest/Hamcrest.php';

    $loader = new \Mockery\Loader;
    $loader->register();

<<<<<<< HEAD
If we are using Composer, we can simplify this to including the Composer
generated autoloader file:
=======
If you are using Composer, you can simplify this to just including the
Composer generated autoloader file:
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

.. code-block:: php

    require __DIR__ . '/../vendor/autoload.php'; // assuming vendor is one directory up

.. caution::

    Prior to Hamcrest 1.0.0, the ``Hamcrest.php`` file name had a small "h"
    (i.e. ``hamcrest.php``).  If upgrading Hamcrest to 1.0.0 remember to check
    the file name is updated for all your projects.)

To integrate Mockery into PHPUnit and avoid having to call the close method
<<<<<<< HEAD
and have Mockery remove itself from code coverage reports, have your test case
extends the ``\Mockery\Adapter\Phpunit\MockeryTestCase``:

.. code-block:: php

    class MyTest extends \Mockery\Adapter\Phpunit\MockeryTestCase
    {

    }

An alternative is to use the supplied trait:

.. code-block:: php

    class MyTest extends \PHPUnit\Framework\TestCase
    {
        use \Mockery\Adapter\Phpunit\MockeryPHPUnitIntegration;
    }

Extending ``MockeryTestCase`` or using the ``MockeryPHPUnitIntegration``
trait is **the recommended way** of integrating Mockery with PHPUnit,
since Mockery 1.0.0.

PHPUnit listener
----------------

Before the 1.0.0 release, Mockery provided a PHPUnit listener that would
call ``Mockery::close()`` for us at the end of a test. This has changed
significantly since the 1.0.0 version.

Now, Mockery provides a PHPUnit listener that makes tests fail if
``Mockery::close()`` has not been called. It can help identify tests where
we've forgotten to include the trait or extend the ``MockeryTestCase``.

If we are using PHPUnit's XML configuration approach, we can include the
=======
and have Mockery remove itself from code coverage reports, use this in you
suite:

.. code-block:: php

    // Create Suite
    $suite = new PHPUnit_Framework_TestSuite();

    // Create a result listener or add it
    $result = new PHPUnit_Framework_TestResult();
    $result->addListener(new \Mockery\Adapter\Phpunit\TestListener());

    // Run the tests.
    $suite->run($result);

If you are using PHPUnit's XML configuration approach, you can include the
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
following to load the ``TestListener``:

.. code-block:: xml

    <listeners>
        <listener class="\Mockery\Adapter\Phpunit\TestListener"></listener>
    </listeners>

Make sure Composer's or Mockery's autoloader is present in the bootstrap file
<<<<<<< HEAD
or we will need to also define a "file" attribute pointing to the file of the
``TestListener`` class.

.. caution::

    The ``TestListener`` will only work for PHPUnit 6+ versions.

    For PHPUnit versions 5 and lower, the test listener does not work.

If we are creating the test suite programmatically we may add the listener
like this:

.. code-block:: php

    // Create the suite.
    $suite = new PHPUnit\Framework\TestSuite();

    // Create the listener and add it to the suite.
    $result = new PHPUnit\Framework\TestResult();
    $result->addListener(new \Mockery\Adapter\Phpunit\TestListener());

    // Run the tests.
    $suite->run($result);
=======
or you will need to also define a "file" attribute pointing to the file of the
above ``TestListener`` class.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

.. caution::

    PHPUnit provides a functionality that allows
<<<<<<< HEAD
    `tests to run in a separated process <http://phpunit.de/manual/current/en/appendixes.annotations.html#appendixes.annotations.runTestsInSeparateProcesses>`_,
    to ensure better isolation. Mockery verifies the mocks expectations using the
    ``Mockery::close()`` method, and provides a PHPUnit listener, that automatically
    calls this method for us after every test.

    However, this listener is not called in the right process when using
    PHPUnit's process isolation, resulting in expectations that might not be
    respected, but without raising any ``Mockery\Exception``. To avoid this,
    we cannot rely on the supplied Mockery PHPUnit ``TestListener``, and we need
    to explicitly call ``Mockery::close``. The easiest solution to include this
    call in the ``tearDown()`` method, as explained previously.
=======
    `tests to run in a separated process <http://phpunit.de/manual/4.0/en/appendixes.annotations.html#appendixes.annotations.runTestsInSeparateProcesses>`_,
    to ensure better isolation. Mockery verifies the mocks expectations using the
    ``Mockery::close()`` method, and provides a PHPUnit listener, that automatically
    calls this method for you after every test.

    However, this listener is not called in the right process when using PHPUnit's process
    isolation, resulting in expectations that might not be respected, but without raising
    any ``Mockery\Exception``. To avoid this, you cannot rely on the supplied Mockery PHPUnit
    ``TestListener``, and you need to explicitly calls ``Mockery::close``. The easiest solution
    to include this call in the ``tearDown()`` method, as explained previously.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
