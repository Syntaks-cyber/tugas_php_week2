<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DependencyInjection;

use Symfony\Component\DependencyInjection\Compiler\MergeExtensionConfigurationPass as BaseMergeExtensionConfigurationPass;
use Symfony\Component\DependencyInjection\ContainerBuilder;

/**
 * Ensures certain extensions are always loaded.
 *
 * @author Kris Wallsmith <kris@symfony.com>
 */
class MergeExtensionConfigurationPass extends BaseMergeExtensionConfigurationPass
{
    private $extensions;

<<<<<<< HEAD
    /**
     * @param string[] $extensions
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function __construct(array $extensions)
    {
        $this->extensions = $extensions;
    }

    public function process(ContainerBuilder $container)
    {
        foreach ($this->extensions as $extension) {
<<<<<<< HEAD
            if (!\count($container->getExtensionConfig($extension))) {
                $container->loadFromExtension($extension, []);
=======
            if (!count($container->getExtensionConfig($extension))) {
                $container->loadFromExtension($extension, array());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        parent::process($container);
    }
}
