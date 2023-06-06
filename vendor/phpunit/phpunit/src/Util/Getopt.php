<<<<<<< HEAD
<?php declare(strict_types=1);
=======
<?php
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
/*
 * This file is part of PHPUnit.
 *
 * (c) Sebastian Bergmann <sebastian@phpunit.de>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
<<<<<<< HEAD
namespace PHPUnit\Util;

use function array_map;
use function array_merge;
use function array_shift;
use function array_slice;
use function count;
use function current;
use function explode;
use function key;
use function next;
use function preg_replace;
use function reset;
use function sort;
use function strlen;
use function strpos;
use function strstr;
use function substr;
use PHPUnit\Framework\Exception;

/**
 * @internal This class is not covered by the backward compatibility promise for PHPUnit
 */
final class Getopt
{
    /**
     * @throws Exception
     */
    public static function parse(array $args, string $short_options, array $long_options = null): array
    {
        if (empty($args)) {
            return [[], []];
        }

        $opts     = [];
        $non_opts = [];
=======

/**
 * Command-line options parsing class.
 *
 * @since Class available since Release 3.0.0
 */
class PHPUnit_Util_Getopt
{
    public static function getopt(array $args, $short_options, $long_options = null)
    {
        if (empty($args)) {
            return array(array(), array());
        }

        $opts     = array();
        $non_opts = array();
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

        if ($long_options) {
            sort($long_options);
        }

<<<<<<< HEAD
        if (isset($args[0][0]) && $args[0][0] !== '-') {
=======
        if (isset($args[0][0]) && $args[0][0] != '-') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
            array_shift($args);
        }

        reset($args);
<<<<<<< HEAD

        $args = array_map('trim', $args);

        /* @noinspection ComparisonOperandsOrderInspection */
        while (false !== $arg = current($args)) {
            $i = key($args);
            next($args);

            if ($arg === '') {
                continue;
            }

            if ($arg === '--') {
                $non_opts = array_merge($non_opts, array_slice($args, $i + 1));

                break;
            }

            if ($arg[0] !== '-' || (strlen($arg) > 1 && $arg[1] === '-' && !$long_options)) {
                $non_opts[] = $args[$i];

                continue;
            }

            if (strlen($arg) > 1 && $arg[1] === '-') {
=======
        array_map('trim', $args);

        while (list($i, $arg) = each($args)) {
            if ($arg == '') {
                continue;
            }

            if ($arg == '--') {
                $non_opts = array_merge($non_opts, array_slice($args, $i + 1));
                break;
            }

            if ($arg[0] != '-' ||
                (strlen($arg) > 1 && $arg[1] == '-' && !$long_options)) {
                $non_opts[] = $args[$i];
                continue;
            } elseif (strlen($arg) > 1 && $arg[1] == '-') {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                self::parseLongOption(
                    substr($arg, 2),
                    $long_options,
                    $opts,
                    $args
                );
            } else {
                self::parseShortOption(
                    substr($arg, 1),
                    $short_options,
                    $opts,
                    $args
                );
            }
        }

<<<<<<< HEAD
        return [$opts, $non_opts];
    }

    /**
     * @throws Exception
     */
    private static function parseShortOption(string $arg, string $short_options, array &$opts, array &$args): void
=======
        return array($opts, $non_opts);
    }

    protected static function parseShortOption($arg, $short_options, &$opts, &$args)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $argLen = strlen($arg);

        for ($i = 0; $i < $argLen; $i++) {
            $opt     = $arg[$i];
            $opt_arg = null;

<<<<<<< HEAD
            if ($arg[$i] === ':' || ($spec = strstr($short_options, $opt)) === false) {
                throw new Exception(
                    "unrecognized option -- {$opt}"
                );
            }

            if (strlen($spec) > 1 && $spec[1] === ':') {
                if ($i + 1 < $argLen) {
                    $opts[] = [$opt, substr($arg, $i + 1)];

                    break;
                }

                if (!(strlen($spec) > 2 && $spec[2] === ':')) {
                    /* @noinspection ComparisonOperandsOrderInspection */
                    if (false === $opt_arg = current($args)) {
                        throw new Exception(
                            "option requires an argument -- {$opt}"
                        );
                    }

                    next($args);
                }
            }

            $opts[] = [$opt, $opt_arg];
        }
    }

    /**
     * @throws Exception
     */
    private static function parseLongOption(string $arg, array $long_options, array &$opts, array &$args): void
=======
            if (($spec = strstr($short_options, $opt)) === false ||
                $arg[$i] == ':') {
                throw new PHPUnit_Framework_Exception(
                    "unrecognized option -- $opt"
                );
            }

            if (strlen($spec) > 1 && $spec[1] == ':') {
                if (strlen($spec) > 2 && $spec[2] == ':') {
                    if ($i + 1 < $argLen) {
                        $opts[] = array($opt, substr($arg, $i + 1));
                        break;
                    }
                } else {
                    if ($i + 1 < $argLen) {
                        $opts[] = array($opt, substr($arg, $i + 1));
                        break;
                    } elseif (list(, $opt_arg) = each($args)) {
                    } else {
                        throw new PHPUnit_Framework_Exception(
                            "option requires an argument -- $opt"
                        );
                    }
                }
            }

            $opts[] = array($opt, $opt_arg);
        }
    }

    protected static function parseLongOption($arg, $long_options, &$opts, &$args)
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    {
        $count   = count($long_options);
        $list    = explode('=', $arg);
        $opt     = $list[0];
        $opt_arg = null;

        if (count($list) > 1) {
            $opt_arg = $list[1];
        }

        $opt_len = strlen($opt);

<<<<<<< HEAD
        foreach ($long_options as $i => $long_opt) {
            $opt_start = substr($long_opt, 0, $opt_len);

            if ($opt_start !== $opt) {
=======
        for ($i = 0; $i < $count; $i++) {
            $long_opt  = $long_options[$i];
            $opt_start = substr($long_opt, 0, $opt_len);

            if ($opt_start != $opt) {
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                continue;
            }

            $opt_rest = substr($long_opt, $opt_len);

<<<<<<< HEAD
            if ($opt_rest !== '' && $i + 1 < $count && $opt[0] !== '=' && strpos($long_options[$i + 1], $opt) === 0) {
                throw new Exception(
                    "option --{$opt} is ambiguous"
                );
            }

            if (substr($long_opt, -1) === '=') {
                /* @noinspection StrlenInEmptyStringCheckContextInspection */
                if (substr($long_opt, -2) !== '==' && !strlen((string) $opt_arg)) {
                    /* @noinspection ComparisonOperandsOrderInspection */
                    if (false === $opt_arg = current($args)) {
                        throw new Exception(
                            "option --{$opt} requires an argument"
                        );
                    }

                    next($args);
                }
            } elseif ($opt_arg) {
                throw new Exception(
                    "option --{$opt} doesn't allow an argument"
=======
            if ($opt_rest != '' && $opt[0] != '=' && $i + 1 < $count &&
                $opt == substr($long_options[$i+1], 0, $opt_len)) {
                throw new PHPUnit_Framework_Exception(
                    "option --$opt is ambiguous"
                );
            }

            if (substr($long_opt, -1) == '=') {
                if (substr($long_opt, -2) != '==') {
                    if (!strlen($opt_arg) &&
                        !(list(, $opt_arg) = each($args))) {
                        throw new PHPUnit_Framework_Exception(
                            "option --$opt requires an argument"
                        );
                    }
                }
            } elseif ($opt_arg) {
                throw new PHPUnit_Framework_Exception(
                    "option --$opt doesn't allow an argument"
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
                );
            }

            $full_option = '--' . preg_replace('/={1,2}$/', '', $long_opt);
<<<<<<< HEAD
            $opts[]      = [$full_option, $opt_arg];
=======
            $opts[]      = array($full_option, $opt_arg);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17

            return;
        }

<<<<<<< HEAD
        throw new Exception("unrecognized option --{$opt}");
=======
        throw new PHPUnit_Framework_Exception("unrecognized option --$opt");
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    }
}
