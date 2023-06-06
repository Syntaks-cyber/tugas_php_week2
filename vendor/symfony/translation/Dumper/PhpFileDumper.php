<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Dumper;

use Symfony\Component\Translation\MessageCatalogue;

/**
 * PhpFileDumper generates PHP files from a message catalogue.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class PhpFileDumper extends FileDumper
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = [])
=======
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = [])
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return "<?php\n\nreturn ".var_export($messages->all($domain), true).";\n";
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'php';
    }
}
