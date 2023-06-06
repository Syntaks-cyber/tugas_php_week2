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

use Symfony\Component\Translation\Exception\InvalidArgumentException;
use Symfony\Component\Translation\Exception\RuntimeException;
use Symfony\Component\Translation\MessageCatalogue;

/**
 * FileDumper is an implementation of DumperInterface that dump a message catalogue to file(s).
<<<<<<< HEAD
=======
 * Performs backup of already existing files.
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 *
 * Options:
 * - path (mandatory): the directory where the files should be saved
 *
 * @author Michel Salib <michelsalib@hotmail.com>
 */
abstract class FileDumper implements DumperInterface
{
    /**
     * A template for the relative paths to files.
     *
     * @var string
     */
    protected $relativePathTemplate = '%domain%.%locale%.%extension%';

    /**
<<<<<<< HEAD
=======
     * Make file backup before the dump.
     *
     * @var bool
     */
    private $backup = true;

    /**
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     * Sets the template for the relative paths to files.
     *
     * @param string $relativePathTemplate A template for the relative paths to files
     */
<<<<<<< HEAD
    public function setRelativePathTemplate(string $relativePathTemplate)
=======
    public function setRelativePathTemplate($relativePathTemplate)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->relativePathTemplate = $relativePathTemplate;
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function dump(MessageCatalogue $messages, array $options = [])
=======
     * Sets backup flag.
     *
     * @param bool $backup
     */
    public function setBackup($backup)
    {
        $this->backup = $backup;
    }

    /**
     * {@inheritdoc}
     */
    public function dump(MessageCatalogue $messages, $options = [])
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!\array_key_exists('path', $options)) {
            throw new InvalidArgumentException('The file dumper needs a path option.');
        }

        // save a file for each domain
        foreach ($messages->getDomains() as $domain) {
<<<<<<< HEAD
            $fullpath = $options['path'].'/'.$this->getRelativePath($domain, $messages->getLocale());
            if (!file_exists($fullpath)) {
=======
            // backup
            $fullpath = $options['path'].'/'.$this->getRelativePath($domain, $messages->getLocale());
            if (file_exists($fullpath)) {
                if ($this->backup) {
                    @trigger_error('Creating a backup while dumping a message catalogue is deprecated since Symfony 3.1 and will be removed in 4.0. Use TranslationWriter::disableBackup() to disable the backup.', \E_USER_DEPRECATED);
                    copy($fullpath, $fullpath.'~');
                }
            } else {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $directory = \dirname($fullpath);
                if (!file_exists($directory) && !@mkdir($directory, 0777, true)) {
                    throw new RuntimeException(sprintf('Unable to create directory "%s".', $directory));
                }
            }
<<<<<<< HEAD

            $intlDomain = $domain.MessageCatalogue::INTL_DOMAIN_SUFFIX;
            $intlMessages = $messages->all($intlDomain);

            if ($intlMessages) {
                $intlPath = $options['path'].'/'.$this->getRelativePath($intlDomain, $messages->getLocale());
                file_put_contents($intlPath, $this->formatCatalogue($messages, $intlDomain, $options));

                $messages->replace([], $intlDomain);

                try {
                    if ($messages->all($domain)) {
                        file_put_contents($fullpath, $this->formatCatalogue($messages, $domain, $options));
                    }
                    continue;
                } finally {
                    $messages->replace($intlMessages, $intlDomain);
                }
            }

=======
            // save file
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            file_put_contents($fullpath, $this->formatCatalogue($messages, $domain, $options));
        }
    }

    /**
     * Transforms a domain of a message catalogue to its string representation.
     *
<<<<<<< HEAD
     * @return string
     */
    abstract public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = []);
=======
     * @param string $domain
     *
     * @return string representation
     */
    abstract public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = []);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    /**
     * Gets the file extension of the dumper.
     *
<<<<<<< HEAD
     * @return string
=======
     * @return string file extension
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    abstract protected function getExtension();

    /**
     * Gets the relative file path using the template.
<<<<<<< HEAD
     */
    private function getRelativePath(string $domain, string $locale): string
=======
     *
     * @param string $domain The domain
     * @param string $locale The locale
     *
     * @return string The relative file path
     */
    private function getRelativePath($domain, $locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return strtr($this->relativePathTemplate, [
            '%domain%' => $domain,
            '%locale%' => $locale,
            '%extension%' => $this->getExtension(),
        ]);
    }
}
