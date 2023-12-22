<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Doctor;
use App\Models\Blog;
use App\Models\Appointment;
use App\Models\User;

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
                    $users = User::where('userType', '!=', 'admin')->get();

                    $appointments = Appointment::all();
                    $totalPrice = $appointments->sum('price'); // Calculate the total price using Laravel's sum() function

                    $appointmentCount = Appointment::count();

                    return view('admin.index',compact('appointmentCount','totalPrice','users'));
                }
                else{
                    $user = Auth::user();
                    $appointments = Appointment::where('department', $user->role)->get(); // Retrieve the appointments where department matches the user's role
                    // $appointments = Appointment::all();
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
