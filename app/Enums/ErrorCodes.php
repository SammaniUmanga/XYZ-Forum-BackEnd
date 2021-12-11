<?php

namespace App\Enums;

class ErrorCodes
{
    const UNDEFINED             = 1001;
    const INVALID_REQUEST       = 4020;
    const BAD_REQUEST           = 4000;
    const VALIDATION_ERROR      = 3006;
    const SERVER_ERROR          = 5021;
    const NOT_FOUND             = 2201;
    const ALREADY_EXISTS        = 2401;
    const INVALID_RECORD        = 2202;
    const DB_TRANSACTION_ERROR  = 5000;
}
