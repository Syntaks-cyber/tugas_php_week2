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
 * - Alessandro Di Felice
 * - François B
 * - Tim Fish
 * - Gabriel Monteagudo
 * - JD Isaacks
 * - yiannisdesp
 * - Ilias Kasmeridis (iliaskasm)
 */

use Carbon\CarbonInterface;

return [
    'year' => ':count χρόνος|:count χρόνια',
    'a_year' => 'ένας χρόνος|:count χρόνια',
    'y' => ':count χρ.',
    'month' => ':count μήνας|:count μήνες',
    'a_month' => 'ένας μήνας|:count μήνες',
    'm' => ':count μήν.',
    'week' => ':count εβδομάδα|:count εβδομάδες',
    'a_week' => 'μια εβδομάδα|:count εβδομάδες',
    'w' => ':count εβδ.',
    'day' => ':count μέρα|:count μέρες',
    'a_day' => 'μία μέρα|:count μέρες',
    'd' => ':count μέρ.',
    'hour' => ':count ώρα|:count ώρες',
    'a_hour' => 'μία ώρα|:count ώρες',
    'h' => ':count ώρα|:count ώρες',
    'minute' => ':count λεπτό|:count λεπτά',
    'a_minute' => 'ένα λεπτό|:count λεπτά',
    'min' => ':count λεπ.',
    'second' => ':count δευτερόλεπτο|:count δευτερόλεπτα',
    'a_second' => 'λίγα δευτερόλεπτα|:count δευτερόλεπτα',
    's' => ':count δευ.',
    'ago' => 'πριν :time',
    'from_now' => 'σε :time',
    'after' => ':time μετά',
    'before' => ':time πριν',
    'diff_now' => 'τώρα',
    'diff_today' => 'Σήμερα',
    'diff_today_regexp' => 'Σήμερα(?:\\s+{})?',
    'diff_yesterday' => 'χθες',
    'diff_yesterday_regexp' => 'Χθες(?:\\s+{})?',
    'diff_tomorrow' => 'αύριο',
    'diff_tomorrow_regexp' => 'Αύριο(?:\\s+{})?',
    'formats' => [
        'LT' => 'h:mm A',
        'LTS' => 'h:mm:ss A',
        'L' => 'DD/MM/YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY h:mm A',
        'LLLL' => 'dddd, D MMMM YYYY h:mm A',
    ],
    'calendar' => [
        'sameDay' => '[Σήμερα {}] LT',
        'nextDay' => '[Αύριο {}] LT',
        'nextWeek' => 'dddd [{}] LT',
        'lastDay' => '[Χθες {}] LT',
        'lastWeek' => function (CarbonInterface $current) {
            switch ($current->dayOfWeek) {
                case 6:
                    return '[το προηγούμενο] dddd [{}] LT';
                default:
                    return '[την προηγούμενη] dddd [{}] LT';
            }
        },
        'sameElse' => 'L',
    ],
    'ordinal' => ':numberη',
    'meridiem' => ['ΠΜ', 'ΜΜ', 'πμ', 'μμ'],
    'months' => ['Ιανουαρίου', 'Φεβρουαρίου', 'Μαρτίου', 'Απριλίου', 'Μαΐου', 'Ιουνίου', 'Ιουλίου', 'Αυγούστου', 'Σεπτεμβρίου', 'Οκτωβρίου', 'Νοεμβρίου', 'Δεκεμβρίου'],
    'months_standalone' => ['Ιανουάριος', 'Φεβρουάριος', 'Μάρτιος', 'Απρίλιος', 'Μάιος', 'Ιούνιος', 'Ιούλιος', 'Αύγουστος', 'Σεπτέμβριος', 'Οκτώβριος', 'Νοέμβριος', 'Δεκέμβριος'],
    'months_regexp' => '/(D[oD]?[\s,]+MMMM|L{2,4}|l{2,4})/',
    'months_short' => ['Ιαν', 'Φεβ', 'Μαρ', 'Απρ', 'Μαϊ', 'Ιουν', 'Ιουλ', 'Αυγ', 'Σεπ', 'Οκτ', 'Νοε', 'Δεκ'],
    'weekdays' => ['Κυριακή', 'Δευτέρα', 'Τρίτη', 'Τετάρτη', 'Πέμπτη', 'Παρασκευή', 'Σάββατο'],
    'weekdays_short' => ['Κυρ', 'Δευ', 'Τρι', 'Τετ', 'Πεμ', 'Παρ', 'Σαβ'],
    'weekdays_min' => ['Κυ', 'Δε', 'Τρ', 'Τε', 'Πε', 'Πα', 'Σα'],
    'first_day_of_week' => 1,
    'day_of_first_week_of_year' => 4,
    'list' => [', ', ' και '],
];
=======
return array(
    'year' => ':count χρόνος|:count χρόνια',
    'y' => ':count χρόνος|:count χρόνια',
    'month' => ':count μήνας|:count μήνες',
    'm' => ':count μήνας|:count μήνες',
    'week' => ':count εβδομάδα|:count εβδομάδες',
    'w' => ':count εβδομάδα|:count εβδομάδες',
    'day' => ':count μέρα|:count μέρες',
    'd' => ':count μέρα|:count μέρες',
    'hour' => ':count ώρα|:count ώρες',
    'h' => ':count ώρα|:count ώρες',
    'minute' => ':count λεπτό|:count λεπτά',
    'min' => ':count λεπτό|:count λεπτά',
    'second' => ':count δευτερόλεπτο|:count δευτερόλεπτα',
    's' => ':count δευτερόλεπτο|:count δευτερόλεπτα',
    'ago' => 'πριν από :time',
    'from_now' => 'σε :time από τώρα',
    'after' => ':time μετά',
    'before' => ':time πριν',
);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
