<?php

namespace Meanify\LaravelHelpers\Utils;

class ObjectUtil
{
    /**
     * @param $data
     * @return array
     */
    public function parseFirstLevelToArray($data)
    {
        $data = collect($data)->map(function ($value) {
            return $value;
        })->all();
        
        return $data;
    }

    /**
     * @param object|array $data
     * @param bool $parse_all_levels_to_array
     * @return array|mixed|object
     */
    public function toArray(object|array $data, bool $parse_all_levels_to_array = true)
    {

        if ($parse_all_levels_to_array)
        {
            return json_decode(json_encode($data), true);
        }

        if (is_object($data))
        {
            return get_object_vars($data);
        }

        return $data;
    }
}