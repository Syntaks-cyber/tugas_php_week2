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

use Symfony\Component\HttpKernel\CacheWarmer\WarmableInterface;
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
class DataCollectorTranslator implements TranslatorInterface, TranslatorBagInterface, LocaleAwareInterface, WarmableInterface
{
    public const MESSAGE_DEFINED = 0;
    public const MESSAGE_MISSING = 1;
    public const MESSAGE_EQUALS_FALLBACK = 2;

    private $translator;
    private $messages = [];

    /**
     * @param TranslatorInterface&TranslatorBagInterface&LocaleAwareInterface $translator
     */
    public function __construct(TranslatorInterface $translator)
    {
        if (!$translator instanceof TranslatorBagInterface || !$translator instanceof LocaleAwareInterface) {
            throw new InvalidArgumentException(sprintf('The Translator "%s" must implement TranslatorInterface, TranslatorBagInterface and LocaleAwareInterface.', get_debug_type($translator)));
=======
class DataCollectorTranslator implements TranslatorInterface, TranslatorBagInterface, WarmableInterface
{
    const MESSAGE_DEFINED = 0;
    const MESSAGE_MISSING = 1;
    const MESSAGE_EQUALS_FALLBACK = 2;

    /**
     * @var TranslatorInterface|TranslatorBagInterface
     */
    private $translator;

    private $messages = [];

    /**
     * @param TranslatorInterface $translator The translator must implement TranslatorBagInterface
     */
    public function __construct(TranslatorInterface $translator)
    {
        if (!$translator instanceof TranslatorBagInterface) {
            throw new InvalidArgumentException(sprintf('The Translator "%s" must implement TranslatorInterface and TranslatorBagInterface.', \get_class($translator)));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        $this->translator = $translator;
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
        $this->collectMessage($locale, $domain, $id, $trans, $parameters);

        return $trans;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setLocale(string $locale)
=======
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
        $trans = $this->translator->transChoice($id, $number, $parameters, $domain, $locale);
        $this->collectMessage($locale, $domain, $id, $trans, $parameters, $number);

        return $trans;
    }

    /**
     * {@inheritdoc}
     */
    public function setLocale($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->translator->setLocale($locale);
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
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getCatalogues(): array
    {
        return $this->translator->getCatalogues();
    }

    /**
     * {@inheritdoc}
     *
     * @return string[]
     */
    public function warmUp(string $cacheDir)
    {
        if ($this->translator instanceof WarmableInterface) {
            return (array) $this->translator->warmUp($cacheDir);
        }

        return [];
=======
    public function warmUp($cacheDir)
    {
        if ($this->translator instanceof WarmableInterface) {
            $this->translator->warmUp($cacheDir);
        }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the fallback locales.
     *
<<<<<<< HEAD
     * @return array
=======
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
     * @return array
     */
    public function getCollectedMessages()
    {
        return $this->messages;
    }

<<<<<<< HEAD
    private function collectMessage(?string $locale, ?string $domain, string $id, string $translation, ?array $parameters = [])
=======
    /**
     * @param string|null $locale
     * @param string|null $domain
     * @param string      $id
     * @param string      $translation
     * @param array|null  $parameters
     * @param int|null    $number
     */
    private function collectMessage($locale, $domain, $id, $translation, $parameters = [], $number = null)
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
        $locale = $catalogue->getLocale();
        $fallbackLocale = null;
        if ($catalogue->defines($id, $domain)) {
            $state = self::MESSAGE_DEFINED;
        } elseif ($catalogue->has($id, $domain)) {
            $state = self::MESSAGE_EQUALS_FALLBACK;

            $fallbackCatalogue = $catalogue->getFallbackCatalogue();
            while ($fallbackCatalogue) {
                if ($fallbackCatalogue->defines($id, $domain)) {
                    $fallbackLocale = $fallbackCatalogue->getLocale();
                    break;
                }
                $fallbackCatalogue = $fallbackCatalogue->getFallbackCatalogue();
            }
        } else {
            $state = self::MESSAGE_MISSING;
        }

        $this->messages[] = [
            'locale' => $locale,
            'fallbackLocale' => $fallbackLocale,
            'domain' => $domain,
            'id' => $id,
            'translation' => $translation,
            'parameters' => $parameters,
<<<<<<< HEAD
            'state' => $state,
            'transChoiceNumber' => isset($parameters['%count%']) && is_numeric($parameters['%count%']) ? $parameters['%count%'] : null,
=======
            'transChoiceNumber' => $number,
            'state' => $state,
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ];
    }
}
