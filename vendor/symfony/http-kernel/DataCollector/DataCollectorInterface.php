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
<<<<<<< HEAD
use Symfony\Contracts\Service\ResetInterface;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * DataCollectorInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
<<<<<<< HEAD
interface DataCollectorInterface extends ResetInterface
{
    /**
     * Collects data for the given Request and Response.
     */
    public function collect(Request $request, Response $response, \Throwable $exception = null);
=======
interface DataCollectorInterface
{
    /**
     * Collects data for the given Request and Response.
     *
     * @param Request    $request   A Request instance
     * @param Response   $response  A Response instance
     * @param \Exception $exception An Exception instance
     */
    public function collect(Request $request, Response $response, \Exception $exception = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns the name of the collector.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The collector name
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getName();
}
