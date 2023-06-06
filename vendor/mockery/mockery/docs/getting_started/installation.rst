.. index::
    single: Installation

Installation
============

<<<<<<< HEAD
Mockery can be installed using Composer or by cloning it from its GitHub
repository. These two options are outlined below.
=======
Mockery can be installed using Composer, PEAR or by cloning it from its GitHub
repository.  These three options are outlined below.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

Composer
--------

You can read more about Composer on `getcomposer.org <https://getcomposer.org>`_.
To install Mockery using Composer, first install Composer for your project
using the instructions on the `Composer download page <https://getcomposer.org/download/>`_.
You can then define your development dependency on Mockery using the suggested
parameters below. While every effort is made to keep the master branch stable,
you may prefer to use the current stable version tag instead (use the
``@stable`` tag).

.. code-block:: json

    {
        "require-dev": {
            "mockery/mockery": "dev-master"
        }
    }

To install, you then may call:

.. code-block:: bash

    php composer.phar update

This will install Mockery as a development dependency, meaning it won't be
installed when using ``php composer.phar update --no-dev`` in production.

<<<<<<< HEAD
Other way to install is directly from composer command line, as below.

.. code-block:: bash

    php composer.phar require --dev mockery/mockery
=======
PEAR
----

Mockery is hosted on the `survivethedeepend.com <http://pear.survivethedeepend.com>`_
PEAR channel and can be installed using the following commands:

.. code-block:: bash

    sudo pear channel-discover pear.survivethedeepend.com
    sudo pear channel-discover hamcrest.googlecode.com/svn/pear
    sudo pear install --alldeps deepend/Mockery
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

Git
---

The Git repository hosts the development version in its master branch. You can
install this using Composer by referencing ``dev-master`` as your preferred
version in your project's ``composer.json`` file as the earlier example shows.
<<<<<<< HEAD
=======

You may also install this development version using PEAR:

.. code-block:: bash

    git clone git://github.com/padraic/mockery.git
    cd mockery
    sudo pear channel-discover hamcrest.googlecode.com/svn/pear
    sudo pear install --alldeps package.xml

The above processes will install both Mockery and Hamcrest. While omitting
Hamcrest will not break Mockery, Hamcrest is recommended as it adds a wider
variety of functionality for argument matching.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
