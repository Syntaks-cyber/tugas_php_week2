<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\DataCollector;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\DataCollector\DataCollector;
use Symfony\Component\HttpKernel\DataCollector\LateDataCollectorInterface;
use Symfony\Component\Translation\DataCollectorTranslator;
use Symfony\Component\VarDumper\Cloner\Data;

/**
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
<<<<<<< HEAD
 *
 * @final
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 */
class TranslationDataCollector extends DataCollector implements LateDataCollectorInterface
{
    private $translator;

    public function __construct(DataCollectorTranslator $translator)
    {
        $this->translator = $translator;
    }

    /**
     * {@inheritdoc}
     */
    public function lateCollect()
    {
        $messages = $this->sanitizeCollectedMessages($this->translator->getCollectedMessages());

<<<<<<< HEAD
        $this->data += $this->computeCount($messages);
        $this->data['messages'] = $messages;

=======
        $this->data = $this->computeCount($messages);
        $this->data['messages'] = $messages;

        $this->data['locale'] = $this->translator->getLocale();
        $this->data['fallback_locales'] = $this->translator->getFallbackLocales();

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->data = $this->cloneVar($this->data);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        $this->data['locale'] = $this->translator->getLocale();
        $this->data['fallback_locales'] = $this->translator->getFallbackLocales();
=======
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        $this->data = [];
    }

    /**
     * @return array|Data
     */
    public function getMessages()
    {
<<<<<<< HEAD
        return $this->data['messages'] ?? [];
    }

    public function getCountMissings(): int
    {
        return $this->data[DataCollectorTranslator::MESSAGE_MISSING] ?? 0;
    }

    public function getCountFallbacks(): int
    {
        return $this->data[DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK] ?? 0;
    }

    public function getCountDefines(): int
    {
        return $this->data[DataCollectorTranslator::MESSAGE_DEFINED] ?? 0;
=======
        return isset($this->data['messages']) ? $this->data['messages'] : [];
    }

    /**
     * @return int
     */
    public function getCountMissings()
    {
        return isset($this->data[DataCollectorTranslator::MESSAGE_MISSING]) ? $this->data[DataCollectorTranslator::MESSAGE_MISSING] : 0;
    }

    /**
     * @return int
     */
    public function getCountFallbacks()
    {
        return isset($this->data[DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK]) ? $this->data[DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK] : 0;
    }

    /**
     * @return int
     */
    public function getCountDefines()
    {
        return isset($this->data[DataCollectorTranslator::MESSAGE_DEFINED]) ? $this->data[DataCollectorTranslator::MESSAGE_DEFINED] : 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function getLocale()
    {
        return !empty($this->data['locale']) ? $this->data['locale'] : null;
    }

<<<<<<< HEAD
    /**
     * @internal
     */
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    public function getFallbackLocales()
    {
        return (isset($this->data['fallback_locales']) && \count($this->data['fallback_locales']) > 0) ? $this->data['fallback_locales'] : [];
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getName(): string
=======
    public function getName()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return 'translation';
    }

<<<<<<< HEAD
    private function sanitizeCollectedMessages(array $messages)
=======
    private function sanitizeCollectedMessages($messages)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $result = [];
        foreach ($messages as $key => $message) {
            $messageId = $message['locale'].$message['domain'].$message['id'];

            if (!isset($result[$messageId])) {
                $message['count'] = 1;
                $message['parameters'] = !empty($message['parameters']) ? [$message['parameters']] : [];
                $messages[$key]['translation'] = $this->sanitizeString($message['translation']);
                $result[$messageId] = $message;
            } else {
                if (!empty($message['parameters'])) {
                    $result[$messageId]['parameters'][] = $message['parameters'];
                }

                ++$result[$messageId]['count'];
            }

            unset($messages[$key]);
        }

        return $result;
    }

<<<<<<< HEAD
    private function computeCount(array $messages)
=======
    private function computeCount($messages)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $count = [
            DataCollectorTranslator::MESSAGE_DEFINED => 0,
            DataCollectorTranslator::MESSAGE_MISSING => 0,
            DataCollectorTranslator::MESSAGE_EQUALS_FALLBACK => 0,
        ];

        foreach ($messages as $message) {
            ++$count[$message['state']];
        }

        return $count;
    }

<<<<<<< HEAD
    private function sanitizeString(string $string, int $length = 80)
=======
    private function sanitizeString($string, $length = 80)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $string = trim(preg_replace('/\s+/', ' ', $string));

        if (false !== $encoding = mb_detect_encoding($string, null, true)) {
            if (mb_strlen($string, $encoding) > $length) {
                return mb_substr($string, 0, $length - 3, $encoding).'...';
            }
        } elseif (\strlen($string) > $length) {
            return substr($string, 0, $length - 3).'...';
        }

        return $string;
    }
}
