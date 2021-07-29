<?php

namespace App\Enums;

abstract class Steps
{
    public const REGISTRATION = 0;
    public const ACTIVATION = 1;
    public const ENTERPRISE = 2;
    public const MANAGER = 3;
    public const ATTACHMENTS = 4;
    public const CONFIRMATION = 5;
}