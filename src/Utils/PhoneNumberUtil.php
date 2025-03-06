<?php

namespace Meanify\LaravelHelpers\Utils;

use libphonenumber\NumberParseException;
use libphonenumber\PhoneNumberFormat;
use libphonenumber\PhoneNumberUtil as LibPhoneNumberUtil;

class PhoneNumberUtil
{
    /**
     * @return string|null
     */
    public function getPhoneAreaCodeFromNumber(string $phone_number, ?string $phone_dial_code = '')
    {
        try
        {
            $phone_util = LibPhoneNumberUtil::getInstance();

            $full_phone_number = $phone_dial_code.$phone_number;

            $number_proto = $phone_util->parse($full_phone_number, null);

            if ($phone_util->isValidNumber($number_proto))
            {
                $national_number = $phone_util->getNationalSignificantNumber($number_proto);

                $area_code_length = $phone_util->getLengthOfGeographicalAreaCode($number_proto);

                if ($area_code_length > 0)
                {
                    return substr($national_number, 0, $area_code_length);
                }
            } else
            {
                //try to get area code
                $phone_number = utils()->mask()->removeMask($phone_number, [' ']);

                $phone_parts = explode(' ', $phone_number);

                if (count($phone_parts) > 1)
                {
                    return $phone_parts[0];
                }
            }

            return null;
        } catch (NumberParseException $e)
        {
            if (env('APP_DD') === true)
            {
                dd($e);
            }

            return null;
        }
    }

    /**
     * @return string|null
     */
    public function getPhoneNumberWithoutAreaCode(string $phone_number_with_area_code)
    {
        $result = $phone_number_with_area_code;

        try
        {
            $phone_number = utils()->mask()->removeMask($phone_number_with_area_code, [' ']);

            $phone_parts = explode(' ', $phone_number);

            if (count($phone_parts) > 1)
            {
                $result = '';

                foreach ($phone_parts as $index => $phone_part)
                {
                    if ($index == 0)
                    {
                        continue;
                    }

                    $result .= ' '.$phone_part;
                }

                $result = substr($result, 1);
            }
        } catch (\Exception $e)
        {
            if (env('APP_DD') === true)
            {
                dd($e);
            }
        }

        return $result;
    }

    /**
     * @return object|null
     */
    public function decodePhone(string $phone_number, ?string $phone_dial_code = '')
    {
        try
        {
            $phone_util = LibPhoneNumberUtil::getInstance();

            $full_phone_number = $phone_dial_code.$phone_number;

            $number_proto = $phone_util->parse($full_phone_number, null);

            if ($phone_util->isValidNumber($number_proto))
            {
                $national_number = $phone_util->getNationalSignificantNumber($number_proto);

                $country_code = $number_proto->getCountryCode();

                $area_code_length = $phone_util->getLengthOfGeographicalAreaCode($number_proto);

                $area_code = $area_code_length > 0 ? substr($national_number, 0, $area_code_length) : null;

                $formatted_number = $phone_util->format($number_proto, PhoneNumberFormat::INTERNATIONAL);

                return (object) [
                    'country_code'    => $country_code,
                    'area_code'       => $area_code,
                    'national_number' => $national_number,
                    'formatted'       => $formatted_number,
                ];
            } else
            {
                return null;
            }
        } catch (NumberParseException $e)
        {
            if (env('APP_DD') === true)
            {
                dd($e);
            }

            return null;
        }
    }
}
