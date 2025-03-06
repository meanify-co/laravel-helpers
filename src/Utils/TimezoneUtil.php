<?php

namespace Meanify\LaravelHelpers\Utils;

class TimezoneUtil
{
    /**
     * @return string|null
     */
    public function normalizeTimezone(?string $timezone, string $return_locale_or_offset = 'locale')
    {
        if (utils()->string()->checkStringContains($timezone, '@'))
        {
            [$offset, $locale] = explode('@', $timezone);

            $timezone = $return_locale_or_offset == 'locale' ? $locale : $offset;
        }

        return $timezone;
    }

    /**
     * @return array
     */
    public function getTimezones()
    {
        $locations = [
            'Cuiaba'    => 'Cuiabá',
            'Sao Paulo' => 'São Paulo',
        ];

        $timezone_list = timezone_identifiers_list();

        $timezone_array = [];

        foreach ($timezone_list as $timezone)
        {
            $date_time_zone = new \DateTimeZone($timezone);
            $offset         = $date_time_zone->getOffset(new \DateTime('now'));

            $offset_hours   = abs($offset)          / 3600;
            $offset_minutes = (abs($offset) % 3600) / 60;

            $offset_sign      = ($offset >= 0) ? '+' : '-';
            $offset_formatted = sprintf('%02d:%02d', $offset_hours, $offset_minutes);

            $name = str_replace('_', ' ', $date_time_zone->getName());
            $name = str_replace(array_keys($locations), array_values($locations), $name);

            $timezone_array[$date_time_zone->getName()] = [
                'text'   => $name,
                'offset' => "{$offset_sign}{$offset_formatted}",
            ];
        }

        return $timezone_array;
    }
}
