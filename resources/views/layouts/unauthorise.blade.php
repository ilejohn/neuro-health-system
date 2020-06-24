<div id="centered">
   <h1 class="text-center">
    Unauthorised Access!
   </h1>
    <div class="float-left">
        <a href="{{ URL::previous() }}">Go Back <i class="fa fa-angle-left" aria-hidden="true"></i></a>
    </div>

    <div class="float-right">
        <a href="{{ route('home') }}">Go Home <i class="fa fa-home" aria-hidden="true"></i></a>.
    </div>
</div>

@push('styles')
<style>
#centered {
  position: fixed; /* or absolute */
  top: 40%;
  left: 45%;
}
</style>
@endpush