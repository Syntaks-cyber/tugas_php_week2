<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel;

<<<<<<< HEAD
use Symfony\Component\Config\Loader\LoaderInterface;
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
=======
use Symfony\Component\DependencyInjection\ContainerInterface;
use Symfony\Component\HttpKernel\Bundle\BundleInterface;
use Symfony\Component\Config\Loader\LoaderInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * The Kernel is the heart of the Symfony system.
 *
<<<<<<< HEAD
 * It manages an environment made of application kernel and bundles.
 *
 * @method string getBuildDir() Returns the build directory - not implementing it is deprecated since Symfony 5.2.
 *                              This directory should be used to store build artifacts, and can be read-only at runtime.
 *                              Caches written at runtime should be stored in the "cache directory" ({@see KernelInterface::getCacheDir()}).
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface KernelInterface extends HttpKernelInterface
=======
 * It manages an environment made of bundles.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
interface KernelInterface extends HttpKernelInterface, \Serializable
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * Returns an array of bundles to register.
     *
<<<<<<< HEAD
     * @return iterable<mixed, BundleInterface>
=======
     * @return BundleInterface[] An array of bundle instances
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function registerBundles();

    /**
     * Loads the container configuration.
<<<<<<< HEAD
=======
     *
     * @param LoaderInterface $loader A LoaderInterface instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function registerContainerConfiguration(LoaderInterface $loader);

    /**
     * Boots the current kernel.
     */
    public function boot();

    /**
     * Shutdowns the kernel.
     *
     * This method is mainly useful when doing functional testing.
     */
    public function shutdown();

    /**
     * Gets the registered bundle instances.
     *
<<<<<<< HEAD
     * @return array<string, BundleInterface>
=======
     * @return BundleInterface[] An array of registered bundle instances
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getBundles();

    /**
<<<<<<< HEAD
     * Returns a bundle.
     *
     * @return BundleInterface
     *
     * @throws \InvalidArgumentException when the bundle is not enabled
     */
    public function getBundle(string $name);

    /**
     * Returns the file path for a given bundle resource.
=======
     * Returns a bundle and optionally its descendants by its name.
     *
     * @param string $name  Bundle name
     * @param bool   $first Whether to return the first bundle only or together with its descendants
     *
     * @return BundleInterface|BundleInterface[] A BundleInterface instance or an array of BundleInterface instances if $first is false
     *
     * @throws \InvalidArgumentException when the bundle is not enabled
     */
    public function getBundle($name, $first = true);

    /**
     * Returns the file path for a given resource.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * A Resource can be a file or a directory.
     *
     * The resource name must follow the following pattern:
     *
     *     "@BundleName/path/to/a/file.something"
     *
     * where BundleName is the name of the bundle
     * and the remaining part is the relative path in the bundle.
     *
<<<<<<< HEAD
     * @return string
=======
     * If $dir is passed, and the first segment of the path is "Resources",
     * this method will look for a file named:
     *
     *     $dir/<BundleName>/path/without/Resources
     *
     * before looking in the bundle resource folder.
     *
     * @param string $name  A resource name to locate
     * @param string $dir   A directory where to look for the resource first
     * @param bool   $first Whether to return the first path or paths for all matching bundles
     *
     * @return string|array The absolute path of the resource or an array if $first is false
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @throws \InvalidArgumentException if the file cannot be found or the name is not valid
     * @throws \RuntimeException         if the name contains invalid/unsafe characters
     */
<<<<<<< HEAD
    public function locateResource(string $name);
=======
    public function locateResource($name, $dir = null, $first = true);

    /**
     * Gets the name of the kernel.
     *
     * @return string The kernel name
     */
    public function getName();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets the environment.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The current environment
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getEnvironment();

    /**
     * Checks if debug mode is enabled.
     *
<<<<<<< HEAD
     * @return bool
=======
     * @return bool true if debug mode is enabled, false otherwise
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function isDebug();

    /**
<<<<<<< HEAD
     * Gets the project dir (path of the project's composer file).
     *
     * @return string
     */
    public function getProjectDir();
=======
     * Gets the application root dir.
     *
     * @return string The application root dir
     */
    public function getRootDir();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets the current container.
     *
<<<<<<< HEAD
     * @return ContainerInterface
=======
     * @return ContainerInterface A ContainerInterface instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getContainer();

    /**
     * Gets the request start time (not available if debug is disabled).
     *
<<<<<<< HEAD
     * @return float
=======
     * @return int The request start timestamp
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getStartTime();

    /**
     * Gets the cache directory.
     *
<<<<<<< HEAD
     * Since Symfony 5.2, the cache directory should be used for caches that are written at runtime.
     * For caches and artifacts that can be warmed at compile-time and deployed as read-only,
     * use the new "build directory" returned by the {@see getBuildDir()} method.
     *
     * @return string
=======
     * @return string The cache directory
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getCacheDir();

    /**
     * Gets the log directory.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The log directory
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getLogDir();

    /**
     * Gets the charset of the application.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string The charset
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getCharset();
}
