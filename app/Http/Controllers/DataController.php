<?php

namespace App\Http\Controllers;

use App\Models\Destination;
use App\Models\Origin;
use Illuminate\Http\Request;
use App\Models\Schedule;
use App\Models\Driver;
use App\Models\Bus;
use App\Models\Admin;
use App\Models\BusRoute;


class DataController extends Controller
{
    public function create_origins(Request $request)
    {
        $origin = new Origin();
        $origin->origin_name = $request->origin_name;

        $origin->save();

        return redirect('/admin/origins');
    }

    public function update_origins(Request $request, $id)
    {
        $origin = Origin::find($id);

        if($origin) {
            $origin->origin_name = $request->origin_name;

            $origin->save();

            return redirect('/admin/origins');
        }

        return response()->json([
            'message' => 'Origin not found'
        ], 404);
    }

    public function delete_origins(Request $request, $id)
    {
        $origin = Origin::find($id);

        if($origin) {
            $origin->delete();
            return redirect('/admin/origins');
        }

        return response()->json([
            'message' => 'Origin not found'
        ], 404);
    }

    public function create_destinations(Request $request)
    {
        $destination = new Destination();
        $destination->name = $request->name;

        $destination->save();

        return redirect('/admin/destinations');
    }

    public function update_destinations(Request $request, $id)
    {
        $destination = Destination::find($id);

        if($destination) {
            $destination->name = $request->name;

            $destination->save();

            return redirect('/admin/destinations');
        }

        return response()->json([
            'message' => 'Destination not found'
        ], 404);
    }

    public function delete_destinations(Request $request, $id)
    {
        $destination = Destination::find($id);

        if($destination) {
            $destination->delete();
            return redirect('/admin/destinations');
        }

        return response()->json([
            'message' => 'Destination not found'
        ], 404);
    }

    public function create_schedules(Request $request)
    {
        $schedule = new Schedule();
        $schedule->departure_time = $request->departure_time;
        $schedule->arrival_time = $request->arrival_time;
        $schedule->date = $request->date;
        $schedule->price = $request->price;
        $schedule->bus_id = $request->bus_id;
        $schedule->bus_route_id = $request->bus_route_id;
        $schedule->duration = $request->duration;

        $schedule->save();

        return redirect('/admin/schedules');
    }


    public function update_schedules(Request $request, $id)
    {

        $schedule = Schedule::find($id);

        if($schedule) {
            $schedule->departure_time = $request->departure_time;
            $schedule->arrival_time = $request->arrival_time;
            $schedule->date = $request->date;
            $schedule->price = $request->price;
            $schedule->bus_id = $request->bus_id;
            $schedule->bus_route_id = $request->bus_route_id;
            $schedule->duration = $request->duration;

            $schedule->save();

            return redirect('/admin/schedules');
        }

        return response()->json([
            'message' => 'Schedule not found'
        ], 404);
    }

    public function delete_schedules(Request $request, $id)
    {
        $schedule = Schedule::find($id);

        if($schedule) {
            $schedule->delete();
            return response()->json([
                'message' => 'Schedule deleted successfully'
            ]);
        }

        return response()->json([
            'message' => 'Schedule not found'
        ], 404);
    }


    public function create_drivers(Request $request)
    {
        $driver = new Driver();
        $driver->name = $request->name;
        $driver->address = $request->address;
        $driver->phone_number = $request->phone_number;

        $driver->save();

        return redirect('/admin/drivers');
    }

    public function update_drivers(Request $request, $id)
    {
        $driver = Driver::find($id);

        if($driver) {
            $driver->name = $request->name;
            $driver->address = $request->address;
            $driver->phone_number = $request->phone_number;

            $driver->save();

            return redirect('/admin/drivers');

        }

        return response()->json([
            'message' => 'Driver not found'
        ], 404);
    }

    public function delete_drivers(Request $request, $id)
    {
        $driver = Driver::find($id);

        if($driver) {
            $driver->delete();
            return redirect('/admin/drivers');
        }

        return response()->json([
            'message' => 'Driver not found'
        ], 404);
    }


    public function create_buses(Request $request)
    {
        $bus = new Bus();
        $bus->bus_type = $request->bus_type;
        $bus->plate_number = $request->plate_number;
        $bus->description = $request->description;

        $bus->save();

        return redirect('/admin/buses');
    }

    public function update_buses(Request $request, $id)
    {
        $bus = Bus::find($id);

        if($bus) {
            $bus->bus_type = $request->bus_type;
            $bus->plate_number = $request->plate_number;
            $bus->description = $request->description;

            $bus->save();

            return redirect('/admin/buses');
        }

        return response()->json([
            'message' => 'Bus not found'
        ], 404);
    }

    public function delete_buses(Request $request, $id)
    {
        $bus = Bus::find($id);

        if($bus) {
            $bus->delete();
            return redirect('/admin/buses');
        }

        return response()->json([
            'message' => 'Bus not found'
        ], 404);
    }

    public function create_bus_routes(Request $request)
    {
        $bus_route = new BusRoute();
        $bus_route->origin_id = $request->origin_id;
        $bus_route->destination_id = $request->destination_id;

        $bus_route->description = $request->description;

        $bus_route->save();

        return redirect('/admin/bus-routes');
    }

    public function update_bus_routes(Request $request, $id)
    {
        $bus_route = BusRoute::find($id);

        if($bus_route) {
            $bus_route->origin_id = $request->origin_id;
            $bus_route->destination_id = $request->destination_id;
            $bus_route->price = $request->price;

            $bus_route->save();

            return redirect('/admin/bus-routes');
        }

        return response()->json([
            'message' => 'Bus Route not found'
        ], 404);
    }

    public function delete_bus_routes(Request $request, $id)
    {
        $bus_route = BusRoute::find($id);

        if($bus_route) {
            $bus_route->delete();
            return redirect('/admin/bus-routes');
        }

        return response()->json([
            'message' => 'Bus Route not found'
        ], 404);
    }

    public function create_admin(Request $request)
    {
        $admin = new Admin();
        $admin->name = $request->name;
        $admin->email = $request->email;
        $admin->phonenumber = $request->phonenumber;
        $admin->password = bcrypt($request->password);
        $admin->role = "admin";

        $admin->save();

        return redirect('/admin/admins');
    }


        public function update_admin(Request $request, $id)
     {
        $admin = Admin::find($id);

        if($admin) {
            $admin->name = $request->name;
            $admin->email = $request->email;
            $admin->phonenumber = $request->phonenumber;
            $admin->password = bcrypt($request->password);
            $admin->role = "admin";

            $admin->save();

            return redirect('/admin/admins');
        }

        // Add handling for admin not found
        return redirect('/admin/admins')->withErrors(['Admin not found']);
    }

        public function delete_admin(Request $request, $id)
        {
            $admin = Admin::find($id);

            if($admin) {
                $admin->delete();
                return redirect('/admin/admins');
            }

            return response()->json([
                'message' => 'Admin not found'
            ], 404);
        }
}
