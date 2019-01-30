<?php

namespace Infusemedia\Repository;

use Infusemedia\Model\Visitor;

interface VisitorRepositoryInterface
{
    public function create(array $params): ?Visitor;

    public function findOneId(int $id): ?Visitor;

    public function findOneByIpUrlAndAgent(array $params): ?Visitor;

    public function increaseViewsCount(Visitor $visitor): void;
}