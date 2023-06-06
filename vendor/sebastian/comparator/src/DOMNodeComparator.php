<?php
/*
<<<<<<< HEAD
 * This file is part of sebastian/comparator.
=======
 * This file is part of the Comparator package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
namespace SebastianBergmann\Comparator;

use DOMDocument;
use DOMNode;

/**
 * Compares DOMNode instances for equality.
 */
class DOMNodeComparator extends ObjectComparator
{
    /**
     * Returns whether the comparator can compare two values.
     *
<<<<<<< HEAD
     * @param mixed $expected The first value to compare
     * @param mixed $actual   The second value to compare
     *
=======
     * @param  mixed $expected The first value to compare
     * @param  mixed $actual   The second value to compare
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool
     */
    public function accepts($expected, $actual)
    {
        return $expected instanceof DOMNode && $actual instanceof DOMNode;
    }

    /**
     * Asserts that two values are equal.
     *
     * @param mixed $expected     First value to compare
     * @param mixed $actual       Second value to compare
     * @param float $delta        Allowed numerical distance between two values to consider them equal
     * @param bool  $canonicalize Arrays are sorted before comparison when set to true
     * @param bool  $ignoreCase   Case is ignored when set to true
     * @param array $processed    List of already processed elements (used to prevent infinite recursion)
     *
     * @throws ComparisonFailure
     */
<<<<<<< HEAD
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = [])
=======
    public function assertEquals($expected, $actual, $delta = 0.0, $canonicalize = false, $ignoreCase = false, array &$processed = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $expectedAsString = $this->nodeToText($expected, true, $ignoreCase);
        $actualAsString   = $this->nodeToText($actual, true, $ignoreCase);

        if ($expectedAsString !== $actualAsString) {
<<<<<<< HEAD
            $type = $expected instanceof DOMDocument ? 'documents' : 'nodes';
=======
            if ($expected instanceof DOMDocument) {
                $type = 'documents';
            } else {
                $type = 'nodes';
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            throw new ComparisonFailure(
                $expected,
                $actual,
                $expectedAsString,
                $actualAsString,
                false,
<<<<<<< HEAD
                \sprintf("Failed asserting that two DOM %s are equal.\n", $type)
=======
                sprintf("Failed asserting that two DOM %s are equal.\n", $type)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            );
        }
    }

    /**
     * Returns the normalized, whitespace-cleaned, and indented textual
     * representation of a DOMNode.
<<<<<<< HEAD
     */
    private function nodeToText(DOMNode $node, bool $canonicalize, bool $ignoreCase): string
    {
        if ($canonicalize) {
            $document = new DOMDocument;
            @$document->loadXML($node->C14N());
=======
     *
     * @param  DOMNode $node
     * @param  bool    $canonicalize
     * @param  bool    $ignoreCase
     * @return string
     */
    private function nodeToText(DOMNode $node, $canonicalize, $ignoreCase)
    {
        if ($canonicalize) {
            $document = new DOMDocument;
            $document->loadXML($node->C14N());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            $node = $document;
        }

<<<<<<< HEAD
        $document = $node instanceof DOMDocument ? $node : $node->ownerDocument;
=======
        if ($node instanceof DOMDocument) {
            $document = $node;
        } else {
            $document = $node->ownerDocument;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $document->formatOutput = true;
        $document->normalizeDocument();

<<<<<<< HEAD
        $text = $node instanceof DOMDocument ? $node->saveXML() : $document->saveXML($node);

        return $ignoreCase ? \strtolower($text) : $text;
=======
        if ($node instanceof DOMDocument) {
            $text = $node->saveXML();
        } else {
            $text = $document->saveXML($node);
        }

        if ($ignoreCase) {
            $text = strtolower($text);
        }

        return $text;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
