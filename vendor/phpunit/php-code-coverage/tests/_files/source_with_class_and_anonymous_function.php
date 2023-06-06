<?php

class CoveredClassWithAnonymousFunctionInStaticMethod
{
    public static function runAnonymous()
    {
<<<<<<< HEAD
        $filter = ['abc124', 'abc123', '123'];
=======
        $filter = array('abc124', 'abc123', '123');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        array_walk(
            $filter,
            function (&$val, $key) {
                $val = preg_replace('|[^0-9]|', '', $val);
            }
        );

        // Should be covered
        $extravar = true;
    }
}
