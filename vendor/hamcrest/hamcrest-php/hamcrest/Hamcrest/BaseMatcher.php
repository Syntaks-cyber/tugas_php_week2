<?php
namespace Hamcrest;

/*
 Copyright (c) 2009 hamcrest.org
 */

/**
 * BaseClass for all Matcher implementations.
 *
 * @see Hamcrest\Matcher
 */
abstract class BaseMatcher implements Matcher
{

    public function describeMismatch($item, Description $description)
    {
        $description->appendText('was ')->appendValue($item);
    }

    public function __toString()
    {
        return StringDescription::toString($this);
    }
<<<<<<< HEAD

    public function __invoke()
    {
        return call_user_func_array(array($this, 'matches'), func_get_args());
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
