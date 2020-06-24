@extends('layouts.app')

@section('content')
@auth
@status('admin|researcher|user')

 <form class="form-reg" method="POST" action="{{ route('reg-patient',['id' => $user->id]) }}" enctype="multipart/form-data">
  @csrf
  
    <h2 class="form-reg-heading font-weight-bold">{{ __('Register as Patient') }}</h2>
    <h5 class="p-2">Register for <span class="text-info">{{$user->name}}</span></h5>
     <h4 class="ml-3 mt-3 px-auto">Patient Info:</h4>
      <div class="reg-wrap">

        @if($errors->count())
        @foreach ($errors->all() as $error)
         <div class="alert alert-danger alert-dismissible fade show" role="alert">
          <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true">&times;</span>
            <span class="sr-only">Close</span>
          </button>
           <strong>{{ $error }}</strong>
        </div>
        @endforeach
      @endif
        
      <div class="form-group row">
        <label for="passport" class="col-sm-2 col-form-label text-md-right">{{ __('Patient\'s Passport:') }}</label>
         <div class="col-sm-2">
          <input type="file" class="custom-file-input form-control @error('passport') is-invalid @enderror" name="passport" id="passport" value="{{ old('passport') }}" >
          <label class="custom-file-label" for="passport">Choose Passport Image</label>
         </div>
        </div>

        @error('passport')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-group row">
        <label for="scan" class="col-sm-2 col-form-label text-md-right">{{ __('CT Scan/MRI:') }}</label>
         <div class="col-sm-2">
          <input type="file" class="custom-file-input form-control @error('scan') is-invalid @enderror" name="scan" id="scan" value="{{ old('scan') }}" >
          <label class="custom-file-label" for="scan">Choose Scan Image</label>
         </div>
        </div>

        @error('scan')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Full Name:') }}</label>
          <div class="col-sm-3">
           <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?: $user->name }}"  autocomplete="name">
          </div>
        </div>

        @error('name')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
        
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>
          <div class="col-sm-3">
           <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') ?: $user->email }}"  autocomplete="email">
          </div>
        </div>

        @error('email')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
        @enderror
        
        <div class="form-group row">
        <label for="phoneNumber" class="col-sm-2 col-form-label text-md-right">{{ __('Phone Number:') }}</label>
          <div class="col-sm-3">
            <input id="phoneNumber" type="tel" class="form-control @error('phoneNumber') is-invalid @enderror" name="phoneNumber" value="{{ old('phoneNumber') ?: $user->phoneNumber}}">
          </div>
        </div>

        @error('phoneNumber')
            <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
            </span>
        @enderror

      <div class="form-group row">
        <label for="age" class="col-sm-2 col-form-label text-md-right">{{ __('Age:') }}</label>
        <div class="col-sm-3">
          <input type="number" min="0" max="150" class="form-control @error('age') is-invalid @enderror" name="age" id="age" value="{{ old('age') }}"  placeholder="Age">
        </div>
      </div>

      @error('age')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Sex:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="male" value="male">
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="female" value="female">
              <label class="form-check-label" for="female">
                Female
              </label>
            </div>
          </div>
        </div>
      </fieldset>


       <h4 class="mt-3 ml-0 pt-4 px-auto border-top-gap">{{ __('Clinical Details:') }}</h4>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">Is it multiple Pregnancy?:</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="mul-preg" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="mul-preg" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">Was there illness during pregnancy?:</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="ill-preg" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="ill-preg" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="typ-ill" class="col-sm-2 col-form-label text-md-right">{{ __('If Yes what type of illness?:') }}</label>
        <div class="col-sm-3">
          <input type="text" class="form-control @error('typ-ill') is-invalid @enderror" name="typ-ill" id="typ-ill" value="{{ old('typ-ill') }}" placeholder="Enter type of illness">
        </div>
      </div>

      @error('typ-ill')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">Was medication needed during pregnancy?:</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-preg" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-preg" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="typ-med" class="col-sm-2 col-form-label text-md-right">{{ __('If Yes what type of medication?:') }}</label>
        <div class="col-sm-3">
          <input type="text" class="form-control @error('typ-med') is-invalid @enderror" name="typ-med" id="typ-med" value="{{ old('typ-med') }}" placeholder="Enter type of medication">
        </div>
      </div>
    
      @error('typ-med')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Was herbal mixture used during pregnancy?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="herb-mix" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="herb-mix" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="typ-herb" class="col-sm-2 col-form-label text-md-right">{{ __('If Yes what type of herbal mixture?:') }}</label>
        <div class="col-sm-3">
          <input type="text" class="form-control @error('typ-herb') is-invalid @enderror" name="typ-herb" id="typ-herb" value="{{ old('typ-herb') }}" placeholder="Enter type of herbal mixture">
        </div>
      </div>
    
      @error('typ-herb')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Was there exposure to radiation during pregnancy?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exp-rad" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exp-rad" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Was there bleeding during pregnancy?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="bleed" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="bleed" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Was there loss of water during pregnancy?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="loss-wat" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="loss-wat" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Were there anything that happened during pregnancy, labour and delivery?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="anything" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="anything" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="any-describe" class="col-sm-2 col-form-label text-md-right">{{ __('If Yes, briefly describe:') }}</label>
        <div class="col-sm-3">
          <textarea name="any-describe" id="any-describe" rows="5" class="form-control @error('any-describe') is-invalid @enderror" placeholder="Describe what happened during pregnancy here">{{ old('any-describe') }}</textarea>
        </div>
      </div>
    
      @error('any-describe')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Did the mother have any urinary tract infection during pregnancy?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="urinary" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="urinary" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Has he been admitted in the hospital for similar condition?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="admit" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="admit" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Is there history of neurological deformity in the family of the patient?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="neu-deform" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="neu-deform" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="dis-fam" class="col-sm-2 col-form-label text-md-right">{{ __('If Yes, how distant is the family member?:') }}</label>
        <div class="col-sm-3">
          <input type="text" class="form-control @error('dis-fam') is-invalid @enderror" name="dis-fam" id="dis-fam" value="{{ old('dis-fam') }}" placeholder="Enter type of herbal mixture">
        </div>
      </div>
    
      @error('dis-fam')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Side of deformity?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="side-deform" id="fore" value="fore-brain">
              <label class="form-check-label" for="fore">
                Fore-Brain
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="side-deform" id="middle" value="middle-brain">
              <label class="form-check-label" for="middle">
                Middle Brain
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="side-deform" id="hind" value="hind-brain">
              <label class="form-check-label" for="hind">
                Hind-Brain
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="age-ill" class="col-sm-2 col-form-label text-md-right">{{ __('At what age did the illness start in the patient?:') }}</label>
        <div class="col-sm-3">
          <input type="number" min="0" class="form-control @error('age-ill') is-invalid @enderror" name="age-ill" id="age-ill" value="{{ old('age-ill') }}" placeholder="Enter the age">
        </div>
      </div>
    
      @error('age-ill')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Was there any medication applied when the illness was first noticed?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-apply" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-apply" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="treat-meth" class="col-sm-2 col-form-label text-md-right">{{ __('If Yes, State the treatment method?:') }}</label>
        <div class="col-sm-3">
          <input type="text" class="form-control @error('treat-meth') is-invalid @enderror" name="treat-meth" id="treat-meth" value="{{ old('treat-meth') }}" placeholder="Enter Treatment Method">
        </div>
      </div>
    
      @error('treat-meth')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Is the patient thinking normal?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pat-think" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pat-think" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('How does the patient respond to questions asked?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="response" id="With" value="With Support">
              <label class="form-check-label" for="With">
                With Support
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="response" id="Without" value="Without Support">
              <label class="form-check-label" for="Without">
                Without Support
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="reaction" class="col-sm-2 col-form-label text-md-right">{{ __('How is the patient reaction in the environment?:') }}</label>
        <div class="col-sm-3">
          <input type="text" class="form-control @error('reaction') is-invalid @enderror" name="reaction" id="reaction" value="{{ old('reaction') }}" placeholder="Enter Patient Reaction">
        </div>
      </div>
    
      @error('reaction')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Any history of head trauma?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="trauma" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="trauma" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Any other associated deformity?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="assoc-deform" id="Yes" value="yes">
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="assoc-deform" id="No" value="no">
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="deform-describe" class="col-sm-2 col-form-label text-md-right">{{ __('If Yes, briefly describe:') }}</label>
        <div class="col-sm-3">
          <textarea name="deform-describe" id="deform-describe" rows="5" class="form-control @error('deform-describe') is-invalid @enderror" placeholder="Describe any other associated deformity here">{{ old('deform-describe') }}</textarea>
        </div>
      </div>

      @error('deform-describe')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror


      <h4 class="mt-3 ml-0 pt-4 px-auto border-top-gap">{{ __('Clinical Examination:') }}</h4>
      <div class="form-group row">
        <label for="cli-exam" class="col-sm-2 col-form-label text-md-right">{{ __('Doctor\'s Comment:') }}</label>
        <div class="col-sm-3">
          <textarea name="cli-exam" id="cli-exam" rows="5" class="form-control @error('cli-exam') is-invalid @enderror" placeholder="Comment...">{{ old('cli-exam') }}</textarea>
        </div>
      </div>
    
      @error('cli-exam')
          <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
          </span>
      @enderror

        <div class="form-group row">
         <div class="col-sm-10"> 
           <button type="submit" class="btn btn-sm btn-theme"><i class="fa fa-edit"></i>
               {{ __('Submit') }}
           </button>
          <a class="btn btn-sm btn-outline-danger" href="{{url()->previous()}}"><i class="fa fa-ban"></i>
               {{ __('Cancel') }}
           </a>
         </div>
        </div>

      </div>
 </form>
 @else 
 @include('layouts.unauthorise')
@endstatus
@endauth
@endsection

@push('styles')
<style>
.form-reg {
  /*max-width: 330px;*/
  width: 100%;
	margin: 50px auto 0;
	background: #fff;
	border-radius: 5px;
	-webkit-border-radius: 5px;
}

.form-reg h2.form-reg-heading {
	margin: 0;
	padding: 25px 20px;
	text-align: center;
	background: #57c79b;
  border-radius: 5px 5px 1px 0;
  border-bottom: 5px solid #f2f3f2;
	-webkit-border-radius: 5px 5px 0 0;
	color: #fff;
	font-size: 20px;
	text-transform: uppercase;
	font-weight: 300;
}
.reg-wrap {
	padding: 20px;
}
.reg-wrap .registration {
	text-align: center;
}

.border-top-gap {
  border-top: 3px solid #f2f3f2;
}
</style>
@endpush