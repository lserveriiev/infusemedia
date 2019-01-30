<?php

namespace Infusemedia\Database;

interface ConnectionInterface
{
    public function getConnection(): \PDO;
}
