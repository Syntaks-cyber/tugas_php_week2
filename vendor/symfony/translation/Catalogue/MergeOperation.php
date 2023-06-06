<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Catalogue;

<<<<<<< HEAD
use Symfony\Component\Translation\MessageCatalogueInterface;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/**
 * Merge operation between two catalogues as follows:
 * all = source ∪ target = {x: x ∈ source ∨ x ∈ target}
 * new = all ∖ source = {x: x ∈ target ∧ x ∉ source}
 * obsolete = source ∖ all = {x: x ∈ source ∧ x ∉ source ∧ x ∉ target} = ∅
 * Basically, the result contains messages from both catalogues.
 *
 * @author Jean-François Simon <contact@jfsimon.fr>
 */
class MergeOperation extends AbstractOperation
{
    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    protected function processDomain(string $domain)
=======
    protected function processDomain($domain)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->messages[$domain] = [
            'all' => [],
            'new' => [],
            'obsolete' => [],
        ];
<<<<<<< HEAD
        $intlDomain = $domain.MessageCatalogueInterface::INTL_DOMAIN_SUFFIX;

        foreach ($this->source->all($domain) as $id => $message) {
            $this->messages[$domain]['all'][$id] = $message;
            $d = $this->source->defines($id, $intlDomain) ? $intlDomain : $domain;
            $this->result->add([$id => $message], $d);
            if (null !== $keyMetadata = $this->source->getMetadata($id, $d)) {
                $this->result->setMetadata($id, $keyMetadata, $d);
=======

        foreach ($this->source->all($domain) as $id => $message) {
            $this->messages[$domain]['all'][$id] = $message;
            $this->result->add([$id => $message], $domain);
            if (null !== $keyMetadata = $this->source->getMetadata($id, $domain)) {
                $this->result->setMetadata($id, $keyMetadata, $domain);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }

        foreach ($this->target->all($domain) as $id => $message) {
            if (!$this->source->has($id, $domain)) {
                $this->messages[$domain]['all'][$id] = $message;
                $this->messages[$domain]['new'][$id] = $message;
<<<<<<< HEAD
                $d = $this->target->defines($id, $intlDomain) ? $intlDomain : $domain;
                $this->result->add([$id => $message], $d);
                if (null !== $keyMetadata = $this->target->getMetadata($id, $d)) {
                    $this->result->setMetadata($id, $keyMetadata, $d);
=======
                $this->result->add([$id => $message], $domain);
                if (null !== $keyMetadata = $this->target->getMetadata($id, $domain)) {
                    $this->result->setMetadata($id, $keyMetadata, $domain);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            }
        }
    }
}
