<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Loader;

use Symfony\Component\Config\Resource\FileResource;
use Symfony\Component\Translation\Exception\InvalidResourceException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;

/**
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
 */
abstract class FileLoader extends ArrayLoader
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function load($resource, string $locale, string $domain = 'messages')
=======
    public function load($resource, $locale, $domain = 'messages')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!stream_is_local($resource)) {
            throw new InvalidResourceException(sprintf('This is not a local file "%s".', $resource));
        }

        if (!file_exists($resource)) {
            throw new NotFoundResourceException(sprintf('File "%s" not found.', $resource));
        }

        $messages = $this->loadResource($resource);

        // empty resource
        if (null === $messages) {
            $messages = [];
        }

        // not an array
        if (!\is_array($messages)) {
            throw new InvalidResourceException(sprintf('Unable to load file "%s".', $resource));
        }

        $catalogue = parent::load($messages, $locale, $domain);

<<<<<<< HEAD
        if (class_exists(FileResource::class)) {
=======
        if (class_exists('Symfony\Component\Config\Resource\FileResource')) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $catalogue->addResource(new FileResource($resource));
        }

        return $catalogue;
    }

    /**
<<<<<<< HEAD
=======
     * @param string $resource
     *
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * @return array
     *
     * @throws InvalidResourceException if stream content has an invalid format
     */
<<<<<<< HEAD
    abstract protected function loadResource(string $resource);
=======
    abstract protected function loadResource($resource);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
