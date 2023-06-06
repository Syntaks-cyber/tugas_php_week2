<?php

/*
 * This file is part of the Symfony package.
 *
 * (c) Fabien Potencier <fabien@symfony.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

namespace Symfony\Component\HttpKernel\EventListener;

use Psr\Log\LoggerInterface;
<<<<<<< HEAD
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleEvent;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
use Symfony\Component\ErrorHandler\ErrorHandler;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;
=======
use Symfony\Component\Debug\ErrorHandler;
use Symfony\Component\Debug\ExceptionHandler;
use Symfony\Component\EventDispatcher\Event;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\Event\KernelEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\Console\Event\ConsoleEvent;
use Symfony\Component\Console\Output\ConsoleOutputInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

/**
 * Configures errors and exceptions handlers.
 *
 * @author Nicolas Grekas <p@tchwork.com>
<<<<<<< HEAD
 *
 * @final
 *
 * @internal since Symfony 5.3
 */
class DebugHandlersListener implements EventSubscriberInterface
{
    private $earlyHandler;
    private $exceptionHandler;
    private $logger;
    private $deprecationLogger;
    private $levels;
    private $throwAt;
    private $scream;
    private $scope;
    private $firstCall = true;
    private $hasTerminatedWithException;

    /**
     * @param callable|null  $exceptionHandler A handler that must support \Throwable instances that will be called on Exception
     * @param array|int|null $levels           An array map of E_* to LogLevel::* or an integer bit field of E_* constants
     * @param int|null       $throwAt          Thrown errors in a bit field of E_* constants, or null to keep the current value
     * @param bool           $scream           Enables/disables screaming mode, where even silenced errors are logged
     * @param bool           $scope            Enables/disables scoping mode
     */
    public function __construct(callable $exceptionHandler = null, LoggerInterface $logger = null, $levels = \E_ALL, ?int $throwAt = \E_ALL, bool $scream = true, $scope = true, $deprecationLogger = null, $fileLinkFormat = null)
    {
        if (!\is_bool($scope)) {
            trigger_deprecation('symfony/http-kernel', '5.4', 'Passing a $fileLinkFormat is deprecated.');
            $scope = $deprecationLogger;
            $deprecationLogger = $fileLinkFormat;
        }

        $handler = set_exception_handler('is_int');
        $this->earlyHandler = \is_array($handler) ? $handler[0] : null;
        restore_exception_handler();

        $this->exceptionHandler = $exceptionHandler;
        $this->logger = $logger;
        $this->levels = $levels ?? \E_ALL;
        $this->throwAt = \is_int($throwAt) ? $throwAt : (null === $throwAt ? null : ($throwAt ? \E_ALL : null));
        $this->scream = $scream;
        $this->scope = $scope;
        $this->deprecationLogger = $deprecationLogger;
=======
 */
class DebugHandlersListener implements EventSubscriberInterface
{
    private $exceptionHandler;
    private $logger;
    private $levels;
    private $throwAt;
    private $scream;
    private $fileLinkFormat;
    private $firstCall = true;

    /**
     * @param callable|null        $exceptionHandler A handler that will be called on Exception
     * @param LoggerInterface|null $logger           A PSR-3 logger
     * @param array|int            $levels           An array map of E_* to LogLevel::* or an integer bit field of E_* constants
     * @param int|null             $throwAt          Thrown errors in a bit field of E_* constants, or null to keep the current value
     * @param bool                 $scream           Enables/disables screaming mode, where even silenced errors are logged
     * @param string               $fileLinkFormat   The format for links to source files
     */
    public function __construct(callable $exceptionHandler = null, LoggerInterface $logger = null, $levels = E_ALL, $throwAt = E_ALL, $scream = true, $fileLinkFormat = null)
    {
        $this->exceptionHandler = $exceptionHandler;
        $this->logger = $logger;
        $this->levels = null === $levels ? E_ALL : $levels;
        $this->throwAt = is_numeric($throwAt) ? (int) $throwAt : (null === $throwAt ? null : ($throwAt ? E_ALL : null));
        $this->scream = (bool) $scream;
        $this->fileLinkFormat = $fileLinkFormat ?: ini_get('xdebug.file_link_format') ?: get_cfg_var('xdebug.file_link_format');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    /**
     * Configures the error handler.
<<<<<<< HEAD
     */
    public function configure(object $event = null)
    {
        if ($event instanceof ConsoleEvent && !\in_array(\PHP_SAPI, ['cli', 'phpdbg'], true)) {
            return;
        }
        if (!$event instanceof KernelEvent ? !$this->firstCall : !$event->isMainRequest()) {
            return;
        }
        $this->firstCall = $this->hasTerminatedWithException = false;

        $handler = set_exception_handler('is_int');
        $handler = \is_array($handler) ? $handler[0] : null;
        restore_exception_handler();

        if (!$handler instanceof ErrorHandler) {
            $handler = $this->earlyHandler;
        }

        if ($handler instanceof ErrorHandler) {
            if ($this->logger || $this->deprecationLogger) {
                $this->setDefaultLoggers($handler);
                if (\is_array($this->levels)) {
                    $levels = 0;
                    foreach ($this->levels as $type => $log) {
                        $levels |= $type;
                    }
                } else {
                    $levels = $this->levels;
                }

                if ($this->scream) {
                    $handler->screamAt($levels);
                }
                if ($this->scope) {
                    $handler->scopeAt($levels & ~\E_USER_DEPRECATED & ~\E_DEPRECATED);
                } else {
                    $handler->scopeAt(0, true);
                }
                $this->logger = $this->deprecationLogger = $this->levels = null;
            }
            if (null !== $this->throwAt) {
                $handler->throwAt($this->throwAt, true);
=======
     *
     * @param Event|null $event The triggering event
     */
    public function configure(Event $event = null)
    {
        if (!$this->firstCall) {
            return;
        }
        $this->firstCall = false;
        if ($this->logger || null !== $this->throwAt) {
            $handler = set_error_handler('var_dump');
            $handler = is_array($handler) ? $handler[0] : null;
            restore_error_handler();
            if ($handler instanceof ErrorHandler) {
                if ($this->logger) {
                    $handler->setDefaultLogger($this->logger, $this->levels);
                    if (is_array($this->levels)) {
                        $scream = 0;
                        foreach ($this->levels as $type => $log) {
                            $scream |= $type;
                        }
                    } else {
                        $scream = $this->levels;
                    }
                    if ($this->scream) {
                        $handler->screamAt($scream);
                    }
                    $this->logger = $this->levels = null;
                }
                if (null !== $this->throwAt) {
                    $handler->throwAt($this->throwAt, true);
                }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
        }
        if (!$this->exceptionHandler) {
            if ($event instanceof KernelEvent) {
<<<<<<< HEAD
                if (method_exists($kernel = $event->getKernel(), 'terminateWithException')) {
                    $request = $event->getRequest();
                    $hasRun = &$this->hasTerminatedWithException;
                    $this->exceptionHandler = static function (\Throwable $e) use ($kernel, $request, &$hasRun) {
                        if ($hasRun) {
                            throw $e;
                        }

                        $hasRun = true;
                        $kernel->terminateWithException($e, $request);
                    };
=======
                if (method_exists($event->getKernel(), 'terminateWithException')) {
                    $this->exceptionHandler = array($event->getKernel(), 'terminateWithException');
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                }
            } elseif ($event instanceof ConsoleEvent && $app = $event->getCommand()->getApplication()) {
                $output = $event->getOutput();
                if ($output instanceof ConsoleOutputInterface) {
                    $output = $output->getErrorOutput();
                }
<<<<<<< HEAD
                $this->exceptionHandler = static function (\Throwable $e) use ($app, $output) {
                    $app->renderThrowable($e, $output);
=======
                $this->exceptionHandler = function ($e) use ($app, $output) {
                    $app->renderException($e, $output);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                };
            }
        }
        if ($this->exceptionHandler) {
<<<<<<< HEAD
            if ($handler instanceof ErrorHandler) {
                $handler->setExceptionHandler($this->exceptionHandler);
=======
            $handler = set_exception_handler('var_dump');
            $handler = is_array($handler) ? $handler[0] : null;
            restore_exception_handler();
            if ($handler instanceof ErrorHandler) {
                $h = $handler->setExceptionHandler('var_dump') ?: $this->exceptionHandler;
                $handler->setExceptionHandler($h);
                $handler = is_array($h) ? $h[0] : null;
            }
            if ($handler instanceof ExceptionHandler) {
                $handler->setHandler($this->exceptionHandler);
                if (null !== $this->fileLinkFormat) {
                    $handler->setFileLinkFormat($this->fileLinkFormat);
                }
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            }
            $this->exceptionHandler = null;
        }
    }

<<<<<<< HEAD
    private function setDefaultLoggers(ErrorHandler $handler): void
    {
        if (\is_array($this->levels)) {
            $levelsDeprecatedOnly = [];
            $levelsWithoutDeprecated = [];
            foreach ($this->levels as $type => $log) {
                if (\E_DEPRECATED == $type || \E_USER_DEPRECATED == $type) {
                    $levelsDeprecatedOnly[$type] = $log;
                } else {
                    $levelsWithoutDeprecated[$type] = $log;
                }
            }
        } else {
            $levelsDeprecatedOnly = $this->levels & (\E_DEPRECATED | \E_USER_DEPRECATED);
            $levelsWithoutDeprecated = $this->levels & ~\E_DEPRECATED & ~\E_USER_DEPRECATED;
        }

        $defaultLoggerLevels = $this->levels;
        if ($this->deprecationLogger && $levelsDeprecatedOnly) {
            $handler->setDefaultLogger($this->deprecationLogger, $levelsDeprecatedOnly);
            $defaultLoggerLevels = $levelsWithoutDeprecated;
        }

        if ($this->logger && $defaultLoggerLevels) {
            $handler->setDefaultLogger($this->logger, $defaultLoggerLevels);
        }
    }

    public static function getSubscribedEvents(): array
    {
        $events = [KernelEvents::REQUEST => ['configure', 2048]];

        if (\defined('Symfony\Component\Console\ConsoleEvents::COMMAND')) {
            $events[ConsoleEvents::COMMAND] = ['configure', 2048];
=======
    public static function getSubscribedEvents()
    {
        $events = array(KernelEvents::REQUEST => array('configure', 2048));

        if (defined('Symfony\Component\Console\ConsoleEvents::COMMAND')) {
            $events[ConsoleEvents::COMMAND] = array('configure', 2048);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        }

        return $events;
    }
}
