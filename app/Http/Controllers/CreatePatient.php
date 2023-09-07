<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CreatePatient\DoRequest;
use App\Http\Controllers\CreatePatient\Patient;
use App\Http\Controllers\CreatePatient\RequestBody;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patients;
use Illuminate\Http\Request;
use function Psy\debug;

class CreatePatient extends Controller
{
    public function index(Request $req)
    {
        $oldData = $req->old('sex');
        return view('patients.index',compact('oldData'));

    }

    public function create(PatientRequest $request)
    {
        $patient = new Patient
        (
            $request->input('birthDate'),
            $request->input('familyName'),
            $request->input('givenName'),
            $request->input('IdPatientMIS'),
            $request->input('sex'));

        $requestBody = RequestBody::getRequestBody
        (
            LPU::getGuId(),
            LPU::getIdLPU(),
            $patient->getBirthDate(),
            $patient->getFamilyName(),
            $patient->getGivenName(),
            $patient->getIdPatientMIS(),
            $patient->getSex()
        );

        $response = DoRequest::doRequest(LPU::getPixService(), $requestBody, Headers::getHeaders());

        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $response, $vals, $index);
        xml_parser_free($parser);

        if(isset($index['S:FAULT'])){
            return $vals[19]['tag'] . ' ' .  $vals[19]['value'] . ' ' . $vals[17]['value'];
        }
        return TRUE;

    }

}
