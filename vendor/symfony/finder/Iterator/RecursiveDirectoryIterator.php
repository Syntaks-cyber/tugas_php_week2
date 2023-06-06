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

use Symfony\Component\Finder\Exception\AccessDeniedException;
use Symfony\Component\Finder\SplFileInfo;

/**
 * Extends the \RecursiveDirectoryIterator to support relative paths.
 *
 * @author Victor Berchet <victor@suumit.com>
 */
class RecursiveDirectoryIterator extends \RecursiveDirectoryIterator
{
    /**
     * @var bool
     */
    private $ignoreUnreadableDirs;

    /**
     * @var bool
     */
    private $rewindable;

    // these 3 properties take part of the performance optimization to avoid redoing the same work in all iterations
    private $rootPath;
    private $subPath;
    private $directorySeparator = '/';

    /**
<<<<<<< HEAD
     * @throws \RuntimeException
     */
    public function __construct(string $path, int $flags, bool $ignoreUnreadableDirs = false)
=======
     * Constructor.
     *
     * @param string $path
     * @param int    $flags
     * @param bool   $ignoreUnreadableDirs
     *
     * @throws \RuntimeException
     */
    public function __construct($path, $flags, $ignoreUnreadableDirs = false)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ($flags & (self::CURRENT_AS_PATHNAME | self::CURRENT_AS_SELF)) {
            throw new \RuntimeException('This iterator only support returning current as fileinfo.');
        }

        parent::__construct($path, $flags);
        $this->ignoreUnreadableDirs = $ignoreUnreadableDirs;
        $this->rootPath = $path;
<<<<<<< HEAD
        if ('/' !== \DIRECTORY_SEPARATOR && !($flags & self::UNIX_PATHS)) {
            $this->directorySeparator = \DIRECTORY_SEPARATOR;
=======
        if ('/' !== DIRECTORY_SEPARATOR && !($flags & self::UNIX_PATHS)) {
            $this->directorySeparator = DIRECTORY_SEPARATOR;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Return an instance of SplFileInfo with support for relative paths.
     *
<<<<<<< HEAD
     * @return SplFileInfo
     */
    #[\ReturnTypeWillChange]
=======
     * @return SplFileInfo File information
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function current()
    {
        // the logic here avoids redoing the same work in all iterations

        if (null === $subPathname = $this->subPath) {
<<<<<<< HEAD
            $subPathname = $this->subPath = $this->getSubPath();
=======
            $subPathname = $this->subPath = (string) $this->getSubPath();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
        if ('' !== $subPathname) {
            $subPathname .= $this->directorySeparator;
        }
        $subPathname .= $this->getFilename();

<<<<<<< HEAD
        if ('/' !== $basePath = $this->rootPath) {
            $basePath .= $this->directorySeparator;
        }

        return new SplFileInfo($basePath.$subPathname, $this->subPath, $subPathname);
    }

    /**
     * @param bool $allowLinks
     *
     * @return bool
     */
    #[\ReturnTypeWillChange]
    public function hasChildren($allowLinks = false)
    {
        $hasChildren = parent::hasChildren($allowLinks);

        if (!$hasChildren || !$this->ignoreUnreadableDirs) {
            return $hasChildren;
        }

        try {
            parent::getChildren();

            return true;
        } catch (\UnexpectedValueException $e) {
            // If directory is unreadable and finder is set to ignore it, skip children
            return false;
        }
    }

    /**
     * @return \RecursiveDirectoryIterator
     *
     * @throws AccessDeniedException
     */
    #[\ReturnTypeWillChange]
=======
        return new SplFileInfo($this->rootPath.$this->directorySeparator.$subPathname, $this->subPath, $subPathname);
    }

    /**
     * @return \RecursiveIterator
     *
     * @throws AccessDeniedException
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getChildren()
    {
        try {
            $children = parent::getChildren();

            if ($children instanceof self) {
                // parent method will call the constructor with default arguments, so unreadable dirs won't be ignored anymore
                $children->ignoreUnreadableDirs = $this->ignoreUnreadableDirs;

                // performance optimization to avoid redoing the same work in all children
                $children->rewindable = &$this->rewindable;
                $children->rootPath = $this->rootPath;
            }

            return $children;
        } catch (\UnexpectedValueException $e) {
<<<<<<< HEAD
            throw new AccessDeniedException($e->getMessage(), $e->getCode(), $e);
=======
            if ($this->ignoreUnreadableDirs) {
                // If directory is unreadable and finder is set to ignore it, a fake empty content is returned.
                return new \RecursiveArrayIterator(array());
            } else {
                throw new AccessDeniedException($e->getMessage(), $e->getCode(), $e);
            }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }
    }

    /**
     * Do nothing for non rewindable stream.
<<<<<<< HEAD
     *
     * @return void
     */
    #[\ReturnTypeWillChange]
=======
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function rewind()
    {
        if (false === $this->isRewindable()) {
            return;
        }

<<<<<<< HEAD
=======
        // @see https://bugs.php.net/68557
        if (PHP_VERSION_ID < 50523 || PHP_VERSION_ID >= 50600 && PHP_VERSION_ID < 50607) {
            parent::next();
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        parent::rewind();
    }

    /**
     * Checks if the stream is rewindable.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return bool true when the stream is rewindable, false otherwise
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function isRewindable()
    {
        if (null !== $this->rewindable) {
            return $this->rewindable;
        }

        if (false !== $stream = @opendir($this->getPath())) {
            $infos = stream_get_meta_data($stream);
            closedir($stream);

            if ($infos['seekable']) {
                return $this->rewindable = true;
            }
        }

        return $this->rewindable = false;
    }
}
