<?php

namespace Meanify\LaravelHelpers\Utils\ContextMethods;

use Illuminate\Support\Facades\File;

class RenderBladeMethods
{
    private $throwable;
    private $prefix_path;

    public function __construct(?string $prefix_path = null, bool $throwable = true)
    {
        $this->prefix_path = $prefix_path;
        $this->throwable = $throwable;

        return $this;
    }

    /**
     * @param string $path
     * @param array|object $data
     * @return void
     * @throws \Exception
     */
    public function load(string $path, array|object $data = [], ?callable $callback_on_error = null)
    {
        try
        {
            $blade_path = $this->prefix_path.$path;

            $original_path = resource_path('views/'.str_replace('.','/',$blade_path).'.blade.php');

            if(!File::exists($original_path))
            {
                if($this->throwable)
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
            else
            {
                throw $e;
            }
        }
    }
}