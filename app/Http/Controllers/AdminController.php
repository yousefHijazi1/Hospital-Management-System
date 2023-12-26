<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
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
    public function store(Request $request)
    {
        //
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

        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }


    public function profileUpdate(Request $request) {

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
