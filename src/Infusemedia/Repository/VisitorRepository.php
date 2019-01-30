<?php

namespace Infusemedia\Repository;

use Infusemedia\Database\QueryBuilderInterface;
use Infusemedia\Model\Visitor;

class VisitorRepository implements VisitorRepositoryInterface
{
    private $tableName = 'visitor';

    private $queryBuilder;

    public function __construct(QueryBuilderInterface $queryBuilder)
    {
        $this->queryBuilder = $queryBuilder;
    }

    public function create(array $params): ?Visitor
    {
        $id = $this->queryBuilder->create($this->tableName, $params);

        return $this->findOneId($id);
    }

    public function findOneId(int $id): ?Visitor
    {
        $query = sprintf('SELECT * FROM %s WHERE id=:id', $this->tableName);

        $result = $this->queryBuilder->query($query, [
            'id' => $id
        ]);

        //wtf? result is boolean or array???
        if ($result !== false) {
            return $this->map($result);
        }

        return null;
    }

    public function increaseViewsCount(Visitor $visitor): void
    {
        $query = sprintf('UPDATE %s SET views_count=views_count+1 WHERE id=:id', $this->tableName);

        $this->queryBuilder->query($query, [
            'id' => $visitor->getId()
        ]);
    }

    public function findOneByIpUrlAndAgent(array $params): ?Visitor
    {
        $query = <<<SQL
  SELECT * 
  FROM {$this->tableName} 
  WHERE 
    ip_address=:ip_address 
    AND user_agent=:user_agent 
    AND page_url=:page_url
SQL;

        $result = $this->queryBuilder->query($query, $params);

        if ($result !== false) {
            return $this->map($result);
        }

        return null;
    }

    private function map(array $data): Visitor
    {
        $visitor = new Visitor();

        $visitor->setId($data['id']);
        $visitor->setIpAddress($data['ip_address']);
        $visitor->setUserAgent($data['user_agent']);
        $visitor->setViewDate(new \DateTime($data['view_date']));
        $visitor->setPageUrl($data['page_url']);
        $visitor->setViewCount($data['views_count']);

        return $visitor;
    }
}