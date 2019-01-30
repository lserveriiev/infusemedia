<?php

namespace Infusemedia\Controller;

use Infusemedia\Repository\VisitorRepositoryInterface;

class VisitorController
{
    private $repository;

    public function __construct(VisitorRepositoryInterface $repository)
    {
        $this->repository = $repository;
    }

    public function log(): void
    {
        $params = [
            'user_agent' => $_SERVER['HTTP_USER_AGENT'],
            'page_url' => $_SERVER['HTTP_REFERER'],
            'ip_address' => $_SERVER['REMOTE_ADDR']
        ];

        $visitor = $this->repository->findOneByIpUrlAndAgent($params);

        if (null === $visitor) {
            $this->repository->create($params);
        } else {
            $this->repository->increaseViewsCount($visitor);
        }
    }
}
