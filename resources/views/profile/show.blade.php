@extends('layouts.master')

@section('content')
    <!-- Main content -->
    <section class="content">

      <div class="row">
        <div class="col-md-3">

          <!-- Profile Image -->
          @include('profile.user_image')
          <!-- /.box -->

          <!-- About Me Box -->
          @include('profile.user_about')

          <!-- /.box -->
        </div>
        <!-- /.col -->
        <div class="col-md-9">
          <div class="nav-tabs-custom">
            <ul class="nav nav-tabs">
              <li class="active"><a href="#activity" data-toggle="tab">Activity</a></li>
              <li><a href="#settings" data-toggle="tab">Settings</a></li>
              <li><a href="#profile" data-toggle="tab">Profile</a></li>
            </ul>
            <div class="tab-content">

            <!-- user activity -->
            @include('profile.user_activity')

            <!-- user setting -->
            @include('profile.user_setting')

            <!-- user profile -->
            @include('profile.user_profile')

            </div>
            <!-- /.tab-content -->
          </div>
          <!-- /.nav-tabs-custom -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->

    </section>
    <!-- /.content -->
@endsection