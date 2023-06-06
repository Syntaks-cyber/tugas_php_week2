<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
if ('cli' !== \PHP_SAPI) {
    throw new Exception('This script must be run from the command line.');
}

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
$usageInstructions = <<<END

  Usage instructions
  -------------------------------------------------------------------------------

  $ cd symfony-code-root-directory/

  # show the translation status of all locales
  $ php translation-status.php

<<<<<<< HEAD
  # only show the translation status of incomplete or erroneous locales
  $ php translation-status.php --incomplete

  # show the translation status of all locales, all their missing translations and mismatches between trans-unit id and source
=======
  # show the translation status of all locales and all their missing translations
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
  $ php translation-status.php -v

  # show the status of a single locale
  $ php translation-status.php fr

<<<<<<< HEAD
  # show the status of a single locale, missing translations and mismatches between trans-unit id and source
=======
  # show the status of a single locale and all its missing translations
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
  $ php translation-status.php fr -v

END;

$config = [
    // if TRUE, the full list of missing translations is displayed
    'verbose_output' => false,
    // NULL = analyze all locales
    'locale_to_analyze' => null,
<<<<<<< HEAD
    // append --incomplete to only show incomplete languages
    'include_completed_languages' => true,
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    // the reference files all the other translations are compared to
    'original_files' => [
        'src/Symfony/Component/Form/Resources/translations/validators.en.xlf',
        'src/Symfony/Component/Security/Core/Resources/translations/security.en.xlf',
        'src/Symfony/Component/Validator/Resources/translations/validators.en.xlf',
    ],
];

$argc = $_SERVER['argc'];
$argv = $_SERVER['argv'];

<<<<<<< HEAD
if ($argc > 4) {
=======
if ($argc > 3) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    echo str_replace('translation-status.php', $argv[0], $usageInstructions);
    exit(1);
}

foreach (array_slice($argv, 1) as $argumentOrOption) {
<<<<<<< HEAD
    if ('--incomplete' === $argumentOrOption) {
        $config['include_completed_languages'] = false;
        continue;
    }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    if (0 === strpos($argumentOrOption, '-')) {
        $config['verbose_output'] = true;
    } else {
        $config['locale_to_analyze'] = $argumentOrOption;
    }
}

foreach ($config['original_files'] as $originalFilePath) {
    if (!file_exists($originalFilePath)) {
        echo sprintf('The following file does not exist. Make sure that you execute this command at the root dir of the Symfony code repository.%s  %s', \PHP_EOL, $originalFilePath);
        exit(1);
    }
}

$totalMissingTranslations = 0;
<<<<<<< HEAD
$totalTranslationMismatches = 0;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

foreach ($config['original_files'] as $originalFilePath) {
    $translationFilePaths = findTranslationFiles($originalFilePath, $config['locale_to_analyze']);
    $translationStatus = calculateTranslationStatus($originalFilePath, $translationFilePaths);

    $totalMissingTranslations += array_sum(array_map(function ($translation) {
        return count($translation['missingKeys']);
    }, array_values($translationStatus)));
<<<<<<< HEAD
    $totalTranslationMismatches += array_sum(array_map(function ($translation) {
        return count($translation['mismatches']);
    }, array_values($translationStatus)));

    printTranslationStatus($originalFilePath, $translationStatus, $config['verbose_output'], $config['include_completed_languages']);
}

exit($totalTranslationMismatches > 0 ? 1 : 0);
=======

    printTranslationStatus($originalFilePath, $translationStatus, $config['verbose_output']);
}

exit($totalMissingTranslations > 0 ? 1 : 0);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

function findTranslationFiles($originalFilePath, $localeToAnalyze)
{
    $translations = [];

    $translationsDir = dirname($originalFilePath);
    $originalFileName = basename($originalFilePath);
    $translationFileNamePattern = str_replace('.en.', '.*.', $originalFileName);

    $translationFiles = glob($translationsDir.'/'.$translationFileNamePattern, \GLOB_NOSORT);
    sort($translationFiles);
    foreach ($translationFiles as $filePath) {
        $locale = extractLocaleFromFilePath($filePath);

        if (null !== $localeToAnalyze && $locale !== $localeToAnalyze) {
            continue;
        }

        $translations[$locale] = $filePath;
    }

    return $translations;
}

function calculateTranslationStatus($originalFilePath, $translationFilePaths)
{
    $translationStatus = [];
    $allTranslationKeys = extractTranslationKeys($originalFilePath);

    foreach ($translationFilePaths as $locale => $translationPath) {
        $translatedKeys = extractTranslationKeys($translationPath);
        $missingKeys = array_diff_key($allTranslationKeys, $translatedKeys);
<<<<<<< HEAD
        $mismatches = findTransUnitMismatches($allTranslationKeys, $translatedKeys);
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        $translationStatus[$locale] = [
            'total' => count($allTranslationKeys),
            'translated' => count($translatedKeys),
            'missingKeys' => $missingKeys,
<<<<<<< HEAD
            'mismatches' => $mismatches,
        ];
        $translationStatus[$locale]['is_completed'] = isTranslationCompleted($translationStatus[$locale]);
=======
        ];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    return $translationStatus;
}

<<<<<<< HEAD
function isTranslationCompleted(array $translationStatus): bool
{
    return $translationStatus['total'] === $translationStatus['translated'] && 0 === count($translationStatus['mismatches']);
}

function printTranslationStatus($originalFilePath, $translationStatus, $verboseOutput, $includeCompletedLanguages)
{
    printTitle($originalFilePath);
    printTable($translationStatus, $verboseOutput, $includeCompletedLanguages);
=======
function printTranslationStatus($originalFilePath, $translationStatus, $verboseOutput)
{
    printTitle($originalFilePath);
    printTable($translationStatus, $verboseOutput);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    echo \PHP_EOL.\PHP_EOL;
}

function extractLocaleFromFilePath($filePath)
{
    $parts = explode('.', $filePath);

    return $parts[count($parts) - 2];
}

function extractTranslationKeys($filePath)
{
    $translationKeys = [];
    $contents = new \SimpleXMLElement(file_get_contents($filePath));

    foreach ($contents->file->body->{'trans-unit'} as $translationKey) {
        $translationId = (string) $translationKey['id'];
        $translationKey = (string) $translationKey->source;

        $translationKeys[$translationId] = $translationKey;
    }

    return $translationKeys;
}

<<<<<<< HEAD
/**
 * Check whether the trans-unit id and source match with the base translation.
 */
function findTransUnitMismatches(array $baseTranslationKeys, array $translatedKeys): array
{
    $mismatches = [];

    foreach ($baseTranslationKeys as $translationId => $translationKey) {
        if (!isset($translatedKeys[$translationId])) {
            continue;
        }
        if ($translatedKeys[$translationId] !== $translationKey) {
            $mismatches[$translationId] = [
                'found' => $translatedKeys[$translationId],
                'expected' => $translationKey,
            ];
        }
    }

    return $mismatches;
}

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
function printTitle($title)
{
    echo $title.\PHP_EOL;
    echo str_repeat('=', strlen($title)).\PHP_EOL.\PHP_EOL;
}

<<<<<<< HEAD
function printTable($translations, $verboseOutput, bool $includeCompletedLanguages)
=======
function printTable($translations, $verboseOutput)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
{
    if (0 === count($translations)) {
        echo 'No translations found';

        return;
    }
    $longestLocaleNameLength = max(array_map('strlen', array_keys($translations)));

    foreach ($translations as $locale => $translation) {
<<<<<<< HEAD
        if (!$includeCompletedLanguages && $translation['is_completed']) {
            continue;
        }

        if ($translation['translated'] > $translation['total']) {
            textColorRed();
        } elseif (count($translation['mismatches']) > 0) {
            textColorRed();
        } elseif ($translation['is_completed']) {
            textColorGreen();
        }

        echo sprintf(
            '|  Locale: %-'.$longestLocaleNameLength.'s  |  Translated: %2d/%2d  |  Mismatches: %d  |',
            $locale,
            $translation['translated'],
            $translation['total'],
            count($translation['mismatches'])
        ).\PHP_EOL;

        textColorNormal();

        $shouldBeClosed = false;
        if (true === $verboseOutput && count($translation['missingKeys']) > 0) {
            echo '|    Missing Translations:'.\PHP_EOL;

            foreach ($translation['missingKeys'] as $id => $content) {
                echo sprintf('|      (id=%s) %s', $id, $content).\PHP_EOL;
            }
            $shouldBeClosed = true;
        }
        if (true === $verboseOutput && count($translation['mismatches']) > 0) {
            echo '|    Mismatches between trans-unit id and source:'.\PHP_EOL;

            foreach ($translation['mismatches'] as $id => $content) {
                echo sprintf('|      (id=%s) Expected: %s', $id, $content['expected']).\PHP_EOL;
                echo sprintf('|              Found:    %s', $content['found']).\PHP_EOL;
            }
            $shouldBeClosed = true;
        }
        if ($shouldBeClosed) {
=======
        if ($translation['translated'] > $translation['total']) {
            textColorRed();
        } elseif ($translation['translated'] === $translation['total']) {
            textColorGreen();
        }

        echo sprintf('| Locale: %-'.$longestLocaleNameLength.'s | Translated: %d/%d', $locale, $translation['translated'], $translation['total']).\PHP_EOL;

        textColorNormal();

        if (true === $verboseOutput && count($translation['missingKeys']) > 0) {
            echo str_repeat('-', 80).\PHP_EOL;
            echo '| Missing Translations:'.\PHP_EOL;

            foreach ($translation['missingKeys'] as $id => $content) {
                echo sprintf('|   (id=%s) %s', $id, $content).\PHP_EOL;
            }

>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            echo str_repeat('-', 80).\PHP_EOL;
        }
    }
}

function textColorGreen()
{
    echo "\033[32m";
}

function textColorRed()
{
    echo "\033[31m";
}

function textColorNormal()
{
    echo "\033[0m";
}
