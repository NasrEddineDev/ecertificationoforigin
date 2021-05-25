<?php

namespace App\Enums;

abstract class Status
{
    public const PENDING = 0;
    public const ACTIVE = 1;
    public const REJECT = 2;
    public const SUSPENDED = 3;
    public const OTHER = 5;
}