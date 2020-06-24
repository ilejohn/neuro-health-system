@extends('layouts.app')
@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> Medical Record Table</h4>
                <h6 class="ml-4">List of All Registered Patients</h6>
                    <hr>
                   <div class="ml-1 mr-2">
                        @include('layouts.message')
                        @include('layouts.errors')
                   </div>
                <thead>
                <tr>
                    <th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
                    <th><i class="fa fa-id-badge"></i> Patient ID</th>
                    <th><i class="fa fa-list"></i> Full Name</th>
                    <th><i class="fa fa-birthday-cake"></i> Age</th>
                    <th><i class="fa fa-transgender"></i> Sex</th>
                    <th class="hidden-phone"><i class=" fa fa-phone-square"></i> Phone Number</th>
                    <th><i class="fa fa-tasks"></i> Actions</th>
                </tr>
                </thead>
                
                <tbody>
                    @if($patients->count())
                    @php
                      $count = 1;  
                    @endphp
                  @foreach ($patients as $patient)
                <tr>
                    <td>
                     @php
                      echo $count++;  
                    @endphp
                    </td>
                    <td>{{$patient->id}}</td>
                    <td><a href={{route('profile',[$patient->user])}}>{{$patient->name}}</a></td>
                    <td>{{$patient->age}}</td>
                    <td><i class="fa {{($patient->sex == 'male') ? 'fa-male': 'fa-female'}}"></i> {{$patient->sex}}</td>
                    <td class="hidden-phone">{{$patient->phoneNumber}}</td>
                    
                    <td>
                        <a data-toggle="modal" href="#updateModal{{$patient->id}}" class="btn btn-outline-primary btn-sm">Update</a>
                        @include('patients.update')
                        <button class="btn btn-outline-success btn-sm">Download</button>
                        <a href={{route('biodata',[$patient->user])}} class="btn btn-outline-secondary btn-sm">Details</a>
                        <button class="btn btn-outline-info btn-sm">Logs</button>
                        
                        <a class="btn btn-outline-danger btn-sm" href="#"
                               onclick="event.preventDefault();
                                             document.getElementById('deleteUser{{$patient->id}}').submit();">
                                {{ __('Delete') }}
                        </a>

                        <form id="deleteUser{{$patient->id}}" action="{{ route('delete',[$patient->user]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                    </td>
                 </tr>  
                  @endforeach
                  @else
                   <h3 class="ml-4 text-info"> No data available</h3>
                  @endif
                </tbody>
            </table>
        </div><!-- /content-panel -->
    </div> <!-- /col-md-12 -->
</div> <!-- /row -->
<div class="ml-1 mt-3">
 {{ $patients->links() }}
</div>
@endsection