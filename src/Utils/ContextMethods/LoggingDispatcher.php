<?php

namespace Meanify\LaravelHelpers\Utils\ContextMethods;

use Illuminate\Support\Facades\Log as LogFacades;

class LoggingDispatcher
{
    private $app;
    private $codeOrMessage;
    private $exception;
    private $userSession;
    private $inputs;
    private $data;
    private $externalAppRequest;


    public function __construct($app, $codeOrMessage, $exception, $userSession, $inputs, $data)
    {
        $this->app                = $app;
        $this->codeOrMessage      = $codeOrMessage;
        $this->exception          = $exception;
        $this->userSession        = $userSession;
        $this->inputs             = $inputs;
        $this->data               = $data;
        $this->externalAppRequest = null;

        return $this;
    }


    /**
     * @param string $app
     * @param array|object|null $externalAppRequest
     * @return $this
     */
    public function setApp(string $app, $externalAppRequest = null)
    {
        $this->app = $app;
        $this->externalAppRequest = $externalAppRequest;

        return $this;
    }

    /**
     * @return void
     */
    public function alert(): void
    {
        $this->registerFacades('alert');
    }

    /**
     * @return void
     */
    public function critical(): void
    {
        $this->registerFacades('critical');
    }

    /**
     * @return void
     */
    public function debug(): void
    {
        $this->registerFacades('debug');
    }

    /**
     * @return void
     */
    public function emergency(): void
    {
        $this->registerFacades('emergency');
    }

    /**
     * @return void
     */
    public function error(): void
    {
        $this->registerFacades('error');
    }

    /**
     * @return void
     */
    public function info(): void
    {
        $this->registerFacades('info');
    }

    /**
     * @return void
     */
    public function warning(): void
    {
        $this->registerFacades('warning');
    }

    /**
     * @param $type
     * @return void
     */
    protected function registerFacades($type): void
    {
        $info = [
            'app'                   => $this->app,
            'code_or_message'       => $this->codeOrMessage,
            'user_session'          => $this->userSession,
            'exception'             => $this->exception,
            'inputs'                => $this->inputs,
            'data'                  => $this->data,
            'external_app_request'  => $this->externalAppRequest,
        ];

        try
        {
            LogFacades::$type($this->app.'.'.$this->codeOrMessage, $info);

        }
        catch (\Throwable $exception)
        {
            LogFacades::alert('log.registration.failed',[
                'type' => $type,
                'exception' => [
                    'code'    => $exception->getCode(),
                    'file'    => $exception->getFile(),
                    'line'    => $exception->getLine(),
                    'message' => $exception->getMessage(),
                ],
                'params' => [
                    'type'                  => $type,
                    'app'                   => $this->app,
                    'code_or_message'       => $this->codeOrMessage,
                    'user_session'          => $this->userSession,
                    'exception'             => $this->exception,
                    'inputs'                => $this->inputs,
                    'data'                  => $this->data,
                    'external_app_request'  => $this->externalAppRequest,
                ]
            ]);
        }
    }
}

