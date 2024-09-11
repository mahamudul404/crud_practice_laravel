@extends('layouts.app')

@section('content')
<div class="container">
<h2 class="">User Details</h2>  
<div class="card">
  <div class="card-body">
    <h5 class="card-title">{{ $human->name }}</h5>
    <p class="card-text">
      <strong>Email:</strong> {{ $human->email }} <br>
      <strong>Age:</strong> {{ $human->age }} <br>
      @if ($human->picture)
          <strong>Picture:</strong> <br>
        <img src="{{ asset('images/' . $human->picture) }}" width="100" alt="User Picture" style="max-width: 300px">
        @else
        <strong>Picture:</strong> No picture Uploaded
      @endif
    </p>
  </div>
</div>
</div>  


@endsection