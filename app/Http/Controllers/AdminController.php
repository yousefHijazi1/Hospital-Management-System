<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Doctor;
use Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function userCreate(Request $request)
    {
        // Validate the form data
        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email|unique:users',
            'password' => 'required|min:8',
            'phone' => 'required',
            'address'=> 'required',
            'start_time' => 'required',
            'end_time' => 'required',
            'role' => 'required|not_in:admin',
            'image' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        if($image = $request->file('image')){
            $profileImage= date('YmdHis').".".$image->getClientOriginalExtension(); //add the image upload date to its name to not duplicate the names
            $image->move('images/',$profileImage);
            $input['image'] = "$profileImage";
        }

        $input['password'] = Hash::make($input['password']);

        $user = User::create($input);

        if(!$user){
            return back()->withErrors('User creation failed.')->withInput();
        }


        $doctor = Doctor::create([
            'user_id' => $user->id,
            'start_time' => $input['start_time'],
            'end_time' => $input['end_time'],
        ]);

        if (!$doctor) {
            //delete user form users table if not added in doctors table
            $user->delete();
            return back()->withErrors('Doctor creation failed.')->withInput();
        }

        return redirect()->back()->with('success', 'Doctor created successfully.');


    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    public function messages() {
        $messages = Contact::all();
        return view('admin.messages',compact('messages'));
    }

    // Delete user from users table
    public function destroy(string $id) {

        $user = User::findOrFail($id);

        // Delete the associated doctor record if it exists
        if ($user->doctor) {

            $user->doctor->delete(); //delete user from doctors table
            $user->delete(); //delete user from users table
            return back()->with('success', 'User deleted successfully');
        }
        else{
            return back()->with('failed', 'User delete failed');
        }


    }


    public function profileUpdate(Request $request) { //admin settings

        $validatedData = $request->validate([ //check if the user fill this required data
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'password'=>'required|min:8',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' //the accepted file is image => jpeg... and max size: 2Mb
        ]);

        $input = $request->except('password'); //save all data from request in varibale input except password
        // dd($input);

        if($image = $request->file('image')){
            $profileImage= date('YmdHis').".".$image->getClientOriginalExtension(); //add the image upload date to its name to not duplicate the names
            $image->move('images/',$profileImage);
            $input['image'] = "$profileImage";
        }
        else{ //if the user dont want to update the image then will remaine the same image
            unset ($input['image']);
        }

        $user = Auth::user();

        if(Hash::check($validatedData['password'], $user->password)) {
            if (Auth::user()->update($input)) {
                return back()->with('success','Profile Edited');
            }else{
                return back()->with('failed','Edit Failed');
            }
        }else{
            return back()->with('failed','Icorrect Password');
        }

    }


    public function togglePermission($userId) {

        $user = User::findOrFail($userId);
        $user->permission = !$user->permission; // Toggle the permission value
        $user->save();

        return redirect()->back();
    }

    public function changePassword(Request $request){
        $input = $request->validate([
            'old_password'=>'required|min:8',
            'password'=>'required:min:8'
        ]);

        $user = Auth::user();

        $old_password = $input['old_password'];
        $new_password = $input['password'];

        if(Hash::check($old_password, $user->password)){
            $user->password = Hash::make($new_password);
            $user->save();

            return redirect()->back()->with('success','Password Changed');
        }
        else{
            return redirect()->back()->with('failed','Somethig wrong');
        }

    }
}
