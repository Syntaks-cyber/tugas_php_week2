<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing;

use Symfony\Component\Routing\Generator\UrlGeneratorInterface;
use Symfony\Component\Routing\Matcher\UrlMatcherInterface;

/**
 * RouterInterface is the interface that all Router classes must implement.
 *
 * This interface is the concatenation of UrlMatcherInterface and UrlGeneratorInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface RouterInterface extends UrlMatcherInterface, UrlGeneratorInterface
{
    /**
     * Gets the RouteCollection instance associated with this Router.
     *
<<<<<<< HEAD
     * WARNING: This method should never be used at runtime as it is SLOW.
     *          You might use it in a cache warmer though.
     *
     * @return RouteCollection
=======
     * @return RouteCollection A RouteCollection instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getRouteCollection();
}
