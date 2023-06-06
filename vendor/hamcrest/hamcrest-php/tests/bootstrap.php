<?php
<<<<<<< HEAD

error_reporting(E_ALL | E_STRICT);

=======
error_reporting(E_ALL | E_STRICT);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
require __DIR__ . '/../vendor/autoload.php';

if (defined('E_DEPRECATED')) {
    error_reporting(error_reporting() | E_DEPRECATED);
}

<<<<<<< HEAD
Hamcrest\Util::registerGlobalFunctions();
=======
define('HAMCREST_TEST_BASE', realpath(dirname(__FILE__)));
define('HAMCREST_BASE', realpath(dirname(dirname(__FILE__))));

set_include_path(implode(PATH_SEPARATOR, array(
    HAMCREST_TEST_BASE,
    HAMCREST_BASE . '/hamcrest',
    get_include_path()
)));

require_once 'Hamcrest.php';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
