<x-admin-layout>
    <div class="my-6 p-8 rounded-lg border grid grid-cols-1 gap-6 bg-white text-sm">
        <form method="POST" action="{{ isset($bus_route) ? '/admin/bus-routes/' . $bus_route->id : '/admin/bus-routes' }}" class="grid grid-cols-12 gap-6">
            @csrf
            @if(isset($bus_route))
                @method('PUT')
            @endif
            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Origin</label>
                <select
                    name="origin_id"
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="">Select Origin</option>
                    @foreach($origins as $origin)
                        <option value="{{ $origin->id }}" {{ isset($bus_route) && $bus_route->origin_id == $origin->id ? 'selected' : '' }}>
                            {{ $origin->origin_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Destination</label>
                <select
                    name="destination_id"
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500">
                    <option value="">Select Destination</option>
                    @foreach($destinations as $destination)
                        <option value="{{ $destination->id }}" {{ isset($bus_route) && $bus_route->destination_id == $destination->id ? 'selected' : '' }}>
                            {{ $destination->destination_name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-12">
                <label class="font-medium">Description</label>
                <textarea
                    name="address"
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter Description (Optional)">{{ isset($bus_route) ? $bus_route->description : '' }}</textarea>
            </div>

            <div class="col-span-12">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition ml-auto">
                    {{ isset($bus_route) ? 'Update' : 'Submit' }}
                </button>
            </div>
        </form>
    </div>

    <div class="p-8 mt-8 bg-white rounded-lg border">
        <div class="grid grid-cols-1 gap-4">
            @if($bus_routes->isEmpty())
                <p class="text-gray-500">No bus_routees available.</p>
            @else
                <div class="grid grid-cols-12 text-blue-500 font-semibold mb-2">
                    <div class="col-span-3">Origin Name</div>
                    <div class="col-span-3">Destination Name</div>
                    <div class="col-span-3">Description</div>
                    <div class="col-span-3"></div>
                </div>
                @foreach($bus_routes as $bus_route)
                    <div class="grid grid-cols-12 items-center py-3">
                        <div class="col-span-3">{{ $bus_route->origin->origin_name ?? 'N/A' }}</div>
                        <div class="col-span-3">{{ $bus_route->destination->destination_name ?? 'N/A' }}</div>
                        <div class="col-span-3">{{ $bus_route->description ?? '-' }}</div>
                        <div class="col-span-3 flex gap-5 justify-end">
                            <a href="{{ url('/admin/bus-routes/' . $bus_route->id . '/edit') }}" class="px-4 py-1.5 rounded bg-white border">
                                Edit
                            </a>

                            <form action="/admin/bus-routes/{{ $bus_route->id }}" method="POST">
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
