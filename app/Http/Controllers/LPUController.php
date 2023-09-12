<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class LPUController extends Controller
{
    private static string $idLPU = '8c9e3da3-bf8d-499a-8dc8-0ddb64a6bd3b';
    private static string $guId = '8be1d588-ec4b-f302-f9ad-b9f4623c94e5';
    private static string $pixService = 'http://b2b-demo.n3health.ru/emk/PixService.svc?wsdl';
    private static string $EMKService = 'http://b2b-demo.n3health.ru/emk/EMKService.svc?wsdl';

    public static function getIdLPU(): string
    {
        return self::$idLPU;
    }

    public static function getGuId(): string
    {
        return self::$guId;
    }

    public static function getPixService(): string
    {
        return self::$pixService;
    }

    public static function getEMKService(): string
    {
        return self::$EMKService;
    }
}
