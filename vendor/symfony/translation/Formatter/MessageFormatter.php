<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Formatter;

<<<<<<< HEAD
use Symfony\Component\Translation\IdentityTranslator;
use Symfony\Contracts\Translation\TranslatorInterface;

// Help opcache.preload discover always-needed symbols
class_exists(IntlFormatter::class);
=======
use Symfony\Component\Translation\MessageSelector;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
 */
<<<<<<< HEAD
class MessageFormatter implements MessageFormatterInterface, IntlFormatterInterface
{
    private $translator;
    private $intlFormatter;

    /**
     * @param TranslatorInterface|null $translator An identity translator to use as selector for pluralization
     */
    public function __construct(TranslatorInterface $translator = null, IntlFormatterInterface $intlFormatter = null)
    {
        $this->translator = $translator ?? new IdentityTranslator();
        $this->intlFormatter = $intlFormatter ?? new IntlFormatter();
=======
class MessageFormatter implements MessageFormatterInterface, ChoiceMessageFormatterInterface
{
    private $selector;

    /**
     * @param MessageSelector|null $selector The message selector for pluralization
     */
    public function __construct(MessageSelector $selector = null)
    {
        $this->selector = $selector ?: new MessageSelector();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function format(string $message, string $locale, array $parameters = [])
    {
        if ($this->translator instanceof TranslatorInterface) {
            return $this->translator->trans($message, $parameters, null, $locale);
        }

=======
    public function format($message, $locale, array $parameters = [])
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return strtr($message, $parameters);
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function formatIntl(string $message, string $locale, array $parameters = []): string
    {
        return $this->intlFormatter->formatIntl($message, $locale, $parameters);
=======
    public function choiceFormat($message, $number, $locale, array $parameters = [])
    {
        $parameters = array_merge(['%count%' => $number], $parameters);

        return $this->format($this->selector->choose($message, (int) $number, $locale), $locale, $parameters);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
