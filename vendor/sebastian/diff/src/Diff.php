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
final class Diff
=======
/**
 */
class Diff
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var string
     */
    private $from;

    /**
     * @var string
     */
    private $to;

    /**
     * @var Chunk[]
     */
    private $chunks;

    /**
     * @param string  $from
     * @param string  $to
     * @param Chunk[] $chunks
     */
<<<<<<< HEAD
    public function __construct(string $from, string $to, array $chunks = [])
=======
    public function __construct($from, $to, array $chunks = array())
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->from   = $from;
        $this->to     = $to;
        $this->chunks = $chunks;
    }

<<<<<<< HEAD
    public function getFrom(): string
=======
    /**
     * @return string
     */
    public function getFrom()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->from;
    }

<<<<<<< HEAD
    public function getTo(): string
=======
    /**
     * @return string
     */
    public function getTo()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->to;
    }

    /**
     * @return Chunk[]
     */
<<<<<<< HEAD
    public function getChunks(): array
=======
    public function getChunks()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->chunks;
    }

    /**
     * @param Chunk[] $chunks
     */
<<<<<<< HEAD
    public function setChunks(array $chunks): void
=======
    public function setChunks(array $chunks)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->chunks = $chunks;
    }
}
