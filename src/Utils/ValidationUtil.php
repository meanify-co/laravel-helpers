<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Facades\File;

class ValidationUtil
{
    /**
     * @param $upc_code
     * @param int $digit_number
     * @return string
     */
    public function upcCodeToEan13($upc_code, int $digit_number = 1)
    {
        $ean12    = '0' . str_pad($upc_code, 11, '0', STR_PAD_LEFT);
        $digits   = str_split($ean12);

        $sum_odd  = 0;
        $sum_even = 0;

        foreach ($digits as $index => $digit)
        {
            if ($index % 2 === 0)
            {
                $sum_odd += $digit;
            }
            else
            {
                $sum_even += $digit;
            }
        }

        $total       = ($sum_even * 3) + $sum_odd;
        $check_digit = (10 - ($total % 10)) % 10;
        $result      = $ean12 . $check_digit;

        if($digit_number == 1)
        {
            return $this->upcCodeToEan13($result, 2); //Check second digit
        }

        return (int) $ean12 . $check_digit;
    }

    /**
     * @param $code
     * @return string
     */
    public function calculateCheckDigitsForEan13($code)
    {
        $ean12    = '0' . str_pad($code, 11, '0', STR_PAD_LEFT);
        $digits   = str_split($ean12);

        $sum_odd  = 0;
        $sum_even = 0;

        foreach ($digits as $index => $digit)
        {
            if ($index % 2 === 0)
            {
                $sum_odd += $digit;
            }
            else
            {
                $sum_even += $digit;
            }
        }

        $total = ($sum_even * 3) + $sum_odd;
        $check_digit = (10 - ($total % 10)) % 10;

        return $ean12 . $check_digit;
    }

    /**
     * @param string $color
     * @return bool
     */
    public function isValidHexColor(string $color)
    {
        return preg_match('/^#([A-Fa-f0-9]{6}|[A-Fa-f0-9]{3})$/', $color) === 1;
    }

    /**
     * @param $value
     * @return bool
     */
    public function isValidIp($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP) !== false;
    }

    /**
     * @param $value
     * @return bool
     */
    function isValidIpv4($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4) !== false;
    }

    /**
     * @param $value
     * @return bool
     */
    function isValidIpv6($value)
    {
        return filter_var($value, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6) !== false;
    }


}
