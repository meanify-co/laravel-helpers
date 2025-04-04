<?php

namespace Meanify\LaravelHelpers\Utils;

use Carbon\Carbon;

class FormatterUtil
{
    private $locale;
    private $timezone;

    /**
     * @return $this
     */
    public function __construct()
    {
        $this->locale   = session()->meanify()->settings('locale') ?? config('app.locale');
        $this->timezone = session()->meanify()->settings('settings') ?? config('app.timezone');

        return $this;
    }


    /**
     * @return $this
     */
    public function setLocale($locale)
    {
        $this->locale = $locale;

        return $this;
    }

    /**
     * @return $this
     */
    public function setTimezone($timezone)
    {
        $this->timezone = $timezone;

        return $this;
    }

    /**
     * @param $value
     * @param $decimal_places
     * @return string|null
     */
    public function decimal($value, $decimal_places = 2)
    {
        $result = null;

        if ($this->locale == 'pt-BR' || $this->locale == 'br')
        {
            $result = number_format($value, $decimal_places, ',', '.');
        }
        elseif ($this->locale == 'en-US' || $this->locale == 'en')
        {
            $result = number_format($value, $decimal_places, '.', '');
        }

        return $result;
    }

    /**
     * @param $value
     * @param $original_format
     * @return string|null
     */
    public function date($value = null, $original_format = 'Y-m-d H:i:s')
    {
        $result = null;

        if(is_null($value))
        {
            $carbon = now();
        }
        else
        {
            $carbon = $original_format == 'Y-m-d H:i:s' ? Carbon::parse($value) : Carbon::createFromFormat($original_format, $value);
        }

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        if ($this->locale == 'pt-BR' || $this->locale == 'br')
        {
            $result = $carbon->locale($this->locale)->format('d/m/Y');
        }
        elseif ($this->locale == 'en-US' || $this->locale == 'en')
        {
            $result = $carbon->locale($this->locale)->format('m/d/Y');
        }

        return $result;
    }

    /**
     * @param $value
     * @param $original_format
     * @return string|null
     */
    public function dayMonth($value, $original_format = 'Y-m-d H:i:s')
    {
        $result = null;

        $carbon = $original_format == 'Y-m-d H:i:s' ? Carbon::parse($value) : Carbon::createFromFormat($original_format, $value);

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        if ($this->locale == 'pt-BR' || $this->locale == 'br')
        {
            $result = $carbon->locale($this->locale)->format('d/m');
        }
        elseif ($this->locale == 'en-US' || $this->locale == 'en')
        {
            $result = $carbon->locale($this->locale)->format('m/d');
        }

        return $result;
    }

    /**
     * @param $value
     * @param $original_format
     * @param $with_seconds
     * @param $date_time_separator
     * @return string|null
     */
    public function datetime($value, $original_format = null, $with_seconds = true, $date_time_separator = null)
    {
        $result = null;

        try
        {
            $carbon = $original_format ? Carbon::createFromFormat($original_format, $value) : Carbon::parse($value);

            if ($this->timezone)
            {
                $carbon->setTimezone($this->timezone);
            }

            if ($this->locale == 'pt-BR')
            {
                $result = $carbon->locale($this->locale)->format('d/m/Y').
                    ($date_time_separator ? " $date_time_separator " : ' às ').
                    ($with_seconds ? $carbon->locale($this->locale)->format('H:i:s') : $carbon->locale($this->locale)->format('H:i'));
            }
            elseif ($this->locale == 'en-US')
            {
                $result = $carbon->locale($this->locale)->format('m/d/Y').
                    ($date_time_separator ? " $date_time_separator " : ' at ').
                    ($with_seconds ? $carbon->locale($this->locale)->format('H:i:s') : $carbon->locale($this->locale)->format('H:i'));
            }
        }
        catch (\Exception $e)
        {
            $result = $value;
        }

        return $result;
    }

    /**
     * @param $value
     * @param $original_format
     * @param $with_seconds
     * @param $date_time_separator
     * @return string|null
     */
    public function timestamp($value, $original_format = null, $with_seconds = true, $date_time_separator = null)
    {
        return $this->datetime(Carbon::createFromTimestamp($original_format)->format('Y-m-d H:i:s'), $with_seconds, $date_time_separator);
    }

    /**
     * @param $value
     * @param $original_format
     * @param $with_seconds
     * @return string|null
     */
    public function time($value, $original_format = 'Y-m-d H:i:s', $with_seconds = false)
    {
        $carbon = $original_format == 'Y-m-d H:i:s' ? Carbon::parse($value) : Carbon::createFromFormat($original_format, $value);

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        $format = $with_seconds ? 'H:i:s' : 'H:i';

        $result = $carbon->locale($this->locale)->format($format);

        return $result;
    }

    /**
     * @param $value
     * @param $original_format
     * @return string
     */
    public function monthYear($value, $original_format = 'Y-m')
    {
        $carbon = $original_format == 'Y-m' ? Carbon::createFromFormat($original_format.'-d',$value.'-01') : Carbon::createFromFormat($original_format, $value);

        $result = $carbon->format('m/Y');

        return $result;
    }

    /**
     * @param $value
     * @param $original_format
     * @return Carbon|\Illuminate\Support\Carbon|null
     */
    public function carbonInstanceWithTimezone($value, $original_format = null)
    {
        if(isset($value))
        {
            $carbon = $original_format ? Carbon::createFromFormat($original_format, $value) : Carbon::parse($value);
        }
        else
        {
            $carbon = now();
        }

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        return $carbon;
    }

    /**
     * @return Carbon
     */
    public function carbonNowWithTimezone()
    {
        $carbon = now();

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        return $carbon;
    }



    /**
     * @param $time1
     * @param $time2
     * @param $time_format
     * @return array
     */
    public function carbonTimeDiff($time1, $time2 = null, $time_format = null)
    {
        $time_diff = null;
        $unit_diff = null;

        if(is_string($time1))
        {
            $time1 = $time_format ? Carbon::createFromFormat($time_format, $time1) : Carbon::parse($time1);
        }

        if(is_null($time2))
        {
            $time2 = now();
        }
        else if(is_string($time2))
        {
            $time2 = $time_format ? Carbon::createFromFormat($time_format, $time2) : Carbon::parse($time2);
        }

        $time1->setTimezone($this->timezone);
        $time2->setTimezone($this->timezone);

        if($time1->diffInSeconds($time2) < 30)
        {
            $time_diff = 'now';
        }
        elseif($time1->diffInSeconds($time2) < 60)
        {
            $time_diff = $time1->diffInSeconds($time2);
            $unit_diff = 'seconds';
        }
        elseif($time1->diffInMinutes($time2) < 60)
        {
            $time_diff = $time1->diffInMinutes($time2);
            $unit_diff = 'minutes';
        }
        elseif($time1->diffInHours($time2) < 24)
        {
            $time_diff = $time1->diffInHours($time2);
            $unit_diff = 'hours';
        }
        elseif($time1->diffInDays($time2) < 7)
        {
            $time_diff = $time1->diffInDays($time2);
            $unit_diff = 'days';
        }
        /*elseif($time1->diffInWeeks($time2) < 4)
        {
            $time_diff = $time1->diffInWeeks($time2);
            $unit_diff = 'weeks';
        }*/
        elseif($time1->diffInDays($time2) < 30)
        {
            $time_diff = $time1->diffInDays($time2);
            $unit_diff = 'days';
        }
        elseif($time1->diffInMonths($time2) < 12)
        {
            $time_diff = $time1->diffInMonths($time2);
            $unit_diff = 'months';
        }
        else
        {
            $time_diff = $time1->diffInYears($time2);
            $unit_diff = 'years';
        }

        if(!utils()->string()->checkStringIsNull($time_diff) and $time_diff != 'now')
        {
            $time_diff = (int) abs($time_diff);
        }

        $response['time_diff'] = $time_diff;
        $response['unit_diff'] = $unit_diff;
        return $response;
    }


    /**
     * @notes Convert bytes to readable by humans
     *
     * @return float|int|mixed|string
     */
    public function makeBytesToHumanReadable($size, $precision = 0, $separate_with_space = true)
    {
        try
        {
            $units = ['B', 'kB', 'MB', 'GB', 'TB', 'PB', 'EB', 'ZB', 'YB'];
            $step  = 1024;
            $i     = 0;

            while (($size / $step) > 0.9)
            {
                $size = $size / $step;
                $i++;
            }

            return round($size, $precision).($separate_with_space ? ' ' : '').$units[$i];
        }
        catch (\Throwable $e)
        {
            return $size;
        }
    }

    /**
     * @notes Format string as pt-BR date or en-US date
     *
     * @return mixed
     */
    public function formatStringAsDate($string, $ptbr = true)
    {
        $date = null;

        if ($ptbr)
        {
            try
            {
                $date = Carbon::createFromFormat('d/m/Y', $string)->format('d/m/Y');
            }
            catch (\Exception $e1)
            {
                try
                {
                    $date = Carbon::createFromFormat('Y-m-d', $string)->format('d/m/Y');
                }
                catch (\Exception $e2)
                {
                }
            }
        }
        else
        {
            try
            {
                $date = Carbon::createFromFormat('d/m/Y', $string)->format('Y-m-d');
            }
            catch (\Exception $e1)
            {
                try
                {
                    $date = Carbon::createFromFormat('Y-m-d', $string)->format('Y-m-d');
                }
                catch (\Exception $e2)
                {
                }
            }
        }

        return $date;
    }
}