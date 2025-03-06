<?php

namespace Meanify\LaravelHelpers\Utils;

use Carbon\Carbon;

class HtmlUtil
{
    /**
     * @notes Return URL to render inside link or script tag
     *
     * @return string
     */
    public function assetUrl($path, $assetsPrefix = true, $withRefreshCache = true, $datetimeCacheKey = false)
    {
        if (substr($path, 0, 1) != '/')
        {
            if ($assetsPrefix)
            {
                $path = '/app-assets/'.$path;
            } else
            {
                $path = '/'.$path;
            }
        }

        if (substr($path, 0, 12) != '/app-assets/')
        {
            if ($assetsPrefix)
            {
                $path = '/app-assets'.$path;
            }
        }

        $url = url($path);

        if ($withRefreshCache)
        {
            if ($datetimeCacheKey || env('APP_CACHE_DATETIME_KEY') == true)
            {
                $url .= '?c='.Carbon::now()->format('YmdHis');
            } else
            {
                $url .= '?c='.(env('APP_CACHE_ASSETS') == null ? substr(utils()->git()->getCurrentGitCommit(), 0, 6) : env('APP_CACHE_ASSETS'));
            }
        }

        return $url;
    }

    /**
     * @notes Return public URL from storage path
     *
     * @return string
     */
    public function publicStorageUrl($path)
    {
        $url = str_replace('/storage/app/public', '/storage', $path);

        return $url;
    }

    /**
     * @return string
     */
    public function renderBlankImageSvg($type = 'default', $theme = 'dark')
    {
        $html = $this->assetUrl('/img/icons/general/blank-picture-gray.png');

        if ($type == 'user')
        {
            $html = $this->assetUrl('/img/icons/general/blank-user-'.$theme.'.svg');
        } elseif ($type == 'picture')
        {
            $html = $this->assetUrl('/img/icons/general/blank-picture-'.$theme.'.svg');
        } elseif ($type == 'logo')
        {
            $html = $this->assetUrl('/img/icons/general/blank-picture-'.$theme.'.svg');
        } elseif ($type == 'banner')
        {
            $html = $this->assetUrl('/img/icons/general/blank-picture-'.$theme.'.svg');
        }

        return $html;
    }
}
