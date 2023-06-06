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

<<<<<<< HEAD
use Symfony\Component\Console\ConsoleEvents;
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
use Symfony\Component\VarDumper\Server\Connection;
=======
use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\VarDumper\Cloner\ClonerInterface;
use Symfony\Component\VarDumper\Dumper\DataDumperInterface;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
use Symfony\Component\VarDumper\VarDumper;

/**
 * Configures dump() handler.
 *
 * @author Nicolas Grekas <p@tchwork.com>
 */
class DumpListener implements EventSubscriberInterface
{
    private $cloner;
    private $dumper;
<<<<<<< HEAD
    private $connection;

    public function __construct(ClonerInterface $cloner, DataDumperInterface $dumper, Connection $connection = null)
    {
        $this->cloner = $cloner;
        $this->dumper = $dumper;
        $this->connection = $connection;
=======

    /**
     * @param ClonerInterface     $cloner Cloner service
     * @param DataDumperInterface $dumper Dumper service
     */
    public function __construct(ClonerInterface $cloner, DataDumperInterface $dumper)
    {
        $this->cloner = $cloner;
        $this->dumper = $dumper;
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }

    public function configure()
    {
        $cloner = $this->cloner;
        $dumper = $this->dumper;
<<<<<<< HEAD
        $connection = $this->connection;

        VarDumper::setHandler(static function ($var) use ($cloner, $dumper, $connection) {
            $data = $cloner->cloneVar($var);

            if (!$connection || !$connection->write($data)) {
                $dumper->dump($data);
            }
=======

        VarDumper::setHandler(function ($var) use ($cloner, $dumper) {
            $dumper->dump($cloner->cloneVar($var));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
        });
    }

    public static function getSubscribedEvents()
    {
<<<<<<< HEAD
        if (!class_exists(ConsoleEvents::class)) {
            return [];
        }

        // Register early to have a working dump() as early as possible
        return [ConsoleEvents::COMMAND => ['configure', 1024]];
=======
        // Register early to have a working dump() as early as possible
        return array(KernelEvents::REQUEST => array('configure', 1024));
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
