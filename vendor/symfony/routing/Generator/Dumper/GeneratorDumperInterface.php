<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Generator\Dumper;

use Symfony\Component\Routing\RouteCollection;

/**
 * GeneratorDumperInterface is the interface that all generator dumper classes must implement.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface GeneratorDumperInterface
{
    /**
     * Dumps a set of routes to a string representation of executable code
     * that can then be used to generate a URL of such a route.
     *
<<<<<<< HEAD
     * @return string
     */
    public function dump(array $options = []);
=======
     * @param array $options An array of options
     *
     * @return string Executable code
     */
    public function dump(array $options = array());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets the routes to dump.
     *
<<<<<<< HEAD
     * @return RouteCollection
=======
     * @return RouteCollection A RouteCollection instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getRoutes();
}
