<?php

namespace App\Http\Controllers;

use App\Models\BusRoute;
use App\Models\Schedule;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Foundation\Application;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function index(Request $request): View|Factory|Application
    {
        $origin_id = $request->input('origin');
        $destination_id = $request->input('destination');
        $date = $request->input('date');

        $bus_route = BusRoute::where('origin_id', $origin_id)
            ->where('destination_id', $destination_id)
            ->first();

        error_log($bus_route.'Here');

        $schedules = Schedule::where('bus_route_id', $bus_route->id)
            ->get();

        return view('search.index', [
            'origin' => $origin_id,
            'destination' => $destination_id,
            'date' => $date,
            'schedules' => $schedules,
        ]);
    }


}

