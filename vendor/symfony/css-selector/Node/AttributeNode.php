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
 * Represents a "<selector>[<namespace>|<attribute> <operator> <value>]" node.
 *
 * This component is a port of the Python cssselect library,
 * which is copyright Ian Bicking, @see https://github.com/SimonSapin/cssselect.
 *
 * @author Jean-François Simon <jeanfrancois.simon@sensiolabs.com>
 *
 * @internal
 */
class AttributeNode extends AbstractNode
{
<<<<<<< HEAD
    private $selector;
    private $namespace;
    private $attribute;
    private $operator;
    private $value;

    public function __construct(NodeInterface $selector, ?string $namespace, string $attribute, string $operator, ?string $value)
=======
    /**
     * @var NodeInterface
     */
    private $selector;

    /**
     * @var string
     */
    private $namespace;

    /**
     * @var string
     */
    private $attribute;

    /**
     * @var string
     */
    private $operator;

    /**
     * @var string
     */
    private $value;

    /**
     * @param NodeInterface $selector
     * @param string        $namespace
     * @param string        $attribute
     * @param string        $operator
     * @param string        $value
     */
    public function __construct(NodeInterface $selector, $namespace, $attribute, $operator, $value)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->selector = $selector;
        $this->namespace = $namespace;
        $this->attribute = $attribute;
        $this->operator = $operator;
        $this->value = $value;
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
    public function getNamespace(): ?string
=======
    /**
     * @return string
     */
    public function getNamespace()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->namespace;
    }

<<<<<<< HEAD
    public function getAttribute(): string
=======
    /**
     * @return string
     */
    public function getAttribute()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->attribute;
    }

<<<<<<< HEAD
    public function getOperator(): string
=======
    /**
     * @return string
     */
    public function getOperator()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->operator;
    }

<<<<<<< HEAD
    public function getValue(): ?string
=======
    /**
     * @return string
     */
    public function getValue()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->value;
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
        $attribute = $this->namespace ? $this->namespace.'|'.$this->attribute : $this->attribute;

        return 'exists' === $this->operator
            ? sprintf('%s[%s[%s]]', $this->getNodeName(), $this->selector, $attribute)
            : sprintf("%s[%s[%s %s '%s']]", $this->getNodeName(), $this->selector, $attribute, $this->operator, $this->value);
    }
}
