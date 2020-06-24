@extends('layouts.app')

@section('content')
@status('admin|researcher')
<h3 class="mt-3"><i class="fa fa-angle-right"></i> Admin Dashboard</h3>
    <!-- page start-->
    <div class="tab-pane" id="chartjs">
        <div class="row mt">
            <div class="col-lg-6">
                <div class="content-panel">
			  <h4><i class="fa fa-angle-right"></i> Doughnut</h4>
                    <div class="panel-body text-center">
                        <canvas id="doughnut" height="300" width="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-panel">
			  <h4><i class="fa fa-angle-right"></i> Line</h4>
                    <div class="panel-body text-center">
                        <canvas id="line" height="300" width="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt">
            <div class="col-lg-6">
                <div class="content-panel">
			  <h4><i class="fa fa-angle-right"></i> Radar</h4>
                    <div class="panel-body text-center">
                        <canvas id="radar" height="300" width="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-panel">
			  <h4><i class="fa fa-angle-right"></i> Polar Area</h4>
                    <div class="panel-body text-center">
                        <canvas id="polarArea" height="300" width="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
        <div class="row mt">
            <div class="col-lg-6">
                <div class="content-panel">
			  <h4><i class="fa fa-angle-right"></i> Bar</h4>
                    <div class="panel-body text-center">
                        <canvas id="bar" height="300" width="400"></canvas>
                    </div>
                </div>
            </div>
            <div class="col-lg-6">
                <div class="content-panel">
			  <h4><i class="fa fa-angle-right"></i> Pie</h4>
                    <div class="panel-body text-center">
                        <canvas id="pie" height="300" width="400"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- page end-->
@else 
 @include('layouts.unauthorise')
@endstatus
@endsection 
@push('scripts')
    <script src="{{ asset('assets/js/chart-master/Chart.js') }}"></script>
    <script src="{{ asset('assets/js/chartjs-conf.js') }}"></script>
@endpush