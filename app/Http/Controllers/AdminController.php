<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;

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
        //
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

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id) {

        $user = User::findOrFail($id);

        $user->delete();
        return back()->with('success', 'User deleted successfully');
    }

    public function profileUpdate(Request $request , User $user){

        $request->validate([ //check if the user fill this required data
            'name'=>'required',
            'email'=>'required',
            'address'=>'required',
            'password'=>'required|min:8',
            'image'=>'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048' //the accepted file is image => jpeg... and max size: 2Mb
        ]);

        $input = $request->all(); //save all data from request in varibale input
        // dd($input);

        if($image = $request->file('image')){
            $profileImage= date('YmdHis').".".$image->getClientOriginalExtension(); //add the image upload date to its name to not duplicate the names
            $image->move('images/',$profileImage);
            $input['image'] = "$profileImage";
        }
        else{ //if the user dont want to update the image then will remaine the same image
            unset ($input['image']);
        }
        if ($user->update($input)) {
            return redirect()->route('setting')->with('add_success','Profile Edited');
        }else{
            return redirect()->route('setting')->with('add_failed','Edit Failed');
        }

    }


    public function togglePermission($userId) {

        $user = User::findOrFail($userId);
        $user->permission = !$user->permission; // Toggle the permission value
        $user->save();

        return redirect()->back();
    }
}
