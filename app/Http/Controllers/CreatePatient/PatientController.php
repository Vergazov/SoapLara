<?php

namespace App\Http\Controllers\CreatePatient;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class PatientController extends Controller
{
    private string $birthDate;
    private string $familyName;
    private string $givenName;
    private int $idPatientMIS;
    private int $sex;

    public function __construct($birthDate, $familyName, $givenName, $idPatientMIS, $sex)
    {
        $this->birthDate = $birthDate;
        $this->familyName = $familyName;
        $this->givenName = $givenName;
        $this->idPatientMIS = $idPatientMIS;
        $this->sex = $sex;
    }

    public function getBirthDate(): string
    {
        return $this->birthDate;
    }

    public function getFamilyName(): string
    {
        return $this->familyName;
    }

    public function getGivenName(): string
    {
        return $this->givenName;
    }

    public function getIdPatientMIS(): string
    {
        return $this->idPatientMIS;
    }

    public function getSex(): int
    {
        return $this->sex;
    }
}
