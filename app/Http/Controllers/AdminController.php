<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Bus;
use App\Models\BusRoute;
use App\Models\Destination;
use App\Models\Driver;
use App\Models\Feedback;
use App\Models\Origin;
use App\Models\ReservedSeat;
use App\Models\Schedule;
use App\Models\Seat;
use App\Models\Admin;
use Illuminate\Http\Request;

class AdminController extends Controller
{
    public function index()
    {
        $schedules = Schedule::all();
        $bookings = Booking::all();
        $busRoutes = BusRoute::all();
        $buses = Bus::all();
        $drivers = Driver::all();
        $reservedSeats = ReservedSeat::all();

        return view('admin.index', compact('schedules', 'bookings', 'busRoutes', 'buses', 'drivers', 'reservedSeats'));
    }

    public function schedules(){
        $schedules = Schedule::all();
        $bus_routes = BusRoute::with(['origin', 'destination'])->get();
        $buses = Bus::all();
        return view('admin.schedules',['schedules'=>$schedules,'bus_routes'=>$bus_routes,'buses'=>$buses]);
    }

    public  function edit_schedule(Request $request, $id){
        $schedule = Schedule::find($id);

        if($schedule){
            $schedules = Schedule::all();
            return view('admin.schedules',['schedules'=>$schedules,'schedule'=>$schedule]);
        }

        return redirect('/admin/schedules')->with('error','Schedule not found');
    }


    public function drivers(){
        $drivers = Driver::all();

        return view('admin.drivers',['drivers'=>$drivers]);
    }

    public function edit_driver($id){
        $driver = Driver::find($id);

        if($driver){
            $drivers = Driver::all();
            return view('admin.drivers',['drivers'=>$drivers,'driver'=>$driver]);
        }

        return redirect('/admin/drivers')->with('error','Driver not found');
    }

    public  function bus_routes()
    {
        $bus_routes = BusRoute::with(['origin', 'destination'])->get();
        $origins = Origin::all();
        $destinations = Destination::all();

        return view('admin.bus_routes',['bus_routes'=>$bus_routes,'origins'=>$origins,'destinations'=>$destinations]);
    }

    public function edit_bus_route($id)
    {
        $bus_route = BusRoute::find($id);

        if($bus_route){
            $bus_routes = BusRoute::with(['origin', 'destination'])->get();
            $origins = Origin::all();
            $destinations = Destination::all();

            return view('admin.bus_routes',['bus_routes'=>$bus_routes,'bus_route'=>$bus_route,'origins'=>$origins,'destinations'=>$destinations]);
        }

        return redirect('/admin/bus-routes')->with('error','Bus Route not found');
    }

    public function buses()
    {
        $buses = Bus::all();
        return view('admin.buses',["buses"=>$buses]);
    }

    public function edit_bus($id)
    {
        $bus = Bus::find($id);
        if($bus) {
            $buses = Bus::all(); // to show all buses in the list
            return view('admin.buses', ['buses' => $buses, 'bus' => $bus]); // pass the bus being edited
        }

        return redirect('/admin/buses')->with('error', 'Bus not found');
    }


    public function bookings()
    {
        $bookings = Booking::all();
        return view('admin.bookings',["bookings"=>$bookings]);
    }

    public function seats()
    {
        $seats = Seat::all();

        return view('admin.seats',['seats'=>$seats]);
    }

    public function origins()
    {
        $origins = Origin::all();
        return view('admin.origins',["origins"=>$origins]);
    }

    public function edit_origin($id)
    {
        $origin = Origin::find($id);
        if($origin) {
            $origins = Origin::all(); // to show all origins in the list
            return view('admin.origins', ['origins' => $origins, 'origin' => $origin]); // pass the origin being edited
        }

        return redirect('/admin/origins')->with('error', 'Origin not found');
    }


    public function destinations()
    {
        $destinations = Destination::all();
        return view('admin.destinations',['destinations'=>$destinations]);
    }

    public function edit_destination($id)
    {
        $destination = Destination::find($id);
        if($destination) {
            $destinations = Destination::all(); // to show all destinations in the list
            return view('admin.destinations', ['destinations' => $destinations, 'destination' => $destination]); // pass the destination being edited
        }

        return redirect('/admin/destinations')->with('error', 'Destination not found');
    }

    public function admins(){
        $admins = Admin::all();
        return view('admin.admins',['admins'=>$admins]);
    }

    public function feedbacks()
    {
        $feedbacks = Feedback::all();
        return view('admin.feedbacks',['feedbacks'=>$feedbacks]);
    }
}
