<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder;

/**
 * Extends \SplFileInfo to support relative paths.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class SplFileInfo extends \SplFileInfo
{
    private $relativePath;
    private $relativePathname;

    /**
<<<<<<< HEAD
=======
     * Constructor.
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @param string $file             The file name
     * @param string $relativePath     The relative path
     * @param string $relativePathname The relative path name
     */
<<<<<<< HEAD
    public function __construct(string $file, string $relativePath, string $relativePathname)
=======
    public function __construct($file, $relativePath, $relativePathname)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        parent::__construct($file);
        $this->relativePath = $relativePath;
        $this->relativePathname = $relativePathname;
    }

    /**
     * Returns the relative path.
     *
     * This path does not contain the file name.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string the relative path
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getRelativePath()
    {
        return $this->relativePath;
    }

    /**
     * Returns the relative path name.
     *
     * This path contains the file name.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string the relative path name
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getRelativePathname()
    {
        return $this->relativePathname;
    }

<<<<<<< HEAD
    public function getFilenameWithoutExtension(): string
    {
        $filename = $this->getFilename();

        return pathinfo($filename, \PATHINFO_FILENAME);
    }

    /**
     * Returns the contents of the file.
     *
     * @return string
=======
    /**
     * Returns the contents of the file.
     *
     * @return string the contents of the file
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @throws \RuntimeException
     */
    public function getContents()
    {
<<<<<<< HEAD
        set_error_handler(function ($type, $msg) use (&$error) { $error = $msg; });
        try {
            $content = file_get_contents($this->getPathname());
        } finally {
            restore_error_handler();
        }
        if (false === $content) {
            throw new \RuntimeException($error);
=======
        $level = error_reporting(0);
        $content = file_get_contents($this->getPathname());
        error_reporting($level);
        if (false === $content) {
            $error = error_get_last();
            throw new \RuntimeException($error['message']);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $content;
    }
}
