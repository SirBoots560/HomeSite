<?php
declare(strict_types=1);

use App\Application\Actions\Task\AddTaskAction;
use App\Application\Actions\Task\ListTasksAction;
use App\Application\Actions\Task\ListTasksCategoryAction;
use App\Application\Actions\Task\DeleteTaskAction;
use App\Application\Actions\Task\CompleteTaskAction;

use App\Application\Actions\Link\ListLinksAction;
use App\Application\Actions\Link\AddLinkAction;
use App\Application\Actions\Link\EditLinkAction;

use App\Application\Actions\File\ListFilesAction;
use App\Application\Actions\File\ListFilesCategoryAction;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\App;
use Slim\Interfaces\RouteCollectorProxyInterface as Group;

return function (App $app) {
    $app->options('/{routes:.*}', function (Request $request, Response $response) {
        // CORS Pre-Flight OPTIONS Request Handler
        return $response;
    });


    /**
     * Task Related Routes
     */
    $app->group('/tasks', function (Group $group) {

        //Route for listing all tasks        
        $group->get('', ListTasksAction::class);

        //Route for listing task category
        $group->get('/{category:[a-zA-Z]+}/{complete}', ListTasksCategoryAction::class);

        //Route for adding a new task
        $group->post('/add', AddTaskAction::class);

        //Route for deleting a task
        $group->delete('/{id:[0-9]+}', DeleteTaskAction::class);

        //Route for completing a task
        $group->put('/{id:[0-9]+}', CompleteTaskAction::class);
        
    });


    /**
     * Link Related Routes
     */
    $app->group('/links', function (Group $group) {

        //Route for listing all links       
        $group->get('', ListLinksAction::class);

        //Route for adding link      
        $group->post('/add', AddLinkAction::class);

        //Route for editing a link      
        $group->put('/edit', EditLinkAction::class);

    });


    /**
     * File Related routes
     */
    $app->group('/files', function (Group $group) {

        //Route for listing all files        
        $group->get('', ListFilesAction::class);

        //Route for listing files by category       
        $group->get('/{category:[a-zA-Z]+}', ListFilesCategoryAction::class);

    });
};
