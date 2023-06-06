<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Parser;

/**
 * CSS selector reader.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class Reader
{
<<<<<<< HEAD
    private $source;
    private $length;
    private $position = 0;

    public function __construct(string $source)
    {
        $this->source = $source;
        $this->length = \strlen($source);
    }

    public function isEOF(): bool
=======
    /**
     * @var string
     */
    private $source;

    /**
     * @var int
     */
    private $length;

    /**
     * @var int
     */
    private $position = 0;

    /**
     * @param string $source
     */
    public function __construct($source)
    {
        $this->source = $source;
        $this->length = strlen($source);
    }

    /**
     * @return bool
     */
    public function isEOF()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->position >= $this->length;
    }

<<<<<<< HEAD
    public function getPosition(): int
=======
    /**
     * @return int
     */
    public function getPosition()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->position;
    }

<<<<<<< HEAD
    public function getRemainingLength(): int
=======
    /**
     * @return int
     */
    public function getRemainingLength()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->length - $this->position;
    }

<<<<<<< HEAD
    public function getSubstring(int $length, int $offset = 0): string
=======
    /**
     * @param int $length
     * @param int $offset
     *
     * @return string
     */
    public function getSubstring($length, $offset = 0)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return substr($this->source, $this->position + $offset, $length);
    }

<<<<<<< HEAD
    public function getOffset(string $string)
=======
    /**
     * @param string $string
     *
     * @return int
     */
    public function getOffset($string)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $position = strpos($this->source, $string, $this->position);

        return false === $position ? false : $position - $this->position;
    }

    /**
<<<<<<< HEAD
     * @return array|false
     */
    public function findPattern(string $pattern)
=======
     * @param string $pattern
     *
     * @return bool
     */
    public function findPattern($pattern)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $source = substr($this->source, $this->position);

        if (preg_match($pattern, $source, $matches)) {
            return $matches;
        }

        return false;
    }

<<<<<<< HEAD
    public function moveForward(int $length)
=======
    /**
     * @param int $length
     */
    public function moveForward($length)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->position += $length;
    }

<<<<<<< HEAD
=======
    /**
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function moveToEnd()
    {
        $this->position = $this->length;
    }
}
