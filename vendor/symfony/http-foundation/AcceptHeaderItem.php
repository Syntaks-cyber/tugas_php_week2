<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpFoundation;

/**
 * Represents an Accept-* header item.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class AcceptHeaderItem
{
<<<<<<< HEAD
    private $value;
    private $quality = 1.0;
    private $index = 0;
    private $attributes = [];

    public function __construct(string $value, array $attributes = [])
=======
    /**
     * @var string
     */
    private $value;

    /**
     * @var float
     */
    private $quality = 1.0;

    /**
     * @var int
     */
    private $index = 0;

    /**
     * @var array
     */
    private $attributes = array();

    /**
     * Constructor.
     *
     * @param string $value
     * @param array  $attributes
     */
    public function __construct($value, array $attributes = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->value = $value;
        foreach ($attributes as $name => $value) {
            $this->setAttribute($name, $value);
        }
    }

    /**
     * Builds an AcceptHeaderInstance instance from a string.
     *
<<<<<<< HEAD
     * @return self
     */
    public static function fromString(?string $itemValue)
    {
        $parts = HeaderUtils::split($itemValue ?? '', ';=');

        $part = array_shift($parts);
        $attributes = HeaderUtils::combine($parts);

        return new self($part[0], $attributes);
    }

    /**
     * Returns header value's string representation.
=======
     * @param string $itemValue
     *
     * @return AcceptHeaderItem
     */
    public static function fromString($itemValue)
    {
        $bits = preg_split('/\s*(?:;*("[^"]+");*|;*(\'[^\']+\');*|;+)\s*/', $itemValue, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE);
        $value = array_shift($bits);
        $attributes = array();

        $lastNullAttribute = null;
        foreach ($bits as $bit) {
            if (($start = substr($bit, 0, 1)) === ($end = substr($bit, -1)) && ($start === '"' || $start === '\'')) {
                $attributes[$lastNullAttribute] = substr($bit, 1, -1);
            } elseif ('=' === $end) {
                $lastNullAttribute = $bit = substr($bit, 0, -1);
                $attributes[$bit] = null;
            } else {
                $parts = explode('=', $bit);
                $attributes[$parts[0]] = isset($parts[1]) && strlen($parts[1]) > 0 ? $parts[1] : '';
            }
        }

        return new self(($start = substr($value, 0, 1)) === ($end = substr($value, -1)) && ($start === '"' || $start === '\'') ? substr($value, 1, -1) : $value, $attributes);
    }

    /**
     * Returns header  value's string representation.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @return string
     */
    public function __toString()
    {
        $string = $this->value.($this->quality < 1 ? ';q='.$this->quality : '');
<<<<<<< HEAD
        if (\count($this->attributes) > 0) {
            $string .= '; '.HeaderUtils::toString($this->attributes, ';');
=======
        if (count($this->attributes) > 0) {
            $string .= ';'.implode(';', array_map(function ($name, $value) {
                return sprintf(preg_match('/[,;=]/', $value) ? '%s="%s"' : '%s=%s', $name, $value);
            }, array_keys($this->attributes), $this->attributes));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $string;
    }

    /**
     * Set the item value.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setValue(string $value)
=======
     * @param string $value
     *
     * @return AcceptHeaderItem
     */
    public function setValue($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->value = $value;

        return $this;
    }

    /**
     * Returns the item value.
     *
     * @return string
     */
    public function getValue()
    {
        return $this->value;
    }

    /**
     * Set the item quality.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setQuality(float $quality)
=======
     * @param float $quality
     *
     * @return AcceptHeaderItem
     */
    public function setQuality($quality)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->quality = $quality;

        return $this;
    }

    /**
     * Returns the item quality.
     *
     * @return float
     */
    public function getQuality()
    {
        return $this->quality;
    }

    /**
     * Set the item index.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setIndex(int $index)
=======
     * @param int $index
     *
     * @return AcceptHeaderItem
     */
    public function setIndex($index)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->index = $index;

        return $this;
    }

    /**
     * Returns the item index.
     *
     * @return int
     */
    public function getIndex()
    {
        return $this->index;
    }

    /**
     * Tests if an attribute exists.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function hasAttribute(string $name)
=======
     * @param string $name
     *
     * @return bool
     */
    public function hasAttribute($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return isset($this->attributes[$name]);
    }

    /**
     * Returns an attribute by its name.
     *
<<<<<<< HEAD
     * @param mixed $default
     *
     * @return mixed
     */
    public function getAttribute(string $name, $default = null)
    {
        return $this->attributes[$name] ?? $default;
=======
     * @param string $name
     * @param mixed  $default
     *
     * @return mixed
     */
    public function getAttribute($name, $default = null)
    {
        return isset($this->attributes[$name]) ? $this->attributes[$name] : $default;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns all attributes.
     *
     * @return array
     */
    public function getAttributes()
    {
        return $this->attributes;
    }

    /**
     * Set an attribute.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function setAttribute(string $name, string $value)
=======
     * @param string $name
     * @param string $value
     *
     * @return AcceptHeaderItem
     */
    public function setAttribute($name, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ('q' === $name) {
            $this->quality = (float) $value;
        } else {
<<<<<<< HEAD
            $this->attributes[$name] = $value;
=======
            $this->attributes[$name] = (string) $value;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $this;
    }
}
