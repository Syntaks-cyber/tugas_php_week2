<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Matcher\Dumper;

use Symfony\Component\Routing\RouteCollection;

/**
 * MatcherDumperInterface is the interface that all matcher dumper classes must implement.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface MatcherDumperInterface
{
    /**
     * Dumps a set of routes to a string representation of executable code
     * that can then be used to match a request against these routes.
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
