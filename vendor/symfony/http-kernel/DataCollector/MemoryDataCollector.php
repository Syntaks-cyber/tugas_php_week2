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

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

/**
<<<<<<< HEAD
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
=======
 * MemoryDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class MemoryDataCollector extends DataCollector implements LateDataCollectorInterface
{
    public function __construct()
    {
<<<<<<< HEAD
        $this->reset();
=======
        $this->data = array(
            'memory' => 0,
            'memory_limit' => $this->convertToBytes(ini_get('memory_limit')),
        );
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
=======
    public function collect(Request $request, Response $response, \Exception $exception = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->updateMemoryUsage();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function reset()
    {
        $this->data = [
            'memory' => 0,
            'memory_limit' => $this->convertToBytes(\ini_get('memory_limit')),
        ];
    }

    /**
     * {@inheritdoc}
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function lateCollect()
    {
        $this->updateMemoryUsage();
    }

<<<<<<< HEAD
    public function getMemory(): int
=======
    /**
     * Gets the memory.
     *
     * @return int The memory
     */
    public function getMemory()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->data['memory'];
    }

    /**
<<<<<<< HEAD
     * @return int|float
=======
     * Gets the PHP memory limit.
     *
     * @return int The memory limit
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getMemoryLimit()
    {
        return $this->data['memory_limit'];
    }

<<<<<<< HEAD
=======
    /**
     * Updates the memory usage data.
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function updateMemoryUsage()
    {
        $this->data['memory'] = memory_get_peak_usage(true);
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
        return 'memory';
    }

<<<<<<< HEAD
    /**
     * @return int|float
     */
    private function convertToBytes(string $memoryLimit)
=======
    private function convertToBytes($memoryLimit)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if ('-1' === $memoryLimit) {
            return -1;
        }

        $memoryLimit = strtolower($memoryLimit);
        $max = strtolower(ltrim($memoryLimit, '+'));
<<<<<<< HEAD
        if (str_starts_with($max, '0x')) {
            $max = \intval($max, 16);
        } elseif (str_starts_with($max, '0')) {
            $max = \intval($max, 8);
=======
        if (0 === strpos($max, '0x')) {
            $max = intval($max, 16);
        } elseif (0 === strpos($max, '0')) {
            $max = intval($max, 8);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        } else {
            $max = (int) $max;
        }

        switch (substr($memoryLimit, -1)) {
            case 't': $max *= 1024;
<<<<<<< HEAD
            // no break
            case 'g': $max *= 1024;
            // no break
            case 'm': $max *= 1024;
            // no break
=======
            case 'g': $max *= 1024;
            case 'm': $max *= 1024;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            case 'k': $max *= 1024;
        }

        return $max;
    }
}
