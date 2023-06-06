<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Finder\Iterator;

/**
 * PathFilterIterator filters files by path patterns (e.g. some/special/dir).
 *
 * @author Fabien Potencier  <fabien@symfony.com>
 * @author Włodzimierz Gajda <gajdaw@gajdaw.pl>
<<<<<<< HEAD
 *
 * @extends MultiplePcreFilterIterator<string, \SplFileInfo>
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class PathFilterIterator extends MultiplePcreFilterIterator
{
    /**
     * Filters the iterator values.
     *
<<<<<<< HEAD
     * @return bool
     */
    #[\ReturnTypeWillChange]
=======
     * @return bool true if the value should be kept, false otherwise
     */
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function accept()
    {
        $filename = $this->current()->getRelativePathname();

<<<<<<< HEAD
        if ('\\' === \DIRECTORY_SEPARATOR) {
=======
        if ('\\' === DIRECTORY_SEPARATOR) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $filename = str_replace('\\', '/', $filename);
        }

        return $this->isAccepted($filename);
    }

    /**
     * Converts strings to regexp.
     *
     * PCRE patterns are left unchanged.
     *
     * Default conversion:
     *     'lorem/ipsum/dolor' ==>  'lorem\/ipsum\/dolor/'
     *
     * Use only / as directory separator (on Windows also).
     *
     * @param string $str Pattern: regexp or dirname
     *
<<<<<<< HEAD
     * @return string
     */
    protected function toRegex(string $str)
=======
     * @return string regexp corresponding to a given string or regexp
     */
    protected function toRegex($str)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->isRegex($str) ? $str : '/'.preg_quote($str, '/').'/';
    }
}
