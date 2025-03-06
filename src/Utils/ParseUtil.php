<?php

namespace Meanify\LaravelHelpers\Utils;

class ParseUtil
{
    /**
     * @param $url
     * @param bool $remove_www
     * @return array|mixed|string|string[]|null
     */
    public function urlToDomain($url, bool $remove_www = true)
    {
        try
        {
            $parsed_url = parse_url($url);
            $domain    = $parsed_url['host'];

            if($remove_www)
            {
                $domain = preg_replace('/^www\./', '', $domain);
            }

            $result = $domain;
        }
        catch (\Exception $e)
        {
            $result = null;
        }

        return $result;
    }
}
