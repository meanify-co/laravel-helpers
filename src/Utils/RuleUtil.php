<?php

namespace Meanify\LaravelHelpers\Utils;

class RuleUtil
{
    /**
     * @return string
     */
    public function exists(string $table_name, string $column_to_check_if_exists, array $comparison_key_and_values, bool $check_soft_deleted = true)
    {
        $rule = "exists:$table_name,$column_to_check_if_exists";

        foreach ($comparison_key_and_values as $key => $value)
        {
            $rule .= ",$key,$value";
        }

        if ($check_soft_deleted)
        {
            $rule .= ',deleted_at,NULL';
        }

        return $rule;
    }
}
