<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\Log;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * DebugLoggerInterface.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface DebugLoggerInterface
{
    /**
     * Returns an array of logs.
     *
     * A log is an array with the following mandatory keys:
     * timestamp, message, priority, and priorityName.
     * It can also have an optional context key containing an array.
     *
<<<<<<< HEAD
     * @return array
     */
    public function getLogs(Request $request = null);
=======
     * @return array An array of logs
     */
    public function getLogs();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns the number of errors.
     *
<<<<<<< HEAD
     * @return int
     */
    public function countErrors(Request $request = null);

    /**
     * Removes all log records.
     */
    public function clear();
=======
     * @return int The number of errors
     */
    public function countErrors();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
