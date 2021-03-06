@extends('layout')

@section('meta_title', 'Профиль')

@section('meta_description', 'Профиль')

@section('content')

  <div class="site__body">
    <br>
    <div class="block">
      <div class="container">
        <div class="row">
          <div class="col-12 col-lg-3 d-flex">

            @include('account.nav')

          </div>
          <div class="col-12 col-lg-9 mt-4 mt-lg-0">
            <div class="card">
              <div class="card-header">
                <h5>Edit Profile</h5>
              </div>
              <div class="card-divider"></div>
              <div class="card-body">
                <div class="row no-gutters">
                  <div class="col-12 col-lg-7 col-xl-6">
                    <div class="form-group">
                      <label for="profile-first-name">First Name</label>
                      <input type="text" class="form-control" id="profile-first-name" placeholder="First Name">
                    </div>
                    <div class="form-group">
                      <label for="profile-last-name">Last Name</label>
                      <input type="text" class="form-control" id="profile-last-name" placeholder="Last Name">
                    </div>
                    <div class="form-group">
                      <label for="profile-email">Email Address</label>
                      <input type="email" class="form-control" id="profile-email" placeholder="Email Address">
                    </div>
                    <div class="form-group">
                      <label for="profile-phone">Phone Number</label>
                      <input type="text" class="form-control" id="profile-phone" placeholder="Phone Number">
                    </div>
                    <div class="form-group mt-5 mb-0">
                      <button class="btn btn-primary">Save</button>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>

@endsection

@section('scripts')

@endsection