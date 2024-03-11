@extends('front-office.Organisateure.layout.tags_html')
@section('title', 'Board Reservation')
@section('content')
<div class="row">
       <!-- start page title -->
       <div class="row">
        <div class="col-12">
          <div class="page-title-box">
            <div class="page-title-right">
              <ol class="breadcrumb m-0">
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Hyper</a>
                </li>
                <li class="breadcrumb-item">
                  <a href="javascript: void(0);">Pages</a>
                </li>
                <li class="breadcrumb-item active">Profile</li>
              </ol>
            </div>
            <h4 class="page-title">Profile</h4>
          </div>
        </div>
      </div>
      <!-- end page title -->

      <div class="row">
        <div class="col-sm-12">
          <!-- Profile -->
          <div class="card bg-primary">
            <div class="card-body profile-user-box">
              <div class="row">
                <div class="col-sm-8">
                  <div class="row align-items-center">
                    <div class="col-auto">
                      <div class="avatar-lg">
                        <img
                          src="/organisateur/assets/images/profile.jpg"
                          alt=""
                          class="rounded-circle img-thumbnail"
                        />
                      </div>
                    </div>
                    <div class="col">
                      <div>
                        <h4 class="mt-1 mb-1 text-white">
                          {{session('user')->name}}
                        </h4>
                        <p class="font-13 text-white-50">
                            {{session('user')->email}}
                        </p>
                      </div>
                    </div>
                  </div>
                </div>
                <!-- end col-->
              </div>
              <!-- end row -->
            </div>
            <!-- end card-body/ profile-user-box-->
          </div>
          <!--end profile/ card -->
        </div>
        <!-- end col-->
      </div>
    <div>

      <div class="row">
        <div class="col-sm-4">
          <div class="card tilebox-one">
            <div class="card-body">
              <i
                class="ri-shopping-basket-2-line float-end text-muted"
              ></i>
              <h6 class="text-muted text-uppercase mt-0">My Events</h6>
              <h2 class="m-b-20">{{$events}}</h2>
            </div>
            <!-- end card-body-->
          </div>
          <!--end card-->
        </div>
        <!-- end col -->

        <div class="col-sm-4">
          <div class="card tilebox-one">
            <div class="card-body">
              <i class="ri-archive-line float-end text-muted"></i>
              <h6 class="text-muted text-uppercase mt-0">Approved Reservation</h6>
              <h2 class="m-b-20"><span>{{$app_reservations}}</span></h2>
            </div>
            <!-- end card-body-->
          </div>
          <!--end card-->
        </div>
        <!-- end col -->

        <div class="col-sm-4">
          <div class="card tilebox-one">
            <div class="card-body">
              <i class="ri-vip-diamond-line float-end text-muted"></i>
              <h6 class="text-muted text-uppercase mt-0">
                Rejected Events
              </h6>
              <h2 class="m-b-20">{{$rej_reservations}}</h2>
            </div>
            <!-- end card-body-->
          </div>
          <!--end card-->
          <div class="card tilebox-one">
            <div class="card-body">
              <i class="ri-time-fill float-end text-muted"></i>
              <h6 class="text-muted text-uppercase mt-0">Pending Reservation</h6>
              <h2 class="m-b-20"><span>{{$pend_reservations}}</span></h2>
            </div>
            <!-- end card-body-->
          </div>
          <!--end card-->
        </div>
        <!-- end col -->
      </div>
      <!-- end row -->

    </div>
    <!-- end col -->
  </div>

  @endsection