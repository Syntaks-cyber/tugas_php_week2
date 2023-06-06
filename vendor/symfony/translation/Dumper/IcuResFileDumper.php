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
 * IcuResDumper generates an ICU ResourceBundle formatted string representation of a message catalogue.
 *
 * @author Stealth35
 */
class IcuResFileDumper extends FileDumper
{
    /**
     * {@inheritdoc}
     */
    protected $relativePathTemplate = '%domain%/%locale%.%extension%';

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function formatCatalogue(MessageCatalogue $messages, string $domain, array $options = [])
=======
    public function formatCatalogue(MessageCatalogue $messages, $domain, array $options = [])
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $data = $indexes = $resources = '';

        foreach ($messages->all($domain) as $source => $target) {
            $indexes .= pack('v', \strlen($data) + 28);
            $data .= $source."\0";
        }

        $data .= $this->writePadding($data);

        $keyTop = $this->getPosition($data);

        foreach ($messages->all($domain) as $source => $target) {
            $resources .= pack('V', $this->getPosition($data));

            $data .= pack('V', \strlen($target))
                .mb_convert_encoding($target."\0", 'UTF-16LE', 'UTF-8')
                .$this->writePadding($data)
<<<<<<< HEAD
            ;
=======
                  ;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $resOffset = $this->getPosition($data);

        $data .= pack('v', \count($messages->all($domain)))
            .$indexes
            .$this->writePadding($data)
            .$resources
<<<<<<< HEAD
        ;
=======
              ;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $bundleTop = $this->getPosition($data);

        $root = pack('V7',
            $resOffset + (2 << 28), // Resource Offset + Resource Type
            6,                      // Index length
            $keyTop,                        // Index keys top
            $bundleTop,                     // Index resources top
            $bundleTop,                     // Index bundle top
            \count($messages->all($domain)), // Index max table length
            0                               // Index attributes
        );

        $header = pack('vC2v4C12@32',
            32,                     // Header size
            0xDA, 0x27,             // Magic number 1 and 2
            20, 0, 0, 2,            // Rest of the header, ..., Size of a char
            0x52, 0x65, 0x73, 0x42, // Data format identifier
            1, 2, 0, 0,             // Data version
            1, 4, 0, 0              // Unicode version
        );

        return $header.$root.$data;
    }

<<<<<<< HEAD
    private function writePadding(string $data): ?string
=======
    private function writePadding($data)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $padding = \strlen($data) % 4;

        return $padding ? str_repeat("\xAA", 4 - $padding) : null;
    }

<<<<<<< HEAD
    private function getPosition(string $data)
=======
    private function getPosition($data)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return (\strlen($data) + 28) / 4;
    }

    /**
     * {@inheritdoc}
     */
    protected function getExtension()
    {
        return 'res';
    }
}
