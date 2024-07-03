<!-- resources/views/auth/register.blade.php -->
@extends('welcome')
@section('title',"studies medical certificate")
@section('content')
    
   <!-- resources/views/auth/register.blade.php -->
@vite(['resources/js/app.js', 'resources/js/medical-certificate-studies.js'])

<div class="container">
<div id="pesonalDetails">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center"  style="font-weight: 600;">{{$param}}</h3>
            <hr>

            <h5>Verify Pesonal Details</h5>

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif 
        
        @if(session()->has('error'))
            <div class="alert alert-danger"> {{-- Change 'alert-success' to 'alert-danger' --}}
                {{ session()->get('error') }}
            </div>
        @endif 
        
        <form id="register-form" method="POST" class="form-container">
            @csrf

            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="fname" class="form-label fw-semibold">First Name</label>
                        <input id="fname" type="text" name="fname" value="{{ old('fname', $user->first_name) }}" required autocomplete="fname" autofocus class="form-control">
                        <span class="text-danger" id="fname-error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="lname" class="form-label">Last Name</label>
                        <input id="lname" type="text" name="lname" value="{{ old('lname', $user->last_name) }}" required autocomplete="lname" autofocus class="form-control">
                        <span class="text-danger" id="lname-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="dob" class="form-label">Date Of Birth</label>
                        <input id="dob" type="date" name="dob" value="{{ old('dob', $user->dob) }}" required autocomplete="dob" autofocus class="form-control">
                        <span class="text-danger" id="dob-error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="pnumber" class="form-label">Phone Number</label>
                        <input id="pnumber" type="number" name="pnumber" value="{{ old('pnumber', $user->phone_number) }}" required autocomplete="pnumber" autofocus class="form-control">
                        <span class="text-danger" id="pnumber-error"></span>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="gender" class="form-label">Gender</label>
                        <select class="form-select genderSelector" name="gender" id="gender" value="{{ old('gender', $user->gender) }}" required>
                            <option value="not say" selected>Prefer not to say</option>
                            <option value="male">Male</option>
                            <option value="female">Female</option>
                        </select>
                        <span class="text-danger" id="gender-error"></span>
                    </div>
                </div>

                
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="indigene" class="form-label">Indigenous origin?</label>
                        <select class="form-select genderSelector" name="indigene" id="indigene" value="{{ old('indigene', $user->indigene) }}" required>
                            <option value="not say" selected>Prefer not to say</option>
                            <option value="no">No</option>
                            <option value="Aboriginal">Yes Aboriginal</option>
                            <option value="Torres Strait Islander origin">Yes Torres Strait Islander origin</option>
                        </select>
                        <span class="text-danger" id="indigene-error"></span>
                    </div>
                </div>
            </div>

            <div class="form-group mb-5">
                <label style="font-weight: 600;" for="address" class="form-label">Address</label>
                <input id="address" type="text" name="address" value="{{ old('address', $user->address) }}" required autocomplete="address" class="form-control">
                <span class="text-danger" id="address-error"></span>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" id="back" class="btn btn-light btn-block rounded border border-grey">Back</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" id="validate-button" class="btn btn-dark btn-block">Continue</button>
                    </div>
                </div>
            </div>
        </form>

        </div>
    </div>
</div>
<div>
    <div id="studiesDetials">
        <div class="row justify-content-center">
            <div class="col-md-6">
                <h3 class="text-center"  style="font-weight: 600;">{{$param}}</h3>
                <hr>
    
                <h5>Your educational institution</h5>
    
                @if(session()->has('success'))
                <div class="alert alert-success">
                    {{ session()->get('success') }}
                </div>
            @endif 
            
            @if(session()->has('error'))
                <div class="alert alert-danger"> {{-- Change 'alert-success' to 'alert-danger' --}}
                    {{ session()->get('error') }}
                </div>
            @endif 
            
            <form id="register-form" method="POST" class="form-container">
                @csrf

                <p style="font-weight: 600;">I am seeking:</p>
                <span class="text-danger " id="seeking"></span>

                <div class="row mt-4">

                    <div class="col-md-6">
                        <div class="form-group">
                              <input type="radio" id="sickLeave" name="studies" value="Sick leave from studies">
                              <label for="sickLeave">Sick leave from studies</label><br>
                              
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                              <input type="radio" id="resumeStudies" name="studies" value="Fit to resume studies">
                              <label for="resumeStudies">Fit to resume studies </label><br>
                          
                        </div>
                    </div>
                </div>
         
               

                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                            <label style="font-weight: 600;" for="yourStudiesPlace" class="form-label">Please confirm where you attend your studies</label>
                            <input id="yourStudiesPlace" type="text" name="yourStudiesPlace" value="{{ old('yourStudiesPlace') }}" required autocomplete="yourStudiesPlace" autofocus class="form-control">
                            <span class="text-danger" id="yourStudiesPlace-error"></span>
                        </div>
                    </div>
                </div>

                <div id="howLongFor">      
                    <p>How long do you need this for?</p>
                    <span class="text-danger " id="validDate"></span>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight: 600;" for="validFrom" class="form-label">Valid From</label>
                                <input id="validFrom" type="date" name="validFrom" value="{{ old('validFrom') }}" required autocomplete="validFrom" autofocus class="form-control">
                                <span class="text-danger" id="validFrom-error"></span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label style="font-weight: 600;" for="validTo" class="form-label">Valid To</label>
                                <input id="validTo" type="date" name="validTo" value="{{ old('validTo') }}" required autocomplete="validTo" autofocus class="form-control">
                                <span class="text-danger" id="validTo-error"></span>
                            </div>
                        </div>
                    </div>
                    <b><p>Note</p></b>
                    <li>If suitable, your Partner Doctor might change the end date based on what they believe is appropriate.</li>
                    <li>They do not write notes for longer than 14 days at a time and are unable to backdate them</li>
                </div>
      
                
               
                <div class="row mt-5">
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="button" id="back-personal-details" class="btn btn-light btn-block rounded border border-grey">Back</button>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="form-group">
                            <button type="button" id="validate-studies-details" class="btn btn-dark btn-block">Continue</button>
                        </div>
                    </div>
                </div>
            </form>
    
            </div>
        </div>
    </div>
    
</div>


<div id="medicalDetails">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center"  style="font-weight: 600;">{{$param}}</h3>
            <hr>

            <h5>Medical Information</h5>

            @if(session()->has('success'))
            <div class="alert alert-success">
                {{ session()->get('success') }}
            </div>
        @endif 
        
        @if(session()->has('error'))
            <div class="alert alert-danger"> {{-- Change 'alert-success' to 'alert-danger' --}}
                {{ session()->get('error') }}
            </div>
        @endif 
        
        <form id="register-form" method="POST" class="form-container">
            @csrf
            <p class="mt-4">Do you have any pre-existing health conditions your Partner Practitioner should be aware of?</p>
            <span class="text-danger " id="preExistingError"></span>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                          <input type="radio" id="preExistingHealthYes" name="preExistingHealth" value="Yes">
                          <label for="preExistingHealthYes">Yes </label><br>
                          <input type="radio" id="preExistingHealthNo" name="preExistingHealth" value="No">
                          <label for="preExistingHealthNo">No</label><br>
                    </div>
                </div>
            </div>

            <div id="healthConditions">
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                              <label for="informationPreExistingHealthYes">Please provide information about your pre-existing health conditions. </label><br>
                            <input id="informationPreExistingHealthYes" type="text" name="informationPreExistingHealthYes" value="{{ old('informationPreExistingHealthYes') }}" required autocomplete="informationPreExistingHealthYes" autofocus class="form-control">
                             <span class="text-danger " id="informationPreExistingHealthYes-error"></span>

                        </div>
                    </div>
                </div>    
            </div>
            
            
            <p>Are you taking any medications regularly?</p>
            <span class="text-danger " id="medicationsRegularly-error"></span>
            <div class="row mt-4">
                <div class="col-md-6">
                    <div class="form-group">
                          <input type="radio" id="medicationsRegularlyYes" name="medicationsRegularly" value="Yes">
                          <label for="preExistingHealthYes">Yes </label><br>
                          <input type="radio" id="medicationsRegularlyNo" name="medicationsRegularly" value="No">
                          <label for="medicationsRegularlyNo">No</label><br>
                    </div>
                </div>
            </div>

            <div id="medicationRegimen" >
                <div class="row">
                    <div class="col-md-12">
                        <div class="form-group">
                              <label for="medicationsRegularlyInfo">Please provide information about your standard medication regimen.</label><br>
                            <input id="medicationsRegularlyInfo" type="text" name="medicationsRegularlyInfo" value="{{ old('medicationsRegularlyInfo') }}" required autocomplete="medicationsRegularlyInfo" autofocus class="form-control">
                            <span class="text-danger " id="medicationsRegularlyInfo-error"></span>

                        </div>
                    </div>
                </div>
            </div>
    

            <div class="row">
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="startDateSymptoms" class="form-label">Start date of symptoms</label>
                        <input id="startDateSymptoms" type="date" name="startDateSymptoms" value="{{ old('startDateSymptoms') }}" required autocomplete="startDateSymptoms" autofocus class="form-control">
                        <span class="text-danger" id="startDateSymptoms-error"></span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="endDateSymptoms" class="form-label">End date of symptoms</label>
                        <input id="endDateSymptoms" type="date" name="endDateSymptoms" value="{{ old('endDateSymptoms') }}" required autocomplete="endDateSymptoms" autofocus class="form-control">
                        <p style="font-size: 10px;">Optional if not fully recorvered</p>
                        <span class="text-danger" id="endDateSymptoms-error"></span>
                    </div>
                </div>
            </div>

            <div class="row medicalLetterReasons">
         
                <div class="col-md-12">
                    <div class="form-group">
                        <label style="font-weight: 600;" for="medicalLetterReasons" class="form-label">Main reason for medical letter</label>
                        <select class="form-select genderSelector" name="medicalLetterReasons" id="medicalLetterReasons" value="{{ old('medicalLetterReasons') }}" required>
                            <option value="Common cold or flu">Common cold or flu</option>
                            <option value="Headache">Headache</option>
                            <option value="Migraine">Migraine</option>
                            <option value="Back pain">Back pain</option>
                            <option value="Period pain">Period pain</option>
                            <option value="Anxiety, stress or depression">Anxiety, stress or depression</option>
                            <option value="other">Other</option>
                        </select>
                        <span class="text-danger" id="medicalLetterReasons-error"></span>
                    </div>
                </div>
            </div>
            <div class="col-md-12">
                <div class="form-group">
                    <label style="font-weight: 600;" for="detailedSymptoms" class="form-label">Please describe the timeline and the details of your symptoms</label>
                    <textarea id="detailedSymptoms" name="detailedSymptoms" required autocomplete="detailedSymptoms" autofocus class="form-control"></textarea>
                    <p style="font-size: 10px;">20 words minimum. What you type in here won't be added onto the letter.</p>
                    <span class="text-danger" id="detailedSymptoms-error"></span>
                </div>
            </div>

            
    
        <div class="col-md-12">
            <div class="form-group">
                <label style="font-weight: 600;" for="privacy" class="form-label">Would you like your Partner Practitioner to include health details and symptoms in your letter, or prefer a more generic approach for privacy?</label>
                <select class="form-select genderSelector" name="privacy" id="privacy" value="{{ old('privacy') }}">
                    <option value="Yes Include specific health details and symptoms">Yes, Include specific health details and symptoms</option>
                    <option value="No maintain generic approach for confidentiality">No, maintain generic approach for confidentiality</option>
                </select>
                <span class="text-danger" id="privacy-error"></span>
            </div>
        </div>


    
            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" id="back-work" class="btn btn-light btn-block rounded border border-grey">Back</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" id="validate-medical" class="btn btn-dark btn-block">Continue</button>
                    </div>
                </div>
            </div>
        </form>

        </div>
    </div>
</div>



<div id="previewDetails">
    <div class="row justify-content-center">
        <div class="col-md-6">
            <h3 class="text-center"  style="font-weight: 600;">{{$param}}</h3>
            <hr>

            <h5>Review your details</h5>

            <h8  style="font-weight: 600;" class="mt-5">Personal Details</h8>
    
        <form id="register-form" method="POST" class="form-container">
            @csrf
            
            <div class="row mt-4">
                <div class="col-md-6">
                    <label>First Name</label>
                </div>
                <div class="col-md-6">
                    <label id="previewFirstName"></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Last Name</label>
                </div>
                <div class="col-md-6">
                    <label id="previewLastName"></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Date of Birth</label>
                </div>
                <div class="col-md-6">
                    <label id="previewDob"></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Phone number</label>
                </div>
                <div class="col-md-6">
                    <label id="previewPhoneNumber"></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Gender</label>
                </div>
                <div class="col-md-6">
                    <label id="previewGender"></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Indigenous origin?</label>
                </div>
                <div class="col-md-6">
                    <label id="previewIndigenousOrigin"></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Address</label>
                </div>
                <div class="col-md-6">
                    <label id="previewAddress"></label>
                </div>
            </div>

            <h8  style="font-weight: 600;" class="mt-4 mb-4">Work Details</h8>

            <div class="row">
                <div class="col-md-6">
                    <label>I am seeking:</label>
                </div>
                <div class="col-md-6">
                    <label id="previewSeeking"></label>
                </div>
            </div>

            <div class="row">
                <div class="col-md-6">
                    <label>Please confirm where you attend your studies</label>
                </div>
                <div class="col-md-6">
                    <label id="previewYourStudiesPlace"></label>
                </div>
            </div>

            <div  class="row" id="previewValidFromRow">
                <div class="col-md-6">
                    <label>Valid From</label>
                </div>
                <div class="col-md-6">
                    <label id="previewValidFrom"></label>
                </div>
            </div>

            <div  class="row" id="previewValidToRow">
                <div class="col-md-6">
                    <label>Valid To</label>
                </div>
                <div class="col-md-6">
                    <label id="previewValidTo"></label>
                </div>
            </div>

  

            <h8 style="font-weight: 600;" class="mt-4 mb-4">Medical Details</h8>


            <div  class="row">
                <div class="col-md-6">
                    <label>Do you have any pre-existing health conditions your Partner Practitioner should be aware of?</label>
                </div>
                <div class="col-md-6">
                    <label id="previewPreExistingHealth"></label>
                </div>
            </div>

            
            <div id="previewInformationPreExistingHealthYesRow" class="row">
                <div class="col-md-6">
                    <label>  Please provide information about your pre-existing health conditions.</label>
                </div>
                <div class="col-md-6">
                    <label id="previewInformationPreExistingHealthYes"></label>
                </div>
            </div>

            


            <div  class="row">
                <div class="col-md-6">
                    <label>Are you taking any medications regularly?</label>
                </div>
                <div class="col-md-6">
                    <label id="previewMedicationsRegularly"></label>
                </div>
            </div>

            <div  class="row" id="previewMedicationsRegularlyInfoRow">
                <div class="col-md-6">
                    <label>  Please provide information about your standard medication regimen.</label>
                </div>
                <div class="col-md-6">
                    <label id="previewMedicationsRegularlyInfo"></label>
                </div>
            </div>

            <div  class="row">
                <div class="col-md-6">
                    <label>Start date of symptoms</label>
                </div>
                <div class="col-md-6">
                    <label id="previewStartDateSymptoms"></label>
                </div>
            </div>


            <div  class="row">
                <div class="col-md-6">
                    <label>End date of symptoms</label>
                </div>
                <div class="col-md-6">
                    <label id="previewEndDateSymptoms"></label>
                </div>
            </div>


            <div  class="row">
                <div class="col-md-6">
                    <label>Main reason for medical letter</label>
                </div>
                <div class="col-md-6">
                    <label id="previewMedicalLetterReasons"></label>
                </div>
            </div>


            <div  class="row">
                <div class="col-md-6">
                    <label>Please describe the timeline and the details of your symptoms</label>
                </div>
                <div class="col-md-6">
                    <label id="previewDetailedSymptoms"></label>
                </div>
            </div>

            <div  class="row">
                <div class="col-md-6">
                    <label>Would you like your Partner Practitioner to include health details</label>
                </div>
                <div class="col-md-6">
                    <label id="previewPrivacy"></label>
                </div>
            </div>

           

            <div class="row mt-5">
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" id="back-medicals" class="btn btn-light btn-block rounded border border-grey">Back</button>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="form-group">
                        <button type="button" id="submit" class="btn btn-dark btn-block">Continue</button>
                    </div>
                </div>
            </div>
        </form>

        </div>
    </div>
</div>


</div>

@endsection