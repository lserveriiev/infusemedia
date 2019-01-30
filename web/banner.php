<?php

define('ROOT_DIR', __DIR__ . '/../');

require ROOT_DIR . 'vendor/autoload.php';

use Infusemedia\Controller\{
    VisitorController, LogoController
};
use Infusemedia\Repository\VisitorRepository;
use Infusemedia\Database\{
    QueryBuilder, MysqlConnection
};
use Infusemedia\Configuration\YamlConfiguration;

$mysqlConnection = new MysqlConnection(new YamlConfiguration());
$queryBuilder = new QueryBuilder($mysqlConnection);
$repository = new VisitorRepository($queryBuilder);

$controller = new VisitorController($repository);
$controller->log();

$logoController = new LogoController();
$logoController->showLogo();