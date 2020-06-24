@extends('layouts.app')
@section('content')
<div class="background">
 <div class="container">
    <h3>Patient ID: {{$patient->id}}</h3>
    <h6>Last updated: {{$patient->updated_at}}</h6>   
    <br>
    
    <h4>Clinical Bio-data</h4>

    <div class="border-top-gap">
        <div class="row mt-3">
            <div class="col-9">
                <p><strong>Full Name:</strong> {{$patient->name}}</p>
                <p><strong>Email:</strong> {{$patient->email}}</p>
                <p><strong>Age:</strong> {{$patient->age}}</p>
                <p><strong>Sex:</strong> {{$patient->sex}}</p>
            </div>
            <div class="col-3">
                <p><strong>Passport:</strong> <img src="{{ asset('storage/images/'.$patient->passport) }}" class="img-fluid w-50 h-50"></p>
                <p><strong>CT Scan/MRI:</strong> <img src="{{ asset('storage/images/'.$patient->scan) }}" class="img-fluid w-50 h-50"></p>
            </div>
        </div>
        
        
    </div>

    <br>

    <h4>Clinical Details</h4>
    <div class="border-top-gap">
        <div class="row mt-3">
            <div class="col-3">
                <p><strong>Is it Multiple Pregnancy:</strong> {{$patient['mul-preg']}}</p>
                <p><strong>Was there illness during pregnancy?:</strong> {{$patient['ill-preg']}}</p>
                <p><strong>If Yes what type of illness?:</strong> {{$patient['typ-ill']}}</p>
                <p><strong>Was medication needed during pregnancy?:</strong> {{$patient['med-preg']}}</p>
                <p><strong>If Yes what type of medication?:</strong> {{$patient['typ-med']}}</p>
                <p><strong>Was herbal mixture used during pregnancy?:</strong> {{$patient['herb-mix']}}</p>
                <p><strong>If Yes what type of herbal mixture?:</strong> {{$patient['typ-herb']}}</p>
                <p><strong>Was there exposure to radiation during pregnancy:</strong> {{$patient['exp-rad']}}</p>
                <p><strong>Was there bleeding during pregnancy?:</strong> {{$patient['bleed']}}</p>
            </div>
            <div class="col-3"> 
                <p><strong>Was there loss of water during pregnancy?:</strong> {{$patient['loss-wat']}}</p>
                <p><strong>Were there anything that happened during pregnancy, labour and delivery?:</strong> {{$patient['anything']}}</p>
                <p><strong>If Yes, briefly describe:</strong> {{$patient['any-describe']}}</p>
                <p><strong>Did the mother have any urinary tract infection during pregnancy?:</strong> {{$patient['urinary']}}</p>
                <p><strong>Has he been admitted in the hospital for similar condition?:</strong> {{$patient['admit']}}</p>
                <p><strong>Is there history of neurological deformity in the family of the patient?:</strong> {{$patient['neu-deform']}}</p>
                <p><strong>If Yes, how distant is the family member?:</strong> {{$patient['dis-fam']}}</p>
                <p><strong>Side of deformity?:</strong> {{$patient['side-deform']}}</p>
                <p><strong>At what age did the illness start in the patient?:</strong> {{$patient['age-ill']}}</p> 
            </div>
            <div class="col-3">
                <p><strong>Was there any medication applied when the illness was first noticed?:</strong> {{$patient['med-apply']}}</p>
                <p><strong>If Yes, State the treatment method?:</strong> {{$patient['treat-meth']}}</p>
                <p><strong>Is the patient thinking normal?:</strong> {{$patient['pat-think']}}</p>
                <p><strong>How does the patient respond to questions asked?:</strong> {{$patient['response']}}</p>
                <p><strong>How is the patient reaction in the environment?:</strong> {{$patient['reaction']}}</p>
                <p><strong>Any history of head trauma?:</strong> {{$patient['trauma']}}</p>
                <p><strong>Any other associated deformity?:</strong> {{$patient['assoc-deform']}}</p>
                <p><strong>If Yes, briefly describe:</strong> {{$patient['deform-describe']}}</p>
            </div>
        </div>
    </div>

    <h4>Clinical Examination</h4>
    <div class="border-top-gap">
        <p><strong>Comment:</strong> {{$patient['cli-exam']}}</p>
    </div>

 </div>    
</div>

@endsection
@push('styles')
<style>
.background {
  /*max-width: 330px;*/
  width: 100%;
	margin: 50px auto 0;
	background: #fff;
	border-radius: 5px;
	-webkit-border-radius: 5px;
}

.border-top-gap {
  border-top: 3px solid #f2f3f2;
}
</style>
@endpush