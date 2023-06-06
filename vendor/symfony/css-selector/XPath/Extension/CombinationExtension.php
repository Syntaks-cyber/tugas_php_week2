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

use Symfony\Component\CssSelector\XPath\XPathExpr;

/**
 * XPath expression translator combination extension.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class CombinationExtension extends AbstractExtension
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getCombinationTranslators(): array
    {
        return [
            ' ' => [$this, 'translateDescendant'],
            '>' => [$this, 'translateChild'],
            '+' => [$this, 'translateDirectAdjacent'],
            '~' => [$this, 'translateIndirectAdjacent'],
        ];
    }

    public function translateDescendant(XPathExpr $xpath, XPathExpr $combinedXpath): XPathExpr
=======
    public function getCombinationTranslators()
    {
        return array(
            ' ' => array($this, 'translateDescendant'),
            '>' => array($this, 'translateChild'),
            '+' => array($this, 'translateDirectAdjacent'),
            '~' => array($this, 'translateIndirectAdjacent'),
        );
    }

    /**
     * @param XPathExpr $xpath
     * @param XPathExpr $combinedXpath
     *
     * @return XPathExpr
     */
    public function translateDescendant(XPathExpr $xpath, XPathExpr $combinedXpath)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->join('/descendant-or-self::*/', $combinedXpath);
    }

<<<<<<< HEAD
    public function translateChild(XPathExpr $xpath, XPathExpr $combinedXpath): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param XPathExpr $combinedXpath
     *
     * @return XPathExpr
     */
    public function translateChild(XPathExpr $xpath, XPathExpr $combinedXpath)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->join('/', $combinedXpath);
    }

<<<<<<< HEAD
    public function translateDirectAdjacent(XPathExpr $xpath, XPathExpr $combinedXpath): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param XPathExpr $combinedXpath
     *
     * @return XPathExpr
     */
    public function translateDirectAdjacent(XPathExpr $xpath, XPathExpr $combinedXpath)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath
            ->join('/following-sibling::', $combinedXpath)
            ->addNameTest()
            ->addCondition('position() = 1');
    }

<<<<<<< HEAD
    public function translateIndirectAdjacent(XPathExpr $xpath, XPathExpr $combinedXpath): XPathExpr
=======
    /**
     * @param XPathExpr $xpath
     * @param XPathExpr $combinedXpath
     *
     * @return XPathExpr
     */
    public function translateIndirectAdjacent(XPathExpr $xpath, XPathExpr $combinedXpath)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $xpath->join('/following-sibling::', $combinedXpath);
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
        return 'combination';
    }
}
