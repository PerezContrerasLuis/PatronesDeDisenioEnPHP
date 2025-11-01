<?php

namespace Builder\Director;

use Builder\QueryBuilder\SQLQueryBuilder;

class QueryDirector
{
    public function buildUserQuery(SQLQueryBuilder $queryBuilder): string
    {
        $query = $queryBuilder
        ->select("users",["name","email","password"])
        ->where("age",18,">")
        ->where("age",18,"<")
        ->getSQL();
        return $query;
    }
}