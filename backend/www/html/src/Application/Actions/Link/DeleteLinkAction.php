<?php
declare(strict_types=1);

namespace App\Application\Actions\Link;

use Psr\Http\Message\ResponseInterface as Response;

class DeleteLinkAction extends LinkAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

      $linkId = (int) $this->resolveArg('id');
      $task = $this->linkRepository->deleteLink($linkId);

      $this->logger->info("Task of id `${linkId}` was deleted.");

      return $this->respondWithData();
    }
}
