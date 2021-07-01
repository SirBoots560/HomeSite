<?php
declare(strict_types=1);

namespace App\Application\Actions\Link;

use Psr\Http\Message\ResponseInterface as Response;

class ListLinksAction extends LinkAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {
        $links = $this->linkRepository->findAll();

        $this->logger->info("Links list was viewed.");
        
        return $this->respondWithData($links);
    }
}
