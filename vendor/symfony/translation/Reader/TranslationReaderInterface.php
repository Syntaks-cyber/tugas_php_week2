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

use Symfony\Component\Translation\MessageCatalogue;

/**
 * TranslationReader reads translation messages from translation files.
 *
 * @author Tobias Nyholm <tobias.nyholm@gmail.com>
 */
interface TranslationReaderInterface
{
    /**
     * Reads translation messages from a directory to the catalogue.
<<<<<<< HEAD
     */
    public function read(string $directory, MessageCatalogue $catalogue);
=======
     *
     * @param string $directory
     */
    public function read($directory, MessageCatalogue $catalogue);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
