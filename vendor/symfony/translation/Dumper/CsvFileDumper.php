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
 * CsvFileDumper generates a csv formatted string representation of a message catalogue.
 *
 * @author Stealth35
 */
class CsvFileDumper extends FileDumper
{
    private $delimiter = ';';
    private $enclosure = '"';

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = [])
    {
        $handle = fopen('php://memory', 'r+');
=======
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = [])
    {
        $handle = fopen('php://memory', 'r+b');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($messages->all($domain) as $source => $target) {
            fputcsv($handle, [$source, $target], $this->delimiter, $this->enclosure);
        }

        rewind($handle);
        $output = stream_get_contents($handle);
        fclose($handle);

        return $output;
    }

    /**
     * Sets the delimiter and escape character for CSV.
<<<<<<< HEAD
     */
    public function setCsvControl(string $delimiter = ';', string $enclosure = '"')
=======
     *
     * @param string $delimiter Delimiter character
     * @param string $enclosure Enclosure character
     */
    public function setCsvControl($delimiter = ';', $enclosure = '"')
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->delimiter = $delimiter;
        $this->enclosure = $enclosure;
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'csv';
    }
}
