<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Handler;

/**
<<<<<<< HEAD
=======
 * NullSessionHandler.
 *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * Can be used in unit testing or in a situations where persisted sessions are not desired.
 *
 * @author Drak <drak@zikula.org>
 */
<<<<<<< HEAD
class NullSessionHandler extends AbstractSessionHandler
{
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
=======
class NullSessionHandler implements \SessionHandlerInterface
{
    /**
     * {@inheritdoc}
     */
    public function open($savePath, $sessionName)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function close()
    {
        return true;
    }

    /**
<<<<<<< HEAD
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function validateId($sessionId)
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
    protected function doRead(string $sessionId)
=======
     * {@inheritdoc}
     */
    public function read($sessionId)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return '';
    }

    /**
<<<<<<< HEAD
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function updateTimestamp($sessionId, $data)
=======
     * {@inheritdoc}
     */
    public function write($sessionId, $data)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doWrite(string $sessionId, string $data)
=======
    public function destroy($sessionId)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return true;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function doDestroy(string $sessionId)
    {
        return true;
    }

    /**
     * @return int|false
     */
    #[\ReturnTypeWillChange]
    public function gc($maxlifetime)
    {
        return 0;
=======
    public function gc($maxlifetime)
    {
        return true;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
