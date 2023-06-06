<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\VarDumper\Caster\ClassStub;

/**
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class ConfigDataCollector extends DataCollector implements LateDataCollectorInterface
=======
use Symfony\Component\HttpKernel\KernelInterface;
use Symfony\Component\HttpKernel\Kernel;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
 * ConfigDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class ConfigDataCollector extends DataCollector
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var KernelInterface
     */
    private $kernel;
<<<<<<< HEAD

    /**
     * Sets the Kernel associated with this Request.
=======
    private $name;
    private $version;
    private $cacheVersionInfo = true;

    /**
     * Constructor.
     *
     * @param string $name    The name of the application using the web profiler
     * @param string $version The version of the application using the web profiler
     */
    public function __construct($name = null, $version = null)
    {
        $this->name = $name;
        $this->version = $version;
    }

    /**
     * Sets the Kernel associated with this Request.
     *
     * @param KernelInterface $kernel A KernelInterface instance
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function setKernel(KernelInterface $kernel = null)
    {
        $this->kernel = $kernel;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        $eom = \DateTime::createFromFormat('d/m/Y', '01/'.Kernel::END_OF_MAINTENANCE);
        $eol = \DateTime::createFromFormat('d/m/Y', '01/'.Kernel::END_OF_LIFE);

        $this->data = [
            'token' => $response->headers->get('X-Debug-Token'),
            'symfony_version' => Kernel::VERSION,
            'symfony_minor_version' => sprintf('%s.%s', Kernel::MAJOR_VERSION, Kernel::MINOR_VERSION),
            'symfony_lts' => 4 === Kernel::MINOR_VERSION,
            'symfony_state' => $this->determineSymfonyState(),
            'symfony_eom' => $eom->format('F Y'),
            'symfony_eol' => $eol->format('F Y'),
            'env' => isset($this->kernel) ? $this->kernel->getEnvironment() : 'n/a',
            'debug' => isset($this->kernel) ? $this->kernel->isDebug() : 'n/a',
            'php_version' => \PHP_VERSION,
            'php_architecture' => \PHP_INT_SIZE * 8,
            'php_intl_locale' => class_exists(\Locale::class, false) && \Locale::getDefault() ? \Locale::getDefault() : 'n/a',
            'php_timezone' => date_default_timezone_get(),
            'xdebug_enabled' => \extension_loaded('xdebug'),
            'apcu_enabled' => \extension_loaded('apcu') && filter_var(\ini_get('apc.enabled'), \FILTER_VALIDATE_BOOLEAN),
            'zend_opcache_enabled' => \extension_loaded('Zend OPcache') && filter_var(\ini_get('opcache.enable'), \FILTER_VALIDATE_BOOLEAN),
            'bundles' => [],
            'sapi_name' => \PHP_SAPI,
        ];

        if (isset($this->kernel)) {
            foreach ($this->kernel->getBundles() as $name => $bundle) {
                $this->data['bundles'][$name] = new ClassStub(\get_class($bundle));
            }
        }

        if (preg_match('~^(\d+(?:\.\d+)*)(.+)?$~', $this->data['php_version'], $matches) && isset($matches[2])) {
            $this->data['php_version'] = $matches[1];
            $this->data['php_version_extra'] = $matches[2];
        }
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->data = [];
    }

    public function lateCollect()
    {
        $this->data = $this->cloneVar($this->data);
=======
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        $this->data = array(
            'app_name' => $this->name,
            'app_version' => $this->version,
            'token' => $response->headers->get('X-Debug-Token'),
            'symfony_version' => Kernel::VERSION,
            'symfony_state' => 'unknown',
            'name' => isset($this->kernel) ? $this->kernel->getName() : 'n/a',
            'env' => isset($this->kernel) ? $this->kernel->getEnvironment() : 'n/a',
            'debug' => isset($this->kernel) ? $this->kernel->isDebug() : 'n/a',
            'php_version' => PHP_VERSION,
            'xdebug_enabled' => extension_loaded('xdebug'),
            'eaccel_enabled' => extension_loaded('eaccelerator') && ini_get('eaccelerator.enable'),
            'apc_enabled' => extension_loaded('apc') && ini_get('apc.enabled'),
            'xcache_enabled' => extension_loaded('xcache') && ini_get('xcache.cacher'),
            'wincache_enabled' => extension_loaded('wincache') && ini_get('wincache.ocenabled'),
            'zend_opcache_enabled' => extension_loaded('Zend OPcache') && ini_get('opcache.enable'),
            'bundles' => array(),
            'sapi_name' => PHP_SAPI,
        );

        if (isset($this->kernel)) {
            foreach ($this->kernel->getBundles() as $name => $bundle) {
                $this->data['bundles'][$name] = $bundle->getPath();
            }

            $this->data['symfony_state'] = $this->determineSymfonyState();
        }
    }

    public function getApplicationName()
    {
        return $this->data['app_name'];
    }

    public function getApplicationVersion()
    {
        return $this->data['app_version'];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the token.
<<<<<<< HEAD
     */
    public function getToken(): ?string
=======
     *
     * @return string The token
     */
    public function getToken()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['token'];
    }

    /**
     * Gets the Symfony version.
<<<<<<< HEAD
     */
    public function getSymfonyVersion(): string
=======
     *
     * @return string The Symfony version
     */
    public function getSymfonyVersion()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['symfony_version'];
    }

    /**
     * Returns the state of the current Symfony release.
     *
     * @return string One of: unknown, dev, stable, eom, eol
     */
<<<<<<< HEAD
    public function getSymfonyState(): string
=======
    public function getSymfonyState()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['symfony_state'];
    }

<<<<<<< HEAD
    /**
     * Returns the minor Symfony version used (without patch numbers of extra
     * suffix like "RC", "beta", etc.).
     */
    public function getSymfonyMinorVersion(): string
    {
        return $this->data['symfony_minor_version'];
    }

    /**
     * Returns if the current Symfony version is a Long-Term Support one.
     */
    public function isSymfonyLts(): bool
    {
        return $this->data['symfony_lts'];
    }

    /**
     * Returns the human readable date when this Symfony version ends its
     * maintenance period.
     */
    public function getSymfonyEom(): string
    {
        return $this->data['symfony_eom'];
    }

    /**
     * Returns the human readable date when this Symfony version reaches its
     * "end of life" and won't receive bugs or security fixes.
     */
    public function getSymfonyEol(): string
    {
        return $this->data['symfony_eol'];
=======
    public function setCacheVersionInfo($cacheVersionInfo)
    {
        $this->cacheVersionInfo = $cacheVersionInfo;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the PHP version.
<<<<<<< HEAD
     */
    public function getPhpVersion(): string
=======
     *
     * @return string The PHP version
     */
    public function getPhpVersion()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['php_version'];
    }

    /**
<<<<<<< HEAD
     * Gets the PHP version extra part.
     */
    public function getPhpVersionExtra(): ?string
    {
        return $this->data['php_version_extra'] ?? null;
    }

    /**
     * @return int The PHP architecture as number of bits (e.g. 32 or 64)
     */
    public function getPhpArchitecture(): int
    {
        return $this->data['php_architecture'];
    }

    public function getPhpIntlLocale(): string
    {
        return $this->data['php_intl_locale'];
    }

    public function getPhpTimezone(): string
    {
        return $this->data['php_timezone'];
=======
     * Gets the application name.
     *
     * @return string The application name
     */
    public function getAppName()
    {
        return $this->data['name'];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the environment.
<<<<<<< HEAD
     */
    public function getEnv(): string
=======
     *
     * @return string The environment
     */
    public function getEnv()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['env'];
    }

    /**
     * Returns true if the debug is enabled.
     *
<<<<<<< HEAD
     * @return bool|string true if debug is enabled, false otherwise or a string if no kernel was set
=======
     * @return bool true if debug is enabled, false otherwise
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function isDebug()
    {
        return $this->data['debug'];
    }

    /**
     * Returns true if the XDebug is enabled.
<<<<<<< HEAD
     */
    public function hasXDebug(): bool
=======
     *
     * @return bool true if XDebug is enabled, false otherwise
     */
    public function hasXDebug()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['xdebug_enabled'];
    }

    /**
<<<<<<< HEAD
     * Returns true if APCu is enabled.
     */
    public function hasApcu(): bool
    {
        return $this->data['apcu_enabled'];
=======
     * Returns true if EAccelerator is enabled.
     *
     * @return bool true if EAccelerator is enabled, false otherwise
     */
    public function hasEAccelerator()
    {
        return $this->data['eaccel_enabled'];
    }

    /**
     * Returns true if APC is enabled.
     *
     * @return bool true if APC is enabled, false otherwise
     */
    public function hasApc()
    {
        return $this->data['apc_enabled'];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns true if Zend OPcache is enabled.
<<<<<<< HEAD
     */
    public function hasZendOpcache(): bool
=======
     *
     * @return bool true if Zend OPcache is enabled, false otherwise
     */
    public function hasZendOpcache()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['zend_opcache_enabled'];
    }

<<<<<<< HEAD
=======
    /**
     * Returns true if XCache is enabled.
     *
     * @return bool true if XCache is enabled, false otherwise
     */
    public function hasXCache()
    {
        return $this->data['xcache_enabled'];
    }

    /**
     * Returns true if WinCache is enabled.
     *
     * @return bool true if WinCache is enabled, false otherwise
     */
    public function hasWinCache()
    {
        return $this->data['wincache_enabled'];
    }

    /**
     * Returns true if any accelerator is enabled.
     *
     * @return bool true if any accelerator is enabled, false otherwise
     */
    public function hasAccelerator()
    {
        return $this->hasApc() || $this->hasZendOpcache() || $this->hasEAccelerator() || $this->hasXCache() || $this->hasWinCache();
    }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getBundles()
    {
        return $this->data['bundles'];
    }

    /**
     * Gets the PHP SAPI name.
<<<<<<< HEAD
     */
    public function getSapiName(): string
=======
     *
     * @return string The environment
     */
    public function getSapiName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['sapi_name'];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName(): string
=======
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'config';
    }

    /**
     * Tries to retrieve information about the current Symfony version.
     *
     * @return string One of: dev, stable, eom, eol
     */
<<<<<<< HEAD
    private function determineSymfonyState(): string
    {
        $now = new \DateTime();
        $eom = \DateTime::createFromFormat('d/m/Y', '01/'.Kernel::END_OF_MAINTENANCE)->modify('last day of this month');
        $eol = \DateTime::createFromFormat('d/m/Y', '01/'.Kernel::END_OF_LIFE)->modify('last day of this month');
=======
    private function determineSymfonyState()
    {
        $now = new \DateTime();
        $eom = \DateTime::createFromFormat('m/Y', Kernel::END_OF_MAINTENANCE)->modify('last day of this month');
        $eol = \DateTime::createFromFormat('m/Y', Kernel::END_OF_LIFE)->modify('last day of this month');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if ($now > $eol) {
            $versionState = 'eol';
        } elseif ($now > $eom) {
            $versionState = 'eom';
        } elseif ('' !== Kernel::EXTRA_VERSION) {
            $versionState = 'dev';
        } else {
            $versionState = 'stable';
        }

        return $versionState;
    }
}
