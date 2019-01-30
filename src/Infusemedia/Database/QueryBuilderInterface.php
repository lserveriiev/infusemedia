<?php

namespace Infusemedia\Database;

interface QueryBuilderInterface
{
    public function create(string $tableName, array $parameters): int;

    public function query(string $query, array $params);
}
