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
}