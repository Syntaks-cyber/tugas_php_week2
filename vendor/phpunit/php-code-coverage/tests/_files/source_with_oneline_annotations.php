<?php

/** Docblock */
<<<<<<< HEAD
interface FooInterface
=======
interface Foo
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    public function bar();
}

class Foo
{
    public function bar()
    {
    }
}

function baz()
{
    // a one-line comment
    print '*'; // a one-line comment

    /* a one-line comment */
    print '*'; /* a one-line comment */

    /* a one-line comment
     */
    print '*'; /* a one-line comment
    */

    print '*'; // @codeCoverageIgnore

    print '*'; // @codeCoverageIgnoreStart
    print '*';
    print '*'; // @codeCoverageIgnoreEnd

    print '*';
}
