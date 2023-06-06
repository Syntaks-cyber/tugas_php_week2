<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector;

use Symfony\Component\CssSelector\Parser\Shortcut\ClassParser;
use Symfony\Component\CssSelector\Parser\Shortcut\ElementParser;
use Symfony\Component\CssSelector\Parser\Shortcut\EmptyStringParser;
use Symfony\Component\CssSelector\Parser\Shortcut\HashParser;
use Symfony\Component\CssSelector\XPath\Extension\HtmlExtension;
use Symfony\Component\CssSelector\XPath\Translator;

/**
 * CssSelectorConverter is the main entry point of the component and can convert CSS
 * selectors to XPath expressions.
 *
 * @author Christophe Coevoet <stof@notk.org>
 */
class CssSelectorConverter
{
    private $translator;
<<<<<<< HEAD
    private $cache;

    private static $xmlCache = [];
    private static $htmlCache = [];
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @param bool $html Whether HTML support should be enabled. Disable it for XML documents
     */
<<<<<<< HEAD
    public function __construct(bool $html = true)
=======
    public function __construct($html = true)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->translator = new Translator();

        if ($html) {
            $this->translator->registerExtension(new HtmlExtension($this->translator));
<<<<<<< HEAD
            $this->cache = &self::$htmlCache;
        } else {
            $this->cache = &self::$xmlCache;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->translator
            ->registerParserShortcut(new EmptyStringParser())
            ->registerParserShortcut(new ElementParser())
            ->registerParserShortcut(new ClassParser())
            ->registerParserShortcut(new HashParser())
        ;
    }

    /**
     * Translates a CSS expression to its XPath equivalent.
     *
     * Optionally, a prefix can be added to the resulting XPath
     * expression with the $prefix parameter.
     *
<<<<<<< HEAD
     * @return string
     */
    public function toXPath(string $cssExpr, string $prefix = 'descendant-or-self::')
    {
        return $this->cache[$prefix][$cssExpr] ?? $this->cache[$prefix][$cssExpr] = $this->translator->cssToXPath($cssExpr, $prefix);
=======
     * @param string $cssExpr The CSS expression
     * @param string $prefix  An optional prefix for the XPath expression
     *
     * @return string
     */
    public function toXPath($cssExpr, $prefix = 'descendant-or-self::')
    {
        return $this->translator->cssToXPath($cssExpr, $prefix);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
