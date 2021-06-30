<?php
declare(strict_types=1);

namespace App\Domain\Task;

use App\Domain\DomainException\DomainException;

class AddTaskException extends DomainException
{
    public $message = 'There was an issue adding your task.';
}
