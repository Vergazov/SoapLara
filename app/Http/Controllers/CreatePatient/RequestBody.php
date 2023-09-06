<?php

namespace App\Http\Controllers\CreatePatient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class RequestBody extends Controller
{
    public static function getRequestBody($guid, $idLPU, $birthDate, $familyName, $givenName, $idPatientMis, $sex): string
    {
        return "
        <soap:Envelope xmlns:soap=\"http://www.w3.org/2003/05/soap-envelope\" xmlns:tem=\"http://tempuri.org/\" xmlns:emk=\"http://schemas.datacontract.org/2004/07/EMKService.Data.Dto\">
            <soap:Header/>
            <soap:Body>
                <tem:AddPatient>
                    <tem:guid>$guid</tem:guid>
                    <tem:idLPU>$idLPU</tem:idLPU>
                <tem:patient>
                    <emk:BirthDate>$birthDate</emk:BirthDate>
                    <emk:FamilyName>$familyName</emk:FamilyName>
                    <emk:GivenName>$givenName</emk:GivenName>
                    <emk:IdPatientMIS>$idPatientMis</emk:IdPatientMIS>
                    <emk:Sex>$sex</emk:Sex>
                </tem:patient>
                </tem:AddPatient>
            </soap:Body>
        </soap:Envelope>";

    }
}
