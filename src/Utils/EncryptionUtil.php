<?php

namespace Meanify\LaravelHelpers\Utils;

class EncryptionUtil
{
    /**
     * @notes Encrypt any value
     *
     * @return false|string
     */
    public function customEncrypt($string, string $passphrase, string $cipher = 'aes-256-cbc')
    {
        $salt   = openssl_random_pseudo_bytes(8);
        $salted = '';
        $dx     = '';

        while (strlen($salted) < 48)
        {
            $dx = md5($dx.$passphrase.$salt, true);
            $salted .= $dx;
        }
        $key            = substr($salted, 0, 32);
        $iv             = substr($salted, 32, 16);
        $encrypted_data = openssl_encrypt(json_encode($string), $cipher, $key, true, $iv);
        $data           = ['ct' => base64_encode($encrypted_data), 'iv' => bin2hex($iv), 's' => bin2hex($salt)];

        return json_encode($data);
    }

    /**
     * @notes Decrypt a previously encrypted value
     *
     * @return mixed
     */
    public function customDecrypt(string $json_string, string $passphrase, string $cipher = 'aes-256-cbc')
    {
        $jsondata            = json_decode($json_string, true);
        $salt                = hex2bin($jsondata['s']);
        $ct                  = base64_decode($jsondata['ct']);
        $iv                  = hex2bin($jsondata['iv']);
        $concated_passphrase = $passphrase.$salt;
        $md5                 = [];
        $md5[0]              = md5($concated_passphrase, true);
        $result              = $md5[0];

        for ($i = 1; $i < 3; $i++)
        {
            $md5[$i] = md5($md5[$i - 1].$concated_passphrase, true);
            $result .= $md5[$i];
        }
        $key  = substr($result, 0, 32);
        $data = openssl_decrypt($ct, $cipher, $key, true, $iv);

        return json_decode($data, true);
    }

    /**
     * Encrypt any value
     *
     * @param  mixed  $value  Any value
     * @param  string  $passphrase  Your password
     * @return string
     */
    public function jsAesEncrypt($value, string $passphrase)
    {
        $salt   = openssl_random_pseudo_bytes(8);
        $salted = '';
        $dx     = '';

        while (strlen($salted) < 48)
        {
            $dx = md5($dx.$passphrase.$salt, true);
            $salted .= $dx;
        }
        $key            = substr($salted, 0, 32);
        $iv             = substr($salted, 32, 16);
        $encrypted_data = openssl_encrypt(json_encode($value), 'aes-256-cbc', $key, true, $iv);
        $data           = ['ct' => base64_encode($encrypted_data), 'iv' => bin2hex($iv), 's' => bin2hex($salt)];

        return json_encode($data);
    }

    /**
     * Decrypt a previously encrypted value
     *
     * @return mixed
     */
    public function jsAesDecrypt(string $jsonStr, string $passphrase, bool $return_array = false)
    {
        $json               = json_decode($jsonStr, true);
        $salt               = hex2bin($json['s']);
        $iv                 = hex2bin($json['iv']);
        $ct                 = base64_decode($json['ct']);
        $concatedPassphrase = $passphrase.$salt;
        $md5                = [];
        $md5[0]             = md5($concatedPassphrase, true);
        $result             = $md5[0];

        for ($i = 1; $i < 3; $i++)
        {
            $md5[$i] = md5($md5[$i - 1].$concatedPassphrase, true);
            $result .= $md5[$i];
        }
        $key  = substr($result, 0, 32);
        $data = openssl_decrypt($ct, 'aes-256-cbc', $key, true, $iv);

        return json_decode($data, $return_array);
    }
}
