<?php

namespace App\Http\Controllers\Api;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Mail\Booking;
use App\Models\Appointment;
use Illuminate\Http\Request;
use App\Models\User;
use Illuminate\Support\Facades\Mail;

/**
 * @OA\Get(
 * path="/api/admin/appointments",
 * summary="List Appointments",
 * description="List Appointments",
 * security={ {"sanctum": {} }},
 * @OA\Response(
 *    response=200,
 *    description="Get appointments",
 *    @OA\JsonContent(
 *       @OA\Property(property="message", type="string", example="Sorry, wrong email address or password. Please try again")
 *        )
 *     )
 * )
 */
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

    /**
     * Appect booking from user
     * @param $id
     * @return appointment
     */
    public function acceptAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 1;
        $appointment->save();
        $response = [
            'success' => true,
            'data' => $appointment,
            'message' => 'Appointment accepted'
        ];
        return Response()->json($response, 200);
    }
    /**
     * cancel booking from user
     * @param $id
     * @return appointment
     */
    public function cancelAppointment($id){
        $appointment = Appointment::find($id);
        $appointment->status = 2;
        $appointment->save();
        $response = [
            'success' => true,
            'data' => $appointment,
            'message' => 'Appointment accepted'
        ];
        return Response()->json($response, 200);
    }
}
