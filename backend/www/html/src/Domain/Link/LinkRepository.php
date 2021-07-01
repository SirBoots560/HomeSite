<?php
declare(strict_types=1);

namespace App\Domain\Link;

use App\Domain\Repository;

abstract class LinkRepository extends Repository
{
    
    /**
     * 
     */
    abstract public function addLink();
}
