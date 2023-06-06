<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\XPath\Extension;

use Symfony\Component\CssSelector\XPath\Translator;
use Symfony\Component\CssSelector\XPath\XPathExpr;

/**
 * XPath expression translator attribute extension.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class AttributeMatchingExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getAttributeMatchingTranslators(): array
    {
        return [
            'exists' => [$this, 'translateExists'],
            '=' => [$this, 'translateEquals'],
            '~=' => [$this, 'translateIncludes'],
            '|=' => [$this, 'translateDashMatch'],
            '^=' => [$this, 'translatePrefixMatch'],
            '$=' => [$this, 'translateSuffixMatch'],
            '*=' => [$this, 'translateSubstringMatch'],
            '!=' => [$this, 'translateDifferent'],
        ];
    }

    public function translateExists(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    public function getAttributeMatchingTranslators()
    {
        return array(
            'exists' => array($this, 'translateExists'),
            '=' => array($this, 'translateEquals'),
            '~=' => array($this, 'translateIncludes'),
            '|=' => array($this, 'translateDashMatch'),
            '^=' => array($this, 'translatePrefixMatch'),
            '$=' => array($this, 'translateSuffixMatch'),
            '*=' => array($this, 'translateSubstringMatch'),
            '!=' => array($this, 'translateDifferent'),
        );
    }

    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translateExists(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition($attribute);
    }

<<<<<<< HEAD
    public function translateEquals(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translateEquals(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition(sprintf('%s = %s', $attribute, Translator::getXpathLiteral($value)));
    }

<<<<<<< HEAD
    public function translateIncludes(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translateIncludes(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition($value ? sprintf(
            '%1$s and contains(concat(\' \', normalize-space(%1$s), \' \'), %2$s)',
            $attribute,
            Translator::getXpathLiteral(' '.$value.' ')
        ) : '0');
    }

<<<<<<< HEAD
    public function translateDashMatch(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translateDashMatch(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition(sprintf(
            '%1$s and (%1$s = %2$s or starts-with(%1$s, %3$s))',
            $attribute,
            Translator::getXpathLiteral($value),
            Translator::getXpathLiteral($value.'-')
        ));
    }

<<<<<<< HEAD
    public function translatePrefixMatch(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translatePrefixMatch(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition($value ? sprintf(
            '%1$s and starts-with(%1$s, %2$s)',
            $attribute,
            Translator::getXpathLiteral($value)
        ) : '0');
    }

<<<<<<< HEAD
    public function translateSuffixMatch(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translateSuffixMatch(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition($value ? sprintf(
            '%1$s and substring(%1$s, string-length(%1$s)-%2$s) = %3$s',
            $attribute,
<<<<<<< HEAD
            \strlen($value) - 1,
=======
            strlen($value) - 1,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            Translator::getXpathLiteral($value)
        ) : '0');
    }

<<<<<<< HEAD
    public function translateSubstringMatch(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translateSubstringMatch(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition($value ? sprintf(
            '%1$s and contains(%1$s, %2$s)',
            $attribute,
            Translator::getXpathLiteral($value)
        ) : '0');
    }

<<<<<<< HEAD
    public function translateDifferent(XPathExpr $xpath, string $attribute, ?string $value): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param string    $attribute
     * @param string    $value
     *
     * @return XPathExpr
     */
    public function translateDifferent(XPathExpr $xpath, $attribute, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->addCondition(sprintf(
            $value ? 'not(%1$s) or %1$s != %2$s' : '%s != %s',
            $attribute,
            Translator::getXpathLiteral($value)
        ));
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName(): string
=======
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'attribute-matching';
    }
}
