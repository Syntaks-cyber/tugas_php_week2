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
 * Represents a combined node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class CombinedSelectorNode extends AbstractNode
{
<<<<<<< HEAD
    private $selector;
    private $combinator;
    private $subSelector;

    public function __construct(NodeInterface $selector, string $combinator, NodeInterface $subSelector)
=======
    /**
     * @var NodeInterface
     */
    private $selector;

    /**
     * @var string
     */
    private $combinator;

    /**
     * @var NodeInterface
     */
    private $subSelector;

    /**
     * @param NodeInterface $selector
     * @param string        $combinator
     * @param NodeInterface $subSelector
     */
    public function __construct(NodeInterface $selector, $combinator, NodeInterface $subSelector)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->selector = $selector;
        $this->combinator = $combinator;
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
    public function getCombinator(): string
=======
    /**
     * @return string
     */
    public function getCombinator()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->combinator;
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
        $combinator = ' ' === $this->combinator ? '<followed>' : $this->combinator;

        return sprintf('%s[%s %s %s]', $this->getNodeName(), $this->selector, $combinator, $this->subSelector);
    }
}
