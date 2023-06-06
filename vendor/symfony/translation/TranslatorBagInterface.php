<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Symfony\Component\Translation\Exception\InvalidArgumentException;

/**
 * TranslatorBagInterface.
 *
<<<<<<< HEAD
 * @method MessageCatalogueInterface[] getCatalogues() Returns all catalogues of the instance
 *
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
 */
interface TranslatorBagInterface
{
    /**
     * Gets the catalogue by locale.
     *
     * @param string|null $locale The locale or null to use the default
     *
     * @return MessageCatalogueInterface
     *
     * @throws InvalidArgumentException If the locale contains invalid characters
     */
<<<<<<< HEAD
    public function getCatalogue(string $locale = null);
=======
    public function getCatalogue($locale = null);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
