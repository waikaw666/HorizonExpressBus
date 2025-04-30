<?php

namespace App\Http\Controllers;

use App\Models\Booking;
use App\Models\Feedback;
use App\Models\ReservedSeat;
use App\Models\Schedule;
use App\Models\Seat;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    public function register_seat()
    {
        $id = request('id');
        $schedule = Schedule::find($id);

        $reserved_seats = ReservedSeat::where('schedule_id', $id)->get();
        $reserved_seats_id_list = $reserved_seats->pluck('seat_id')->toArray();

        // Fetch seats from the database
        $seats = Seat::all();

        return view('register.seat', [
            'schedule' => $schedule,
            'seats' => $seats,
            'reserved_seats' => $reserved_seats,
            'reserved_seats_id_list' => $reserved_seats_id_list,
        ]);
    }

    public function register_info(Request $request, $id)
    {
        $booking = Booking::find($id);

        return view('register.info', [
            'booking'=>$booking,
        ]);
    }


    public function book(Request $request,$id)
    {

        $booking = Booking::find($id);

        if($booking){
            $booking->payment_method = $request->input('payment_method');
            $booking->payment_information = $request->input('payment_information');

            $booking->status = 'paid';

            $booking->save();
        }

        return redirect('/success/'.$id);
    }

    public function prebook(Request $request)
    {
        $schedule_id = $request->input('schedule_id');
        $selected_seats = explode(',', $request->input('selected_seats'));
        $name = $request->input('name');
        $phone_number = $request->input('phone_number');

        $bus_route_id = Schedule::find($schedule_id)->bus_route_id;

        $booking = new Booking(
            [
                'schedule_id' => $schedule_id,
                'bus_route_id' => $bus_route_id,
                'name' => $name,
                'phone_number' => $phone_number,
            ]
        );

        $booking->save();

        error_log("booking->".$booking);

        // Process the booking
        foreach ($selected_seats as $seat_id) {
            ReservedSeat::create(
                [
                    'schedule_id' => $schedule_id,
                    'seat_id' => $seat_id,
                ]
            );
        }

        return redirect('/bookings/'.$booking->id.'/info');
    }

    public function success(Request $request,$id)
    {
        $booking = Booking::find($id);

        return view('register.success', [
            'booking'=>$booking,
        ]);
    }

    public function feedback()
    {
        return view('register.feedback');
    }

    public function create_feedback(Request $request)
    {
        $feedback = new Feedback(
            [
                'email' => $request->input('email'),
                'name' => $request->input('name'),
                'feedback' => $request->input('feedback'),
                'status' => $request->input('status'),
            ]
        );

        $feedback->save();

        return redirect('/');
    }
}
