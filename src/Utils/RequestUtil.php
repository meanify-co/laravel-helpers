<?php

namespace Meanify\LaravelHelpers\Utils;

class RequestUtil
{
    public function __construct()
    {
        return request();
    }

    /**
     * @return array|string|null
     */
    public function accountId()
    {
        return meanifyHelpers()->request()->getAccountIdFromRequest();
    }

    /**
     * @return array|string|null
     */
    public function accountPublicId()
    {
        return meanifyHelpers()->request()->getAccountPublicIdFromRequest();
    }

    /**
     * @return array|string|null
     */
    public function userId()
    {
        return meanifyHelpers()->request()->getUserIdFromRequest();
    }

    /**
     * @return array|string|null
     */
    public function userPublicId()
    {
        return meanifyHelpers()->request()->getUserPublicIdFromRequest();
    }

    /**
     * @return array|string|null
     */
    public function device()
    {
        return request()->header('x-mfy-parsed-device-info');
    }

    /**
     * @return array|string|null
     */
    public function ip()
    {
        return request()->header('x-mfy-parsed-client-ip-address');
    }

    /**
     * @return array|string|null
     */
    public function uuid()
    {
        return request()->header('x-mfy-parsed-request-uuid');
    }

    /**
     * @return array|string|null
     */
    public function language()
    {
        return meanifyHelpers()->request()->getUserLanguageFromRequest();
    }

    /**
     * @return string|null
     */
    public function application($key = 'name')
    {
        if ($key == 'name')
        {
            return meanifyHelpers()->request()->getApplicationNameFromRequest();
        }

        if ($key == 'domain')
        {
            return meanifyHelpers()->request()->getApplicationDomainFromRequest();
        }

        if ($key == 'base_url')
        {
            return meanifyHelpers()->request()->getApplicationBaseUrlFromRequest();
        }

    }

    /**
     * @param  $return_type  | full,region,offset
     * @return mixed|string
     */
    public function timezone($return_type = 'region')
    {
        $timezone = nikita()->DEFAULT_CONFIG_TIMEZONE;

        $user_session = meanifyHelpers()->request()->getUserSessionFromRequest();

        if (isset($user_session->user_settings->timezone))
        {
            if ($return_type == 'full')
            {
                $timezone = $user_session->user_settings->timezone;
            } else
            {
                [$offset, $region] = explode('@', $user_session->user_settings->timezone);

                $timezone = $return_type == 'region' ? $region : $offset;
            }
        }

        return $timezone;
    }

    /**
     * @return null
     */
    public function profile($key = null)
    {
        $result = null;

        $user_session = meanifyHelpers()->request()->getUserSessionFromRequest();

        if (isset($user_session->profile))
        {
            $result = $user_session->profile->{$key} ?? null;
        }

        return $result;
    }

    /**
     * @return array|mixed|string|null
     */
    public function getUserSessionFromRequest()
    {
        $user_session = request()->header('x-mfy-parsed-user-session');

        if (isset($user_session))
        {
            try
            {
                $user_session = json_decode(base64_decode($user_session));
            } catch (\Throwable $e)
            {
                $user_session = null;
            }
        }

        return $user_session;
    }

    /**
     * @return array|string|null
     */
    public function getAccountIdFromRequest()
    {
        return request()->header('x-mfy-parsed-account-id');
    }

    /**
     * @return array|string|null
     */
    public function getAccountPublicIdFromRequest()
    {
        $user_session = meanifyHelpers()->request()->getUserSessionFromRequest();

        return $user_session?->account->public_id;
    }

    /**
     * @return array|string|null
     */
    public function getUserIdFromRequest()
    {
        return request()->header('x-mfy-parsed-user-id');
    }

    /**
     * @return array|string|null
     */
    public function getUserPublicIdFromRequest()
    {
        $user_session = meanifyHelpers()->request()->getUserSessionFromRequest();

        return $user_session?->user->public_id;
    }

    /**
     * @return array|string|null
     */
    public function getUserMailEmailFromRequest()
    {
        return request()->header('x-mfy-parsed-user-email');
    }

    /**
     * @return array|string|null
     */
    public function getUserLanguageFromRequest()
    {
        return request()->header('x-mfy-parsed-user-language');
    }

    /**
     * @return array|string|null
     */
    public function getApplicationIdFromRequest()
    {
        return request()->header('x-mfy-parsed-application-id');
    }

    /**
     * @return array|string|null
     */
    public function getApplicationNameFromRequest()
    {
        return request()->header('x-mfy-parsed-application-name');
    }

    /**
     * @return array|string|null
     */
    public function getApplicationBaseUrlFromRequest()
    {
        $protocol = env('APP_SSL') == true ? 'https://' : 'http://';

        return $protocol.request()->header('x-mfy-application-domain');
    }

    /**
     * @return array|string|null
     */
    public function getApplicationDomainFromRequest()
    {
        return request()->header('x-mfy-application-domain');
    }
}
