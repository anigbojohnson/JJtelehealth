@extends('welcome')
@section('title',"Home")
@section('content')
<div class="container">
    <div  class="container container-fluid d-flex justify-content-center align-items-center mt-4">
      <h3>How can we help you today?</h3>
    </div>
    <div class="row gy-3 mt-5">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Online Prescriptions</h5>
            <li>For when your script has run out</li>
            <li>Script texted or meds delivered?</li>    
            <a href="#" class="btn btn-primary w-100 mt-3">Request Prescription</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Medical Certificates</h5>
            <li>For work, uni, school or carers</li>
            <li>Sent to your email in minutes</li>    

            <a href="{{ route('certificate') }}"class="btn btn-primary w-100 mt-3">Request Certificates</a>
          </div>
        </div>
      </div>
  
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Telehealth Consultations</h5>
            <li>For when you need to speak to a doctor</li>
            <li>Fast access to medical advice</li>    
            <a href="{{ route('telehealth') }}" class="btn btn-primary w-100 mt-3">Request Consultation</a>
          </div>
        </div>
      </div>
    </div>
    
  
    <div class="row gy-3 mt-3">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Weight Loss Treatment</h5>
            <li>Weight loss medical management</li>
            <li>Doctor consults & treatment options</li>    
            <a href="{{ route('weight-loss') }}" class="btn btn-primary w-100 mt-3">Request Consultation</a>
          </div>
        </div>
      </div>
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Blood Test Requests</h5>
            <li>For pregnancy, STIs and more</li>
            <li>Referrals sent to your email</li>    
            <a href="#" class="btn btn-primary w-100 mt-3">Request Blood Test</a>
          </div>
        </div>
      </div>
  
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top" src="..." alt="Card image cap">
          <div class="card-body">
            <h5>Specialist Referrals</h5>
            <li>For skin checks, eye tests and more</li>
            <li>Referrals sent to your email</li>    
            <a href="#" class="btn btn-primary w-100 mt-3">Request Referrals</a>
          </div>
        </div>
      </div>
    </div>
  </div>

  @endsection
