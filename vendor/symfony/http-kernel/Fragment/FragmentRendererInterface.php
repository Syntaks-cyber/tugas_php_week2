<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Fragment;

use Symfony\Component\HttpFoundation\Request;
<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Controller\ControllerReference;
=======
use Symfony\Component\HttpKernel\Controller\ControllerReference;
use Symfony\Component\HttpFoundation\Response;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Interface implemented by all rendering strategies.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface FragmentRendererInterface
{
    /**
     * Renders a URI and returns the Response content.
     *
<<<<<<< HEAD
     * @param string|ControllerReference $uri A URI as a string or a ControllerReference instance
     *
     * @return Response
     */
    public function render($uri, Request $request, array $options = []);
=======
     * @param string|ControllerReference $uri     A URI as a string or a ControllerReference instance
     * @param Request                    $request A Request instance
     * @param array                      $options An array of options
     *
     * @return Response A Response instance
     */
    public function render($uri, Request $request, array $options = array());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets the name of the strategy.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The strategy name
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getName();
}
