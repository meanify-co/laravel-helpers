<?php

namespace Meanify\LaravelHelpers\Utils;

use Carbon\Carbon;
use Illuminate\Support\Str;

class StringUtil
{
    /**
     * @notes Check string contains part of string
     *
     * @return bool
     */
    public function checkStringContains($full, $parts)
    {
        $has = false;

        if (is_string($parts))
        {
            $array = [$parts];

            $parts = $array;
        }

        foreach ($parts as $part)
        {
            if (strpos($full, $part) !== false)
            {
                $has = true;

                break;
            }
        }

        return $has;
    }

    /**
     * @notes check string is null with trim validation
     *
     * @return bool
     */
    public function checkStringIsNull($string)
    {
        $is_null = false;

        if ($string === null || $string === '')
        {
            $is_null = true;
        } else
        {
            $string = rtrim($string);
            $string = ltrim($string);
            $string = self::removeLineBreak($string);

            if ($string == '' || $string == null)
            {
                $is_null = true;
            }
        }

        return $is_null;
    }

    /**
     * @return array
     */
    public function splitFullNameInParts($full_name)
    {
        $first_name = '';
        $last_name  = '';

        if (! utils()->string()->checkStringContains($full_name, ' '))
        {
            $first_name = $full_name;
        } else
        {
            $parts = explode(' ', $full_name);

            for ($i = 0; $i < count($parts); $i++)
            {
                if ($i == 0)
                {
                    $first_name = $parts[$i];
                } elseif ($i == 1)
                {
                    $last_name = $parts[$i];
                } else
                {
                    $last_name .= ' '.$parts[$i];
                }
            }
        }

        return ['first_name' => $first_name, 'last_name' => $last_name];
    }

    /**
     * @notes Remove line break from string
     *
     * @return string|string[]
     */
    public function removeLineBreak($text)
    {
        return str_replace(["\r\n", "\n", "\r"], ['. ', '. ', '. '], $text);
    }

    /**
     * @notes Remove accentuation of string
     *
     * @return string|string[]|null
     */
    public function removeAccentuation($string)
    {
        $string = str_replace(['Ç', 'ç'], ['C', 'c'], $string);

        $formatted = preg_replace(['/(á|à|ã|â|ä)/', '/(Á|À|Ã|Â|Ä)/', '/(é|è|ê|ë)/', '/(É|È|Ê|Ë)/', '/(í|ì|î|ï)/',
            '/(Í|Ì|Î|Ï)/', '/(ó|ò|õ|ô|ö)/', '/(Ó|Ò|Õ|Ô|Ö)/',
            '/(ú|ù|û|ü)/', '/(Ú|Ù|Û|Ü)/', '/(ñ)/', '/(Ñ)/'], explode(' ', 'a A e E i I o O u U n N'), ($string));

        return $formatted;
    }

    /**
     * @notes Insert char at left in string. Example: 99 -> AA99
     *
     * @return string
     */
    public function insertCharAtLeft($string, $qty, $char)
    {
        return str_pad($string, $qty, $char, STR_PAD_LEFT);
    }

    /**
     * @notes Insert zero at left in string. Example: 99 -> 0099
     *
     * @return string
     */
    public function insertZeroAtLeft($string, $qty)
    {
        return str_pad($string, $qty, '0', STR_PAD_LEFT);
    }

    /**
     * @notes Check string contains a uppercase
     *
     * @return bool
     */
    public function checkStringContainsAUppercase($string)
    {
        $has = false;

        if (preg_match('/[A-Z]/', $string))
        {
            $has = true;
        }

        return $has;
    }

    /**
     * @notes Check string contains a letter
     *
     * @return bool
     */
    public function checkStringContainsALetter($string)
    {
        $has = false;

        if (preg_match('/[a-z]/i', $string) || preg_match('/[A-Z]/', $string))
        {
            $has = true;
        }

        return $has;
    }

    /**
     * @param  int  $times
     * @return string
     */
    public function concatUuid($times = 2)
    {
        $uuid = '';

        for ($i = 0; $i < $times; $i++)
        {
            $uuid .= '-'.Str::uuid()->toString();
        }

        return substr($uuid, 1);
    }

    /**
     * @notes Check string contains a special char
     *
     * @return bool
     */
    public function checkStringContainsASpecialChar($string)
    {
        $has = false;

        if (preg_match('/[\'^£$%&*()}{@#~?!><>,|=_+¬-]/', $string))
        {
            $has = true;
        }

        return $has;
    }

    /**
     * @notes Check string contains a number
     *
     * @return bool
     */
    public function checkStringContainsANumber($string)
    {
        $has = false;

        for ($i = 0; $i < strlen($string); $i++)
        {
            if (ctype_digit($string[$i]))
            {
                $has = true;

                break;
            }
        }

        return $has;
    }

    /**
     * @return bool
     */
    public function isEmail($string)
    {
        if (filter_var($string, FILTER_VALIDATE_EMAIL))
        {
            return true;
        } else
        {
            return false;
        }
    }

    /**
     * @return string
     */
    public function randomString($length, $letters = true, $sensitive_case = false)
    {
        $characters = '0123456789';

        if ($letters)
        {
            $characters .= 'abcdefghijklmnopqrstuvwxyz';
        }

        if ($sensitive_case)
        {
            $characters .= 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
        }

        $characters_length = strlen($characters);

        $random_string = '';

        for ($i = 0; $i < $length; $i++)
        {
            $random_string .= $characters[rand(0, $characters_length - 1)];
        }

        return $random_string;
    }

    /**
     * @return int|null
     */
    public function letterToIndex($letters)
    {
        if ($letters == '' || $letters == null)
        {
            return;
        }

        $letters = strtoupper($letters);
        $length  = strlen($letters);
        $index   = 0;

        for ($i = 0; $i < $length; $i++)
        {
            $index *= 26;
            $index += ord($letters[$i]) - ord('A') + 1;
        }

        return $index - 1;
    }

    /**
     * @notes Check string contains a lowercase
     *
     * @return bool
     */
    public function checkStringContainsALowercase($string)
    {
        $has = false;

        if (preg_match('/[a-z]/', $string))
        {
            $has = true;
        }

        return $has;
    }

    /**
     * @return array|string|string[]
     */
    public function getBaseUrlFromString($url, $with_protocol = false)
    {
        $base_url = pathinfo($url, PATHINFO_DIRNAME);

        if (! $with_protocol)
        {
            $base_url = str_replace(['http://', 'https://'], '', $url);
        }

        return $base_url;
    }

    /**
     * @notes Format string as pt-BR date or en-US date
     *
     * @return mixed
     */
    public function formatStringAsDate($string, $pt_br = true, $from_format = null)
    {
        $date = null;

        if ($pt_br)
        {
            if (isset($from_format))
            {
                try
                {
                    $date = Carbon::createFromFormat($from_format, $string)->format('d/m/Y');
                }
                catch (\Exception $e1)
                {

                }
            }
            else
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
        }
        else
        {
            if (isset($from_format))
            {
                try
                {
                    $date = Carbon::createFromFormat($from_format, $string)->format('Y-m-d');
                }
                catch (\Exception $e1)
                {

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
        }

        return $date;
    }

    /**
     * @notes Remove non-numbers chars of string
     *
     * @return string|string[]|null
     */
    public function onlyNumbers($string)
    {
        $string = str_replace(' ', '', $string);

        return preg_replace('/[^0-9]/', '', $string);
    }

    /**
     * @notes Remove space from string
     *
     * @return string|string[]
     */
    public function removeSpace($string)
    {
        return str_replace(' ', '', $string);
    }

    /**
     * @notes Check if string is a json
     *
     * @return mixed
     */
    public function isValidJson($string)
    {
        $decoded = json_decode($string, true);

        if (json_last_error() === JSON_ERROR_NONE && (is_array($decoded) || is_object($decoded)))
        {
            return true;
        }

        return false;
    }

    /**
     * @param $string
     * @return false|int
     */
    public function isDomain($string)
    {
        return filter_var($string, FILTER_VALIDATE_DOMAIN, FILTER_FLAG_HOSTNAME);
    }

    /**
     * @notes Check if string is a string date
     *
     * @return mixed
     */
    public function isDate($string)
    {
        $date = false;

        try
        {
            $test = Carbon::createFromFormat('d/m/Y', $string);

            $date = true;
        }
        catch (\Exception $e1)
        {
            try
            {
                $test = Carbon::createFromFormat('Y-m-d', $string);

                $date = true;
            }
            catch (\Exception $e2)
            {
                $date = false;
            }
        }

        return $date;
    }

    /**
     * @notes Check if string is a valid amount
     *
     * @param  null  $string
     * @param  null  $min_amount
     * @return mixed
     */
    public function isValidAmount($string = null, $min_amount = null)
    {
        $amount = true;

        try
        {
            if (in_array($string, ['', null]))
            {
                $amount = false;
            } else
            {
                $float_value = (float) $string;

                if ((string) $float_value == $string)
                {
                    //if is float, check string has two decimal places
                    [$int, $decimal] = explode('.', $string);

                    if (strlen($decimal) != 2)
                    {
                        $amount = false;
                    }
                } else
                {
                    $amount = false;
                }
            }
        } catch (\Exception $e1)
        {
            $amount = false;
        }

        if ($amount && $min_amount != null)
        {
            if ((float) $string < $min_amount)
            {
                $amount = false;
            }
        }

        return $amount;
    }
}
