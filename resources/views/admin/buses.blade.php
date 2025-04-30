<x-admin-layout>
    <div class="my-6 p-8 rounded-lg border grid grid-cols-1 gap-6 bg-white text-sm">
        <form method="POST" action="{{ isset($bus) ? '/admin/buses/' . $bus->id : '/admin/buses' }}" class="grid grid-cols-12 gap-6">
            @csrf
            @if(isset($bus))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Bus Type</label>
                <input
                    type="text"
                    name="bus_type"
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter Bus Type"
                    value="{{ isset($bus) ? $bus->bus_type : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Plate Number</label>
                <input
                    type="text"
                    name="plate_number"
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter Plate Number"
                    value="{{ isset($bus) ? $bus->plate_number : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-12">
                <label class="font-medium">Description</label>
                <textarea
                    name="description"
                    class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                    placeholder="Enter Description (Optional)">{{ isset($bus) ? $bus->description : '' }}</textarea>
            </div>

            <div class="col-span-12">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition ml-auto">
                    {{ isset($bus) ? 'Update' : 'Submit' }}
                </button>
            </div>
        </form>
    </div>

    <div class="p-8 mt-8 bg-white rounded-lg border">
        <div class="grid grid-cols-1 gap-4">
            @if($buses->isEmpty())
                <p class="text-gray-500">No buses available.</p>
            @else
                <div class="grid grid-cols-12 text-blue-500 font-semibold mb-2">
                    <div class="col-span-3">Bus Type</div>
                    <div class="col-span-3">Plate Number</div>
                    <div class="col-span-3">Description</div>
                    <div class="col-span-3"></div>
                </div>
                @foreach($buses as $bus)
                    <div class="grid grid-cols-12 items-center py-3">
                        <div class="col-span-3">{{ $bus->bus_type }}</div>
                        <div class="col-span-3">{{ $bus->plate_number }}</div>
                        <div class="col-span-3">{{ $bus->description ?? 'N/A' }}</div>
                        <div class="col-span-3 flex gap-5 justify-end">
                            <a href="{{ url('/admin/buses/' . $bus->id . '/edit') }}" class="px-4 py-1.5 rounded bg-white border">
                                Edit
                            </a>

                            <form action="/admin/buses/{{ $bus->id }}" method="POST">
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
