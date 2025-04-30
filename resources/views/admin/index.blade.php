<x-admin-layout>

    <div class="grid grid-cols-4 gap-8 mt-8">

            <x-admin-stats-card title="Bus Routes" number="{{ $busRoutes->count() }}" />

            <x-admin-stats-card title="Buses" number="{{ $buses->count() }}" />

            <x-admin-stats-card title="Seats Reserved" number="{{ $reservedSeats->count() }}" />

            <x-admin-stats-card title="Drivers" number="{{ $drivers->count() }}" />


    </div>

    <div class="grid grid-cols-12 gap-8 mt-8">
        <div class="col-span-8 p-8 rounded-lg border h-[620px]">
            <h1 class="">Bookings </h1>
            <div class="mt-4">

{{--                @for ($i = 0; $i < 10; $i++)--}}
{{--                    <div class="mb-2">--}}
{{--                        <h2 class="font-medium">{{$bookings[$i]->name}} {{$bookings[$i]->phone_number}}</h2>--}}
{{--                        <p class="text-sm">Booked for {{$bookings->}}</p>--}}

{{--                    </div>--}}
{{--                @endfor--}}
            </div>
        </div>

        <div class="col-span-4 p-8 rounded-lg border h-[620px]">
            <h1>Schedules</h1>
            <div class="mt-4">
{{--                @for ($i = 0; $i < 10; $i++)--}}
{{--                    <div class="mb-2">--}}
{{--                        <h2 class="font-medium">Something is coming here....</h2>--}}
{{--                        <p class="text-sm">Here I come....</p>--}}

{{--                    </div>--}}
{{--                @endfor--}}
            </div>
        </div>
    </div>



</x-admin-layout>
