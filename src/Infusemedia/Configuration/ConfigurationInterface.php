<?php

namespace Infusemedia\Configuration;

use Infusemedia\Model\DatabaseConfig;

interface ConfigurationInterface
{
    public function getDatabaseConfig(): DatabaseConfig;
}
