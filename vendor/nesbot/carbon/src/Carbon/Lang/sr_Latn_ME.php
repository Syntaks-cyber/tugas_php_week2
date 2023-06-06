<?php

<<<<<<< HEAD
/**
=======
/*
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
 * This file is part of the Carbon package.
 *
 * (c) Brian Nesbitt <brian@nesbot.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

<<<<<<< HEAD
/*
 * Authors:
 * - Glavić
 * - Milos Sakovic
 */

use Carbon\CarbonInterface;
use Symfony\Component\Translation\PluralizationRules;

// @codeCoverageIgnoreStart
if (class_exists(PluralizationRules::class)) {
    PluralizationRules::set(static function ($number) {
        return PluralizationRules::get($number, 'sr');
    }, 'sr_Latn_ME');
}
// @codeCoverageIgnoreEnd

return array_replace_recursive(require __DIR__.'/sr.php', [
    'month' => ':count mjesec|:count mjeseca|:count mjeseci',
    'week' => ':count nedjelja|:count nedjelje|:count nedjelja',
    'second' => ':count sekund|:count sekunde|:count sekundi',
=======
return array(
    'year' => '{2,3,4,22,23,24,32,33,34,42,43,44,52,53,54}:count godine|[0,Inf[ :count godina',
    'y' => ':count g.',
    'month' => '{1} :count mjesec|{2,3,4}:count mjeseca|[5,Inf[ :count mjeseci',
    'm' => ':count mj.',
    'week' => '{1} :count nedjelja|{2,3,4}:count nedjelje|[5,Inf[ :count nedjelja',
    'w' => ':count ned.',
    'day' => '{1,21,31} :count dan|[2,Inf[ :count dana',
    'd' => ':count d.',
    'hour' => '{1,21} :count sat|{2,3,4,22,23,24}:count sata|[5,Inf[ :count sati',
    'h' => ':count č.',
    'minute' => '{1,21,31,41,51} :count minut|[2,Inf[ :count minuta',
    'min' => ':count min.',
    'second' => '{1,21,31,41,51} :count sekund|{2,3,4,22,23,24,32,33,34,42,43,44,52,53,54}:count sekunde|[5,Inf[:count sekundi',
    's' => ':count sek.',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    'ago' => 'prije :time',
    'from_now' => 'za :time',
    'after' => ':time nakon',
    'before' => ':time prije',
<<<<<<< HEAD
    'week_from_now' => ':count nedjelju|:count nedjelje|:count nedjelja',
    'week_ago' => ':count nedjelju|:count nedjelje|:count nedjelja',
    'second_ago' => ':count sekund|:count sekunde|:count sekundi',
    'diff_tomorrow' => 'sjutra',
    'calendar' => [
        'nextDay' => '[sjutra u] LT',
        'nextWeek' => function (CarbonInterface $date) {
            switch ($date->dayOfWeek) {
                case 0:
                    return '[u nedjelju u] LT';
                case 3:
                    return '[u srijedu u] LT';
                case 6:
                    return '[u subotu u] LT';
                default:
                    return '[u] dddd [u] LT';
            }
        },
        'lastWeek' => function (CarbonInterface $date) {
            switch ($date->dayOfWeek) {
                case 0:
                    return '[prošle nedjelje u] LT';
                case 1:
                    return '[prošle nedjelje u] LT';
                case 2:
                    return '[prošlog utorka u] LT';
                case 3:
                    return '[prošle srijede u] LT';
                case 4:
                    return '[prošlog četvrtka u] LT';
                case 5:
                    return '[prošlog petka u] LT';
                default:
                    return '[prošle subote u] LT';
            }
        },
    ],
    'weekdays' => ['nedjelja', 'ponedjeljak', 'utorak', 'srijeda', 'četvrtak', 'petak', 'subota'],
    'weekdays_short' => ['ned.', 'pon.', 'uto.', 'sri.', 'čet.', 'pet.', 'sub.'],
]);
=======

    'year_from_now' => '{1,21,31,41,51} :count godinu|{2,3,4,22,23,24,32,33,34,42,43,44,52,53,54} :count godine|[5,Inf[ :count godina',
    'year_ago' => '{1,21,31,41,51} :count godinu|{2,3,4,22,23,24,32,33,34,42,43,44,52,53,54} :count godine|[5,Inf[ :count godina',

    'week_from_now' => '{1} :count nedjelju|{2,3,4} :count nedjelje|[5,Inf[ :count nedjelja',
    'week_ago' => '{1} :count nedjelju|{2,3,4} :count nedjelje|[5,Inf[ :count nedjelja',

    'diff_now' => 'upravo sada',
    'diff_yesterday' => 'juče',
    'diff_tomorrow' => 'sutra',
    'diff_before_yesterday' => 'prekjuče',
    'diff_after_tomorrow' => 'preksutra',
);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
