<?php
require_once __DIR__ . '/vendor/autoload.php';

use Builder\QueryBuilder\MysqlQueryBuilder;
use Builder\QueryBuilder\PostgresQueryBuilder;
use Builder\Director\QueryDirector;

$director = new QueryDirector();

echo "Testing MySQL query builder:\n";
echo $director->buildUserQuery(new MysqlQueryBuilder());

echo "\n\nTesting PostgreSQL query builder:\n";
echo $director->buildUserQuery(new PostgresQueryBuilder());
echo "\n\n";