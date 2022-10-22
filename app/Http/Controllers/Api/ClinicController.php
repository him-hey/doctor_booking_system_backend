<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Clinic;

class ClinicController extends Controller
{
    /**
     * Create clinic
     * @param $request
     * @return clinic
     */
    public function createClinic(Request $request){
        $clinic = new Clinic();
        $clinic->name = $request->name;
        $clinic->address = $request->address;
        $clinic->costOfAppointmentPerHour = $request->costOfAppointmentPerHour;
        $clinic->save();
        $response = [
            'success' => true,
            'data' => $clinic,
            'message' => 'clinic created successfully'
        ];
        return Response()->json($response, 200);
    }
    /**
     * show all clinices
     * @param $request
     * @return clinices
     */
    public function index(){
        $clinices = Clinic::all();
        $response = [
            'success' => true,
            'data' => $clinices,
            'status' => 200,
            'message' => 'all the clinices are here'
        ];
        return Response()->json($response, 200);
    }
    /**
     * show clinic detail
     * @param $id
     * @return clinic
     */
    public function showDetail($id){
        $clinic = Clinic::find($id);
        $response = [
            'success' => true,
            'data' => $clinic,
            'status' => 200,
            'message' => 'all the clinices are here'
        ];
        return Response()->json($response, 200);
    }
    /**
     * Update clinic
     * @param $request
     * @return clinices
     */
    public function update(Request $request, $id){
        $input = $request->all();
        $clinic = Clinic::find($id);
        $clinic->name = $input['name'];
        $clinic->address = $input['address'];
        $clinic->costOfAppointmentPerHour = $input['costOfAppointmentPerHour'];
        $clinic->save();
        $response = [
            'success' => true,
            'data' => $clinic,
            'message' => 'Clinic has been updated'
        ];
        return Response()->json($response, 200);
    }
    /**
     * Delete clinic
     * @param $request
     * @return clinic
     */
    public function delete($id){
        $clinic = Clinic::find($id);
        $clinic->delete();
        $response = [
            'success' => true,
            'data' => $clinic,
            'message' => 'Clinic has been deleted'
        ];
        return Response()->json($response, 200);
    }
}
