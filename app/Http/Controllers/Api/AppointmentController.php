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

}
