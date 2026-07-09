<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Vehicle;
use App\Http\Resources\VehicleResource;
use Illuminate\Http\Request;

class VehicleController extends Controller
{
    public function index(Request $request)
    {
        $query = Vehicle::query();

        if ($request->has('client_id')) {
            $query->where('client_id', $request->get('client_id'));
        }

        if ($request->has('search')) {
            $search = $request->get('search');
            $query->where('license_plate', 'like', "%{$search}%")
                  ->orWhere('brand', 'like', "%{$search}%")
                  ->orWhere('model', 'like', "%{$search}%");
        }

        $vehicles = $query->with('client')->paginate(15);

        return VehicleResource::collection($vehicles);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'brand' => 'required|string',
            'model' => 'required|string',
            'year' => 'required|integer',
            'color' => 'required|string',
            'license_plate' => 'required|unique:vehicles',
            'chassis_number' => 'required|unique:vehicles',
            'type' => 'required|string',
        ]);

        $vehicle = Vehicle::create($validated);

        return new VehicleResource($vehicle);
    }

    public function show(Vehicle $vehicle)
    {
        return new VehicleResource($vehicle->load('client'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $validated = $request->validate([
            'brand' => 'sometimes|string',
            'model' => 'sometimes|string',
            'year' => 'sometimes|integer',
            'color' => 'sometimes|string',
            'license_plate' => 'sometimes|unique:vehicles,license_plate,' . $vehicle->id,
            'chassis_number' => 'sometimes|unique:vehicles,chassis_number,' . $vehicle->id,
            'type' => 'sometimes|string',
        ]);

        $vehicle->update($validated);

        return new VehicleResource($vehicle);
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();
        return response()->json(null, 204);
    }
}
