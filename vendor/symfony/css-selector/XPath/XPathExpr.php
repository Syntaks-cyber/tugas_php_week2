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
class XPathExpr
{
<<<<<<< HEAD
    private $path;
    private $element;
    private $condition;

    public function __construct(string $path = '', string $element = '*', string $condition = '', bool $starPrefix = false)
=======
    /**
     * @var string
     */
    private $path;

    /**
     * @var string
     */
    private $element;

    /**
     * @var string
     */
    private $condition;

    /**
     * @param string $path
     * @param string $element
     * @param string $condition
     * @param bool   $starPrefix
     */
    public function __construct($path = '', $element = '*', $condition = '', $starPrefix = false)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->path = $path;
        $this->element = $element;
        $this->condition = $condition;

        if ($starPrefix) {
            $this->addStarPrefix();
        }
    }

<<<<<<< HEAD
    public function getElement(): string
=======
    /**
     * @return string
     */
    public function getElement()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->element;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function addCondition(string $condition): self
    {
        $this->condition = $this->condition ? sprintf('(%s) and (%s)', $this->condition, $condition) : $condition;
=======
     * @param $condition
     *
     * @return XPathExpr
     */
    public function addCondition($condition)
    {
        $this->condition = $this->condition ? sprintf('%s and (%s)', $this->condition, $condition) : $condition;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        return $this;
    }

<<<<<<< HEAD
    public function getCondition(): string
=======
    /**
     * @return string
     */
    public function getCondition()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->condition;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function addNameTest(): self
=======
     * @return XPathExpr
     */
    public function addNameTest()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ('*' !== $this->element) {
            $this->addCondition('name() = '.Translator::getXpathLiteral($this->element));
            $this->element = '*';
        }

        return $this;
    }

    /**
<<<<<<< HEAD
     * @return $this
     */
    public function addStarPrefix(): self
=======
     * @return XPathExpr
     */
    public function addStarPrefix()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->path .= '*/';

        return $this;
    }

    /**
     * Joins another XPathExpr with a combiner.
     *
<<<<<<< HEAD
     * @return $this
     */
    public function join(string $combiner, self $expr): self
=======
     * @param string    $combiner
     * @param XPathExpr $expr
     *
     * @return XPathExpr
     */
    public function join($combiner, XPathExpr $expr)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $path = $this->__toString().$combiner;

        if ('*/' !== $expr->path) {
            $path .= $expr->path;
        }

        $this->path = $path;
        $this->element = $expr->element;
        $this->condition = $expr->condition;

        return $this;
    }

<<<<<<< HEAD
    public function __toString(): string
=======
    /**
     * @return string
     */
    public function __toString()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $path = $this->path.$this->element;
        $condition = null === $this->condition || '' === $this->condition ? '' : '['.$this->condition.']';

        return $path.$condition;
    }
}
