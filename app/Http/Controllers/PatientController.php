<?php

namespace BrainApp\Http\Controllers;

use BrainApp\User;
use BrainApp\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Storage;

class PatientController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status:admin|researcher|patient')->except(['store']);
        $this->middleware('status:admin|researcher')->only(['index','admin']);
        $this->middleware('status:admin')->only(['changeStatus']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $patients = Patient::paginate(5);
        return view('patients.index',compact('patients'));
    }


    public function admin()
    {   
        $patients = Patient::all();
        $users = User::all();
        return view('patients.admin',compact('patients','users'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request,User $user)
    {
        if (auth()->user()->hasStatus('patient'))
        {

            return redirect()->back()
            ->with('message','You are Registered Already!');
        }
        
        $this->validate(request(),[
          'name' => 'bail|string|max:255|required',
          'email' => 'bail|string|email|max:255|unique:patients|required',
          'phoneNumber' => 'bail|nullable|max:20',
          'passport' => 'image|nullable|max:1999',
          'scan' => 'image|nullable|max:1999',
          'age' => 'bail|integer|min:0|max:150',
          'sex' => 'bail|in:male,female',
          'mul-preg' => 'in:yes,no',
          'ill-preg' => 'in:yes,no',
          'typ-ill' => 'nullable|string|max:255',
          'med-preg' => 'in:yes,no',
          'typ-med' => 'nullable|string|max:255',
          'herb-mix' => 'in:yes,no',
          'typ-herb' => 'nullable|string|max:255',
          'exp-rad' => 'in:yes,no',
          'bleed' => 'in:yes,no',
          'loss-wat' => 'in:yes,no',
          'anything' => 'in:yes,no',
          'any-describe' => 'nullable|string',
          'urinary' => 'in:yes,no',
          'admit' => 'in:yes,no',
          'neu-deform' => 'in:yes,no',
          'dis-fam' => 'nullable|string|max:255',
          'side-deform' => 'nullable|in:fore-brain,middle-brain,hind-brain',
          'age-ill' => 'integer|min:0|max:150',
          'med-apply' => 'in:yes,no',
          'treat-meth' => 'nullable|string|max:255',
          'pat-think' => 'in:yes,no',
          'response' => 'nullable|in:With Support,Without Support',
          'reaction' => 'nullable|string|max:255',
          'trauma' => 'in:yes,no',
          'assoc-deform' => 'in:yes,no',
          'deform-describe' => 'nullable|string|max:255',
          'cli-exam' => 'string'
        ]);

        if ($request->hasFile('passport')){
        $passport = $request->file('passport');
        $filenameWithExt = $passport->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $passport->getClientOriginalExtension();
        $passportToStore = $filename.'_'.time().'.'.$extension;

        $path = $passport->storeAs('public/images/',$passportToStore);
      } else {
        $passportToStore = 'null.jpg';
      }

        if ($request->hasFile('scan')){
        $scan = $request->file('scan');
        $filenameWithExt = $scan->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $scan->getClientOriginalExtension();
        $scanToStore = $filename.'_'.time().'.'.$extension;

        $path = $scan->storeAs('public/images/',$scanToStore);
      } else {
        $scanToStore = 'null.jpg';
      }
     
        $patient = new Patient;
        
        $user->register(
        $patient->fill([
          'name' => request('name'),
          'email' => request('email'),
          'phoneNumber' => request('phoneNumber'),
          'passport' => $passportToStore,
          'scan' => $scanToStore,
          'age' => request('age'),
          'sex' => request('sex'),
          'mul-preg' => request('mul-preg'),
          'ill-preg' => request('ill-preg'),
          'typ-ill' => request('typ-ill'),
          'med-preg' => request('med-preg'),
          'typ-med' => request('typ-med'),
          'herb-mix' => request('herb-mix'),
          'typ-herb' => request('typ-herb'),
          'exp-rad' => request('exp-rad'),
          'bleed' => request('bleed'),
          'loss-wat' => request('loss-wat'),
          'anything' => request('anything'),
          'any-describe' => request('any-describe'),
          'urinary' => request('urinary'),
          'admit' => request('admit'),
          'neu-deform' => request('neu-deform'),
          'dis-fam' => request('dis-fam'),
          'side-deform' => request('side-deform'),
          'age-ill' => request('age-ill'),
          'med-apply' => request('med-apply'),
          'treat-meth' => request('treat-meth'),
          'pat-think' => request('pat-think'),
          'response' => request('response'),
          'reaction' => request('reaction'),
          'trauma' => request('trauma'),
          'assoc-deform' => request('assoc-deform'),
          'deform-describe' => request('deform-describe'),
          'cli-exam' => request('cli-exam')
          ])
        );

        $user->update([
             'status' => 'patient'
           ]);

        return redirect()->route('profile',[$user])
        ->with('message','Patient Succesfully Registered!');
            
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request,User $user)
    {
      
       if (! auth()->user()->hasStatus('admin|researcher'))
        {
            return redirect()->back()
            ->withErrors('You are not Authorised!');
        }
        
        $this->validate(request(),[
          'name' => 'bail|string|max:255|required',
          'email' => 'bail|string|email|max:255|required',
          'phoneNumber' => 'bail|nullable|max:20',
          'passport' => 'image|nullable|max:1999',
          'scan' => 'image|nullable|max:1999',
          'age' => 'bail|integer|min:0|max:150|required',
          'sex' => 'bail|in:male,female|required',
          'mul-preg' => 'required|in:yes,no',
          'ill-preg' => 'required|in:yes,no',
          'typ-ill' => 'nullable|string|max:255',
          'med-preg' => 'required|in:yes,no',
          'typ-med' => 'nullable|string|max:255',
          'herb-mix' => 'required|in:yes,no',
          'typ-herb' => 'nullable|string|max:255',
          'exp-rad' => 'required|in:yes,no',
          'bleed' => 'required|in:yes,no',
          'loss-wat' => 'required|in:yes,no',
          'anything' => 'required|in:yes,no',
          'any-describe' => 'nullable|string',
          'urinary' => 'required|in:yes,no',
          'admit' => 'required|in:yes,no',
          'neu-deform' => 'required|in:yes,no',
          'dis-fam' => 'nullable|string|max:255',
          'side-deform' => 'nullable|in:fore-brain,middle-brain,hind-brain',
          'age-ill' => 'required|integer|min:0|max:150',
          'med-apply' => 'required|in:yes,no',
          'treat-meth' => 'nullable|string|max:255',
          'pat-think' => 'required|in:yes,no',
          'response' => 'nullable|in:With Support,Without Support',
          'reaction' => 'nullable|string|max:255',
          'trauma' => 'required|in:yes,no',
          'assoc-deform' => 'required|in:yes,no',
          'deform-describe' => 'nullable|string|max:255',
          'cli-exam' => 'required|string'
        ]);

        if ($request->hasFile('passport')){
        $passport = $request->file('passport');
        $filenameWithExt = $passport->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $passport->getClientOriginalExtension();
        $passportToStore = $filename.'_'.time().'.'.$extension;

        $path = $passport->storeAs('public/images/',$passportToStore);
        Storage::delete(asset('storage/images/'.$user->patient->passport));
        
      } else {
        $passportToStore = $user->patient->passport;
      }

        if ($request->hasFile('scan')){
        $scan = $request->file('scan');
        $filenameWithExt = $scan->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $scan->getClientOriginalExtension();
        $scanToStore = $filename.'_'.time().'.'.$extension;

        $path = $scan->storeAs('public/images/',$scanToStore);
        Storage::delete(asset('storage/images/'.$user->patient->scan));
      } else {
        $scanToStore = $user->patient->scan;
      }
     
        
        $user->patient->update([
          'name' => request('name'),
          'email' => request('email'),
          'phoneNumber' => request('phoneNumber'),
          'passport' => $passportToStore,
          'scan' => $scanToStore,
          'age' => request('age'),
          'sex' => request('sex'),
          'mul-preg' => request('mul-preg'),
          'ill-preg' => request('ill-preg'),
          'typ-ill' => request('typ-ill'),
          'med-preg' => request('med-preg'),
          'typ-med' => request('typ-med'),
          'herb-mix' => request('herb-mix'),
          'typ-herb' => request('typ-herb'),
          'exp-rad' => request('exp-rad'),
          'bleed' => request('bleed'),
          'loss-wat' => request('loss-wat'),
          'anything' => request('anything'),
          'any-describe' => request('any-describe'),
          'urinary' => request('urinary'),
          'admit' => request('admit'),
          'neu-deform' => request('neu-deform'),
          'dis-fam' => request('dis-fam'),
          'side-deform' => request('side-deform'),
          'age-ill' => request('age-ill'),
          'med-apply' => request('med-apply'),
          'treat-meth' => request('treat-meth'),
          'pat-think' => request('pat-think'),
          'response' => request('response'),
          'reaction' => request('reaction'),
          'trauma' => request('trauma'),
          'assoc-deform' => request('assoc-deform'),
          'deform-describe' => request('deform-describe'),
          'cli-exam' => request('cli-exam')
        ]);

        return redirect()->route('patients')
        ->with('message','Patient Details Edited!');      
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(User $user)
    {
        $patient = $user->patient;
        return view('patients.show',compact('patient'));
    }

    

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function prescription()
    {
        return view ('patients.prescription');
    }


    protected $status_options = ['admin','researcher','patient'];
    

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function changeStatus(Request $request, User $user)
    {   
        
        $status = strtolower($request->status);
        
        if (! collect($this->status_options)->contains($status)){

            return redirect()->back()
            ->withErrors('Action Denied!');

        }

        $user->update([
           'status' => $status
         ]);

        return redirect()->back()->with('message','User Role Changed');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }

    public function biodata(User $user)
    {
      $patient = $user->patient;
      return view('patients.bio',compact('patient'));

    }
}
