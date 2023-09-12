<?php

namespace App\Http\Controllers\CreatePatient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestController extends Controller
{
    public static function doRequest($url,$requestBody,$headers): bool|string
    {
        $ch = curl_init();
        curl_setopt($ch, CURLOPT_URL,$url);
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $requestBody);
        curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

        $response = curl_exec($ch);
        curl_close($ch);
        return $response;
    }
}
