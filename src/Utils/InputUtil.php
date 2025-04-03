<?php

namespace Meanify\LaravelHelpers\Utils;

class InputUtil
{
    protected $inputs;
    
    public function __construct(array|null $inputs = null)
    {
        $this->inputs = $inputs ?? request()->all();
    }

    /**
     * @param $input_key
     * @param $default
     * @return mixed
     */
    public function get($input_key, $default = null): mixed
    {
        if(isset($this->inputs[$input_key]))
        {
            return $this->inputs[$input_key];
        }
        
        return $default;
    }
}
