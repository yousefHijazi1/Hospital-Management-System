<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Contact;
use App\Models\Doctor;
use App\Models\Blog;
use Auth;
use Illuminate\Support\Facades\Hash;
class AdminController extends Controller
{

    public function create() //create users
    {
        return view('admin.create');
    }


    public function userStore(Request $request) {
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

    public function create_news(){
        return view('admin.create_news');
    }

    public function newsStore(Request $request){
        $input = $request->validate([
            'title' =>'required',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);


        if($image = $request->file('image')){
            $profileImage= date('YmdHis').".".$image->getClientOriginalExtension(); //add the image upload date to its name to not duplicate the names
            $image->move('images/',$profileImage);
            $input['image'] = "$profileImage";
        }

        if(Blog::create($input)){
            return redirect()->back()->with('success','News Created');
        }else{
            return redirect()->back()->with('failed','Creation Failed');
        }


    }


    public function news() {
        $news = Blog::all();
        return view('admin.news',compact('news'));
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

    public function news_destroy(string $id) {

        $blog = Blog::findOrFail($id);

        if ($blog->delete()) { //delete blog from blog table
            return back()->with('success', 'Blog deleted successfully');
        }
        else{
            return back()->with('failed', 'Blog delete failed');
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
