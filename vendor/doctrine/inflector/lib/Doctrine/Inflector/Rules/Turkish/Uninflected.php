<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules\Turkish;

use Doctrine\Inflector\Rules\Pattern;

final class Uninflected
{
<<<<<<< HEAD
    /** @return Pattern[] */
=======
    /**
     * @return Pattern[]
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public static function getSingular(): iterable
    {
        yield from self::getDefault();
    }

<<<<<<< HEAD
    /** @return Pattern[] */
=======
    /**
     * @return Pattern[]
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public static function getPlural(): iterable
    {
        yield from self::getDefault();
    }

<<<<<<< HEAD
    /** @return Pattern[] */
=======
    /**
     * @return Pattern[]
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private static function getDefault(): iterable
    {
        yield new Pattern('lunes');
        yield new Pattern('rompecabezas');
        yield new Pattern('crisis');
    }
}
