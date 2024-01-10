<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Appointment;
use Illuminate\Support\Facades\Redirect;
use App\Models\User;
class AppointmentsController extends Controller
{
    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request){

        $input = $request->validate([
            'name' => 'required',
            'email' => 'required|email',
            'birthDate' => 'required|date',
            'department' => 'required',
            'phone' => ['required', 'numeric'],
            'appointment-time'=>'required',
            'message' => 'nullable|string'
        ]);
            $user_id = $request->input('department'); // department input value = user_id

            $user = User::find($user_id);

            $department = $user->role; // Get the department from the user's role

            $input['department'] = $department;

            $price;

            switch($department){
                case 'general health':
                    $price = 20;
                    break;

                case 'cardiology':
                    $price = 50;
                    break;

                case 'dental':
                    $price = 30;
                    break;

                case 'neurology':
                    $price = 25;
                    break;

                case 'orthopaedics':
                    $price = 40;
                    break;

                default:
                // Handle an invalid department value or provide a default price
                $price = 0;
                break;
            }

            $input['price'] = $price; // Assign the price to the input array

            $appointmentTime = $request->input('appointment-time');
            $appointmentDepartment = $request->input('department');
             // Query the appointments table to check if the appointment exists
            $existingAppointment = Appointment::where('appointment-time', $appointmentTime)
            ->where('department', '=', $appointmentDepartment)
            ->first();

            // Check if the appointment exists
            if ($existingAppointment) {
                return redirect()->route('index')->with('add_conflict','This appointment is booked');

            }elseif (Appointment::create($input)){
                return redirect()->route('index')->with('add_success','The appointment made');
            }
            else{
                return redirect()->route('index')->with('add_failed','Failed !');
            }
        }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $appointment = Appointment::findOrFail($id);
        $appointment->delete();

        return Redirect::route('home')->with('appointment_done', 'Appointment Expired');
    }
}
