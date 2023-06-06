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

use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\CssSelector\Exception\SyntaxErrorException;

/**
 * CSS selector token stream.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class TokenStream
{
    /**
     * @var Token[]
     */
<<<<<<< HEAD
    private $tokens = [];
=======
    private $tokens = array();

    /**
     * @var bool
     */
    private $frozen = false;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var Token[]
     */
<<<<<<< HEAD
    private $used = [];
=======
    private $used = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
    private $cursor = 0;

    /**
     * @var Token|null
     */
<<<<<<< HEAD
    private $peeked;
=======
    private $peeked = null;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var bool
     */
    private $peeking = false;

    /**
     * Pushes a token.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function push(Token $token): self
=======
     * @param Token $token
     *
     * @return TokenStream
     */
    public function push(Token $token)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->tokens[] = $token;

        return $this;
    }

    /**
     * Freezes stream.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function freeze(): self
    {
=======
     * @return TokenStream
     */
    public function freeze()
    {
        $this->frozen = true;

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return $this;
    }

    /**
     * Returns next token.
     *
<<<<<<< HEAD
     * @throws InternalErrorException If there is no more token
     */
    public function getNext(): Token
=======
     * @return Token
     *
     * @throws InternalErrorException If there is no more token
     */
    public function getNext()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($this->peeking) {
            $this->peeking = false;
            $this->used[] = $this->peeked;

            return $this->peeked;
        }

        if (!isset($this->tokens[$this->cursor])) {
            throw new InternalErrorException('Unexpected token stream end.');
        }

        return $this->tokens[$this->cursor++];
    }

    /**
     * Returns peeked token.
<<<<<<< HEAD
     */
    public function getPeek(): Token
=======
     *
     * @return Token
     */
    public function getPeek()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->peeking) {
            $this->peeked = $this->getNext();
            $this->peeking = true;
        }

        return $this->peeked;
    }

    /**
     * Returns used tokens.
     *
     * @return Token[]
     */
<<<<<<< HEAD
    public function getUsed(): array
=======
    public function getUsed()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->used;
    }

    /**
<<<<<<< HEAD
     * Returns next identifier token.
     *
     * @throws SyntaxErrorException If next token is not an identifier
     */
    public function getNextIdentifier(): string
=======
     * Returns nex identifier token.
     *
     * @return string The identifier token value
     *
     * @throws SyntaxErrorException If next token is not an identifier
     */
    public function getNextIdentifier()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $next = $this->getNext();

        if (!$next->isIdentifier()) {
            throw SyntaxErrorException::unexpectedToken('identifier', $next);
        }

        return $next->getValue();
    }

    /**
<<<<<<< HEAD
     * Returns next identifier or null if star delimiter token is found.
     *
     * @throws SyntaxErrorException If next token is not an identifier or a star delimiter
     */
    public function getNextIdentifierOrStar(): ?string
=======
     * Returns nex identifier or star delimiter token.
     *
     * @return null|string The identifier token value or null if star found
     *
     * @throws SyntaxErrorException If next token is not an identifier or a star delimiter
     */
    public function getNextIdentifierOrStar()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $next = $this->getNext();

        if ($next->isIdentifier()) {
            return $next->getValue();
        }

<<<<<<< HEAD
        if ($next->isDelimiter(['*'])) {
            return null;
=======
        if ($next->isDelimiter(array('*'))) {
            return;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        throw SyntaxErrorException::unexpectedToken('identifier or "*"', $next);
    }

    /**
     * Skips next whitespace if any.
     */
    public function skipWhitespace()
    {
        $peek = $this->getPeek();

        if ($peek->isWhitespace()) {
            $this->getNext();
        }
    }
}
