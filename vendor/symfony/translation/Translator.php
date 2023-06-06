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

use Symfony\Component\Config\ConfigCacheFactory;
use Symfony\Component\Config\ConfigCacheFactoryInterface;
use Symfony\Component\Config\ConfigCacheInterface;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
<<<<<<< HEAD
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Translation\Exception\RuntimeException;
use Symfony\Component\Translation\Formatter\IntlFormatterInterface;
use Symfony\Component\Translation\Formatter\MessageFormatter;
use Symfony\Component\Translation\Formatter\MessageFormatterInterface;
use Symfony\Component\Translation\Loader\LoaderInterface;
use Symfony\Contracts\Translation\LocaleAwareInterface;
use Symfony\Contracts\Translation\TranslatorInterface;

// Help opcache.preload discover always-needed symbols
class_exists(MessageCatalogue::class);
=======
use Symfony\Component\Translation\Exception\LogicException;
use Symfony\Component\Translation\Exception\NotFoundResourceException;
use Symfony\Component\Translation\Exception\RuntimeException;
use Symfony\Component\Translation\Formatter\ChoiceMessageFormatterInterface;
use Symfony\Component\Translation\Formatter\MessageFormatter;
use Symfony\Component\Translation\Formatter\MessageFormatterInterface;
use Symfony\Component\Translation\Loader\LoaderInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * @author Fabien Potencier <fabien@symfony.com>
 */
<<<<<<< HEAD
class Translator implements TranslatorInterface, TranslatorBagInterface, LocaleAwareInterface
=======
class Translator implements TranslatorInterface, TranslatorBagInterface
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    /**
     * @var MessageCatalogueInterface[]
     */
    protected $catalogues = [];

    /**
     * @var string
     */
    private $locale;

    /**
<<<<<<< HEAD
     * @var string[]
=======
     * @var array
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    private $fallbackLocales = [];

    /**
     * @var LoaderInterface[]
     */
    private $loaders = [];

    /**
     * @var array
     */
    private $resources = [];

    /**
     * @var MessageFormatterInterface
     */
    private $formatter;

    /**
     * @var string
     */
    private $cacheDir;

    /**
     * @var bool
     */
    private $debug;

<<<<<<< HEAD
    private $cacheVary;

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    /**
     * @var ConfigCacheFactoryInterface|null
     */
    private $configCacheFactory;

    /**
<<<<<<< HEAD
     * @var array|null
     */
    private $parentLocales;

    private $hasIntlFormatter;

    /**
     * @throws InvalidArgumentException If a locale contains invalid characters
     */
    public function __construct(string $locale, MessageFormatterInterface $formatter = null, string $cacheDir = null, bool $debug = false, array $cacheVary = [])
    {
        $this->setLocale($locale);

        if (null === $formatter) {
=======
     * @param string                         $locale    The locale
     * @param MessageFormatterInterface|null $formatter The message formatter
     * @param string|null                    $cacheDir  The directory to use for the cache
     * @param bool                           $debug     Use cache in debug mode ?
     *
     * @throws InvalidArgumentException If a locale contains invalid characters
     */
    public function __construct($locale, $formatter = null, $cacheDir = null, $debug = false)
    {
        $this->setLocale($locale);

        if ($formatter instanceof MessageSelector) {
            $formatter = new MessageFormatter($formatter);
            @trigger_error(sprintf('Passing a "%s" instance into the "%s()" method as a second argument is deprecated since Symfony 3.4 and will be removed in 4.0. Inject a "%s" implementation instead.', MessageSelector::class, __METHOD__, MessageFormatterInterface::class), \E_USER_DEPRECATED);
        } elseif (null === $formatter) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $formatter = new MessageFormatter();
        }

        $this->formatter = $formatter;
        $this->cacheDir = $cacheDir;
        $this->debug = $debug;
<<<<<<< HEAD
        $this->cacheVary = $cacheVary;
        $this->hasIntlFormatter = $formatter instanceof IntlFormatterInterface;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function setConfigCacheFactory(ConfigCacheFactoryInterface $configCacheFactory)
    {
        $this->configCacheFactory = $configCacheFactory;
    }

    /**
     * Adds a Loader.
     *
<<<<<<< HEAD
     * @param string $format The name of the loader (@see addResource())
     */
    public function addLoader(string $format, LoaderInterface $loader)
=======
     * @param string          $format The name of the loader (@see addResource())
     * @param LoaderInterface $loader A LoaderInterface instance
     */
    public function addLoader($format, LoaderInterface $loader)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->loaders[$format] = $loader;
    }

    /**
     * Adds a Resource.
     *
     * @param string $format   The name of the loader (@see addLoader())
     * @param mixed  $resource The resource name
<<<<<<< HEAD
     *
     * @throws InvalidArgumentException If the locale contains invalid characters
     */
    public function addResource(string $format, $resource, string $locale, string $domain = null)
=======
     * @param string $locale   The locale
     * @param string $domain   The domain
     *
     * @throws InvalidArgumentException If the locale contains invalid characters
     */
    public function addResource($format, $resource, $locale, $domain = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $domain) {
            $domain = 'messages';
        }

        $this->assertValidLocale($locale);
<<<<<<< HEAD
        $locale ?: $locale = class_exists(\Locale::class) ? \Locale::getDefault() : 'en';
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $this->resources[$locale][] = [$format, $resource, $domain];

        if (\in_array($locale, $this->fallbackLocales)) {
            $this->catalogues = [];
        } else {
            unset($this->catalogues[$locale]);
        }
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function setLocale(string $locale)
=======
    public function setLocale($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->assertValidLocale($locale);
        $this->locale = $locale;
    }

    /**
     * {@inheritdoc}
     */
    public function getLocale()
    {
<<<<<<< HEAD
        return $this->locale ?: (class_exists(\Locale::class) ? \Locale::getDefault() : 'en');
=======
        return $this->locale;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Sets the fallback locales.
     *
<<<<<<< HEAD
     * @param string[] $locales
=======
     * @param array $locales The fallback locales
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     *
     * @throws InvalidArgumentException If a locale contains invalid characters
     */
    public function setFallbackLocales(array $locales)
    {
        // needed as the fallback locales are linked to the already loaded catalogues
        $this->catalogues = [];

        foreach ($locales as $locale) {
            $this->assertValidLocale($locale);
        }

<<<<<<< HEAD
        $this->fallbackLocales = $this->cacheVary['fallback_locales'] = $locales;
=======
        $this->fallbackLocales = $locales;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Gets the fallback locales.
     *
<<<<<<< HEAD
     * @internal
     */
    public function getFallbackLocales(): array
=======
     * @return array The fallback locales
     */
    public function getFallbackLocales()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        return $this->fallbackLocales;
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function trans(?string $id, array $parameters = [], string $domain = null, string $locale = null)
    {
        if (null === $id || '' === $id) {
            return '';
=======
    public function trans($id, array $parameters = [], $domain = null, $locale = null)
    {
        if (null === $domain) {
            $domain = 'messages';
        }

        return $this->formatter->format($this->getCatalogue($locale)->get((string) $id, $domain), $locale, $parameters);
    }

    /**
     * {@inheritdoc}
     */
    public function transChoice($id, $number, array $parameters = [], $domain = null, $locale = null)
    {
        if (!$this->formatter instanceof ChoiceMessageFormatterInterface) {
            throw new LogicException(sprintf('The formatter "%s" does not support plural translations.', \get_class($this->formatter)));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        if (null === $domain) {
            $domain = 'messages';
        }

<<<<<<< HEAD
=======
        $id = (string) $id;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        $catalogue = $this->getCatalogue($locale);
        $locale = $catalogue->getLocale();
        while (!$catalogue->defines($id, $domain)) {
            if ($cat = $catalogue->getFallbackCatalogue()) {
                $catalogue = $cat;
                $locale = $catalogue->getLocale();
            } else {
                break;
            }
        }

<<<<<<< HEAD
        $len = \strlen(MessageCatalogue::INTL_DOMAIN_SUFFIX);
        if ($this->hasIntlFormatter
            && ($catalogue->defines($id, $domain.MessageCatalogue::INTL_DOMAIN_SUFFIX)
            || (\strlen($domain) > $len && 0 === substr_compare($domain, MessageCatalogue::INTL_DOMAIN_SUFFIX, -$len, $len)))
        ) {
            return $this->formatter->formatIntl($catalogue->get($id, $domain), $locale, $parameters);
        }

        return $this->formatter->format($catalogue->get($id, $domain), $locale, $parameters);
=======
        return $this->formatter->choiceFormat($catalogue->get($id, $domain), $number, $locale, $parameters);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function getCatalogue(string $locale = null)
    {
        if (!$locale) {
=======
    public function getCatalogue($locale = null)
    {
        if (null === $locale) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $locale = $this->getLocale();
        } else {
            $this->assertValidLocale($locale);
        }

        if (!isset($this->catalogues[$locale])) {
            $this->loadCatalogue($locale);
        }

        return $this->catalogues[$locale];
    }

    /**
<<<<<<< HEAD
     * {@inheritdoc}
     */
    public function getCatalogues(): array
    {
        return array_values($this->catalogues);
    }

    /**
     * Gets the loaders.
     *
     * @return LoaderInterface[]
=======
     * Gets the loaders.
     *
     * @return array LoaderInterface[]
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
     */
    protected function getLoaders()
    {
        return $this->loaders;
    }

<<<<<<< HEAD
    protected function loadCatalogue(string $locale)
=======
    /**
     * @param string $locale
     */
    protected function loadCatalogue($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null === $this->cacheDir) {
            $this->initializeCatalogue($locale);
        } else {
            $this->initializeCacheCatalogue($locale);
        }
    }

<<<<<<< HEAD
    protected function initializeCatalogue(string $locale)
=======
    /**
     * @param string $locale
     */
    protected function initializeCatalogue($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->assertValidLocale($locale);

        try {
            $this->doLoadCatalogue($locale);
        } catch (NotFoundResourceException $e) {
            if (!$this->computeFallbackLocales($locale)) {
                throw $e;
            }
        }
        $this->loadFallbackCatalogues($locale);
    }

<<<<<<< HEAD
    private function initializeCacheCatalogue(string $locale): void
=======
    /**
     * @param string $locale
     */
    private function initializeCacheCatalogue($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (isset($this->catalogues[$locale])) {
            /* Catalogue already initialized. */
            return;
        }

        $this->assertValidLocale($locale);
        $cache = $this->getConfigCacheFactory()->cache($this->getCatalogueCachePath($locale),
            function (ConfigCacheInterface $cache) use ($locale) {
                $this->dumpCatalogue($locale, $cache);
            }
        );

        if (isset($this->catalogues[$locale])) {
            /* Catalogue has been initialized as it was written out to cache. */
            return;
        }

        /* Read catalogue from cache. */
        $this->catalogues[$locale] = include $cache->getPath();
    }

<<<<<<< HEAD
    private function dumpCatalogue(string $locale, ConfigCacheInterface $cache): void
=======
    private function dumpCatalogue($locale, ConfigCacheInterface $cache)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->initializeCatalogue($locale);
        $fallbackContent = $this->getFallbackContent($this->catalogues[$locale]);

        $content = sprintf(<<<EOF
<?php

use Symfony\Component\Translation\MessageCatalogue;

\$catalogue = new MessageCatalogue('%s', %s);

%s
return \$catalogue;

EOF
            ,
            $locale,
<<<<<<< HEAD
            var_export($this->getAllMessages($this->catalogues[$locale]), true),
=======
            var_export($this->catalogues[$locale]->all(), true),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            $fallbackContent
        );

        $cache->write($content, $this->catalogues[$locale]->getResources());
    }

<<<<<<< HEAD
    private function getFallbackContent(MessageCatalogue $catalogue): string
=======
    private function getFallbackContent(MessageCatalogue $catalogue)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $fallbackContent = '';
        $current = '';
        $replacementPattern = '/[^a-z0-9_]/i';
        $fallbackCatalogue = $catalogue->getFallbackCatalogue();
        while ($fallbackCatalogue) {
            $fallback = $fallbackCatalogue->getLocale();
            $fallbackSuffix = ucfirst(preg_replace($replacementPattern, '_', $fallback));
            $currentSuffix = ucfirst(preg_replace($replacementPattern, '_', $current));

            $fallbackContent .= sprintf(<<<'EOF'
$catalogue%s = new MessageCatalogue('%s', %s);
$catalogue%s->addFallbackCatalogue($catalogue%s);

EOF
                ,
                $fallbackSuffix,
                $fallback,
<<<<<<< HEAD
                var_export($this->getAllMessages($fallbackCatalogue), true),
=======
                var_export($fallbackCatalogue->all(), true),
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                $currentSuffix,
                $fallbackSuffix
            );
            $current = $fallbackCatalogue->getLocale();
            $fallbackCatalogue = $fallbackCatalogue->getFallbackCatalogue();
        }

        return $fallbackContent;
    }

<<<<<<< HEAD
    private function getCatalogueCachePath(string $locale): string
    {
        return $this->cacheDir.'/catalogue.'.$locale.'.'.strtr(substr(base64_encode(hash('sha256', serialize($this->cacheVary), true)), 0, 7), '/', '_').'.php';
    }

    /**
     * @internal
     */
    protected function doLoadCatalogue(string $locale): void
=======
    private function getCatalogueCachePath($locale)
    {
        return $this->cacheDir.'/catalogue.'.$locale.'.'.strtr(substr(base64_encode(hash('sha256', serialize($this->fallbackLocales), true)), 0, 7), '/', '_').'.php';
    }

    private function doLoadCatalogue($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $this->catalogues[$locale] = new MessageCatalogue($locale);

        if (isset($this->resources[$locale])) {
            foreach ($this->resources[$locale] as $resource) {
                if (!isset($this->loaders[$resource[0]])) {
                    if (\is_string($resource[1])) {
                        throw new RuntimeException(sprintf('No loader is registered for the "%s" format when loading the "%s" resource.', $resource[0], $resource[1]));
                    }

                    throw new RuntimeException(sprintf('No loader is registered for the "%s" format.', $resource[0]));
                }
                $this->catalogues[$locale]->addCatalogue($this->loaders[$resource[0]]->load($resource[1], $locale, $resource[2]));
            }
        }
    }

<<<<<<< HEAD
    private function loadFallbackCatalogues(string $locale): void
=======
    private function loadFallbackCatalogues($locale)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $current = $this->catalogues[$locale];

        foreach ($this->computeFallbackLocales($locale) as $fallback) {
            if (!isset($this->catalogues[$fallback])) {
                $this->initializeCatalogue($fallback);
            }

<<<<<<< HEAD
            $fallbackCatalogue = new MessageCatalogue($fallback, $this->getAllMessages($this->catalogues[$fallback]));
=======
            $fallbackCatalogue = new MessageCatalogue($fallback, $this->catalogues[$fallback]->all());
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            foreach ($this->catalogues[$fallback]->getResources() as $resource) {
                $fallbackCatalogue->addResource($resource);
            }
            $current->addFallbackCatalogue($fallbackCatalogue);
            $current = $fallbackCatalogue;
        }
    }

<<<<<<< HEAD
    protected function computeFallbackLocales(string $locale)
    {
        if (null === $this->parentLocales) {
            $this->parentLocales = json_decode(file_get_contents(__DIR__.'/Resources/data/parents.json'), true);
        }

        $originLocale = $locale;
        $locales = [];

        while ($locale) {
            $parent = $this->parentLocales[$locale] ?? null;

            if ($parent) {
                $locale = 'root' !== $parent ? $parent : null;
            } elseif (\function_exists('locale_parse')) {
                $localeSubTags = locale_parse($locale);
                $locale = null;
                if (1 < \count($localeSubTags)) {
                    array_pop($localeSubTags);
                    $locale = locale_compose($localeSubTags) ?: null;
                }
            } elseif ($i = strrpos($locale, '_') ?: strrpos($locale, '-')) {
                $locale = substr($locale, 0, $i);
            } else {
                $locale = null;
            }

            if (null !== $locale) {
                $locales[] = $locale;
            }
        }

        foreach ($this->fallbackLocales as $fallback) {
            if ($fallback === $originLocale) {
=======
    protected function computeFallbackLocales($locale)
    {
        $locales = [];
        foreach ($this->fallbackLocales as $fallback) {
            if ($fallback === $locale) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                continue;
            }

            $locales[] = $fallback;
        }

<<<<<<< HEAD
=======
        if (\function_exists('locale_parse')) {
            $localeSubTags = locale_parse($locale);
            if (1 < \count($localeSubTags)) {
                array_pop($localeSubTags);
                $fallback = locale_compose($localeSubTags);
                if (false !== $fallback) {
                    array_unshift($locales, $fallback);
                }
            }
        } elseif (false !== strrchr($locale, '_')) {
            array_unshift($locales, substr($locale, 0, -\strlen(strrchr($locale, '_'))));
        } elseif (false !== strrchr($locale, '-')) {
            array_unshift($locales, substr($locale, 0, -\strlen(strrchr($locale, '-'))));
        }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        return array_unique($locales);
    }

    /**
     * Asserts that the locale is valid, throws an Exception if not.
     *
<<<<<<< HEAD
     * @throws InvalidArgumentException If the locale contains invalid characters
     */
    protected function assertValidLocale(string $locale)
    {
        if (!preg_match('/^[a-z0-9@_\\.\\-]*$/i', $locale)) {
=======
     * @param string $locale Locale to tests
     *
     * @throws InvalidArgumentException If the locale contains invalid characters
     */
    protected function assertValidLocale($locale)
    {
        if (1 !== preg_match('/^[a-z0-9@_\\.\\-]*$/i', $locale)) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            throw new InvalidArgumentException(sprintf('Invalid "%s" locale.', $locale));
        }
    }

    /**
     * Provides the ConfigCache factory implementation, falling back to a
     * default implementation if necessary.
<<<<<<< HEAD
     */
    private function getConfigCacheFactory(): ConfigCacheFactoryInterface
=======
     *
     * @return ConfigCacheFactoryInterface $configCacheFactory
     */
    private function getConfigCacheFactory()
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (!$this->configCacheFactory) {
            $this->configCacheFactory = new ConfigCacheFactory($this->debug);
        }

        return $this->configCacheFactory;
    }
<<<<<<< HEAD

    private function getAllMessages(MessageCatalogueInterface $catalogue): array
    {
        $allMessages = [];

        foreach ($catalogue->all() as $domain => $messages) {
            if ($intlMessages = $catalogue->all($domain.MessageCatalogue::INTL_DOMAIN_SUFFIX)) {
                $allMessages[$domain.MessageCatalogue::INTL_DOMAIN_SUFFIX] = $intlMessages;
                $messages = array_diff_key($messages, $intlMessages);
            }
            if ($messages) {
                $allMessages[$domain] = $messages;
            }
        }

        return $allMessages;
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
