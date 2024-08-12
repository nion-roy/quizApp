@extends('layouts.backend.app')

@section('title', 'Show Trainer')

@section('main_content')
<!-- start page title -->
<div class="row">
  <div class="col-12">
    <div class="page-title-box d-sm-flex align-items-center justify-content-between">
      <h4 class="mb-sm-0 font-size-18">Show Trainer Detials !</h4>

      <div class="page-title-right">
        <ol class="breadcrumb m-0">
          <li class="breadcrumb-item"><a href="javascript: void(0);">Dashboard</a></li>
          <li class="breadcrumb-item active">Show Trainer Detials</li>
        </ol>
      </div>

    </div>
  </div>
</div>
<!-- end page title -->

<div class="row">
  <div class="col-12">
    <div class="card">
      <div class="card-header">
        <div class="d-flex align-items-center justify-content-between">
          <h4 class="card-title">Show Trainer Detials</h4>
          <a class="btn btn-danger waves-effect waves-light" href="{{ route('admin.trainers.index') }}"><i class="fa fa-arrow-left me-2"></i> Back Now</a>
        </div>
      </div>
      <div class="card-body">
        <div class="row">
          <div class="col-5 text-center">
            @if ($trainer->user->image == 'user.png' || $trainer->user->image == null)
            <img src="{{ asset('default/user.png') }}" alt="{{ $trainer->user->name }}" class="img-fluid img-thumbnail rounded-circle" style="width: 120px; height:120px">
            @else
            <img src="{{ asset($trainer->user->image) }}" alt="{{ $trainer->user->name }}" class="img-fluid img-thumbnail rounded-circle" style="width: 120px; height:120px">
            @endif
            <h3 class="mt-3 mb-1"> {{ $trainer->user->name }} <span class="font-size-14">- {{ $trainer->designation }}</span></h3>

            @if ($trainer->user->email)
            <span class="mb-2 d-inline-block font-size-14"><strong>Email:</strong> {{ $trainer->user->email }}</span>
            @endif
            @if ($trainer->user->number)
            <span class="mb-2 d-inline-block font-size-14 ms-3"><strong>Contact Number: </strong> {{ $trainer->user->number }}</span>
            @endif

            <div>
              @if ($trainer->fiverr)
              <a class="nav-link d-inline-block font-size-14" href="{{ $trainer->fiverr }}" target="_blank">Fiverr |</a>
              @endif
              @if ($trainer->upwork)
              <a class="nav-link d-inline-block font-size-14" href="{{ $trainer->upwork }}" target="_blank">Upwork |</a>
              @endif
              @if ($trainer->freelancer)
              <a class="nav-link d-inline-block font-size-14" href="{{ $trainer->freelancer }}" target="_blank">Freelancer |</a>
              @endif
              @if ($trainer->linkedin)
              <a class="nav-link d-inline-block font-size-14" href="{{ $trainer->linkedin }}" target="_blank">Linkedin</a>
              @endif
            </div>


            @if ($trainer->short_description)
            <hr class="border-dark">
            <p class="m-0">{{ $trainer->short_description }}</p>
            @endif

          </div>


          <div class="col-7">
            <h4>About Us</h4>
            <p> {{ $trainer->about }}</p>
            <h4 class="mt-5">Earning or Marketplace</h4>
            <p> {{ $trainer->short_description }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- end col -->
</div>
<!-- end row -->
@endsection