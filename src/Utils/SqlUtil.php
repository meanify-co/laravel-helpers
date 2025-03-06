<?php

namespace Meanify\LaravelHelpers\Utils;

class SqlUtil
{
    /**
     * @return array|string|string[]|null
     */
    public function getSql($query, $with_join_relations = false)
    {
        if ($with_join_relations)
        {
            try
            {
                $get_sql_with_bindings = function($query) {
                    $sql      = $query->toSql();
                    $bindings = $query->getBindings();

                    return preg_replace_callback('/\?/', function($match) use (&$bindings) {
                        $binding = array_shift($bindings);

                        return is_numeric($binding) ? $binding : "'$binding'";
                    }, $sql);
                };

                $main_query = clone $query;

                $relations = $main_query->getEagerLoads();

                foreach ($relations as $relation => $constraints)
                {
                    $related_query = $main_query->getRelation($relation)->getQuery();
                    $related_table = $related_query->getModel()->getTable();
                    $foreign_key   = $main_query->getModel()->$relation()->getForeignKeyName();
                    $owner_key     = $main_query->getModel()->$relation()->getOwnerKeyName();

                    $main_query->leftJoin($related_table, $foreign_key, '=', $owner_key);
                }

                $sql_with_bindings = $get_sql_with_bindings($main_query);
            } catch (\Throwable $e)
            {
                $sql_with_bindings = null;
            }

            return $sql_with_bindings;
        } else
        {
            $sql      = $query->toSql();
            $bindings = $query->getBindings();

            try
            {
                $sql_with_bindings = preg_replace_callback('/\?/', function($match) use (&$bindings) {
                    return "'".array_shift($bindings)."'";
                }, $sql);
            } catch (\Throwable $e)
            {
                $sql_with_bindings = null;
            }

            return $sql_with_bindings;
        }
    }
}
