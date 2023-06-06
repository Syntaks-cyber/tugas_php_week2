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
 * CSS selector token.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class Token
{
<<<<<<< HEAD
    public const TYPE_FILE_END = 'eof';
    public const TYPE_DELIMITER = 'delimiter';
    public const TYPE_WHITESPACE = 'whitespace';
    public const TYPE_IDENTIFIER = 'identifier';
    public const TYPE_HASH = 'hash';
    public const TYPE_NUMBER = 'number';
    public const TYPE_STRING = 'string';

    private $type;
    private $value;
    private $position;

    public function __construct(?string $type, ?string $value, ?int $position)
=======
    const TYPE_FILE_END = 'eof';
    const TYPE_DELIMITER = 'delimiter';
    const TYPE_WHITESPACE = 'whitespace';
    const TYPE_IDENTIFIER = 'identifier';
    const TYPE_HASH = 'hash';
    const TYPE_NUMBER = 'number';
    const TYPE_STRING = 'string';

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $value;

    /**
     * @var int
     */
    private $position;

    /**
     * @param int    $type
     * @param string $value
     * @param int    $position
     */
    public function __construct($type, $value, $position)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->type = $type;
        $this->value = $value;
        $this->position = $position;
    }

<<<<<<< HEAD
    public function getType(): ?int
=======
    /**
     * @return int
     */
    public function getType()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->type;
    }

<<<<<<< HEAD
    public function getValue(): ?string
=======
    /**
     * @return string
     */
    public function getValue()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->value;
    }

<<<<<<< HEAD
    public function getPosition(): ?int
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
    public function isFileEnd(): bool
=======
    /**
     * @return bool
     */
    public function isFileEnd()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::TYPE_FILE_END === $this->type;
    }

<<<<<<< HEAD
    public function isDelimiter(array $values = []): bool
=======
    /**
     * @param array $values
     *
     * @return bool
     */
    public function isDelimiter(array $values = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (self::TYPE_DELIMITER !== $this->type) {
            return false;
        }

        if (empty($values)) {
            return true;
        }

<<<<<<< HEAD
        return \in_array($this->value, $values);
    }

    public function isWhitespace(): bool
=======
        return in_array($this->value, $values);
    }

    /**
     * @return bool
     */
    public function isWhitespace()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::TYPE_WHITESPACE === $this->type;
    }

<<<<<<< HEAD
    public function isIdentifier(): bool
=======
    /**
     * @return bool
     */
    public function isIdentifier()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::TYPE_IDENTIFIER === $this->type;
    }

<<<<<<< HEAD
    public function isHash(): bool
=======
    /**
     * @return bool
     */
    public function isHash()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::TYPE_HASH === $this->type;
    }

<<<<<<< HEAD
    public function isNumber(): bool
=======
    /**
     * @return bool
     */
    public function isNumber()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::TYPE_NUMBER === $this->type;
    }

<<<<<<< HEAD
    public function isString(): bool
=======
    /**
     * @return bool
     */
    public function isString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return self::TYPE_STRING === $this->type;
    }

<<<<<<< HEAD
    public function __toString(): string
=======
    /**
     * @return string
     */
    public function __toString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this->value) {
            return sprintf('<%s "%s" at %s>', $this->type, $this->value, $this->position);
        }

        return sprintf('<%s at %s>', $this->type, $this->position);
    }
}
