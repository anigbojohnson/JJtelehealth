@extends('welcome')
@section('title',"Weight Loss")
@section('content')

<div class="full-width-container">
    <div class="relative-container">
        <a style=" width:30%;" href="{{ route('weight-loss-consultation', ['param' => Str::slug( 'Weight lost '),'action'=>'weight-loss']) }}" class="btn bg-dark btn-primary btn-lg top-button">Get started</a>
        <img class="full-width-image" src="{{ asset('images/WL.jpg') }}" alt="weight loss poster">
    </div>
</div>
@if(session()->has('success'))
<div class="alert alert-success">
    {{ session()->get('success') }}
</div>
@endif 
<div id="home-content" class="container"> 
    
</div>
  @endsection
