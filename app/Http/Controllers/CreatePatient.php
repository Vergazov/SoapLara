<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CreatePatient\DoRequest;
use App\Http\Controllers\CreatePatient\Patient;
use App\Http\Controllers\CreatePatient\RequestBody;
use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;
use function Psy\debug;

class CreatePatient extends Controller
{
    public function index()
    {
        return view('patients.index');
    }

    public function create(Request $request): void
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

        #TODO
        # сделать переадресацию с выводом сообщения об успехе/ошибке

        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $response, $vals, $index);
        xml_parser_free($parser);

        if(isset($index['S:FAULT'])){
            dump($vals[19]['tag']);
            dump($vals[19]['value']);
        }else{
            echo 'Данные успешно отправлены';
        }

    }

}
