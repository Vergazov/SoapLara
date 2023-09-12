<?php

namespace App\Http\Controllers;

use App\Http\Controllers\CreatePatient\RequestController;
use App\Http\Controllers\CreatePatient\PatientController;
use App\Http\Controllers\CreatePatient\RequestBodyController;
use App\Http\Controllers\Controller;
use App\Http\Requests\PatientRequest;
use App\Models\Patients;
use Illuminate\Http\Request;
use function Psy\debug;

class CreatePatientController extends Controller
{
    public function index()
    {
        return view('patients.index');
    }

    public function create(PatientRequest $request)
    {
        $patient = new PatientController
        (
            $request->input('birthDate'),
            $request->input('familyName'),
            $request->input('givenName'),
            $request->input('IdPatientMIS'),
            $request->input('sex'));

        $requestBody = RequestBodyController::getRequestBody
        (
            LPUController::getGuId(),
            LPUController::getIdLPU(),
            $patient->getBirthDate(),
            $patient->getFamilyName(),
            $patient->getGivenName(),
            $patient->getIdPatientMIS(),
            $patient->getSex()
        );

        $response = RequestController::doRequest(LPUController::getPixService(), $requestBody, HeadersController::getHeaders());

        // Преобразуем xml-ответ в массив для дальнейшей обработки
        $parser = xml_parser_create();
        xml_parse_into_struct($parser, $response, $vals, $index);
        xml_parser_free($parser);

        if(isset($index['S:FAULT'])){
            return $vals[19]['tag'] . ' ' .  $vals[19]['value'] . ' ' . $vals[17]['value'];
        }
        return TRUE;
    }

}
