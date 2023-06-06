<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Routing\Matcher;

/**
 * RedirectableUrlMatcherInterface knows how to redirect the user.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface RedirectableUrlMatcherInterface
{
    /**
<<<<<<< HEAD
     * Redirects the user to another URL and returns the parameters for the redirection.
=======
     * Redirects the user to another URL.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @param string      $path   The path info to redirect to
     * @param string      $route  The route name that matched
     * @param string|null $scheme The URL scheme (null to keep the current one)
     *
<<<<<<< HEAD
     * @return array
     */
    public function redirect(string $path, string $route, string $scheme = null);
=======
     * @return array An array of parameters
     */
    public function redirect($path, $route, $scheme = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
