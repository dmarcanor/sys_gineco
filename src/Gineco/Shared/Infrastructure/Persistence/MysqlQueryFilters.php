<?php

declare(strict_types=1);

namespace SysGineco\Gineco\Shared\Infrastructure\Persistence;

use Illuminate\Database\Query\Builder;

class MysqlQueryFilters
{
    protected $request;

    protected $builder;

    function apply(Builder $builder, array $clause){
        $this->builder = $builder;

        foreach(array_filter($clause) as $key => $value){
            if(method_exists($this,$key)){
                call_user_func_array([$this, $key], array_filter([$value]));
            }
        }
        return $this->builder;
    }

}
