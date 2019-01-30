<?php

namespace Infusemedia\Database;

class QueryBuilder implements QueryBuilderInterface
{
    private $connection;

    public function __construct(ConnectionInterface $connection)
    {
        $this->connection = $connection->getConnection();
    }

    public function create(string $tableName, array $params): int
    {
        $query = sprintf(
            'INSERT INTO %s (%s) VALUES (%s)',
            $tableName,
            implode(', ', array_keys($params)),
            ':' . implode(', :', array_keys($params))
        );

        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $this->connection->lastInsertId();
    }

    public function query(string $query, array $params)
    {
        $statement = $this->connection->prepare($query);
        $statement->execute($params);

        return $statement->fetch(\PDO::FETCH_ASSOC);
    }
}
