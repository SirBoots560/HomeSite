<?php
declare(strict_types=1);

use App\Application\Actions\Task\AddTaskAction;
use App\Application\Actions\Task\ListTasksAction;
use App\Application\Actions\Task\ViewTaskAction;
use App\Application\Actions\Task\ListTasksCategoryAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });

    $app->get('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->post('/', function (Request $request, Response $response) {
        $response->getBody()->write('Hello world!');
        return $response;
    });

    $app->group('/tasks', function (Group $group) {

        //Route for listing all tasks        
        $group->get('', ListTasksAction::class);

        //Route for listing one task
        $group->get('/{category:[a-zA-Z]+}', ListTasksCategoryAction::class);

        //Route for listing one task
        $group->get('/{id:[0-9]+}', ViewTaskAction::class);

        //Route for adding a new task
        $group->post('/add', AddTaskAction::class);
        
    });
};
