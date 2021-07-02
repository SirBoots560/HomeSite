<?php
declare(strict_types=1);

namespace App\Application\Actions\Link;

use Psr\Http\Message\ResponseInterface as Response;

class EditLinkAction extends LinkAction
{
    /**
     * {@inheritdoc}
     */
    protected function action(): Response
    {

        $data = $this->getFormData();

        $this->linkRepository->editLink($data);

        $id = $data['id'];

        $this->logger->info("Link with ID ${id} was edited.");

        return $this->respondWithData();
    }
}
