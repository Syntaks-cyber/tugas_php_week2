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

/**
 * FlashBag flash message container.
 *
 * @author Drak <drak@zikula.org>
 */
class FlashBag implements FlashBagInterface
{
    private $name = 'flashes';
<<<<<<< HEAD
    private $flashes = [];
    private $storageKey;

    /**
     * @param string $storageKey The key used to store flashes in the session
     */
    public function __construct(string $storageKey = '_symfony_flashes')
=======

    /**
     * Flash messages.
     *
     * @var array
     */
    private $flashes = array();

    /**
     * The storage key for flashes in the session.
     *
     * @var string
     */
    private $storageKey;

    /**
     * Constructor.
     *
     * @param string $storageKey The key used to store flashes in the session
     */
    public function __construct($storageKey = '_sf2_flashes')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->storageKey = $storageKey;
    }

    /**
     * {@inheritdoc}
     */
    public function getName()
    {
        return $this->name;
    }

<<<<<<< HEAD
    public function setName(string $name)
=======
    public function setName($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->name = $name;
    }

    /**
     * {@inheritdoc}
     */
    public function initialize(array &$flashes)
    {
        $this->flashes = &$flashes;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function add(string $type, $message)
=======
    public function add($type, $message)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->flashes[$type][] = $message;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function peek(string $type, array $default = [])
=======
    public function peek($type, array $default = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->has($type) ? $this->flashes[$type] : $default;
    }

    /**
     * {@inheritdoc}
     */
    public function peekAll()
    {
        return $this->flashes;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function get(string $type, array $default = [])
=======
    public function get($type, array $default = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->has($type)) {
            return $default;
        }

        $return = $this->flashes[$type];

        unset($this->flashes[$type]);

        return $return;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        $return = $this->peekAll();
<<<<<<< HEAD
        $this->flashes = [];
=======
        $this->flashes = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $return;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function set(string $type, $messages)
=======
    public function set($type, $messages)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->flashes[$type] = (array) $messages;
    }

    /**
     * {@inheritdoc}
     */
    public function setAll(array $messages)
    {
        $this->flashes = $messages;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function has(string $type)
    {
        return \array_key_exists($type, $this->flashes) && $this->flashes[$type];
=======
    public function has($type)
    {
        return array_key_exists($type, $this->flashes) && $this->flashes[$type];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
    public function keys()
    {
        return array_keys($this->flashes);
    }

    /**
     * {@inheritdoc}
     */
    public function getStorageKey()
    {
        return $this->storageKey;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        return $this->all();
    }
}
