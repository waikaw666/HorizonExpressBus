<x-admin-layout>
    <div class="my-6 p-8 rounded-lg border grid grid-cols-1 gap-6 bg-white text-sm">
        <form method="POST" action="{{ isset($schedule) ? '/admin/schedules/' . $schedule->id : '/admin/schedules' }}" class="grid grid-cols-12 gap-6">
            @csrf
            @if(isset($schedule))
                @method('PUT')
            @endif

            <!-- Bus Route Selection -->
            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Bus Route</label>
                <select
                        name="bus_route_id"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="">Select Bus Route</option>
                    @foreach($bus_routes as $route)
                        <option value="{{ $route->id }}" {{ isset($schedule) && $route->id == $schedule->bus_route_id ? 'selected' : '' }}>
                            {{ $route->origin->origin_name }} - {{ $route->destination->destination_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Date Picker -->
            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Date</label>
                <input
                        type="date"
                        name="date"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        value="{{ isset($schedule) ? $schedule->date : '' }}">
            </div>

            <!-- Departure Time -->
            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Departure Time</label>
                <input
                        type="time"
                        name="departure_time"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        step="1800"  {{-- 30-minute intervals --}}
                        value="{{ isset($schedule) ? $schedule->departure_time : '' }}">
            </div>

            <!-- Arrival Time -->
            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Arrival Time</label>
                <input
                        type="time"
                        name="arrival_time"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        step="1800"  {{-- 30-minute intervals --}}
                        value="{{ isset($schedule) ? $schedule->arrival_time : '' }}">
            </div>

            <!-- Price -->
            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Price</label>
                <input
                        type="number"
                        name="price"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Enter Price"
                        value="{{ isset($schedule) ? $schedule->price : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Duration</label>
                <input
                        name="duration"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Enter duration"
                        value="{{ isset($schedule) ? $schedule->duration : '' }}">
            </div>


            <!-- Description -->
            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Bus</label>
                <select
                        name="bus_id"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="">Select Bus</option>
                    @foreach($buses as $bus)
                        <option value="{{ $bus->id }}" {{ isset($schedule) && $bus->id == $schedule->bus_id ? 'selected' : '' }}>
                            {{$bus->plate_number}}
                        </option>
                    @endforeach
                </select>
            </div>

            <!-- Submit Button -->
            <div class="col-span-12">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition ml-auto">
                    {{ isset($schedule) ? 'Update' : 'Submit' }}
                </button>
            </div>
        </form>
    </div>

    <!-- Schedules Table -->
    <div class="p-8 mt-8 bg-white rounded-lg border">
        <div class="grid grid-cols-1 gap-4">
            @if($schedules->isEmpty())
                <p class="text-gray-500">No schedules available.</p>
            @else
                <div class="grid grid-cols-12 text-blue-500 font-semibold mb-2">
                    <div class="col-span-2">Route</div>
                    <div class="col-span-2">Date</div>
                    <div class="col-span-2">Departure Time</div>
                    <div class="col-span-2">Arrival Time</div>
                    <div class="col-span-1">Price</div>
                    <div class="col-span-2"></div>
                </div>
                @foreach($schedules as $schedule)
                    <div class="grid grid-cols-12 items-center py-3">
                        <div class="col-span-2">{{ $schedule->busRoute->origin->origin_name }} - {{ $schedule->busRoute->destination->destination_name }}</div>
                        <div class="col-span-2">{{ $schedule->date }}</div>
                        <div class="col-span-2">{{ $schedule->departure_time }}</div>
                        <div class="col-span-2">{{ $schedule->arrival_time }}</div>
                        <div class="col-span-1">{{ $schedule->price }}</div>

                        <div class="col-span-2 flex gap-3 justify-end">
                            <a href="{{ url('/admin/schedules/' . $schedule->id . '/edit') }}" class="px-4 py-1.5 rounded bg-white border">
                                Edit
                            </a>
                            <form action="/admin/schedules/{{ $schedule->id }}" method="POST">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="px-4 py-1.5 rounded  bg-red-400 text-slate-100">
                                    Delete
                                </button>
                            </form>
                        </div>
                    </div>
                @endforeach
            @endif
        </div>
    </div>
</x-admin-layout>
