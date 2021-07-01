<?php
declare(strict_types=1);

namespace App\Application\Actions\Link;

use Psr\Http\Message\ResponseInterface as Response;

class AddLinkAction extends LinkAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        $data = $this->getFormData();

        $this->linkRepository->addTask($data);

        $this->logger->info("A link was added.");

        return $this->respondWithData();
    }
}
