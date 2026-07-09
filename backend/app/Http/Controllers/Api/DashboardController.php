<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use App\Models\Client;
use App\Models\ServiceOrder;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function index()
    {
        $stats = [
            'total_users' => User::count(),
            'total_clients' => Client::count(),
            'total_orders' => ServiceOrder::count(),
            'pending_orders' => ServiceOrder::where('status', 'pending')->count(),
            'completed_orders' => ServiceOrder::where('status', 'completed')->count(),
            'in_progress_orders' => ServiceOrder::where('status', 'in_progress')->count(),
        ];

        $recent_orders = ServiceOrder::latest()->with(['client', 'vehicle'])->take(5)->get();

        return response()->json([
            'stats' => $stats,
            'recent_orders' => $recent_orders,
        ]);
    }
}
