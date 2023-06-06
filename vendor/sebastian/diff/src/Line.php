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
final class Line
{
    public const ADDED     = 1;
    public const REMOVED   = 2;
    public const UNCHANGED = 3;
=======
/**
 */
class Line
{
    const ADDED     = 1;
    const REMOVED   = 2;
    const UNCHANGED = 3;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * @var int
     */
    private $type;

    /**
     * @var string
     */
    private $content;

<<<<<<< HEAD
    public function __construct(int $type = self::UNCHANGED, string $content = '')
=======
    /**
     * @param int    $type
     * @param string $content
     */
    public function __construct($type = self::UNCHANGED, $content = '')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->type    = $type;
        $this->content = $content;
    }

<<<<<<< HEAD
    public function getContent(): string
=======
    /**
     * @return string
     */
    public function getContent()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->content;
    }

<<<<<<< HEAD
    public function getType(): int
=======
    /**
     * @return int
     */
    public function getType()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->type;
    }
}
