@extends('layouts.app')
@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i>Patient Record View</h4>
                    <hr>
                    @include('layouts.message')
                <thead>
                <tr>
                    <th><i class="fa fa-id-badge"></i> Patient ID</th>
                    <th><i class="fa fa-list"></i> Full Name</th>
                    <th><i class="fa fa-birthday-cake"></i> Age</th>
                    <th><i class="fa fa-transgender"></i> Sex</th>
                    <th class="hidden-phone"><i class=" fa fa-phone-square"></i> Phone Number</th>
                    <th><i class="fa fa-tasks"></i> Action</th>
                </tr>
                </thead>
                <tbody>
                <tr>
            
                    <td>{{$patient->id}}</td>
                    <td><a href="#">{{$patient->name}}</a></td>
                    <td>{{$patient->age}}</td>
                    <td>{{$patient->sex}}</td>
                    <td class="hidden-phone">{{$patient->phoneNumber}}</td>
                    <td>
                        <a href={{route('biodata',[$patient->user])}} class="btn btn-info btn-sm">Details</a>
                    </td>
                </tr>  
                  
                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->
@endsection