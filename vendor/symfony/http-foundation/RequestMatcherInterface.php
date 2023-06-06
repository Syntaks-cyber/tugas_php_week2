<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

/**
 * RequestMatcherInterface is an interface for strategies to match a Request.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface RequestMatcherInterface
{
    /**
     * Decides whether the rule(s) implemented by the strategy matches the supplied request.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @param Request $request The request to check for a match
     *
     * @return bool true if the request matches, false otherwise
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function matches(Request $request);
}
