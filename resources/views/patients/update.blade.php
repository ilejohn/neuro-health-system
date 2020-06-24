@status('admin')
<div aria-hidden="true" aria-labelledby="myModalLabel" role="dialog" tabindex="-1" id="updateModal{{$patient->id}}" class="modal fade">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close text-left ml-1" data-dismiss="modal" aria-hidden="true"><i class="fa fa-close"></i></button>
                <h1 class="modal-title mx-auto">{{ __('Patient Treatment Update') }}</h1>
            </div>
            <div class="modal-body">
              
              <div class="container">
      <form class="form-reg" method="POST" action="{{ route('update',['id' => $patient->user->id]) }}" enctype="multipart/form-data">
      @csrf
      @method('PUT')
      
      <h5 class="p-2">Update for <span class="text-info">{{$patient->name}}</span></h5>
      <h4 class="ml-3 mt-3 px-auto">Patient Info:</h4>
      <div class="reg-wrap">
        
      <div class="form-group row">
        <label for="passport" class="col-sm-2 col-form-label text-md-right">{{ __('Patient\'s Passport:') }}</label>
         <div class="col-sm-4">
          <input type="file" class="custom-file-input form-control" name="passport" id="passport" value="{{ old('passport') ?: $patient->name }}" >
          <label class="custom-file-label" for="passport">Choose Passport Image</label>
         </div>
      </div>

        

        <div class="form-group row">
        <label for="scan" class="col-sm-2 col-form-label text-md-right">{{ __('CT Scan/MRI:') }}</label>
         <div class="col-sm-4">
          <input type="file" class="custom-file-input form-control" name="scan" id="scan" value="{{ old('scan') ?: $patient->scan }}" >
          <label class="custom-file-label" for="scan">Choose Scan Image</label>
         </div>
        </div>


        <div class="form-group row">
          <label for="name" class="col-sm-2 col-form-label text-md-right">{{ __('Full Name:') }}</label>
          <div class="col-sm-5">
           <input id="name" type="text" class="form-control" name="name" value="{{ old('name') ?: $patient->name }}"  autocomplete="name" required>
          </div>
        </div>
        
        <div class="form-group row">
          <label for="email" class="col-sm-2 col-form-label text-md-right">{{ __('E-Mail Address:') }}</label>
          <div class="col-sm-5">
           <input id="email" type="email" class="form-control" name="email" value="{{ old('email') ?: $patient->email }}"  autocomplete="email" required>
          </div>
        </div>

        
        <div class="form-group row">
        <label for="phoneNumber" class="col-sm-2 col-form-label text-md-right">{{ __('Phone Number:') }}</label>
          <div class="col-sm-5">
            <input id="phoneNumber" type="tel" class="form-control" name="phoneNumber" value="{{ old('phoneNumber') ?: $patient->phoneNumber}}">
          </div>
        </div>


      <div class="form-group row">
        <label for="age" class="col-sm-2 col-form-label text-md-right">{{ __('Age:') }}</label>
        <div class="col-sm-4">
          <input type="number" min="0" max="150" class="form-control" name="age" id="age" value="{{ old('age') ?: $patient->age}}"  placeholder="Age" required>
        </div>
      </div>


      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-2 pt-0 text-md-right">{{ __('Sex:') }}</legend>
          <div class="col-sm-2">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="male" value="male" {{ $patient->sex == 'male' ? 'checked' : ''}} required>
              <label class="form-check-label" for="male">
                Male
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="sex" id="female" value="female" {{ $patient->sex == 'female' ? 'checked' : ''}}>
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
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">Is it multiple Pregnancy?:</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="mul-preg" id="Yes" value="yes" {{ $patient['mul-preg'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="mul-preg" id="No" value="no" {{ $patient['mul-preg'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">Was there illness during pregnancy?:</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="ill-preg" id="Yes" value="yes" {{ $patient['ill-preg'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="ill-preg" id="No" value="no" {{ $patient['ill-preg'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="typ-ill" class="col-sm-3 col-form-label text-md-right">{{ __('If Yes what type of illness?:') }}</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="typ-ill" id="typ-ill" value="{{ old('typ-ill') ?: $patient['typ-ill']}}" placeholder="Enter type of illness">
        </div>
      </div>


      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">Was medication needed during pregnancy?:</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-preg" id="Yes" value="yes" {{ $patient['med-preg'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-preg" id="No" value="no" {{ $patient['med-preg'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="typ-med" class="col-sm-3 col-form-label text-md-right">{{ __('If Yes what type of medication?:') }}</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="typ-med" id="typ-med" value="{{ old('typ-med') ?: $patient['typ-med']}}" placeholder="Enter type of medication">
        </div>
      </div>
    

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Was herbal mixture used during pregnancy?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="herb-mix" id="Yes" value="yes" {{ $patient['herb-mix'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="herb-mix" id="No" value="no" {{ $patient['herb-mix'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="typ-herb" class="col-sm-3 col-form-label text-md-right">{{ __('If Yes what type of herbal mixture?:') }}</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="typ-herb" id="typ-herb" value="{{ old('typ-herb') ?: $patient['typ-herb']}}" placeholder="Enter type of herbal mixture">
        </div>
      </div>
    

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Was there exposure to radiation during pregnancy?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exp-rad" id="Yes" value="yes" {{ $patient['exp-rad'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="exp-rad" id="No" value="no" {{ $patient['exp-rad'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Was there bleeding during pregnancy?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="bleed" id="Yes" value="yes" {{ $patient->bleed == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="bleed" id="No" value="no" {{ $patient->bleed == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Was there loss of water during pregnancy?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="loss-wat" id="Yes" value="yes" {{ $patient['loss-wat'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="loss-wat" id="No" value="no" {{ $patient['loss-wat'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Were there anything that happened during pregnancy, labour and delivery?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="anything" id="Yes" value="yes" {{ $patient['anything'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="anything" id="No" value="no" {{ $patient['anything'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="any-describe" class="col-sm-3 col-form-label text-md-right">{{ __('If Yes, briefly describe:') }}</label>
        <div class="col-sm-4">
          <textarea name="any-describe" id="any-describe" rows="5" class="form-control" placeholder="Describe what happened during pregnancy here">{{ old('any-describe') ?: $patient['any-describe']}}</textarea>
        </div>
      </div>
    

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Did the mother have any urinary tract infection during pregnancy?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="urinary" id="Yes" value="yes" {{ $patient['urinary'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="urinary" id="No" value="no" {{ $patient['urinary'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Has he been admitted in the hospital for similar condition?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="admit" id="Yes" value="yes" {{ $patient['admit'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="admit" id="No" value="no" {{ $patient['admit'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Is there history of neurological deformity in the family of the patient?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="neu-deform" id="Yes" value="yes" {{ $patient['neu-deform'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="neu-deform" id="No" value="no" {{ $patient['neu-deform'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="dis-fam" class="col-sm-3 col-form-label text-md-right">{{ __('If Yes, how distant is the family member?:') }}</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="dis-fam" id="dis-fam" value="{{ old('dis-fam') ?: $patient['dis-fam']}}" placeholder="Enter type of herbal mixture">
        </div>
      </div>
    

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Side of deformity?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="side-deform" id="fore" value="fore-brain" {{ $patient['side-deform'] == 'fore-brain' ? 'checked' : ''}}>
              <label class="form-check-label" for="fore">
                Fore-Brain
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="side-deform" id="middle" value="middle-brain" {{ $patient['side-deform'] == 'middle-brain' ? 'checked' : ''}}>
              <label class="form-check-label" for="middle">
                Middle Brain
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="side-deform" id="hind" value="hind-brain" {{ $patient['side-deform'] == 'hind-brain' ? 'checked' : ''}}>
              <label class="form-check-label" for="hind">
                Hind-Brain
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="age-ill" class="col-sm-3 col-form-label text-md-right">{{ __('At what age did the illness start in the patient?:') }}</label>
        <div class="col-sm-4">
          <input type="number" min="0" class="form-control" name="age-ill" id="age-ill" value="{{ old('age-ill') ?: $patient['age-ill']}}" placeholder="Enter the age" required>
        </div>
      </div>
    

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Was there any medication applied when the illness was first noticed?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-apply" id="Yes" value="yes" {{ $patient['med-apply'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="med-apply" id="No" value="no" {{ $patient['med-apply'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="treat-meth" class="col-sm-3 col-form-label text-md-right">{{ __('If Yes, State the treatment method?:') }}</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="treat-meth" id="treat-meth" value="{{ old('treat-meth') ?: $patient['treat-meth']}}" placeholder="Enter Treatment Method">
        </div>
      </div>


      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Is the patient thinking normal?:') }}</legend>
          <div class="col-sm-4">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pat-think" id="Yes" value="yes" {{ $patient['pat-think'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="pat-think" id="No" value="no" {{ $patient['pat-think'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('How does the patient respond to questions asked?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="response" id="With" value="With Support" {{ $patient['response'] == 'With Support' ? 'checked' : ''}}>
              <label class="form-check-label" for="With">
                With Support
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="response" id="Without" value="Without Support" {{ $patient['response'] == 'Without Support' ? 'checked' : ''}}>
              <label class="form-check-label" for="Without">
                Without Support
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="reaction" class="col-sm-3 col-form-label text-md-right">{{ __('How is the patient reaction in the environment?:') }}</label>
        <div class="col-sm-4">
          <input type="text" class="form-control" name="reaction" id="reaction" value="{{ old('reaction') ?: $patient['reaction']}}" placeholder="Enter Patient Reaction">
        </div>
      </div>


      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Any history of head trauma?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="trauma" id="Yes" value="yes" {{ $patient['trauma'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="trauma" id="No" value="no" {{ $patient['trauma'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <fieldset class="form-group">
        <div class="row">
          <legend class="col-form-label col-sm-3 pt-0 text-md-right">{{ __('Any other associated deformity?:') }}</legend>
          <div class="col-sm-3">
            <div class="form-check">
              <input class="form-check-input" type="radio" name="assoc-deform" id="Yes" value="yes" {{ $patient['assoc-deform'] == 'yes' ? 'checked' : ''}} required>
              <label class="form-check-label" for="Yes">
                Yes
              </label>
            </div>
            <div class="form-check">
              <input class="form-check-input" type="radio" name="assoc-deform" id="No" value="no" {{ $patient['assoc-deform'] == 'no' ? 'checked' : ''}}>
              <label class="form-check-label" for="No">
                No
              </label>
            </div>
          </div>
        </div>
      </fieldset>

      <div class="form-group row">
        <label for="deform-describe" class="col-sm-3 col-form-label text-md-right">{{ __('If Yes, briefly describe:') }}</label>
        <div class="col-sm-4">
          <textarea name="deform-describe" id="deform-describe" rows="5" class="form-control" placeholder="Describe any other associated deformity here">{{ old('deform-describe') ?: $patient['deform-describe']}}</textarea>
        </div>
      </div>


      <h4 class="mt-3 ml-0 pt-4 px-auto border-top-gap">{{ __('Clinical Examination:') }}</h4>
      <div class="form-group row">
        <label for="cli-exam" class="col-sm-2 col-form-label text-md-right">{{ __('Doctor\'s Comment:') }}</label>
        <div class="col-sm-5">
          <textarea name="cli-exam" id="cli-exam" rows="5" class="form-control" placeholder="Comment..." required>{{ old('cli-exam') ?: $patient['cli-exam']}}</textarea>
        </div>
      </div>

        <div class="form-group row">
         <div class="col-sm-10"> 
           <button type="submit" class="btn btn-sm btn-theme"><i class="fa fa-edit"></i>
               {{ __('Update') }}
           </button>
           <button data-dismiss="modal" class="btn btn-sm btn-outline-secondary" type="button">
             <i class="fa fa-ban"></i>
               {{ __('Cancel') }}
            </button>
         </div>
        </div>

      </div>
      </form>   
                </div>
            </div>

        </div>
    </div>
</div>
@endstatus