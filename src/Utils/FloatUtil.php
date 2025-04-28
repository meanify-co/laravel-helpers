<?php

namespace Meanify\LaravelHelpers\Utils;

class FloatUtil
{
    /**
     * @notes Convert currency string at float number. Example: US$ 1.500,75 -> 1500.75
     *
     * @return int|string|string[]
     */
    public function currencyToFloat($currency)
    {
        $currency = str_replace(' ', '', $currency);

        if (! is_numeric($currency))
        {
            $currency  = str_replace('.', '', $currency);
            $formatted = str_replace(',', '.', $currency);
        }
        else
        {
            $formatted = $currency;
        }

        return $formatted;
    }

    /**
     * @notes Convert currency string at float number. Example: US$ 1.500,75 -> 1500.75
     *
     * @return int|string|string[]
     */
    public function moneyToFloat($currency)
    {
        return $this->currencyToFloat($currency);
    }

    /**
     * @notes Convert float number at currency string. Example: 1500.75 -> (US$) 1.500,75
     *
     * @param  string  $label
     * @return string
     */
    public function floatToCurrency($float, $label = '')
    {
        $formatted = number_format($float, 2, ',', '.');

        if ($label != '' && $label != null)
        {
            $formatted = $label.$formatted;
        }

        return $formatted;
    }

    /**
     * @notes Convert float number at currency string. Example: 1500.75 -> (US$) 1.500,75
     *
     * @param  string  $label
     * @return string
     */
    public function floatToMoney($float, $label = '')
    {
        return $this->floatToCurrency($float, $label);
    }

    /**
     * @return string
     */
    public function parseFromRequest($value, ?string $lang = null)
    {
        $language = $lang ?? meanify_helpers()->request()->language();

        $parsed = $value;

        if (! is_numeric($value))
        {
            if ($language == 'pt-BR')
            {
                $value  = str_replace('.', '', $value);
                $parsed = str_replace(',', '.', $value);
            }
        }

        return $parsed;
    }
}
