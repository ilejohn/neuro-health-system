@extends('layouts.app')

@section('content')
@status('admin|researcher')
<div class="container-fluid">
  <div class="row">
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-danger card-header-icon">
          <div class="card-icon">
            <i class="fa fa-info-circle"></i>
          </div>
          <p class="card-category">New Cases</p>
          <h3 class="card-title">15</h3>
        </div>
        <div class="card-foote">
          <!--div class="stats">
            <i class="fa fa-tag"></i> Tracked from Github
          </div-->
        </div>
      </div>
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <div class="card card-stats">
        <div class="card-header card-header-info card-header-icon">
          <div class="card-icon">
            <i class="fa fa-user"></i>
          </div>
          <p class="card-category">Patients</p>
          <h3 class="card-title">{{$patients->count()}}</h3>
        </div>
      </div>
    </div>
        <div class="col-lg-3 col-md-6 col-sm-6">
      <!--div class="card card-stats">
        <div class="card-header card-header-warning card-header-icon">
          <div class="card-icon">
            <i class="fa fa-hdd-o"></i>
          </div>
          <p class="card-category">Used Space</p>
          <h3 class="card-title">49/50
            <small>GB</small>
          </h3>
        </div>
      </div-->
    </div>
    <div class="col-lg-3 col-md-6 col-sm-6">
      <!--div class="card card-stats">
        <div class="card-header card-header-success card-header-icon">
          <div class="card-icon">
            <i class="fa fa-money"></i>
          </div>
          <p class="card-category">Revenue</p>
          <h3 class="card-title">#45,245</h3>
        </div>
        <div class="card-footer">
          <div class="stats">
            <i class="fa fa-calendar-o"></i> Last 24 Hours
          </div>
        </div>
      </div-->
    </div>
  </div>
  <div class="row">
    <div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-success">
          <div class="ct-chart" id="dailySalesChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Patient Registrations</h4>
          <p class="card-category">
            <span class="text-success"><i class="fa fa-long-arrow-up"></i> 55% </span> increase in weekly registrations.</p>
        </div>
      </div>
    </div>
    <!--div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-warning">
          <div class="ct-chart" id="websiteViewsChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Research Subscriptions</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
      </div>
    </div-->
    <!--div class="col-md-4">
      <div class="card card-chart">
        <div class="card-header card-header-danger">
          <div class="ct-chart" id="completedTasksChart"></div>
        </div>
        <div class="card-body">
          <h4 class="card-title">Completed Procedures</h4>
          <p class="card-category">Last Campaign Performance</p>
        </div>
      </div>
    </div-->
  </div>
</div>
@else 
 @include('layouts.unauthorise')
@endstatus
@endsection
@push('styles')
    <link href="assets/css/material-dashboard.css?v=2.1.1" rel="stylesheet"/>  
@endpush
@push('scripts')
  <script src="assets/js/chartist.min.js"></script>
  <script src="assets/js/material-dashboard.js?v=2.1.1" type="text/javascript"></script>
  <script>
    $(document).ready(function() {
      md.initDashboardPageCharts();

    });
  </script>
@endpush