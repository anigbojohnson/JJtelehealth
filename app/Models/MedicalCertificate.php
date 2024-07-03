<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MedicalCertificate extends Model
{
    use HasFactory;

    protected $table = 'medical_certificate';

    protected $fillable = [
        'requestDate',
        'user_email',
        'preExistingHealth',
        'medicationsRegularly',
        'seeking',
        'IAgree',
        'adjustmentsReasons',
        'preExistingHealthConditionInformation',
        'privacy',
        'medicationsRegularlyInfo',
        'symptomsDetailed',
        'location',
        'dailyWorkActivities',
        'validFrom',
        'medicalLetterReasons',
        'symptomsStartDate',
        'symptomsEndDate',
        'validTo',
        'careForSomeone',
        'personCared'
    ];
    
    

}
