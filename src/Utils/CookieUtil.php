<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\Crypt;

class CookieUtil
{
    public $COOKIE_NAME_SIGN_UP_REDIRECT_ON_SUCCESS = 'sign-up-success';
    public $COOKIE_PREFERENCES_MINUTES = 2628000;
    public $COOKIE_PREFERENCES_KEY = "cookies";

    /**
     * @return string
     */
    private function cookiePrefix()
    {
        $prefix = env('APP_SESSION_PREFIX', 'app').'_';

        return $prefix;
    }

    /**
     * @param string $name
     * @return array|string|null
     */
    public function get(string $name)
    {
        return Cookie::get(meanify_helpers()->cookie()->cookiePrefix().$name);
    }

    /**
     * @param string $name
     * @param $value
     * @param int $time_in_minutes
     * @return void
     */
    public function set(string $name, $value, int $time_in_minutes = 30)
    {
        try
        {
            if(is_object($value) or is_array($value))
            {
                $value = json_encode($value,256);
            }
            
            Cookie::queue(meanify_helpers()->cookie()->cookiePrefix().$name, $value, $time_in_minutes);
        }
        catch (\Throwable $e)
        {
            dd($e->getMessage(), $name, $value, $time_in_minutes);
        }
    }

    /**
     * @param string $name
     * @return void
     */
    public function delete(string $name)
    {
        Cookie::queue(meanify_helpers()->cookie()->cookiePrefix().$name, null, 0);
    }


    /**
     * @param string $cookie
     * @return mixed|null
     */
    public function getPreferences(string $cookie = 'all')
    {
        $data = meanify_helpers()->cookie()->get(meanify_helpers()->cookie()->COOKIE_PREFERENCES_KEY);

        if($data)
        {
            try
            {
                $data = json_decode(Crypt::decrypt($data));

                if($cookie == 'all')
                {
                    return $data;
                }
                else
                {
                    return isset($data->{$cookie}) ? $data->{$cookie} : null;
                }
            }
            catch (\Throwable $e)
            {
                return null;
            }
        }

        return null;
    }

    /**
     * @param array $data
     * @return void
     */
    public function setPreferences(array $data)
    {
        $preferences = [
            'necessary' => true,
            'analysis'  => isset($data['cookie_analysis']) ? ($data['cookie_analysis'] == 1 ? true : false) : false,
            'function'  => isset($data['cookie_function']) ? ($data['cookie_function'] == 1 ? true : false) : false,
        ];

        $cookie_value = Crypt::encrypt(json_encode($preferences, JSON_UNESCAPED_UNICODE));

        meanify_helpers()->cookie()->set(meanify_helpers()->cookie()->COOKIE_PREFERENCES_KEY, $cookie_value, meanify_helpers()->cookie()->COOKIE_PREFERENCES_MINUTES);
    }

}