<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\CacheClearer;

/**
 * CacheClearerInterface.
 *
 * @author Dustin Dobervich <ddobervich@gmail.com>
 */
interface CacheClearerInterface
{
    /**
     * Clears any caches necessary.
<<<<<<< HEAD
     */
    public function clear(string $cacheDir);
=======
     *
     * @param string $cacheDir The cache directory
     */
    public function clear($cacheDir);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
