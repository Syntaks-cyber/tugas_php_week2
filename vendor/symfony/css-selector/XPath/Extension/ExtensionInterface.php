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
 * XPath expression translator extension interface.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
interface ExtensionInterface
{
    /**
     * Returns node translators.
     *
     * These callables will receive the node as first argument and the translator as second argument.
     *
     * @return callable[]
     */
<<<<<<< HEAD
    public function getNodeTranslators(): array;
=======
    public function getNodeTranslators();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns combination translators.
     *
     * @return callable[]
     */
<<<<<<< HEAD
    public function getCombinationTranslators(): array;
=======
    public function getCombinationTranslators();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns function translators.
     *
     * @return callable[]
     */
<<<<<<< HEAD
    public function getFunctionTranslators(): array;
=======
    public function getFunctionTranslators();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns pseudo-class translators.
     *
     * @return callable[]
     */
<<<<<<< HEAD
    public function getPseudoClassTranslators(): array;
=======
    public function getPseudoClassTranslators();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Returns attribute operation translators.
     *
     * @return callable[]
     */
<<<<<<< HEAD
    public function getAttributeMatchingTranslators(): array;

    /**
     * Returns extension name.
     */
    public function getName(): string;
=======
    public function getAttributeMatchingTranslators();

    /**
     * Returns extension name.
     *
     * @return string
     */
    public function getName();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
