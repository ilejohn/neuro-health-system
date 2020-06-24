<?php

namespace BrainApp\Http\Controllers;

use BrainApp\User;
use BrainApp\Patient;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class UserController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('status:admin|researcher')->only(['index','registerByProxy']);
        $this->middleware('status:admin')->only(['destroy']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $users = User::paginate(5);
        return view('users.index',compact('users'));
    }

    /**
     * Show the form for creating a new resource.
     * @param  \BrainApp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function register(User $user)
    {   
        
        return view('users.register',compact('user'));
    }

    public function registerByProxy()
    {
      $users = User::where('status','user')->get();

      return view('users.register-by-proxy',compact('users'));
    }


    /**
     * Display the specified resource.
     *
     * @param  \BrainApp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function profile(User $user)
    {
        return view('users.profile',[
          'user' => $user
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \BrainApp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function edit(User $user)
    {
        return view('users.edit', compact('user'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \BrainApp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, User $user)
    {

      $this->validate(request(),[
        'name' => 'bail|required|string|max:50',
        'email' => 'bail|required|email|max:50',
        'image' => 'bail|image|nullable|max:2000',
        'address' => 'bail|nullable|string|max:255',
        'city' => 'bail|nullable|string',
        'country' => 'bail|nullable|string',
        'phoneNumber' => 'bail|nullable|max:20'
      ]);

      if ($request->hasFile('image')){
        $image = $request->file('image');
        $filenameWithExt = $image->getClientOriginalName();
        $filename = pathinfo($filenameWithExt,PATHINFO_FILENAME);

        $extension = $image->getClientOriginalExtension();
        $filenameToStore = $filename.'_'.time().'.'.$extension;

        $path = $image->storeAs('public/images/',$filenameToStore);
      } else {
        $filenameToStore = $user->image;
      }

      $user->update([
        'name' => request('name'),
        'email' => request('email'),
        'image' => $filenameToStore,
        'address' => request('address'),
        'city' => request('city'),
        'country' => request('country'),
        'phoneNumber' => request('phoneNumber')
      ]);

      session()->flash('message','Your Profile has been Edited!');

      
      return view('users.profile',compact('user'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \BrainApp\User  $user
     * @return \Illuminate\Http\Response
     */
    public function destroy(User $user)
    {
      
      if ($user->image != 'default.png'){
         Storage::delete(asset('storage/images/'.$user->image));
      }
      
      if (isset($user->patient)) {
        
        if ($user->patient->scan != 'null.jpg'){
          Storage::delete(asset('storage/images/'.$user->patient->scan));
        }

        if ($user->patient->passport != 'null.jpg'){
          Storage::delete(asset('storage/images/'.$user->patient->passport));
        }

      }

      $user->update([
        'isDeleted' => 1
      ]);

      if (isset($user->patient)) {
        $user->patient->delete();
      }
      $user->delete();

      return redirect()->back()->with('message','Deleted!');
    }
}
