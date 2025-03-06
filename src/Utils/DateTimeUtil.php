<?php

namespace Meanify\LaravelHelpers\Utils;

use Carbon\Carbon;

class DateTimeUtil
{
    /**
     * @return string
     */
    public function getDateFormatByLanguage(?string $lang = null)
    {
        $language = $lang ?? utils()->request()->getUserLanguageFromRequest();

        $format = 'Y-m-d';

        if ($language == nikita()->APPLICATION_LANGUAGE_PT_BR)
        {
            $format = 'd/m/Y';
        } elseif ($language == nikita()->APPLICATION_LANGUAGE_EN_US)
        {
            $format = 'm/d/Y';
        }

        return $format;
    }

    /**
     * @return string
     */
    public function convertSecondsToTime($seconds)
    {
        $seconds = round($seconds);

        return sprintf('%02d:%02d:%02d', abs($seconds / 3600), abs($seconds / 60 % 60), abs($seconds % 60));
    }

    /**
     * @notes Check if string is a valid date (like at function isDate, but validating the date)
     *
     * @param  null  $month
     * @param  null  $day
     * @return bool
     */
    public function checkDateExists($year, $month = null, $day = null)
    {
        try
        {
            if ($day === null)
            {
                [$year, $month, $day] = explode('-', $year);
            }

            $result = checkdate($month, $day, $year);
        } catch (\Throwable $exception)
        {
            $result = false;
        }

        return $result;
    }

    /**
     * @param $start_period
     * @param $end_period
     * @param $from_format
     * @param $to_format
     * @return array
     */
    public function getRangePeriods($start_period, $end_period, $from_format = 'Y-m', $to_format = 'Y-m')
    {
        $periods = [];
        $start   = Carbon::createFromFormat($from_format, $start_period);
        $end     = Carbon::createFromFormat($from_format, $end_period);

        while($start->format($to_format) <= $end->format($to_format))
        {
            $periods[] = $start->format($to_format);

            $start->addMonth();
        }

        return $periods;
    }
}
