<?php
declare(strict_types=1);

namespace App\Domain\Link;

use App\Domain\DomainException\DomainException;

class AddLinkException extends DomainException
{
    public $message = 'There was an issue adding your task.';
}
