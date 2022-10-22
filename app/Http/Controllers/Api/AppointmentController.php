<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    /**
     * Make an appointment
     * @param request
     * @return appointment
     */
    public function makeAppointment(Request $request){
        $appointment = new Appointment();
        $appointment->user_id = $request->user_id;
        $appointment->clinic_id = $request->clinic_id;
        $appointment->appointmentDateTime = $request->appointmentDateTime;
        $appointment->numberOfPackingHour = $request->numberOfPackingHour;
        $appointment->save();
        $response = [
            'success' => true,
            'data' => $appointment,
            'message' => 'clinic created successfully'
        ];
        return Response()->json($response, 200);
    }
    /**
     * List all appointments
     * @return appointments
     */
    public function index(){
        $appointments = DB::table('appointments')
        ->join('users', 'users.id', '=', 'appointments.user_id')
        ->join('clinices', 'clinices.id', '=', 'appointments.clinic_id')
        ->select(
            'users.name as username',
            'clinices.name as clinic_name',
            'appointments.appointmentDateTime',
            'appointments.status',
            'appointments.numberOfPackingHour',
        )->get();
        $response = [
            'success' => true,
            'data' => $appointments,
            'message' => 'All appointments display successfully'
        ];
        return Response()->json($response, 200);
    }

}
