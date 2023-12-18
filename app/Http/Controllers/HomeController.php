<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Doctor;
use App\Models\Blog;
use App\Models\Appointment;

class HomeController extends Controller
{

    public function index(){
        $doctors = Doctor::all();
        $blogs = Blog::all();
        return view('pages.index', compact('doctors','blogs'));
    }


    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->permission == 1){
                if(Auth::user()->userType== 'admin'){
                    return view('admin.index');
                }
                else{
                    $appointments = Appointment::all();
                    return view('doctor.index',compact('appointments'));
                }
            }
            else{
                Auth::logout();
                return redirect()->back()->withErrors(['permission' => 'You do not have permission to log in.']);
            }
        }
        else{
            return redirect()->back();
        }
    }
}
