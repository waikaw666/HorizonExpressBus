<x-admin-layout>
    <div class="my-6 p-8 rounded-lg border grid grid-cols-1 gap-6 bg-white text-sm">
        <form method="POST" action="{{ isset($driver) ? '/admin/drivers/' . $driver->id : '/admin/drivers' }}" class="grid grid-cols-12 gap-6">
            @csrf
            @if(isset($driver))
                @method('PUT')
            @endif

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Name</label>
                <input
                        type="text"
                        name="name"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Enter Driver Name"
                        value="{{ isset($driver) ? $driver->name : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-6">
                <label class="font-medium">Phone Number</label>
                <input
                        type="text"
                        name="phone_number"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Enter Driver Phone Number"
                        value="{{ isset($driver) ? $driver->phone_number : '' }}">
            </div>

            <div class="grid grid-cols-1 gap-4 col-span-12">
                <label class="font-medium">Address</label>
                <textarea
                        name="address"
                        class="p-2 border border-gray-300 rounded focus:outline-none focus:ring focus:ring-blue-500"
                        placeholder="Enter Description (Optional)">{{ isset($driver) ? $driver->address : '' }}</textarea>
            </div>

            <div class="col-span-12">
                <button type="submit" class="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600 transition ml-auto">
                    {{ isset($driver) ? 'Update' : 'Submit' }}
                </button>
            </div>
        </form>
    </div>

    <div class="p-8 mt-8 bg-white rounded-lg border">
        <div class="grid grid-cols-1 gap-4">
            @if($drivers->isEmpty())
                <p class="text-gray-500">No Driveres available.</p>
            @else
                <div class="grid grid-cols-12 text-blue-500 font-semibold mb-2">
                    <div class="col-span-3">Name</div>
                    <div class="col-span-3">Phone Number</div>
                    <div class="col-span-3">Address</div>
                    <div class="col-span-3"></div>
                </div>
                @foreach($drivers as $driver)
                    <div class="grid grid-cols-12 items-center py-3">
                        <div class="col-span-3">{{ $driver->name ?? 'N/A' }}</div>
                        <div class="col-span-3">{{ $driver->phone_number ?? 'N/A' }}</div>
                        <div class="col-span-3">{{ $driver->address ?? 'N/A' }}</div>
                        <div class="col-span-3 flex gap-5 justify-end">
                            <a href="{{ url('/admin/drivers/' . $driver->id . '/edit') }}" class="px-4 py-1.5 rounded bg-white border">
                                Edit
                            </a>

                            <form action="/admin/drivers/{{ $driver->id }}" method="POST">
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
