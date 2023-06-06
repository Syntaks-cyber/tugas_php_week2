<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\XPath;

use Symfony\Component\CssSelector\Exception\ExpressionErrorException;
use Symfony\Component\CssSelector\Node\FunctionNode;
use Symfony\Component\CssSelector\Node\NodeInterface;
use Symfony\Component\CssSelector\Node\SelectorNode;
use Symfony\Component\CssSelector\Parser\Parser;
use Symfony\Component\CssSelector\Parser\ParserInterface;

/**
 * XPath expression translator interface.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class Translator implements TranslatorInterface
{
<<<<<<< HEAD
=======
    /**
     * @var ParserInterface
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private $mainParser;

    /**
     * @var ParserInterface[]
     */
<<<<<<< HEAD
    private $shortcutParsers = [];

    /**
     * @var Extension\ExtensionInterface[]
     */
    private $extensions = [];

    private $nodeTranslators = [];
    private $combinationTranslators = [];
    private $functionTranslators = [];
    private $pseudoClassTranslators = [];
    private $attributeMatchingTranslators = [];

    public function __construct(ParserInterface $parser = null)
    {
        $this->mainParser = $parser ?? new Parser();
=======
    private $shortcutParsers = array();

    /**
     * @var Extension\ExtensionInterface
     */
    private $extensions = array();

    /**
     * @var array
     */
    private $nodeTranslators = array();

    /**
     * @var array
     */
    private $combinationTranslators = array();

    /**
     * @var array
     */
    private $functionTranslators = array();

    /**
     * @var array
     */
    private $pseudoClassTranslators = array();

    /**
     * @var array
     */
    private $attributeMatchingTranslators = array();

    /**
     * Constructor.
     */
    public function __construct(ParserInterface $parser = null)
    {
        $this->mainParser = $parser ?: new Parser();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this
            ->registerExtension(new Extension\NodeExtension())
            ->registerExtension(new Extension\CombinationExtension())
            ->registerExtension(new Extension\FunctionExtension())
            ->registerExtension(new Extension\PseudoClassExtension())
            ->registerExtension(new Extension\AttributeMatchingExtension())
        ;
    }

<<<<<<< HEAD
    public static function getXpathLiteral(string $element): string
    {
        if (!str_contains($element, "'")) {
            return "'".$element."'";
        }

        if (!str_contains($element, '"')) {
=======
    /**
     * @param string $element
     *
     * @return string
     */
    public static function getXpathLiteral($element)
    {
        if (false === strpos($element, "'")) {
            return "'".$element."'";
        }

        if (false === strpos($element, '"')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            return '"'.$element.'"';
        }

        $string = $element;
<<<<<<< HEAD
        $parts = [];
=======
        $parts = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        while (true) {
            if (false !== $pos = strpos($string, "'")) {
                $parts[] = sprintf("'%s'", substr($string, 0, $pos));
                $parts[] = "\"'\"";
                $string = substr($string, $pos + 1);
            } else {
                $parts[] = "'$string'";
                break;
            }
        }

<<<<<<< HEAD
        return sprintf('concat(%s)', implode(', ', $parts));
=======
        return sprintf('concat(%s)', implode($parts, ', '));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function cssToXPath(string $cssExpr, string $prefix = 'descendant-or-self::'): string
=======
    public function cssToXPath($cssExpr, $prefix = 'descendant-or-self::')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $selectors = $this->parseSelectors($cssExpr);

        /** @var SelectorNode $selector */
        foreach ($selectors as $index => $selector) {
            if (null !== $selector->getPseudoElement()) {
                throw new ExpressionErrorException('Pseudo-elements are not supported.');
            }

            $selectors[$index] = $this->selectorToXPath($selector, $prefix);
        }

        return implode(' | ', $selectors);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function selectorToXPath(SelectorNode $selector, string $prefix = 'descendant-or-self::'): string
=======
    public function selectorToXPath(SelectorNode $selector, $prefix = 'descendant-or-self::')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return ($prefix ?: '').$this->nodeToXPath($selector);
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function registerExtension(Extension\ExtensionInterface $extension): self
=======
     * Registers an extension.
     *
     * @param Extension\ExtensionInterface $extension
     *
     * @return Translator
     */
    public function registerExtension(Extension\ExtensionInterface $extension)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->extensions[$extension->getName()] = $extension;

        $this->nodeTranslators = array_merge($this->nodeTranslators, $extension->getNodeTranslators());
        $this->combinationTranslators = array_merge($this->combinationTranslators, $extension->getCombinationTranslators());
        $this->functionTranslators = array_merge($this->functionTranslators, $extension->getFunctionTranslators());
        $this->pseudoClassTranslators = array_merge($this->pseudoClassTranslators, $extension->getPseudoClassTranslators());
        $this->attributeMatchingTranslators = array_merge($this->attributeMatchingTranslators, $extension->getAttributeMatchingTranslators());

        return $this;
    }

    /**
<<<<<<< HEAD
     * @throws ExpressionErrorException
     */
    public function getExtension(string $name): Extension\ExtensionInterface
=======
     * @param string $name
     *
     * @return Extension\ExtensionInterface
     *
     * @throws ExpressionErrorException
     */
    public function getExtension($name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->extensions[$name])) {
            throw new ExpressionErrorException(sprintf('Extension "%s" not registered.', $name));
        }

        return $this->extensions[$name];
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function registerParserShortcut(ParserInterface $shortcut): self
=======
     * Registers a shortcut parser.
     *
     * @param ParserInterface $shortcut
     *
     * @return Translator
     */
    public function registerParserShortcut(ParserInterface $shortcut)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->shortcutParsers[] = $shortcut;

        return $this;
    }

    /**
<<<<<<< HEAD
     * @throws ExpressionErrorException
     */
    public function nodeToXPath(NodeInterface $node): XPathExpr
=======
     * @param NodeInterface $node
     *
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function nodeToXPath(NodeInterface $node)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->nodeTranslators[$node->getNodeName()])) {
            throw new ExpressionErrorException(sprintf('Node "%s" not supported.', $node->getNodeName()));
        }

<<<<<<< HEAD
        return $this->nodeTranslators[$node->getNodeName()]($node, $this);
    }

    /**
     * @throws ExpressionErrorException
     */
    public function addCombination(string $combiner, NodeInterface $xpath, NodeInterface $combinedXpath): XPathExpr
=======
        return call_user_func($this->nodeTranslators[$node->getNodeName()], $node, $this);
    }

    /**
     * @param string        $combiner
     * @param NodeInterface $xpath
     * @param NodeInterface $combinedXpath
     *
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function addCombination($combiner, NodeInterface $xpath, NodeInterface $combinedXpath)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->combinationTranslators[$combiner])) {
            throw new ExpressionErrorException(sprintf('Combiner "%s" not supported.', $combiner));
        }

<<<<<<< HEAD
        return $this->combinationTranslators[$combiner]($this->nodeToXPath($xpath), $this->nodeToXPath($combinedXpath));
    }

    /**
     * @throws ExpressionErrorException
     */
    public function addFunction(XPathExpr $xpath, FunctionNode $function): XPathExpr
=======
        return call_user_func($this->combinationTranslators[$combiner], $this->nodeToXPath($xpath), $this->nodeToXPath($combinedXpath));
    }

    /**
     * @param XPathExpr    $xpath
     * @param FunctionNode $function
     *
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function addFunction(XPathExpr $xpath, FunctionNode $function)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->functionTranslators[$function->getName()])) {
            throw new ExpressionErrorException(sprintf('Function "%s" not supported.', $function->getName()));
        }

<<<<<<< HEAD
        return $this->functionTranslators[$function->getName()]($xpath, $function);
    }

    /**
     * @throws ExpressionErrorException
     */
    public function addPseudoClass(XPathExpr $xpath, string $pseudoClass): XPathExpr
=======
        return call_user_func($this->functionTranslators[$function->getName()], $xpath, $function);
    }

    /**
     * @param XPathExpr $xpath
     * @param string    $pseudoClass
     *
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function addPseudoClass(XPathExpr $xpath, $pseudoClass)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->pseudoClassTranslators[$pseudoClass])) {
            throw new ExpressionErrorException(sprintf('Pseudo-class "%s" not supported.', $pseudoClass));
        }

<<<<<<< HEAD
        return $this->pseudoClassTranslators[$pseudoClass]($xpath);
    }

    /**
     * @throws ExpressionErrorException
     */
    public function addAttributeMatching(XPathExpr $xpath, string $operator, string $attribute, ?string $value): XPathExpr
=======
        return call_user_func($this->pseudoClassTranslators[$pseudoClass], $xpath);
    }

    /**
     * @param XPathExpr $xpath
     * @param string    $operator
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     *
     * @throws ExpressionErrorException
     */
    public function addAttributeMatching(XPathExpr $xpath, $operator, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->attributeMatchingTranslators[$operator])) {
            throw new ExpressionErrorException(sprintf('Attribute matcher operator "%s" not supported.', $operator));
        }

<<<<<<< HEAD
        return $this->attributeMatchingTranslators[$operator]($xpath, $attribute, $value);
    }

    /**
     * @return SelectorNode[]
     */
    private function parseSelectors(string $css): array
=======
        return call_user_func($this->attributeMatchingTranslators[$operator], $xpath, $attribute, $value);
    }

    /**
     * @param string $css
     *
     * @return SelectorNode[]
     */
    private function parseSelectors($css)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        foreach ($this->shortcutParsers as $shortcut) {
            $tokens = $shortcut->parse($css);

            if (!empty($tokens)) {
                return $tokens;
            }
        }

        return $this->mainParser->parse($css);
    }
}
