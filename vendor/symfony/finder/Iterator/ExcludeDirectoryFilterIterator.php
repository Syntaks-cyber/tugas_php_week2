<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

/**
 * ExcludeDirectoryFilterIterator filters out directories.
 *
 * @author Fabien Potencier <fabien@symfony.com>
<<<<<<< HEAD
 *
 * @extends \FilterIterator<string, \SplFileInfo>
 * @implements \RecursiveIterator<string, \SplFileInfo>
 */
class ExcludeDirectoryFilterIterator extends \FilterIterator implements \RecursiveIterator
{
    private $iterator;
    private $isRecursive;
    private $excludedDirs = [];
    private $excludedPattern;

    /**
     * @param \Iterator $iterator    The Iterator to filter
     * @param string[]  $directories An array of directories to exclude
=======
 */
class ExcludeDirectoryFilterIterator extends FilterIterator implements \RecursiveIterator
{
    private $iterator;
    private $isRecursive;
    private $excludedDirs = array();
    private $excludedPattern;

    /**
     * Constructor.
     *
     * @param \Iterator $iterator    The Iterator to filter
     * @param array     $directories An array of directories to exclude
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function __construct(\Iterator $iterator, array $directories)
    {
        $this->iterator = $iterator;
        $this->isRecursive = $iterator instanceof \RecursiveIterator;
<<<<<<< HEAD
        $patterns = [];
        foreach ($directories as $directory) {
            $directory = rtrim($directory, '/');
            if (!$this->isRecursive || str_contains($directory, '/')) {
=======
        $patterns = array();
        foreach ($directories as $directory) {
            if (!$this->isRecursive || false !== strpos($directory, '/')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $patterns[] = preg_quote($directory, '#');
            } else {
                $this->excludedDirs[$directory] = true;
            }
        }
        if ($patterns) {
            $this->excludedPattern = '#(?:^|/)(?:'.implode('|', $patterns).')(?:/|$)#';
        }

        parent::__construct($iterator);
    }

    /**
     * Filters the iterator values.
     *
<<<<<<< HEAD
     * @return bool
     */
    #[\ReturnTypeWillChange]
=======
     * @return bool true if the value should be kept, false otherwise
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function accept()
    {
        if ($this->isRecursive && isset($this->excludedDirs[$this->getFilename()]) && $this->isDir()) {
            return false;
        }

        if ($this->excludedPattern) {
            $path = $this->isDir() ? $this->current()->getRelativePathname() : $this->current()->getRelativePath();
            $path = str_replace('\\', '/', $path);

            return !preg_match($this->excludedPattern, $path);
        }

        return true;
    }

<<<<<<< HEAD
    /**
     * @return bool
     */
    #[\ReturnTypeWillChange]
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function hasChildren()
    {
        return $this->isRecursive && $this->iterator->hasChildren();
    }

<<<<<<< HEAD
    /**
     * @return self
     */
    #[\ReturnTypeWillChange]
    public function getChildren()
    {
        $children = new self($this->iterator->getChildren(), []);
=======
    public function getChildren()
    {
        $children = new self($this->iterator->getChildren(), array());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $children->excludedDirs = $this->excludedDirs;
        $children->excludedPattern = $this->excludedPattern;

        return $children;
    }
}
