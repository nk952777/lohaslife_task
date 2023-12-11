<?php
namespace App\Locale;

use Illuminate\Support\Facades\Enum;

class Locale extends Enum
{
    public const CN = 'cn';
    public const TW = 'tw';
    public const EMPTY = null;
}