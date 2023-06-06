<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Exception;

/**
 * Interface for HTTP error exceptions.
 *
 * @author Kris Wallsmith <kris@symfony.com>
 */
<<<<<<< HEAD
interface HttpExceptionInterface extends \Throwable
=======
interface HttpExceptionInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * Returns the status code.
     *
<<<<<<< HEAD
     * @return int
=======
     * @return int An HTTP response status code
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getStatusCode();

    /**
     * Returns response headers.
     *
<<<<<<< HEAD
     * @return array
=======
     * @return array Response headers
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getHeaders();
}
