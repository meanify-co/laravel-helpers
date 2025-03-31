<?php

if (! function_exists('meanify_helpers'))
{
    /**
     * @return \Meanify\LaravelHelpers\Kernel
     */
    function meanify_helpers()
    {
        return app('meanify_helpers');
    }
}