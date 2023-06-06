<<<<<<< HEAD
<?php declare(strict_types=1);
=======
<?php
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace PHPUnit\Util;

use const ENT_SUBSTITUTE;
use const PHP_SAPI;
use function assert;
use function count;
use function dirname;
use function explode;
use function fclose;
use function fflush;
use function flush;
use function fopen;
use function fsockopen;
use function fwrite;
use function htmlspecialchars;
use function is_resource;
use function is_string;
use function sprintf;
use function str_replace;
use function strncmp;
use function strpos;
use PHPUnit\Framework\Exception;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
class Printer
=======

/**
 * Utility class that can print to STDOUT or write to a file.
 *
 * @since Class available since Release 2.0.0
 */
class PHPUnit_Util_Printer
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * If true, flush output after every write.
     *
     * @var bool
     */
    protected $autoFlush = false;

    /**
<<<<<<< HEAD
     * @psalm-var resource|closed-resource
=======
     * @var resource
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected $out;

    /**
     * @var string
     */
    protected $outTarget;

    /**
<<<<<<< HEAD
     * Constructor.
     *
     * @param null|resource|string $out
     *
     * @throws Exception
     */
    public function __construct($out = null)
    {
        if ($out === null) {
            return;
        }

        if (is_string($out) === false) {
            $this->out = $out;

            return;
        }

        if (strpos($out, 'socket://') === 0) {
            $out = explode(':', str_replace('socket://', '', $out));

            if (count($out) !== 2) {
                throw new Exception;
            }

            $this->out = fsockopen($out[0], $out[1]);
        } else {
            if (strpos($out, 'php://') === false && !Filesystem::createDirectory(dirname($out))) {
                throw new Exception(sprintf('Directory "%s" was not created', dirname($out)));
            }

            $this->out = fopen($out, 'wt');
        }

        $this->outTarget = $out;
    }

    /**
     * Flush buffer and close output if it's not to a PHP stream.
     */
    public function flush(): void
    {
        if ($this->out && strncmp($this->outTarget, 'php://', 6) !== 0) {
            assert(is_resource($this->out));

            fclose($this->out);
        }
=======
     * @var bool
     */
    protected $printsHTML = false;

    /**
     * Constructor.
     *
     * @param mixed $out
     *
     * @throws PHPUnit_Framework_Exception
     */
    public function __construct($out = null)
    {
        if ($out !== null) {
            if (is_string($out)) {
                if (strpos($out, 'socket://') === 0) {
                    $out = explode(':', str_replace('socket://', '', $out));

                    if (sizeof($out) != 2) {
                        throw new PHPUnit_Framework_Exception;
                    }

                    $this->out = fsockopen($out[0], $out[1]);
                } else {
                    if (strpos($out, 'php://') === false &&
                        !is_dir(dirname($out))) {
                        mkdir(dirname($out), 0777, true);
                    }

                    $this->out = fopen($out, 'wt');
                }

                $this->outTarget = $out;
            } else {
                $this->out = $out;
            }
        }
    }

    /**
     * Flush buffer, optionally tidy up HTML, and close output if it's not to a php stream
     */
    public function flush()
    {
        if ($this->out && strncmp($this->outTarget, 'php://', 6) !== 0) {
            fclose($this->out);
        }

        if ($this->printsHTML === true &&
            $this->outTarget !== null &&
            strpos($this->outTarget, 'php://') !== 0 &&
            strpos($this->outTarget, 'socket://') !== 0 &&
            extension_loaded('tidy')) {
            file_put_contents(
                $this->outTarget,
                tidy_repair_file(
                    $this->outTarget,
                    array('indent' => true, 'wrap' => 0),
                    'utf8'
                )
            );
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Performs a safe, incremental flush.
     *
     * Do not confuse this function with the flush() function of this class,
     * since the flush() function may close the file being written to, rendering
     * the current object no longer usable.
<<<<<<< HEAD
     */
    public function incrementalFlush(): void
    {
        if ($this->out) {
            assert(is_resource($this->out));

=======
     *
     * @since  Method available since Release 3.3.0
     */
    public function incrementalFlush()
    {
        if ($this->out) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            fflush($this->out);
        } else {
            flush();
        }
    }

<<<<<<< HEAD
    public function write(string $buffer): void
    {
        if ($this->out) {
            assert(is_resource($this->out));

=======
    /**
     * @param string $buffer
     */
    public function write($buffer)
    {
        if ($this->out) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            fwrite($this->out, $buffer);

            if ($this->autoFlush) {
                $this->incrementalFlush();
            }
        } else {
<<<<<<< HEAD
            if (PHP_SAPI !== 'cli' && PHP_SAPI !== 'phpdbg') {
=======
            if (PHP_SAPI != 'cli' && PHP_SAPI != 'phpdbg') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $buffer = htmlspecialchars($buffer, ENT_SUBSTITUTE);
            }

            print $buffer;

            if ($this->autoFlush) {
                $this->incrementalFlush();
            }
        }
    }

    /**
     * Check auto-flush mode.
<<<<<<< HEAD
     */
    public function getAutoFlush(): bool
=======
     *
     * @return bool
     *
     * @since  Method available since Release 3.3.0
     */
    public function getAutoFlush()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->autoFlush;
    }

    /**
     * Set auto-flushing mode.
     *
     * If set, *incremental* flushes will be done after each write. This should
     * not be confused with the different effects of this class' flush() method.
<<<<<<< HEAD
     */
    public function setAutoFlush(bool $autoFlush): void
    {
        $this->autoFlush = $autoFlush;
=======
     *
     * @param bool $autoFlush
     *
     * @since  Method available since Release 3.3.0
     */
    public function setAutoFlush($autoFlush)
    {
        if (is_bool($autoFlush)) {
            $this->autoFlush = $autoFlush;
        } else {
            throw PHPUnit_Util_InvalidArgumentHelper::factory(1, 'boolean');
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
