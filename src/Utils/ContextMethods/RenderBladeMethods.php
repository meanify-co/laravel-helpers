<?php

namespace Meanify\LaravelHelpers\Utils\ContextMethods;

use Illuminate\Support\Facades\File;

class RenderBladeMethods
{
    private $default_callback;
    private $default_throwable;
    private $prefix_path;

    /**
     * @param string|null $prefix_path
     * @param bool $throwable
     * @param callable|null $callback_on_error
     */
    public function __construct(?string $prefix_path = null, bool $throwable = true, ?callable $callback_on_error = null)
    {
        $this->prefix_path       = $prefix_path;
        $this->default_throwable = $throwable;
        $this->default_callback  = $callback_on_error;

        return $this;
    }

    /**
     * @param string $path
     * @param array|object $data
     * @return void
     * @throws \Exception
     */
    public function load(string $path, array|object $data = [], bool $throwable = false, ?callable $callback_on_error = null)
    {
        try
        {
            $blade_path = $this->prefix_path.$path;

            $original_path = resource_path('views/'.str_replace('.','/',$blade_path).'.blade.php');

            if(!File::exists($original_path))
            {
                if($throwable ?? $this->default_throwable)
                {
                    throw new \Exception('Blade file not found: '.$blade_path);
                }

                $html = '';
            }
            else
            {
                $html = view($blade_path, json_decode(json_encode($data,256),true))->render();
            }

            return $html;
        }
        catch (\Exception $e)
        {
            if (is_callable($callback_on_error))
            {
                $callback_on_error($e, $path, $data);
            }
            else if (is_callable($this->default_callback))
            {
                $default_callback = $this->default_callback;

                $default_callback($e, $path, $data);
            }
            else
            {
                throw $e;
            }
        }
    }
}