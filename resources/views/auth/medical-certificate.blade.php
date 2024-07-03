@extends('welcome')
@section('title',"Medical certificate")
@section('content')

<div id="home-content" class="container"> 
      @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
      @endif
    <div  class=" justify-content-center  mt-4">
      <h2>Medical Certificates</h2>
      <p>
        <i>
        Complete our quick online form which will be certified by one of our doctors.
        Please note, the medical certificate will be issued for today. We cannot backdate certificates.
      </i>
       
      </p>  
    </div>
    <div class="row gy-3 mt-5">
      <div class="col-md-4">
        <div class="card">
          <img class="card-img-top"  src="{{ asset('images/MC-work.jpg') }}"  alt="Card image cap">
          <div class="card-body">
            <h5>Work</h5>
            <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $12</span>

            <a href="{{ route('medical-certificate', ['param' => Str::slug('Medical Certificate For Work'), 'action' => 'work-medical-certificate']) }}"  class="btn btn-primary w-100 mt-3">Request Work Certificate</a>
          </div>
        </div>
      </div>
      
        <div class="col-md-4">
          <div class="card">
            <img class="card-img-top" src="{{ asset('images/MC-School.png') }}"  alt="Card image cap">
            <div class="card-body">
              <h5>School</h5>
              <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $12</span>
  
              <a href="{{ route('medical-certificate', ['param' => Str::slug( 'Medical Certificate For School'),'action'=>'studies-medical-certificate']) }}" class="btn btn-primary w-100 mt-3">Request School Certificate</a>
            </div>
          </div>
        </div>
  
        
            <div class="col-md-4">
              <div class="card">
                <img class="card-img-top" src="{{ asset('images/MC-holiday-traveller.jpg') }}" alt="Card image cap">
                <div class="card-body">
                  <h5>Travel and holiday Cancellation</h5>
                  <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $12</span>
                  <a href="{{ route('medical-certificate', ['param' => Str::slug( 'Request Travel and holiday Certificate'),'action'=>'travel-and-holiday-certificate']) }}" class="btn btn-primary w-100 mt-3">Request Travel and holiday Certificate</a>

                </div>
              </div>
            </div>
    
        </div>
    <div class="row gy-3 mt-5">
        <div class="col-md-4">
            <div class="card">
            <img class="card-img-top" src="{{ asset('images/MC-carer.jpg') }}" alt="Card image cap">
            <div class="card-body">
                <h5>Carer's Leave</h5>
              
                <span style="background-color: lightblue;font-weight: bold;" class="text-white rounded px-2 py-1">price: $12</span>
    
                <a href="{{ route('medical-certificate', ['param' => Str::slug( "Request Carer Leave Certificate"),'action'=>"carer's-Leave-certificate"]) }}" class="btn btn-primary w-100 mt-3">Request Carer's Leave Certificate</a>
            </div>
            </div>
        </div>

        
        </div>
        </div>
  @endsection
