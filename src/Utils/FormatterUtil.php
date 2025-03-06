<?php

namespace Meanify\LaravelHelpers\Utils;

use Carbon\Carbon;

class FormatterUtil
{
    private $value = null;

    private $locale = null;

    private $timezone = null;

    /**
     * @notes Convert bytes to readable by humans
     *
     * @param  int  $precision
     * @param  bool  $separate_with_space
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

            return FormatterUtil . phpround($size, $precision) . ($separate_with_space ? ' ' : '') .$units[$i];
        } catch (\Throwable $e)
        {
            return $size;
        }
    }

    /**
     * @return $this
     */
    public function init($value, $locale = null, $timezone = null)
    {
        $this->value = $value;

        $this->locale   = $locale     ?? config('app.locale');
        $this->timezone = $timezone ?? config('app.timezone');

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
     * @return string|null
     */
    public function decimal($decimalPlaces = 2)
    {
        $result = null;

        if ($this->locale == 'pt-BR' || $this->locale == 'br')
        {
            $result = number_format($this->value, $decimalPlaces, ',', '.');
        } elseif ($this->locale == 'en-US' || $this->locale == 'en')
        {
            $result = number_format($this->value, $decimalPlaces, '.', '');
        }

        return $result;
    }

    /**
     * @return array|float|int|string|string[]|null
     */
    public function floatFromCurrency()
    {
        $result = $this->value;

        if ($this->locale == 'pt-BR' || $this->locale == 'br')
        {
            $result = str_replace(' ', '', $this->value);

            if (! is_numeric($result))
            {
                $result = str_replace('.', '', $result);
                $result = str_replace(',', '.', $result);
            }
        }

        return $result;
    }

    /**
     * @return string|null
     */
    public function date($originalFormat = 'Y-m-d H:i:s')
    {
        $result = null;

        $carbon = $originalFormat == 'Y-m-d H:i:s' ? Carbon::parse($this->value) : Carbon::createFromFormat($originalFormat, $this->value);

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        if ($this->locale == 'pt-BR' || $this->locale == 'br')
        {
            $result = $carbon->locale($this->locale)->format('d/m/Y');
        } elseif ($this->locale == 'en-US' || $this->locale == 'en')
        {
            $result = $carbon->locale($this->locale)->format('m/d/Y');
        }

        return $result;
    }

    /**
     * @return string|null
     */
    public function dayMonth($originalFormat = 'Y-m-d H:i:s')
    {
        $result = null;

        $carbon = $originalFormat == 'Y-m-d H:i:s' ? Carbon::parse($this->value) : Carbon::createFromFormat($originalFormat, $this->value);

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        if ($this->locale == 'pt-BR' || $this->locale == 'br')
        {
            $result = $carbon->locale($this->locale)->format('d/m');
        } elseif ($this->locale == 'en-US' || $this->locale == 'en')
        {
            $result = $carbon->locale($this->locale)->format('m/d');
        }

        return $result;
    }

    /**
     * @return string|null
     */
    public function datetime($originalFormat = null, $withSeconds = true, $dateTimeSeparator = null)
    {
        $result = null;

        $carbon = $originalFormat ? Carbon::createFromFormat($originalFormat, $this->value) : Carbon::parse($this->value);

        if ($this->timezone)
        {
            $carbon->setTimezone($this->timezone);
        }

        if ($this->locale == 'pt-BR')
        {
            $result = $carbon->locale($this->locale)->format('d/m/Y') .
                ($dateTimeSeparator ? " $dateTimeSeparator " : ' às ') .
                ($withSeconds ? $carbon->locale($this->locale)->format('H:i:s') : $carbon->locale($this->locale)->format('H:i'));
        } elseif ($this->locale == 'en-US')
        {
            $result = $carbon->locale($this->locale)->format('m/d/Y') .
                ($dateTimeSeparator ? " $dateTimeSeparator " : ' at ') .
                ($withSeconds ? $carbon->locale($this->locale)->format('H:i:s') : $carbon->locale($this->locale)->format('H:i'));
        }

        return $result;
    }

    /**
     * @return string|Carbon
     */
    public function now(?string $format = '')
    {
        $carbon = Carbon::now();

        $carbon->setTimezone($this->timezone ?? config('app.timezone'));

        if (! utils()->string()->checkStringIsNull($format))
        {
            $result = $carbon->format($format);
        } else
        {
            $result = $carbon;
        }

        return $result;
    }
}
