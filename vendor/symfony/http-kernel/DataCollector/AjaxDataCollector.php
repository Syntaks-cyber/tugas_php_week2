<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
<<<<<<< HEAD
 * @author Bart van den Burg <bart@burgov.nl>
 *
 * @final
 */
class AjaxDataCollector extends DataCollector
{
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
 * AjaxDataCollector.
 *
 * @author Bart van den Burg <bart@burgov.nl>
 */
class AjaxDataCollector extends DataCollector
{
    public function collect(Request $request, Response $response, \Exception $exception = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        // all collecting is done client side
    }

<<<<<<< HEAD
    public function reset()
    {
        // all collecting is done client side
    }

    public function getName(): string
=======
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'ajax';
    }
}
