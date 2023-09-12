<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Patients;
use Illuminate\Http\Request;

class GetPatientFromMISController extends Controller
{
    public function getPatient(Request $request)
    {
        $IdPatientMIS = $request->all();

        return Patients::where('IdPatientMIS', $IdPatientMIS)->get();
    }
}
