.. index::
    single: Getting Started; Simple Example

Simple Example
==============

Imagine we have a ``Temperature`` class which samples the temperature of a
locale before reporting an average temperature. The data could come from a web
service or any other data source, but we do not have such a class at present.
We can, however, assume some basic interactions with such a class based on its
interaction with the ``Temperature`` class:

.. code-block:: php

    class Temperature
    {
<<<<<<< HEAD
        private $service;

        public function __construct($service)
        {
            $this->service = $service;
=======

        public function __construct($service)
        {
            $this->_service = $service;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        public function average()
        {
            $total = 0;
<<<<<<< HEAD
            for ($i=0; $i<3; $i++) {
                $total += $this->service->readTemp();
            }
            return $total/3;
        }
=======
            for ($i=0;$i<3;$i++) {
                $total += $this->_service->readTemp();
            }
            return $total/3;
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

Even without an actual service class, we can see how we expect it to operate.
When writing a test for the ``Temperature`` class, we can now substitute a
mock object for the real service which allows us to test the behaviour of the
``Temperature`` class without actually needing a concrete service instance.

.. code-block:: php

<<<<<<< HEAD
    use \Mockery;

    class TemperatureTest extends \PHPUnit\Framework\TestCase
    {
        public function tearDown()
        {
            Mockery::close();
=======
    use \Mockery as m;

    class TemperatureTest extends PHPUnit_Framework_TestCase
    {

        public function tearDown()
        {
            m::close();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        public function testGetsAverageTemperatureFromThreeServiceReadings()
        {
<<<<<<< HEAD
            $service = Mockery::mock('service');
            $service->shouldReceive('readTemp')
                ->times(3)
                ->andReturn(10, 12, 14);
=======
            $service = m::mock('service');
            $service->shouldReceive('readTemp')->times(3)->andReturn(10, 12, 14);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            $temperature = new Temperature($service);

            $this->assertEquals(12, $temperature->average());
        }
<<<<<<< HEAD
    }

We create a mock object which our ``Temperature`` class will use and set some
expectations for that mock — that it should receive three calls to the ``readTemp``
method, and these calls will return 10, 12, and 14 as results.
=======

    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

.. note::

    PHPUnit integration can remove the need for a ``tearDown()`` method. See
    ":doc:`/reference/phpunit_integration`" for more information.
