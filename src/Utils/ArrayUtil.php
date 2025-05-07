<?php

namespace Meanify\LaravelHelpers\Utils;

class ArrayUtil
{
    /**
     * @param  null  $default
     * @return mixed|null
     */
    public function getValueFromArray($array, $key, $default = null)
    {
        if (is_object($array))
        {
            $array = json_decode(json_encode($array, 256), true);
        }

        return $array[$key] ?? $default;
    }

    /**
     * @notes Convert array at string separated by comma
     *
     * @return string
     */
    public function arrayToString($array, $char_between_items = '', $include_dot_char = false)
    {
        $string = '';

        foreach ($array as $array_item)
        {
            $string .= $array_item.','.$char_between_items;
        }

        $string = rtrim($string);
        $string = substr($string, 0, -1); //remove last comma

        if ($include_dot_char)
        {
            $string .= '.';
        }

        return $string;
    }

    /**
     * @notes Convert array at string separated by comma
     *
     * @param  bool  $include_dot_char
     * @return false|string
     */
    public function collectionDataToString($collection, $key, $space_between_items = true, $include_dot_char = false)
    {
        $array = [];

        foreach ($collection as $item)
        {
            $array[] = self::getValueFromArray($item, $key, '');
        }

        $string = meanify_helpers()->array()->arrayToString($array, $space_between_items ? ' ' : '', $include_dot_char);

        return $string;
    }

    /**
     * @notes Convert array to object
     *
     * @return mixed
     */
    public function arrayToObject($array, $convert_to_array_if_is_string = true)
    {
        if ($convert_to_array_if_is_string && is_string($array))
        {
            if (meanify_helpers()->string()->isValidJson($array))
            {
                $array = json_decode($array);
            }
        }

        $object = json_decode(json_encode($array, 256));

        return $object;
    }

    /**
     * @return mixed|null
     */
    public function findObjByKeyInArray($array, $key, $value)
    {
        $filtered = array_filter($array, function($item) use ($key, $value) {
            return $item->{$key} == $value;
        });

        return ! empty($filtered) ? array_shift($filtered) : null;
    }

    /**
     * @return mixed|null
     */
    public function getValueByKey($array, $key, $default = null)
    {
        return $array[$key] ?? $default;
    }

    /**
     * @info Return list of email's recipients
     *
     * @param  bool  $return_as_array
     * @return array
     */
    public function formatEmailRecipient($string, $return_as_array = true)
    {
        if ($return_as_array)
        {
            $emails = [];

            $string = str_replace(' ', '', $string);
            $string = str_replace(',', ';', $string);
            $items  = explode(';', $string);

            foreach ($items as $item)
            {
                if ($item != '' && $item != null)
                {
                    $emails[] = $item;
                }
            }
        } else
        {
            $emails = '';

            $string = str_replace(' ', '', $string);
            $string = str_replace(',', ';', $string);
            $items  = explode(';', $string);

            foreach ($items as $item)
            {
                if ($item != '' && $item != null)
                {
                    $emails .= $item.'; ';
                }
            }

            $emails = substr($emails, 0, -2);
        }

        return $emails;
    }

    /**
     * @param array $array
     * @param $value
     * @param $removeAll
     * @return array
     */
    function removeValue(array $array, $value, $removeAll = true)
    {
        if ($removeAll)
        {
            $filtered = array_filter($array, function ($item) use ($value) {
                return $item !== $value;
            });
        }
        else
        {
            $found = false;
            $filtered = [];
            foreach ($array as $item) {
                if (!$found && $item === $value) {
                    $found = true;
                    continue;
                }
                $filtered[] = $item;
            }
        }

        return array_values($filtered);
    }
}
