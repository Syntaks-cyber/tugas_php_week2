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

/**
 * XPath expression translator abstract extension.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
abstract class AbstractExtension implements ExtensionInterface
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getNodeTranslators(): array
    {
        return [];
=======
    public function getNodeTranslators()
    {
        return array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getCombinationTranslators(): array
    {
        return [];
=======
    public function getCombinationTranslators()
    {
        return array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getFunctionTranslators(): array
    {
        return [];
=======
    public function getFunctionTranslators()
    {
        return array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getPseudoClassTranslators(): array
    {
        return [];
=======
    public function getPseudoClassTranslators()
    {
        return array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getAttributeMatchingTranslators(): array
    {
        return [];
=======
    public function getAttributeMatchingTranslators()
    {
        return array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
