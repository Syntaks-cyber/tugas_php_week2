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

<<<<<<< HEAD
// Help opcache.preload discover always-needed symbols
class_exists(AcceptHeaderItem::class);

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * Represents an Accept-* header.
 *
 * An accept header is compound with a list of items,
 * sorted by descending quality.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class AcceptHeader
{
    /**
     * @var AcceptHeaderItem[]
     */
<<<<<<< HEAD
    private $items = [];
=======
    private $items = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
    private $sorted = true;

    /**
<<<<<<< HEAD
=======
     * Constructor.
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param AcceptHeaderItem[] $items
     */
    public function __construct(array $items)
    {
        foreach ($items as $item) {
            $this->add($item);
        }
    }

    /**
     * Builds an AcceptHeader instance from a string.
     *
<<<<<<< HEAD
     * @return self
     */
    public static function fromString(?string $headerValue)
    {
        $index = 0;

        $parts = HeaderUtils::split($headerValue ?? '', ',;=');

        return new self(array_map(function ($subParts) use (&$index) {
            $part = array_shift($subParts);
            $attributes = HeaderUtils::combine($subParts);

            $item = new AcceptHeaderItem($part[0], $attributes);
            $item->setIndex($index++);

            return $item;
        }, $parts));
=======
     * @param string $headerValue
     *
     * @return AcceptHeader
     */
    public static function fromString($headerValue)
    {
        $index = 0;

        return new self(array_map(function ($itemValue) use (&$index) {
            $item = AcceptHeaderItem::fromString($itemValue);
            $item->setIndex($index++);

            return $item;
        }, preg_split('/\s*(?:,*("[^"]+"),*|,*(\'[^\']+\'),*|,+)\s*/', $headerValue, 0, PREG_SPLIT_NO_EMPTY | PREG_SPLIT_DELIM_CAPTURE)));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns header value's string representation.
     *
     * @return string
     */
    public function __toString()
    {
        return implode(',', $this->items);
    }

    /**
     * Tests if header has given value.
     *
<<<<<<< HEAD
     * @return bool
     */
    public function has(string $value)
=======
     * @param string $value
     *
     * @return bool
     */
    public function has($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return isset($this->items[$value]);
    }

    /**
     * Returns given value's item, if exists.
     *
<<<<<<< HEAD
     * @return AcceptHeaderItem|null
     */
    public function get(string $value)
    {
        return $this->items[$value] ?? $this->items[explode('/', $value)[0].'/*'] ?? $this->items['*/*'] ?? $this->items['*'] ?? null;
=======
     * @param string $value
     *
     * @return AcceptHeaderItem|null
     */
    public function get($value)
    {
        return isset($this->items[$value]) ? $this->items[$value] : null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Adds an item.
     *
<<<<<<< HEAD
     * @return $this
=======
     * @param AcceptHeaderItem $item
     *
     * @return AcceptHeader
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function add(AcceptHeaderItem $item)
    {
        $this->items[$item->getValue()] = $item;
        $this->sorted = false;

        return $this;
    }

    /**
     * Returns all items.
     *
     * @return AcceptHeaderItem[]
     */
    public function all()
    {
        $this->sort();

        return $this->items;
    }

    /**
     * Filters items on their value using given regex.
     *
<<<<<<< HEAD
     * @return self
     */
    public function filter(string $pattern)
=======
     * @param string $pattern
     *
     * @return AcceptHeader
     */
    public function filter($pattern)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return new self(array_filter($this->items, function (AcceptHeaderItem $item) use ($pattern) {
            return preg_match($pattern, $item->getValue());
        }));
    }

    /**
     * Returns first item.
     *
     * @return AcceptHeaderItem|null
     */
    public function first()
    {
        $this->sort();

        return !empty($this->items) ? reset($this->items) : null;
    }

    /**
     * Sorts items by descending quality.
     */
<<<<<<< HEAD
    private function sort(): void
    {
        if (!$this->sorted) {
            uasort($this->items, function (AcceptHeaderItem $a, AcceptHeaderItem $b) {
=======
    private function sort()
    {
        if (!$this->sorted) {
            uasort($this->items, function ($a, $b) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $qA = $a->getQuality();
                $qB = $b->getQuality();

                if ($qA === $qB) {
                    return $a->getIndex() > $b->getIndex() ? 1 : -1;
                }

                return $qA > $qB ? -1 : 1;
            });

            $this->sorted = true;
        }
    }
}
