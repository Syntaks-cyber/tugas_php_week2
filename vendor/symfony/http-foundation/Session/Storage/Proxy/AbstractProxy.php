<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Storage\Proxy;

/**
<<<<<<< HEAD
=======
 * AbstractProxy.
 *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * @author Drak <drak@zikula.org>
 */
abstract class AbstractProxy
{
    /**
     * Flag if handler wraps an internal PHP session handler (using \SessionHandler).
     *
     * @var bool
     */
    protected $wrapper = false;

    /**
     * @var string
     */
    protected $saveHandlerName;

    /**
     * Gets the session.save_handler name.
     *
<<<<<<< HEAD
     * @return string|null
=======
     * @return string
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getSaveHandlerName()
    {
        return $this->saveHandlerName;
    }

    /**
     * Is this proxy handler and instance of \SessionHandlerInterface.
     *
     * @return bool
     */
    public function isSessionHandlerInterface()
    {
        return $this instanceof \SessionHandlerInterface;
    }

    /**
     * Returns true if this handler wraps an internal PHP session save handler using \SessionHandler.
     *
     * @return bool
     */
    public function isWrapper()
    {
        return $this->wrapper;
    }

    /**
     * Has a session started?
     *
     * @return bool
     */
    public function isActive()
    {
        return \PHP_SESSION_ACTIVE === session_status();
    }

    /**
     * Gets the session ID.
     *
     * @return string
     */
    public function getId()
    {
        return session_id();
    }

    /**
     * Sets the session ID.
     *
<<<<<<< HEAD
     * @throws \LogicException
     */
    public function setId(string $id)
    {
        if ($this->isActive()) {
            throw new \LogicException('Cannot change the ID of an active session.');
=======
     * @param string $id
     *
     * @throws \LogicException
     */
    public function setId($id)
    {
        if ($this->isActive()) {
            throw new \LogicException('Cannot change the ID of an active session');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        session_id($id);
    }

    /**
     * Gets the session name.
     *
     * @return string
     */
    public function getName()
    {
        return session_name();
    }

    /**
     * Sets the session name.
     *
<<<<<<< HEAD
     * @throws \LogicException
     */
    public function setName(string $name)
    {
        if ($this->isActive()) {
            throw new \LogicException('Cannot change the name of an active session.');
=======
     * @param string $name
     *
     * @throws \LogicException
     */
    public function setName($name)
    {
        if ($this->isActive()) {
            throw new \LogicException('Cannot change the name of an active session');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        session_name($name);
    }
}
