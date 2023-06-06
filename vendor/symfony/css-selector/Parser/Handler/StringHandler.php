<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Parser\Handler;

use Symfony\Component\CssSelector\Exception\InternalErrorException;
use Symfony\Component\CssSelector\Exception\SyntaxErrorException;
use Symfony\Component\CssSelector\Parser\Reader;
use Symfony\Component\CssSelector\Parser\Token;
<<<<<<< HEAD
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerEscaping;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerPatterns;
use Symfony\Component\CssSelector\Parser\TokenStream;
=======
use Symfony\Component\CssSelector\Parser\TokenStream;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerEscaping;
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerPatterns;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * CSS selector comment handler.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class StringHandler implements HandlerInterface
{
<<<<<<< HEAD
    private $patterns;
    private $escaping;

=======
    /**
     * @var TokenizerPatterns
     */
    private $patterns;

    /**
     * @var TokenizerEscaping
     */
    private $escaping;

    /**
     * @param TokenizerPatterns $patterns
     * @param TokenizerEscaping $escaping
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function __construct(TokenizerPatterns $patterns, TokenizerEscaping $escaping)
    {
        $this->patterns = $patterns;
        $this->escaping = $escaping;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handle(Reader $reader, TokenStream $stream): bool
    {
        $quote = $reader->getSubstring(1);

        if (!\in_array($quote, ["'", '"'])) {
=======
    public function handle(Reader $reader, TokenStream $stream)
    {
        $quote = $reader->getSubstring(1);

        if (!in_array($quote, array("'", '"'))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return false;
        }

        $reader->moveForward(1);
        $match = $reader->findPattern($this->patterns->getQuotedStringPattern($quote));

        if (!$match) {
<<<<<<< HEAD
            throw new InternalErrorException(sprintf('Should have found at least an empty match at %d.', $reader->getPosition()));
        }

        // check unclosed strings
        if (\strlen($match[0]) === $reader->getRemainingLength()) {
=======
            throw new InternalErrorException(sprintf('Should have found at least an empty match at %s.', $reader->getPosition()));
        }

        // check unclosed strings
        if (strlen($match[0]) === $reader->getRemainingLength()) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw SyntaxErrorException::unclosedString($reader->getPosition() - 1);
        }

        // check quotes pairs validity
<<<<<<< HEAD
        if ($quote !== $reader->getSubstring(1, \strlen($match[0]))) {
=======
        if ($quote !== $reader->getSubstring(1, strlen($match[0]))) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw SyntaxErrorException::unclosedString($reader->getPosition() - 1);
        }

        $string = $this->escaping->escapeUnicodeAndNewLine($match[0]);
        $stream->push(new Token(Token::TYPE_STRING, $string, $reader->getPosition()));
<<<<<<< HEAD
        $reader->moveForward(\strlen($match[0]) + 1);
=======
        $reader->moveForward(strlen($match[0]) + 1);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return true;
    }
}
