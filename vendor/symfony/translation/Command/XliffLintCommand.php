<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\Translation\Command;

<<<<<<< HEAD
use Symfony\Component\Console\CI\GithubActionReporter;
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Completion\CompletionInput;
use Symfony\Component\Console\Completion\CompletionSuggestions;
use Symfony\Component\Console\Exception\RuntimeException;
use Symfony\Component\Console\Input\InputArgument;
=======
use Symfony\Component\Console\Command\Command;
use Symfony\Component\Console\Exception\RuntimeException;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;
use Symfony\Component\Console\Style\SymfonyStyle;
use Symfony\Component\Translation\Exception\InvalidArgumentException;
<<<<<<< HEAD
use Symfony\Component\Translation\Util\XliffUtils;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Validates XLIFF files syntax and outputs encountered errors.
 *
 * @author Grégoire Pineau <lyrixx@lyrixx.info>
 * @author Robin Chalas <robin.chalas@gmail.com>
 * @author Javier Eguiluz <javier.eguiluz@gmail.com>
 */
class XliffLintCommand extends Command
{
    protected static $defaultName = 'lint:xliff';
<<<<<<< HEAD
    protected static $defaultDescription = 'Lint an XLIFF file and outputs encountered errors';
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

    private $format;
    private $displayCorrectFiles;
    private $directoryIteratorProvider;
    private $isReadableProvider;
<<<<<<< HEAD
    private $requireStrictFileNames;

    public function __construct(string $name = null, callable $directoryIteratorProvider = null, callable $isReadableProvider = null, bool $requireStrictFileNames = true)
=======

    public function __construct($name = null, $directoryIteratorProvider = null, $isReadableProvider = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        parent::__construct($name);

        $this->directoryIteratorProvider = $directoryIteratorProvider;
        $this->isReadableProvider = $isReadableProvider;
<<<<<<< HEAD
        $this->requireStrictFileNames = $requireStrictFileNames;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
    protected function configure()
    {
        $this
<<<<<<< HEAD
            ->setDescription(self::$defaultDescription)
            ->addArgument('filename', InputArgument::IS_ARRAY, 'A file, a directory or "-" for reading from STDIN')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'The output format')
            ->setHelp(<<<EOF
The <info>%command.name%</info> command lints an XLIFF file and outputs to STDOUT
=======
            ->setDescription('Lints a XLIFF file and outputs encountered errors')
            ->addArgument('filename', null, 'A file or a directory or STDIN')
            ->addOption('format', null, InputOption::VALUE_REQUIRED, 'The output format', 'txt')
            ->setHelp(<<<EOF
The <info>%command.name%</info> command lints a XLIFF file and outputs to STDOUT
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
the first encountered syntax error.

You can validates XLIFF contents passed from STDIN:

<<<<<<< HEAD
  <info>cat filename | php %command.full_name% -</info>
=======
  <info>cat filename | php %command.full_name%</info>
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

You can also validate the syntax of a file:

  <info>php %command.full_name% filename</info>

Or of a whole directory:

  <info>php %command.full_name% dirname</info>
  <info>php %command.full_name% dirname --format=json</info>

EOF
            )
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output)
    {
        $io = new SymfonyStyle($input, $output);
<<<<<<< HEAD
        $filenames = (array) $input->getArgument('filename');
        $this->format = $input->getOption('format') ?? (GithubActionReporter::isGithubActionEnvironment() ? 'github' : 'txt');
        $this->displayCorrectFiles = $output->isVerbose();

        if (['-'] === $filenames) {
            return $this->display($io, [$this->validate(file_get_contents('php://stdin'))]);
        }

        if (!$filenames) {
            throw new RuntimeException('Please provide a filename or pipe file content to STDIN.');
        }

        $filesInfo = [];
        foreach ($filenames as $filename) {
            if (!$this->isReadable($filename)) {
                throw new RuntimeException(sprintf('File or directory "%s" is not readable.', $filename));
            }

            foreach ($this->getFiles($filename) as $file) {
                $filesInfo[] = $this->validate(file_get_contents($file), $file);
            }
=======
        $filename = $input->getArgument('filename');
        $this->format = $input->getOption('format');
        $this->displayCorrectFiles = $output->isVerbose();

        if (!$filename) {
            if (!$stdin = $this->getStdin()) {
                throw new RuntimeException('Please provide a filename or pipe file content to STDIN.');
            }

            return $this->display($io, [$this->validate($stdin)]);
        }

        if (!$this->isReadable($filename)) {
            throw new RuntimeException(sprintf('File or directory "%s" is not readable.', $filename));
        }

        $filesInfo = [];
        foreach ($this->getFiles($filename) as $file) {
            $filesInfo[] = $this->validate(file_get_contents($file), $file);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $this->display($io, $filesInfo);
    }

<<<<<<< HEAD
    private function validate(string $content, string $file = null): array
    {
        $errors = [];

=======
    private function validate($content, $file = null)
    {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        // Avoid: Warning DOMDocument::loadXML(): Empty string supplied as input
        if ('' === trim($content)) {
            return ['file' => $file, 'valid' => true];
        }

<<<<<<< HEAD
        $internal = libxml_use_internal_errors(true);

        $document = new \DOMDocument();
        $document->loadXML($content);

        if (null !== $targetLanguage = $this->getTargetLanguageFromFile($document)) {
            $normalizedLocalePattern = sprintf('(%s|%s)', preg_quote($targetLanguage, '/'), preg_quote(str_replace('-', '_', $targetLanguage), '/'));
            // strict file names require translation files to be named '____.locale.xlf'
            // otherwise, both '____.locale.xlf' and 'locale.____.xlf' are allowed
            // also, the regexp matching must be case-insensitive, as defined for 'target-language' values
            // http://docs.oasis-open.org/xliff/v1.2/os/xliff-core.html#target-language
            $expectedFilenamePattern = $this->requireStrictFileNames ? sprintf('/^.*\.(?i:%s)\.(?:xlf|xliff)/', $normalizedLocalePattern) : sprintf('/^(?:.*\.(?i:%s)|(?i:%s)\..*)\.(?:xlf|xliff)/', $normalizedLocalePattern, $normalizedLocalePattern);

            if (0 === preg_match($expectedFilenamePattern, basename($file))) {
                $errors[] = [
                    'line' => -1,
                    'column' => -1,
                    'message' => sprintf('There is a mismatch between the language included in the file name ("%s") and the "%s" value used in the "target-language" attribute of the file.', basename($file), $targetLanguage),
                ];
            }
        }

        foreach (XliffUtils::validateSchema($document) as $xmlError) {
            $errors[] = [
                'line' => $xmlError['line'],
                'column' => $xmlError['column'],
                'message' => $xmlError['message'],
            ];
        }

        libxml_clear_errors();
        libxml_use_internal_errors($internal);

        return ['file' => $file, 'valid' => 0 === \count($errors), 'messages' => $errors];
=======
        libxml_use_internal_errors(true);

        $document = new \DOMDocument();
        $document->loadXML($content);
        if ($document->schemaValidate(__DIR__.'/../Resources/schemas/xliff-core-1.2-strict.xsd')) {
            return ['file' => $file, 'valid' => true];
        }

        $errorMessages = array_map(function ($error) {
            return [
                'line' => $error->line,
                'column' => $error->column,
                'message' => trim($error->message),
            ];
        }, libxml_get_errors());

        libxml_clear_errors();
        libxml_use_internal_errors(false);

        return ['file' => $file, 'valid' => false, 'messages' => $errorMessages];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    private function display(SymfonyStyle $io, array $files)
    {
        switch ($this->format) {
            case 'txt':
                return $this->displayTxt($io, $files);
            case 'json':
                return $this->displayJson($io, $files);
<<<<<<< HEAD
            case 'github':
                return $this->displayTxt($io, $files, true);
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            default:
                throw new InvalidArgumentException(sprintf('The format "%s" is not supported.', $this->format));
        }
    }

<<<<<<< HEAD
    private function displayTxt(SymfonyStyle $io, array $filesInfo, bool $errorAsGithubAnnotations = false)
    {
        $countFiles = \count($filesInfo);
        $erroredFiles = 0;
        $githubReporter = $errorAsGithubAnnotations ? new GithubActionReporter($io) : null;
=======
    private function displayTxt(SymfonyStyle $io, array $filesInfo)
    {
        $countFiles = \count($filesInfo);
        $erroredFiles = 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        foreach ($filesInfo as $info) {
            if ($info['valid'] && $this->displayCorrectFiles) {
                $io->comment('<info>OK</info>'.($info['file'] ? sprintf(' in %s', $info['file']) : ''));
            } elseif (!$info['valid']) {
                ++$erroredFiles;
                $io->text('<error> ERROR </error>'.($info['file'] ? sprintf(' in %s', $info['file']) : ''));
<<<<<<< HEAD
                $io->listing(array_map(function ($error) use ($info, $githubReporter) {
                    // general document errors have a '-1' line number
                    $line = -1 === $error['line'] ? null : $error['line'];

                    if ($githubReporter) {
                        $githubReporter->error($error['message'], $info['file'], $line, null !== $line ? $error['column'] : null);
                    }

                    return null === $line ? $error['message'] : sprintf('Line %d, Column %d: %s', $line, $error['column'], $error['message']);
=======
                $io->listing(array_map(function ($error) {
                    // general document errors have a '-1' line number
                    return -1 === $error['line'] ? $error['message'] : sprintf('Line %d, Column %d: %s', $error['line'], $error['column'], $error['message']);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }, $info['messages']));
            }
        }

        if (0 === $erroredFiles) {
            $io->success(sprintf('All %d XLIFF files contain valid syntax.', $countFiles));
        } else {
            $io->warning(sprintf('%d XLIFF files have valid syntax and %d contain errors.', $countFiles - $erroredFiles, $erroredFiles));
        }

        return min($erroredFiles, 1);
    }

    private function displayJson(SymfonyStyle $io, array $filesInfo)
    {
        $errors = 0;

        array_walk($filesInfo, function (&$v) use (&$errors) {
            $v['file'] = (string) $v['file'];
            if (!$v['valid']) {
                ++$errors;
            }
        });

        $io->writeln(json_encode($filesInfo, \JSON_PRETTY_PRINT | \JSON_UNESCAPED_SLASHES));

        return min($errors, 1);
    }

<<<<<<< HEAD
    private function getFiles(string $fileOrDirectory)
=======
    private function getFiles($fileOrDirectory)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (is_file($fileOrDirectory)) {
            yield new \SplFileInfo($fileOrDirectory);

            return;
        }

        foreach ($this->getDirectoryIterator($fileOrDirectory) as $file) {
            if (!\in_array($file->getExtension(), ['xlf', 'xliff'])) {
                continue;
            }

            yield $file;
        }
    }

<<<<<<< HEAD
    private function getDirectoryIterator(string $directory)
=======
    /**
     * @return string|null
     */
    private function getStdin()
    {
        if (0 !== ftell(\STDIN)) {
            return null;
        }

        $inputs = '';
        while (!feof(\STDIN)) {
            $inputs .= fread(\STDIN, 1024);
        }

        return $inputs;
    }

    private function getDirectoryIterator($directory)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $default = function ($directory) {
            return new \RecursiveIteratorIterator(
                new \RecursiveDirectoryIterator($directory, \FilesystemIterator::SKIP_DOTS | \FilesystemIterator::FOLLOW_SYMLINKS),
                \RecursiveIteratorIterator::LEAVES_ONLY
            );
        };

        if (null !== $this->directoryIteratorProvider) {
<<<<<<< HEAD
            return ($this->directoryIteratorProvider)($directory, $default);
=======
            return \call_user_func($this->directoryIteratorProvider, $directory, $default);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $default($directory);
    }

<<<<<<< HEAD
    private function isReadable(string $fileOrDirectory)
=======
    private function isReadable($fileOrDirectory)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $default = function ($fileOrDirectory) {
            return is_readable($fileOrDirectory);
        };

        if (null !== $this->isReadableProvider) {
<<<<<<< HEAD
            return ($this->isReadableProvider)($fileOrDirectory, $default);
=======
            return \call_user_func($this->isReadableProvider, $fileOrDirectory, $default);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $default($fileOrDirectory);
    }
<<<<<<< HEAD

    private function getTargetLanguageFromFile(\DOMDocument $xliffContents): ?string
    {
        foreach ($xliffContents->getElementsByTagName('file')[0]->attributes ?? [] as $attribute) {
            if ('target-language' === $attribute->nodeName) {
                return $attribute->nodeValue;
            }
        }

        return null;
    }

    public function complete(CompletionInput $input, CompletionSuggestions $suggestions): void
    {
        if ($input->mustSuggestOptionValuesFor('format')) {
            $suggestions->suggestValues(['txt', 'json', 'github']);
        }
    }
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
}
