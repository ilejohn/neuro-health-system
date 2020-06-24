@extends('layouts.app')

@section('content')
<div class="row mt">
    <div class="col-md-12">
        <div class="content-panel">
            <table class="table table-striped table-advance table-hover">
                <h4><i class="fa fa-angle-right"></i> User Management Table</h4>
                <h6 class="ml-4">List of All registered Users</h6>
                    <hr>
                    <div class="ml-1 mr-2">
                      @include('layouts.message')
                    </div>
                <thead>
                <tr>
                    <th><i class="fa fa-sort-numeric-asc"></i> S/N</th>
                    <th><i class="fa fa-list"></i> Full Name</th>
                    <th class="hidden-phone"><i class="fa fa-envelope"></i> Email</th>
                    <th><i class="fa fa-mobile-phone"></i> Phone Number</th>
                    <th><i class="fa fa-user-circle-o"></i> User Role</th>
                    <th><i class="fa fa-tasks"></i> Change User Role</th>
                    <th><i class="fa fa-tasks"></i> Action</th>
                </tr>
                </thead>
                @if($users->count())
                <tbody>
                    @php
                      $count = 1;  
                    @endphp
                  @foreach ($users as $user)
                <tr>
                    <td>@php echo $count++;@endphp</td>
                    <td><strong><a href="/users/{{$user->id}}">{{$user->name}}</a></strong></td>
                    <td class="hidden-phone">{{$user->email}}</td>
                    <td>{{$user->phoneNumber}}</td>
                    <td><span class="label label-info label-mini">{{$user->status}}</span></td>
                    <td>
                        <form action="{{ route('changestatus',[$user]) }}" method="POST">
                         @csrf
                         @method('post')
                         <input {{($user->status == 'admin') ? 'disabled': ''}} class="btn btn-success btn-sm" type="submit" name="status" value="Admin">
                         <input {{($user->status == 'researcher') ? 'disabled': ''}} class="btn btn-primary btn-sm" type="submit" name="status" value="Researcher">
                         @if (isset($user->patient))
                            <input {{($user->status == 'patient') ? 'disabled': ''}} class="btn btn-secondary btn-sm" type="submit" name="status" value="Patient">
                         @else
                            <a href="/users/register" disabled="{{($user->status == 'patient') ? 'disabled': ''}}" style="{{($user->status == 'patient') ? 'pointer-events:none;': ''}}"  class="btn btn-secondary btn-sm">Patient</a>
                         @endif
                        
                        </form>
                        
                    </td>
                    <td>
                        @if ($user->status == 'researcher')
                        <a class="btn btn-outline-danger btn-sm" href="#"
                               onclick="event.preventDefault();
                                             document.getElementById('delete{{$user->id}}').submit();">
                                {{ __('Delete') }}
                        </a>

                        <form id="delete{{$user->id}}" action="{{ route('delete',[$user]) }}" method="POST" style="display: none;">
                            @csrf
                            @method('delete')
                        </form>
                        @endif
                    </td>
                </tr>  
                  @endforeach
                </tbody>
                @else
                 <h3 class="ml-3 text-info">No data available</h3>
                @endif
            </table>
           
        </div><!-- /content-panel -->
    </div><!-- /col-md-12 -->
</div><!-- /row -->
 <div class="ml-1 mt-3">
    {{ $users->links() }}
 </div>
@endsection
