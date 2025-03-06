<?php

if (! function_exists('meanifyHelpers'))
{
    /**
     * @return \Meanify\LaravelHelpers\Kernel
     */
    function meanifyHelpers()
    {
        return app('meanifyHelpers');
    }
}