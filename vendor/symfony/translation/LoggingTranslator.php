<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation;

use Psr\Log\LoggerInterface;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
<<<<<<< HEAD
use Symfony\Contracts\Translation\LocaleAwareInterface;
use Symfony\Contracts\Translation\TranslatorInterface;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * @author Abdellatif Ait boudad <a.aitboudad@gmail.com>
 */
<<<<<<< HEAD
class LoggingTranslator implements TranslatorInterface, TranslatorBagInterface, LocaleAwareInterface
{
    private $translator;
    private $logger;

    /**
     * @param TranslatorInterface&TranslatorBagInterface&LocaleAwareInterface $translator The translator must implement TranslatorBagInterface
     */
    public function __construct(TranslatorInterface $translator, LoggerInterface $logger)
    {
        if (!$translator instanceof TranslatorBagInterface || !$translator instanceof LocaleAwareInterface) {
            throw new InvalidArgumentException(sprintf('The Translator "%s" must implement TranslatorInterface, TranslatorBagInterface and LocaleAwareInterface.', get_debug_type($translator)));
=======
class LoggingTranslator implements TranslatorInterface, TranslatorBagInterface
{
    /**
     * @var TranslatorInterface|TranslatorBagInterface
     */
    private $translator;

    private $logger;

    /**
     * @param TranslatorInterface $translator The translator must implement TranslatorBagInterface
     */
    public function __construct(TranslatorInterface $translator, LoggerInterface $logger)
    {
        if (!$translator instanceof TranslatorBagInterface) {
            throw new InvalidArgumentException(sprintf('The Translator "%s" must implement TranslatorInterface and TranslatorBagInterface.', \get_class($translator)));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->translator = $translator;
        $this->logger = $logger;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function trans(?string $id, array $parameters = [], string $domain = null, string $locale = null)
    {
        $trans = $this->translator->trans($id = (string) $id, $parameters, $domain, $locale);
=======
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
        $trans = $this->translator->trans($id, $parameters, $domain, $locale);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $this->log($id, $domain, $locale);

        return $trans;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setLocale(string $locale)
    {
        $prev = $this->translator->getLocale();
        $this->translator->setLocale($locale);
        if ($prev === $locale) {
            return;
        }

        $this->logger->debug(sprintf('The locale of the translator has changed from "%s" to "%s".', $prev, $locale));
=======
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
        $trans = $this->translator->transChoice($id, $number, $parameters, $domain, $locale);
        $this->log($id, $domain, $locale);

        return $trans;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
    {
        $this->translator->setLocale($locale);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale()
    {
        return $this->translator->getLocale();
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getCatalogue(string $locale = null)
=======
    public function getCatalogue($locale = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->translator->getCatalogue($locale);
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function getCatalogues(): array
    {
        return $this->translator->getCatalogues();
    }

    /**
     * Gets the fallback locales.
     *
     * @return array
=======
     * Gets the fallback locales.
     *
     * @return array The fallback locales
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    public function getFallbackLocales()
    {
        if ($this->translator instanceof Translator || method_exists($this->translator, 'getFallbackLocales')) {
            return $this->translator->getFallbackLocales();
        }

        return [];
    }

    /**
     * Passes through all unknown calls onto the translator object.
     */
<<<<<<< HEAD
    public function __call(string $method, array $args)
    {
        return $this->translator->{$method}(...$args);
=======
    public function __call($method, $args)
    {
        return \call_user_func_array([$this->translator, $method], $args);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Logs for missing translations.
<<<<<<< HEAD
     */
    private function log(string $id, ?string $domain, ?string $locale)
=======
     *
     * @param string      $id
     * @param string|null $domain
     * @param string|null $locale
     */
    private function log($id, $domain, $locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $domain) {
            $domain = 'messages';
        }

<<<<<<< HEAD
=======
        $id = (string) $id;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $catalogue = $this->translator->getCatalogue($locale);
        if ($catalogue->defines($id, $domain)) {
            return;
        }

        if ($catalogue->has($id, $domain)) {
            $this->logger->debug('Translation use fallback catalogue.', ['id' => $id, 'domain' => $domain, 'locale' => $catalogue->getLocale()]);
        } else {
            $this->logger->warning('Translation not found.', ['id' => $id, 'domain' => $domain, 'locale' => $catalogue->getLocale()]);
        }
    }
}
