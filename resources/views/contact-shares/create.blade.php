@extends('layouts.app')

@section('content')
  <div class="container">
    <div class="row justify-content-center">
      <div class="col-md-8">
        <div class="card">
          <div class="card-header">Share your Contact</div>
          <div class="card-body">
            <form method="POST" action="{{ route('contact-shares.store') }}">
              @csrf

              <div class="row mb-3">
                <label for="contact_email" class="col-md-4 col-form-label text-md-end">Contact Email</label>

                <div class="col-md-6">
                  <input
                    id="contact_email"
                    type="text"
                    class="form-control @error('contact_email') is-invalid @enderror"
                    name="contact_email"
                    value="{{ old('contact_email') }}"
                    autofocus
                    autocomplete="email"
                  />

                  @error('contact_email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-3">
                <label for="user_email" class="col-md-4 col-form-label text-md-end">User Email</label>

                <div class="col-md-6">
                  <input
                    id="user_email"
                    type="text"
                    class="form-control @error('user_email') is-invalid @enderror"
                    name="user_email"
                    value="{{ old('user_email') }}"
                    autocomplete="email"
                  />

                  @error('user_email')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>

              <div class="row mb-0">
                <div class="col-md-6 offset-md-4">
                  <button type="submit" class="btn btn-primary">
                    Submit
                  </button>
                </div>
              </div>

            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
@endsection

