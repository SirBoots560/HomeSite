<?php
declare(strict_types=1);

namespace App\Domain;

abstract class Repository
{
    /**
     * @return array
     */
    abstract public function findAll(): array;

    /** 
     * @param string $data
     * @return string  
     */
    protected function sanitizeString(string $data): string
    {
        //Remove space bfore and after
        $data = trim($data); 

        //Remove slashes
        $data = stripslashes($data);

        //Sanitize
        $data=(filter_var($data, FILTER_SANITIZE_STRING));

        return $data;
    }

    /** 
     * @param string $data
     * @return string
     */
    protected function sanitizeInt(int $data): int
    {
        //Sanitize
        $data = (int) (filter_var( $data, FILTER_SANITIZE_NUMBER_INT));

        return $data;
    }
}