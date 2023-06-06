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
 * - Atef Ben Ali (atefBB)
 * - Ibrahim AshShohail
 * - MLTDev
 * - Mohamed Sabil (mohamedsabil83)
 * - Yazan Alnugnugh (yazan-alnugnugh)
 */
$months = [
    'يناير',
    'فبراير',
    'مارس',
    'أبريل',
    'مايو',
    'يونيو',
    'يوليو',
    'أغسطس',
    'سبتمبر',
    'أكتوبر',
    'نوفمبر',
    'ديسمبر',
];

return [
    'year' => implode('|', ['{0}:count سنة', '{1}سنة', '{2}سنتين', ']2,11[:count سنوات', ']10,Inf[:count سنة']),
    'a_year' => implode('|', ['{0}:count سنة', '{1}سنة', '{2}سنتين', ']2,11[:count سنوات', ']10,Inf[:count سنة']),
    'month' => implode('|', ['{0}:count شهر', '{1}شهر', '{2}شهرين', ']2,11[:count أشهر', ']10,Inf[:count شهر']),
    'a_month' => implode('|', ['{0}:count شهر', '{1}شهر', '{2}شهرين', ']2,11[:count أشهر', ']10,Inf[:count شهر']),
    'week' => implode('|', ['{0}:count أسبوع', '{1}أسبوع', '{2}أسبوعين', ']2,11[:count أسابيع', ']10,Inf[:count أسبوع']),
    'a_week' => implode('|', ['{0}:count أسبوع', '{1}أسبوع', '{2}أسبوعين', ']2,11[:count أسابيع', ']10,Inf[:count أسبوع']),
    'day' => implode('|', ['{0}:count يوم', '{1}يوم', '{2}يومين', ']2,11[:count أيام', ']10,Inf[:count يوم']),
    'a_day' => implode('|', ['{0}:count يوم', '{1}يوم', '{2}يومين', ']2,11[:count أيام', ']10,Inf[:count يوم']),
    'hour' => implode('|', ['{0}:count ساعة', '{1}ساعة', '{2}ساعتين', ']2,11[:count ساعات', ']10,Inf[:count ساعة']),
    'a_hour' => implode('|', ['{0}:count ساعة', '{1}ساعة', '{2}ساعتين', ']2,11[:count ساعات', ']10,Inf[:count ساعة']),
    'minute' => implode('|', ['{0}:count دقيقة', '{1}دقيقة', '{2}دقيقتين', ']2,11[:count دقائق', ']10,Inf[:count دقيقة']),
    'a_minute' => implode('|', ['{0}:count دقيقة', '{1}دقيقة', '{2}دقيقتين', ']2,11[:count دقائق', ']10,Inf[:count دقيقة']),
    'second' => implode('|', ['{0}:count ثانية', '{1}ثانية', '{2}ثانيتين', ']2,11[:count ثواني', ']10,Inf[:count ثانية']),
    'a_second' => implode('|', ['{0}:count ثانية', '{1}ثانية', '{2}ثانيتين', ']2,11[:count ثواني', ']10,Inf[:count ثانية']),
=======
return array(
    'year' => '{0}سنة|{1}سنة|{2}سنتين|[3,10]:count سنوات|[11,Inf]:count سنة',
    'y' => '{0}سنة|{1}سنة|{2}سنتين|[3,10]:count سنوات|[11,Inf]:count سنة',
    'month' => '{0}شهر|{1} شهر|{2}شهرين|[3,10]:count أشهر|[11,Inf]:count شهر',
    'm' => '{0}شهر|{1} شهر|{2}شهرين|[3,10]:count أشهر|[11,Inf]:count شهر',
    'week' => '{0}أسبوع|{1}أسبوع|{2}أسبوعين|[3,10]:count أسابيع|[11,Inf]:count أسبوع',
    'w' => '{0}أسبوع|{1}أسبوع|{2}أسبوعين|[3,10]:count أسابيع|[11,Inf]:count أسبوع',
    'day' => '{0}يوم|{1}يوم|{2}يومين|[3,10]:count أيام|[11,Inf] يوم',
    'd' => '{0}يوم|{1}يوم|{2}يومين|[3,10]:count أيام|[11,Inf] يوم',
    'hour' => '{0}ساعة|{1}ساعة|{2}ساعتين|[3,10]:count ساعات|[11,Inf]:count ساعة',
    'h' => '{0}ساعة|{1}ساعة|{2}ساعتين|[3,10]:count ساعات|[11,Inf]:count ساعة',
    'minute' => '{0}دقيقة|{1}دقيقة|{2}دقيقتين|[3,10]:count دقائق|[11,Inf]:count دقيقة',
    'min' => '{0}دقيقة|{1}دقيقة|{2}دقيقتين|[3,10]:count دقائق|[11,Inf]:count دقيقة',
    'second' => '{0}ثانية|{1}ثانية|{2}ثانيتين|[3,10]:count ثوان|[11,Inf]:count ثانية',
    's' => '{0}ثانية|{1}ثانية|{2}ثانيتين|[3,10]:count ثوان|[11,Inf]:count ثانية',
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
    'ago' => 'منذ :time',
    'from_now' => ':time من الآن',
    'after' => 'بعد :time',
    'before' => 'قبل :time',
<<<<<<< HEAD
    'diff_now' => 'الآن',
    'diff_today' => 'اليوم',
    'diff_today_regexp' => 'اليوم(?:\\s+عند)?(?:\\s+الساعة)?',
    'diff_yesterday' => 'أمس',
    'diff_yesterday_regexp' => 'أمس(?:\\s+عند)?(?:\\s+الساعة)?',
    'diff_tomorrow' => 'غداً',
    'diff_tomorrow_regexp' => 'غدًا(?:\\s+عند)?(?:\\s+الساعة)?',
    'diff_before_yesterday' => 'قبل الأمس',
    'diff_after_tomorrow' => 'بعد غد',
    'period_recurrences' => implode('|', ['{0}مرة', '{1}مرة', '{2}:count مرتين', ']2,11[:count مرات', ']10,Inf[:count مرة']),
    'period_interval' => 'كل :interval',
    'period_start_date' => 'من :date',
    'period_end_date' => 'إلى :date',
    'months' => $months,
    'months_short' => $months,
    'weekdays' => ['الأحد', 'الاثنين', 'الثلاثاء', 'الأربعاء', 'الخميس', 'الجمعة', 'السبت'],
    'weekdays_short' => ['أحد', 'اثنين', 'ثلاثاء', 'أربعاء', 'خميس', 'جمعة', 'سبت'],
    'weekdays_min' => ['ح', 'اث', 'ثل', 'أر', 'خم', 'ج', 'س'],
    'list' => ['، ', ' و '],
    'first_day_of_week' => 6,
    'day_of_first_week_of_year' => 1,
    'formats' => [
        'LT' => 'HH:mm',
        'LTS' => 'HH:mm:ss',
        'L' => 'D/M/YYYY',
        'LL' => 'D MMMM YYYY',
        'LLL' => 'D MMMM YYYY HH:mm',
        'LLLL' => 'dddd D MMMM YYYY HH:mm',
    ],
    'calendar' => [
        'sameDay' => '[اليوم عند الساعة] LT',
        'nextDay' => '[غدًا عند الساعة] LT',
        'nextWeek' => 'dddd [عند الساعة] LT',
        'lastDay' => '[أمس عند الساعة] LT',
        'lastWeek' => 'dddd [عند الساعة] LT',
        'sameElse' => 'L',
    ],
    'meridiem' => ['ص', 'م'],
    'weekend' => [5, 6],
];
=======
);
>>>>>>> fdb0ae8042c202d617c3f5102c9bf58ec6057c17
