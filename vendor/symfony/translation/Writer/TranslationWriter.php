<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Writer;

use Symfony\Component\Translation\Dumper\DumperInterface;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Component\Translation\Exception\RuntimeException;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * TranslationWriter writes translation messages.
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
class TranslationWriter implements TranslationWriterInterface
{
<<<<<<< HEAD
    /**
     * @var array<string, DumperInterface>
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    private $dumpers = [];

    /**
     * Adds a dumper to the writer.
<<<<<<< HEAD
     */
    public function addDumper(string $format, DumperInterface $dumper)
=======
     *
     * @param string          $format The format of the dumper
     * @param DumperInterface $dumper The dumper
     */
    public function addDumper($format, DumperInterface $dumper)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->dumpers[$format] = $dumper;
    }

    /**
<<<<<<< HEAD
=======
     * Disables dumper backup.
     */
    public function disableBackup()
    {
        foreach ($this->dumpers as $dumper) {
            if (method_exists($dumper, 'setBackup')) {
                $dumper->setBackup(false);
            }
        }
    }

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Obtains the list of supported formats.
     *
     * @return array
     */
    public function getFormats()
    {
        return array_keys($this->dumpers);
    }

    /**
     * Writes translation from the catalogue according to the selected format.
     *
<<<<<<< HEAD
     * @param string $format  The format to use to dump the messages
     * @param array  $options Options that are passed to the dumper
     *
     * @throws InvalidArgumentException
     */
    public function write(MessageCatalogue $catalogue, string $format, array $options = [])
=======
     * @param MessageCatalogue $catalogue The message catalogue to write
     * @param string           $format    The format to use to dump the messages
     * @param array            $options   Options that are passed to the dumper
     *
     * @throws InvalidArgumentException
     */
    public function write(MessageCatalogue $catalogue, $format, $options = [])
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!isset($this->dumpers[$format])) {
            throw new InvalidArgumentException(sprintf('There is no dumper associated with format "%s".', $format));
        }

        // get the right dumper
        $dumper = $this->dumpers[$format];

        if (isset($options['path']) && !is_dir($options['path']) && !@mkdir($options['path'], 0777, true) && !is_dir($options['path'])) {
            throw new RuntimeException(sprintf('Translation Writer was not able to create directory "%s".', $options['path']));
        }

        // save
        $dumper->dump($catalogue, $options);
    }
<<<<<<< HEAD
=======

    /**
     * Writes translation from the catalogue according to the selected format.
     *
     * @param MessageCatalogue $catalogue The message catalogue to write
     * @param string           $format    The format to use to dump the messages
     * @param array            $options   Options that are passed to the dumper
     *
     * @throws InvalidArgumentException
     *
     * @deprecated since 3.4 will be removed in 4.0. Use write instead.
     */
    public function writeTranslations(MessageCatalogue $catalogue, $format, $options = [])
    {
        @trigger_error(sprintf('The "%s()" method is deprecated since Symfony 3.4 and will be removed in 4.0. Use write() instead.', __METHOD__), \E_USER_DEPRECATED);
        $this->write($catalogue, $format, $options);
    }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
