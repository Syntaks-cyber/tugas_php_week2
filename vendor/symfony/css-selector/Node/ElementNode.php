<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\CssSelector\Node;

/**
 * Represents a "<namespace>|<element>" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class ElementNode extends AbstractNode
{
<<<<<<< HEAD
    private $namespace;
    private $element;

    public function __construct(string $namespace = null, string $element = null)
=======
    /**
     * @var string|null
     */
    private $namespace;

    /**
     * @var string|null
     */
    private $element;

    /**
     * @param string|null $namespace
     * @param string|null $element
     */
    public function __construct($namespace = null, $element = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->namespace = $namespace;
        $this->element = $element;
    }

<<<<<<< HEAD
    public function getNamespace(): ?string
=======
    /**
     * @return null|string
     */
    public function getNamespace()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->namespace;
    }

<<<<<<< HEAD
    public function getElement(): ?string
=======
    /**
     * @return null|string
     */
    public function getElement()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->element;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getSpecificity(): Specificity
=======
    public function getSpecificity()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return new Specificity(0, 0, $this->element ? 1 : 0);
    }

<<<<<<< HEAD
    public function __toString(): string
=======
    /**
     * {@inheritdoc}
     */
    public function __toString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $element = $this->element ?: '*';

        return sprintf('%s[%s]', $this->getNodeName(), $this->namespace ? $this->namespace.'|'.$element : $element);
    }
}
