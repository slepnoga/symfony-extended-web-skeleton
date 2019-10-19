<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 */

namespace App\Utils\Helpers;

use Exception;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;
use Darsyn\IP\Doctrine\MultiType as IP;
use Darsyn\IP\Exception as DarsynException;

trait LoggingUserhelper
{
    /**
     * @throws Exception
     */
    public function generateUUID()
    {
        try {
            // Generate a version 4 (random) UUID object
            $uuid4 = Uuid::uuid4();
        } catch (UnsatisfiedDependencyException $e) {
        }
        return $uuid4;
    }


}