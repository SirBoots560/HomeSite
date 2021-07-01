<?php
declare(strict_types=1);

use App\Domain\Task\TaskRepository;
use App\Infrastructure\Persistence\Task\MySQLTaskRepository;
use App\Domain\Link\LinkRepository;
use App\Infrastructure\Persistence\Link\MySQLLinkRepository;
use DI\ContainerBuilder;

return function (ContainerBuilder $containerBuilder) {
    // Here we map the Repositoy interfaces to its CRUD repo class
    $containerBuilder->addDefinitions([
        TaskRepository::class => \DI\autowire(MySQLTaskRepository::class),
        LinkRepository::class => \DI\autowire(MySQLLinkRepository::class),
    ]);
};
