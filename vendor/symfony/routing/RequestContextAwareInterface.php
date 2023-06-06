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

interface RequestContextAwareInterface
{
    /**
     * Sets the request context.
<<<<<<< HEAD
=======
     *
     * @param RequestContext $context The context
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setContext(RequestContext $context);

    /**
     * Gets the request context.
     *
<<<<<<< HEAD
     * @return RequestContext
=======
     * @return RequestContext The context
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getContext();
}
