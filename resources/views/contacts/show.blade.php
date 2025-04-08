@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Edit Contact</div>
          <div class="card-body">
            <p><strong>Name:</strong> {{ $contact->name }}</p>
            <p><strong>Phone Number:</strong>
              <a href="tel:{{ $contact->phone_number }}">{{ $contact->phone_number }}</a>
            </p>
            <p><strong>Email:</strong>
              <a href="mailto:{{ $contact->email }}">{{ $contact->email }}</a>
            </p>
            <p><strong>Age:</strong> {{ $contact->age }}</p>
            <p><strong>Created at:</strong> {{ $contact->created_at }}</p>
            <p><strong>Last Updated:</strong> {{ $contact->updated_at }}</p>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
