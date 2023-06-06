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
// @codeCoverageIgnoreStart
use Symfony\Component\Translation\PluralizationRules;

if (class_exists('Symfony\\Component\\Translation\\PluralizationRules')) {
    PluralizationRules::set(static function ($number) {
        return (($number % 10 == 1) && ($number % 100 != 11)) ? 0 : ((($number % 10 >= 2) && ($number % 10 <= 4) && (($number % 100 < 10) || ($number % 100 >= 20))) ? 1 : 2);
    }, 'sh');
}
// @codeCoverageIgnoreEnd

/*
 * Authors:
 * - Томица Кораћ
 * - Enrique Vidal
 * - Christopher Dell
 * - dmilisic
 * - danijel
 * - Miroslav Matkovic (mikki021)
 */
return [
    'diff_now' => 'sada',
    'diff_yesterday' => 'juče',
    'diff_tomorrow' => 'sutra',
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'DD/MM/YYYY',
        'LL' => 'MMMM D, YYYY',
        'LLL' => 'DD MMM HH:mm',
        'LLLL' => 'MMMM DD, YYYY HH:mm',
    ],
    'year' => ':count godina|:count godine|:count godina',
    'y' => ':count g.',
    'month' => ':count mesec|:count meseca|:count meseci',
    'm' => ':count m.',
    'week' => ':count nedelja|:count nedelje|:count nedelja',
    'w' => ':count n.',
    'day' => ':count dan|:count dana|:count dana',
    'd' => ':count d.',
    'hour' => ':count sat|:count sata|:count sati',
    'h' => ':count č.',
    'minute' => ':count minut|:count minuta|:count minuta',
    'min' => ':count min.',
    'second' => ':count sekund|:count sekunde|:count sekundi',
    's' => ':count s.',
=======
\Symfony\Component\Translation\PluralizationRules::set(function ($number) {
    return ((1 == $number % 10) && (11 != $number % 100)) ? 0 : ((($number % 10 >= 2) && ($number % 10 <= 4) && (($number % 100 < 10) || ($number % 100 >= 20))) ? 1 : 2);
}, 'sh');

return array(
    'year' => ':count godina|:count godine|:count godina',
    'y' => ':count godina|:count godine|:count godina',
    'month' => ':count mesec|:count meseca|:count meseci',
    'm' => ':count mesec|:count meseca|:count meseci',
    'week' => ':count nedelja|:count nedelje|:count nedelja',
    'w' => ':count nedelja|:count nedelje|:count nedelja',
    'day' => ':count dan|:count dana|:count dana',
    'd' => ':count dan|:count dana|:count dana',
    'hour' => ':count čas|:count časa|:count časova',
    'h' => ':count čas|:count časa|:count časova',
    'minute' => ':count minut|:count minuta|:count minuta',
    'min' => ':count minut|:count minuta|:count minuta',
    'second' => ':count sekund|:count sekunda|:count sekundi',
    's' => ':count sekund|:count sekunda|:count sekundi',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    'ago' => 'pre :time',
    'from_now' => 'za :time',
    'after' => 'nakon :time',
    'before' => ':time raniјe',
<<<<<<< HEAD
    'weekdays' => ['Nedelja', 'Ponedeljak', 'Utorak', 'Sreda', 'Četvrtak', 'Petak', 'Subota'],
    'weekdays_short' => ['Ned', 'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'],
    'weekdays_min' => ['Ned', 'Pon', 'Uto', 'Sre', 'Čet', 'Pet', 'Sub'],
    'months' => ['Januar', 'Februar', 'Mart', 'April', 'Maj', 'Jun', 'Jul', 'Avgust', 'Septembar', 'Oktobar', 'Novembar', 'Decembar'],
    'months_short' => ['Jan', 'Feb', 'Mar', 'Apr', 'Maj', 'Jun', 'Jul', 'Avg', 'Sep', 'Okt', 'Nov', 'Dec'],
    'list' => [', ', ' i '],
    'meridiem' => ['pre podne', 'po podne'],
];
=======
);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
