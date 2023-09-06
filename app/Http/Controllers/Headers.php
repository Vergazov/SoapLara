<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class Headers extends Controller
{
    public static function getHeaders(): array
    {
        return ["Content-Type: application/soap+xml; charset=utf-8"];
    }
}
