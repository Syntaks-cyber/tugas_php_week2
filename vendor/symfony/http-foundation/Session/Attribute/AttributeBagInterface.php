<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation\Session\Attribute;

use Symfony\Component\HttpFoundation\Session\SessionBagInterface;

/**
 * Attributes store.
 *
 * @author Drak <drak@zikula.org>
 */
interface AttributeBagInterface extends SessionBagInterface
{
    /**
     * Checks if an attribute is defined.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function has(string $name);
=======
     * @param string $name The attribute name
     *
     * @return bool true if the attribute is defined, false otherwise
     */
    public function has($name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns an attribute.
     *
<<<<<<< HEAD
     * @param mixed $default The default value if not found
     *
     * @return mixed
     */
    public function get(string $name, $default = null);
=======
     * @param string $name    The attribute name
     * @param mixed  $default The default value if not found
     *
     * @return mixed
     */
    public function get($name, $default = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Sets an attribute.
     *
<<<<<<< HEAD
     * @param mixed $value
     */
    public function set(string $name, $value);
=======
     * @param string $name
     * @param mixed  $value
     */
    public function set($name, $value);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns attributes.
     *
<<<<<<< HEAD
     * @return array<string, mixed>
     */
    public function all();

=======
     * @return array Attributes
     */
    public function all();

    /**
     * Sets attributes.
     *
     * @param array $attributes Attributes
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function replace(array $attributes);

    /**
     * Removes an attribute.
     *
<<<<<<< HEAD
     * @return mixed The removed value or null when it does not exist
     */
    public function remove(string $name);
=======
     * @param string $name
     *
     * @return mixed The removed value or null when it does not exist
     */
    public function remove($name);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
