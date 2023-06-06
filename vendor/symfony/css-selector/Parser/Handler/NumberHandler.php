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

use Symfony\Component\CssSelector\Parser\Reader;
use Symfony\Component\CssSelector\Parser\Token;
<<<<<<< HEAD
use Symfony\Component\CssSelector\Parser\Tokenizer\TokenizerPatterns;
use Symfony\Component\CssSelector\Parser\TokenStream;
=======
use Symfony\Component\CssSelector\Parser\TokenStream;
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
class NumberHandler implements HandlerInterface
{
<<<<<<< HEAD
    private $patterns;

=======
    /**
     * @var TokenizerPatterns
     */
    private $patterns;

    /**
     * @param TokenizerPatterns $patterns
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function __construct(TokenizerPatterns $patterns)
    {
        $this->patterns = $patterns;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function handle(Reader $reader, TokenStream $stream): bool
=======
    public function handle(Reader $reader, TokenStream $stream)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $match = $reader->findPattern($this->patterns->getNumberPattern());

        if (!$match) {
            return false;
        }

        $stream->push(new Token(Token::TYPE_NUMBER, $match[0], $reader->getPosition()));
<<<<<<< HEAD
        $reader->moveForward(\strlen($match[0]));
=======
        $reader->moveForward(strlen($match[0]));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return true;
    }
}
