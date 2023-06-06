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
 * Represents a "<selector>.<name>" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class ClassNode extends AbstractNode
{
<<<<<<< HEAD
    private $selector;
    private $name;

    public function __construct(NodeInterface $selector, string $name)
=======
    /**
     * @var NodeInterface
     */
    private $selector;

    /**
     * @var string
     */
    private $name;

    /**
     * @param NodeInterface $selector
     * @param string        $name
     */
    public function __construct(NodeInterface $selector, $name)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->selector = $selector;
        $this->name = $name;
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
    public function getName(): string
=======
    /**
     * @return string
     */
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->name;
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
        return $this->selector->getSpecificity()->plus(new Specificity(0, 1, 0));
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
        return sprintf('%s[%s.%s]', $this->getNodeName(), $this->selector, $this->name);
    }
}
