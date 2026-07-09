<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\ServiceOrder;
use App\Http\Resources\ServiceOrderResource;
use Illuminate\Http\Request;

class ServiceOrderController extends Controller
{
    public function index(Request $request)
    {
        $query = ServiceOrder::query();

        if ($request->has('status')) {
            $query->where('status', $request->get('status'));
        }

        if ($request->has('client_id')) {
            $query->where('client_id', $request->get('client_id'));
        }

        $orders = $query->with(['client', 'vehicle', 'user', 'items'])->paginate(15);

        return ServiceOrderResource::collection($orders);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'client_id' => 'required|exists:clients,id',
            'vehicle_id' => 'required|exists:vehicles,id',
            'description' => 'required|string',
            'priority' => 'required|in:low,medium,high',
            'estimated_date' => 'required|date',
            'items' => 'nullable|array',
        ]);

        $order = ServiceOrder::create([
            'client_id' => $validated['client_id'],
            'vehicle_id' => $validated['vehicle_id'],
            'user_id' => auth()->id(),
            'description' => $validated['description'],
            'priority' => $validated['priority'],
            'estimated_date' => $validated['estimated_date'],
            'status' => 'pending',
            'payment_status' => 'pending',
        ]);

        return new ServiceOrderResource($order);
    }

    public function show(ServiceOrder $order)
    {
        return new ServiceOrderResource($order->load(['client', 'vehicle', 'user', 'items']));
    }

    public function update(Request $request, ServiceOrder $order)
    {
        $validated = $request->validate([
            'description' => 'sometimes|string',
            'status' => 'sometimes|in:pending,in_progress,completed,cancelled',
            'priority' => 'sometimes|in:low,medium,high',
            'estimated_date' => 'sometimes|date',
            'completion_date' => 'nullable|date',
            'total_value' => 'sometimes|numeric',
            'payment_status' => 'sometimes|in:pending,partial,paid',
        ]);

        $order->update($validated);

        return new ServiceOrderResource($order);
    }

    public function destroy(ServiceOrder $order)
    {
        $order->delete();
        return response()->json(null, 204);
    }
}
