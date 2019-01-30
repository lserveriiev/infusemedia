<?php

namespace Infusemedia\Configuration;

use Infusemedia\Model\DatabaseConfig;
use Symfony\Component\Yaml\Yaml;

class YamlConfiguration implements ConfigurationInterface
{
    private $databaseConfig;

    public function __construct()
    {
        $config = Yaml::parse(\file_get_contents(ROOT_DIR . 'config/config.yml'));
        $databaseConfig = $config['database'];

        $this->databaseConfig = new DatabaseConfig();

        $this->databaseConfig->setHost($databaseConfig['host']);
        $this->databaseConfig->setName($databaseConfig['name']);
        $this->databaseConfig->setPort($databaseConfig['port']);
        $this->databaseConfig->setUser($databaseConfig['user']);
        $this->databaseConfig->setPassword($databaseConfig['password']);
    }

    public function getDatabaseConfig(): DatabaseConfig
    {
        return $this->databaseConfig;
    }
}
