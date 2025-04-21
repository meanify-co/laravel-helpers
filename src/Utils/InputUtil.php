<?php

namespace Meanify\LaravelHelpers\Utils;

use Illuminate\Support\Arr;

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
        return Arr::get($this->inputs, $input_key, $default);
    }
}
