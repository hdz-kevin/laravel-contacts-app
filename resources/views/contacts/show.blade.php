@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Edit Contact</div>
          <div class="card-body">
            <div class="mb-2">
                <img class="profile-picture" src="{{ Storage::url($contact->profile_picture) }}">
            </div>
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
            <div class="d-flex justify-content-end gap-2">
              <a href="{{ route('contacts.edit', $contact->id) }}" class="btn btn-secondary mb-2">
                Edit Contact
              </a>
              <form action="{{ route('contacts.destroy', $contact->id) }}" method="POST">
                @csrf
                @method('DELETE')

                <button type="submit" class="btn btn-danger mb-2">
                  Delete Contact
                </button>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection
