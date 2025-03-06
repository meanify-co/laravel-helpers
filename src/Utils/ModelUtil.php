<?php

namespace Meanify\LaravelHelpers\Utils;

class ModelUtil
{
    /**
     * @return mixed
     */
    public function instanceModelFromModelName(string $model_name)
    {
        $model_path = 'App\Models\\'.$model_name;
        $instance   = new $model_path;

        return $instance;
    }

    /**
     * @return string
     */
    public function getModelName($model)
    {
        $path = explode('\\', is_object($model) ? $model::class : $model);

        $name = $path[count($path) - 1];

        return $name;
    }

    /**
     * @return bool
     */
    public function isValidModelPublicId($model, $model_public_id)
    {
        $is_valid = true;

        try
        {
            $model_name     = meanifyHelpers()->model()->getModelName($model);
            $model_instance = meanifyHelpers()->model()->instanceModelFromModelName($model_name);

            $model_code_prefix = $model_instance::$MODEL_CODE_PREFIX;

            $model_code_prefix_parts = explode('_', $model_code_prefix);

            $model_public_id_parts = explode('_', $model_public_id);

            if (count($model_code_prefix_parts) != count($model_public_id_parts))
            {
                $is_valid = false;
            } else
            {
                for ($i = 0; $i < count($model_code_prefix_parts) - 1; $i++) //Compare non hash parts
                {if ($model_code_prefix_parts[$i] != $model_public_id_parts[$i])
                {
                    $is_valid = false;

                    break;
                }
                }
            }
        } catch (\Throwable $e)
        {
            $is_valid = false;
        }

        return $is_valid;
    }
}
