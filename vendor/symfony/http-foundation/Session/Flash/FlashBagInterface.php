<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Flash;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * FlashBagInterface.
 *
 * @author Drak <drak@zikula.org>
 */
interface FlashBagInterface extends SessionBagInterface
{
    /**
<<<<<<< HEAD
     * Adds a flash message for the given type.
     *
     * @param mixed $message
     */
    public function add(string $type, $message);

    /**
     * Registers one or more messages for a given type.
     *
     * @param string|array $messages
     */
    public function set(string $type, $messages);
=======
     * Adds a flash message for type.
     *
     * @param string $type
     * @param string $message
     */
    public function add($type, $message);

    /**
     * Registers a message for a given type.
     *
     * @param string       $type
     * @param string|array $message
     */
    public function set($type, $message);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets flash messages for a given type.
     *
     * @param string $type    Message category type
     * @param array  $default Default value if $type does not exist
     *
     * @return array
     */
<<<<<<< HEAD
    public function peek(string $type, array $default = []);
=======
    public function peek($type, array $default = array());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets all flash messages.
     *
     * @return array
     */
    public function peekAll();

    /**
     * Gets and clears flash from the stack.
     *
<<<<<<< HEAD
     * @param array $default Default value if $type does not exist
     *
     * @return array
     */
    public function get(string $type, array $default = []);
=======
     * @param string $type
     * @param array  $default Default value if $type does not exist
     *
     * @return array
     */
    public function get($type, array $default = array());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets and clears flashes from the stack.
     *
     * @return array
     */
    public function all();

    /**
     * Sets all flash messages.
     */
    public function setAll(array $messages);

    /**
     * Has flash messages for a given type?
     *
<<<<<<< HEAD
     * @return bool
     */
    public function has(string $type);
=======
     * @param string $type
     *
     * @return bool
     */
    public function has($type);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns a list of all defined types.
     *
     * @return array
     */
    public function keys();
}
