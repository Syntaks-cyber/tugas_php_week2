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

/**
 * This class relates to session attribute storage.
<<<<<<< HEAD
 *
 * @implements \IteratorAggregate<string, mixed>
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class AttributeBag implements AttributeBagInterface, \IteratorAggregate, \Countable
{
    private $name = 'attributes';
<<<<<<< HEAD
    private $storageKey;

    protected $attributes = [];

    /**
     * @param string $storageKey The key used to store attributes in the session
     */
    public function __construct(string $storageKey = '_sf2_attributes')
=======

    /**
     * @var string
     */
    private $storageKey;

    /**
     * @var array
     */
    protected $attributes = array();

    /**
     * Constructor.
     *
     * @param string $storageKey The key used to store attributes in the session
     */
    public function __construct($storageKey = '_sf2_attributes')
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
    public function initialize(array &$attributes)
    {
        $this->attributes = &$attributes;
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
<<<<<<< HEAD
    public function has(string $name)
    {
        return \array_key_exists($name, $this->attributes);
=======
    public function has($name)
    {
        return array_key_exists($name, $this->attributes);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function get(string $name, $default = null)
    {
        return \array_key_exists($name, $this->attributes) ? $this->attributes[$name] : $default;
=======
    public function get($name, $default = null)
    {
        return array_key_exists($name, $this->attributes) ? $this->attributes[$name] : $default;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function set(string $name, $value)
=======
    public function set($name, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->attributes[$name] = $value;
    }

    /**
     * {@inheritdoc}
     */
    public function all()
    {
        return $this->attributes;
    }

    /**
     * {@inheritdoc}
     */
    public function replace(array $attributes)
    {
<<<<<<< HEAD
        $this->attributes = [];
=======
        $this->attributes = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        foreach ($attributes as $key => $value) {
            $this->set($key, $value);
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function remove(string $name)
    {
        $retval = null;
        if (\array_key_exists($name, $this->attributes)) {
=======
    public function remove($name)
    {
        $retval = null;
        if (array_key_exists($name, $this->attributes)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $retval = $this->attributes[$name];
            unset($this->attributes[$name]);
        }

        return $retval;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $return = $this->attributes;
<<<<<<< HEAD
        $this->attributes = [];
=======
        $this->attributes = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $return;
    }

    /**
     * Returns an iterator for attributes.
     *
<<<<<<< HEAD
     * @return \ArrayIterator<string, mixed>
     */
    #[\ReturnTypeWillChange]
=======
     * @return \ArrayIterator An \ArrayIterator instance
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getIterator()
    {
        return new \ArrayIterator($this->attributes);
    }

    /**
     * Returns the number of attributes.
     *
<<<<<<< HEAD
     * @return int
     */
    #[\ReturnTypeWillChange]
    public function count()
    {
        return \count($this->attributes);
=======
     * @return int The number of attributes
     */
    public function count()
    {
        return count($this->attributes);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
