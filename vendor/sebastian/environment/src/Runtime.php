<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of sebastian/environment.
=======
<?php
/*
 * This file is part of the Environment package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
=======

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
namespace SebastianBergmann\Environment;

/**
 * Utility class for HHVM/PHP environment handling.
 */
<<<<<<< HEAD
final class Runtime
=======
class Runtime
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
    private static $binary;

    /**
<<<<<<< HEAD
     * Returns true when Xdebug or PCOV is available or
     * the runtime used is PHPDBG.
     */
    public function canCollectCodeCoverage(): bool
    {
        return $this->hasXdebug() || $this->hasPCOV() || $this->hasPHPDBGCodeCoverage();
    }

    /**
     * Returns true when Zend OPcache is loaded, enabled, and is configured to discard comments.
     */
    public function discardsComments(): bool
    {
        if (!\extension_loaded('Zend OPcache')) {
            return false;
        }

        if (\ini_get('opcache.save_comments') !== '0') {
            return false;
        }

        if ((\PHP_SAPI === 'cli' || \PHP_SAPI === 'phpdbg') && \ini_get('opcache.enable_cli') === '1') {
            return true;
        }

        if (\PHP_SAPI !== 'cli' && \PHP_SAPI !== 'phpdbg' && \ini_get('opcache.enable') === '1') {
            return true;
        }

        return false;
=======
     * Returns true when Xdebug is supported or
     * the runtime used is PHPDBG (PHP >= 7.0).
     *
     * @return bool
     */
    public function canCollectCodeCoverage()
    {
        return $this->hasXdebug() || $this->hasPHPDBGCodeCoverage();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns the path to the binary of the current runtime.
     * Appends ' --php' to the path when the runtime is HHVM.
<<<<<<< HEAD
     */
    public function getBinary(): string
    {
        // HHVM
        if (self::$binary === null && $this->isHHVM()) {
            // @codeCoverageIgnoreStart
            if ((self::$binary = \getenv('PHP_BINARY')) === false) {
                self::$binary = \PHP_BINARY;
            }

            self::$binary = \escapeshellarg(self::$binary) . ' --php' .
                ' -d hhvm.php7.all=1';
            // @codeCoverageIgnoreEnd
        }

        if (self::$binary === null && \PHP_BINARY !== '') {
            self::$binary = \escapeshellarg(\PHP_BINARY);
        }

        if (self::$binary === null) {
            // @codeCoverageIgnoreStart
            $possibleBinaryLocations = [
                \PHP_BINDIR . '/php',
                \PHP_BINDIR . '/php-cli.exe',
                \PHP_BINDIR . '/php.exe',
            ];

            foreach ($possibleBinaryLocations as $binary) {
                if (\is_readable($binary)) {
                    self::$binary = \escapeshellarg($binary);

                    break;
                }
            }
            // @codeCoverageIgnoreEnd
        }

        if (self::$binary === null) {
            // @codeCoverageIgnoreStart
            self::$binary = 'php';
            // @codeCoverageIgnoreEnd
=======
     *
     * @return string
     */
    public function getBinary()
    {
        // HHVM
        if (self::$binary === null && $this->isHHVM()) {
            if ((self::$binary = getenv('PHP_BINARY')) === false) {
                self::$binary = PHP_BINARY;
            }

            self::$binary = escapeshellarg(self::$binary) . ' --php';
        }

        // PHP >= 5.4.0
        if (self::$binary === null && defined('PHP_BINARY')) {
            self::$binary = escapeshellarg(PHP_BINARY);
        }

        // PHP < 5.4.0
        if (self::$binary === null) {
            if (PHP_SAPI == 'cli' && isset($_SERVER['_'])) {
                if (strpos($_SERVER['_'], 'phpunit') !== false) {
                    $file = file($_SERVER['_']);

                    if (strpos($file[0], ' ') !== false) {
                        $tmp          = explode(' ', $file[0]);
                        self::$binary = escapeshellarg(trim($tmp[1]));
                    } else {
                        self::$binary = escapeshellarg(ltrim(trim($file[0]), '#!'));
                    }
                } elseif (strpos(basename($_SERVER['_']), 'php') !== false) {
                    self::$binary = escapeshellarg($_SERVER['_']);
                }
            }
        }

        if (self::$binary === null) {
            $possibleBinaryLocations = array(
                PHP_BINDIR . '/php',
                PHP_BINDIR . '/php-cli.exe',
                PHP_BINDIR . '/php.exe'
            );

            foreach ($possibleBinaryLocations as $binary) {
                if (is_readable($binary)) {
                    self::$binary = escapeshellarg($binary);
                    break;
                }
            }
        }

        if (self::$binary === null) {
            self::$binary = 'php';
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return self::$binary;
    }

<<<<<<< HEAD
    public function getNameWithVersion(): string
=======
    /**
     * @return string
     */
    public function getNameWithVersion()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->getName() . ' ' . $this->getVersion();
    }

<<<<<<< HEAD
    public function getNameWithVersionAndCodeCoverageDriver(): string
    {
        if (!$this->canCollectCodeCoverage() || $this->hasPHPDBGCodeCoverage()) {
            return $this->getNameWithVersion();
        }

        if ($this->hasXdebug()) {
            return \sprintf(
                '%s with Xdebug %s',
                $this->getNameWithVersion(),
                \phpversion('xdebug')
            );
        }

        if ($this->hasPCOV()) {
            return \sprintf(
                '%s with PCOV %s',
                $this->getNameWithVersion(),
                \phpversion('pcov')
            );
        }
    }

    public function getName(): string
    {
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return 'HHVM';
            // @codeCoverageIgnoreEnd
        }

        if ($this->isPHPDBG()) {
            // @codeCoverageIgnoreStart
            return 'PHPDBG';
            // @codeCoverageIgnoreEnd
        }

        return 'PHP';
    }

    public function getVendorUrl(): string
    {
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return 'http://hhvm.com/';
            // @codeCoverageIgnoreEnd
        }

        return 'https://secure.php.net/';
    }

    public function getVersion(): string
    {
        if ($this->isHHVM()) {
            // @codeCoverageIgnoreStart
            return HHVM_VERSION;
            // @codeCoverageIgnoreEnd
        }

        return \PHP_VERSION;
=======
    /**
     * @return string
     */
    public function getName()
    {
        if ($this->isHHVM()) {
            return 'HHVM';
        } elseif ($this->isPHPDBG()) {
            return 'PHPDBG';
        } else {
            return 'PHP';
        }
    }

    /**
     * @return string
     */
    public function getVendorUrl()
    {
        if ($this->isHHVM()) {
            return 'http://hhvm.com/';
        } else {
            return 'https://secure.php.net/';
        }
    }

    /**
     * @return string
     */
    public function getVersion()
    {
        if ($this->isHHVM()) {
            return HHVM_VERSION;
        } else {
            return PHP_VERSION;
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns true when the runtime used is PHP and Xdebug is loaded.
<<<<<<< HEAD
     */
    public function hasXdebug(): bool
    {
        return ($this->isPHP() || $this->isHHVM()) && \extension_loaded('xdebug');
=======
     *
     * @return bool
     */
    public function hasXdebug()
    {
        return ($this->isPHP() || $this->isHHVM()) && extension_loaded('xdebug');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns true when the runtime used is HHVM.
<<<<<<< HEAD
     */
    public function isHHVM(): bool
    {
        return \defined('HHVM_VERSION');
=======
     *
     * @return bool
     */
    public function isHHVM()
    {
        return defined('HHVM_VERSION');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns true when the runtime used is PHP without the PHPDBG SAPI.
<<<<<<< HEAD
     */
    public function isPHP(): bool
=======
     *
     * @return bool
     */
    public function isPHP()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return !$this->isHHVM() && !$this->isPHPDBG();
    }

    /**
     * Returns true when the runtime used is PHP with the PHPDBG SAPI.
<<<<<<< HEAD
     */
    public function isPHPDBG(): bool
    {
        return \PHP_SAPI === 'phpdbg' && !$this->isHHVM();
=======
     *
     * @return bool
     */
    public function isPHPDBG()
    {
        return PHP_SAPI === 'phpdbg' && !$this->isHHVM();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Returns true when the runtime used is PHP with the PHPDBG SAPI
     * and the phpdbg_*_oplog() functions are available (PHP >= 7.0).
<<<<<<< HEAD
     */
    public function hasPHPDBGCodeCoverage(): bool
    {
        return $this->isPHPDBG();
    }

    /**
     * Returns true when the runtime used is PHP with PCOV loaded and enabled
     */
    public function hasPCOV(): bool
    {
        return $this->isPHP() && \extension_loaded('pcov') && \ini_get('pcov.enabled');
    }

    /**
     * Parses the loaded php.ini file (if any) as well as all
     * additional php.ini files from the additional ini dir for
     * a list of all configuration settings loaded from files
     * at startup. Then checks for each php.ini setting passed
     * via the `$values` parameter whether this setting has
     * been changed at runtime. Returns an array of strings
     * where each string has the format `key=value` denoting
     * the name of a changed php.ini setting with its new value.
     *
     * @return string[]
     */
    public function getCurrentSettings(array $values): array
    {
        $diff  = [];
        $files = [];

        if ($file = \php_ini_loaded_file()) {
            $files[] = $file;
        }

        if ($scanned = \php_ini_scanned_files()) {
            $files = \array_merge(
                $files,
                \array_map(
                    'trim',
                    \explode(",\n", $scanned)
                )
            );
        }

        foreach ($files as $ini) {
            $config = \parse_ini_file($ini, true);

            foreach ($values as $value) {
                $set = \ini_get($value);

                if (isset($config[$value]) && $set != $config[$value]) {
                    $diff[] = \sprintf('%s=%s', $value, $set);
                }
            }
        }

        return $diff;
=======
     *
     * @return bool
     */
    public function hasPHPDBGCodeCoverage()
    {
        return $this->isPHPDBG() && function_exists('phpdbg_start_oplog');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
