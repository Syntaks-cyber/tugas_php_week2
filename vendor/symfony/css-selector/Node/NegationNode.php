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
 * Represents a "<selector>:not(<identifier>)" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class NegationNode extends AbstractNode
{
<<<<<<< HEAD
    private $selector;
    private $subSelector;

=======
    /**
     * @var NodeInterface
     */
    private $selector;

    /**
     * @var NodeInterface
     */
    private $subSelector;

    /**
     * @param NodeInterface $selector
     * @param NodeInterface $subSelector
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function __construct(NodeInterface $selector, NodeInterface $subSelector)
    {
        $this->selector = $selector;
        $this->subSelector = $subSelector;
    }

<<<<<<< HEAD
    public function getSelector(): NodeInterface
=======
    /**
     * @return NodeInterface
     */
    public function getSelector()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->selector;
    }

<<<<<<< HEAD
    public function getSubSelector(): NodeInterface
=======
    /**
     * @return NodeInterface
     */
    public function getSubSelector()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->subSelector;
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
        return $this->selector->getSpecificity()->plus($this->subSelector->getSpecificity());
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
        return sprintf('%s[%s:not(%s)]', $this->getNodeName(), $this->selector, $this->subSelector);
    }
}
