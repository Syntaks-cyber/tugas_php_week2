<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Reader;

use Symfony\Component\Finder\Finder;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * TranslationReader reads translation messages from translation files.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class TranslationReader implements TranslationReaderInterface
{
    /**
     * Loaders used for import.
     *
<<<<<<< HEAD
     * @var array<string, LoaderInterface>
=======
     * @var array
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $loaders = [];

    /**
     * Adds a loader to the translation extractor.
     *
     * @param string $format The format of the loader
     */
<<<<<<< HEAD
    public function addLoader(string $format, LoaderInterface $loader)
=======
    public function addLoader($format, LoaderInterface $loader)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->loaders[$format] = $loader;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function read(string $directory, MessageCatalogue $catalogue)
=======
    public function read($directory, MessageCatalogue $catalogue)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!is_dir($directory)) {
            return;
        }

        foreach ($this->loaders as $format => $loader) {
            // load any existing translation files
            $finder = new Finder();
            $extension = $catalogue->getLocale().'.'.$format;
            $files = $finder->files()->name('*.'.$extension)->in($directory);
            foreach ($files as $file) {
                $domain = substr($file->getFilename(), 0, -1 * \strlen($extension) - 1);
                $catalogue->addCatalogue($loader->load($file->getPathname(), $catalogue->getLocale(), $domain));
            }
        }
    }
}
