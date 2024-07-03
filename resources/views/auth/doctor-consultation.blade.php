@extends('welcome')
@section('title',"Doctor Consultation")
@section('content')

<div id="home-content" class="container"> 
    <div  class=" justify-content-center  mt-4">
      <h2>Telehealth Consultations</h2>
      <h4 class="mt-4"><i>
        General
      </i></h4>  
    </div>
    <div class="row gy-3 mt-4">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>General Consultation</h5>
            <p>Request a General Consultation for medical advice on a general health concern.</p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $12</span>

            <a href="{{ route('telehealth-consultation', ['param' => Str::slug( 'Telehealth Consultation '),'action'=>'telehealth-consult']) }}" class="btn btn-primary w-100 mt-3">Request Work Certificate</a>
          </div>
        </div>
      </div>
    </div>

    <h4 class="mt-4"><i>
      Weight Management
    </i></h4>  

    <div class="row gy-3 mt-4">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Weight Management Consultation</h5>
            <p>An expert program designed for ongoing weight management. Includes a pathology test and a consultation with a doctor.</p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $89</span>

            <a href="#" class="btn btn-primary w-100 mt-3">Request Work Certificate</a>
          </div>
        </div>
      </div>
    </div>


    <h4 class="mt-4"><i>
      Other Consultations
    </i></h4>  

    <div class="row gy-3 mt-4">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Mental Health Care Plan or Review</h5>
            <p>A video consultation with a doctor for a Mental Health Care Plan (20 minutes) or Review. Includes a referral to a psychologist</p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $89</span>

            <a href="#" class="btn btn-primary w-100 mt-5">Request Work Certificate</a>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>COVID-19 Oral Antiviral Treatments</h5>
            <p>New oral antiviral treatments are now available for people at risk of becoming unwell from COVID-19. See if you are eligible</p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1 mt-3">price: $89</span>

            <a href="#" class="btn btn-primary w-100 mt-4">Request Consultation</a>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Fertility Referral and Investigations (Female)</h5>
            <p>Speak to a doctor about your fertility and your eligibility for a referral to our partner Adora Fertility who provide a range of fertility treatment options via clinics throughout Australia.</p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $89</span>

            <a href="#" class="btn btn-primary w-100 mt-3">Request Consultation</a>
          </div>
        </div>
      </div>
    </div>

    <div class="row gy-3 mt-4">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Fertility Referral and Investigations (Male)</h5>
            <p>Speak to one of our experienced doctors about skin concerns such as acne and see what medical treatments may be available to you </p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $59</span>

            <a href="#" class="btn btn-primary w-100 mt-5">Request Consultation</a>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Acne Consultation</h5>
            <p>New oral antiviral treatments are now available for people at risk of becoming unwell from COVID-19. See if you are eligible</p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1 mt-3">price: $89</span>

            <a href="#" class="btn btn-primary w-100 mt-4">Request Consultation</a>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Sun Damage Consultation</h5>
            <p>Speak to one of our experienced doctors about premature aging of the skin due to sun damage </p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $59</span>

            <a href="#" class="btn btn-primary w-100 mt-3">Request Consultation</a>
          </div>
        </div>
      </div>
    </div>


    <div class="row gy-3 mt-4">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Fertility Referral and Investigations (Male)</h5>
            <p>Speak to one of our experienced doctors about skin concerns such as acne and see what medical treatments may be available to you </p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $59</span>

            <a href="#" class="btn btn-primary w-100 mt-5">Request Consultation</a>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Acne Consultation</h5>
            <p>New oral antiviral treatments are now available for people at risk of becoming unwell from COVID-19. See if you are eligible</p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1 mt-3">price: $89</span>

            <a href="#" class="btn btn-primary w-100 mt-4">Request Consultation</a>
          </div>
        </div>
      </div>


      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Sun Damage Consultation</h5>
            <p>Speak to one of our experienced doctors about premature aging of the skin due to sun damage </p>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $59</span>

            <a href="#" class="btn btn-primary w-100 mt-3">Request Consultation</a>
          </div>
        </div>
      </div>
    </div>




<div class="row gy-3 mt-4">
  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5>Hair Loss</h5>
        <p>Speak to one of our experienced doctors about a tailored Hair Loss program to help improve hair regrowth.</p>
        <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $59</span>

        <a href="#" class="btn btn-primary w-100 mt-5">Request Consultation</a>
      </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5>Smoking Cessation</h5>
        <p>Quit smoking for good through our medically guided smoking cessation program</p>
        <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1 mt-3">price: $89</span>

        <a href="#" class="btn btn-primary w-100 mt-4">Request Consultation</a>
      </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5>Alternative Therapies</h5>
        <p>Consult with a doctor experienced in prescribing alternative medications for a range of conditions.  </p>
        <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $190</span>

        <a href="#" class="btn btn-primary w-100 mt-3">Request Consultation</a>
      </div>
    </div>
  </div>
</div>
</div>



<div class="row gy-3 mt-4">
  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5>UTI Treatments</h5>
        <p>Speak to one of our experienced doctors about a tailored Hair Loss program to help improve hair regrowth.</p>
        <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $59</span>

        <a href="#" class="btn btn-primary w-100 mt-5">Request Consultation</a>
      </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5>STI Treatments</h5>
        <p>Speak to one of our experienced doctors if you are concerned that you have signs or symptoms of a sexually transmitted infection</p>
        <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1 mt-3">price: $49</span>

        <a href="#" class="btn btn-primary w-100 mt-4">Request Consultation</a>
      </div>
    </div>
  </div>


  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5>Multi-Day Medical Certificates</h5>
        <p>Request a consultation with a doctor for a multi-day medical or carer's certificate.   </p>
        <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $190</span>

        <a href="#" class="btn btn-primary w-100 mt-3">Request Consultation</a>
      </div>
    </div>
  </div>
</div>



<h4 class="mt-4"><i>
  Partner Consultations
</i></h4> 



<div class="row gy-3 mt-4">
  <div class="col-md-4">
    <div class="card">
      <img class="card-img-top" src="..." alt="Card image cap">
      <div class="card-body">
        <h5>Psychologist Consultation</h5>
        <p>A video consultation with an experienced psychologist from MyMirror (50 minutes)</p>
        <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">$119.65 after Medicare rebate</span>

        <a href="#" class="btn btn-primary w-100 mt-5">Request Consultation</a>
      </div>
    </div>
  </div>
</div>
</div>
  @endsection
