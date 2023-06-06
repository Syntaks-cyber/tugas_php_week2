<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\DataCollector;

<<<<<<< HEAD
use Symfony\Component\ErrorHandler\Exception\SilencedErrorContext;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\RequestStack;
=======
use Symfony\Component\HttpFoundation\Request;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Log\DebugLoggerInterface;

/**
<<<<<<< HEAD
 * @author Fabien Potencier <fabien@symfony.com>
 *
 * @final
 */
class LoggerDataCollector extends DataCollector implements LateDataCollectorInterface
{
    private $logger;
    private $containerPathPrefix;
    private $currentRequest;
    private $requestStack;
    private $processedLogs;

    public function __construct(object $logger = null, string $containerPathPrefix = null, RequestStack $requestStack = null)
=======
 * LogDataCollector.
 *
 * @author Fabien Potencier <fabien@symfony.com>
 */
class LoggerDataCollector extends DataCollector implements LateDataCollectorInterface
{
    private $errorNames = array(
        E_DEPRECATED => 'E_DEPRECATED',
        E_USER_DEPRECATED => 'E_USER_DEPRECATED',
        E_NOTICE => 'E_NOTICE',
        E_USER_NOTICE => 'E_USER_NOTICE',
        E_STRICT => 'E_STRICT',
        E_WARNING => 'E_WARNING',
        E_USER_WARNING => 'E_USER_WARNING',
        E_COMPILE_WARNING => 'E_COMPILE_WARNING',
        E_CORE_WARNING => 'E_CORE_WARNING',
        E_USER_ERROR => 'E_USER_ERROR',
        E_RECOVERABLE_ERROR => 'E_RECOVERABLE_ERROR',
        E_COMPILE_ERROR => 'E_COMPILE_ERROR',
        E_PARSE => 'E_PARSE',
        E_ERROR => 'E_ERROR',
        E_CORE_ERROR => 'E_CORE_ERROR',
    );

    private $logger;

    public function __construct($logger = null)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        if (null !== $logger && $logger instanceof DebugLoggerInterface) {
            $this->logger = $logger;
        }
<<<<<<< HEAD

        $this->containerPathPrefix = $containerPathPrefix;
        $this->requestStack = $requestStack;
=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
<<<<<<< HEAD
    public function collect(Request $request, Response $response, \Throwable $exception = null)
    {
        $this->currentRequest = $this->requestStack && $this->requestStack->getMainRequest() !== $request ? $request : null;
    }

    /**
     * {@inheritdoc}
     */
    public function reset()
    {
        if ($this->logger instanceof DebugLoggerInterface) {
            $this->logger->clear();
        }
        $this->data = [];
=======
    public function collect(Request $request, Response $response, \Exception $exception = null)
    {
        // everything is done as late as possible
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * {@inheritdoc}
     */
    public function lateCollect()
    {
        if (null !== $this->logger) {
<<<<<<< HEAD
            $containerDeprecationLogs = $this->getContainerDeprecationLogs();
            $this->data = $this->computeErrorsCount($containerDeprecationLogs);
            // get compiler logs later (only when they are needed) to improve performance
            $this->data['compiler_logs'] = [];
            $this->data['compiler_logs_filepath'] = $this->containerPathPrefix.'Compiler.log';
            $this->data['logs'] = $this->sanitizeLogs(array_merge($this->logger->getLogs($this->currentRequest), $containerDeprecationLogs));
            $this->data = $this->cloneVar($this->data);
        }
        $this->currentRequest = null;
    }

    public function getLogs()
    {
        return $this->data['logs'] ?? [];
    }

    public function getProcessedLogs()
    {
        if (null !== $this->processedLogs) {
            return $this->processedLogs;
        }

        $rawLogs = $this->getLogs();
        if ([] === $rawLogs) {
            return $this->processedLogs = $rawLogs;
        }

        $logs = [];
        foreach ($this->getLogs()->getValue() as $rawLog) {
            $rawLogData = $rawLog->getValue();

            if ($rawLogData['priority']->getValue() > 300) {
                $logType = 'error';
            } elseif (isset($rawLogData['scream']) && false === $rawLogData['scream']->getValue()) {
                $logType = 'deprecation';
            } elseif (isset($rawLogData['scream']) && true === $rawLogData['scream']->getValue()) {
                $logType = 'silenced';
            } else {
                $logType = 'regular';
            }

            $logs[] = [
                'type' => $logType,
                'errorCount' => $rawLog['errorCount'] ?? 1,
                'timestamp' => $rawLogData['timestamp_rfc3339']->getValue(),
                'priority' => $rawLogData['priority']->getValue(),
                'priorityName' => $rawLogData['priorityName']->getValue(),
                'channel' => $rawLogData['channel']->getValue(),
                'message' => $rawLogData['message'],
                'context' => $rawLogData['context'],
            ];
        }

        // sort logs from oldest to newest
        usort($logs, static function ($logA, $logB) {
            return $logA['timestamp'] <=> $logB['timestamp'];
        });

        return $this->processedLogs = $logs;
    }

    public function getFilters()
    {
        $filters = [
            'channel' => [],
            'priority' => [
                'Debug' => 100,
                'Info' => 200,
                'Notice' => 250,
                'Warning' => 300,
                'Error' => 400,
                'Critical' => 500,
                'Alert' => 550,
                'Emergency' => 600,
            ],
        ];

        $allChannels = [];
        foreach ($this->getProcessedLogs() as $log) {
            if ('' === trim($log['channel'] ?? '')) {
                continue;
            }

            $allChannels[] = $log['channel'];
        }
        $channels = array_unique($allChannels);
        sort($channels);
        $filters['channel'] = $channels;

        return $filters;
=======
            $this->data = $this->computeErrorsCount();
            $this->data['logs'] = $this->sanitizeLogs($this->logger->getLogs());
        }
    }

    /**
     * Gets the called events.
     *
     * @return array An array of called events
     *
     * @see TraceableEventDispatcherInterface
     */
    public function countErrors()
    {
        return isset($this->data['error_count']) ? $this->data['error_count'] : 0;
    }

    /**
     * Gets the logs.
     *
     * @return array An array of logs
     */
    public function getLogs()
    {
        return isset($this->data['logs']) ? $this->data['logs'] : array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function getPriorities()
    {
<<<<<<< HEAD
        return $this->data['priorities'] ?? [];
    }

    public function countErrors()
    {
        return $this->data['error_count'] ?? 0;
=======
        return isset($this->data['priorities']) ? $this->data['priorities'] : array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function countDeprecations()
    {
<<<<<<< HEAD
        return $this->data['deprecation_count'] ?? 0;
    }

    public function countWarnings()
    {
        return $this->data['warning_count'] ?? 0;
=======
        return isset($this->data['deprecation_count']) ? $this->data['deprecation_count'] : 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function countScreams()
    {
<<<<<<< HEAD
        return $this->data['scream_count'] ?? 0;
    }

    public function getCompilerLogs()
    {
        return $this->cloneVar($this->getContainerCompilerLogs($this->data['compiler_logs_filepath'] ?? null));
=======
        return isset($this->data['scream_count']) ? $this->data['scream_count'] : 0;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
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
        return 'logger';
    }

<<<<<<< HEAD
    private function getContainerDeprecationLogs(): array
    {
        if (null === $this->containerPathPrefix || !is_file($file = $this->containerPathPrefix.'Deprecations.log')) {
            return [];
        }

        if ('' === $logContent = trim(file_get_contents($file))) {
            return [];
        }

        $bootTime = filemtime($file);
        $logs = [];
        foreach (unserialize($logContent) as $log) {
            $log['context'] = ['exception' => new SilencedErrorContext($log['type'], $log['file'], $log['line'], $log['trace'], $log['count'])];
            $log['timestamp'] = $bootTime;
            $log['timestamp_rfc3339'] = (new \DateTimeImmutable())->setTimestamp($bootTime)->format(\DateTimeInterface::RFC3339_EXTENDED);
            $log['priority'] = 100;
            $log['priorityName'] = 'DEBUG';
            $log['channel'] = null;
            $log['scream'] = false;
            unset($log['type'], $log['file'], $log['line'], $log['trace'], $log['trace'], $log['count']);
            $logs[] = $log;
        }

        return $logs;
    }

    private function getContainerCompilerLogs(string $compilerLogsFilepath = null): array
    {
        if (!is_file($compilerLogsFilepath)) {
            return [];
        }

        $logs = [];
        foreach (file($compilerLogsFilepath, \FILE_IGNORE_NEW_LINES) as $log) {
            $log = explode(': ', $log, 2);
            if (!isset($log[1]) || !preg_match('/^[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*+(?:\\\\[a-zA-Z_\x7f-\xff][a-zA-Z0-9_\x7f-\xff]*+)++$/', $log[0])) {
                $log = ['Unknown Compiler Pass', implode(': ', $log)];
            }

            $logs[$log[0]][] = ['message' => $log[1]];
        }

        return $logs;
    }

    private function sanitizeLogs(array $logs)
    {
        $sanitizedLogs = [];
        $silencedLogs = [];

        foreach ($logs as $log) {
            if (!$this->isSilencedOrDeprecationErrorLog($log)) {
                $sanitizedLogs[] = $log;

                continue;
            }

            $message = '_'.$log['message'];
            $exception = $log['context']['exception'];

            if ($exception instanceof SilencedErrorContext) {
                if (isset($silencedLogs[$h = spl_object_hash($exception)])) {
                    continue;
                }
                $silencedLogs[$h] = true;

                if (!isset($sanitizedLogs[$message])) {
                    $sanitizedLogs[$message] = $log + [
                        'errorCount' => 0,
                        'scream' => true,
                    ];
                }
                $sanitizedLogs[$message]['errorCount'] += $exception->count;

                continue;
            }

            $errorId = md5("{$exception->getSeverity()}/{$exception->getLine()}/{$exception->getFile()}\0{$message}", true);

            if (isset($sanitizedLogs[$errorId])) {
                ++$sanitizedLogs[$errorId]['errorCount'];
            } else {
                $log += [
                    'errorCount' => 1,
                    'scream' => false,
                ];

                $sanitizedLogs[$errorId] = $log;
            }
        }

        return array_values($sanitizedLogs);
    }

    private function isSilencedOrDeprecationErrorLog(array $log): bool
    {
        if (!isset($log['context']['exception'])) {
            return false;
        }

        $exception = $log['context']['exception'];

        if ($exception instanceof SilencedErrorContext) {
            return true;
        }

        if ($exception instanceof \ErrorException && \in_array($exception->getSeverity(), [\E_DEPRECATED, \E_USER_DEPRECATED], true)) {
            return true;
        }

        return false;
    }

    private function computeErrorsCount(array $containerDeprecationLogs): array
    {
        $silencedLogs = [];
        $count = [
            'error_count' => $this->logger->countErrors($this->currentRequest),
            'deprecation_count' => 0,
            'warning_count' => 0,
            'scream_count' => 0,
            'priorities' => [],
        ];

        foreach ($this->logger->getLogs($this->currentRequest) as $log) {
            if (isset($count['priorities'][$log['priority']])) {
                ++$count['priorities'][$log['priority']]['count'];
            } else {
                $count['priorities'][$log['priority']] = [
                    'count' => 1,
                    'name' => $log['priorityName'],
                ];
            }
            if ('WARNING' === $log['priorityName']) {
                ++$count['warning_count'];
            }

            if ($this->isSilencedOrDeprecationErrorLog($log)) {
                $exception = $log['context']['exception'];
                if ($exception instanceof SilencedErrorContext) {
                    if (isset($silencedLogs[$h = spl_object_hash($exception)])) {
                        continue;
                    }
                    $silencedLogs[$h] = true;
                    $count['scream_count'] += $exception->count;
                } else {
                    ++$count['deprecation_count'];
=======
    private function sanitizeLogs($logs)
    {
        $errorContextById = array();
        $sanitizedLogs = array();

        foreach ($logs as $log) {
            $context = $this->sanitizeContext($log['context']);

            if (isset($context['type'], $context['file'], $context['line'], $context['level'])) {
                $errorId = md5("{$context['type']}/{$context['line']}/{$context['file']}\x00{$log['message']}", true);
                $silenced = !($context['type'] & $context['level']);
                if (isset($this->errorNames[$context['type']])) {
                    $context = array_merge(array('name' => $this->errorNames[$context['type']]), $context);
                }

                if (isset($errorContextById[$errorId])) {
                    if (isset($errorContextById[$errorId]['errorCount'])) {
                        ++$errorContextById[$errorId]['errorCount'];
                    } else {
                        $errorContextById[$errorId]['errorCount'] = 2;
                    }

                    if (!$silenced && isset($errorContextById[$errorId]['scream'])) {
                        unset($errorContextById[$errorId]['scream']);
                        $errorContextById[$errorId]['level'] = $context['level'];
                    }

                    continue;
                }

                $errorContextById[$errorId] = &$context;
                if ($silenced) {
                    $context['scream'] = true;
                }

                $log['context'] = &$context;
                unset($context);
            } else {
                $log['context'] = $context;
            }

            $sanitizedLogs[] = $log;
        }

        return $sanitizedLogs;
    }

    private function sanitizeContext($context)
    {
        if (is_array($context)) {
            foreach ($context as $key => $value) {
                $context[$key] = $this->sanitizeContext($value);
            }

            return $context;
        }

        if (is_resource($context)) {
            return sprintf('Resource(%s)', get_resource_type($context));
        }

        if (is_object($context)) {
            return sprintf('Object(%s)', get_class($context));
        }

        return $context;
    }

    private function computeErrorsCount()
    {
        $count = array(
            'error_count' => $this->logger->countErrors(),
            'deprecation_count' => 0,
            'scream_count' => 0,
            'priorities' => array(),
        );

        foreach ($this->logger->getLogs() as $log) {
            if (isset($count['priorities'][$log['priority']])) {
                ++$count['priorities'][$log['priority']]['count'];
            } else {
                $count['priorities'][$log['priority']] = array(
                    'count' => 1,
                    'name' => $log['priorityName'],
                );
            }

            if (isset($log['context']['type'], $log['context']['level'])) {
                if (E_DEPRECATED === $log['context']['type'] || E_USER_DEPRECATED === $log['context']['type']) {
                    ++$count['deprecation_count'];
                } elseif (!($log['context']['type'] & $log['context']['level'])) {
                    ++$count['scream_count'];
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            }
        }

<<<<<<< HEAD
        foreach ($containerDeprecationLogs as $deprecationLog) {
            $count['deprecation_count'] += $deprecationLog['context']['exception']->count;
        }

=======
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        ksort($count['priorities']);

        return $count;
    }
}
