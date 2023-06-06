<<<<<<< HEAD
<?php declare(strict_types=1);
/*
 * This file is part of sebastian/diff.
=======
<?php
/*
 * This file is part of the Diff package.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace SebastianBergmann\Diff;

<<<<<<< HEAD
final class Chunk
=======
/**
 */
class Chunk
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var int
     */
    private $start;

    /**
     * @var int
     */
    private $startRange;

    /**
     * @var int
     */
    private $end;
<<<<<<< HEAD

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * @var int
     */
    private $endRange;

    /**
<<<<<<< HEAD
     * @var Line[]
     */
    private $lines;

    public function __construct(int $start = 0, int $startRange = 1, int $end = 0, int $endRange = 1, array $lines = [])
    {
        $this->start      = $start;
        $this->startRange = $startRange;
        $this->end        = $end;
        $this->endRange   = $endRange;
        $this->lines      = $lines;
    }

    public function getStart(): int
=======
     * @var array
     */
    private $lines;

    /**
     * @param int   $start
     * @param int   $startRange
     * @param int   $end
     * @param int   $endRange
     * @param array $lines
     */
    public function __construct($start = 0, $startRange = 1, $end = 0, $endRange = 1, array $lines = array())
    {
        $this->start      = (int) $start;
        $this->startRange = (int) $startRange;
        $this->end        = (int) $end;
        $this->endRange   = (int) $endRange;
        $this->lines      = $lines;
    }

    /**
     * @return int
     */
    public function getStart()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->start;
    }

<<<<<<< HEAD
    public function getStartRange(): int
=======
    /**
     * @return int
     */
    public function getStartRange()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->startRange;
    }

<<<<<<< HEAD
    public function getEnd(): int
=======
    /**
     * @return int
     */
    public function getEnd()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->end;
    }

<<<<<<< HEAD
    public function getEndRange(): int
=======
    /**
     * @return int
     */
    public function getEndRange()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->endRange;
    }

    /**
<<<<<<< HEAD
     * @return Line[]
     */
    public function getLines(): array
=======
     * @return array
     */
    public function getLines()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->lines;
    }

    /**
<<<<<<< HEAD
     * @param Line[] $lines
     */
    public function setLines(array $lines): void
    {
        foreach ($lines as $line) {
            if (!$line instanceof Line) {
                throw new InvalidArgumentException;
            }
        }

=======
     * @param array $lines
     */
    public function setLines(array $lines)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->lines = $lines;
    }
}
