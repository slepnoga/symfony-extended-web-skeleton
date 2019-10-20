<?php
/**
 * Copyright (c) 2019.  Slepnoga.
 */

namespace App\Utils\Helpers;

use Exception;
use Ramsey\Uuid\Exception\UnsatisfiedDependencyException;
use Ramsey\Uuid\Uuid;

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


    /**
     * @throws Exception
     */
    public function generateUUID1()
    {
        try {
            // Generate a version 4 (random) UUID object
            $uuid1 = Uuid::uuid1();
        } catch (UnsatisfiedDependencyException $e) {
        }

        return $uuid1;
    }

}
