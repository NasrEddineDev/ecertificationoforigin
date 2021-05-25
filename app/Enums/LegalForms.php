<?php

namespace App\Enums;

abstract class LegalForm
{
    public const SPA = 0;
    public const SARL = 1;
    public const EURL = 2;
    public const ETS = 3;
    public const SNC = 4;
    public const OTHER = 5;
}