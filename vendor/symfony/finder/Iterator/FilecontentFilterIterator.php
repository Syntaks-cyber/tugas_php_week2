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
 * FilecontentFilterIterator filters files by their contents using patterns (regexps or strings).
 *
 * @author Fabien Potencier  <fabien@symfony.com>
 * @author Włodzimierz Gajda <gajdaw@gajdaw.pl>
<<<<<<< HEAD
 *
 * @extends MultiplePcreFilterIterator<string, \SplFileInfo>
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class FilecontentFilterIterator extends MultiplePcreFilterIterator
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
        if (!$this->matchRegexps && !$this->noMatchRegexps) {
            return true;
        }

        $fileinfo = $this->current();

        if ($fileinfo->isDir() || !$fileinfo->isReadable()) {
            return false;
        }

        $content = $fileinfo->getContents();
        if (!$content) {
            return false;
        }

        return $this->isAccepted($content);
    }

    /**
     * Converts string to regexp if necessary.
     *
     * @param string $str Pattern: string or regexp
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
