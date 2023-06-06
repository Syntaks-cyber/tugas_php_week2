<?php

declare(strict_types=1);

namespace Doctrine\Inflector\Rules\Turkish;

use Doctrine\Inflector\Rules\Pattern;
use Doctrine\Inflector\Rules\Substitution;
use Doctrine\Inflector\Rules\Transformation;
use Doctrine\Inflector\Rules\Word;

class Inflectible
{
<<<<<<< HEAD
    /** @return Transformation[] */
=======
    /**
     * @return Transformation[]
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public static function getSingular(): iterable
    {
        yield new Transformation(new Pattern('/l[ae]r$/i'), '');
    }

<<<<<<< HEAD
    /** @return Transformation[] */
=======
    /**
     * @return Transformation[]
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public static function getPlural(): iterable
    {
        yield new Transformation(new Pattern('/([eöiü][^aoıueöiü]{0,6})$/u'), '\1ler');
        yield new Transformation(new Pattern('/([aoıu][^aoıueöiü]{0,6})$/u'), '\1lar');
    }

<<<<<<< HEAD
    /** @return Substitution[] */
=======
    /**
     * @return Substitution[]
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public static function getIrregular(): iterable
    {
        yield new Substitution(new Word('ben'), new Word('biz'));
        yield new Substitution(new Word('sen'), new Word('siz'));
        yield new Substitution(new Word('o'), new Word('onlar'));
    }
}
