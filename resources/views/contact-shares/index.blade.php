@extends('layouts.app')

@section('content')
  <div class="container">
    <h1 class="text-center">Contacts shared with me</h1>
    @forelse ($sharedContacts as $contact)
      <div class="d-flex justify-content-between bg-dark mb-3 rounded px-4 py-2">
        <div>
          <a href="{{ route('contacts.show', $contact->id) }}">
            <img class="profile-picture profile-picture--small" src="{{ Storage::url($contact->profile_picture) }}">
          </a>
        </div>

        <div class="d-flex align-items-center">
          <p class="me-2 mb-0">{{ $contact->name }}</p>
          <p class="me-2 mb-0 d-none d-md-block">
            <a href="mailto:{{ $contact->email }}">
              {{ $contact->email }}
            </a>
          </p>
          <p class="me-2 mb-0 d-none d-md-block">
            <a href="tel:{{ $contact->phone_number }}">
              {{ $contact->phone_number }}
            </a>
          </p>

          <p class="me-2 mb-0 d-none d-md-block">Shared by <span class="text-info">{{ $contact->user->email }}</span></p>
        </div>
      </div>
    @empty
      <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
          <p>No contacts where shared with you yet</p>
        </div>
      </div>
    @endforelse

    <br>

    <h1 class="text-center">Contacts shared by me</h1>
    @forelse ($sharedContactsByUser as $contact)
      @foreach ($contact->sharedWith as $user)
        <div class="d-flex justify-content-between bg-dark mb-3 rounded px-4 py-2">
          <div>
            <a href="{{ route('contacts.show', $contact->id) }}">
              <img class="profile-picture profile-picture--small" src="{{ Storage::url($contact->profile_picture) }}">
            </a>
          </div>

          <div class="d-flex align-items-center">
            <p class="me-2 mb-0">{{ $contact->name }}</p>
            <p class="me-2 mb-0 d-none d-md-block">
              <a href="mailto:{{ $contact->email }}">
                {{ $contact->email }}
              </a>
            </p>
            <p class="me-2 mb-0 d-none d-md-block">
              <a href="tel:{{ $contact->phone_number }}">
                {{ $contact->phone_number }}
              </a>
            </p>

            <p class="me-2 mb-0 d-none d-md-block">Shared with <span class="text-info">{{ $user->email }}</span>

            <form action="{{ route('contact-shares.destroy', $user->pivot->id) }}" method="POST">
              @csrf
              @method('DELETE')

              <button type="submit" class="btn btn-danger mb-0 me-2 py-1 px-2">
                Unshare
              </button>
            </form>
            </p>
          </div>
        </div>
      @endforeach
    @empty
      <div class="col-md-4 mx-auto">
        <div class="card card-body text-center">
          <p>You still haven't shared contacts</p>
        </div>
      </div>
    @endforelse
  </div>
@endsection
