<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Parser\Tokenizer;

/**
 * CSS selector tokenizer escaping applier.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class TokenizerEscaping
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

<<<<<<< HEAD
    public function escapeUnicode(string $value): string
=======
    /**
     * @param string $value
     *
     * @return string
     */
    public function escapeUnicode($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $value = $this->replaceUnicodeSequences($value);

        return preg_replace($this->patterns->getSimpleEscapePattern(), '$1', $value);
    }

<<<<<<< HEAD
    public function escapeUnicodeAndNewLine(string $value): string
=======
    /**
     * @param string $value
     *
     * @return string
     */
    public function escapeUnicodeAndNewLine($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $value = preg_replace($this->patterns->getNewLineEscapePattern(), '', $value);

        return $this->escapeUnicode($value);
    }

<<<<<<< HEAD
    private function replaceUnicodeSequences(string $value): string
=======
    /**
     * @param string $value
     *
     * @return string
     */
    private function replaceUnicodeSequences($value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return preg_replace_callback($this->patterns->getUnicodeEscapePattern(), function ($match) {
            $c = hexdec($match[1]);

            if (0x80 > $c %= 0x200000) {
<<<<<<< HEAD
                return \chr($c);
            }
            if (0x800 > $c) {
                return \chr(0xC0 | $c >> 6).\chr(0x80 | $c & 0x3F);
            }
            if (0x10000 > $c) {
                return \chr(0xE0 | $c >> 12).\chr(0x80 | $c >> 6 & 0x3F).\chr(0x80 | $c & 0x3F);
            }

            return '';
=======
                return chr($c);
            }
            if (0x800 > $c) {
                return chr(0xC0 | $c >> 6).chr(0x80 | $c & 0x3F);
            }
            if (0x10000 > $c) {
                return chr(0xE0 | $c >> 12).chr(0x80 | $c >> 6 & 0x3F).chr(0x80 | $c & 0x3F);
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }, $value);
    }
}
