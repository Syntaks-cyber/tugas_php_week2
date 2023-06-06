<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Extractor;

use Symfony\Component\Translation\Exception\InvalidArgumentException;

/**
 * Base class used by classes that extract translation messages from files.
 *
 * @author Marcos D. Sánchez <marcosdsanchez@gmail.com>
 */
abstract class AbstractFileExtractor
{
    /**
     * @param string|iterable $resource Files, a file or a directory
     *
     * @return iterable
     */
    protected function extractFiles($resource)
    {
<<<<<<< HEAD
        if (is_iterable($resource)) {
=======
        if (\is_array($resource) || $resource instanceof \Traversable) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $files = [];
            foreach ($resource as $file) {
                if ($this->canBeExtracted($file)) {
                    $files[] = $this->toSplFileInfo($file);
                }
            }
        } elseif (is_file($resource)) {
            $files = $this->canBeExtracted($resource) ? [$this->toSplFileInfo($resource)] : [];
        } else {
            $files = $this->extractFromDirectory($resource);
        }

        return $files;
    }

<<<<<<< HEAD
    private function toSplFileInfo(string $file): \SplFileInfo
    {
        return new \SplFileInfo($file);
    }

    /**
=======
    /**
     * @param string $file
     *
     * @return \SplFileInfo
     */
    private function toSplFileInfo($file)
    {
        return ($file instanceof \SplFileInfo) ? $file : new \SplFileInfo($file);
    }

    /**
     * @param string $file
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return bool
     *
     * @throws InvalidArgumentException
     */
<<<<<<< HEAD
    protected function isFile(string $file)
=======
    protected function isFile($file)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!is_file($file)) {
            throw new InvalidArgumentException(sprintf('The "%s" file does not exist.', $file));
        }

        return true;
    }

    /**
<<<<<<< HEAD
     * @return bool
     */
    abstract protected function canBeExtracted(string $file);
=======
     * @param string $file
     *
     * @return bool
     */
    abstract protected function canBeExtracted($file);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @param string|array $resource Files, a file or a directory
     *
<<<<<<< HEAD
     * @return iterable
=======
     * @return iterable files to be extracted
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    abstract protected function extractFromDirectory($resource);
}
