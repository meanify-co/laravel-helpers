<?php

namespace Meanify\LaravelHelpers\Utils;

use Meanify\LaravelHelpers\Utils\ContextMethods\LoggingDispatcher;

class LogUtil
{
    /**
     * @return LoggingDispatcher
     */
    public function init(string $codeOrMessage, $exception = null, ?object $userSession = null, array|object|null $inputs = [], array|object|null $data = null)
    {
        return new LoggingDispatcher('api', $codeOrMessage, $exception, $userSession, $inputs, $data);
    }
}
