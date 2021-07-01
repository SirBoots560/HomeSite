<?php
declare(strict_types=1);

namespace App\Application\Actions\File;

use App\Application\Actions\Action;
use App\Domain\File\FileRepository;
use Psr\Log\LoggerInterface;

abstract class FileAction extends Action
{
    /**
     * @var FileRepository
     */
    protected $fileRepository;

    /**
     * @param LoggerInterface $logger
     * @param FileRepository $fileRepository
     */
    public function __construct(LoggerInterface $logger,
                                FileRepository $fileRepository
    ) {
        parent::__construct($logger);
        $this->fileRepository = $fileRepository;
    }
}
