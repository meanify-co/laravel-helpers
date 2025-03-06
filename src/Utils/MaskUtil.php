<?php

namespace Meanify\LaravelHelpers\Utils;

class MaskUtil
{
    /**
     * @notes Insert mask at strings
     *
     * @return string
     */
    public function insertMask($val, $mask)
    {
        $maskared = '';
        $k        = 0;

        for ($i = 0; $i <= strlen($mask) - 1; $i++)
        {
            if ($mask[$i] == '#')
            {
                if (isset($val[$k]))
                {
                    $maskared .= $val[$k++];
                }
            } else
            {
                if (isset($mask[$i]))
                {
                    $maskared .= $mask[$i];
                }
            }
        }

        return $maskared;
    }

    /**
     * @notes Remove mask of string
     *
     * @return string|string[]
     */
    public function removeMask($string, array $except = [])
    {
        $chars = ['.', '_', '/', '-', '(', ')', ' ', '!', ':', '#'];

        return str_replace(array_diff($chars, $except), '', $string);
    }

    /**
     * @notes Insert mask of CNPJ or CPF at strings
     *
     * @param  bool  $show_label
     * @return string
     */
    public function maskDocument($val, $show_label = false)
    {
        $val = self::removeMask($val);

        if (strlen($val) == 11)
        {
            $maskared = ($show_label ? 'CPF: ' : '').self::insertMask($val, '###.###.###-##');
        } elseif (strlen($val) == 14)
        {
            $maskared = ($show_label ? 'CNPJ: ' : '').self::insertMask($val, '##.###.###/####-##');
        } else
        {
            $maskared = $val;
        }

        return $maskared;
    }

    /**
     * @notes Insert mask phone (BR) at string
     *
     * @param  false  $ddi
     * @return string
     */
    public function maskPhoneBr($number, $ddi = false)
    {
        $phone = meanifyHelpers()->string()->onlyNumbers($number);

        if (strlen($phone) > 10)
        {
            $phone = self::insertMask($phone, '(##) #####-####');
        } elseif (strlen($phone) == 10)
        {
            $phone = self::insertMask($phone, '(##) ####-####');
        } else
        {
            $phone = $number;
        }

        if ($ddi)
        {
            $phone = '+55'.str_replace(['(', ')'], '', $phone);
        }

        return $phone;
    }
}
