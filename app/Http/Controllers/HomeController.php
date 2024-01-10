<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Models\Doctor;
use App\Models\Blog;
use App\Models\Appointment;
use App\Models\AppointmentHistory;
use App\Models\User;

class HomeController extends Controller
{

    public function index(){
        $doctors = User::whereNotIn('role', ['admin'])->get();
        $blogs = Blog::all();

        return view('pages.index', compact('doctors','blogs'));
    }

    public function getDoctorTimeslots($userId) {
        $doctor = Doctor::where('user_id', $userId)->first();

        if ($doctor) {
            $timeslots = [
                [
                    'start_time' => $doctor->start_time,
                    'end_time' => $doctor->end_time,
                ]
            ];
        } else {
            $timeslots = [];
        }

        return response()->json($timeslots);
}

    public function redirect(){
        if(Auth::id()){
            if(Auth::user()->permission == 1){
                if(Auth::user()->userType== 'admin'){
                    $users = User::where('userType', '!=', 'admin')->get();

                    $appointments = AppointmentHistory::all();
                    $totalPrice = $appointments->sum('price'); // Calculate the total price using Laravel's sum() function

                    $appointmentCount = AppointmentHistory::count();

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
